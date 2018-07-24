<?php
/**
* POST TYPES PERSONALIZADOS
*/

//=========================================================================================
// POST TYPE MASSAGENS
//=========================================================================================

function post_type_massagens_register() {
    $labels = array(
        'name' => 'Massagens',
        'singular_name' => 'Massagem',
        'menu_name' => 'Massagens',
        'add_new' => _x('Adicionar Massagem', 'item'),
        'add_new_item' => __('Adicionar Nova Massagem'),
        'edit_item' => __('Editar Massagem'),
        'new_item' => __('Nova Massagem')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'massagens'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-universal-access',
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('massagens', $args);
}
add_action('init', 'post_type_massagens_register');

//=========================================================================================
// POST TYPE CIDADES
//=========================================================================================

function post_type_cidades_register() {
    $labels = array(
        'name' => 'Cidades',
        'singular_name' => 'Cidade',
        'menu_name' => 'Cidades',
        'add_new' => _x('Adicionar Cidade', 'item'),
        'add_new_item' => __('Adicionar Nova Cidade'),
        'edit_item' => __('Editar Cidade'),
        'new_item' => __('Nova Cidade')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'cidades'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-site',
        'supports' => array('title', 'thumbnail')
    );
    register_post_type('cidades', $args);
}
add_action('init', 'post_type_cidades_register');

//=========================================================================================
// POST TYPE PARCEIROS
//=========================================================================================

function post_type_parceiros_register() {
    $labels = array(
        'name' => 'Parceiros',
        'singular_name' => 'Parceiro',
        'menu_name' => 'Parceiros',
        'add_new' => _x('Adicionar Parceiro', 'item'),
        'add_new_item' => __('Adicionar Novo Parceiro'),
        'edit_item' => __('Editar Parceiro'),
        'new_item' => __('Novo Parceiro')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'parceiros'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-plus-alt',
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('parceiros', $args);
}

add_action('init', 'post_type_parceiros_register');

//=========================================================================================
// POST TYPE AJUDA
//=========================================================================================

function post_type_ajuda_register() {
    $labels = array(
        'name' => 'Ajuda',
        'singular_name' => 'Ajuda',
        'menu_name' => 'Ajuda',
        'add_new' => _x('Adicionar Dúvida', 'item'),
        'add_new_item' => __('Adicionar Nova Dúvida'),
        'edit_item' => __('Editar Dúvida'),
        'new_item' => __('Nova Dúvida')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'ajuda'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-info',
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('ajuda', $args);
}

add_action('init', 'post_type_ajuda_register');


//=========================================================================================
// POST TYPE PLANOS
//=========================================================================================

function post_type_planos_register() {
    $labels = array(
        'name' => 'Planos',
        'singular_name' => 'Plano',
        'menu_name' => 'Planos',
        'add_new' => _x('Adicionar Plano', 'item'),
        'add_new_item' => __('Adicionar Novo Plano'),
        'edit_item' => __('Editar Plano'),
        'new_item' => __('Novo Plano')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'planos'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('planos', $args);
}
add_action('init', 'post_type_planos_register');
