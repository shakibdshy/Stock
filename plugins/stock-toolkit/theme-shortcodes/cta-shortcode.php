<?php

function stock_service_box_shortcode($atts, $content = null){
   extract( shortcode_atts( array(
      'title'              => '',
      'desc'               => '',
      'type'               => 1,
      'link_to_page'       => '',
      'external_link'      => '',
      'link_text'          => 'See more',
      'icon_type'          => 1,
      'upload_icon'        => '',
      'choose_icon'        => '',
      'box_background'     => '',
  ), $atts) );

  if ($type == 1) {
      $link_sourse = get_page_link($link_to_page);
  } else {
      $link_sourse = $external_link;
  }
  
  $box_bg_array = wp_get_attachment_image_src($box_background, 'medium');

  $stock_service_box_markup = '
   <div class="stock-service-box">
      <div style="background-image: url('.$box_bg_array[0].')" class="stock-service-icon">
         <div class="stock-service-table">
            <div class="stock-service-tablecell">';
            if ($icon_type == 1) {
               $service_icon_array = wp_get_attachment_image_src($upload_icon, 'thumbnail');
               $stock_service_box_markup .= '<img src="'.$service_icon_array[0].'" alt=""/>';
            } else {
               $stock_service_box_markup .= '<i class="'.$choose_icon.'"></i>';
            }
            
            $stock_service_box_markup .= '
            </div>
         </div>
      </div>

      <div class="stock-service-content">
         <h3>'.$title.'</h3>
         '.$desc.'
         <a href="'.$link_sourse.'" class="service-more-btn">'.$link_text.'</a>
      </div>
   </div>
  ';
  $stock_service_box_markup .= '';

  return $stock_service_box_markup;
}
add_shortcode('stock_service_box', 'stock_service_box_shortcode');