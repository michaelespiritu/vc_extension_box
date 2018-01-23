<?php

/*
Element Description: Bulletin Board Box
*/


class vcBulletinBoardBox extends WPBakeryShortCode {

    public $text_domain = 'vc_bulletin_board';

    function __construct() {
        add_action( 'init', array( $this, 'vc_bb_mapping' ) );
        add_shortcode( 'vc_bulletin_board', array( $this, 'vc_bb_html' ) );
    }


    public function vc_bb_mapping() {

      if ( !defined( 'WPB_VC_VERSION' ) ) {
          return;
      }


      vc_map(

          array(
              'name' => __('Bulletin Board Box', $text_domain),
              'base' => 'vc_bulletin_board',
              'description' => __('Bulletin Board VC box', $text_domain),
              'category' => __('My Custom Elements', $text_domain),
              'icon' => get_stylesheet_directory_uri().'/vc-elements/assets/vc_icon_bulletin_board.png',
              'params' => array(

                  array(
                      'type' => 'textfield',
                      'holder' => 'div',
                      'class' => 'bb-title',
                      'heading' => __( 'Title', $text_domain ),
                      'param_name' => 'bbtitle',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  ),

                  array(
                      'type' => 'textarea_html',
                      'holder' => 'div',
                      'class' => 'bb-content',
                      'heading' => __( 'Content', $text_domain ),
                      'param_name' => 'content',
                      'admin_label' => false,
                      'weight' => 0,
                      'group' => 'Custom Group',
                  )

              )
          )
      );

    }



    public function vc_bb_html( $atts , $content = null) {


      extract(
          shortcode_atts(
              array(
                  'bbtitle'   => ''
              ),
              $atts
          )
      );

      $content = wpb_js_remove_wpautop($content, true);

      $html = "<div class='bb-box'>";


        if( !empty($bbtitle) ){

          $html .= "<div class='bb-title'><h3>{$bbtitle}</h3></div>";

        }

        if( !empty($content) ){

          $html .= "<div class='bb-content'>{$content}</div>";

        }


      $html .= "</div>";



      return $html;

    }

}


new vcBulletinBoardBox();
