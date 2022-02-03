<?php
/**
 * Plugin Name:   استایل فارسی برای مدیریت وردپرس
 * Description:   تغییرات ظاهری به همراه افزودن فونت فارسی "وزیر" به پنل مدیریت وردپرس.
 * Author: 			  babakfp
 * Author URI: 	  https://babakfp.ir
 * Version: 		  6.32
 * Tested up to:  5.8.2
 * Text Domain:   wp-administration-style
 * Domain Path:   /languages
 * Tags:          farsi, farsi font, admin, panel, فارسی, فونت فارسی, ادمین, پنل
 * License:       GPLv3 or later
 * License URI:   https://www.gnu.org/licenses/gpl-3.0.html
*/

defined( 'ABSPATH' ) or die;

define( 'WP_ADMINISTRATION_STYLE', [
	'V' => '6.32',
	'INCLUDES' => plugin_dir_path( __FILE__ ) . 'includes/',
	'ASSETS' => plugin_dir_url( __FILE__ ) . 'assets/',
	'CSS' => plugin_dir_url( __FILE__ ) . 'assets/css/',
	'JS' => plugin_dir_url( __FILE__ ) . 'assets/js/',
] );

if ( ! class_exists( 'Wp_Administration_Style' ) ) {

	final class Wp_Administration_Style {
			
		public function __construct() {
			$this->sutup_plugin();
		}
	
		function sutup_plugin() {
			require_once WP_ADMINISTRATION_STYLE['INCLUDES'].'is-gutenberg-active.php';
			require_once WP_ADMINISTRATION_STYLE['INCLUDES'].'elementor-editor.php';
			add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));
			add_action('login_enqueue_scripts', array($this, 'my_login_stylesheet'));
		}
	
		function enqueue_styles() {
			wp_enqueue_style('wp_administration_style-mce-ifr', WP_ADMINISTRATION_STYLE['CSS'].'mce-ifr.css', [], WP_ADMINISTRATION_STYLE['V']);
			wp_enqueue_style('wp_administration_style-base', WP_ADMINISTRATION_STYLE['CSS'].'base.css', [], WP_ADMINISTRATION_STYLE['V']);
			wp_enqueue_style('wp_administration_style-uicons', WP_ADMINISTRATION_STYLE['ASSETS'].'fonts/wp-administration-style-icons/style.css', [], WP_ADMINISTRATION_STYLE['V']);
	
			if (is_gutenberg_active()):
				wp_enqueue_style('wp_administration_style-gutenberg', WP_ADMINISTRATION_STYLE['CSS'].'gutenberg.css', [], WP_ADMINISTRATION_STYLE['V']);
			endif;
	
			if (is_plugin_active('elementor/elementor.php')):
				wp_enqueue_style('wp_administration_style-elementor', WP_ADMINISTRATION_STYLE['CSS'].'elementor.css', [], WP_ADMINISTRATION_STYLE['V']);
			endif;
	
			if (is_plugin_active('woocommerce/woocommerce.php')):
				wp_enqueue_style('wp_administration_style-woocommerce', WP_ADMINISTRATION_STYLE['CSS'].'woocommerce.css', [], WP_ADMINISTRATION_STYLE['V']);
			endif;
	
			wp_enqueue_style('wp_administration_style-mce', WP_ADMINISTRATION_STYLE['CSS'].'mce.css', [], WP_ADMINISTRATION_STYLE['V']);
			wp_enqueue_script('wp_administration_style-js', WP_ADMINISTRATION_STYLE['JS'].'index.js', [], WP_ADMINISTRATION_STYLE['V']);
		}
	
		function my_login_stylesheet() {
			wp_enqueue_style('wp_administration_style-signin', WP_ADMINISTRATION_STYLE['CSS'].'signin.css', [], WP_ADMINISTRATION_STYLE['V']);
			wp_enqueue_style('wp_administration_style-uicons', WP_ADMINISTRATION_STYLE['ASSETS'].'fonts/wp-administration-style-icons/style.css', [], WP_ADMINISTRATION_STYLE['V']);
		}
	
	}

  new Wp_Administration_Style();

}
