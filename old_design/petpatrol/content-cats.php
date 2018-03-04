<a name="<?php echo str_replace(" ","_",get_the_title()); ?>"></a> 
<div class="cat-profile">
   <div class="cat-profile-addthis">

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style "
     addthis:url="<?php echo get_permalink($post->ID);?>"
     addthis:title="<?php echo 'Yet another great Pet Patrol cat: ' . get_the_title($post->ID);?>"
     addthis:description="Pet Patrol Cat">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<!--<a class="addthis_counter addthis_bubble_style"></a>-->
</div>

<!-- AddThis Button END -->

   </div> <!-- addThis-->


   <?php $custom = get_post_custom($post->ID); ?>
   <?php $cat_attributes = get_post_meta($post->ID,'aw_pp_cat_attributes',true); ?>
    <h2>
     <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>', $post->ID); ?>
     <a href="<?php the_permalink();?>"><?php the_title(); 
      if($cat_attributes['kitten'] == 'yes') {
	  echo ' <span class="isKitten">';
	  echo " (Kitten)";
	  echo '</span>';
      } ?>
      <?php $cat_state = get_post_meta($post->ID,'aw_pp_cat_state',true);
	if($cat_state == 'adopted') {
	  echo '<span class="isAdopted">';
	  echo " has been Adopted";
	  echo '</span>';
	}
      ?>
      <?php
	if($cat_state == 'foster') {
	  echo '<span class="needsFoster">';
	  echo " needs a Foster Home";
	  echo '</span>';
	}
      ?>
    </a>
    </h2>
  <div class="cat-profile-images">
  <div class="thumbnails yoxview">
      <?php aw_pp_echo_imgs($post->ID, 0, 250, 250, $space='<br />'); ?>
  </div>
  </div> <!-- cat-profile-images -->
  <div class="cat-profiles-data">
    <p>
	<?php 
	if($custom['aw_pp_cat_sex'][0] == 'female') {
		echo "FEMALE";
	} else {
		echo "MALE";
	}
	echo "<br />";

	echo "Born: " . $custom['aw_pp_cat_born'][0] . "<br />";

	echo "Colour: " . $custom['aw_pp_cat_colour'][0] . "<br />";

	echo "Eyes: " . $custom['aw_pp_cat_eyes'][0] . "<br />";

	if($custom['aw_pp_cat_sex'][0] == 'female') {
		echo "Spayed & Vaccinated";
	} else {
		echo "Neutered & Vaccinated";
	}
	echo "<br />";

	if(!empty($custom['aw_pp_cat_special_characteristics'][0])) {
			echo '<br /><span class="is_declawed">';
			echo str_replace(array("\r\n","\r","\n"),'<br />', $custom['aw_pp_cat_special_characteristics'][0]);
			echo '</span><br />';
	}
	?>
    </p>
    <p>
	<?php
	$attribute_names = array("Quiet home", "Active home", "Adult home", "Children under 12",
						 "Children over 12", "Other cats", "Dogs (passive)");

	$attribute_keys = array("quiet", "active", "adult", "kids", "teens", "othercats", "dogs");

	if(!empty($cat_attributes)) {
		for ( $i = 0; $i < 7; $i = $i+1) {
			if($cat_attributes[$attribute_keys[$i]] == 'yes') {
				echo '<span class="profile-attr-yes">&#10004;&nbsp;</span>';
			} else if($cat_attributes[$attribute_keys[$i]] == 'no') {
				echo '<span class="profile-attr-no">&#10008;&nbsp;</span>';
			} else {
				echo '<span class="profile-attr-maybe"><b>?</b>&nbsp;&nbsp;</span>';
			}
			echo $attribute_names[$i];
			echo "<br />";
		}
	}
	
	// indoor or hobby farm
	if($cat_attributes['hobbyfarm'] == 'yes') {
		echo '<span class="profile-attr-yes">&#10004;&nbsp;</span>';
		echo 'Hobby Farm';
	} else if($cat_attributes['hobbyfarm'] == 'maybe') {
		echo '<span class="profile-attr-maybe"><b>?</b>&nbsp;&nbsp;</span>';
		echo 'Hobby Farm';
	} else {
		echo '<span class="profile-attr-yes">&#10004;&nbsp;</span>';
		echo 'Indoors only';
	}
	?>
    </p>
  </div> <!-- cat-profiles-data -->
  <div class="cat-profile-story">
  <?php the_content();?>
  </div> <!-- cat-profile-story -->
  <div class="emptydiv"></div>
</div> <!-- cat-profile -->


