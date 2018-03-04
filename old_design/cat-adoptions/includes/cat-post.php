<?php



add_filter( 'enter_title_here', 'aw_pp_change_default_title_cat_post' );

// replace title string
function aw_pp_change_default_title_cat_post( $title ){
     $screen = get_current_screen();
 
     if  ( 'aw_pp_cats' == $screen->post_type ) {
          $title = 'Enter Cat Name Here';
     }
 
     return $title;
}







?>
