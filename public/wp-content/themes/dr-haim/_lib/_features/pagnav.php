<?php
/*
* Function Pagenav
*/

function wp_pagenav($pages){
  $current_page = get_query_var('paged');
  echo '<div class="postnav">';
    echo '<div class="postnav__pag">';
      wp_pagenavi();
    echo '</div>';

    if($pages > 1) :
      echo '<div class="postnav__wp">';
          echo '<div class="postnav__item postnav__item--prev'.(!is_paged() ? ' postnav__item--disable' : '').'">';
            if(!is_paged()) : echo '<i class="fa fa-chevron-left" aria-hidden="true"></i>'; endif;
            previous_posts_link( '<i class="fa fa-chevron-left" aria-hidden="true"></i>' );
          echo '</div>';
          echo '<div class="postnav__item postnav__item--next'.($current_page == $pages ? ' postnav__item--disable' : '').'">';
            if ($current_page == $pages) : echo '<i class="fa fa-chevron-right" aria-hidden="true"></i>'; endif;
            next_posts_link( '<i class="fa fa-chevron-right" aria-hidden="true"></i>' );
          echo '</div>';
      echo '</div>';
    endif;
echo '</div>';
}