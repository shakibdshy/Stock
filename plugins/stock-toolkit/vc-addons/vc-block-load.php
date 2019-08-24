<?php
if (!defined('ABSPATH')) die('-1');

// Class Started
class stockVCExtendClass{
   function __construct(){
      //We Safely integrate with VC with this hook
      add_action('init', array($this, 'stockIntegrateWithVC'));
   }
   public function stockIntegrateWithVC(){
      //Checks if Visual Composer is not installed
      if(!defined( 'WPB_VC_VERSION' )){
         add_action( 'admin_notices', array($this, 'stockShowVcVersionNotice' ));
         return;
      }

      //Visual Composer Addons.
      include STOCK_ACC_PATH .'/vc-addons/vc-slides.php';
      include STOCK_ACC_PATH .'/vc-addons/vc-logo-carousel.php';
      include STOCK_ACC_PATH .'/vc-addons/vc-service.php';
      include STOCK_ACC_PATH .'/vc-addons/vc-cta.php';
      include STOCK_ACC_PATH .'/vc-addons/vc-start.php';
      include STOCK_ACC_PATH .'/vc-addons/vc-stock-btn.php';
   }

   //Show Visual Composer version
   public function stockShowVcVersionNotice(){
      $theme_data = wp_get_theme();
      echo '
      <div class="notice notice-warning">
         <p>'.sprintf(__('<strong>%$</strong> recommends <strong><a href="'.site_url().'/wp-admin/themes.php?page=tgmpa-install-plugins" target="_blank">Visual Composer<a/></strong> plugin to be installed and activated on your site.', 'stock'), $theme_data->get('Name')).'</p>
      </div>';
   }
}
//Finally initialize code
new stockVCExtendClass;