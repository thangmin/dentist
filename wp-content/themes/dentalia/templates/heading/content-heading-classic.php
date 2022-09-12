<?php 
//check meta data, if we need to override anything
$allowed_html = array(
     'style' => array(
         'background-image' => array(),
         'padding-top' => array(),
         'padding-bottom' => array(),
    )
);

$heading_style = orion_heading_style();
$orion_heading_classes = orion_heading_classes();
$orion_display_heading = orion_get_option('heading-onoff-classic', false, '1');
?>

<div class="page-heading primary-color-bg section heading-classic <?php echo esc_attr($orion_heading_classes);?>" <?php echo wp_kses($heading_style, $allowed_html);?>>
	<div class="container">
		<?php if ($orion_display_heading != '0') :?>
			<div class="tablet-text-center desktop-left inline-block lg-absolute min-50">
				<h1 class="entry-title"><?php orion_page_title(); ?></h1>
			</div>
		<?php endif;?>
		<div class="tablet-text-center desktop-right inline-block">
			<?php orion_get_breadcrumbs('classic'); ?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>