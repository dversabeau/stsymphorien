<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package stsymphorien
 */

get_header();
?>

	<main id="primary" class="site-main">

        <div class="body-container">

            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Oops! Cette page ne peut être trouvé.', 'stsymphorien' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e( 'Il semblerait que nous ne trouvons pas la page que vous cherchez. Réessayez avec de nouveaux mot-clés ou cliquez sur les articles récents.', 'stsymphorien' ); ?></p>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->
            <?php get_sidebar() ?>
        </div>

	</main><!-- #main -->

<?php
get_footer();
