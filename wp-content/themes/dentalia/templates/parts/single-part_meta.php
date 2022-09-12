<?php
$num_comments = get_comments_number( get_the_ID() ); 
?>

<div class="entry-meta">
<span class="time updated">
	<?php the_time(get_option('date_format'),'','', FALSE) ?>
</span>

<span class="author vcard"><?php _e( 'by ', 'dentalia' );?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>	
<span class="category"><?php _e('in','dentalia');?> <?php the_category('&nbsp;&bull;&nbsp;'); ?></span>
		
	<?php
	$write_comments = "";
	if ( comments_open() ) {
		if ( $num_comments == 0 ) {
			$write_comments = '';
		} elseif ( $num_comments > 1 ) {
			$comments = $num_comments . esc_html__(' Comments', 'dentalia' );
			$write_comments = '<a class="comments-link" href="' . get_comments_link() .'">'. $comments.'</a>';
		} else {
			$comments = esc_html__('1 Comment', 'dentalia' );
			$write_comments = '<a class="comments-link" href="' . get_comments_link() .'">'. $comments.'</a>';
		}
	} 
	
	echo wp_kses($write_comments, array(
		'span' => array(),
		'a' => array(
	        'href' => array(),
	        'class' => array()
	    )
	));	
	?>
</div>	
