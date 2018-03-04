<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>


<div class='post'>
<h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
<p class="posted-on"><?php aw_pp_posted_on();?><p>


<?php the_content();?>


</div>