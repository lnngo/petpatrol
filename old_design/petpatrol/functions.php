<?php

// Create the function to output the contents of our Dashboard Widget

function docuemtation_dashboard_widget_function() {
	// Display whatever it is you want to show
	echo 'Make sure you watch the videos in 720p resolution.<br/>
<a href="http://youtu.be/vA3fXuhbmjg" target="_blank">Welcome and Workflow</a> (1:32)<br/>
<a href="http://youtu.be/1EYJ2xuJOB4" target="_blank">Resize Images</a> (3:55)<br/>
<a href="http://youtu.be/KVGK5FKm-Ng" target="_blank">Upload Images to Dropbox</a> (1:10)<br/>
<a href="http://youtu.be/g_XfK9iLv7s" target="_blank">The Dashboard</a> (3:53)<br/>
<a href="http://youtu.be/ZntfnFEocn8" target="_blank">Writing and Saving a Draft</a> (6:10)<br/>
<a href="http://youtu.be/vSx0xOQms78" target="_blank">Changing Post Status</a> (0:34)<br/>
<a href="http://youtu.be/GZvMRQlP-9c" target="_blank">Upload to and Crop Images on Website</a> (5:46)<br/>
<a href="http://youtu.be/zrBjk92WQB4" target="_blank">Publish Cat Profile</a> (1:12)<br/>
Create a PDF of profile (later, I have to make a few modifications first)';
} 

// Create the function use in the action hook

function docuemtation_add_dashboard_widgets() {
	wp_add_dashboard_widget('docuemtation_dashboard_widget', 'Documentation', 'docuemtation_dashboard_widget_function');	
} 

// Hook into the 'wp_dashboard_setup' action to register our other functions

add_action('wp_dashboard_setup', 'docuemtation_add_dashboard_widgets' ); // Hint: For Multisite Network Admin Dashboard use wp_network_dashboard_setup instead of wp_dashboard_setup.



function aw_pp_get_first_image ($post_id, $size = 'thumbnail') {
   $args = array(
	'numberposts' => 1,
	'order'=> 'ASC',
	'post_mime_type' => 'image',
	'post_parent' => $post_id,
	'post_status' => null,
	'post_type' => 'attachment'
	);  

   $attachments = get_children( $args );

   // take for loop away
   if ($attachments) {
     foreach ($attachments as $attachment) {
        return (wp_get_attachment_thumb_url( $attachment->ID ));
     }
   }  
}


function aw_pp_echo_img ($attachement_id, $cat_name, $img_w, $img_h) {
    echo '<a href="'. wp_get_attachment_url( $attachement_id ) . '"><img src="'. wp_get_attachment_thumb_url( $attachement_id ) . '" alt="Picture of our cat '.$cat_name. '" title="'.$cat_name.'" width='.$img_w .' height=' .$img_h . ' /></a>';
}


function aw_pp_echo_imgs ($postID, $n=1, $img_w=250, $img_h=250, $space='') {
  $args = array(
	'numberposts' => $n,
	'order'=> 'ASC',
	'post_mime_type' => 'image',
	'post_parent' => $postID,
	'post_status' => null,
	'post_type' => 'attachment'
	);  

   $attachments = get_children( $args );

   // take for loop away
   if ($attachments) {
     $cat_name = get_the_title($postID);
     foreach ($attachments as $attachment) {
        aw_pp_echo_img ($attachment->ID, $cat_name, $img_w, $img_h);
        echo $space;
     }
   }  
}


function aw_pp_get_cat_link ($postID) {
	$title = get_the_title($postID);
	$anchor = str_replace(" ","_",$title);
	$c = strtolower(substr($title,0,1));
	
	$url = get_bloginfo('wpurl');
	if (in_array($c,range('a','h'))) {
		$link = $url."/our-cats/cats-a-h/#".$anchor;
	} else if (in_array($c,range('i','r'))) {
		$link = $url."/our-cats/cats-i-r/#".$anchor;
	} else {
		$link = $url."/our-cats/cats-s-z/#".$anchor;
	}
	return $link; 
}



