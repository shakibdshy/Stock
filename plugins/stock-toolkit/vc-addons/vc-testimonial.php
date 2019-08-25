<?php
vc_map( 
   array(
      "name" => esc_html__( "Stock Testimonial Box", "stock" ),
      "base" => "stock_testimonial_box",
      "category" => esc_html__( "Stock", "stock"),
      "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Title", "stock" ),
            "param_name" => "title",
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Position / Location", "stock" ),
            "param_name" => "position",
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "attach_image",
            "heading" => esc_html__( "Photo", "stock" ),
            "param_name" => "photo",
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "textarea",
            "heading" => esc_html__( "Testimonial", "stock" ),
            "param_name" => "testimonial",
            "description" => esc_html__( "", "stock" )
         ),
         array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'Css', 'stock' ),
				'param_name' => 'custom_design',
				'group' => esc_html__( 'Design options', 'stock' ),
			)
      )
   ) 
);