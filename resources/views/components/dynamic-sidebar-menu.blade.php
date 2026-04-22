@php
    $sidebarService = app(\App\Services\SidebarMenuService::class);
    $menuItems = $sidebarService->getMenuItems();
@endphp

@foreach($menuItems as $menuItem)
    @php
        $isGroupActive = $sidebarService->isMenuGroupActive($menuItem['route_prefix']);
        $badgeValue = $menuItem['badge'];
        $hasSubmenu = count($menuItem['submenu'] ?? []);
        $isAnySubmenuActive = false;
        if ($hasSubmenu) {
            foreach ($menuItem['submenu'] as $submenuItem) {
                if ($sidebarService->isRouteActive($submenuItem['route'])) {
                    $isAnySubmenuActive = true;
                    break;
                }
            }
        }
        $liClasses = 'pc-item'.
            ($hasSubmenu ? ' pc-hasmenu' : '').
            (
                $isGroupActive
                ? (($hasSubmenu && $isAnySubmenuActive) ? ' pc-trigger active' : ' active')
                : ''
            );
    @endphp
    <li class="{{ $liClasses }}">
        <a href="{{ $hasSubmenu || $sidebarService->isRouteActive($menuItem['route']) ? 'javascript:;' : route($menuItem['route'] ?? '') }}"
            class="pc-link">
            <span class="pc-micon">
                <i class="{{ $menuItem['icon'] }} fs-4"></i>
            </span>
            <span class="pc-mtext">{{ $menuItem['title'] }}</span>
            @if($hasSubmenu)
                <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
            @endif
            @if($badgeValue)
                <span class="pc-badge">{{ $badgeValue }}</span>
            @endif
        </a>
        @if($hasSubmenu)
            <ul class="pc-submenu" style="{{ $isGroupActive ? 'display: block;' : 'display: none;' }}">
                @foreach($menuItem['submenu'] as $submenuItem)
                    <li class="pc-item {{ $sidebarService->isRouteActive($submenuItem['route']) ? 'active' : '' }}">
                        <a class="pc-link"
                            href="{{ $sidebarService->isRouteActive($submenuItem['route']) ? 'javascript:;' : route($submenuItem['route']) }}">{{ $submenuItem['title'] }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach
