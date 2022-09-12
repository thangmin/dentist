<?php  //prepare variables
	$heading = $instance['title'];
	$case = $instance['case'];
	$title_bold = $instance['title_bold'];
	$headingsize = $instance['size'];
	$text_color = $instance['text_color'];
	$separator_style = $instance['separator_style'];
	$text_align = $instance['text_align'];
	$heading_margin = $instance['heading_margin'];
	if ($heading_margin == '') {
		$heading_margin = 0;
	}
	$heading_margin = (int)$heading_margin;
	$heading_margin .= 'px;';
	$heading_size = $instance['heading_size'];

	if ($heading_size == 'default') {
		$heading_style = $headingsize;
	} else {
		$heading_style = $heading_size;
	}
	
?>
 
<?php if(!empty($instance['title'])) : ?>
	<?php 
	$html_classes = ' '. $separator_style . ' ' . $text_align . ' style-' . $heading_style . ' style-' . $text_color;

	$kses_array = array(
	    'span' => array(
	        'style' => array(),
	        'strong' => array(),
	        'class' => array(),
	        'id' => array(),
	        'em' => array(),
	    ),
	    'strong' => array(),
	    'em' => array(),
	);?>
	<?php 
		$heading_class = $text_color;
		if ($case == true) {
			$heading_class .= ' text-uppercase';
		}
		if ($title_bold == true) {
			$heading_class .= ' text-bold';
		}
		if (isset($heading_size) && $heading_size != 'default' ) {
			$heading_class .= ' '. $heading_size;
		}	
	?>
	<div class="row orion-heading" style="margin-bottom:<?php echo esc_attr($heading_margin);?>">
		<div class="col-md-12 <?php echo esc_attr($html_classes);?>">
			<<?php echo esc_attr($headingsize);?> class="<?php echo esc_attr($heading_class);?>">
				<?php echo wp_kses($heading, $kses_array);?>
			</<?php echo esc_attr($headingsize);?>>
		</div>
	</div>

<?php endif; ?>	