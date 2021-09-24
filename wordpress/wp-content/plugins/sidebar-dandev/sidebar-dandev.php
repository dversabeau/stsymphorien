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
        $this->__construct('DANDEVSidebar', $name = 'DANDEVSidebar', array('description' => 'Affichage de la sidebar personnalisé'));
    }

//  Mise en forme
    function widget($args,$instance){

        if (get_field('contacts')){
            echo '<h1>Contact</h1>';
            the_field('contacts');
        }

        if (get_field('document')){
            echo '<h1>Documents</h1>';
            echo '<h2>'.get_field('titre_du_document').'</h2>';
            echo '<a href="'.get_field('document').'" download="">Télécharger</a>';
        }

         if (get_field('information_complementaire')){
             echo '<h1>Informations complémentaire</h1>';
             the_field('information_complementaire');
         }
    }

// Récupération des paramètres
    function update($new_instance, $old_instance){

    }

// Paramètres dans l’administration
    function form($instance){

    }

}