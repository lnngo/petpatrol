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
<meta name="viewport" content="width=device-width" />

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

<META HTTP-EQUIV="Expires" CONTENT="-1">


<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" />

<?php 
if (is_front_page()) {
       echo '<link rel="stylesheet" type="text/css" media="all" href="' .
	get_bloginfo('stylesheet_directory') .'/style-home.css" />';
   }
?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

    
<!-- Google Analytics -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-18443112-3']);
    _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<!-- yoxview -->
<script
   type="text/javascript" src=<?php echo '"'.get_bloginfo('wpurl').'/wp-content/plugins/cat-adoptions/js/yoxview/yoxview-init.js"';?>>
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".yoxview").yoxview();
		$("#thumbnails").yoxview();
	});
</script>

<!-- hide email addresses -->
<script type="text/javascript" >
function m_sfcon (u) {
    pre = "mail";
    url = pre + "to:" + u;
    document.location.href = url + "@petpatrol.ca";
}
</script>

<!-- AddThis -->
<script type="text/javascript">
    var addthis_config = {"data_track_clickback":true};
</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ed7c6c21a722a99"></script>

<?php
/* We add some JavaScript to pages with the comment form
 * to support sites with threaded comments (when in use).
 */
if ( is_singular() && get_option( ‘thread_comments’ ) )
   wp_enqueue_script( ‘comment-reply’ );

wp_head(); //always add for hooks
?> 
</head>


<body <?php body_class(); ?>>

<div id="page" >

<header id="branding" role="banner">

<div id="above-access">
  <div id="donate-header">
    <p>A Cat Rescue Organization in Kitchener-Waterloo</p>  
    <p style="padding-top: 10px;"><a href="http://www.canadahelps.org/CharityProfilePage.aspx?CharityID=d50414" rel="nofollow" target="_blank"><img class="nomargin" src="http://www.canadahelps.org/image/donateNow2b1.gif" alt="Donate Now Through CanadaHelps.org!" width=152 height=67 /></a></p>
  </div> <!-- donate header -->
  <p class="nomargin"><a href="<?php echo get_option('home'); ?>/">
      <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/pp_logo.png"
	   class="floatLeft" title="Pet Patrol" alt="Pet Patrol Logo" width=486 height=108 /></a> </p>  
</div> <!-- above-access-->


<nav id="access" role="navigation">
<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
<div class="skip-link"><a class="assistive-text" href="#content"
	title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
<div class="skip-link"><a class="assistive-text" href="#secondary"
	title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>

<?php /* Our navigation menu. */ ?>
<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?> 
</nav><!-- #access -->

</header><!-- #branding -->

<div id="main">
