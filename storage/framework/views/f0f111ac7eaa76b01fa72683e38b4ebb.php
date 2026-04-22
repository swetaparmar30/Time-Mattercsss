
<?php
if(isset($config['image_link']) && $config['image_link'] != null && $config['image_link'] == 'media_file')
{
	$link = $config['image_bg_img'];

}else{
	$link = $config['image_custom_link'];
}
if(isset($config['image_target']) && $config['image_target'] != null && $config['image_target'] == 'on')
{
	$target = '_blank';

}else{
	$target = '';
}
?>
<a <?php if(isset($link) && $link != '' && $link != null): ?> href="<?php echo e(isset($link) ? $link : '#'); ?>" <?php endif; ?> target="<?php echo e(isset($target) ? $target : ''); ?>">
<img src="<?php echo e($config['image_bg_img']); ?>" class="img-fluid" alt="<?php echo e(isset($config['image_alt_tag']) ? $config['image_alt_tag'] : ''); ?>" loading="lazy">
</a><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/widgets/image.blade.php ENDPATH**/ ?>