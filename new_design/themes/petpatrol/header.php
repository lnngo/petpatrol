<?php
/**
 * The Header for the WordPress Theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage PetPatrol
 * @since Pet Patrol 0.2
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>
    <?php
    global $page, $paged;

    wp_title( '|', true, 'right' );
    // Add the blog name.
    bloginfo( 'name' );

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
      echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
    ?>
  </title>


  <meta name="keywords" content="Cats Kittens Cat Kitten Adoption Rescue Waterloo Kitchener" />
  <meta name="description" content="Want to adopt a cat or kitten?  Pet Patrol is a Kitchener/Waterloo based non-profit cat rescue organization. Please see our cat profiles to find your match." />


<?php
/* We add some JavaScript to pages with the comment form
 * to support sites with threaded comments (when in use).
 */
if ( is_singular() && get_option( ‘thread_comments’ ) )
   wp_enqueue_script( ‘comment-reply’ );
?> 


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Start wp_head -->
<?php 
    /* Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags.
     */
    wp_head();
 ?>
 <!-- End wp_head -->
</head>




<body <?php body_class(); ?>>

<div class="container">
<header>
    <table class="hidden-md-down" style="width: 100%; margin-top: 15px">
      <tbody>
        <tr>
          <td> <img  src="<?php echo get_bloginfo('template_directory') . '/images/pp_logo.png';?>" style="margin-top: 15px;"/></td>
          <td class="align-bottom text-right"> <div  style="margin-bottom: 5px;">
               A Cat Rescue Organization in Kitchener-Waterloo <br/> <a href="http://www.canadahelps.org/CharityProfilePage.aspx?CharityID=d50414" rel="nofollow" target="_blank"><img class="nomargin" src="http://www.canadahelps.org/image/donateNow2b1.gif" alt="Donate Now Through CanadaHelps.org!" width="152" height="67"></a></td>
        </tr>
      </tbody>
    </table>

  

    <!-- navbar -->
    <hr class="hidden-md-down" style="margin: 0px; border: 1.5px solid;">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color: #eceeef;">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand hidden-lg-up" href="<?php bloginfo('url')?>">
        <img alt="Pet Patrol" width=auto height="30" src="<?php echo get_bloginfo('stylesheet_directory') . '/images/pp_red_cat.png'; ?>" />
        Pet Patrol
      </a>



      <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <!-- Start wp_nav_menu -->
  <?php
      wp_nav_menu( array(
      'theme_location'     => 'primary',
      'container'          => false,
      'depth'              => 2,
      'menu_class'         => 'navbar-nav mr-auto',
      'walker'             => new PP_Walker_Nav_Menu()
      ));
?>
  <!-- End wp_nav_menu -->
      </div>

    </nav>
    <hr class="hidden-md-down" style="margin: 0px; border: 1.5px solid;">



</header>


