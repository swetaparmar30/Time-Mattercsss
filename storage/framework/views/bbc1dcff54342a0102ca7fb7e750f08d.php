<?php if(isset($page->meta_title) && $page->meta_title != ''): ?>
    <?php $__env->startSection('title'); ?> <?php echo e($page->meta_title); ?> <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(isset($page->meta_keyword) && $page->meta_keyword != ''): ?>
    <?php $__env->startSection('meta-keywords'); ?> <?php echo e($page->meta_keyword); ?> <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(isset($page->meta_description) && $page->meta_description != ''): ?>
    <?php $__env->startSection('meta-description'); ?> <?php echo e($page->meta_description); ?> <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(isset($page->page_index) && $page->page_index != '' && $page->page_index == 'on'): ?>
<?php $__env->startSection('robots'); ?> index <?php $__env->stopSection(); ?>
<?php else: ?>
<?php $__env->startSection('robots'); ?> noindex <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(isset($page->canonical_url) && $page->canonical_url != '' && $page->canonical_url != null): ?>
<?php $__env->startSection('canonical'); ?> <?php echo e($page->canonical_url); ?> <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
<?php if(isset($page->header_banner) && $page->header_banner != null &&  $page->header_banner != '' && $page->header_banner == '1'): ?>
<?php
if(isset($page->header_banner_img) && $page->header_banner_img != '' && $page->header_banner_img != null)
{
	$banner_img = App\Models\MediaImage::select('name')->where('id', $page->header_banner_img)->first();
	if(isset($banner_img) && $banner_img != '' && $banner_img != null)
	{
			$banner_url = asset('uploads/'.$banner_img->name);
	}else{
			$banner_url = null;
	}
}else{
	$banner_url = null;
}
?>


<section class="how-to-get-married-banner-sec common-text common-padding" style="<?php if(isset($banner_url) && $banner_url != null): ?>
        background-image: url('<?php echo e($banner_url); ?>');
        <?php endif; ?>">
     <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 how-to-get-married-content">
                    <h4 class="petit-text"><?php echo e(isset($page->header_banner_title) ? $page->header_banner_title : ''); ?></h4>
                    <h1><?php echo e(isset($page->header_banner_subtitle) ? $page->header_banner_subtitle : ''); ?></h1>
                </div>
                </div>
            </div>
 </section>
