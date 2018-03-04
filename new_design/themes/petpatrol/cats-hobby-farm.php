<?php
/*
 Template Name: Hobby Farm
 */

get_header();
?>



<h1 class="display-4">Hobby Farm Cats</h1>

<p class="lead"> Pet Patrol's Hobby Farm Cats are feral or semi-wild cats that are happiest living at a farm, hobby farm, horse stable or other outdoor location that provides food, clean water, proper shelter, and love on a daily basis.</p>

<p>Hobby Farm Cats make wonderful helpers because they safely rid farms of rodents that can harbor parasites that infect other animals. Hantavirus, for example, can be present in deer mice droppings and is life-threatening to humans. Rodents also cause damage to grain storage and feed.</p>

<p>Feral cats often lead tragic lives, starving or becoming the victims of hungry predators. Because they are wild, they usually cannot become house cats; however with a nice safe barn, a kind human partner, and tasty cat food, they can thrive.</>

<p><b>All of Pet Patrol's Hobby Farm Cats are spayed or neutered, have their full vaccinations, and are cleared of any parasites.</b> They are healthy and well cared for here, but need the outdoors and a job to do in order to make their lives complete. They have never had the opportunity to be handled by people and would prefer that we humans keep at arms length, but they trust us for food and shelter, safety, and a kind word.</p>

<p>By giving a home to some hard working hobby farm cats, you can solve your rodent problem and your whole family can enjoy these fun-loving cats.  If you can provide a safe and healthy rural property for one of Pet Patrol's hobby farm cats, please email jan@petpatrol.ca or call 519-669-1979. <b>No adoption fee applies.</b></p>

<p>Below are some of our Hobby Farm Cats that are in need of a safe environment with access to the outdoors:</p>


<?php
$loop = new WP_Query(array('post_type' => 'aw_pp_cats',
					   'meta_key' => 'aw_pp_cat_state', 'meta_value' => 'adopted', 'meta_compare' => '!=',
					   'posts_per_page' => -1,'orderby' => 'title', 'order' => 'ASC')); 


// The Loop
while ( $loop->have_posts() ) : $loop->the_post();
  $cat_attributes = get_post_meta($post->ID,'aw_pp_cat_attributes',true);

  if ($cat_attributes['hobbyfarm'] != 'no'): 
     get_template_part( 'content', 'cats' );
  endif;

endwhile;

// Reset Post Data
wp_reset_postdata();

get_footer();

?>
