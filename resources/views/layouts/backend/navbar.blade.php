<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
        <a href="#" class="b-brand">
            <span class="b-title">Time Master</span>
        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="javascript:">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            <li class="nav-item">
                <a class="" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            @if(auth()->user()->role !== 'dealer' && auth()->user()->role !== 'marketing')
            <li class="nav-item">
                <a class="" href="{{ route('users') }}">User</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="" href="{{ route('setting.index') }}">Settings</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="p-0">
                <a href="{{route('home')}}" class="" target = "_blank">
                        <i class="fa fa-globe" aria-hidden="true" style="font-size: 18px;"></i></a>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{ asset('assets/img/new-profile.svg') }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{ isset(Auth::user()->name) ? Auth::user()->name : 'Admin'}}</span>
                            <!-- <a href="{{ route('logout') }}" class="dud-logout" title="Logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="feather icon-log-out"></i>
                            </a> -->
                        </div>
                        <ul class="pro-body">
                            @if(auth()->user()->role !== 'dealer')
                            <li><a href="{{ route('setting.index') }}" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                            @endif
                            <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="feather icon-log-out"></i> Log Out</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>