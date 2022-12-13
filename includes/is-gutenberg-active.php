<?php
defined( 'ABSPATH' ) or die;

if ( ! class_exists( 'Wp_Administration_Style_Is_Gutenberg_Active' ) )
{
	final class Wp_Administration_Style_Is_Gutenberg_Active
	{
		/**
		 * Check if Gutenberg is active.
		 * Must be used not earlier than plugins_loaded action fired.
		 *
		 * @return bool
		*/
		public function __construct()
		{
			$gutenberg = false;
			$block_editor = false;

			// Gutenberg is installed and activated.
			if ( has_filter('replace_editor', 'gutenberg_init') ) {
				$gutenberg = true;
			}

			// Block editor
			if ( version_compare( $GLOBALS['wp_version'], '5.0-beta', '>' ) ) {
				$block_editor = true;
			}

			if ( !$gutenberg && !$block_editor ) {
				return false;
			}

			include_once ABSPATH . 'wp-admin/includes/plugin.php';

			if ( ! is_plugin_active('classic-editor/classic-editor.php') ) {
				return true;
			}

			$use_block_editor = ( get_option('classic-editor-replace') === 'no-replace' );

			return $use_block_editor;
		}
	}
}
