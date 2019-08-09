<?php
vc_map( 
   array(
      "name" => esc_html__( "Stock Slide", "stock" ),
      "base" => "stock_slides",
      "category" => esc_html__( "Stock", "stock"),
      "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Count", "stock" ),
            "param_name" => "count",
            "value" => esc_html__( "5", "stock" ),
            "description" => esc_html__( "Select the slider count. If You want to Unlimited slides, type -1. ", "stock" )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Enable Loop", "stock" ),
            "param_name" => "loop",
            "std" => esc_html__( "true", "stock" ),
            "value" => array(
               'Yes' => 'true', 
               'No' => 'false' 
            ),
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Enable Autoplay", "stock" ),
            "param_name" => "autoplay",
            "std" => esc_html__( "true", "stock" ),
            "value" => array(
               'Yes' => 'true', 
               'No' => 'false'
            ),
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__( "Slide Time", "stock" ),
            "param_name" => "autoplayTimeout",
            "std" => esc_html__( "5000", "stock" ),
            "value" => array(
               '1 Second' => '1000',
               '2 Seconds' => '2000',
               '3 Seconds' => '3000',
               '4 Seconds' => '4000',
               '5 Seconds' => '5000',
               '6 Seconds' => '6000',
               '7 Seconds' => '7000',
               '8 Seconds' => '8000',
               '9 Seconds' => '9000',
               '10 Seconds' => '10000',
               '11 Seconds' => '11000',
               '12 Seconds' => '12000',
               '13 Seconds' => '13000',
               '14 Seconds' => '14000',
               '15 Seconds' => '15000'
            ),
            "description" => esc_html__( "", "stock" )
         ),
      )
   ) 
);