<?php

/*
Plugin Name: Sidebar DANDEV
Plugin URI:
Description: Widget qui affiche la sidebar personnalisé
Author: DANDEV
Version: 1.0.0
*/

add_action( 'widgets_init' , 'widgetDANDEV_init' );

function widgetDANDEV_init() {

    register_widget("widgetSidebar");

}

class widgetSidebar extends WP_Widget {

// Constructeur du widgets
    function widgetSidebar(){
        $this->__construct('DANDEVSidebar',
	        $name = 'DANDEVSidebar',
	        array('description' => 'Affichage de la sidebar personnalisé'));
    }

//  Mise en forme
    function widget($args,$instance){

		$args = [
            'post_type' => 'post'
        ];

        $posts = get_posts($args);

		if ( $posts ) {
			echo '<div class="widget-last-posts">';
				echo '<div class="widget-title">';
					echo '<h1>Articles récents</h1>';
				echo '</div>';
				echo '<div class="widget-body">';
					foreach ($posts as $post) {
						setup_postdata($post);
						echo '<a href="'.get_home_url() .'/'. $post->post_name.'">'.$post->post_title.'</a></br>';
					}
				echo '</div>';
			echo '</div>';
		}


	    if (get_field('contacts')){
	        echo '<div class="widget-contact">';
			    echo '<div class="widget-title">';
			        echo '<h1>Contact</h1>';
			    echo '</div>';
		        echo '<div class="widget-body">';
		            the_field('contacts');
		        echo '</div>';
		    echo '</div>';
        }

        if (get_field('document_1')){
	        echo '<div class="widget-document">';
		        echo '<div class="widget-title">';
		            echo '<h1>Documents</h1>';
		        echo '</div>';
	            echo '<div class="widget-body">';
		            echo '<h2>'.get_field('titre_du_document_1').'</h2>';
		            echo '<a href="'.get_field('document_1').'" download="">Télécharger</a>';
		            if (get_field('document_2')){
			            echo '<h2>'.get_field('titre_du_document_2').'</h2>';
			            echo '<a href="'.get_field('document_2').'" download="">Télécharger</a>';
		            }
			        if (get_field('document_3')){
				        echo '<h2>'.get_field('titre_du_document_3').'</h2>';
				        echo '<a href="'.get_field('document_3').'" download="">Télécharger</a>';
			        }
			        if (get_field('document_4')){
				        echo '<h2>'.get_field('titre_du_document_4').'</h2>';
				        echo '<a href="'.get_field('document_4').'" download="">Télécharger</a>';
			        }
	            echo '</div>';
	        echo '</div>';

        }

         if (get_field('information_complementaire')){
			echo '<div class="widget-info">';
				echo '<div class="widget-title">';
					echo '<h1>Informations complémentaire</h1>';
				echo '</div>';
	            echo '<div class="widget-body">';
	                the_field('information_complementaire');
	            echo '</div>';

	         echo '</div>';
         }
    }

// Récupération des paramètres
    function update($new_instance, $old_instance){

    }

// Paramètres dans l’administration
    function form($instance){

    }

}