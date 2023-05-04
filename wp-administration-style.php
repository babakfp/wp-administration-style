<?php
namespace WP_ADMINISTRATION_STYLE;

defined( 'ABSPATH' ) or die;

/**
 * Plugin Name:                       WP Administration Style
 * Version:                           6.14.0
 * Description:                       Enhances WordPress admin panel design and user experience.
 * Author:                            babakfp
 * Author URI:                        https://babakfp.ir
 * Tested up to:                      6.2.0
 * Tested (Elementor) up to:          3.12.2
 * License:                           GPLv3 or later
 * License URI:                       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:                       wp-administration-style
 * Domain Path:                       /languages
 * Tags:                              farsi, farsi font, farsi dashboard, فارسی, فونت فارسی, داشبورد فارسی, فارسی‌سازی
 */

if ( ! class_exists( 'Wp_Administration_Style_Globals' ) )
{
	final class Wp_Administration_Style_Globals
	{
		public static $version = '6.14.0';

		public static function url() {
			return plugin_dir_url( __FILE__ );
		}

		public static function dir() {
			return plugin_dir_path( __FILE__ );
		}
	}
}

require_once Wp_Administration_Style_Globals::dir() . 'includes/core.php';
