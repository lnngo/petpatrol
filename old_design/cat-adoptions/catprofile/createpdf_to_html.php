<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="profilestyle.css" type="text/css" />
<?php
 require_once("../dompdf/dompdf_config.inc.php");
 require( '../../../../wp-load.php' );
 $post = get_post($_POST['postid']);  

 echo '<title>'. $post->post_title ."</title>\n";
?>





</head>

<body>

  <?php $custom = get_post_custom($_POST['postid']); ?>
  <?php $cat_attributes = get_post_meta($_POST['postid'],'aw_pp_cat_attributes',true); ?>
  
  <!-- Cat Information-->  
  <div class="cat-profiles-data">
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
    
    <br />
    <p id="catname"><?php echo strtoupper($post->post_title);?></p>
  
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

	if(!empty($cat_attributes)) {
		if($cat_attributes['declawed'] == 'yes')	{
			echo '<br /><span class="is_declawed">';
			echo "DECLAWED";
			echo '</span><br />';
		}
	}
	?>
    </p>
 
  </div> <!-- cat-profiles-data -->


<?php
 $image_attributes = wp_get_attachment_image_src( $_POST['imageid'] , 'full');

 $jpeg_quality = 100;
 
 $dest_w = $_POST['w'];
 $dest_h = $_POST['h'];
 
 if($dest_w/$dest_h>0.9459) {
   $targ_w = 350; 
   $targ_h = round($targ_w/$dest_w*$dest_h,0);
 } else {
   $targ_h = 370; 
   $targ_w = round($targ_h/$dest_h*$dest_w,0);
 }
 

 $src = $image_attributes[0]; 
 $img_r = imagecreatefromjpeg($src);
 $dst_r = ImageCreateTrueColor( $targ_w,$targ_h );

 

 imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
    $targ_w,$targ_h,$_POST['w'],$_POST['h']);

 //Creating the image output in png format 
 imagejpeg($dst_r, 'imagecrop.jpg', $jpeg_quality);
	
 //Clear up memory 
 imagedestroy($dst_r);
?>

<div id="catimage">
<img  src="imagecrop.jpg" > 
</div>

<p id="textbody">



<?php 

echo apply_filters('the_content',$post->post_content);

?>

</p>
<p id="endline">
If you are interested in adopting<br />
<?php echo strtoupper($post->post_title);?>,<br/>
please contact the Pet Patrol at 519-669-1979
</p>
</body>
</html>
