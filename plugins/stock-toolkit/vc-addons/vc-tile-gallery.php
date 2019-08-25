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
            "param_name" => "type",
            "std" => esc_html__( "1", "stock" ),
            "value" => array(
               'Center' => 1, 
               'Top'    => 2, 
               'Bottom' => 3, 
               'Left'   => 4, 
               'Right'  => 5, 
            ),
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Center", "stock" ),
            "param_name" => "center",
            "description" => esc_html__( "", "stock" ),
            'dependency'   => array( 
               'element'   => 'type', 
               'value'     => array("1"),
            )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Top", "stock" ),
            "param_name" => "top",
            "description" => esc_html__( "", "stock" ),
            'dependency'   => array( 
               'element'   => 'type', 
               'value'     => array("2"),
            )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Bottom", "stock" ),
            "param_name" => "bottom",
            "description" => esc_html__( "", "stock" ),
            'dependency'   => array( 
               'element'   => 'type', 
               'value'     => array("3"),
            )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Left", "stock" ),
            "param_name" => "left",
            "description" => esc_html__( "", "stock" ),
            'dependency'   => array( 
               'element'   => 'type', 
               'value'     => array("4"),
            )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Right", "stock" ),
            "param_name" => "right",
            "description" => esc_html__( "", "stock" ),
            'dependency'   => array( 
               'element'   => 'type', 
               'value'     => array("5"),
            )
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