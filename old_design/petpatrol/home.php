<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Pet Patrol
 */

get_header(); ?>

    <?php if ( have_posts() ) : ?>

      <?php /* Start the Loop */ ?>
        <?php aw_pp_content_nav( 'nav-above' ); ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile; ?>
          <?php aw_pp_content_nav( 'nav-below' ); ?>

	<?php else : ?>

          <article id="post-0" class="post no-results not-found">
	  <header class="entry-header">
	    <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
	  </header><!-- .entry-header -->
          <div class="entry-content">
	  <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
	  </div><!-- .entry-content -->
          </article><!-- #post-0 -->
         <?php endif; ?>


<?php get_footer(); ?>
