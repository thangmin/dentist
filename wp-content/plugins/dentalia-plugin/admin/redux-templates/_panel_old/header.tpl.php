<?php
    /**
     * The template for the panel header area.
     * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
     *
     * @author      Redux Framework
     * @package     ReduxFramework/Templates
     * @version:    3.5.4.18
     */

    $tip_title = __( 'Developer Mode Enabled', 'redux-framework' );

    if ( $this->parent->dev_mode_forced ) {
        $is_debug     = false;
        $is_localhost = false;

        $debug_bit = '';
        if ( Redux_Helpers::isWpDebug() ) {
            $is_debug  = true;
            $debug_bit = __( 'WP_DEBUG is enabled', 'redux-framework' );
        }

        $localhost_bit = '';
        if ( Redux_Helpers::isLocalHost() ) {
            $is_localhost  = true;
            $localhost_bit = __( 'you are working in a localhost environment', 'redux-framework' );
        }

        $conjunction_bit = '';
        if ( $is_localhost && $is_debug ) {
            $conjunction_bit = ' ' . __( 'and', 'redux-framework' ) . ' ';
        }

        $tip_msg = __( 'This has been automatically enabled because', 'redux-framework' ) . ' ' . $debug_bit . $conjunction_bit . $localhost_bit . '.';
    } else {
        $tip_msg = __( 'If you are not a developer, your theme/plugin author shipped with developer mode enabled. Contact them directly to fix it.', 'redux-framework' );
    }

?>
<div id="orion-to-header">
    <?php if ( ! empty( $this->parent->args['display_name'] ) ) { ?>
        <div class="display_header">
            <div class="left-column">
                <a href="https://orionthemes.com" class="logo"><img src="<?php echo ORION_PLUGIN_PATH;?>img/orionthemes-logo.png" alt="OrionThemes"/></a>
            </div>
            <div class="right-column">
                <div class="wrapper text-right">
                <?php $orion_theme_data = wp_get_theme();
                if($orion_theme_data->get( 'Template' ) == "") {
                    $orion_theme_textDomain= $orion_theme_data->get( 'TextDomain' );
                } else {
                    $orion_theme_textDomain = $orion_theme_data->get( 'Template' );
                }
                ?>
                <a class="button text-left" target="_blank" href="http://orionthemes.com/documentation/<?php echo $orion_theme_textDomain;?>" class="documentation">Documentation</a>
                <a class="button text-left" target="_blank" href="https://orionthemes.ticksy.com/">Support</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    <?php } ?>

    <div class="clear"></div>
</div>