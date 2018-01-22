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
  //echo get_stylesheet_directory(); die;
    require_once( get_stylesheet_directory().'/vc-elements/partners.php' );

}
