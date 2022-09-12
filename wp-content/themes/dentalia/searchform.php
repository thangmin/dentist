<form class="search-form" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
    <div class="wrap">
    	<label class="screen-reader-text"><?php echo esc_html('Search for:', 'dentalia');?></label>
        <input class="searchfield" type="text" value="" placeholder="<?php esc_html_e('Search','dentalia')?>" name="s" />
        <input class="search-submit" type="submit" value="&#xEA06;" />
    </div>
</form>