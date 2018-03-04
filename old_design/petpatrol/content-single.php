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
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style"
     addthis:url="<?php echo get_permalink();?>"
     addthis:title="<?php echo get_the_title();?>"
     addthis:description="Pet Patrol News">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<!-- AddThis Button END -->

<?php the_content();?>


</div>