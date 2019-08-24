<?php
vc_map( 
   array(
      "name" => esc_html__( "Stock Static Box", "stock" ),
      "base" => "stock_start",
      "category" => esc_html__( "Stock", "stock"),
      "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Statics Number", "stock" ),
            "param_name" => "number",
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Statics Number after Text", "stock" ),
            "param_name" => "after_text",
            "description" => esc_html__( "", "stock" )
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Statics description", "stock" ),
            "param_name" => "desc",
            "description" => esc_html__( "", "stock" )
         ),
      )
   ) 
);