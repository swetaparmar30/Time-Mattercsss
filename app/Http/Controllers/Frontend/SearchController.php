<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleCategory;
use App\Models\CentralFile;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $userRole = Auth::user()->role;

        if (empty($query)) {
            return redirect()->back();
        }

        // Search in Central Files that belong to categories accessible by this user role
        $files = CentralFile::where('status', 1)
            ->where('name', 'LIKE', "%{$query}%")
            ->whereHas('roleCategories', function($q) use ($userRole) {
                $q->where('name', $userRole)->where('status', 1);
            })
            ->get();

        return view('user-layout.search-results', compact('files', 'query'));
    }

    public function quickSearch(Request $request)
    {
        $query = $request->input('query');
        $userRole = Auth::user()->role;

        if (empty($query) || strlen($query) < 2) {
            return response()->json(['files' => []]);
        }

        $files = CentralFile::where('status', 1)
            ->where('name', 'LIKE', "%{$query}%")
            ->whereHas('roleCategories', function($q) use ($userRole) {
                $q->where('name', $userRole)->where('status', 1);
            })
            ->limit(10)
            ->get(['id', 'name']);

        return response()->json([
            'files' => $files
        ]);
    }
}
