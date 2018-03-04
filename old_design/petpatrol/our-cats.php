<?php

/*
 Template Name: Our Cats
 */
get_header(); 
?>

<div id="primary">
  <div id="content" role="main">

	<h1> Our Cats that are awaiting their new forever home</h1>
	<p> Our cats are looking forward of being adopted into their forever homes! With so many cats available for adoption, you
will almost certainly find that special cat that you are looking for. We also provide you with <a href="http://www.petpatrol.ca/our-cats/nine-reasons-to-adopt-an-older-cat/">nine reasons for adopting an older cat</a>. The current page shows images of all our cats that are available for adoption. Please find for each cat more pictures, their rescue stories and their profile under 
<a href="http://www.petpatrol.ca/our-cats/cats-a-h/">Cats A - H</a>, 
<a href="http://www.petpatrol.ca/our-cats/cats-i-r/">Cats I - R</a> and 
<a href="http://www.petpatrol.ca/our-cats/cats-s-z/">Cats S - Z</a>.</p>

<div id="our-cats">
  <div class="thumbnails yoxview">
<?php 
// The Query
$the_query = new WP_Query(array('post_type' => 'aw_pp_cats',
	'meta_query' => array(
		'relation' => 'OR',
		array(
			'key' => 'aw_pp_cat_state',
			'value' => 'adoption',
			'compare' => '='
		),
		array(
			'key' => 'aw_pp_cat_state',
			'value' => 'foster',
			'compare' => '='
		),
		array(
			'key' => 'aw_pp_cat_state',
			'value' => 'heart',
			'compare' => '='
		)
	),
	'posts_per_page' => -1, 'orderby' => 'rand')); 

// The Loop

while ( $the_query->have_posts() ) : $the_query->the_post();
  echo "\n".'<div class="our-cats-blob">'."\n";
  echo '<p>';
  aw_pp_echo_imgs(get_the_ID(),1,120,120);
  echo "</p> \n";
  echo '<h2><a href="' . aw_pp_get_cat_link(get_the_ID()) .'">' . get_the_title() . '</a></h2>'."\n";
  echo '</div> <!-- Our Cats Blob -->'."\n";
endwhile;

// Reset Post Data
wp_reset_postdata();


?>
  </div> <!-- thumbnails yoxview -->
</div> <!-- our cats -->
<p style="clear: both;"> Please take the time to read our <a href="http://www.petpatrol.ca/our-cats/nine-reasons-to-adopt-an-older-cat/">nine reasons for adopting an older cat</a>. For each cat you will find more pictures, their rescue stories and their profile under 
<a href="http://www.petpatrol.ca/our-cats/cats-a-h/">Cats A - H</a>, 
<a href="http://www.petpatrol.ca/our-cats/cats-i-r/">Cats I - R</a> and 
<a href="http://www.petpatrol.ca/our-cats/cats-s-z/">Cats S - Z</a>.</p>

   </div><!-- #content -->
</div><!-- #primary -->


<?php get_footer(); ?>




