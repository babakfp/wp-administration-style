<?php
defined( 'ABSPATH' ) or die;

if ( ! class_exists( 'Wp_Administration_Style' ) )
{
	final class Wp_Administration_Style
	{
		public function __construct() {
			$this->sutup_plugin();
		}

		function sutup_plugin() {
			require_once Wp_Administration_Style_Globals::dir() . 'includes/is-gutenberg-active.php';
			require_once Wp_Administration_Style_Globals::dir() . 'includes/elementor-editor.php';

			add_action( 'admin_head', [ $this, 'font_face' ] );
			add_action( 'elementor/editor/wp_head', [ $this, 'font_face' ] );
			add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_styles' ] );
			add_action( 'login_enqueue_scripts', [ $this, 'my_login_stylesheet' ] );
		}

		function enqueue_styles() {
			wp_enqueue_style( 'wp-administration-style-mce-ifr', Wp_Administration_Style_Globals::url() . 'assets/css/mce-ifr.css', [], Wp_Administration_Style_Globals::$version );
			wp_enqueue_style( 'wp-administration-style-base', Wp_Administration_Style_Globals::url() . 'assets/css/base.css', [], Wp_Administration_Style_Globals::$version );
			wp_enqueue_style( 'wp-administration-style-uicons', Wp_Administration_Style_Globals::url() . 'assets/fonts/wp-administration-style-icons/style.css', [], Wp_Administration_Style_Globals::$version );

			if ( new Wp_Administration_Style_Is_Gutenberg_Active() ) {
				wp_enqueue_style( 'wp-administration-style-gutenberg', Wp_Administration_Style_Globals::url() . 'assets/css/gutenberg.css', [], Wp_Administration_Style_Globals::$version );
			}

			if ( is_plugin_active('elementor/elementor.php') ) {
				wp_enqueue_style( 'wp-administration-style-elementor', Wp_Administration_Style_Globals::url() . 'assets/css/elementor.css', [], Wp_Administration_Style_Globals::$version );
			}

			if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
				wp_enqueue_style( 'wp-administration-style-woocommerce', Wp_Administration_Style_Globals::url() . 'assets/css/woocommerce.css', [], Wp_Administration_Style_Globals::$version );
			}

			wp_enqueue_style( 'wp-administration-style-mce', Wp_Administration_Style_Globals::url() . 'assets/css/mce.css', [], Wp_Administration_Style_Globals::$version );
			wp_enqueue_script( 'wp-administration-style-js', Wp_Administration_Style_Globals::url() . 'assets/js/index.js', [], Wp_Administration_Style_Globals::$version );
		}

		function my_login_stylesheet() {
			wp_enqueue_style( 'wp-administration-style-signin', Wp_Administration_Style_Globals::url() . 'assets/css/signin.css', [], Wp_Administration_Style_Globals::$version );
			wp_enqueue_style( 'wp-administration-style-uicons', Wp_Administration_Style_Globals::url() . 'assets/fonts/wp-administration-style-icons/style.css', [], Wp_Administration_Style_Globals::$version );
		}

		function font_face() {
			echo '
				<link rel="preload" href="'. Wp_Administration_Style_Globals::url() . 'assets/fonts/Vazirmatn/Vazirmatn[wght].woff2" as="font" type="font/woff2" crossorigin />

				<style type="text/css">
					@font-face {
						font-family: "Vazirmatn";
						src: url("'. Wp_Administration_Style_Globals::url() . 'assets/fonts/Vazirmatn/Vazirmatn[wght].woff2") format("woff2 supports variations"),
							 url("'. Wp_Administration_Style_Globals::url() . 'assets/fonts/Vazirmatn/Vazirmatn[wght].woff2") format("woff2-variations");
						font-weight: 100 900;
						font-display: block;
						font-style: normal;
					}
				</style>
			';
		}

	}

	new Wp_Administration_Style();
}
