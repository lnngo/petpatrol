<?php

add_action('admin_menu', 'aw_pp_lost_post_options');


function aw_pp_lost_post_options() {
	//add_meta_box( $id, $title, $callback, $page, $context, $priority, $callback_args )
	add_meta_box('cat_lost_options', 'Cat Info', 'aw_pp_lost_cat_state', 'aw_pp_lost', 'side', 'default');

}


function aw_pp_lost_cat_state() {
	global $post;	
	$custom = get_post_custom($post->ID);
	$cat_state_old = $custom["aw_pp_lost_or_found"][0];
	
	if(empty($cat_state_old)) {
		$cat_state_old = 'Lost:';
	}
	?>	
	<form>
	<input type="radio" name="cat_state" value="Lost:"
		 <?php if($cat_state_old == 'Lost:') echo ' checked';?>/> Lost Cat<br />
	<input type="radio" name="cat_state" value="Found:" 
		<?php if($cat_state_old == 'Found:') echo ' checked';?> /> Found a Cat<br /><br />

	<br />
	<label for="cat_address">Address:</label><br />
	<input type="text" name="cat_address" id="cat_address" style="width: 250px" value="<?php echo get_post_meta($post->ID, 'aw_pp_lost_address',true); ?>">
	<br />
	<label for="cat_city">City:</label><br />
	<input type="text" name="cat_city" id="cat_city" style="width: 250px" value="<?php echo get_post_meta($post->ID, 'aw_pp_lost_city',true); ?>">
	<br />
	<label for="cat_date">Missing since:</label><br />
	<input type="text" name="cat_date" id="cat_date" style="width: 250px" value="<?php echo get_post_meta($post->ID, 'aw_pp_lost_since', true); ?>">
	<label for="cat_lost_contact">Contact:</label><br />
	<input type="text" name="cat_lost_contact" id="cat_lost_contact" style="width: 250px" value="<?php echo get_post_meta($post->ID, 'aw_pp_lost_contact', true); ?>">
	</form>
	<?php
} 

add_action('save_post', 'aw_pp_update_lost_state');
function aw_pp_update_lost_state($post_id) {
	global $post;

	// http://wordpress.stackexchange.com/questions/11724/post-meta-data-clearing-on-autosave
    	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
     	   return $post_id;
 	}
	
	if (get_post_type( $post->ID ) == 'aw_pp_lost') {

		update_post_meta($post->ID, "aw_pp_lost_or_found", $_POST["cat_state"]);
		update_post_meta($post->ID, "aw_pp_lost_address", $_POST["cat_address"]);
		update_post_meta($post->ID, "aw_pp_lost_city", $_POST["cat_city"]);
		update_post_meta($post->ID, "aw_pp_lost_since", $_POST["cat_date"]);	
		update_post_meta($post->ID, "aw_pp_lost_contact", $_POST["cat_lost_contact"]);	

	}

}




?>
