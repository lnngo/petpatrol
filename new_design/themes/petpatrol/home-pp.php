<?php

/*
 Template Name: Home Page
 */
get_header(); 
?>

<div id="primary">
  <div id="content" role="main">

<div class="novisible">
  <h1 class="nomargin">About Pet Patrol</h1>
  <p>Pet Patrol is a Kitchener and Waterloo Ontario Canada based Cat Rescue Organisation. Adopt a kitten or cat from us. You can buy the Kittens or cats from us in Waterloo and Kitchener.</p>
</div> <!-- no visible -->

<div class="urgentNews clearBoth" style="padding-top: 40px;">

<!--
<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/kitty_matchmaker_ad_v<?php echo rand(1,3); ?>.jpg" class="floatLeft" title="Kitty Matchmaker Campaign 2014" alt="Get A Second Cat for $10."/> 
-->
<!--
  <a target="_blank" href="https://www.gofundme.com/petpatroladdition"> <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/2015_gofundme.png" class="floatLeft" title="Gofundme Cat Sanctuary Addition" alt="2015 Gofundme Campain"/></a>
-->

<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/2016_Sashababies.jpg" class="floatLeft" title="Gofundme Cat Sanctuary Addition" alt="2015 Gofundme Campain"/></a>

<div class="floatLeft" style="width: 380px; padding-left: 40px">
<h2 style="font-size:200%">Pet Patrol Cat Sanctuary Addition</h2>
<p>
We are hoping to raise $10,000 to support this project and create a one of a kind cat sanctuary. <br/>
<a href = "https://www.gofundme.com/petpatroladdition">click here to read more</a>
</p>
</div>
<div class="clearBoth"></div>
</div>

<!-- Auditioning -->
<?php
				

$queryNorthfield = new WP_Query( array(  'relation' => 'AND',
				'post_type' => 'aw_pp_cats' ,
				'meta_key' => 'aw_pp_cat_state', 'meta_value' => 'northfield'  ) );
								

$queryElmiraArthur = new WP_Query( array(  'relation' => 'AND',
        'post_type' => 'aw_pp_cats' ,
        'meta_key' => 'aw_pp_cat_state', 'meta_value' => 'elmiraarthur'  ) );

$numCatsForAudition = $queryNorthfield->have_posts()+$queryElmiraArthur->have_posts();

if($numCatsForAudition > 0) {
?>



<div id="audition">
  <h1>Auditioning For Adoption</h1>
  <p>Pet Patrol is sponsored by two <a href="http://www.petvalu.com/">Pet Valu</a> stores, one located in Waterloo and one in Elmira. These cats are presently keeping the staff company.</p>
  
<div id="audition-profiles">

<?php aw_pp_audition_profile($queryNorthfield,"Northfield"); ?>
<?php aw_pp_audition_profile($queryElmiraArthur,"ElmiraArthur"); ?>

</div> <!-- audition-profiles" -->

<div class="emptydiv"></div>
</div> <!-- audition -->
<?php } /* end if has cats for audition*/ ?>    


<!--
<div class="urgentNews">
<h1>We are in need of Foster Homes</h1>
<p style="margin-bottom:10px">
Have you ever been rewarded for something that came from your heart?  It is such a warm and personal feeling to care for a cat that has come from a harsh reality, until they find their forever home.  You provide the 'food, water, litter and love' and Pet Patrol takes care of the rest.</p>
        <p class="read-more-blob"><a href="http://www.petpatrol.ca/get-involved/foster/">Click here for more pawsitive information!</a></p>
</div>
-->


<div id="articles-home">
  
  <div id="column1">
    <div class="blobs">
      <h1>Who We Are</h1>
      <p>Pet Patrol is an entirely volunteer-run, non-profit cat rescue organization in the Kitchener-Waterloo area.<br />
	Established in 1986 Pet Patrol has found homes for about 3000 cats in that time.  Our cats come from all different situations; abandoned in the country, owner reliquished, born in a shed and shelters with a high euthanization rate.  They are kept in foster homes and not kennels therefore we are able to learn about their personalities and can find them an appropriate home.  All our cats are spayed or neutered, vaccinated and any health concerns are addressed before they are available for adoption.  Pet Patrol asks for an adoption donation of $175 to help offset the inital Vet costs.  Have a look at the cats we have available and either call (519) 669-1979 or email jan@petpatrol.ca to set up a time for a visit.
  </p>
    <?php echo aw_pp_read_more_link('http://www.petpatrol.ca/about-us/who-we-are/' , '<p class="read-more-blob">','</p>' ); ?>

    </div> <!-- blobs -->
    
    <div class="blobs">
      <h2>Foster</h2>
      <p>
	This could be one of the most rewarding things you have ever done.  To help save the life of a little one, to see is become healthy and happy, and to allow it be adopted into it's forever home.  What could be more purrfect than that  Pet Patrol would not be able to rescue as many cats and especially kittens, if we did not have foster homes to help us.  They are vital to the life and well being of the kitten, and to our success as a well know cat rescue organization.  As a foster home you are responsible for the food, water, litter and love for the cat or kitten in your care.  Pet Patrol takes care of any medical needs, advertising and finding the cat a home, and we will be there for you to answer any questions or concerns. Give us a call and find out more.</p>
    <?php echo aw_pp_read_more_link(get_permalink('261') , '<p class="read-more-blob">','</p>' ); ?>
    </div> <!-- blobs -->
    
    
  </div> <!-- col1 -->
  
  <div id="column3">
    

    <div class="blobs">
      <h2>Share This Page</h2>
      <p>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style "
     addthis:url="http://www.petpatrol.ca"
     addthis:title="Pet Patrol: Kitchener-Waterloo Cat Rescue"
     addthis:description="Pet Patrol webpage">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
