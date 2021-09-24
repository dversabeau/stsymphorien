<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stsymphorien
 */

$args = [
        'pagename' => 'accueil',
];

$the_query = new WP_Query($args);

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/sass/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'stsymphorien' ); ?></a>

	<header id="masthead" class="site-header">
<!--        <div class="topbar-pusher"></div>-->
        <div class="topbar">
            <div class="tophoraire">
                    <div id="tophoraire-button" class="tophoraire-button">Coordonnées & Horaires<span class="material-icons"></span></div>
                    <div id="tophoraire-text-container" class="tophoraire-text-container">
                        <?php if (!is_front_page()) : ?>
                            <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();endwhile;endif; ?>
                        <?php endif; ?>
                        <?php the_field('horaires'); ?>
                    </div>
            </div>
            <div class="topsocial">
                <?php if (get_field('facebook')) : ?>
                    <a href="<?php the_field('facebook'); ?>">
                        <img src="<?php get_template_directory();?>/wp-content/images/logo-facebook.svg" alt="logo facebook">
                    </a>
                <?php endif; ?>
                <?php wp_reset_postdata() ?>
            </div>
            <div class="toplogin">
                <a href="<?php home_url(); ?>/wp-admin/">Se connecter</a>
            </div>
        </div>
<!--        <div class="topinfo"></div>-->

<!--        -----------------Debut En tête----------------------->
        <div class="header-container">
            <?php if (is_front_page()) : ?>
                <div class="header-desktop">
                    <video autoplay loop src="<?php get_template_directory();?>/wp-content/images/st-symphorien.mp4" type="video/mp4"></video>
                </div>

                <div class="header-mobile">
                    <img src="<?php get_field('page-header') ? the_field('page-header') : get_template_directory();?>/wp-content/images/accueil-optimise-768x311.jpg" alt="Image d'en-tête">
                </div>
            <?php endif ?>

            <?php if (!is_front_page()) : ?>
                <div class="header-page">
                    <img src="<?php get_field('page-header') ? the_field('page-header') : get_template_directory();?>/wp-content/images/accueil-optimise.jpg" alt="Image d'en-tête">
                </div>
            <?php endif ?>
	        <?php custom_breadcrumbs(); ?>
        </div>

<!--        -----------------Fin En tête----------------------->

        <nav id="site-navigation" class="main-navigation">
            <div class="navbar">
                <div id="menu-button" class="menu-toggle">
                    <div></div>
                </div>
	            <?php
	            wp_nav_menu(
		            array(
			            'theme_location' => 'menu-1',
			            'container' => '',
		            )
	            );
	            ?>
                <div class="search-form-pusher"></div>
                <form role="search" method="get" class="search-form" action="<?php home_url(); ?>">
                    <button type="submit" class="search-submit"></button>
                    <input type="search" class="search-field" placeholder="Recherche..." value="" name="s">
                    <div class="close-search-form"></div>
                </form>
            </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
