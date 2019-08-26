<?php

function stock_cta_shortcode($atts, $content = null){
   extract( shortcode_atts( array(
      'title'              => '',
      'desc'               => '',
      'type'               => 1,
      'link_to_page'       => '',
      'external_link'      => '',
      'link_text'          => 'See more',
      'theme'               => 1,
      'text_align'         => 'center',
  ), $atts) );

  /* Link Type */
  if ($type == 1) {
      $link_sourse = get_page_link($link_to_page);
  } else {
      $link_sourse = $external_link;
  }

  $stock_cta_markup = '
   <div class="stock-cta-box stock-cta-box-theme-'.$theme.'" style="text-align:'.$text_align.'">
   <h3>'.$title.'</h3>
   '.wpautop($desc).'
   <a href="'.$link_sourse.'" class="service-more-btn">'.$link_text.'</a>

  ';
  return $stock_cta_markup;
}
add_shortcode('stock_cta', 'stock_cta_shortcode');