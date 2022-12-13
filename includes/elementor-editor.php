<?php

add_action( 'elementor/editor/after_enqueue_styles', function() {
	wp_enqueue_style ( 'wp-administration-style-editor', Wp_Administration_Style_Globals::url() . 'assets/css/elementor-editor.css', [], Wp_Administration_Style_Globals::$version );
} );

add_action( 'elementor/preview/enqueue_styles', function() {
	wp_enqueue_style ( 'wp-administration-style-preview', Wp_Administration_Style_Globals::url() . 'assets/css/elementor-preview.css', [], Wp_Administration_Style_Globals::$version );
} );
