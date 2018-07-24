<?php
/*
* Blog Functins
*/

//=========================================================================================
// ARTIGOS MAIS VISTOS
//=========================================================================================

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//=========================================================================================
// IS_BLOG
//=========================================================================================

function is_blog () {
    global $post;
    $posttype = get_post_type($post );
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post') ) ? true : false ;
}

//=========================================================================================
// IFRAMES
//=========================================================================================

function div_wrapper($content) {
    // match any iframes
    $pattern = '~<iframe.*</iframe>~';
    preg_match_all($pattern, $content, $matches);

    foreach ($matches[0] as $match) {
        // wrap matched iframe with div
        $wrappedframe = '<div class="frame-video"><div class="youtube__iframe load">' . $match . '</div></div>';
        //replace original iframe with new in content
        $content = str_replace($match, $wrappedframe, $content);
    }

    return $content;
}
add_filter('the_content', 'div_wrapper');

//=========================================================================================
// BUSCA
//=========================================================================================

if (!is_admin()):
    //reescrita da url de busca
    function search_url_rewrite_rule() {
        if ( is_search() && !empty($_GET['s'])) {
            wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
        }
    }
    add_action('template_redirect', 'search_url_rewrite_rule');

    function SearchFilter($query) {
        if ($query->is_search) {
            $query->set('post_type', array('post'));
        }
        return $query;
    }
    add_filter('pre_get_posts','SearchFilter');

    //redirect blog posts
    // function redirect_single_post() {
    //     if (is_search()) {
    //         global $wp_query;
    //         if ($wp_query->post_count == 1) {
    //             wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
    //         }
    //     }
    // }
    // add_action('template_redirect', 'redirect_single_post');
endif;

//=========================================================================================
// ADMIN COLUMNS
//=========================================================================================

//Remover Colunas Admin
function my_manage_columns( $columns ) {
    unset($columns['author'], $columns['comments'], $columns['tags']);
    return $columns;
}

function my_column_init() {
    add_filter( 'manage_posts_columns' , 'my_manage_columns' );
}

add_action( 'admin_init' , 'my_column_init' );

// ADD NEW COLUMN
function count_posts_head($defaults) {
        
    $new = array();    
    $tags = $defaults['count'];  // save the tags column
    $defaults['count'] = '<span style="text-align: center;display: block;">Qtd de Viualizações</span>';

    foreach($defaults as $key=>$value) {
        if($key=='date') {  // when we find the date column
           $new['count'] = $tags;  // put the tags column before it
        }    
        $new[$key]=$value;
    }  

    return $new;
}

function count_posts_content($column_name, $post_ID) {
    if ($column_name == 'count') {
        $count_key = 'post_views_count';
        $count = get_post_meta($post_ID, $count_key, true);        
        echo '<span style="text-align: center;display: block;">Visualizações: '.($count ? $count : '0').'</span>';
    }
}

add_filter('manage_post_posts_columns', 'count_posts_head');
add_action('manage_post_posts_custom_column', 'count_posts_content', 10, 2);