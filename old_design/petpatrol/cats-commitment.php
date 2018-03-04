<?php
/*
 Template Name: Commitment Cats
 */

get_header();


echo "<h1>Commitment Of The Heart</h1>";
?>

<p>
At Pet Patrol Cat Adoption and Rescue, we treat our foster kitties like our own family pets. So when a foster cat becomes elderly, develops controllable medical concerns or is just not ready for adoption, we do not euthanize them, even when faced with high medical bills. As long as the cat is not suffering and can still enjoy life, Pet Patrol will provide ongoing medical care, a good foster home, and a lot of love.</p>

<p>
This commitment of the heart comes with a cost. While our foster caregivers are all volunteers, the medical care is financed from our nonprofit group’s limited funds, which are needed for veterinary exams, vaccinations, medications, and spay or neuter surgeries.</p>

<p>
Donations play a key role in how many cats we can rescue each year. As a result, we are seeking sponsors for some Pet Patrol cats whose time is short, or who have little chance of finding a special home. Being un-adoptable to the general public, these kitties would love to live out their days with Pet Patrol volunteers, who have opened their hearts and homes to them.</p>

<p>
The following profiles are of Pet Patrol cats who are part of our Commitment of the Heart Program. If you wish to sponsor one of them, call us at 519.669.1979 (you can provide <a href="http://www.petpatrol.ca/donate/donate/"> one payment or monthly payments</a>). A Pet Patrol volunteer will send you more information about the kitty and photos. Your commitment of the heart will help these wee ones to live a happy life, carefree and filled with love.</p>

<p>Alternatively, you can donate through Canada Helps:</p>

<p><a href="http://www.canadahelps.org/CharityProfilePage.aspx?CharityID=d50414" rel="nofollow" target="_blank"><img class="nomargin" src="http://www.canadahelps.org/image/donateNow2b1.gif" alt="Donate Now Through CanadaHelps.org!" width=152 height=67 /></a>
</p>

<?php
$loop = new WP_Query(array('post_type' => 'aw_pp_cats',
					   'meta_key' => 'aw_pp_cat_state', 'meta_value' => 'heart', 'meta_compare' => '==',
					   'posts_per_page' => -1,'orderby' => 'title', 'order' => 'ASC')); 


// The Loop
while ( $loop->have_posts() ) : $loop->the_post();
 
    get_template_part( 'content', 'cats' );


endwhile;

// Reset Post Data
wp_reset_postdata();

get_footer();

?>
