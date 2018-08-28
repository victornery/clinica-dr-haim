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
        'new_item' => __('Novo Procedimento')
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
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('procedimentos', $args);
}
add_action('init', 'post_type_procedimentos');

function post_type_cirurgias() {
    $labels = array(
        'name' => 'Cirurgias',
        'singular_name' => 'Cirurgias',
        'menu_name' => 'Cirurgias',
        'add_new' => _x('Adicionar Cirurgia', 'item'),
        'add_new_item' => __('Adicionar Novo Cirurgia'),
        'edit_item' => __('Editar Cirurgia'),
        'new_item' => __('Nova Cirurgia')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'cirurgias'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-universal-access',
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('cirurgias', $args);
}
add_action('init', 'post_type_cirurgias');

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
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'banners'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-slides',
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('banner', $args);
}
add_action('init', 'post_type_banners');

