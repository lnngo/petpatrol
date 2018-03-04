<?php

/*
 Template Name: Image Play
 */
get_header(); 
?>


<h1>Images in WordPress</h1>
<p>I'm trying to play a little bit around in wordPress here.</p>
<h2>wp_get_attachment_url</h2>

<p>No arguments<br /><img src="<?php echo wp_get_attachment_url('883'); ?>" /> </p>


<h2>wp_get_attachment_thumb_url</h2>
<p>No arguments<br /><img src="<?php echo wp_get_attachment_thumb_url('883'); ?>" /> </p>
<?php echo wp_get_attachment_url('883'); ?>

<h2>aaa</h2>
<?php echo wp_get_attachment_image( '883', 'thumbnail-orig' );?>
<h2>ddd</h2>

<?php echo wp_get_attachment_image( '883', 'post-thumbnail' );?>

<?php echo wp_get_attachment_image( '883', 'thumbnail' );?>

<?php echo wp_get_attachment_image( '883', 'thumb' );?>

<?php echo wp_get_attachment_image( '883', 'medium' );?>

<?php echo wp_get_attachment_image( '883', 'large' );?>

<?php echo wp_get_attachment_image( '883', 'full' );?>

<?php get_footer(); ?>

