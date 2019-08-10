<?php

function stock_logo_carousel_shortcode($atts, $content = null){
   extract( shortcode_atts( array(
      'logos'             => '',
      'desktop_count'     => 5,
      'tablet_count'      => 3,
      'mobile_count'      => 2,
      'loop'              => 'true',
      'autoplay'          => 'true',
      'autoplaytimeout'   => 5000,
      'nav'               => 'true',
      'dots'              => 'true',
  ), $atts) );

  $logo_ids = explode(',', $logos);

  $stock_logo_carousel_markup = '
  <script>
      jQuery(document).ready(function($){
         $(".logo_carousel_active").owlCarousel({
            loop           : '.$loop.',
            items          : 5,
            autoplay       : '.$autoplay.';
            autoplaytimeout: '.$autoplaytimeout.';
            nav            :'.$nav.',
            dots           : '.$dots.',
            navText        : ["<i class=\'fas fa-angle-left\'></i>", "<i class=\'fas fa-angle-right\'></i>"]
         });
      });
   </script>
   ';
  $stock_logo_carousel_markup .= '
  <div class="logo_carousel_active">';
  foreach ($logo_ids as $logo) {
   $logo_array = wp_get_attachment_image_src($logo, 'large');
   $stock_logo_carousel_markup .= '
   <div class="stock_logo_item_table">
      <div class="stock_logo_item_tablecell">
         <img src="'.$logo_array[0].'" alt=""/>
      </div>
   </div>
   ';
  }
  $stock_logo_carousel_markup .= '
  </div>
  ';
  return $stock_logo_carousel_markup;
}
add_shortcode('stock_logo_carousel', 'stock_logo_carousel_shortcode');