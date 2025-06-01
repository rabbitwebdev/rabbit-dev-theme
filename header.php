<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

  <?php $head_code = get_field('head_code', 'options'); ?>
  <?php $body_code = get_field('body_code', 'options'); ?>
    <?php $woocoomerce_styles = get_field('woocoomerce_styles', 'options'); ?>
  <?php echo $head_code ; ?>
</head>

<body <?php body_class(); ?>>
  <?php echo $body_code ; ?>
<main id="page" class="hfeed site woo-<?php echo $woocoomerce_styles ; ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'devrabbittheme' ); ?></a>

	    <header id="masthead" class="site-header  text-white" role="banner" >
            <div class="container-xl">
                <div class="site-branding d-flex  justify-content-between flex-row align-items-center py-3">

                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title display-1 d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none"><a class="display-5" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title mb-0"><a class="display-5 title-link text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif;
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php endif;
                }
                ?>
                

                  <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </div>
            </div>

        </header><!-- #masthead -->
        <div class="main-content">