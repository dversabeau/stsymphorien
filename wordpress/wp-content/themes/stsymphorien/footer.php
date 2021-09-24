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
		<div class="site-info">

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
