<?php $__env->startSection('title'); ?> Service Areas | Time Master <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?>Explore Clark & Sons service areas across Maryland and Delaware. Providing reliable garage door installation, repair, and service wherever you are. Call Now <?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<?php $setting = App\Models\Setting::first(); ?>


    <?php echo $__env->make('frontend.includes.servicesareas-area-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  $(document).ready(function () {
    $('.each-offer-item').on('click', function (e) {
      e.preventDefault();

      $('.each-offer-item').removeClass('active');
      $('.tab-description').removeClass('active').stop(true, true).slideUp(250);

      $(this).addClass('active');

      var descSelector = $(this).data('desc');
      if (descSelector) {
        $(descSelector).addClass('active').hide().slideDown(250);
      }

    });
    $('.tab-description').not('.active').hide();
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/frontend/landing_page/servicesareas.blade.php ENDPATH**/ ?>