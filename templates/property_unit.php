<?php
global $align;
global $wpestate_options;
global $is_shortcode;
global $row_number_col;

if(!isset( $wpestate_property_unit_slider)){
    $wpestate_property_unit_slider='';
}

$conten_class="";
if(isset($wpestate_options['content_class'])) $conten_class=$wpestate_options['content_class'];

$col_data       =   wpestate_return_unit_class($wpestate_no_listins_per_row,$conten_class,$align,$is_shortcode,$row_number_col,$wpestate_property_unit_slider);
$title          =   get_the_title();
$link           =   esc_url( get_permalink() );

$main_image     =   wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'listing_full_slider');
$main_image_src =   '';
if(isset($main_image[0])){
    $main_image_src=$main_image[0];
}
?>

<div class="<?php echo esc_html($col_data['col_class']);?> listing_wrapper "
    data-org="<?php echo esc_attr($col_data['col_org']);?>"
    data-main-modal="<?php echo esc_attr($main_image_src); ?>"
    data-modal-title="<?php echo esc_attr($title);?>"
    data-modal-link="<?php echo esc_attr($link);?>"
    data-listid="<?php echo intval($post->ID);?>" >


    <div class="property_listing  property_card_default <?php echo wpestate_interior_classes($wpestate_uset_unit); ?> "
         data-link="<?php   if(  $wpestate_property_unit_slider==0){ echo esc_url($link);}?>">

        <?php if ($wpestate_uset_unit==1){
            wpestate_build_unit_custom_structure($wpestate_custom_unit_structure,$post->ID,$wpestate_property_unit_slider);
        } else{ ?>


                <div class="listing-unit-img-wrapper">
                    <div class="prop_new_details">
                        <div class="prop_new_details_back"></div>
                        <?php get_template_part('templates/property_cards_templates/property_card_media_details');?>
                        <?php get_template_part('templates/property_cards_templates/property_card_location');?>
                        <div class="featured_gradient"></div>
                    </div>

                    <?php get_template_part('templates/property_cards_templates/property_card_slider');?>
                    <?php get_template_part('templates/property_cards_templates/property_card_tags'); ?>
                </div>



                <div class="property-unit-information-wrapper">
                  <?php get_template_part('templates/property_cards_templates/property_card_title'); ?>
                  <?php get_template_part('templates/property_cards_templates/property_card_price'); ?>
                  <?php get_template_part('templates/property_cards_templates/property_card_content'); ?>
                  <?php get_template_part('templates/property_cards_templates/property_card_details_default'); ?>

                  <div class="property_location">
                      <?php get_template_part('templates/property_cards_templates/property_card_agent_details_default'); ?>
                      <?php get_template_part('templates/property_cards_templates/property_card_actions_type_default'); ?>
                  </div>
                </div>
            <?php
            }// end if custom structure
            ?>
        </div>
    </div>
