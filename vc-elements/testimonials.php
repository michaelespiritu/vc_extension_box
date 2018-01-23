<?php

/*
Element Description: Testimonials Box
*/


class vcTestimonialsBox extends WPBakeryShortCode {

    public $text_domain = 'vc_testimonials';

    function __construct() {
        add_action( 'init', array( $this, 'vc_testimonials_mapping' ) );
        add_shortcode( 'vc_testimonials', array( $this, 'vc_testimonial_html' ) );
    }


    public function vc_testimonials_mapping() {

      if ( !defined( 'WPB_VC_VERSION' ) ) {
          return;
      }


      vc_map(

          array(
              'name' => __('Testimonials Box', $text_domain),
              'base' => 'vc_testimonials',
              'description' => __('Testimonials VC box', $text_domain),
              'category' => __('My Custom Elements', $text_domain),
              'icon' => get_stylesheet_directory_uri().'/vc-elements/assets/vc_icon_testimonial.png',
              'params' => array(

                  array(
                      'type' => 'textarea_html',
                      'holder' => 'div',
                      'class' => 'testimonial',
                      'heading' => __( 'Testimonial', $text_domain ),
                      'param_name' => 'content',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'attach_image',
                      'class' => 'testimonial-image',
                      'heading' => __( 'Image', $text_domain ),
                      'param_name' => 'testimonialimage',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

              )
          )
      );

    }



    public function vc_testimonial_html( $atts , $content = null) {


      extract(
          shortcode_atts(
              array(
                  'testimonialimage'   => ''
              ),
              $atts
          )
      );

      $content = wpb_js_remove_wpautop($content, true);

      $html = "<div class='testimonial-box'>";

        if( !empty($testimonialimage) ){

          $img = wp_get_attachment_image_src($testimonialimage, "large");
          $html .= "<p><img src='{$img[0]}' class='testimonial-image' style='width: 100%;'></p>";

        }

        if( !empty($content) ){

          $html .= "<p class='testimonial-name'>{$content}</p>";

        }


      $html .= "</div>";



      return $html;

    }

}


new vcTestimonialsBox();
