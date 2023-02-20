<?php
defined( 'ABSPATH' ) or die;

/**
 * Plugin Name: 	استایل فارسی برای مدیریت وردپرس
 * Description:   	فارسی‌سازی, زیباسازی و بهینه‌سازی ظاهر داشبورد وردپرس. استفاده از فونت زیبای وزیر برای خوانایی بهتر متون فارسی.
 * Author:			babakfp
 * Author URI: 	  	https://babakfp.ir
 * Version: 		6.11.0
 * Tested up to:  	6.1.1
 * Text Domain:   	wp-administration-style
 * Tags:          	farsi, farsi font, farsi dashboard, فارسی, فونت فارسی, داشبورد فارسی, فارسی‌سازی
 * License:       	GPLv3 or later
 * License URI:   	https://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path:   	/languages
*/

if ( ! class_exists( 'Wp_Administration_Style_Globals' ) )
{
	final class Wp_Administration_Style_Globals
	{
		public static $version = '6.11.0';

		public static function url() {
			return plugin_dir_url( __FILE__ );
		}

		public static function dir() {
			return plugin_dir_path( __FILE__ );
		}
	}
}

require_once Wp_Administration_Style_Globals::dir() . 'includes/core.php';
