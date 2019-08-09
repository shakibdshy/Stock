<?php
function stock_slides_shortcode($atts){
   extract( shortcode_atts( array(
       'count'             => 5,
       'loop'              => 'true',
       'autoplay'          => 'true',
       'autoplayTimeout'   => 5000,
       'nav'               => 'true',
       'dots'              => 'true',
   ), $atts) );
    
   $q = new WP_Query(
      array(
         'posts_per_page' => $count, 
         'post_type'      => 'slides',
      )
   );
        
   $list = '
   <script>
      jQuery(window).load(function($){
         jQuery(".slider-active").owlCarousel({
            loop           : '.$loop.',
            items          : 1,
            autoplay       : '.$autoplay.';
            autoplayTimeout: '.$autoplayTimeout.';
            nav            :'.$nav.',
            dots           : '.$dots.',
            navText        : ["<i class=\'fas fa-angle-left\'></i>", "<i class=\'fas fa-angle-right\'></i>"]
        });
      });
   </script>
   <div class="slider-active owl-carousel">';
      while($q->have_posts()) : $q->the_post();
         $idd = get_the_ID();
         
         if (get_post_meta($idd, 'stock_slides_options', true)) {
            $slide_meta = get_post_meta($idd, 'stock_slides_options', true);
         } else {
            $slide_meta = array();
         }
         
         if (array_key_exists('enable_overlay', $slide_meta)) {
            $enable_overlay = $slide_meta['enable_overlay'];
         }else {
            $enable_overlay = true;
         }

         if (array_key_exists('overlay_percentage', $slide_meta)) {
            $overlay_percentage = $slide_meta['overlay_percentage'];
         }else {
            $overlay_percentage = .7;
         }

         if (array_key_exists('overlay_color', $slide_meta)) {
            $overlay_color = $slide_meta['overlay_color'];
         }else {
            $overlay_color = '#181a1f';
         }

         $post_content = get_the_content();
         $list .= '
         <div style="background-image: url('.get_the_post_thumbnail_url($idd, 'large').')" class="stock_slide_item">';
         if ($enable_overlay == true) {
            $list .= '<div style="opacity: '.$overlay_percentage.'; background-color: '.$overlay_color.'" class="slide-overlay"></div>';
         }
         $list .= '
            <div class="stock_slide_table">
               <div class="stock_slide_tablecell">
                  <div class="container">
                     <div class="row">
                        <div class="col-xl-6">
                           <h2>'.get_the_title($idd).'</h2>
                           '.wpautop($post_content).'';
                           if(!empty($slide_meta['button'])){
                              $list .='<div class="stock_slides_buttons">';
                                 foreach ($slide_meta['button'] as $button) {
                                    if($button['link_type'] == 1){
                                       $btn_link = get_page_link($button['link_to_page']);
                                    }else {
                                       $btn_link = $button['link_to_external'];
                                    }
                                    $list .='<a href="'.$btn_link.'" class="'.$button['type'].'-btn stock_slide_btn">'.$button['text'].'</a>';
                                 }
                              $list .='</div>';
                           }
                        $list .= '
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>';        
      endwhile;
   $list.= '</div>';
   wp_reset_query();
   return $list;
}
add_shortcode('stock_slides', 'stock_slides_shortcode');  