<?php
 require_once("../../../../../dompdf/dompdf_config.inc.php");
 require( '../../../../wp-load.php' );
 
 $post = get_post($_POST['postid']);  
 $custom = get_post_custom($_POST['postid']);
 $cat_attributes = get_post_meta($_POST['postid'],'aw_pp_cat_attributes',true);

 // Scale & crop Image
 $image_attributes = wp_get_attachment_image_src( $_POST['imageid'] , 'full');

  
  //if(!empty($custom['aw_pp_cat_special_characteristics'][0])) {
	//$num_new_line = substr_count($custom['aw_pp_cat_special_characteristics'][0], "\n") *40+20;  
   //} else {
	//$num_new_line = 0;   
   //}

	

 $jpeg_quality = 100;
 
 $dest_w = $_POST['w'];
 $dest_h = $_POST['h'];
 
 if($dest_w/$dest_h>500/348) {
   $targ_w = 500; 
   $targ_h = round($targ_w/$dest_w*$dest_h,0);
 } else {
   $targ_h = 348; 
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

 $html = 
  '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <link rel="stylesheet" href="profilestyle.css" type="text/css" />
   <title>'. $post->post_title .'</title>
   </head>
   <body>';

  $catinfo = 
  '<!-- Cat Information-->  
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td class="cat-profiles-data" align="left" valign="top">';
	
  $attribute_names = array("Quiet home", "Active home", "Adult home", "Children under 12",
	 					 "Children over 12", "Other cats", "Dogs (passive)");

  $attribute_keys = array("quiet", "active", "adult", "kids", "teens", "othercats", "dogs");

 $catinfo = $catinfo . "\n " . '<table id="checklist" width="100%" border="0">' . "\n";


	if(!empty($cat_attributes)) {
		for ( $i = 0; $i < 7; $i = $i+1) {
			$catinfo = $catinfo . '<tr><td width="12px">';
			if($cat_attributes[$attribute_keys[$i]] == 'yes') {
				$catinfo = $catinfo . '<span class="profile-attr-yes">&#10004;</span>';
			} else if($cat_attributes[$attribute_keys[$i]] == 'no') {
				$catinfo = $catinfo . '<span class="profile-attr-no">&#10008;</span>';
			} else {
				$catinfo = $catinfo . '<span class="profile-attr-maybe">?</span>';
			}
			$catinfo = $catinfo . "</td><td>" . $attribute_names[$i] . "</td></tr>\n";
		}
	}
	
	// indoor or hobby farm
	$catinfo = $catinfo . "<tr>\n <td>";
	if($cat_attributes['hobbyfarm'] == 'yes') {
		$catinfo = $catinfo . '<span class="profile-attr-yes">&#10004;</span>';
		$catinfo = $catinfo .  "</td><td>"  . 'Hobby Farm';
	} else if($cat_attributes['hobbyfarm'] == 'maybe') {
		$catinfo = $catinfo . '<span class="profile-attr-maybe">?</span>';
		$catinfo = $catinfo . "</td><td>"  .'Hobby Farm';
	} else {
		$catinfo = $catinfo . '<span class="profile-attr-yes">&#10004;</span>';
		$catinfo = $catinfo . "</td><td>"  .'Indoors only';
	}
	$catinfo = $catinfo . "</td></tr>\n </table>\n";
	
	$catinfo = $catinfo . '<p id="catname">' . strtoupper($post->post_title) . "</p>\n" . '<p id="catinfo">'."\n";
	
	
	if($custom['aw_pp_cat_sex'][0] == 'female') {
		$catinfo = $catinfo . "FEMALE";
	} else {
		$catinfo = $catinfo . "MALE";
	}
	$catinfo = $catinfo . "<br />\n".
	 "Born: " . $custom['aw_pp_cat_born'][0] . "<br />\n".
	 "Colour: " . $custom['aw_pp_cat_colour'][0] . "<br />\n".
	 "Eyes: " . $custom['aw_pp_cat_eyes'][0] . "<br />\n";

	if($custom['aw_pp_cat_sex'][0] == 'female') {
		$catinfo = $catinfo . "Spayed &#38; Vaccinated";
	} else {
		$catinfo = $catinfo . "Neutered &#38; Vaccinated";
	}
	$catinfo = $catinfo . "<br />";


	
	if(!empty($custom['aw_pp_cat_special_characteristics'][0])) {
			$catinfo = $catinfo . '<br /><span class="is_declawed">';
			$catinfo = $catinfo . str_replace(array("\r\n","\r","\n"),'<br />', $custom['aw_pp_cat_special_characteristics'][0]);
			$catinfo = $catinfo . '</span><br />';
	}
	
	
	$catinfo = $catinfo . "\n</p>\n".
	  '</td>
    <td width= "350px" align="right" valign="top">'. 
	"\n".
  '<img alt="Cat Image" src="imagecrop.jpg" /> 
   </td>
  </tr>
</table>';
$html = $html . $catinfo .
   '<div id="textbody">' .
   apply_filters('the_content',$post->post_content) . '</div>
    <p id="endline">
    If you are interested in adopting<br />' . "\n" .
   strtoupper($post->post_title) .
   '<br/>
    please contact the Pet Patrol at 519-669-1979
     </p>
  </body>
 </html>';



//echo $html; 
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream($post->post_title . ".pdf");
?>