<?php

get_header();



?>
<main id="primary" class="site-main">

    <?php if (get_field('info')) : ?>
        <section class="informations">
            <div class="informations-container">
                <?php the_field('info'); ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="shortlinks">
        <?php if (get_field('lien_1')) : ?>
            <div class="shortlink">
                <a href="<?php the_field('lien_1') ?>">
                    <div class="shortlink-icon">
                        <img src="<?php the_field('image_lien_1') ?>" alt="">
                    </div>
                    <div class="shortlink-title"><?php the_field('titre_1') ?></div>
                </a>
            </div>
        <?php endif; ?>
	    <?php if (get_field('lien_2')) : ?>
            <div class="shortlink">
                <a href="<?php the_field('lien_2') ?>">
                    <div class="shortlink-icon">
                        <img src="<?php the_field('image_lien_2') ?>" alt="">
                    </div>
                    <div class="shortlink-title"><?php the_field('titre_2') ?></div>
                </a>
            </div>
	    <?php endif; ?>
	    <?php if (get_field('lien_3')) : ?>
            <div class="shortlink">
                <a href="<?php the_field('lien_3') ?>">
                    <div class="shortlink-icon">
                        <img src="<?php the_field('image_lien_3') ?>" alt="">
                    </div>
                    <div class="shortlink-title"><?php the_field('titre_3') ?></div>
                </a>
            </div>
	    <?php endif; ?>
	    <?php if (get_field('lien_4')) : ?>
            <div class="shortlink">
                <a href="<?php the_field('lien_4') ?>">
                    <div class="shortlink-icon">
                        <img src="<?php the_field('image_lien_4') ?>" alt="">
                    </div>
                    <div class="shortlink-title"><?php the_field('titre_4') ?></div>
                </a>
            </div>
	    <?php endif; ?>
	    <?php if (get_field('lien_5')) : ?>
            <div class="shortlink">
                <a href="<?php the_field('lien_5') ?>">
                    <div class="shortlink-icon">
                        <img src="<?php the_field('image_lien_5') ?>" alt="">
                    </div>
                    <div class="shortlink-title"><?php the_field('titre_5') ?></div>
                </a>
            </div>
	    <?php endif; ?>
	    <?php if (get_field('lien_6')) : ?>
            <div class="shortlink">
                <a href="<?php the_field('lien_6') ?>">
                    <div class="shortlink-icon">
                        <img src="<?php the_field('image_lien_6') ?>" alt="">
                    </div>
                    <div class="shortlink-title"><?php the_field('titre_6') ?></div>
                </a>
            </div>
	    <?php endif; ?>
    </section>
    <section class="actualites">
        <!-- Slider main container -->
        <div class="swiper swiper-actualites">
            <h2><span>Actualités</span> de la commune</h2>
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php $args = [
                    'post_type' => 'post'
                ];

                $posts = get_posts($args);
                ?>
                <?php if ( $posts ) : foreach ($posts as $post) : setup_postdata($post); ?>
                    <div class="swiper-slide" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
                        <div class="title-actualite"><?php the_title() ?></div>
                        <a href="<?php the_permalink(); ?>" class="button-actualite">Lire l'article<span class="material-icons">east</span></a>
                    </div>
                <?php endforeach; else : ?>
                    <p>Pas d'articles disponible</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination pagination-actualites"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev prev-actualites"></div>
            <div class="swiper-button-next next-actualites"></div>
        </div>
    </section>
    <section class="magazines">
        <?php $args = [
                'post_type' => 'echos',
            'post_per_page' => 3
        ];
        $echos = new WP_Query($args);
        $index = 0;
        ?>
	    <?php if ( $echos->have_posts() ) : while ($index < 1) : $echos->the_post(); ?>
        <div class="echo-container echo-container-<?= $index ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
            <div class="title-echos title-echo-<?= $index ?>"><?php the_title() ?></div>
            <a href="<?php the_permalink(); ?>" class="button-echos button-echo-<?= $index ?>">Consulter la revue</a>
        </div>
        <?php $index++ ?>
	    <?php endwhile; else : ?>
            <p>Pas de magazine disponible</p>
	    <?php endif; ?>
	    <?php wp_reset_postdata(); ?>

	    <?php $args = [
		    'post_type' => 'gazettes',
		    'post_per_page' => 2
	    ];
	    $echos = new WP_Query($args);
	    $index = 0;
	    ?>
	    <?php if ( $echos->have_posts() ) : while ($index < 2) : $echos->the_post(); ?>
            <div class="gazette-container gazette-container-<?= $index ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
                <div class="title-gazettes"><?php the_title() ?></div>
                <a href="<?php the_permalink(); ?>" class="button-gazettes button-gazette-<?= $index ?>">Consulter le magazine</a>
            </div>
		    <?php $index++ ?>
	    <?php endwhile; else : ?>
            <p>Pas de magazine disponible</p>
	    <?php endif; ?>
	    <?php wp_reset_postdata(); ?>

    </section>
    <section class="galerie">
	    <?php $args = [
	            'post_type' => 'galerie',
	    ];
	    $galerie = new WP_Query($args);
	    ?>
	    <?php if ( $galerie->have_posts() ) : while ($galerie->have_posts()) : $galerie->the_post(); ?>
            <?php $images = get_post_gallery_images($galerie->post) ?>
            <div class="swiper swiper-galerie">
                <div class="galerie-overlay">
                    <h2><span>St Symphorien</span> en images</h2>
                    <a href="<?php home_url(); ?>/galerie/">Découvrez les photos !</a>
                </div>
                <div class="swiper-wrapper">

                    <?php $index = 0; ?>
                    <?php foreach ($images as $image) : if ($index < 4) : ?>
                        <div class="swiper-slide" style="background-image: url(<?= $image ?>)"></div>
                    <?php $index++ ?>
                    <?php endif; endforeach; ?>
                </div>
                <?php endwhile; else : ?>
                    <p>Pas d'images disponible</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

                <!-- If we need pagination -->
                <div class="swiper-pagination pagination-galerie"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev prev-galerie"></div>
                <div class="swiper-button-next next-galerie"></div>
            </div>
    </section>
</main>

<?php
get_footer();
