<?php
/**
 * The template for displaying cats in content-single
 *
 * @package WordPress
 */

get_header(); ?>

<div id="primary">
  <div id="content" role="main">
	
    <?php the_post(); ?>
    <?php get_template_part( 'content', 'single' ); ?>


  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
