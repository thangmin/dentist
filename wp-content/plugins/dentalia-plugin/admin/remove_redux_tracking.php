<?php 
/*remove anoying redux connect*/
if ( ! class_exists( 'Redux_Connection_Banner', false ) ) {
  class Redux_Connection_Banner {
      public static function init() {
        return;
      }
      public static function tos_blurb( $campaign = 'options_panel' ) {
        return sprintf(
          __( 'By clicking the <strong>Register</strong> button, you agree to our <a href="%1$s" target="_blank">terms of service</a>, to create an account, and to share details of your usage metrics with Redux.io.', 'redux-framework' ),
          Redux_Functions_Ex::get_site_utm_url( 'terms', 'appsero', 'activate', $campaign )
        );
      }    
  }
}
/*remove anoying redux gutenberg notices*/
if ( ! class_exists( 'Redux_Enable_Gutenberg', false ) ) {
  class Redux_Enable_Gutenberg {
      public static function init() {
        return;
      }
  }
}

/* redux newsflash */
if ( ! class_exists( 'reduxNewsflash', false ) ) {
  class reduxNewsflash {
      public static function init() {
        return;
      }
  }
}


/* the class can be tested with var_dump(get_class_methods('Redux_Connection_Banner')); */