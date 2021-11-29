<?php

get_header();

?>

	<main id="primary" class="site-main">

		<header class="page-header">
			<h1 class="page-title">
				Tous les echos
			</h1>
		</header><!-- .page-header -->

		<?php
		if (have_posts()) :
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'search' );


			endwhile; // End of the loop.

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
