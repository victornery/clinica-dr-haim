<?php
/*
* INSTAGRTAM API WP PLUGIN
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
* Baseado no projeto de Vassardish and Bolandish: https://github.com/Bolandish/Instagram-Grabber
*/

class ClassInstagram {


    var $ig, $itens, $size, $caption, $data, $template, $likes;

    function __construct($ig, $itens, $size, $caption, $data, $template, $likes) {
        $this->ig       = $ig;
        $this->itens    = $itens;
        $this->size     = $size;
        $this->caption  = $caption;
        $this->data     = $data;
        $this->template = $template;
        $this->likes    = $likes;
    }

    function getInstagramUser(){

        $ig       = $this->ig;
        $itens    = $this->itens;
        $size     = $this->size;
        $caption  = $this->caption;
        $data     = $this->data;
        $template = $this->template;
        $likes    = $this->likes;

        $query = urlencode("
        ig_user($ig) {
            media.first($itens){
                count,
                nodes {
                    caption, code, date,
                    dimensions {height,width},
                    likes {count},
                    owner {id,username,full_name,profile_pic_url, biography},
                    display_src, id, is_video, thumbnail_src, video_views, video_url
                    },
                page_info
            }
        }");

        $cachetime = 3600;
        $cachefile = INSTAGRAM_DIR . '/cache/'.date('Y-m-d').'-instagram-'.$itens;

        $json_link = "https://www.instagram.com/query/?q=".$query."&ref=tags%3A%3Ashow";

        //FETCH JSON
        if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) : $json = file_get_contents($cachefile); else :
            $json   = file_get_contents($json_link);
            $fp = fopen($cachefile, 'w');
            fwrite($fp, $json);
            fclose($fp);
        endif;

        $obj       = json_decode($json, "array");
        $thumb     = "";

        require(INSTAGRAM_DIR . '/tmp/InstagramFotos.php');
    }

    function getInstagramTag(){

        //CONSTRUCT VARS
        $ig       = $this->ig;
        $itens    = $this->itens;
        $size     = $this->size;
        $caption  = $this->caption;
        $data     = $this->data;
        $template = $this->template;
        $likes    = $this->likes;

        $query  = urlencode("
            ig_hashtag($ig) {
            media.first($itens){
                count,
                nodes {
                    caption, code, date,
                    dimensions {height,width},
                    likes {count},
                    owner {id,username,full_name,profile_pic_url, biography},
                    display_src, id, is_video, thumbnail_src, video_views, video_url
                    },
                page_info
            }
        }");

        $cachetime = 3600;
        $cachefile = INSTAGRAM_DIR . '/cache/'.$ig;

        $json_link = "https://www.instagram.com/query/?q=".$query."&ref=tags%3A%3Ashow";

        //FETCH JSON
        if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) : $json = file_get_contents($cachefile); else :
            $json   = file_get_contents($json_link);
            $fp = fopen($cachefile, 'w');
            fwrite($fp, $json);
            fclose($fp);
        endif;

        $obj       = json_decode($json, "array");
        $thumb     = "";

        require (INSTAGRAM_DIR . '/tmp/InstagramFotos.php');

    }
}