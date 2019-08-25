<?php

function stock_testimonial_shortcode($atts, $content = null){
   extract( shortcode_atts( array(
      'title'        => '',
      'position'     => '',
      'testimonial'  => '',
      'photo'        => '',
      'custom_design' => '',
  ), $atts) );

  $custom_design = vc_shortcode_custom_css_class( $custom_design, ' ' );

  $photo_array = wp_get_attachment_image_src($photo, 'large');

  $stock_start_markup = '
  <div class="single-testimonial-box '.$custom_design.'">
      <img src="'.$photo_array[0].'" atl="'.$title.'"/>
      <h3>'.$title.' <span>'.$position.'</span></h3>
      '.wpautop($testimonial).'
  </div>
   
  ';

  return $stock_start_markup;
}
add_shortcode('stock_testimonial_box', 'stock_testimonial_shortcode');