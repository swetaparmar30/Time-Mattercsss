
<?php
if(isset($config['button_link']) && $config['button_link'] != null)
{
	$link = $config['button_link'];
}else{
	$link = '';
}
if(isset($config['button_text']) && $config['button_text'] != null)
{
	$text = $config['button_text'];
}else{
	$text = '';
}
if(isset($config['button_target']) && $config['button_target'] != null && $config['button_target'] == 1)
{
	$target = '_blank';
}else{
	$target = '';
}
?>
<a href="<?php echo e($link); ?>" target="<?php echo e($target); ?>" class="common-btn <?php echo e(isset($config['button_div_id']) && $config['button_div_id'] != null ? $config['button_div_id'] : ''); ?>" id="<?php echo e(isset($config['button_div_class']) && $config['button_div_class'] != null ? $config['button_div_class'] : ''); ?>" ><?php echo e($text); ?></a><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/widgets/button.blade.php ENDPATH**/ ?>