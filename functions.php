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
	add_editor_style( '/style-editor.css' );

}
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );

// Bring in all the additional files
// nope this isnt doing the thing
include( get_template_directory() . '/func/block_patterns.php' );

register_block_pattern(
	'hero_pattern',
	array(
			'title'       => __( 'cmsf-hero', 'cmsf' ),
			'description' => _x( 'Two Columns with an image behind.', 'Block pattern description', 'cmsf' ),
			'content'     => "<!-- wp:group {\"align\":\"full\",\"className\":\"cmsf-hero\"} --><div class=\"wp-block-group alignfull cmsf-hero\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"full\"} -->\n<div class=\"wp-block-columns alignfull is-style-fullwidth-wide\" ><!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:heading -->\n<h2>Jeffsum</h2><!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p>Must go faster... go, go, go, go, go! They're using our own satellites against us. And the clock is ticking. Hey, you know how I'm, like, always trying to save the planet? Here's my chance. Forget the fat lady! You're obsessed with the fat lady! Drive us out of here!</p><!-- /wp:paragraph -->\n</div><!-- /wp:column -->\n<!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"></div><!-- /wp:column -->\n</div><!-- /wp:columns -->\n<!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image -->\n</div></div><!-- /wp:group -->",
			// 'categories'  => __('columns', )
	)
);

add_action( 'init', 'hero_pattern' );

register_block_pattern(
	'flex_pattern',
	array(
		'title'       => __( 'flex-columns', 'cmsf' ),
		'description' => _x( 'Columns that dont have a size so they collapse as best possible.', 'Block pattern description', 'cmsf' ),
		'content'     => "<!-- wp:columns {\"className\":\"flex-columns\"} -->\n<div class=\"wp-block-columns flex-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image -->\n</div><!-- /wp:column -->\n<!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph -->\n<p>Must go faster... go, go, go, go, go! We gotta burn the rain forest, dump toxic waste, pollute the air, and rip up the OZONE! 'Cause maybe if we screw up this planet enough, they won't want it anymore! Must go faster. I gave it a cold? I gave it a virus. A computer virus.</p><!-- /wp:paragraph -->\n</div></div><!-- /wp:group --></div><!-- /wp:column -->\n</div><!-- /wp:columns -->",
	)
);

add_action( 'init', 'flex_pattern' );

register_block_pattern(
	'zero_pattern',
	array(
			'title'       => __( 'cmsf-zero', 'cmsf' ),
			'description' => _x( 'Two Columns with an image behind.', 'Block pattern description', 'cmsf' ),
			'content'     => "<!-- wp:group {\"align\":\"full\",\"className\":\"cmsf-zero\"} --><div class=\"wp-block-group alignfull cmsf-zero\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"full\"} -->\n<div class=\"wp-block-columns alignfull is-style-fullwidth-wide\" ><!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"></div><!-- /wp:column -->\n<!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:heading -->\n<h2>Jeffsum</h2><!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p>Must go faster... go, go, go, go, go! They're using our own satellites against us. And the clock is ticking. Hey, you know how I'm, like, always trying to save the planet? Here's my chance. Forget the fat lady! You're obsessed with the fat lady! Drive us out of here!</p><!-- /wp:paragraph -->\n</div><!-- /wp:column -->\n</div><!-- /wp:columns -->\n<!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image -->\n</div></div><!-- /wp:group -->",
			// 'categories'  => __('columns', )
	)
);

add_action( 'init', 'zero_pattern' );
