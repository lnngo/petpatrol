<?php

add_action( 'init', 'aw_pp_register_post_type_lostfound' );

/* Registers post types. */
function aw_pp_register_post_type_lostfound() {

    /* Set up the arguments for the 'music_album' post type. */
    $cat_args = array(
        'public' => true,
        'query_var' => 'lost',
        'rewrite' => array(
            'slug' => 'lost',
            'with_front' => false,
        ),
        'supports' => array(
		'title',
		'editor'	
        ),
        'labels' => array(
            'name' => 'Lost & Found',
            'singular_name' => 'Lost And Found',
            'add_new' => 'Add New Cat',
            'add_new_item' => 'Add New Cat',
            'edit_item' => 'Edit Cat',
            'new_item' => 'New Cat',
            'view_item' => 'View Cat',
            'search_items' => 'Search Lost and Found Cats',
            'not_found' => 'No Cats Found',
            'not_found_in_trash' => 'No Cats Found In Trash'
        ),
    );

    /* Register the music album post type. */
    register_post_type( 'aw_pp_lost', $cat_args );
}

?>
