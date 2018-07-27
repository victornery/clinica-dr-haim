<?php
/**
 * Registrando os post types
 * 
 * @author Nicholas Lima
 * @author Victor Nery
 * @category post_types
 */

function post_type_procedimentos() {
    $labels = array(
        'name' => 'Procedimentos',
        'singular_name' => 'Procedimentos',
        'menu_name' => 'Procedimentos',
        'add_new' => _x('Adicionar Procedimento', 'item'),
        'add_new_item' => __('Adicionar Novo Procedimento'),
        'edit_item' => __('Editar Procedimento'),
        'new_item' => __('Nova Procedimento')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'procedimentos'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-universal-access',
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('procedimentos', $args);
}
add_action('init', 'post_type_procedimentos');

function post_type_banners() {
    $labels = array(
        'name' => 'Banners',
        'singular_name' => 'Banners',
        'menu_name' => 'Banners',
        'add_new' => _x('Adicionar Banner', 'item'),
        'add_new_item' => __('Adicionar Novo Banner'),
        'edit_item' => __('Editar Banner'),
        'new_item' => __('Novo Banner')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'banners'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-universal-access',
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('banner', $args);
}
add_action('init', 'post_type_banners');

