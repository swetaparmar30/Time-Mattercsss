<header class="portal-header">
  <?php
    use App\Models\RoleCategory;
    $userRole = auth()->user()->role;
    
    
  ?>
  <div class="portal-header-inner">
    <div class="portal-header-left">
      <div class="portal-logo-wrap">
        <img src="<?php echo e(asset('front-assets/src/userlogin/images/Time-matters-header-logo.webp')); ?>" alt="TimeMatters logo">
      </div>
      <span class="portal-header-divider" aria-hidden="true"></span>
      <span class="portal-title"> <?php echo e(ucwords(str_replace('-', ' ', $userRole))); ?></span>
    </div>

    <div class="portal-header-right">
      <label class="portal-search" aria-label="Search portal">
        <img src="<?php echo e(asset('front-assets/src/userlogin/dashbord/search-icon.svg')); ?>" alt="">
        <input type="search" placeholder="Search">
      </label>
      <div class="portal-user">
        <img class="avatar" src="<?php echo e(asset('front-assets/src/userlogin/dashbord/default-user.png')); ?>    " alt="User avatar">
        <div class="portal-user-info">
          <strong><?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?></strong>
          
        </div>
        <button class="portal-user-toggle" id="profileMenuToggle" type="button" aria-label="Open profile menu" aria-expanded="false" aria-controls="profilePopup">
          <span aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </div>
</header>

<div class="profile-popup-overlay" id="profilePopup" hidden>
  <div class="profile-popup-card" role="dialog" aria-modal="true" aria-labelledby="profilePopupTitle">
    <button class="profile-popup-close" id="profilePopupClose" type="button" aria-label="Close profile menu">&times;</button>
    <p class="profile-popup-role" id="profilePopupTitle"><?php echo e(ucwords(str_replace('-', ' ', $userRole))); ?></p>
    <img class="profile-popup-avatar" src="<?php echo e(asset('front-assets/src/userlogin/dashbord/default-user.png')); ?>" alt="User avatar">
    <p class="profile-popup-greeting" id="profilePopupGreeting">Hi, <?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?></p>
    <div class="profile-popup-actions">
      
      <a href="#" class="profile-popup-action" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
      <form id="logout-form" action="<?php echo e(route('frontend.logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
      </form>
    </div>
    
  </div>
</div>
<?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/user-layout/layout/header.blade.php ENDPATH**/ ?>