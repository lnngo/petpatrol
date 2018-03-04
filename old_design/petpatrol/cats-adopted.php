<?php
/*
 Template Name: Adopted
 */

get_header();


echo "<h1>Recently Adopted Cats</h1>";

$loop = new WP_Query(array('post_type' => 'aw_pp_cats',
					   'meta_key' => 'aw_pp_cat_state', 'meta_value' => 'adopted',
					   'posts_per_page' => 10, 'orderby' => 'modified', 'order' => 'DESC')); 


// The Loop
while ( $loop->have_posts() ) : $loop->the_post();
 
    get_template_part( 'content', 'cats' );


endwhile;

// Reset Post Data
wp_reset_postdata();

get_footer();

?>
