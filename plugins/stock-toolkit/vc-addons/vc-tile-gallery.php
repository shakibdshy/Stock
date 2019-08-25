<?php
vc_map( 
   array(
      "name" => esc_html__( "Stock tile gallery", "stock" ),
      "base" => "stock_tile_gallery",
      "category" => esc_html__( "Stock", "stock"),
      "params" => array(
         array(
            "type" => "attach_images",
            "heading" => esc_html__( "Upload Gallery images", "stock" ),
            "param_name" => "images",
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Height", "stock" ),
            "param_name" => "height",
            "std" => esc_html__( "310", "stock" ),
            "description" => esc_html__( "Type Image height in number", "stock" )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Background Position", "stock" ),
            "param_name" => 'type',
            "std" => esc_html__( "center", "stock" ),
            "value" => array(
               'Center' => 'center', 
               'Top'    => 'top', 
               'Bottom' => 'bottom', 
               'Left'   => 'left', 
               'Right'  => 'right', 
            ),
            "description" => esc_html__( "", "stock" ),
            'dependency'   => array( 
               'value'     => array("center","top","bottom","left","right","7","8","9","10")
            ),
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