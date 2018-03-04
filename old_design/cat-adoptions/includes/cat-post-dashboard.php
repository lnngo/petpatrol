<?php

add_action('admin_menu', 'aw_pp_cat_post_options');


function aw_pp_cat_post_options() {
	//add_meta_box( $id, $title, $callback, $page, $context, $priority, $callback_args )
	add_meta_box('cat_state', 'Cat State', 'aw_pp_cat_state', 'aw_pp_cats', 'side', 'default');
	add_meta_box('cat_info', 'Cat Information', 'aw_pp_cat_info', 'aw_pp_cats', 'side', 'default');
	add_meta_box('cat_images', 'Cat Image Thumbnails', 'aw_pp_cat_images', 'aw_pp_cats', 'normal', 'core');
	add_meta_box('cat_profile', 'Create Cat Profile', 'aw_pp_cat_profile', 'aw_pp_cats', 'side', 'default');
}
 

// Cat State
function aw_pp_cat_state() {
	global $post;
	$custom = get_post_custom($post->ID);
	$cat_state = $custom["aw_pp_cat_state"][0];
	
	if(empty($cat_state)) {
		$cat_state = 'adoption';
	}
	

	?>
	<form>
	<input type="radio" name="cat_state" value="adoption"
		 <?php if($cat_state == 'adoption') echo ' checked';?>/> Available for Adoption<br />
	<input type="radio" name="cat_state" value="adopted" 
		<?php if($cat_state == 'adopted') echo ' checked';?> /> Adopted<br />
<input type="radio" name="cat_state" value="heart"
		 <?php if($cat_state == 'heart') echo ' checked';?>/> Commitment of the Heart<br>
<input type="radio" name="cat_state" value="foster"
		 <?php if($cat_state == 'foster') echo ' checked';?>/> Needs a Foster Home<br>
<input type="radio" name="cat_state" value="onhold"
		 <?php if($cat_state == 'onhold') echo ' checked';?>/> On Hold<br>
<input type="radio" name="cat_state" value="deceased"
		 <?php if($cat_state == 'deceased') echo ' checked';?>/> Deceased<br>
<br />
	<label for="cat_status">Cat Displayed at Pet Value Store:</label><br>
	<input type="radio" name="cat_state" value="northfield" 
		<?php if($cat_state == 'northfield') echo ' checked';?>/> Northfield<br />
    <input type="radio" name="cat_state" value="elmiraarthur" 
		<?php if($cat_state == 'elmiraarthur') echo ' checked';?>/> Elmira<br />
	<input type="radio" name="cat_state" value="erb" 
		<?php if($cat_state == 'erb') echo ' checked';?>/> Erb<br />
	</form>
	<?php
}


add_action('save_post', 'aw_pp_update_cat_state');
function aw_pp_update_cat_state($post_id) {
	global $post;
	// http://wordpress.stackexchange.com/questions/11724/post-meta-data-clearing-on-autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return $post_id;
    }

	if (get_post_type( $post->ID ) == 'aw_pp_cats') {
		update_post_meta($post->ID, "aw_pp_cat_state", $_POST["cat_state"]);
	}

}


//	Cat Information

