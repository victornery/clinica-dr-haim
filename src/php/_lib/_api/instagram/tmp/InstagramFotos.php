<?php

foreach ($obj['media']['nodes'] as $post) {

    //$thumb_comment_count=$post['comments']['count'];
    $thumb_text         = strip_tags(htmlentities($post['caption']));
    $thumb_link         = $post['code'];
    $thumb_like_count   = $post['likes']['count'];

    $thumb_width        = $post['dimensions']['width'];
    $thumb_height       = $post['dimensions']['height'];

    $thumb_src          = str_replace("http://", "https://", $post['thumbnail_src']);
    $thumb_created_time = date("F j, Y", $post['date']);
    $thumb_created_time = date("F j, Y", strtotime($thumb_created_time . " +1 days"));

    if($template != "likes") {
        echo '<div class="ig_item">';
            echo '<a href="https://www.instagram.com/p/'.$thumb_link.'" target="_blank">';
                // echo "<img class='ig_photo' width='{$size}' height='{$size}' src='{$thumb_src}' alt='{$thumb_text}'>";
                echo '<img class="ig_photo img-defer" src="'.get_template_directory_uri().'/assets/images/deferimg.gif" data-src="'.$thumb_src.'" width="'.$size.'" height="'.$size.'" alt="'.$thumb_text.'">';
                echo '<noscript><img src="'.$thumb_src.'" alt="'.$thumb_text.'"></noscript>';
            echo '</a>';
            if ($data == "true" || $caption == "true") {
                echo '<div class="ig_caption ig_caption--box">';
                        if($data == "true") { echo '<span>'.$thumb_created_time.'</span>';}
                        if($caption == "true") { echo '<span>'.$thumb_text.'</span>';}
                echo '</div>';
            }
        echo '</div>';
    }

    else {
        echo '<div class="ig_item">';
            echo '<a href="https://www.instagram.com/p/'.$thumb_link.'" target="_blank">';
                echo '<img class="ig_photo img-defer" src="'.get_template_directory_uri().'/assets/images/deferimg.gif" data-src="'.$thumb_src.'" width="'.$size.'" height="'.$size.'" alt="'.$thumb_text.'">';
                echo '<noscript><img src="'.$thumb_src.'" alt="'.$thumb_text.'"></noscript>';
                if ($likes == "true") {
                    echo '<div class="ig_caption ig_caption--like"><div class="ig_count"><i class="fa fa-heart"></i><span>'.$thumb_like_count.'</span></div></div>';
                }
            echo '</a>';
        echo '</div>';
    }
}
?>