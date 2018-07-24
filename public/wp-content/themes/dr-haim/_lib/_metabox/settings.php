<?php
add_filter( 'mb_settings_pages', 'prefix_options_page' );
function prefix_options_page( $settings_pages )
{
    $settings_pages[] = array(
        'id'          => 'theme-options',
        'option_name' => 'configuracoes_tema',
        'menu_title'  => __( 'Opções do Site', 'textdomain' ),
        'parent'      => 'themes.php',
    );
    return $settings_pages;
}

add_filter( 'rwmb_meta_boxes', 'prefix_options_meta_boxes' );
function prefix_options_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = array(
        'id'             => 'settings_catalogo',
        'title'          => 'Informações gerais',
        'context'        => 'normal',
        'settings_pages' => 'theme-options',
        'fields'         => array(

            array(
                'type' => 'heading',
                'name' => 'Contato',
            ),

            array(
                'name' => '',
                'id' => 'group_ends',
                'type' => 'group',
                // 'clone'       => true,
                // 'sort_clone'  => true,
                // 'collapsible' => true,
                'group_title' => array( 'field' => 'end_titulo' ), // ID of the subfield
                // 'save_state' => true,'clone' => true,
                // 'sort' => true,

                'fields' => array(

                    array(
                        'name' => 'Telefone',
                        'id' => 'end_telefone',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'E-mail',
                        'id' => 'end_email',
                        'type' => 'email',
                    ),
                    array(
                        'name' => 'Link do Facebook',
                        'id' => 'end_fb',
                        'type' => 'url',
                    ),
                    array(
                        'name' => 'Link do Instagram',
                        'id' => 'end_ig',
                        'type' => 'url',
                    ),
                ),
            ),

            array(
                'type' => 'heading',
                'name' => 'Textos alteraveis',
            ),

            array (
                'id' => 'index_nomes',
                'name' => 'Nomes variáveis na Página Inicial',
                'type'  => 'text',
                'clone' => true,
                'placeholder' => 'Nome',
                'add_button' => 'Adicionar outro',
                'sort_clone' => false,
            ),

            array(
                'type' => 'heading',
                'name' => 'Aviso',
            ),

            array (
                'id' => 'site_warning',
                'name' => 'Mensagem de Aviso',      
                'raw'     => false,
                'type'  => 'text',
                'placeholder' => 'Aviso',
            ),

            array(
                'type' => 'heading',
                'name' => 'Imagens randômicas',
            ),

            array (
                'id' => 'header_images',
                //'name' => 'Imagens variáveis nas Páginas',      
                'raw'     => false,
                'type'  => 'image_advanced',
                'force_delete'     => true,
                //'clone' => true,
                'max_file_uploads' => 6,
                'add_button' => 'Adicionar outro',
                //'sort_clone' => true,
            ),

           array('type' => 'divider',),

        ),
    );

    return $meta_boxes;
}