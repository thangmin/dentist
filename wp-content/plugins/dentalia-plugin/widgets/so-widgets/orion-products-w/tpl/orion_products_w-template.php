<?php //title
if(!empty($instance['title'])) : ?>
	<div class="widget-header">
		<h2 class="h5 widget-title"><?php echo esc_html($instance['title']);?></h2>
	</div>
<?php endif; ?>

<?php 
$per_row = $instance['per_row'];
$limit = $instance['limit'];
$orderby = $instance['orderby'];
$order = $instance['order'];
$display_only = $instance['display_only'];
$p_categories = $instance['p_categories'];
$p_tags = $instance['p_tags'];

if ( class_exists( 'WooCommerce' ) ) :?>
	<div class="orion-products-w">
		<?php 
		$shortcode = '[products';	
		$shortcode .= " columns='".esc_html($per_row)."'";
		$shortcode .= " limit='".esc_html($limit)."'";
		$shortcode .= " orderby='".esc_html($orderby)."'";
		$shortcode .= " order='".esc_html($order)."'";

		if ($display_only != 'all') {
			$shortcode .= " ". esc_html($display_only) . "='true'";
		}
		/*categories*/
		if (is_string($p_categories)) {
			if ($p_categories != 'all') {
				$shortcode .= " category='".esc_html($p_categories)."'";
			}
		} else if (is_array($p_categories)) {
			if ($p_categories[0]!= 'all') {
				$shortcode .= esc_attr(" cat_operator='IN' category='".implode(', ', $p_categories)."'");
				// $shortcode .= esc_attr(" cat_operator='IN'");	
			}
		}		
		/*tags*/
		if (is_string($p_tags)) {
			if ($p_tags != 'all') {
				$shortcode .= " tag='".esc_html($p_tags)."'";
			}
		} else if (is_array($p_tags)) {
			if ($p_tags[0]!= 'all') {
				$shortcode .= " tag_operator='IN' tag='".implode(', ', $p_tags)."'";
			}
		}
		$shortcode .= "]";
		echo do_shortcode($shortcode);?>

	</div>
<?php else :?>
	<div class="orion-products-w">
		<div class="alert alert-danger">
		<?php echo esc_html__('This widget requires WooCommerce to work.', 'dentalia');?>
		</div>
	</div>
<?php endif;