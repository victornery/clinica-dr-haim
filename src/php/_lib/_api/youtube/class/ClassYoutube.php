<?php
/*
* YOUTUBE API WP PLUGIN: CLASS SEARCH
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

class ClassYoutube {

    // $yt_link = 'https://www.googleapis.com/youtube/v3/channels?part=snippet&forUsername=bandagarotasafada&key=AIzaSyCjANNbWlD1o8jP4q1i7Q08obpxR7bPiPI';
    var $api_key, $channel_id, $itens, $template, $title, $likes, $caption, $more, $pagetoken;

    function __construct($api_key, $channel_id, $itens, $template, $title, $likes, $caption, $more, $pagetoken) {
        $this->apikey   = $api_key;
        $this->channel  = $channel_id;
        $this->itens    = $itens;
        $this->template = $template;
        $this->title    = $title;
        $this->likes    = $likes;
        $this->caption  = $caption;
        $this->pages    = $more;
        $this->nextpage = $pagetoken;
    }

    function getYoutube(){

        $api_key   = $this->apikey;
        $channel   = $this->channel;
        $nextpage  = $this->nextpage;
        $itens     = $this->itens;
        $template  = $this->template;
        $title     = $this->title;
        $likes     = $this->likes;
        $caption   = $this->caption;
        $pages     = $this->pages;

        if($template == 1) {$template_file = 'yt_frame_videos.php';}
        if($template == 2) {$template_file = 'yt_get_videos.php';}

        $yt_link   = "https://www.googleapis.com/youtube/v3/search?part=snippet&";
        $yt_link   .= "channelId=$channel&";
        $yt_link   .= "maxResults=$itens&";
        $yt_link   .= "order=date&pageToken=$nextpage&";
        $yt_link   .= "fields=items(id%2FvideoId%2Csnippet)%2CnextPageToken&";
        $yt_link   .= "key=$api_key";

        //Cache Vars
        $cachetime = 10800;
        $cachefile = YOUTUBE_DIR . '/cache/videos_'.$itens.''.$nextpage;

        //FETCH JSON
        if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) :
            $yt_json = file_get_contents($cachefile);
        else :
            $yt_json   = file_get_contents($yt_link);
            $fp = fopen($cachefile, 'w');
            fwrite($fp, $yt_json);
            fclose($fp);
        endif;

        // $yt_json   = file_get_contents($yt_link);
        $yt_obj    = json_decode($yt_json, 'array');
        // echo '<pre>';
        // print_r($yt_obj);
        // exit;

        $yt_next  = $yt_obj['nextPageToken'];
        if($nextpage == "") : require(YOUTUBE_DIR . '/tmp/'. $template_file); else : require(YOUTUBE_DIR . '/tmp/yt_more_videos.php'); endif;
    }
}