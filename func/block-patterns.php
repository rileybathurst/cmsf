<?php

// add some patterns two wide columns with some images behind
// currently this isnt working
/* function cmsf_pattern_category() {
	register_block_pattern_category(
		'hero',
		array( 'label' => _x( 'Hero', 'Block pattern category', 'textdomain' ) )
	);
}
add_action( 'init', 'cmsf_pattern_category' ); */

/*
  These categories already exist in core as of 5.5.1:
    buttons
    columns
    gallery
    header
    text
*/


register_block_pattern(
	'cmsf_patterns',
	array(
			'title'       => __( 'cmsf-hero', 'cmsf' ),
			'description' => _x( 'Two Columns with an image behind.', 'Block pattern description', 'cmsf' ),
			'content'     => "<!-- wp:group --><div class=\"wp-block-group cmsf-hero\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"full\"} -->\n<div class=\"wp-block-columns alignfull is-style-fullwidth-wide\" ><!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:heading -->\n<h2>Supporting</h2><!-- /wp:heading -->\n</div><!-- /wp:column -->\n<!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:paragraph -->\n<p>hey</p><!-- /wp:paragraph -->\n</div><!-- /wp:column -->\n</div><!-- /wp:columns -->\n<!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image -->\n</div></div><!-- /wp:group -->",
			// 'categories'  => __('columns', )
	)
); 

add_action( 'init', 'cmsf_patterns' );