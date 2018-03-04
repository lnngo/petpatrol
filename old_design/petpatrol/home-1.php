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

		<div id="primary">
			<div id="content" role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <div id=”post-<?php the_ID(); ?>” <?php post_class(); ?>>
                <h2>
                        <a href=”<?php the_permalink(); ?>” title=”Permalink to 
<?php the_title_attribute(); ?>”>
                                <?php the_title(); ?>
                        </a>
                </h2>
                <div class=”entry”>
                        <?php the_content(); ?>
                </div>
        </div>
        
<?php endwhile; else: ?>
        <p>Whoa! There’s nothing here!</p>
<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
