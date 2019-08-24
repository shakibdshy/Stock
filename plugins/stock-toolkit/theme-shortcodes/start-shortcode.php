<?php

function stock_start_shortcode($atts, $content = null){
   extract( shortcode_atts( array(
      'number'       => 1,
      'after_text'   => '',
      'desc'         => '',
  ), $atts) );
  
  $stock_start_markup = '
  <div class="stock-start-box">
      <h1><span>'.$number.'</span> '.$after_text.'</h1>
      '.$desc.'
  </div>
   
  ';

  return $stock_start_markup;
}
add_shortcode('stock_start', 'stock_start_shortcode');