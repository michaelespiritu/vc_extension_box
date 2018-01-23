<?php

/*
Element Description: Simple Image with label Box
*/


class vcSimpleImageWithLabelBox extends WPBakeryShortCode {

    public $text_domain = 'vc_siwl';

    function __construct() {
        add_action( 'init', array( $this, 'vc_siwl_mapping' ) );
        add_shortcode( 'vc_siwl', array( $this, 'vc_siwl_html' ) );
    }


    public function vc_siwl_mapping() {

      if ( !defined( 'WPB_VC_VERSION' ) ) {
          return;
      }


      vc_map(

          array(
              'name' => __('Simple Image with Label', $text_domain),
              'base' => 'vc_siwl',
              'description' => __('Simple Image with Label VC box', $text_domain),
              'category' => __('My Custom Elements', $text_domain),
              'icon' => get_stylesheet_directory_uri().'/vc-elements/assets/vc_icon_siwl.png',
              'params' => array(

                  array(
                      'type' => 'textfield',
                      'holder' => 'div',
                      'class' => 'siwl-title',
                      'heading' => __( 'Title', $text_domain ),
                      'param_name' => 'siwltitle',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'textfield',
                      'class' => 'siwl-link',
                      'heading' => __( 'Link', $text_domain ),
                      'param_name' => 'siwllink',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'colorpicker',
                      'class' => 'siwl-title-bg-color',
                      'heading' => __( 'Title Background Color', $text_domain ),
                      'param_name' => 'siwltitlebgcolor',
                      'admin_label' => false,
                      'value' => __( '#000000', $text_domain ),
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'colorpicker',
                      'class' => 'siwl-title-color',
                      'heading' => __( 'Title Color', $text_domain ),
                      'param_name' => 'siwltitlecolor',
                      'admin_label' => false,
                      'value' => __( '#ffffff', $text_domain ),
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'textfield',
                      'class' => 'siwl-title-font-size',
                      'heading' => __( 'Title Font Size', $text_domain ),
                      'param_name' => 'siwltitlefontsize',
                      'admin_label' => false,
                      'value' => __( '15px', $text_domain ),
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'dropdown',
                      'class' => 'siwl-title-location',
                      'heading' => __( 'Title Location', $text_domain ),
                      'param_name' => 'siwltitlelocation',
                      'admin_label' => false,
                      'value'       => array(
                        'Top'   => 'top',
                        'Bottom'   => 'bottom'
                      ),
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'attach_image',
                      'class' => 'siwl-image',
                      'heading' => __( 'Image', $text_domain ),
                      'param_name' => 'siwlimage',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),


              )
          )
      );

    }



    public function vc_siwl_html( $atts , $content = null) {


      extract(
          shortcode_atts(
              array(
                  'siwltitle'   => '',
                  'siwllink'   => '',
                  'siwltitlebgcolor'   => '',
                  'siwltitlecolor'   => '',
                  'siwltitlefontsize'   => '',
                  'siwltitlelocation' => '',
                  'siwlimage' => ''
              ),
              $atts
          )
      );

      $img = wp_get_attachment_image_src($siwlimage, "large");

      $style = "style='text-align: center; color: #ffffff; background-color: #000000;' ";
      $color = "color: #fff;";
      $fontsize = "font-size: 13px;";

      if( !empty($siwltitlecolor) ){

        $color = "color: {$siwltitlecolor};";

      }

      if( !empty($siwltitlefontsize) ){

        $fontsize = "font-size: {$siwltitlefontsize};";

      }

      if( !empty($siwltitlebgcolor) ){

        $style = "style='text-align: center; color: #ffffff;  background-color: {$siwltitlebgcolor}' ";

      }

      if( !empty($siwltitle) ){

        $siwltitle = "<div class='siwl-title' {$style}><h3><a href='{$siwllink}' style='{$color}{$fontsize}'>{$siwltitle}</a></h3></div>";

      }

      if( !empty($siwlimage) ){

        $siwlimage = "<div class='siwl-img'><a href='{$siwllink}'><img src='{$img[0]}'></a></div>";

      }

      $html = "<div class='siwl-box'>";

          switch ($siwltitlelocation) {
            case 'top':

                $html .= $siwltitle;
                $html .= $siwlimage;

              break;

            case 'bottom':

                $html .= $siwlimage;
                $html .= $siwltitle;

              break;

            default:
                $html .= $siwltitle;
                $html .= $siwlimage;
              break;
          }




      $html .= "</div>";



      return $html;

    }

}


new vcSimpleImageWithLabelBox();
