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
	<meta name="theme-color" content="#1292ab">
	<meta name="theme-color" media="(prefers-color-scheme: dark)" content="#066b7e">

	<meta
		http-equiv="Content-Security-Policy"
		content="default-src 'self';
			style-src 'self' 'unsafe-inline' https://*.wp.com http://cdn-images.mailchimp.com/;
			script-src 'self' https://*.wp.com https://www.google.com https://www.gstatic.com https://www.youtube.com http://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js 'nonce-2726c7f26c' 'sha256-6r2qbSkz8dtBMS3ooVDFDLjaxGe3TBTfEbga5p/ptJs=' 'sha256-PrrYZwIbv7u8ClnAZglH3XIAcaemhBRwQg//ZjINEGg=' 'sha256-tKFEl+z38aZDlw9RMTEZaj9/SQjUxg/YwZE/x2IJW4Y=' 'sha256-dQ35t0GaQdSW4MS337Js/lfBjpF3Jpc8Bc8TgkEtQgg=' 'sha256-zP2IMPME2DmfLCZvj2W3aEQqgpME3S6fNQg88SESNF0=' 'sha256-vbDZObPgUGrM4MfomJalrWAAqwsIy7upNtZbLdJGX5c=' 'sha256-8MhWyiQ7GHsMbYi2+TlnbYXEHxvgxxGwpJw3zN/1Un4=' 'sha256-FGEZD6GOhQEtdq96C+JG61npCKQ0XuSeVIlofQfh/64=' 'sha256-P4d+Vw4dWPWDlMaIUaG+9x+zIfvnfzC+HBWlZz0ZOBM=' 'sha256-nht4k4pEGy/VO/w6BS9CLqqtxVYw8KN9SFS8Hu7CTfs=' 'sha256-elz4ajBclcFXdFtkVBylMzqIJMIenL31+SObtf4CiUU=' 'sha256-RnMPYtX3pbykR17QX7jdjwHRmbviYs9rpdHi6cTEFWQ=' 'sha256-W0QcvkvL9KMNhzUk9t1VI49fXP9jq/bE1/UQJHPBpoQ=' 'sha256-ym6CMIQwvCArfmP3pNq+DsBjxrs7rxVJIqZe3kxKf3k=' 'sha256-O0HIT7Tx9rPpW9P7e/4gRHaiR5xm3LJTMGtqDD0PRno=' 'sha256-hZvX17EkAAZv6kYiKFz/Ttxy1yULhiEPGB033HJJ1fI=' 'sha256-2TAE/gyhscEAJjk5Ce1b3jYxcYi47fGhWtAR7Osl8uc=' 'sha256-rUuYfDOfSE9HuCpEMLq+y6mIFRUp2/kgBE/loCo10xs=' 'sha256-Y4RTbhgFAukCE538OJxlfep2lwiDvGetyExKRuxVH2I=' 'sha256-a+HbuaDUgElB3rIFpWHufngQwmvsH/11HQUn0IYkeiE=' 'sha256-MIOPQeGKD9ts66z0L38P096PIWSwI3GDscbxUALPA4A=' 'sha256-XgnE31sR+EH9+9ovJmGnW3WCeDhrDFaewLfuwVFGKgU=' 'sha256-mZgjKiSNxBU+336+4PdEEY/BCWEqfTNzjTakTFwURu8=' 'sha256-jw6wuhWPhSZ5tKyH5N9jFaB//QeSffVRWpyRfn9XC/g=' 'sha256-AZK2iXicWyTjeblE4h+SChrqV84clxWJla2Ikxlb/Lo=';
			img-src 'self' https://*.wp.com secure.gravatar.com http://cdn-images.mailchimp.com https://eep.io/mc-cdn-images/template_images/branding_logo_text_dark_dtp.svg;
			font-src 'self' data: https://*.wp.com;
			child-src https://www.youtube.com https://player.vimeo.com;"
	/>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php get_template_part( 'events' ) ?>

  <div id="page" class="site">
    
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>
    
    <header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">
      
      <!-- I dont know if I can grab the alt from this image -->
      <img src="<?php echo get_option( 'header_image' ); ?>" alt="<?php echo get_option( 'header_alt' ); ?>" />

      <div class="header-grid--overlay" style="background-color: <?php echo get_option( 'sides_of_header_image' ); ?>"><!-- stay gold --></div>

      <!-- this whole thing is a guess and check -->
      <svg viewBox="0 0 100 10" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="m 0 8.01 C 25 10, 75 2, 100 2 L 100 10.1 L 0 10.1 Z" id="hide-right" />
        <path d="m 0 8 C 25 10, 75 2, 100 2" fill="transparent" stroke="#1292ab" id="site-header-wave" />
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

        <!-- <button>Donate</button> -->
        <a href="https://www.paypal.com/donate?hosted_button_id=7U68QJ65WV9C6" class="button" >Donate</a>

      </div><!-- .hero -->

	</header><!-- #masthead -->

  <div class="site-nav-wrapper">
    <?php get_template_part( 'template-parts/header/site-nav' ); ?>
  </div>
  
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
