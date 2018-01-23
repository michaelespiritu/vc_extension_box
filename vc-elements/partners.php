<?php

/*
Element Description: Partners Box
*/


class vcPartnersBox extends WPBakeryShortCode {

    public $text_domain = 'vc_partners';

    function __construct() {
        add_action( 'init', array( $this, 'vc_partners_mapping' ) );
        add_shortcode( 'vc_partners_box', array( $this, 'vc_partners_html' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'front_end_css' ) );
    }

    function front_end_css(){

        wp_enqueue_style( 'partners-css', get_stylesheet_directory_uri().'/vc-elements/css/partners.css', '', '' );

    }


    public function vc_partners_mapping() {

      if ( !defined( 'WPB_VC_VERSION' ) ) {
          return;
      }


      vc_map(

          array(
              'name' => __('Partners Box', $text_domain),
              'base' => 'vc_partners_box',
              'description' => __('Partners VC box', $text_domain),
              'category' => __('My Custom Elements', $text_domain),
              'icon' => get_stylesheet_directory_uri().'/vc-elements/assets/vc_icon_partners.png',
              'params' => array(

                  array(
                      'type' => 'textfield',
                      'holder' => 'div',
                      'class' => 'partners-name',
                      'heading' => __( 'Name', $text_domain ),
                      'param_name' => 'partnername',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'textfield',
                      'holder' => 'div',
                      'class' => 'partners-title',
                      'heading' => __( 'Title', $text_domain ),
                      'param_name' => 'title',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),


                  array(
                      'type' => 'textarea_html',
                      'class' => 'partners-description',
                      'heading' => __( 'Partners Description', $text_domain ),
                      'param_name' => 'content',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'textfield',
                      'holder' => 'div',
                      'class' => 'partners-number',
                      'heading' => __( 'Phone Number', $text_domain ),
                      'param_name' => 'phonenumber',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'textfield',
                      'holder' => 'div',
                      'class' => 'partners-email',
                      'heading' => __( 'Email', $text_domain ),
                      'param_name' => 'email',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'attach_image',
                      'class' => 'partners-image',
                      'heading' => __( 'Image', $text_domain ),
                      'param_name' => 'partnersimage',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

              )
          )
      );

    }



    public function vc_partners_html( $atts , $content = null) {


      extract(
          shortcode_atts(
              array(
                  'partnername'   => '',
                  'title' => '',
                  'phonenumber' => '',
                  'email' => '',
                  'partnersimage' => ''
              ),
              $atts
          )
      );

      $content = wpb_js_remove_wpautop($content, true);
      $img = wp_get_attachment_image_src($partnersimage, "large");

      $html = "<div class='partners-box vc_row'>";

      $html .= "<div class='vc_col-sm-3'>";
      $html .= "<p><img src='{$img[0]}' class='partner-image'></p>";
      $html .= "</div>";

      $html .= "<div class='vc_col-sm-9'>";
      $html .= "<h4 class='partner-name'>{$partnername}</h4>";
      $html .= "<h6 class='partner-title'>{$title}</h6>";
      $html .= "<p>{$content}</p>";
      $html .= "<p class='partner-contact'>{$phonenumber}<br><a href='{$email}'>{$email}</a></p>";
      $html .= "</div>";

      $html .= "</div>";



      return $html;

    }

}


new vcPartnersBox();
