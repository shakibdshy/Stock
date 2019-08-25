<?php

function stock_tile_gallery_shortcode($atts, $content = null){
   extract( shortcode_atts( array(
      'images'             => '',
      'height'             => 310,
      'custom_design'      => '',
      'size'               => 'large',
      'type'               => 1,
      'top'                => '',
      'bottom'             => '',
      'left'               => '',
      'right'              => '',
      'center'             => '',

  ), $atts) );

  $image_ids = explode(',', $images);
  $image_count = count($image_ids);
  $image_no = 0;
  $custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );

  if ($type == 1) {
      $position = $center;
   } elseif($type == 2) {
      $position = $top;
   } elseif($type == 3) {
      $position = $bottom;
   } elseif($type == 4) {
      $position = $left;
   } else {
      $position = $right;
   }

  if (!empty($images)) {
   $stock_tile_gallery_markup .= '
   <div class="'.$custom_design.' stock-tile-gallery stock-tile-gallery-image-'.$image_count.'">';
      foreach ($image_ids as $image) {
         $image_array = wp_get_attachment_image_src($image, $size);
         $image_no++;
         $stock_tile_gallery_markup .= '<div style="background-image: url('.$image_array[0].'); height:'.$height.'px; background-position: '.$position.'; background-size: cover;" class="tile-gallery-block tile-gallery-block-'.$image_no.'"></div>';
      }

      $stock_tile_gallery_markup .= '
   </div>
   ';
  } else {
   $stock_tile_gallery_markup .= '  ';
  }
  
  
  
  
  return $stock_tile_gallery_markup;
}
add_shortcode('stock_tile_gallery', 'stock_tile_gallery_shortcode');