<?php
/*
* Filtros Posts functions
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

//=========================================================================================
// FILTROS META KEY
// Baseado no script: "Plugin Name: Admin Filter BY Custom Fields" (http://en.bainternet.info) de autoria de Bainternet (http://en.bainternet.info)
//=========================================================================================

add_filter( 'parse_query', 'WPCustom_filter' );
function WPCustom_filter($query) {
    global $pagenow;
    if ( is_admin() && $pagenow=='edit.php' && isset($_GET['filtro']) && $_GET['filtro'] != '') {
        $query->query_vars['meta_key'] = $_GET['filtro'];
    if (isset($_GET['value']) && $_GET['value'] != '')
        //$query->query_vars['meta_value'] = $_GET['value'];
        $query->query_vars['meta_query'] = array(
        array(
            'value'   => $_GET['value'],
            'key'     => $_GET['filtro'],
            'compare' => 'LIKE'
        ));
    }
}

add_action( 'restrict_manage_posts', 'WPCustom_filter_restrict_manage_posts' );
function WPCustom_filter_restrict_manage_posts() {
    global $wpdb;
    global $post_type;
    $current = isset($_GET['filtro'])? $_GET['filtro']:'';
    $current_v = isset($_GET['value'])? $_GET['value']:'';

    if('agenda' == $post_type) :
    echo 'Cidade:<input style="margin-left: 5px;" type="TEXT" name="value" value="'.$current_v.'" /><input type="hidden" name="filtro" value="agenda_local" />';
    endif;
}


//=========================================================================================
// COLUNAS AGENDA
//=========================================================================================

//ADD CLASS (LARGURA COLUNA)
add_action('admin_head', 'WPCustom_columns_css');
function WPCustom_columns_css() {
    $css = '<style>';
    $css .= '.column-data, .column-data_final {width: 10%;}';
    $css .= '.column-status {width: 1%;}';
    $css .= '.column-label  {width: 5%;text-align: center !important;}';
    $css .= '</style>';
    echo $css;
}

// REMOVE DEFAULT CATEGORY COLUMN
add_filter('manage_agenda_posts_columns', 'WPCustom_remove_column');
function WPCustom_remove_column($defaults) {
    //to get defaults column names:
    //print_r($defaults);
    unset($defaults['comments']);
    return $defaults;
}

//CRIA A COLUNA
add_filter('manage_agenda_posts_columns', 'WPCustom_columns_head');
function WPCustom_columns_head($defaults) {
    $defaults['status'] = '';
    $defaults['data'] = 'Início';
    $defaults['data_final'] = 'Encerramento';
    $defaults['tipo'] = 'Tipo';
    $defaults['curso'] = 'Curso';
    $defaults['label'] = 'Cor';
    return $defaults;
}

//EXIBE A COLUNA
add_action('manage_agenda_posts_custom_column', 'WPCustom_columns_content', 10, 2);
function WPCustom_columns_content($column_name, $post_ID) {

    if($column_name == 'status') {
        $dataAtual = date('Y-m-d');
        $dataStart = get_post_meta($post_ID, 'agenda_data', true);
        $dataFinal = get_post_meta($post_ID, 'agenda_data_fim', true);

        if($dataAtual >= $dataStart && $dataAtual <= $dataFinal){
            echo '<span style="font-size: 25px; color: green;">•</span>';
        } else if($dataAtual > $dataFinal) {
            echo '<span style="font-size: 25px; color: red;">•</span>';
        } else {
            echo '<span style="font-size: 25px; color: orange;">•</span>';
        }
    }

    if($column_name == 'data') {
        $data = get_post_meta($post_ID, 'agenda_data', true);
        echo date("d/m/Y", strtotime($data));
    }

    if($column_name == 'data_final') {
        $data = get_post_meta($post_ID, 'agenda_data_fim', true);
        echo date("d/m/Y", strtotime($data));
    }

    if($column_name == 'tipo') {
        $tipo = get_post_meta($post_ID, 'agenda_tipo', true);
        echo ($tipo == 2 ? 'Curso' : 'Evento');
    }

    if($column_name == 'curso') {
        $tipo = get_post_meta($post_ID, 'agenda_tipo', true);
        $curso = get_post_meta($post_ID, 'agenda_curso', true);
        echo ($tipo == 2 ? get_the_title($curso) : '—');
    }

    if($column_name == 'label') {
        $curso = get_post_meta($post_ID, 'agenda_curso', true);
        $cor   = get_post_meta( get_the_id(), 'opt_cor', true);
        $cor_c = get_post_meta( $curso, 'opt_cor', true);
        if($cor) : $color = $cor; else : $color = $cor_c; endif;
        echo ($color ? '<span style="background:'.$color.'; width: 20px; height: 20px; display: inline-block;"><span>' : '—');
    }
}

//POSICIONA AS COLUNAS
add_filter('manage_agenda_posts_columns', 'WPCustom_columns_order');
function WPCustom_columns_order($columns) {
    $coluna       = 'title';
    $coluna2      = 'date';
    // $order_column = array();

    foreach($columns as $key => $value) {
        if ($key==$coluna){
            //Move as colunas para antes de $coluna
            $order_column['status'] = '';
        }

        if ($key==$coluna2){
            //Move as colunas para antes de $coluna
            $order_column['tipo'] = '';
            $order_column['curso'] = '';
            $order_column['data'] = '';
            $order_column['data_final'] = '';
        }
        $order_column[$key] = $value;
    }
    return $order_column;
}

//ORDER POST ASC/DESC
add_filter( 'manage_edit-agenda_sortable_columns', 'WPCustom_columns_sortable');
function WPCustom_columns_sortable( $columns ) {
    $columns['data'] = 'agenda_data';
    $columns['data_final'] = 'agenda_data_fim';
    $columns['tipo'] = 'agenda_tipo';
    return $columns;
}

add_action( 'pre_get_posts', 'WPCustom_columns_orderby', 9 );
function WPCustom_columns_orderby( $query ) {
    global $post_type, $pagenow;
    if($pagenow == 'edit.php' && $post_type == 'agenda'){

        $orderby = $query->get('orderby');

        if('agenda_tipo' == $orderby) {
            $query->set('meta_key','agenda_tipo');
            $query->set('orderby','meta_value');
        }
    }
}

//=========================================================================================
// COLUNAS CURSOS
//=========================================================================================

//CRIA A COLUNA
add_filter('manage_cursos_posts_columns', 'WPCustom_columns_head_cursos');
function WPCustom_columns_head_cursos($defaults) {
    $defaults['label'] = 'Cor';
    return $defaults;
}

//EXIBE A COLUNA
add_action('manage_cursos_posts_custom_column', 'WPCustom_columns_content_cursos', 10, 2);
function WPCustom_columns_content_cursos($column_name, $post_ID) {

    if($column_name == 'label') {
        $cor   = get_post_meta( get_the_id(), 'opt_cor', true);
        echo ($cor ? '<span style="background:'.$cor.'; width: 20px; height: 20px; display: inline-block;"><span>' : '—');
    }
}


//=========================================================================================
// COLUNAS DESTAQUES
//=========================================================================================

//CRIA A COLUNA
add_filter('manage_news_posts_columns', 'WPCustom_columns_head_news');
function WPCustom_columns_head_news($defaults) {
    $defaults['novo']    = 'Novo';
    $defaults['label']   = 'Cor';
    return $defaults;
}

//EXIBE A COLUNA
add_action('manage_news_posts_custom_column', 'WPCustom_columns_content_news', 10, 2);
function WPCustom_columns_content_news($column_name, $post_ID) {

    if($column_name == 'novo') {
        $label = get_post_meta($post_ID, 'news_label', true);
        // if($label != 1) : update_post_meta($post_ID, 'news_label', '0'); endif;
        echo ($label == 1 ? 'Novo' : '—');
    }

    if($column_name == 'label') {
        $cor   = get_post_meta( get_the_id(), 'opt_cor', true);
        echo ($cor ? '<span style="background:'.$cor.'; width: 20px; height: 20px; display: inline-block;"><span>' : '—');
    }
}

//POSICIONA AS COLUNAS
add_filter('manage_news_posts_columns', 'WPCustom_columns_order_news');
function WPCustom_columns_order_news($columns) {
    $coluna      = 'date';
    // $order_column = array();

    foreach($columns as $key => $value) {
        if ($key==$coluna){
            //Move as colunas para antes de $coluna
            $order_column['novo'] = '';
        }
        $order_column[$key] = $value;
    }
    return $order_column;
}