<?php
vc_map( 
   array(
      "name" => esc_html__( "Stock Button", "stock" ),
      "base" => "stock_btn",
      "category" => esc_html__( "Stock", "stock"),
      "params" => array(
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
      )
   ) 
);