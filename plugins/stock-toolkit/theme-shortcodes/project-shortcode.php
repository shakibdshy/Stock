<?php

function stock_project_shortcode($atts, $content = null){
   extract( shortcode_atts( array(
      'title'              => '',
  ), $atts) );

  $project_categories = get_terms('project_cat');

  $stock_project_markup = '
   <div class="row">
      <div class="col-md-3">
         <ul class="stock-project-shorting">
            <li>All Works</li>';

            if( !empty($project_categories) && ! is_wp_error($project_categories)){
               foreach ($project_categories as $categorie) {
                  $stock_project_markup .= '<li>'.$categorie->name.'</li>';
                  
               }
            }
            $stock_project_markup .= '
         </ul>
      </div>
      <div class="col-md-9">
         <div class="row">';

         $project_array = new WP_Query(
            array(
               'posts_per_page' => -1, 
               'post_type'      => 'project',
            )
         );

         while($project_array->have_posts()) : $project_array->the_post();
         $stock_project_markup .= '
            <div class="col-md-4">
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