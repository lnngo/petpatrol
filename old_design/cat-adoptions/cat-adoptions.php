<?php
/*
Plugin Name: Cat Adoptions
Plugin URI: http://petpatrol.ca
Description: Provides the functionality of cat posts
Version: 0.1
Author: Adrian Waddell
Author URI: http://adrian.waddell.ch
License: GPL2v2
*/

//include('includes/cat-post.php');



if ( is_admin() ) {
	//require('includes/settings.php');
	require('includes/cat-post.php');
	require('includes/cat-post-dashboard.php');

	//require('includes/lost-and-found-post.php');
	//require('includes/lost-and-found-post-dashboard.php');
}



?>
