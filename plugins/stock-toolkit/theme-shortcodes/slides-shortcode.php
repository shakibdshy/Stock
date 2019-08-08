<?php
function stock_slides_shortcode($atts){
   extract( shortcode_atts( array(
       'count' => '',
   ), $atts) );
    
   $q = new WP_Query(
      array(
         'posts_per_page' => -1, 
         'post_type'      => 'slides',
      )
   );
        
   $list = '
   <script>
      jQuery(document).ready(function($){
         $(".slider-active").owlCarousel({
            loop: true,
            items:1,
            nav:true,
            dots: true,
            navText: ["<i class=\'fas fa-angle-left\'></i>", "<i class=\'fas fa-angle-right\'></i>"]
        });
      });
   </script>
   <div class="slider-active owl-carousel">';
      while($q->have_posts()) : $q->the_post();
         $idd = get_the_ID();
         $slide_meta = get_post_meta($idd, 'stock_slides_options', true);
         $post_content = get_the_content();
         $list .= '
         <div style="background-image: url('.get_the_post_thumbnail_url($idd, 'large').')" class="stock_slide_item">
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
                                    $list .='<a href="'.$btn_link.'" class="'.$button['type'].'-btn stock_slide_btn"></a>';
                                 }
                              $list .='</div>';
                           }
                        $list .= '
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         ';        
      endwhile;
   $list.= '</div>';
   wp_reset_query();
   return $list;
}
add_shortcode('stock_slides', 'stock_slides_shortcode');  