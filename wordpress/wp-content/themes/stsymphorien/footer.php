<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stsymphorien
 */

?>

	<footer id="colophon" class="site-footer">
        <div class="footer-body">
            <div class="footer-coordonnees">
                <?php if (!is_front_page()) : ?>
	                <?php $args = [
		                'pagename' => 'accueil',
	                ];
	                $the_query = new WP_Query($args); ?>
	                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();endwhile;endif; ?>
                <?php endif; ?>
                <?php the_field('horaires'); ?>
            </div>
            <div class="footer-shortlinks">
                <h2>Liens rapides</h2>
	            <?php
	            wp_nav_menu(
		            array(
			            'menu' => 'liens-rapides',
			            'container' => '',
		            )
	            );
	            ?>
            </div>
            <div class="footer-useful-link">
                <h2>Liens utiles</h2>
	            <?php
	            wp_nav_menu(
		            array(
			            'menu' => 'liens-utiles',
			            'container' => '',
		            )
	            );
	            ?>
            </div>
        </div>
		<div class="site-info">
            <p>© 2021 - St Symphorien | Site créé par : <a target="_blank" href="https://www.danalexandre-developpement.fr/"><img class="logo-dandev" src="<?php bloginfo('template_directory'); ?>/../../images/logo-dandev.png" alt="Logo Dandev">Dandev</a></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<?php if (is_front_page()): ?>
    <script src="<?php get_template_directory() ?>/wp-content/themes/stsymphorien/js/front-page.js"></script>
<?php endif; ?>

</body>
</html>
