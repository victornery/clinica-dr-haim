<?php
/*
* FACEBOOK API WP PLUGIN
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

class ClassFacebook {

    var $token, $fanpage, $itens, $more, $nexttoken;
    function __construct($token, $fanpage, $itens, $more, $nexttoken) {
        $this->token    = $token;
        $this->fanpage  = $fanpage;
        $this->itens    = $itens;
        $this->more     = $more;
        $this->nextpage = $nexttoken;
    }

    function getFacebook(){

        //CONSTRUCT VARS
        $token     = $this->token;
        $fanpage   = $this->fanpage;
        $more      = $this->more;
        $itens     = $this->itens;
        $nextpage  = $this->nextpage;

        $remove    = array('');

        //GRAPH API FACEBOOK
        $fields    ="id,name,description,link,created_time,likes.limit(1).summary(true),cover_photo,count";
        $fb_link   = "https://graph.facebook.com/v2.7/".$fanpage."/albums?fields=".$fields."&access_token=".$token."&limit=".$itens."&after=".$nextpage;

        //Cache Vars
        $cachetime = 10800;
        $cachefile = FACEBOOK_DIR . '/cache/albums'.$itens.''.$nextpage;

        //FETCH JSON
        if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) : $fb_json = file_get_contents($cachefile); else :
            $fb_json   = file_get_contents($fb_link);
            $fp = fopen($cachefile, 'w');
            fwrite($fp, $fb_json);
            fclose($fp);
        endif;

        $fb_obj    = json_decode($fb_json, 'array');
        // $fb_obj    = json_decode($fb_json, true, 512, JSON_BIGINT_AS_STRING);

        //CONTA QUANTIDADE
        $album_count = count($fb_obj['data']);

        //NEXT TOKEN
        $fb_next  = $fb_obj['paging']['cursors']['after'];
        $fb_more  = $fb_obj['paging']['next'];

        //TEMPLATE
        if($nextpage == "") : require(FACEBOOK_DIR . '/tmp/fb_get_albuns.php'); else : require(FACEBOOK_DIR . '/tmp/fb_more_albuns.php'); endif;
    }

    function getFacebookGallery(){

        //CONSTRUCT VARS
        $token    = $this->token;
        $album    = $this->fanpage;
        $itens    = $this->itens;
        $more     = $this->more;
        $nextpage = $this->nextpage;

        //GET ALBUM ID
        if($album) : $album_id = $album; else : $album_id = $_GET['id']; endif;
        if(!$album_id) : die('Album não existente.'); endif;

        //GERA URL TO FETCH
        $fields   ="album,source,likes.limit(1).summary(true),images,link,name";
        $fb_link  = 'https://graph.facebook.com/v2.7/'.$album_id.'/photos?fields='.$fields.'&access_token='.$token.'&limit='.$itens.'&after='.$nextpage;
        $fb_json  = file_get_contents($fb_link);
        $fb_obj   = json_decode($fb_json, 'array');
        // $fb_obj   = json_decode($fb_json, true, 512, JSON_BIGINT_AS_STRING);

        //CONTA QUANTIDADE
        $album_count = count($fb_obj['data']);

        //NEXT TOKEN
        $fb_next  = $fb_obj['paging']['cursors']['after'];
        $fb_more  = $fb_obj['paging']['next'];

        //TEMPLATE
        if($nextpage == "") : require(FACEBOOK_DIR . '/tmp/fb_get_fotos.php'); else : require(FACEBOOK_DIR . '/tmp/fb_more_fotos.php'); endif;
    }
}