<?php  //prepare variables
$cf7_id = $instance['cf7_option'];
$cf7_name = get_post_field( 'post_name', $cf7_id); 
?>
<?php echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" title="' .$cf7_name . ' "]');?>