/* echo html for auditioning profile plob */
function aw_pp_audition_profile ($query, $name) {
   if ($query->have_posts()) {
     while ( $query->have_posts() ) : $query->the_post();
       $post_id = get_the_ID();
      $cat_attributes = get_post_meta( $post_id ,'aw_pp_cat_attributes', true);

  ?>

  <div class="audition-blob">
  <h2>
    <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>', $post_id);
       echo '<a href="'.aw_pp_get_cat_link($post_id).'">';
       echo get_the_title($post_id);  
       if($cat_attributes['kitten'] == 'yes') {
	  echo ' <span class="isKitten">';
	  echo " (Kitten)";
	  echo '</span>';
	  }
      echo "</a>\n";
    ?>
  </h2>

<div class="thumbnails yoxview">
  <p class="auditioning-img">
  <?php aw_pp_echo_imgs ($post_id); ?>
  </p>
</div>

<p>
  <?php 
     if ($name == "Bridgeport") {
       echo "Pet Valu<br />94 Bridgeport Road East<br />Waterloo, (519) 886-6234";
     } elseif ($name == "Erb") {
       echo "Pet Valu<br />450 Erb Street West<br />Waterloo, (519) 886-6993";
     } elseif ($name == "Ira") {
       echo "Pet Valu<br />235 Ira Needles Boulevard<br />Waterloo, (519) 744-7475";
     } elseif ($name == "ElmiraArthur") {
       echo "Pet Valu<br />315 Arthur St. S<br />Elmira, (519) 669-1350";
     } elseif ($name == "Northfield") {
     	echo "Pet Valu<br />582 Weber St. North at Northfield<br />Waterloo, (519) 725-8935	";
     } 
     ?>
</p>
</div> <!-- audition-blob -->

<?php
   endwhile;
 } /* end if has post */

}


/*function excerpt_read_more_link($output , $pre='', $post='') {
 global $post;
 return $pre .'<a href="'. get_permalink($post->ID) . '">'.$output . '</a>' . $post;
}
add_filter('the_excerpt', 'excerpt_read_more_link');
*/

function aw_pp_read_more_link($url , $pre='', $post='', $output='Read more...') {
   return $pre .'<a href="'. $url . '">'.$output . '</a>' . $post;

}




/* add Seems To be a bug, should be defined in the plugin folder*/
add_action( 'init', 'aw_pp_register_post_type_cat' );

/* Registers post types. */
function aw_pp_register_post_type_cat() {
    /* Set up the arguments for the 'music_album' post type. */

    $cat_args = array(     	
	'public' => true,
       	'capability_type' => 'post',
       	'hierarchical' => false,
       	'rewrite' => array( 'slug' => "cat", 'with_front' => false ),
	'capability_type' => 'post',
	'hierarchical' => false,
	'labels' => array(
            'name' => 'Cats',
            'singular_name' => 'Cat',
            'add_new' => 'Add New Cat',
            'add_new_item' => 'Add New Cat',
            'edit_item' => 'Edit Cat',
            'new_item' => 'New Cat',
            'view_item' => 'View Cat',
            'search_items' => 'Search Cats',
            'not_found' => 'No Cats Found',
            'not_found_in_trash' => 'No Cats Found In Trash'
        ),
        'supports' => array(
		'title',
		'editor',
		'revisions',
		'thumbnail'
        )
    );
    /* Register the music album post type. */
    register_post_type( 'aw_pp_cats', $cat_args );
}




/**
 * Display navigation to next/previous pages when applicable
 */
function aw_pp_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text">Post navigation</h3>
			<div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> Older posts')?></div>
			<div class="nav-next"><?php previous_posts_link('Newer posts <span class="meta-nav">&rarr;</span>')?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}


function aw_pp_posted_on() {
	printf( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'twentyeleven' ), get_the_author() ),
		esc_html( get_the_author() )
	);
}


/** 
* Add new Post Status
*/


/**
*  Manage Cats
*/

add_action('admin_menu', 'register_my_custom_submenu_page');

function register_my_custom_submenu_page() {
	add_submenu_page( 'edit.php?post_type=aw_pp_cats', 'My Custom Submenu Page', 'Overview', 'edit_posts', 'my-custom-submenu-page', 'my_custom_submenu_page_callback' ); 
}





