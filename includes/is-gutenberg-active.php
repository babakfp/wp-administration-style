<?php
defined( 'ABSPATH' ) or die;

/**
  * Check if Gutenberg is active.
  * Must be used not earlier than plugins_loaded action fired.
  *
  * @return bool
*/
function is_gutenberg_active() {

  $gutenberg = false;
  $block_editor = false;

  if ( has_filter('replace_editor', 'gutenberg_init') ):
    // Gutenberg is installed and activated.
    $gutenberg = true;
  endif;

  if ( version_compare( $GLOBALS['wp_version'], '5.0-beta', '>' ) ):
    // Block editor
    $block_editor = true;
  endif;

  if ( !$gutenberg && !$block_editor ):
    return false;
  endif;

  include_once ABSPATH . 'wp-admin/includes/plugin.php';

  if ( ! is_plugin_active('classic-editor/classic-editor.php') ):
    return true;
  endif;

  $use_block_editor = ( get_option('classic-editor-replace') === 'no-replace' );

  return $use_block_editor;
}
