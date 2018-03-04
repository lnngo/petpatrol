<?php
/*
 Template Name: Cats S-Z
 */

get_header();


echo "<h1>Cats S - Z</h1>";
?>
<p>Please read our <a href="http://www.petpatrol.ca/our-cats/nine-reasons-to-adopt-an-older-cat/">Nine
Reasons to Adopt an Older Cat</a> and see the other cats that are
available under <a href="http://www.petpatrol.ca/our-cats/cats-a-h/">Cats A -
H</a> and <a href="http://www.petpatrol.ca/our-cats/cats-i-r/">Cats I -
R</a>. You might also like to view just the <a href="http://www.petpatrol.ca/our-cats/">images of all our adoptable
cats</a>.
</p>
<?php
 
$alpha = range('s','z');
$loop = new WP_Query(array('post_type' => 'aw_pp_cats',
	'meta_query' => array(
		array(
			'key' => 'aw_pp_cat_state',
			'value' => array('adoption','foster','heart','bridgeport','erb','iraneedles','elmiraarthur','northfield'),
			'compare' => 'IN'
		)
	),
	'posts_per_page' => -1,'orderby' => 'title', 'order' => 'ASC')); 


// Post Catnip Carneval Poster
// at the beginning (first five or so)
// $hasPosted = 0;

// The Loop
while ( $loop->have_posts() ) : $loop->the_post();

   
   if (in_array(strtolower(substr($post->post_title, 0,1)),$alpha)): 
//       if ($hasPosted == 0 && rand(1,5)==1):
//      echo "\r\n", '<div class="urgentNews"> <p> <img src="' , bloginfo('stylesheet_directory') , '/images/2015_catnip_carnival.jpg" alt="Pet Valu Catnip Carnival 2015"/></p></div>', "\r\n";
//      $hasPosted=1;
//       endif;

	
	get_template_part( 'content', 'cats' );
    endif;

endwhile;


//if ($hasPosted == 0): 
//      echo "\r\n", '<div class="urgentNews"> <p> <img src="' , bloginfo('stylesheet_directory') , '/images/2015_catnip_carnival.jpg" alt="Pet Valu Catnip Carnival 2015"/></p></div>', "\r\n";
//endif;


// Reset Post Data
wp_reset_postdata();
?>
<p>Please read our <a href="http://www.petpatrol.ca/our-cats/nine-reasons-to-adopt-an-older-cat/">Nine
Reasons to Adopt an Older Cat</a> and see the other cats that are
available under <a href="http://www.petpatrol.ca/our-cats/cats-a-h/">Cats A -
H</a> and <a href="http://www.petpatrol.ca/our-cats/cats-i-r/">Cats I -
R</a>. You might also like to view just the <a href="http://www.petpatrol.ca/our-cats/">images of all our adoptable
cats</a>.
</p>
<?php

get_footer();

?>
