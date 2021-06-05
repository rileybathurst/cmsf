<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

 // I think I can leave more of this as it was

	// site-header.php
	$wrapper_classes  = 'site-header';
	$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
	$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
	$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';

	// site-branding.php
	$blog_info    = get_bloginfo( 'name' );
	$description  = get_bloginfo( 'description', 'display' );
	$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
	$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>

	<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">

    <div class="header-grid--overlay"><!-- stay gold --></div>

    <svg viewBox="0 0 100 10" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="100" height="2" y="8" />
      <path d="m 0 8 C 25 10, 75 2, 100 2 L 100 8 L 0 8 Z" />
      <path d="m 0 8 C 25 10, 75 2, 100 2" stroke="#1292ab" fill="transparent" stroke-width="2" />
    </svg>

    <div class="hero">
      <!-- title -->
      <div class="site-branding">
        <?php if ( has_custom_logo() && $show_title ) : ?>
          <div class="site-logo"><?php the_custom_logo(); ?></div>
        <?php endif; ?>

        <?php if ( $blog_info ) : ?>
          <?php if ( is_front_page() && ! is_paged() ) : ?>
            <h1 class="<?php echo esc_attr( $header_class ); ?>"><?php echo esc_html( $blog_info ); ?></h1>
          <?php elseif ( is_front_page() || is_home() ) : ?>
            <h1 class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
          <?php else : ?>
            <p class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></p>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ( $description && true === get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
          <p class="site-description">
            <?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput ?>
          </p>
        <?php endif; ?>
      </div><!-- .site-branding -->
      <!-- /title -->

      <button>Donate</button>
    </div><!-- .hero -->

	</header><!-- #masthead -->

  <div class="site-nav-wrapper">
    <?php get_template_part( 'template-parts/header/site-nav' ); ?>
  </div>
  
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