function aw_pp_cat_info() {
	global $post;
	$custom = get_post_custom($post->ID);
	$cat_sex = $custom["aw_pp_cat_sex"][0];
	$born_month = $custom["aw_pp_cat_born_month"][0];
	$born_day = $custom["aw_pp_cat_born_day"][0];
	$born_year = $custom["aw_pp_cat_born_year"][0];
	if(empty($born_year)) {
		$born_year = date('Y');	
	}
	$special_characteristics = $custom["aw_pp_cat_special_characteristics"][0];
	
	
	$cat_attributes = get_post_meta($post->ID,'aw_pp_cat_attributes',true);
	if(empty($cat_attributes)) {
	#	echo 'Unset Array!';
		unset($cat_attributes);
		$cat_attributes = array();
	}
	#print_r($cat_attributes);
	
	?>
	<fieldset id="catinfos-div">
	<div>
	<p>
	<?php
	if(($cat_sex != 'male') && ($cat_sex != 'female') ) {
	  echo '<div style="background:red; padding: 20px; color: white; font-weight: bold; border: solid 2px black;">';
        }	
	?>
	<input type="radio" name="cat_sex" value="male" <?php if($cat_sex == 'male' ) echo ' checked';?> > male
	<input type="radio" name="cat_sex" value="female" <?php if($cat_sex == 'female') echo ' checked';?> > female<br> 
	<?php
	if(($cat_sex != 'male') && ($cat_sex != 'female') ) {
	  echo '</div>';
        }	
	?>

	<br />
	

	<label>Born:</label><br />
	<input type="text" name="cat_born" id="cat_born" size="30" value="<?php echo get_post_meta($post->ID, 'aw_pp_cat_born', true); ?>">
	<br />
	<label for="cat_colour">Fur Colour:</label><br />
	<input type="text" name="cat_colour" id="cat_colour" size="30" value="<?php echo get_post_meta($post->ID, 'aw_pp_cat_colour', true); ?>">
	<br />
	<label for="cat_eyes">Eye Colour:</label><br />
	<input type="text" name="cat_eyes" id="cat_eyes" size="30" value="<?php echo get_post_meta($post->ID, 'aw_pp_cat_eyes', true); ?>">
	<br />
	<br />
	y / n / ?<br>
<input type='radio' name="is_kitten" value="yes" 
			<?php if($cat_attributes["kitten"] == 'yes') echo 'Checked';?>>
<input type='radio' name="is_kitten" value="no" 
			<?php if($cat_attributes["kitten"] == 'no' || empty($cat_attributes["kitten"])) echo 'Checked';?>>
 kitten <br>

	<?php
	$attribute_keys = array("quiet", "active", "adult", "kids", "teens", "othercats", "dogs", "indoor", "hobbyfarm");
	for ( $i = 0; $i < 9; $i = $i+1) {
		?>
		<input type='radio' name=<?php echo '"is_'.$attribute_keys[$i].'"';?> value="yes" 
			<?php if($cat_attributes[$attribute_keys[$i]] == 'yes' || empty($cat_attributes[$attribute_keys[$i]]) ) echo 'Checked';?>>
		<input type='radio' name=<?php echo '"is_'.$attribute_keys[$i].'"';?>  value="no"
		<?php if($cat_attributes[$attribute_keys[$i]] == 'no' || (empty($cat_attributes[$attribute_keys[$i]]) && $attribute_keys[$i] == 'hobbyfarm')) echo 'Checked';?>>
		<input type='radio' name=<?php echo '"is_'.$attribute_keys[$i].'"';?> value="maybe"
		<?php if($cat_attributes[$attribute_keys[$i]] == 'maybe') echo 'Checked';?>>
	 	<?php 
		echo $attribute_keys[$i];
		echo "<br>";
	
	}
	?>	
	<br />
    <?php if($cat_attributes["declawed"] == 'yes') echo "<b>declawed</b> <br />";?>
	<label>Special Characteristics:</label><br />
	<textarea name="cat_special" rows="3" cols="30" id="cat_special"><?php echo get_post_meta($post->ID, 'aw_pp_cat_special_characteristics', true); ?></textarea>
    </p>
	</div>
	</fieldset>
	<?php
}


add_action('save_post', 'aw_pp_update_cat_information');
function aw_pp_update_cat_information($post_id) {
	global $post;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
	        return $post_id;
	}

	if (get_post_type( $post->ID ) == 'aw_pp_cats') {
		update_post_meta($post->ID, "aw_pp_cat_sex", $_POST["cat_sex"]);
		update_post_meta($post->ID, "aw_pp_cat_born", $_POST["cat_born"]);
		update_post_meta($post->ID, "aw_pp_cat_colour", $_POST["cat_colour"]);
		update_post_meta($post->ID, "aw_pp_cat_eyes", $_POST["cat_eyes"]);
		update_post_meta($post->ID, "aw_pp_cat_special_characteristics", $_POST["cat_special"]);
		
				
		$cat_new_attributes = array(
			'kitten' => $_POST["is_kitten"],			
			'quiet' => $_POST["is_quiet"],
			'active' => $_POST["is_active"], 
			"adult" => $_POST["is_adult"],
			"kids" => $_POST["is_kids"],
			"teens" => $_POST["is_teens"],
			"othercats" => $_POST["is_othercats"],
			"dogs" => $_POST["is_dogs"],
			"indoor" => $_POST["is_indoor"],
			"hobbyfarm" => $_POST["is_hobbyfarm"]
			);
		update_post_meta($post->ID, "aw_pp_cat_attributes", $cat_new_attributes);
	}

}




// Image Thumbnails


function aw_pp_cat_images() {
	global $post;
	
	$images = get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );

	foreach( $images as $imageID => $imagePost ) {

		echo wp_get_attachment_image($imageID, 'thumbnail', false);
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
	}
	
}

function aw_pp_cat_profile() {
	global $post;
	echo "<p>Select Image for Profile PDF:</p>";
	$images = get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );

	foreach( $images as $imageID => $imagePost ) {
		echo '<a href="'. site_url('/').'wp-content/plugins/cat-adoptions/catprofile/create.php?postid='.$post->ID . '&imageid=' . $imageID . '" target="_blank">' . wp_get_attachment_image($imageID, array(200,200), false) . "</a> <br />\n";
	}
}


// Overview

/*add_filter("manage_edit-cats_columns", "cats_edit_columns");
add_action("manage_posts_cats_column",  "cats_columns_display");
 
function cats_edit_columns($portfolio_columns){
	$portfolio_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Cat Name",
		"description" => "Description",
	);
	return $portfolio_columns;
}
 
function cats_columns_display($portfolio_columns){
	switch ($portfolio_columns)
	{
		case "description":
			the_content();
			break;				
	}
}
*/

?>
