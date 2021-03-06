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


    // this will hopefully become theme.json
    // https://wordpress.org/support/topic/override-color-palette-in-child-theme/
    // add_theme_support( 'disable-custom-colors' );
    add_theme_support( 'editor-color-palette', array(
        array(
                'name' => esc_attr__( 'maya', 'twentytwentyonechild' ),
                'slug' => 'maya',
                'color' => '#1292AB',
        ),
        array(
                'name' => esc_attr__( 'cerulean', 'twentytwentyonechild' ),
                'slug' => 'cerulean',
                'color' => '#066B7E',
        ),
        array(
                'name' => esc_attr__( 'seahorse', 'twentytwentyonechild' ),
                'slug' => 'seahorse',
                'color' => '#FACC02',
        ),
        array(
                'name' => esc_attr__( 'black', 'twentytwentyonechild' ),
                'slug' => 'black',
                'color' => '#000',
        ),
        array(
                'name' => esc_attr__( 'dark gray', 'twentytwentyonechild' ),
                'slug' => 'dark-gray',
                'color' => '#28303d',
        ),
        array(
                'name' => esc_attr__( 'gray', 'twentytwentyonechild' ),
                'slug' => 'gray',
                'color' => '#39414d',
        ),
        array(
                'name' => esc_attr__( 'light gray', 'twentytwentyonechild' ),
                'slug' => 'light-gray',
                'color' => '#f0f0f0',
        ),
        array(
                'name' => esc_attr__( 'white', 'twentytwentyonechild' ),
                'slug' => 'white',
                'color' => '#fff',
        ),
    ) );

    // https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#editor-styles
    add_theme_support( 'editor-styles' );
    add_editor_style( '/style-editor.css' );

}
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features', 100 );

// block patterns
// require_once( get_stylesheet_directory_uri() . '/func/block_patterns.php' );
// include( get_template_directory() . '/func/block_patterns.php' );
// require_once( get_stylesheet_directory_uri() . '/func/block_patterns.php' );
function register_my_patterns() {
    register_block_pattern(
        'cmsf_patterns',
        array(
                'title'       => __( 'cmsf-hero', 'cmsf' ),
                'description' => _x( 'Two Columns with an image behind.', 'Block pattern description', 'cmsf' ),
                'content'     => "<!-- wp:group --><div class=\"wp-block-group cmsf-hero\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"full\"} -->\n<div class=\"wp-block-columns alignfull is-style-fullwidth-wide\" ><!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:heading -->\n<h2>Supporting</h2><!-- /wp:heading -->\n</div><!-- /wp:column -->\n<!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:paragraph -->\n<p>hey</p><!-- /wp:paragraph -->\n</div><!-- /wp:column -->\n</div><!-- /wp:columns -->\n<!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image -->\n</div></div><!-- /wp:group -->",
                // 'categories'  => __('columns', )
        )
    );

    register_block_pattern(
        'hero_pattern',
        array(
                'title'       => __( 'cmsf-hero', 'cmsf' ),
                'description' => _x( 'Two Columns with an image behind.', 'Block pattern description', 'cmsf' ),
                'content'     => "<!-- wp:group {\"align\":\"full\",\"className\":\"cmsf-hero\"} --><div class=\"wp-block-group alignfull cmsf-hero\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"full\"} -->\n<div class=\"wp-block-columns alignfull is-style-fullwidth-wide\" ><!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:heading -->\n<h2>Jeffsum</h2><!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p>Must go faster... go, go, go, go, go! They're using our own satellites against us. And the clock is ticking. Hey, you know how I'm, like, always trying to save the planet? Here's my chance. Forget the fat lady! You're obsessed with the fat lady! Drive us out of here!</p><!-- /wp:paragraph -->\n</div><!-- /wp:column -->\n<!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"></div><!-- /wp:column -->\n</div><!-- /wp:columns -->\n<!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image -->\n</div></div><!-- /wp:group -->",
                // 'categories'  => __('columns', )
        )
    );

    register_block_pattern(
        'flex_pattern',
        array(
            'title'       => __( 'flex-columns', 'cmsf' ),
            'description' => _x( 'Columns that dont have a size so they collapse as best possible.', 'Block pattern description', 'cmsf' ),
            'content'     => "<!-- wp:columns {\"className\":\"flex-columns\"} -->\n<div class=\"wp-block-columns flex-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image -->\n</div><!-- /wp:column -->\n<!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph -->\n<p>Must go faster... go, go, go, go, go! We gotta burn the rain forest, dump toxic waste, pollute the air, and rip up the OZONE! 'Cause maybe if we screw up this planet enough, they won't want it anymore! Must go faster. I gave it a cold? I gave it a virus. A computer virus.</p><!-- /wp:paragraph -->\n</div></div><!-- /wp:group --></div><!-- /wp:column -->\n</div><!-- /wp:columns -->",
        )
    );

    register_block_pattern(
        'zero_pattern',
        array(
                'title'       => __( 'cmsf-zero', 'cmsf' ),
                'description' => _x( 'Two Columns with an image behind.', 'Block pattern description', 'cmsf' ),
                'content'     => "<!-- wp:group {\"align\":\"full\",\"className\":\"cmsf-zero\"} --><div class=\"wp-block-group alignfull cmsf-zero\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"full\"} -->\n<div class=\"wp-block-columns alignfull is-style-fullwidth-wide\" ><!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"></div><!-- /wp:column -->\n<!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:heading -->\n<h2>Jeffsum</h2><!-- /wp:heading -->\n<!-- wp:paragraph -->\n<p>Must go faster... go, go, go, go, go! They're using our own satellites against us. And the clock is ticking. Hey, you know how I'm, like, always trying to save the planet? Here's my chance. Forget the fat lady! You're obsessed with the fat lady! Drive us out of here!</p><!-- /wp:paragraph -->\n</div><!-- /wp:column -->\n</div><!-- /wp:columns -->\n<!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image -->\n</div></div><!-- /wp:group -->",
                // 'categories'  => __('columns', )
        )
    );

}
add_action( 'init', 'register_my_patterns' );

