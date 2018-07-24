<?php

add_filter( 'rwmb_meta_boxes', 'wpcf_meta_boxes' );
function wpcf_meta_boxes($meta_boxes) {

//Tipo de Parceiros

$meta_boxes[] = array(
    'id' => 'dados_parceiro',
    'title' => 'Sobre o Parceiro',
    'pages' => array( 'parceiros'),
    'context' => 'normal',
    'priority' => 'high',

    // List of meta fields
    'fields' => array(
       array(
        'name' => 'Tipo de Parceiro',
        'id' => 'tipo_parceiro',
        'type' => 'radio',
        'placeholder' => '',
        'options' => array(
            'Curso',
            'Clinica',
            'Fotografia',
        ),
        'inline' => true,
        ),
        array(
            'name'       => 'Site',
            'id'         => 'link_parceiro',
            'type'       => 'text'
        ),
        array(
            'name'       => 'Instagram',
            'id'         => 'ig_parceiro',
            'type'       => 'text'
        ),
        array(
            'name'       => 'Facebook',
            'id'         => 'fb_parceiro',
            'type'       => 'text'
        ),
        array(
            'name'       => 'Telefone',
            'id'         => 'tel_parceiro',
            'type'       => 'text'
        ),

        // array(
        //         'name'        => 'Especilidades',
        //         'id'          => 'especialidades_parceiro',
        //         'type'        => 'post',
        //         'post_type'   => 'especialidades',
        //         'field_type'  => 'select_advanced',
        //         'placeholder' => 'Selecione a especialidade',
        //         'multiple'    => true,
        //         'query_args'  => array(
        //             'post_status'    => 'publish',
        //             'posts_per_page' => - 1,
        //         ),
        //         'admin_columns' => array('position' => 'before date', 'title' => 'Especialidades', 'sort' => false),
        //     ),    
    ),
);

$meta_boxes[] = array(
    'id' => 'infos_sobre-nos',
    'title' => 'Informações',
    'pages' => array('sobre-nos'),
    'context' => 'normal',
    'priority' => 'high',

    'include' => array(
        'relation'  => 'OR',
        'ID'  => 135,
    ),

    'fields' => array(
        array(
            'name'       => 'Título',
            'id'         => 'title_sobre-nos',
            'type'       => 'text'
        ),
        array(
            'name'       => 'Conteúdo',
            'id'         => 'content_sobre-nos',
            'type'       => 'textarea'
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'bairros',
    'title' => 'Bairros da Cidade',
    'pages' => array('cidades'),
    'context' => 'normal',
    'priority' => 'high',


    'fields' => array(
        array(
            'name'       => 'Nome do Bairro',
            'id'         => 'title_sobre-nos',
            'type'       => 'text',
            'clone' => true
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'details_plan',
    'title' => 'Benefícios do Plano',
    'pages' => array('planos'),
    'context' => 'normal',
    'priority' => 'high',


    'fields' => array(
        array(
            'name'       => 'Quantidade de Fotos',
            'id'         => 'qtd_photos',
            'type'       => 'number'
        ),
        array(
            'name'       => 'Ciclo do Plano',
            'desc'       => 'Quantidade de dias de vigência do plano',
            'id'         => 'qtd_days',
            'type'       => 'number'
        ),
        array(
            'name'       => 'Dias de Graça? (trial)',
            'id'         => 'qtd_trial',
            'type'       => 'number'
        ),
        array(
            'name'       => 'Cor do Plano',
            'id'         => 'color_plan',
            'type'       => 'color'
        ),
        array(
            'name'       => 'Valor do Plano',
            'id'         => 'valor_plan',
            'type'       => 'slider',
            'prefix'     => ('R$'),
            'suffix'     => (' BRL'),
            
            'js_options' => array(
                'min'  => 0,
                'max'  => 300,
                'step' => 5,
            ),
        ),
    )
);

//=========================================================================================
// END DEFINITION OF META BOXES
//=========================================================================================
	return $meta_boxes;
}

