<?php
vc_map( 
   array(
      "name" => esc_html__( "Stock CTA Box", "stock" ),
      "base" => "stock_cta",
      "category" => esc_html__( "Stock", "stock"),
      "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Title", "stock" ),
            "param_name" => "title",
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "textarea",
            "heading" => esc_html__( "Content", "stock" ),
            "param_name" => "desc",
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Theme", "stock" ),
            "param_name" => "theme",
            "std" => esc_html__( "1", "stock" ),
            "value" => array(
               'General Theme' => 1, 
               'Colored Theme' => 2,
            ),
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Link type", "stock" ),
            "param_name" => "type",
            "std" => esc_html__( "1", "stock" ),
            "value" => array(
               'Link to Page' => 1, 
               'External link' => 2, 
            ),
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Link to page", "stock" ),
            "param_name" => "link_to_page",
            "value" => stock_toolkit_get_page_as_list(),
            "description" => esc_html__( "", "stock" ),
            'dependency'   => array( 
               'element'   => 'type', 
               'value'     => array("1"),
            )
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__( "External Link", "stock" ),
            "param_name" => "external_link",
            "description" => esc_html__( "", "stock" ),
            'dependency'   => array( 
               'element'   => 'type', 
               'value'     => array("2"),
            )
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Link Text", "stock" ),
            "param_name" => "link_text",
            "std" => esc_html__( "See more", "stock" ),
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Text align", "stock" ),
            "param_name" => "text_align",
            "std" => esc_html__( "center", "stock" ),
            "value" => array(
               'Left' => 'left', 
               'Center' => 'center', 
               'Right' => 'right',
            ),
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Theme", "stock" ),
            "param_name" => "theme",
            "std" => esc_html__( "1", "stock" ),
            "value" => array(
               'General Theme' => 1, 
               'Colored Theme' => 2,
            ),
            "description" => esc_html__( "", "stock" )
         ),
      )
   ) 
);