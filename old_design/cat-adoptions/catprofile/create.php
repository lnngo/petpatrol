<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Crop Image for Profile</title>
		<script src="../js/jcrop/jquery.min.js"></script>
		<script src="../js/jcrop/jquery.Jcrop.min.js"></script>
		<link rel="stylesheet" href="../js/jcrop/jquery.Jcrop.css" type="text/css" />
		<link rel="stylesheet" href="style.css" type="text/css" />
		<script language="Javascript">
			
			$(function(){
			  $('#target').Jcrop({
				//aspectRatio: 1,
				onSelect: updateCoords
			  });
			});

			function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
			};
	

		</script>
		</head>

		<body>
		<?php
        require( '../../../../wp-load.php' );
        $post = get_post($_GET["postid"]);        
		echo "<h1>" . $post->post_title . ": select area of image for profile</h1>\n";
		
		$image_attributes = wp_get_attachment_image_src( $_GET["imageid"] , 'full');
		echo '<p> <img src="'. $image_attributes[0]  .'" id="target" /> </p>' . "\n";        
        ?>

<form action="createpdf.php" method="post" onsubmit="return checkCoords();">
          <input type="hidden" id="x" name="x" />
          <input type="hidden" id="y" name="y" />
          <input type="hidden" id="w" name="w" />
          <input type="hidden" id="h" name="h" />
          <input type="hidden" id="postid" name="postid" value = "<?php echo $_GET["postid"]; ?>" />
          <input type="hidden" id="imageid" name="imageid" value = "<?php echo $_GET["imageid"]; ?>" />
          <p id="nextbutton">
    <input type="submit" value="Create PDF with image selection" />
  </p>
        </form>
        

</body>
</html>
