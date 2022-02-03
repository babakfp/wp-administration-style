<?php

// enqueue css file into editor
add_action('elementor/editor/after_enqueue_styles', function() {
	wp_enqueue_style ('farsi-font-elementor-editor', WP_ADMINISTRATION_STYLE['CSS'].'elementor-editor.css');
});

// enqueue css file into editor preview
add_action('elementor/preview/enqueue_styles', function() {
	wp_enqueue_style ('farsi-font-elementor-preview', WP_ADMINISTRATION_STYLE['CSS'].'elementor-preview.css');
});
