<?php
/**
 * Your code here.
 *
 */


//Add the line below to functions.php of theme

 if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {


   // Before VC Init
  add_action( 'vc_before_init', 'vc_before_init_actions' );



}

function vc_before_init_actions() {

    require_once( get_stylesheet_directory().'/vc-elements/partners.php' );
    require_once( get_stylesheet_directory().'/vc-elements/testimonials.php' );
    require_once( get_stylesheet_directory().'/vc-elements/bulletinboard.php' );
    require_once( get_stylesheet_directory().'/vc-elements/simple-image-box-with-label.php' );

}
