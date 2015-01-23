<?php
defined('ABSPATH') or die("No script kiddies please!");
/**
 * Plugin Name: Autolote
 * Plugin URI: http://about.me/kaloz
 * Description: Plugin para la administracionde con Wordpress
 * Version: 1.0.0
 * Author: Carlos Hernandez
 * Author URI: http://about.me/kaloz
 * License: GPL2
 */

/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function register_autolote() {
 
    $labels = array(
        'name' => _x( 'Ver todos los autos', 'auto_lote' ),
        'singular_name' => _x( 'Todos los autos', 'auto_lote' ),
        'add_new' => _x( 'Agregar nuevo', 'auto_lote' ),
        'add_new_item' => _x( 'Agregar nuevo auto', 'auto_lote' ),
        'edit_item' => _x( 'Editar auto', 'auto_lote' ),
        'view_item' => _x( 'Ver autos', 'auto_lote' ),
        'search_items' => _x( 'Buscar autos', 'auto_lote' ),
        'not_found' => _x( 'No se encontro auto', 'auto_lote' ),
        'not_found_in_trash' => _x( 'No se encontro autos en la papelera', 'auto_lote' ),
        'parent_item_colon' => _x( 'Auto padre:', 'auto_lote' ),
        'menu_name' => _x( 'Autolote', 'auto_lote' ),
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Búqueda avanzada de autos',
        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'marcas', 'anio', 'rango', 'tipo', 'estado', 'carroceria', 'color', 'conbustible', 'transmicion', 'traccion' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => plugins_url('autolote').'/images/icon-menu.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
 
    register_post_type( 'auto_lote', $args );
}
 
add_action( 'init', 'register_autolote' );


//Marcas de Auto
function marcas_taxonomy() {
    register_taxonomy(
        'marcas',
        'auto_lote',
        array(
            'hierarchical' => true,
            'label' => 'Marcas',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'marcas',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'marcas_taxonomy');



//Rango de precios del auto
function rango_taxonomy() {
    register_taxonomy(
        'rango',
        'auto_lote',
        array(
            'hierarchical' => true,
            'label' => 'Rango de precio',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'rango-precio',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'rango_taxonomy');


//Año del auto
function anio_taxonomy() {
    register_taxonomy(
        'anio',
        'auto_lote',
        array(
            'hierarchical' => true,
            'label' => 'Año',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'anio',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'anio_taxonomy');

//Tipo de Auto (Compra Alquiler)
function tipo_taxonomy() {
    register_taxonomy(
        'tipo',
        'auto_lote',
        array(
            'hierarchical' => true,
            'label' => 'Tipo de auto',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'tipo',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'tipo_taxonomy');

//Estado del auto (Nuevo Usado)
function estado_taxonomy() {
    register_taxonomy(
        'estado',
        'auto_lote',
        array(
            'hierarchical' => true,
            'label' => 'Estado',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'estado',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'estado_taxonomy');

//Carrosceria (picup, Camion)
function carroceria_taxonomy() {
    register_taxonomy(
        'carroceria',
        'auto_lote',
        array(
            'hierarchical' => true,
            'label' => 'Carrocería',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'carroceria',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'carroceria_taxonomy');

//Color
function color_taxonomy() {
    register_taxonomy(
        'color',
        'auto_lote',
        array(
            'hierarchical' => true,
            'label' => 'Color',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'color',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'color_taxonomy');

//Transmisión
function transmision_taxonomy() {
    register_taxonomy(
        'transmision',
        'auto_lote',
        array(
            'hierarchical' => true,
            'label' => 'Transmisión',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'transmision',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'transmision_taxonomy');


//Combustible
function combustible_taxonomy() {
    register_taxonomy(
        'combustible',
        'auto_lote',
        array(
            'hierarchical' => true,
            'label' => 'Combustible',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'combustible',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'combustible_taxonomy');


//Tración
function traccion_taxonomy() {
    register_taxonomy(
        'traccion',
        'auto_lote',
        array(
            'hierarchical' => true,
            'label' => 'Tracción',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'traccion',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'traccion_taxonomy');


function create_autolote_pages()
{
    $post = array(
        'comment_status' => 'closed',
        'ping_status' => 'closed',
        'post_date' => date('Y-m-d H:i:s'),
        'post_name' => 'autolote',
        'post_status' => 'publish',
        'post_title' => 'Auto Lote',
        'post_type' => 'page',
    );
    
    $newvalue = wp_insert_post($post, FALSE);
    update_option('mrpage', $newvalue);
}

register_activation_hook(__FILE__, 'create_autolote_pages');