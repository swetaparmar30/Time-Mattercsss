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
                <a class="" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
            </li>
            <?php if(auth()->user()->role !== 'dealer' && auth()->user()->role !== 'marketing'): ?>
            <li class="nav-item">
                <a class="" href="<?php echo e(route('users')); ?>">User</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="" href="<?php echo e(route('setting.index')); ?>">Settings</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="p-0">
                <a href="<?php echo e(route('home')); ?>" class="" target = "_blank">
                        <i class="fa fa-globe" aria-hidden="true" style="font-size: 18px;"></i></a>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="<?php echo e(asset('assets/img/new-profile.svg')); ?>" class="img-radius" alt="User-Profile-Image">
                            <span><?php echo e(isset(Auth::user()->name) ? Auth::user()->name : 'Admin'); ?></span>
                            <!-- <a href="<?php echo e(route('logout')); ?>" class="dud-logout" title="Logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="feather icon-log-out"></i>
                            </a> -->
                        </div>
                        <ul class="pro-body">
                            <?php if(auth()->user()->role !== 'dealer'): ?>
                            <li><a href="<?php echo e(route('setting.index')); ?>" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="feather icon-log-out"></i> Log Out</a></li>
                        </ul>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header><?php /**PATH C:\wamp64\www\Time\9-april\resources\views/layouts/backend/navbar.blade.php ENDPATH**/ ?>