</div>
<!-- AddThis Button END -->
      </p>
      <p>Please tell your friends about us.<br/><br/></p>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div style="margin:-10px;padding:0px;">
<div class="fb-like-box" data-href="http://www.facebook.com/pages/Pet-Patrol/164832526864255" data-width="250" data-show-faces="false" data-stream="false" data-header="false"></div>
</div>

    </div> <!-- blobs -->
    

  
    
    <div class="blobs">
      <h2>Donate</h2>
      <p>Pet Patrol is a registered charity and we rely solely on donations.  You can support the kitties in our care by donating towards Veterinary care; a spay surgery, a specialized surgery or for medications.</p>
      <?php echo aw_pp_read_more_link(get_permalink('151') , '<p class="read-more-blob">','</p>' ); ?>
    </div> <!-- blobs -->
    
    <div class="blobs">
      <h2>Volunteer</h2>
      <p>There are many ways you can help Pet Patrol carry on it's good work with homeless cats.  Fundraising; Events planner needed.  We have the ideas, we just need someone to coordinate them.  Kitty Klean Up at the main foster home: cleaning, scooping poop and petting cats.  Transportation:  To and from the Vet, foster homes or from rescue sites.  Fostering:  Taking care of a cat or kittens in your home.  Pet Stores:  Checking in on the cats that are 'Auditioning for Adoption", cleaning the cage and updating the profile book.  Annual Calendar:  We need an experienced person to design and make it ready for the printers, with the photos and information supplied.</p>
<?php echo aw_pp_read_more_link(get_permalink('263') , '<p class="read-more-blob">','</p>' ); ?>
    </div> <!-- blobs -->    


  </div> <!-- col3 -->

  <div id="column2">
    <div class="blobs">
      <h2>Have you met</h2>
      <p>Here is a preview of some of the cats that currently are looking for their forever home. Click on their pictures, read their stories and learn about their personalities. We have many more cats like them.</p>
<?php 
// The Query
$the_query = new WP_Query(array('post_type' => 'aw_pp_cats',
					   'meta_key' => 'aw_pp_cat_state', 'meta_value' => 'adopted', 'meta_compare' => '!=',
					   'posts_per_page' => 4, 'orderby' => 'rand')); 

// The Loop
echo '<p>';
while ( $the_query->have_posts() ) : $the_query->the_post();
   echo '<a href="'.aw_pp_get_cat_link($post_id).'">';
   echo '<img src="'. aw_pp_get_first_image(get_the_ID()).'" class="did-you-meet" width=75 height=75 alt="Random Cat for Adoption"/>';         
   echo "</a>";
endwhile;
echo '</p>';


// Reset Post Data
wp_reset_postdata();


?>
    <?php echo aw_pp_read_more_link(get_permalink('10') , '<p class="read-more-blob">','</p>', 'See more...' ); ?>
    </div> <!-- blobs -->


<!--    <div id="news-title">
      <h2>News</h2>
      
      <div id="news">
	<ul>

<?php

// The Query
$the_query = new WP_Query( array(  'relation' => 'AND',
				'post_type' => 'post' ,'orderby' => 'date', 'order' => 'DESC', 'posts_per_page'=>2));

// The Loop
while ( $the_query->have_posts() ) : $the_query->the_post();
	echo '<li>';
	echo '<b>'.get_the_title().'</b>: '.get_the_excerpt();
	echo '</li>';
endwhile;

// Reset Post Data
wp_reset_postdata();

?>
	</ul>
      <?php echo aw_pp_read_more_link(get_permalink('7') , '<p class="read-more-blob">','</p>', 'Read older news...' ); ?>
      </div> <!-- news -->

<!--    </div> <!-- news title -->

    
    <div class="blobs">
      <h2>Lost and Found</h2>
      <p>If you have found a cat or lost your cat, please review the <a href="http://www.petpatrol.ca/lost-and-found/">posters attached</a>.</p>
    </div> <!-- blobs -->
    
  </div> <!-- col2 -->
  
</div> <!-- articles home -->

   </div><!-- #content -->
</div><!-- #primary -->
<div class="emptydiv"></div>
<?php get_footer(); ?>




