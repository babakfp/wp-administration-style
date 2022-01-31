<?php
/**
 * Plugin Name:   استایل فارسی برای مدیریت وردپرس
 * Description:   تغییرات ظاهری به همراه افزودن فونت فارسی "وزیر" به پنل مدیریت وردپرس.
 * Author: 			  babakfp
 * Author URI: 	  https://babakfp.ir
 * Version: 		  6.27.0
 * Tested up to:  5.8.2
 * Text Domain:   wp-administration-style
 * Domain Path:   /languages
 * Tags:          farsi, farsi font, admin, panel, فارسی, فونت فارسی, ادمین, پنل
 * License:       GPLv3 or later
 * License URI:   https://www.gnu.org/licenses/gpl-3.0.html
*/

defined('ABSPATH') or die;

if ( ! class_exists('wp_administration_style') ) {
  class wp_administration_style {
    
    public function __construct() {
      $this->path = plugin_dir_path(__FILE__);
      $this->url = plugin_dir_url(__FILE__);
      $this->includes = $this->path . 'includes/';
      $this->static = $this->url . 'static/';
      $this->css = $this->static . 'css/';
      $this->js = $this->static . 'js/';
      $this->version = '6.27.0';
      $this->sutup_plugin();
    }

    function sutup_plugin() {
      require_once $this->includes .'is-gutenberg-active.php';
      require_once $this->includes .'elementor-editor.php';
      add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));
      add_action('login_enqueue_scripts', array($this, 'my_login_stylesheet'));
    }

    function enqueue_styles() {
      wp_enqueue_style('wp_administration_style-mce-ifr', $this->css .'mce-ifr.css', array(), $this->version);
      wp_enqueue_style('wp_administration_style-base', $this->css .'base.css', array(), $this->version);
      wp_enqueue_style('wp_administration_style-uicons', $this->static .'fonts/uicons-regular-rounded/css/uicons-regular-rounded.css', array(), $this->version);

      if (is_gutenberg_active()):
        wp_enqueue_style('wp_administration_style-gutenberg', $this->css .'gutenberg.css', array(), $this->version);
      endif;

      if (is_plugin_active('elementor/elementor.php')):
        wp_enqueue_style('wp_administration_style-elementor', $this->css .'elementor.css', array(), $this->version);
      endif;

      if (is_plugin_active('woocommerce/woocommerce.php')):
        wp_enqueue_style('wp_administration_style-woocommerce', $this->css .'woocommerce.css', array(), $this->version);
      endif;

      wp_enqueue_style('wp_administration_style-mce', $this->css .'mce.css', array(), $this->version);
      wp_enqueue_script('wp_administration_style-js', $this->js .'index.js', array(), $this->version);
    }

    function my_login_stylesheet() {
      wp_enqueue_style('wp_administration_style-signin', $this->css .'signin.css', array(), $this->version);
      wp_enqueue_style('wp_administration_style-uicons', $this->static .'fonts/uicons-regular-rounded/css/uicons-regular-rounded.css', array(), $this->version);
    }

  }

  new wp_administration_style();
}
