<?php
/*
* Excerpt functions
*/

//=========================================================================================
// TRATAMENTO DO EXCERPT E TITLE DO WP
//=========================================================================================

//Função que limita os caracteres visíveis

//TITLE
function ShortenTitle($text) { // Function name ShortenText
  $chars_limit = 40; // Character length
  $chars_text = strlen($text);
  $text = $text." ";
  $text = substr($text,0,$chars_limit);
  $text = substr($text,0,strrpos($text,' '));

  if ($chars_text > $chars_limit)
     { $text = $text."..."; } // Ellipsis
     return $text;
}

//EXCERPT BTN NORMAL
function get_excerpt($charlength) {

    $excerpt = get_the_excerpt();
    $charlength++;
    $link_post = get_permalink();

    if (mb_strlen($excerpt) > $charlength) {
        $subex = mb_substr($excerpt, 0, $charlength - 5);
        $exwords = explode(' ', $subex);
        $excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
        if ($excut < 0) {
            return mb_substr($subex, 0, $excut) . "</br><a class='btn' href='".$link_post."'>Leia mais<i class='icon-chevron-right'></i></a>";
        } else {
            return $subex . "</br><a class='btn' href='".$link_post."'>Leia mais<i class='icon-chevron-right'></i></a>";
        }
    } else {
        return $excerpt;
    }
}


//EXCERPT BTN PRIMARY
function get_excerpt_btn($charlength) {

    $excerpt = get_the_excerpt();
    $charlength++;
    $link_post = get_permalink();

    if (mb_strlen($excerpt) > $charlength) {
        $subex = mb_substr($excerpt, 0, $charlength - 5);
        $exwords = explode(' ', $subex);
        $excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
        if ($excut < 0) {
            return mb_substr($subex, 0, $excut) . "</br></br><a class='btn btn-primary' href='".$link_post."'>Ver Post</a>";
        } else {
            return $subex . "</br></br><a class='btn btn-primary' href='".$link_post."'>Ver Post</a>";
        }
    } else {
        return $excerpt;
    }
}


//EXCERPT SEM BOTÕES
function get_excerpt_nbtn($charlength) {

    $excerpt = get_the_excerpt();
    $charlength++;
    $link_post = get_permalink();

    if (mb_strlen($excerpt) > $charlength) {
        $subex = mb_substr($excerpt, 0, $charlength - 5);
        $exwords = explode(' ', $subex);
        $excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
        if ($excut < 0) {
            return mb_substr($subex, 0, $excut) . "...";
        } else {
            return $subex . "...";
        }
    } else {
        return $excerpt;
    }
}