function my_custom_submenu_page_callback() {
	echo "<h1>All Cats: Overview</h1>\n";
	
	// Drafts
	echo "<h2>Drafts</h2>\n";
	$aw_query = new WP_Query(
		array('post_type' => 'aw_pp_cats',
			  'post_status' => 'draft',
			  'posts_per_page' => -1,
			  'orderby' => 'title',
			  'order' => 'ASC')); 

	echo "<p>";
	while ( $aw_query->have_posts() ) : $aw_query->the_post();
	  echo '<a href="'. get_edit_post_link( $post->ID) . '">' . get_the_title() . '</a> </td>' . "&nbsp;&middot;&nbsp;\n";
	endwhile;
	echo "<p>\n";
	wp_reset_postdata();
	wp_reset_query();
	
	
	echo "<h2>Pending for Review and Image</h2>\n";
	$aw_query = new WP_Query(
		array('post_type' => 'aw_pp_cats',
			  'post_status' => 'pending',
			  'posts_per_page' => -1,
			  'orderby' => 'title',
			  'order' => 'ASC')); 

	echo "<p>";
	while ( $aw_query->have_posts() ) : $aw_query->the_post();
	  echo '<a href="'. get_edit_post_link( $post->ID) . '">' . get_the_title() . '</a> </td>' . "&nbsp;&middot;&nbsp;\n";
	endwhile;
	echo "<p>\n";
	wp_reset_postdata();
	wp_reset_query();





	
	echo "<h2>In Stores</h2>\n";
	// Northfiled Strore
	$aw_query = new WP_Query(array('post_type' => 'aw_pp_cats',
	'meta_query' => array(
		array(
			'key' => 'aw_pp_cat_state',
			'value' => 'northfield'
		)
	),
	'posts_per_page' => -1,'orderby' => 'title', 'order' => 'ASC')); 

	echo "<p><b>In Northfield:</b> ";
	while ( $aw_query->have_posts() ) : $aw_query->the_post();
	  echo '<a href="'. get_edit_post_link( $post->ID) . '">' . get_the_title() . '</a> </td>' . "&nbsp;&middot;&nbsp;\n";
	endwhile;
	echo "<br/>\n";
	wp_reset_postdata();
	wp_reset_query();


   // Elmira
	$aw_query = new WP_Query(array('post_type' => 'aw_pp_cats',
	'meta_query' => array(
		array(
			'key' => 'aw_pp_cat_state',
			'value' => 'elmiraarthur'
		)
	),
	'posts_per_page' => -1,'orderby' => 'title', 'order' => 'ASC')); 
	echo "<b>Elmira:</b> ";
	while ( $aw_query->have_posts() ) : $aw_query->the_post();
	  echo '<a href="'. get_edit_post_link( $post->ID) . '">' . get_the_title() . '</a> </td>' . "&nbsp;&middot;&nbsp;\n";
	endwhile;
	echo "</p>\n";
	wp_reset_postdata();
	wp_reset_query();
	

	// Erb
	$aw_query = new WP_Query(array('post_type' => 'aw_pp_cats',
	'meta_query' => array(
		array(
			'key' => 'aw_pp_cat_state',
			'value' => 'erb'
		)
	),
	'posts_per_page' => -1,'orderby' => 'title', 'order' => 'ASC')); 
	echo "<b>Erb:</b> ";
	while ( $aw_query->have_posts() ) : $aw_query->the_post();
	  echo '<a href="'. get_edit_post_link( $post->ID) . '">' . get_the_title() . '</a> </td>' . "&nbsp;&middot;&nbsp;\n";
	endwhile;
	echo "</p>\n";
	wp_reset_postdata();
	wp_reset_query();


	echo "<h2>At Foster Homes</h2>";
	
	
	echo "<p>\n";
	$aw_query = new WP_Query(array('post_type' => 'aw_pp_cats',
	'meta_query' => array(
		array(
			'key' => 'aw_pp_cat_state',
			'value' => array('adoption','foster','heart','bridgeport','erb','iraneedles','elmiraarthur','northfield'),
			'compare' => 'IN'
		)
	),
	'posts_per_page' => -1,'orderby' => 'title', 'order' => 'ASC')); 
	
	// The Loop
	$a_z = range('a','z');
	$ii = 0;
	echo '<b>A&nbsp;&nbsp;&nbsp;</b>';
	while ( $aw_query->have_posts() ) : $aw_query->the_post();
	  $cat_name = get_the_title();
	
	  if (strtolower(substr($cat_name, 0,1)) == $a_z[$ii]){
	    echo '<a href="'. get_edit_post_link( $post->ID) . '">' . $cat_name . '</a>,&nbsp;&nbsp;';
	  } else {
	    $ii = $ii+1;
	    echo '&nbsp;&nbsp;&nbsp;<b>'.strtoupper($a_z[$ii]).'&nbsp;&nbsp;&nbsp;</b> ';
 	    echo '<a href="'. get_edit_post_link( $post->ID) . '">' . $cat_name . '</a>,&nbsp;&nbsp;';
	  }

	endwhile;

	// Reset Post Data
	wp_reset_postdata();
	wp_reset_query();
	
	echo "</p>\n";
	
	// Others
	echo "<h2>Others</h2>\n";
	$aw_query = new WP_Query(array('post_type' => 'aw_pp_cats',
	'meta_query' => array(
		array(
			'key' => 'aw_pp_cat_state',
			'value' => array('adopted', 'adoption', 'bridgeport','erb','iraneedles','heart','elmiraarthur','northfield'),
			'compare' => 'NOT IN'
		)
	),
	'post_status' => 'publish',
	'posts_per_page' => -1,'orderby' => 'title', 'order' => 'ASC')); 
	echo "<p>";
	while ( $aw_query->have_posts() ) : $aw_query->the_post();
	  echo '<a href="'. get_edit_post_link( $post->ID) . '">' . get_the_title() . '</a> </td>' . "&nbsp;&middot;&nbsp;\n";
	endwhile;
	echo "</p>\n";
	wp_reset_postdata();
	wp_reset_query();
	
	
	
	echo "<h2>Adopted</h2>\n";
	
	echo "<p>\n";
	$loop = new WP_Query(array('post_type' => 'aw_pp_cats',
		   'meta_key' => 'aw_pp_cat_state', 'meta_value' => 'adopted', 	'meta_compare' => '==',
		   'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'DESC')); 

	// The Loop
	$year = '';
	$month = '';
	while ( $loop->have_posts() ) : $loop->the_post();
		global $post;	// dont know why
		
		
		$yearP =  mysql2date('Y', $post->post_date);
		$monthP = mysql2date('F', $post->post_date);

		if ($year != $yearP) {
			$year = $yearP;
			$month = '';
			echo '<br/><br/><b>'.$year.'</b>'."\n";
		}


		if ($month != $monthP) {
			$month = $monthP;
			echo '<br/><b>' .$month.': </b>'."\n";
		}
		echo "\n".'<a href="'. get_edit_post_link( $post->ID) . '">' . get_the_title() . '</a>' . "&nbsp;&middot;&nbsp;";
	endwhile;
	echo "</p>\n";
	// Reset Post Data
	wp_reset_postdata();
	wp_reset_query();
	
}



/**
* Dashboard
*/

function aw_pp_dashboard_right_now() {
	global $wp_registered_sidebars;

	/*$num_cats_available = ;
	$num_cats_adopted = ;
	$num_cats_in_store = ;*/

	
//print '<pre>';
//print_r($aw_query);
//print '</pre>';
	

	


	echo "\n\t".'<div class="table table_content">';
	echo "<table>";
	echo "\n\t".'<tr>';


	// Cats for adoption
	$aw_query = new WP_Query(array('post_type' => 'aw_pp_cats',
	'meta_query' => array(
		array(
			'key' => 'aw_pp_cat_state',
			'value' => array('adoption','foster','heart','bridgeport','erb','iraneedles','elmiraarthur','northfield'),
			'compare' => 'IN'
		)
	),
	'posts_per_page' => -1)); 

	$num = number_format_i18n( $aw_query->post_count);
	$text = _n( 'Cat for adoption', 'Cats for adoption', intval($aw_query->post_count) );
	if ( current_user_can( 'edit_posts' ) ) {
		$num = "<a href='edit.php'>$num</a>";
		$text = "<a href='edit.php'>$text</a>";
	}
	echo '<td>' . $num . '</td>';
	echo '<td>' . $text . '</td>';

	echo '</tr><tr>';

	wp_reset_query();

	// Cats adopted
	$aw_query = new WP_Query(array('post_type' => 'aw_pp_cats',
	'meta_query' => array(
		array(
			'key' => 'aw_pp_cat_state',
			'value' => 'adopted'
		)
	),
	'posts_per_page' => -1)); 

	$num = number_format_i18n( $aw_query->post_count);
	$text = _n( 'Cat adopted', 'Cats adopted', intval($aw_query->post_count) );
	if ( current_user_can( 'edit_posts' ) ) {
		$num = "<a href='edit.php'>$num</a>";
		$text = "<a href='edit.php'>$text</a>";
	}
	echo '<td>' . $num . '</td>';
	echo '<td>' . $text . '</td>';

	echo '</tr><tr>';

	wp_reset_query();

	// Pages
	$num_pages = wp_count_posts( 'page' );
	$num = number_format_i18n( $num_pages->publish );
	$text = _n( 'Page', 'Pages', $num_pages->publish );
	if ( current_user_can( 'edit_pages' ) ) {
		$num = "<a href='edit.php?post_type=page'>$num</a>";
		$text = "<a href='edit.php?post_type=page'>$text</a>";
	}
	echo '<td>' . $num . '</td>';
	echo '<td>' . $text . '</td>';

	echo '</tr>';

	echo "\n\t</table><br />\n\t</div>";



	update_right_now_message();

	do_action( 'rightnow_end' );
	do_action( 'activity_box_end' );
}


function aw_pp_change_dashboard_widgets() {
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	wp_add_dashboard_widget('aw_pp_dashboard_right_now_widget', 'Right Now', 'aw_pp_dashboard_right_now');


} 

// Hoook into the 'wp_dashboard_setup' action to register our function

add_action('wp_dashboard_setup', 'aw_pp_change_dashboard_widgets' );

















?>
