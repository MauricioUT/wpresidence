<?php

add_action( 'wp_body_open', 'wpresidence_wp_body_open' );

if(!function_exists('wpresidence_wp_body_open')):
function wpresidence_wp_body_open(){

  
}
endif;


/*
*
* Load the header
*
*/

if(!function_exists('wpresidence_show_header_wrapper')):
    function wpresidence_show_header_wrapper($header_classes,$logo_header_type){
      ?>
      <div class="master_header  wpestate-flex wpestate-flex-wrap wpestate-align-items-center wpestate-justify-content-md-between <?php echo esc_attr($header_classes['master_header_class']); ?>">
          <?php
              if(esc_html ( wpresidence_get_option('wp_estate_show_top_bar_user_menu','') )=="yes" && !is_page_template( 'splash_page.php' ) ){
                  get_template_part( 'templates/top_bar' );
              }
              get_template_part('templates/mobile_menu_header' );
          ?>
  
  
          <div  class="header_wrapper <?php echo esc_attr($header_classes['header_wrapper_class']);?> ">
              <?php
  
              if( !wpestate_is_user_dashboard()){
                  switch ($logo_header_type) {
                      case 'type1':
                          include( locate_template('templates/headers/header1.php') );
                          break;
                      case 'type2':
                          include( locate_template('templates/headers/header2.php') );
                          break;
                      case 'type3':
                          include( locate_template('templates/headers/header3.php') );
                          break;
                      case 'type4':
                          include( locate_template('templates/headers/header4.php') );
                          break;
                      case 'type5':
                          include( locate_template('templates/headers/header5.php') );
                          break;
                      case 'type6':
                          include( locate_template('templates/headers/header6.php') );
                          break;
                  }
              }else{
                  include( locate_template('templates/headers/header1.php') );
              }
              ?>            
          </div>
       </div>
     <?php
    }
  endif;
  