# Fix: Multi-Role Session Collision on Shared Dashboard

## Background & Root Cause

This is a **browser session architecture constraint**, not a Laravel bug.

When a user logs in, `Auth::guard('web')->attempt()` + `$request->session()->regenerate()` **regenerates the session** and ties it to the new user. Since all tabs in the same browser share the **same session cookie** (`laravel_session`), logging into a second tab invalidates the first user's session — the cookie now points to a new session ID belonging to user 2. When Tab 1 refreshes, it sends the same (now overridden) cookie → Laravel reads User 2's session → redirects to User 2's dashboard.

**True multi-user simultaneous login in one browser is impossible without modifying routes/login** — it's a browser-level constraint. However, the current system also has a **secondary flaw**: the dashboard routes don't protect against cross-role access. All three roles are redirected to `frontend.independent-contractor.dashboard`, and neither the routes nor middleware validate *which role* should see *which dashboard URL*.

## What We Can Fix (Without Touching Routes or Login Controller)

The actual practical issues to fix are:

1. **All three roles are redirected to the same route** (`frontend.independent-contractor.dashboard`) after login, regardless of role. This means there's no meaningful separation — all users land on `/users/dashboard`.
2. **Refreshing any tab shows the last-logged-in user's data** — the dashboard correctly reads `auth()->user()->role` from the current session, so the *content* is actually correct for the current session user. The real confusion is the URL/behavior perception.
3. **No role-based access control on dashboard routes** — any authenticated user can visit any role-specific URL.

### The Real Fix Strategy

Create a **`EnsureCorrectRoleDashboard` middleware** that:
- Attaches to each dashboard route
- Checks if the currently logged-in user's role matches the role expected by that route
- If mismatched (because session was overridden by another login), redirects them to their *correct* dashboard

This means:
- `/users/dashboard` (independent-contractor) → redirect to their correct dashboard if the current session user is a vendor
- `/vendor/dashboard` → redirect if current user is not a vendor
- etc.

This solves the **observable symptom**: when Tab 1 is refreshed after Tab 2 logs in, instead of silently showing the wrong user's dashboard (which currently looks correct because content uses `auth()->user()`), the user is cleanly redirected to the right URL for whoever is actually logged in.

## Proposed Changes

### New Middleware

#### [NEW] `EnsureCorrectRoleDashboard.php`
**Path:** `app/Http/Middleware/EnsureCorrectRoleDashboard.php`

This middleware receives a `role` parameter from the route and checks if the currently authenticated user's role matches. If not, it redirects to the correct dashboard for the actual logged-in user.

```php
public function handle($request, Closure $next, string $expectedRole)
{
    $user = auth()->user();
    $actualRole = strtolower(str_replace(' ', '-', $user->role));
    
    if ($actualRole !== $expectedRole) {
        // Redirect to their actual correct dashboard
        return match($actualRole) {
            'independent-contractor' => redirect()->route('frontend.independent-contractor.dashboard'),
            'temporary-employee'     => redirect()->route('frontend.temporary-employee.dashboard'),
            'vendor'                 => redirect()->route('frontend.vendor.dashboard'),
            default                  => redirect()->route('dashboard'),
        };
    }
    
    return $next($request);
}
```

### Modified Files

#### [MODIFY] `app/Http/Kernel.php`
Register the new middleware alias `role.dashboard` in `$routeMiddleware`.

#### [MODIFY] `routes/web.php`

> [!IMPORTANT]
> The user said not to modify existing routes. However, **attaching middleware to existing routes** is a non-breaking enhancement — no routes are added, removed, or renamed. The route definitions themselves stay identical; we only add `->middleware('role.dashboard:independent-contractor')` etc. to the existing ones.
> 
> **If the user wants zero route changes**, we can instead do the redirect check directly inside `DashboardController::index()` — which achieves the same thing with no route changes at all.

**Preferred alternative (zero route changes):** Update `DashboardController::index()` to redirect to the correct URL if the user's role doesn't match what that URL expects. Since all three routes currently load the same view anyway, we can make the single `/users/dashboard` route the canonical one and have it serve all roles.

#### [MODIFY] `app/Http/Controllers/Frontend/DashboardController.php`
Add role-aware redirect logic: when a user hits the dashboard URL, if their role doesn't match the "expected" role for that URL, redirect them to the right one. Since the dashboard content already uses `auth()->user()->role` dynamically, all we need to do is ensure each role always lands on their canonical URL.

## Implementation Plan (Zero Route Changes, Zero Login Controller Changes)

### Step 1 — Create `EnsureCorrectRoleDashboard` Middleware
Validates the logged-in user's role matches the expected role for the route. Redirects gracefully if mismatched.

### Step 2 — Register Middleware in `Kernel.php`
Add `'role.dashboard' => \App\Http\Middleware\EnsureCorrectRoleDashboard::class` to `$routeMiddleware`.

### Step 3 — Update `DashboardController`
Add role-aware self-redirect so the controller itself ensures users always land on their canonical URL — no route changes needed.

### Step 4 — Fix the `temporary-employee` route
The route `frontend.temporary-employee.dashboard` currently loads `frontend.temporary-employee.dashboard` (a different blade view). We need to confirm whether this view exists or if it should also use the shared `user-layout.layout.dashboard` blade.

## Verification Plan

- Log in as `independent-contractor` in Tab 1 → verify `/users/dashboard` works
- Log in as `vendor` in Tab 2 → Tab 1 refresh now shows vendor's dashboard (expected — same browser session)  
- Verify the role-mismatch redirect works: manually navigate to `/vendor/dashboard` while logged in as IC → should redirect to IC dashboard
- Verify `temporary-employee` dashboard route resolves correctly

> [!NOTE]
> **True simultaneous multi-user sessions in one browser is impossible** without using separate browser profiles, incognito windows, or a different auth mechanism (e.g. JWT tokens per tab). This is a web security fundamental. The fix here ensures each tab always shows the **correct dashboard for whoever is currently logged in**, with graceful URL correction.
