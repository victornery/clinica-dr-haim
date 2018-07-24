<?php
/*
* CForms Select Functions
*/
function dynamic_select_list($tag, $unused) {

        $options = (array)$tag['options'];

        foreach ($options as $option) {
            if (preg_match('%^from_db:([-0-9a-zA-Z_]+)$%', $option, $matches)) {
                $from_db = $matches[1];
            }
        }

        if(!isset($from_db)) {
            return $tag;
        }

        // get the existing WPCF7_Pipe objects
        $befores = $tag['pipes']->collect_befores();
        $afters = $tag['pipes']->collect_afters();

        // add the existing WPCF7_Pipe objects to the new pipes array
        $pipes_new = array();
        for ($i=0; $i < count($befores); $i++) {
            $pipes_new[] = $befores[$i] . '|' . $afters[$i];
        }

        // Add users to the $tag values
        if($from_db === 'uf') {

            //Estados
            global $wpdb;
            $tabela  = $wpdb->prefix."ajaxestado";
            $estados = $wpdb->get_results( "SELECT * FROM $tabela ORDER BY sigla ASC");

            // foreach ($myrows as $row) {
            //     echo '<option value="'.$row->cod_estados.'">'.$row->sigla.'</option>';
            // }

            if (!$estados) {
                return $tag;
            }

            foreach ($estados as $uf) {
                $tag['raw_values'][] = $uf->sigla;
                $tag['values'][] = $uf->cod_estados;
                $tag['labels'][] = ucwords(strtolower($uf->sigla));
                // add the uf info for use as a new WPCF7_Pipe object
                $pipes_new[] = $uf->sigla . '|' . $uf->cod_estados;
            }

            // $blogusers = get_users(
            //     array(
            //         'blog_id' => 1,
            //         // 'exclude' => array(1,2,4,7,342),
            //         'fields' => 'all_with_meta',
            //         'orderby' => 'display_name',
            //     )
            // );
            // usort($blogusers, create_function('$a, $b', 'if($a->last_name == $b->last_name) { return 0;} return ($a->last_name > $b->last_name) ? 1 : -1;'));

            // if (!$blogusers) {
            //     return $tag;
            // }

            // foreach ($blogusers as $user) {
            //     $tag['raw_values'][] = $user->display_name;
            //     $tag['values'][] = $user->display_name;
            //     $tag['labels'][] = ucwords(strtolower($user->display_name));
            //     // add the user info for use as a new WPCF7_Pipe object
            //     $pipes_new[] = $user->display_name . '|' . $user->user_email;
            // }

        }

        // setup all the WPCF7_Pipe objects
        $tag['pipes'] = new WPCF7_Pipes($pipes_new);

        return $tag;
    }
    add_filter('wpcf7_form_tag', 'dynamic_select_list', 10, 2);