<?php endif; ?>
<?php if(isset($page->page_slider) && $page->page_slider != null &&  $page->page_slider != '' && $page->page_slider == '1'): ?>
<div class="container">
<div class="row">
<div class = "col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
<?php endif; ?>
<?php if(isset($sections) && !empty($sections) && count($sections) > 0): ?>
<?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(isset($section->content) && $section->content != '' && $section->content != null): ?>
<?php
$content = json_decode($section->content);
?>
<?php endif; ?>
<?php if(isset($section->background) && $section->background != '' && $section->background != null): ?>
<?php
$background = json_decode($section->background);
if(isset($background->bg_img) && $background->bg_img != '' && $background->bg_img != null)
{
	$sec_back_img = App\Models\MediaImage::select('name')->where('id', $background->bg_img)->first();
	if(isset($sec_back_img) && $sec_back_img != '' && $sec_back_img != null)
	{
			$sec_bg_url = asset('uploads/'.$sec_back_img->name);
	}else{
			$sec_bg_url = null;
	}
}else{
	$sec_bg_url = null;
}
if(isset($background->bg_color) && $background->bg_color != '' && $background->bg_color != null)
{
	$sec_bg_color = $background->bg_color;
}
?>
<?php endif; ?>
<?php if(isset($section->advance) && $section->advance != '' && $section->advance != null): ?>
<?php
$advance = json_decode($section->advance);
?>
<?php endif; ?>
<section class="<?php echo e(isset($advance->class) ? $advance->class : ''); ?>  common-text common-padding" id="<?php echo e(isset($advance->id) ? $advance->id : ''); ?>" style="<?php if(isset($sec_bg_url) && $sec_bg_url != null): ?>
        background-image: url('<?php echo e($sec_bg_url); ?>');
        <?php endif; ?> <?php if(isset($sec_bg_color) && $sec_bg_color != null): ?>
        background-color: <?php echo e($sec_bg_color); ?>;
        <?php endif; ?>">
	<div class="<?php echo e(isset($content->container) ? $content->container : ''); ?>-md">
		<?php
		if(isset($section->layout) && $section->layout != '')
		{
			$layout = explode(',', $section->layout);
		}
		?>
		<div class="row">
			<?php $__currentLoopData = $layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-xxl-<?php echo e($col); ?> col-xl-<?php echo e($col); ?> col-lg-<?php echo e($col); ?> col-md-12 col-sm-12 col-xs-12">
				<?php if(isset($section) && !empty($section)): ?>
				<?php
				$widgets = $section->getWidgetBySequence($index + 1);
				?>
				<?php if(isset($widgets) && !empty($widgets)): ?>
				<?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
				$title = $widget->widget;
				?>
				<?php if($title->title == 'Our Gallary'): ?>
				<?php if(isset($widget->content) && $widget->content != '' && $widget->content != null): ?>
				<?php
				$widget_content = json_decode($widget->content);
				if(isset($widget_content) && $widget_content != '' && $widget_content != null)
				{
					$gallery_style = isset($widget_content->gallery_style) ? $widget_content->gallery_style : null;
					$gallery_column = isset($widget_content->gallery_column) ? $widget_content->gallery_column : null;
					$gallery_count = isset($widget_content->gallery_count) ? $widget_content->gallery_count : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->style) && $widget->style != '' &&$widget->style != null): ?>
				<?php
				$widget_style = json_decode($widget->style);
				if(isset($widget_style) && $widget_style != '' && $widget_style != null)
				{
					$gallery_title_color = isset($widget_style->gallery_title_color) ? $widget_style->gallery_title_color : null;
					$gallery_title_hover_color = isset($widget_style->gallery_title_hover_color) ? $widget_style->gallery_title_hover_color : null;
					$gallery_subtitle_color = isset($widget_style->gallery_subtitle_color) ? $widget_style->gallery_subtitle_color : null;
					$gallery_subtitle_hover_color = isset($widget_style->gallery_subtitle_hover_color) ? $widget_style->gallery_subtitle_hover_color : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->background) && $widget->background != '' &&$widget->background != null): ?>
				<?php
				$widget_background = json_decode($widget->background);
				if(isset($widget_background) && $widget_background != '' && $widget_background != null)
				{
					$gallery_bg_img = isset($widget_background->gallery_bg_img) ? $widget_background->gallery_bg_img : null;
					if(isset($gallery_bg_img) && $gallery_bg_img != '' && $gallery_bg_img != '')
					{
						$img = App\Models\MediaImage::select('name')->where('id', $gallery_bg_img)->first();
						if(isset($img) && $img != '' && $img != null)
						{
							$g_bg_url = asset('uploads/'.$img->name);
						}else{
							$g_bg_url = null;
						}
					}else{
						$g_bg_url = null;
					}
					$gallery_bg_color = isset($widget_background->gallery_bg_color) ? $widget_background->gallery_bg_color : null;
					$gallery_bg_size = isset($widget_background->gallery_bg_size) ? $widget_background->gallery_bg_size : null;
					$gallery_bg_position = isset($widget_background->gallery_bg_position) ? $widget_background->gallery_bg_position : null;
					$gallery_bg_repeate = isset($widget_background->gallery_bg_repeate) ? $widget_background->gallery_bg_repeate : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->advanced) && $widget->advanced != '' && $widget->advanced != null): ?>
				<?php
				$widget_advanced = json_decode($widget->advanced);
				if(isset($widget_advanced) && $widget_advanced != '' && $widget_advanced != null)
				{
					$gallery_div_id = isset($widget_advanced->id) ? $widget_advanced->id : null;
					$gallery_div_class = isset($widget_advanced->class) ? $widget_advanced->class : null;
				}
				?>
				<?php endif; ?>
				<?php echo app('arrilot.widget')->run('OurGallery',['gallery_style' => $gallery_style ?? null, 'gallery_column' => $gallery_column ?? null, 'gallery_count' => $gallery_count ?? null, 'gallery_title_color' => $gallery_title_color ?? null, 'gallery_title_hover_color' => $gallery_title_hover_color ?? null, 'gallery_subtitle_color' => $gallery_subtitle_color ?? null, 'gallery_subtitle_hover_color' => $gallery_subtitle_hover_color ?? null,'gallery_bg_img' => $g_bg_url, 'gallery_bg_color' => $gallery_bg_color ?? null, 'gallery_bg_size' => $gallery_bg_size ?? null, 'gallery_bg_position' => $gallery_bg_position ?? null, 'gallery_bg_repeate' => $gallery_bg_repeate ?? null,'gallery_div_id' => $gallery_div_id ?? null, 'gallery_div_class' => $gallery_div_class ?? null]); ?>
				<?php endif; ?>
				<?php if($title->title == 'Service Section'): ?>
				<?php if(isset($widget->content) && $widget->content != '' &&$widget->content != null): ?>
				<?php
				$widget_content = json_decode($widget->content);
				if(isset($widget_content) && $widget_content != '' && $widget_content != null)
				{
					$service_style = isset($widget_content->service_style) ? $widget_content->service_style : null;
					$service_count = isset($widget_content->service_count) ? $widget_content->service_count : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->style) && $widget->style != '' &&$widget->style != null): ?>
				<?php
				$widget_style = json_decode($widget->style);
				if(isset($widget_style) && $widget_style != '' && $widget_style != null)
				{
					$service_title_color = isset($widget_style->service_title_color) ? $widget_style->service_title_color : null;
					$service_title_hover_color = isset($widget_style->service_title_hover_color) ? $widget_style->service_title_hover_color : null;
					$service_subtitle_color = isset($widget_style->service_subtitle_color) ? $widget_style->service_subtitle_color : null;
					$service_subtitle_hover_color = isset($widget_style->service_subtitle_hover_color) ? $widget_style->service_subtitle_hover_color : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->background) && $widget->background != '' &&$widget->background != null): ?>
				<?php
				$widget_background = json_decode($widget->background);
				if(isset($widget_background) && $widget_background != '' && $widget_background != null)
				{
					$service_bg_img = isset($widget_background->service_bg_img) ? $widget_background->service_bg_img : null;
					if(isset($service_bg_img) && $service_bg_img != '' && $service_bg_img != '')
					{
						$img = App\Models\MediaImage::select('name')->where('id', $service_bg_img)->first();
						if(isset($img) && $img != '' && $img != null)
						{
							$bg_url = asset('uploads/'.$img->name);
						}else{
							$bg_url = null;
						}
					}else{
						$bg_url = null;
					}
					$service_bg_color = isset($widget_background->service_bg_color) ? $widget_background->service_bg_color : null;
					$service_bg_size = isset($widget_background->service_bg_size) ? $widget_background->service_bg_size : null;
					$service_bg_position = isset($widget_background->service_bg_position) ? $widget_background->service_bg_position : null;
					$service_bg_repeate = isset($widget_background->service_bg_repeate) ? $widget_background->service_bg_repeate : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->advanced) && $widget->advanced != '' && $widget->advanced != null): ?>
				<?php
				$widget_advanced = json_decode($widget->advanced);
				if(isset($widget_advanced) && $widget_advanced != '' && $widget_advanced != null)
				{
					$service_div_id = isset($widget_advanced->id) ? $widget_advanced->id : null;
					$service_div_class = isset($widget_advanced->class) ? $widget_advanced->class : null;
				}
				?>
				<?php endif; ?>
				<?php echo app('arrilot.widget')->run('ServicesSection',['service_style' => $service_style ?? null, 'service_count' => $service_count ?? null, 'service_title_color' => $service_title_color ?? null, 'service_title_hover_color' => $service_title_hover_color ?? null, 'service_subtitle_color' => $service_subtitle_color ?? null, 'service_subtitle_hover_color' => $service_subtitle_hover_color ?? null,'service_bg_img' => $bg_url ?? null, 'service_bg_color' => $service_bg_color ?? null, 'service_bg_size' => $service_bg_size ?? null, 'service_bg_position' => $service_bg_position ?? null, 'service_bg_repeate' => $service_bg_repeate ?? null,'service_div_id' => $service_div_id ?? null, 'service_div_class' => $service_div_class ?? null]); ?>
				<?php endif; ?>


				<?php if($title->title == 'Testimonial Section'): ?>
				<?php if(isset($widget->content) && $widget->content != '' && $widget->content != null): ?>
				<?php
				$widget_content = json_decode($widget->content);
				if(isset($widget_content) && $widget_content != '' && $widget_content != null)
				{
					$testimonial_style = isset($widget_content->testimonial_style) ? $widget_content->testimonial_style : null;
					$testimonial_count = isset($widget_content->testimonial_count) ? $widget_content->testimonial_count : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->style) && $widget->style != '' &&$widget->style != null): ?>
				<?php
				$widget_style = json_decode($widget->style);
				if(isset($widget_style) && $widget_style != '' && $widget_style != null)
				{
					$testi_title_color = isset($widget_style->testimonial_title_color) ? $widget_style->testimonial_title_color : null;
					$testi_title_hover_color = isset($widget_style->testimonial_title_hover_color) ? $widget_style->testimonial_title_hover_color : null;
					$testi_subtitle_color = isset($widget_style->testimonial_subtitle_color) ? $widget_style->testimonial_subtitle_color : null;
					$testi_subtitle_hover_color = isset($widget_style->testimonial_subtitle_hover_color) ? $widget_style->testimonial_subtitle_hover_color : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->background) && $widget->background != '' &&$widget->background != null): ?>
				<?php
				$widget_background = json_decode($widget->background);
				if(isset($widget_background) && $widget_background != '' && $widget_background != null)
				{
					$testi_bg_img = isset($widget_background->testimonial_bg_img) ? $widget_background->testimonial_bg_img : null;
					if(isset($testi_bg_img) && $testi_bg_img != '' && $testi_bg_img != '')
					{
						$img = App\Models\MediaImage::select('name')->where('id', $testi_bg_img)->first();
						if(isset($img) && $img != '' && $img != null)
						{
							$bg_url = asset('uploads/'.$img->name);
						}else{
							$bg_url = null;
						}
					}else{
						$bg_url = null;
					}
					$testi_bg_color = isset($widget_background->testimonial_bg_color) ? $widget_background->testimonial_bg_color : null;
					$testi_bg_size = isset($widget_background->testimonial_bg_size) ? $widget_background->testimonial_bg_size : null;
					$testi_bg_position = isset($widget_background->testimonial_bg_position) ? $widget_background->testimonial_bg_position : null;
					$testi_bg_repeate = isset($widget_background->testimonial_bg_repeate) ? $widget_background->testimonial_bg_repeate : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->advanced) && $widget->advanced != '' && $widget->advanced != null): ?>
				<?php
				$widget_advanced = json_decode($widget->advanced);
				if(isset($widget_advanced) && $widget_advanced != '' && $widget_advanced != null)
				{
					$testi_div_id = isset($widget_advanced->id) ? $widget_advanced->id : null;
					$testi_div_class = isset($widget_advanced->class) ? $widget_advanced->class : null;
				}
				?>
				<?php endif; ?>

				<?php echo app('arrilot.widget')->run('TestimonialSection',['testimonial_style' => $testimonial_style ?? null ?? null, 'testimonial_count' => $testimonial_count ?? null,'testi_title_color' => $testi_title_color ?? null, 'testi_title_hover_color' => $testi_title_hover_color ?? null, 'testi_subtitle_color' => $testi_subtitle_color ?? null, 'testi_subtitle_hover_color' => $testi_subtitle_hover_color ?? null,'testi_bg_img' => $bg_url ?? null, 'testi_bg_color' => $testi_bg_color ?? null, 'testi_bg_size' => $testi_bg_size ?? null, 'testi_bg_position' => $testi_bg_position ?? null, 'widget_background' => $widget_background ?? null, 'testi_bg_repeate' => $testi_bg_repeate ?? null, 'testi_div_id' => $testi_div_id ?? null, 'testi_div_class' => $testi_div_class ?? null]); ?>
				<?php endif; ?>


				<?php if($title->title == 'Posts'): ?>
				<?php if(isset($widget->content) && $widget->content != '' && $widget->content != null): ?>
				<?php
				$widget_content = json_decode($widget->content);
				if(isset($widget_content) && $widget_content != '' && $widget_content != null)
				{
					$post_type = isset($widget_content->post_type) ? $widget_content->post_type : null;
					$post_category = isset($widget_content->post_category) ? $widget_content->post_category : null;
					$post_style = isset($widget_content->post_style) ? $widget_content->post_style : null;
					$post_column = isset($widget_content->column) ? $widget_content->column : null;
					$post_count = isset($widget_content->count) ? $widget_content->count : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->style) && $widget->style != '' &&$widget->style != null): ?>
				<?php
				$widget_style = json_decode($widget->style);
				if(isset($widget_style) && $widget_style != '' && $widget_style != null)
				{
					$post_title_color = isset($widget_style->title_color) ? $widget_style->title_color : null;
					$post_title_hover_color = isset($widget_style->title_hover_color) ? $widget_style->title_hover_color : null;
					$post_subtitle_color = isset($widget_style->subtitle_color) ? $widget_style->subtitle_color : null;
					$post_subtitle_hover_color = isset($widget_style->subtitle_hover_color) ? $widget_style->subtitle_hover_color : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->background) && $widget->background != '' &&$widget->background != null): ?>
				<?php
				$widget_background = json_decode($widget->background);
				if(isset($widget_background) && $widget_background != '' && $widget_background != null)
				{
					$post_bg_img = isset($widget_background->post_bg_img) ? $widget_background->post_bg_img : null;
					if(isset($post_bg_img) && $post_bg_img != '' && $post_bg_img != '')
					{
						$img = App\Models\MediaImage::select('name')->where('id', $post_bg_img)->first();
						if(isset($img) && $img != '' && $img != null)
						{
							$bg_url = asset('uploads/'.$img->name);
						}else{
							$bg_url = null;
						}
					}else{
						$bg_url = null;
					}
					$post_bg_color = isset($widget_background->post_bg_color) ? $widget_background->post_bg_color : null;
					$post_bg_size = isset($widget_background->post_bg_size) ? $widget_background->post_bg_size : null;
					$post_bg_position = isset($widget_background->post_bg_position) ? $widget_background->post_bg_position : null;
					$post_bg_repeate = isset($widget_background->post_bg_repeate) ? $widget_background->post_bg_repeate : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->advanced) && $widget->advanced != '' && $widget->advanced != null): ?>
				<?php
				$widget_advanced = json_decode($widget->advanced);
				if(isset($widget_advanced) && $widget_advanced != '' && $widget_advanced != null)
				{
					$post_div_id = isset($widget_advanced->id) ? $widget_advanced->id : null;
					$post_div_class = isset($widget_advanced->class) ? $widget_advanced->class : null;
				}
				?>
				<?php endif; ?>
				<?php echo app('arrilot.widget')->run('Posts',['post_type' => $post_type ?? null, 'post_category' => $post_category ?? null ,'post_style' => $post_style ?? null, 'post_column' => $post_column ?? null, 'post_count' => $post_count ?? null, 'post_title_color' => $post_title_color ?? null, 'post_title_hover_color' => $post_title_hover_color ?? null, 'post_subtitle_color' => $post_subtitle_color ?? null, 'post_subtitle_hover_color' => $post_subtitle_hover_color ?? null,'post_bg_img' => $bg_url ?? null, 'post_bg_color' => $post_bg_color ?? null, 'post_bg_size' => $post_bg_size ?? null, 'post_bg_position' => $post_bg_position ?? null, 'post_bg_repeate' => $post_bg_repeate ?? null,'post_div_id' => $post_div_id ?? null, 'post_div_class' => $post_div_class ?? null]); ?>
				<?php endif; ?>


				<?php if($title->title == 'Image'): ?>
				<?php if(isset($widget->content) && $widget->content != '' &&$widget->content != null): ?>
				<?php
				$widget_content = json_decode($widget->content);
				if(isset($widget_content) && $widget_content != '' && $widget_content != null)
				{
					$image_bg_img = isset($widget_content->image) ? $widget_content->image : null;
					if(isset($image_bg_img) && $image_bg_img != '' && $image_bg_img != '')
					{
						$img = App\Models\MediaImage::select('name')->where('id', $image_bg_img)->first();
						if(isset($img) && $img != '' && $img != null)
						{
							$bg_url = asset('uploads/'.$img->name);
						}else{
							$bg_url = null;
						}
					}else{
						$bg_url = null;
					}
					$image_link = isset($widget_content->link) ? $widget_content->link : null;
					$image_custom_link = isset($widget_content->custom_link) ? $widget_content->custom_link : null;	
					$image_target = isset($widget_content->target_blank) ? $widget_content->target_blank : null;
					$image_i_alignment = isset($widget_content->i_alignment) ? $widget_content->i_alignment : null;
					$image_alt_tag = isset($widget_content->alt_name) ? $widget_content->alt_name : null;
				}
				?>
				<?php endif; ?>
				<?php echo app('arrilot.widget')->run('Image',['image_bg_img' => $bg_url ?? null, 'image_link' => $image_link ?? null, 'image_custom_link' => $image_custom_link ?? null, 'image_target' => $image_target ?? null, 'image_i_alignment' => $image_i_alignment ?? null, 'image_alt_tag' => $image_alt_tag ?? null]); ?>
				<?php endif; ?>


				<?php if($title->title == 'Heading Tag'): ?>
				<?php if(isset($widget->content) && $widget->content != '' &&$widget->content != null): ?>
				<?php
				$widget_content = json_decode($widget->content);
				if(isset($widget_content) && $widget_content != '' && $widget_content != null)
				{
					$heading_tag = isset($widget_content->tag) ? $widget_content->tag : null;
					$heading_tag_text = isset($widget_content->text) ? $widget_content->text : null;
					$heading_t_alignment = isset($widget_content->t_alignment) ? $widget_content->t_alignment : null;	
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->style) && $widget->style != '' &&$widget->style != null): ?>
				<?php
				$widget_style = json_decode($widget->style);
				if(isset($widget_style) && $widget_style != '' && $widget_style != null)
				{
					$heading_tag_color = isset($widget_style->text_color) ? $widget_style->text_color : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->background) && $widget->background != '' && $widget->background != null): ?>
				<?php
				$widget_background = json_decode($widget->background);
				if(isset($widget_background) && $widget_background != '' && $widget_background != null)
				{
					$heading_bg_color = isset($widget_background->bg_color) ? $widget_background->bg_color : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->advanced) && $widget->advanced != '' && $widget->advanced != null): ?>
				<?php
				$widget_advanced = json_decode($widget->advanced);
				if(isset($widget_advanced) && $widget_advanced != '' && $widget_advanced != null)
				{
					$heading_div_id = isset($widget_advanced->id) ? $widget_advanced->id : null;
					$heading_div_class = isset($widget_advanced->class) ? $widget_advanced->class : null;
				}
				?>
				<?php endif; ?>
				<?php echo app('arrilot.widget')->run('HeadingTag',['heading_tag' => $heading_tag ?? null, 'heading_tag_text' => $heading_tag_text ?? null, 'heading_t_alignment' => $heading_t_alignment ?? null,'heading_div_id' => $heading_div_id ?? null, 'heading_div_class' => $heading_div_class ?? null, 'heading_tag_color' => $heading_tag_color ?? null, 'heading_bg_color' => $heading_bg_color ?? null]); ?>
				<?php endif; ?>



				<?php if($title->title == 'Button'): ?>
				<?php if(isset($widget->content) && $widget->content != '' &&$widget->content != null): ?>
				<?php
				$widget_content = json_decode($widget->content);
				if(isset($widget_content) && $widget_content != '' && $widget_content != null)
				{
					$button_text = isset($widget_content->button_text) ? $widget_content->button_text : null;
					$button_link = isset($widget_content->button_link) ? $widget_content->button_link : null;	
					$button_target = isset($widget_content->target_blank) ? $widget_content->target_blank : null;	
					$button_b_alignment = isset($widget_content->b_alignment) ? $widget_content->b_alignment : null;	
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->advanced) && $widget->advanced != '' && $widget->advanced != null): ?>
				<?php
				$widget_advanced = json_decode($widget->advanced);
				if(isset($widget_advanced) && $widget_advanced != '' && $widget_advanced != null)
				{
					$button_div_id = isset($widget_advanced->id) ? $widget_advanced->id : null;
					$button_div_class = isset($widget_advanced->class) ? $widget_advanced->class : null;
				}
				?>
				<?php endif; ?>
				<?php echo app('arrilot.widget')->run('Button',['button_text' => $button_text ?? null, 'button_link' => $button_link ?? null, 'button_target' => $button_target ?? null, 'button_b_alignment' => $button_b_alignment ?? null,'button_div_id' => $button_div_id ?? null, 'button_div_class' => $button_div_class ?? null]); ?>
				<?php endif; ?>





				<?php if($title->title == 'Text Editor'): ?>
				<?php if(isset($widget->content) && $widget->content != '' && $widget->content != null): ?>
				<?php
				$widget_content = json_decode($widget->content);;
				if(isset($widget_content) && $widget_content != '' && $widget_content != null)
				{
					$editor_content = isset($widget_content->text_content) ? $widget_content->text_content : null;
					$editor_t_alignment = isset($widget_content->t_alignment) ? $widget_content->t_alignment : null;	
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->background) && $widget->background != '' && $widget->background != null): ?>
				<?php
				$widget_background = json_decode($widget->background);
				if(isset($widget_background) && $widget_background != '' && $widget_background != null)
				{
					$editor_bg_img = isset($widget_background->bg_img) ? $widget_background->bg_img : null;
					if(isset($editor_bg_img) && $editor_bg_img != '' && $editor_bg_img != '')
					{
						$img = App\Models\MediaImage::select('name')->where('id', $editor_bg_img)->first();
						if(isset($img) && $img != '' && $img != null)
						{
							$bg_url = asset('uploads/'.$img->name);
						}else{
							$bg_url = null;
						}
					}else{
						$bg_url = null;
					}
					$editor_bg_color = isset($widget_background->bg_color) ? $widget_background->bg_color : null;
					$editor_bg_size = isset($widget_background->bg_size) ? $widget_background->bg_size : null;
					$editor_bg_position = isset($widget_background->bg_position) ? $widget_background->bg_position : null;
					$editor_bg_repeate = isset($widget_background->bg_repeate) ? $widget_background->bg_repeate : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->advanced) && $widget->advanced != '' && $widget->advanced != null): ?>
				<?php
				$widget_advanced = json_decode($widget->advanced);
				if(isset($widget_advanced) && $widget_advanced != '' && $widget_advanced != null)
				{
					$editor_div_id = isset($widget_advanced->id) ? $widget_advanced->id : null;
					$editor_div_class = isset($widget_advanced->class) ? $widget_advanced->class : null;
				}
				?>
				<?php endif; ?>
				<?php echo app('arrilot.widget')->run('TextEditor',['editor_content' => $editor_content ?? null, 'editor_t_alignment' => $editor_t_alignment ?? null, 'editor_bg_img' => $bg_url ?? null, 'editor_bg_color' => $editor_bg_color ?? null,'editor_bg_size' => $editor_bg_size ?? null, 'editor_bg_position' => $editor_bg_position ?? null,'editor_bg_repeate' => $editor_bg_repeate ?? null, 'editor_div_id' => $editor_div_id ?? null, 'editor_div_class' => $editor_div_class ?? null]); ?>
				<?php endif; ?>
				<?php if($title->title == 'Contact Form'): ?>
				<?php if(isset($widget->background) && $widget->background != '' && $widget->background != null): ?>
				<?php
				$widget_background = json_decode($widget->background);
				if(isset($widget_background) && $widget_background != '' && $widget_background != null)
				{
					$form_bg_img = isset($widget_background->contact_bg_img) ? $widget_background->contact_bg_img : null;
					if(isset($form_bg_img) && $form_bg_img != '' && $form_bg_img != '')
					{
						$form_img = App\Models\MediaImage::select('name')->where('id', $form_bg_img)->first();
						if(isset($form_img) && $form_img != '' && $form_img != null)
						{
							$form_bg_url = asset('uploads/'.$form_img->name);
						}else{
							$form_bg_url = null;
						}
					}else{
						$form_bg_url = null;
					}
					$form_bg_color = isset($widget_background->contact_bg_color) ? $widget_background->contact_bg_color : null;
					$form_bg_size = isset($widget_background->contact_bg_size) ? $widget_background->contact_bg_size : null;
					$form_bg_position = isset($widget_background->contact_bg_position) ? $widget_background->contact_bg_position : null;
					$form_bg_repeate = isset($widget_background->contact_bg_repeate) ? $widget_background->contact_bg_repeate : null;
				}
				?>
				<?php endif; ?>
				<?php if(isset($widget->advanced) && $widget->advanced != '' && $widget->advanced != null): ?>
				<?php
				$widget_advanced = json_decode($widget->advanced);
				if(isset($widget_advanced) && $widget_advanced != '' && $widget_advanced != null)
				{
					$form_div_id = isset($widget_advanced->id) ? $widget_advanced->id : null;
					$form_div_class = isset($widget_advanced->class) ? $widget_advanced->class : null;
				}
				?>
				<?php endif; ?>
				<?php echo app('arrilot.widget')->run('ContactForm',['form_bg_img' => $form_bg_url ?? null, 'form_bg_color' => $form_bg_color ?? null, 'form_bg_size' => $form_bg_size ?? null, 'form_bg_position' => $form_bg_position ?? null, 'form_bg_repeate' => $form_bg_repeate ?? null,'form_div_id' => $form_div_id ?? null, 'form_div_class' => $form_div_class ?? null]); ?>
				<?php endif; ?>
				<!-- <p><?php echo e($title->title); ?></p> -->
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<?php endif; ?>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(isset($page->page_slider) && $page->page_slider != null &&  $page->page_slider != '' && $page->page_slider == '1'): ?>
</div>
<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 common-padding">
	<?php
	$sidebar = App\Models\SidebarWidget::where('sidebar_id',1)->orderby('sequence')->get();
	?>
	<?php if(isset($sidebar) && count($sidebar) > 0): ?>
	<?php $__currentLoopData = $sidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s_widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if(isset($s_widget->included_pages) && $s_widget->included_pages != null  && $s_widget->included_pages != ''): ?>
	<?php
		$explode = explode(',', $s_widget->included_pages);
	?>
	<?php if(isset($explode) && in_array($page->id, $explode)): ?>
	<?php if(isset($s_widget->widget_name) && $s_widget->widget_name != null && $s_widget->widget_name == 'Image'): ?>
	
	<?php
	$s_image = json_decode($s_widget->properties);
	if(isset($s_image) && $s_image != '' && $s_image != null)
	{
		$image_bg_img = isset($s_image->img_id) ? $s_image->img_id : null;
		if(isset($image_bg_img) && $image_bg_img != '' && $image_bg_img != '')
		{
			$img = App\Models\MediaImage::select('name')->where('id', $image_bg_img)->first();
			if(isset($img) && $img != '' && $img != null)
			{
				$bg_url = asset('uploads/'.$img->name);
			}else{
				$bg_url = null;
			}
		}else{
				$bg_url = null;
			}
	}
	?>
	<div class="mt-3 dynamic_sidebar_pages" style="padding: 10px !important;">
	<img src="<?php echo e($bg_url); ?>" class="img-fluid" alt="">
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
	<?php if(isset($s_widget->included_pages) && $s_widget->included_pages != null  && $s_widget->included_pages != ''): ?>
	<?php
		$explode = explode(',', $s_widget->included_pages);
	?>
	<?php if(isset($explode) && in_array($page->id, $explode)): ?>
	<?php if(isset($s_widget->widget_name) && $s_widget->widget_name != null && $s_widget->widget_name == 'Text Editor'): ?>
	<?php
	$s_editor = json_decode($s_widget->properties);
	?>
	<?php if(isset($s_editor->content) && $s_editor->content != '' && $s_editor->content != null): ?>
	<div class="mt-3 dynamic_sidebar_pages">
	<?php echo html_entity_decode($s_editor->content); ?>

	</div>
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
	<?php if(isset($s_widget->included_pages) && $s_widget->included_pages != null  && $s_widget->included_pages != ''): ?>
	<?php
		$explode = explode(',', $s_widget->included_pages);
	?>
	<?php if(isset($explode) && in_array($page->id, $explode)): ?>
	<?php if(isset($s_widget->widget_name) && $s_widget->widget_name != null && $s_widget->widget_name == 'Recent Posts'): ?>
	<?php
	$s_post = json_decode($s_widget->properties);
	?>
	<?php if(isset($s_post) && $s_post != '' && $s_post != null): ?>
	<?php
	$p_count = ($s_post->count ?? 5);
	$posts = App\Models\Article::take($p_count)->latest()->get();
	?>
	<div class="mt-3 dynamic_sidebar_pages">
		<h3><?php echo e(isset($s_post->title) ? $s_post->title : ''); ?></h3>
	<ul>
		<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li><a> <?php echo e(isset($val->title) ? $val->title : ''); ?></a>
		</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
	<?php if(isset($s_widget->included_pages) && $s_widget->included_pages != null  && $s_widget->included_pages != ''): ?>
	<?php
		$explode = explode(',', $s_widget->included_pages);
	?>
	<?php if(isset($explode) && in_array($page->id, $explode)): ?>
	<?php if(isset($s_widget->widget_name) && $s_widget->widget_name != null && $s_widget->widget_name == 'Category List'): ?>
	<?php
	$s_category = json_decode($s_widget->properties);
	?>
	<?php if(isset($s_category) && $s_category != '' && $s_category != null): ?>
	<?php
	$c_count = ($s_category->count ?? 5);
	$cats = App\Models\Category::take($c_count)->latest()->get();
	?>
	<div class="mt-3 dynamic_sidebar_pages">
		<h3><?php echo e(isset($s_category->title) ? $s_category->title : ''); ?></h3>
	<ul>
		<?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li><a> <?php echo e(isset($val->category) ? $val->category : ''); ?></a>
		</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
	<?php if(isset($s_widget->included_pages) && $s_widget->included_pages != null  && $s_widget->included_pages != ''): ?>
	<?php
		$explode = explode(',', $s_widget->included_pages);
	?>
	<?php if(isset($explode) && in_array($page->id, $explode)): ?>
	<?php if(isset($s_widget->widget_name) && $s_widget->widget_name != null && $s_widget->widget_name == 'How To Get Married List'): ?>
	<?php
	$s_married = json_decode($s_widget->properties);
	?>
	<?php if(isset($s_married) && $s_married != '' && $s_married != null): ?>
	<?php
	$m_count = ($s_married->count ?? 5);
	$married = App\Models\Married::take($m_count)->latest()->get();
	?>
	<div class="mt-3 dynamic_sidebar_pages">
		<h3><?php echo e(isset($s_married->title) ? $s_married->title : ''); ?></h3>
	<ul>
		<?php $__currentLoopData = $married; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li><a> <?php echo e(isset($val->title) ? $val->title : ''); ?></a>
		</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
</div>
</div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/frontend/custom_page_builder.blade.php ENDPATH**/ ?>