/**
    * Customizer Page
*/


// https://developer.wordpress.org/reference/hooks/customize_register/
function twenttwentyone_child_customize_register($wp_customize){
    $wp_customize->add_section('cmsf_options', array(
        'title'			=> __('CMSF Options', 'twenttwentyone_child'),
        'description'	=> '',
        'priority'		=> 160, // guess and check
    ));

    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('header_image', array(
        'default'		=> 'image.jpg',
        'capability'	=> 'edit_theme_options',
        'type'			=> 'option',
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize, 'custom_header_image', array(
                'label'		=> __( 'Header Image', 'twenttwentyone_child' ),
                'section'	=> 'cmsf_options',
                'settings'	=> 'header_image',
                'context'	=> 'your_setting_context'
            )
        )
    );
    // <img src="<?php echo get_option( 'header_image' ); " alt="" />

    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('header_alt', array(
        'default'		=> 'a photo of the cordell marine sanctuary',
        'capability'	=> 'edit_theme_options',
        'type'			=> 'option',
    ));

    $wp_customize->add_control('header_alt', array(
        'label'		=> __('Header Image alt text', 'twenttwentyone_child'),
        'section'	=> 'cmsf_options',
        'settings'	=> 'header_alt',
    ));
    // <h1> php echo get_option( 'text_test' ); </h1>

    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting(
        // 'twenttwentyone_child_theme_options[link_color]', array(
        'sides_of_header_image', array(
            'default'				=> '#000',
            'sanitize_callback'		=> 'sanitize_hex_color',
            'capability'			=> 'edit_theme_options',
            'type'					=> 'option',
        )
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize, 'sides_of_header_image', array(
            'label'		=> __('Side of the header image', 'twenttwentyone_child'),
            'section'	=> 'cmsf_options',
            'settings'	=> 'sides_of_header_image',
        )
    ));
    // <h1> php echo get_option( 'twenttwentyone_child_theme_options' ); </h1>

    //  =============================
    //  = Checkbox                  =
    //  =============================
    $wp_customize->add_setting('single_event', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));

    $wp_customize->add_control('single_event', array(
        'settings'	=> 'single_event',
        'label'		=> __('Show Single Event'),
        'section'	=> 'cmsf_options',
        'type'		=> 'checkbox',
    ));
}
add_action('customize_register', 'twenttwentyone_child_customize_register');

// REMOVE WP EMOJI
// https://www.denisbouquet.com/remove-wordpress-emoji-code/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
