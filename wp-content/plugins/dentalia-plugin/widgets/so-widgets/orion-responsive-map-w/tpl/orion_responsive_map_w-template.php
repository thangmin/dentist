<?php
/* prepare input variables */

$embedcode = $instance['embedcode'];
$map_height = $instance['map_height'];
$css_style = "style=height:".$map_height."px;";
?>

<div class="maps-wrapper relative" <?php echo esc_attr($css_style);?>>		
	<?php echo $embedcode;?>			
</div>

