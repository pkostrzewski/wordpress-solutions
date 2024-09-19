<?php
function create_events_cpt() {
    $labels = array(
        'name'                  => 'Events',
        'singular_name'         => 'Event',
        'menu_name'             => 'Events',
        'name_admin_bar'        => 'Event',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Event',
        'new_item'              => 'New Event',
        'edit_item'             => 'Edit Event',
        'view_item'             => 'View Event',
        'all_items'             => 'All Events',
        'search_items'          => 'Search Events',
        'not_found'             => 'No events found',
        'not_found_in_trash'    => 'No events found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'archives'              => 'Event Archives',
        'insert_into_item'      => 'Insert into event',
        'uploaded_to_this_item' => 'Uploaded to this event',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'events' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-calendar',
        'hierarchical'       => false,
        'menu_position'      => 30,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'author' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'events', $args );
}
add_action( 'init', 'create_events_cpt' );

// Include the file to register custom post type
include_once __DIR__ . '/create_events_cpt.php';

// Include the file to register custom taxonomy
include_once __DIR__ . '/create_year_taxonomy.php';

// Include the file to enqueue AJAX scripts
include_once __DIR__ . '/enqueue_events_scripts.php';

// Include the file for AJAX handling
include_once __DIR__ . '/filter_posts_by_year.php';

// Include the file to customize Gutenberg block types
include_once __DIR__ . '/events_allowed_block_types.php';
