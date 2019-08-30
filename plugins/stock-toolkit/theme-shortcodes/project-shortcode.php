<?php

function stock_project_shortcode($atts, $content = null){
   extract( shortcode_atts( array(
      'theme'              => '1',
  ), $atts) );

  $project_categories = get_terms('project_cat');

  $dynamic_number = rand(321651651, 123156651);

  $stock_project_markup = '

  <script>
     jQuery(document).ready(function($){
        $(".stock-project-s-active li").click(function(){
            $(".stock-project-shorting li").removeClass("active");
            $(this).addClass("active");

            var selector = $(this).attr("data-filter");
            $(".project-list-'.$dynamic_number.'").isotope({
               filter: selector,
            });
        });
     });

     jQuery(window).load(function($){
         jQuery(".project-list-'.$dynamic_number.'").isotope();
     });
  </script>




   <div class="row">';

   if ($theme == '1') {
      $stock_project_markup .= '
      <div class="col-md-3">';
      $project_list_class = 'stock-project-shorting';
   }else {
      $stock_project_markup .= '
      <div class="col-md-12">';
      $project_list_class = 'stock-project-shorting-2';
   }
         $stock_project_markup .= '
         <ul class="stock-project-s-active '.$project_list_class.'">
            <li class="active" data-filter="*">All Works</li>';

            if( !empty($project_categories) && ! is_wp_error($project_categories)){
               foreach ($project_categories as $category) {
                  $stock_project_markup .= '<li data-filter=".'.$category->slug.'">'.$category->name.'</li>';
                  
               }
            }
            $stock_project_markup .= '
         </ul>';

      $stock_project_markup .= '
      </div>';


      if ($theme == '1') {
         $project_column_width = 'col-md-9';
         $project_inner_column_width = 'col-md-4';
      } else {
         $project_column_width = 'col-md-12';
         $project_inner_column_width = 'col-md-3';
      }
      
      $stock_project_markup .= '
      <div class="'.$project_column_width.'">
         <div class="row project-list-'.$dynamic_number.'">';

         $project_array = new WP_Query(
            array(
               'posts_per_page' => -1, 
               'post_type'      => 'project',
            )
         );

         while($project_array->have_posts()) : $project_array->the_post();

         $project_category = get_the_terms( get_the_ID(), 'project_cat' );

         if ($project_category && ! is_wp_error($project_category)) {
            $project_cat_list = array();

            foreach ($project_category as $categorie) {
               $project_cat_list[] = $categorie->slug;
            }
            $project_assigned_cat = join(" ", $project_cat_list);
         } else {
            $project_assigned_cat = '';
         }
         


         $stock_project_markup .= '
            <div class="'.$project_inner_column_width.' '.$project_assigned_cat.'">
               <a href="'.get_permalink().'" class="single-work-box">
                  <div class="work-box-bg" style="background-image:url('.get_the_post_thumbnail_url(get_the_ID(), 'large').');">                  
                     <i class="fas fa-link"></i>
                  </div>
                  <p>'.get_the_title().'</p>
               </a>
            </div>';
         endwhile;
         wp_reset_query();
         $stock_project_markup .= '
         </div>
      </div>
   </div>

  ';
  return $stock_project_markup;
}
add_shortcode('stock_project', 'stock_project_shortcode');