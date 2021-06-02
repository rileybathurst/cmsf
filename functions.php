<?php
/**
 * Gutenberg scripts and styles
 * @link https://www.billerickson.net/block-styles-in-gutenberg/
 */
function twentytwentyonechild_gutenberg_scripts() {
  wp_enqueue_script(
    'twentytwentyonechild-editor', 
    get_stylesheet_directory_uri() . '/assets/js/editor.js', 
    array( 'wp-blocks', 'wp-dom' ), 
    filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ),
    true
  );
}
add_action( 'enqueue_block_editor_assets', 'twentytwentyonechild_gutenberg_scripts' );

function mytheme_setup_theme_supported_features() {

  // style sheet this should probably de further down
// https://developer.wordpress.org/themes/advanced-topics/child-themes/#enqueueing-styles-and-scripts
add_action( 'wp_enqueue_scripts', 'my_plugin_add_stylesheet' );
function my_plugin_add_stylesheet() {
	wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all' );
}




	// block styles
  add_theme_support( 'wp-block-styles' );

  // Editor color palette.
	$tck     = '#d32331';

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Black', 'twentytwentyonechild' ),
				'slug'  => 'black',
				'color' => $tck,
			)
		)
	);

	// https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#editor-styles
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' );

}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );


// add some patterns two wide columns with some images behind
register_block_pattern(
	'cmsf_patterns',
	array(
			'title'       => __( 'cmsf-hero', 'my-plugin' ),
			'description' => _x( 'Two Columns with an image behind.', 'Block pattern description', 'my-plugin' ),
			'content'     => "<!-- wp:group --><div class=\"wp-block-group my-grid\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"full\"} -->\n<div class=\"wp-block-columns alignfull is-style-fullwidth-wide\" ><!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:heading -->\n<h2>Supporting</h2><!-- /wp:heading -->\n</div><!-- /wp:column -->\n<!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:paragraph -->\n<p>hey</p><!-- /wp:paragraph -->\n</div><!-- /wp:column -->\n</div><!-- /wp:columns -->\n<!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image -->\n</div></div><!-- /wp:group -->",
	)
); 

add_action( 'init', 'cmsf_patterns' );