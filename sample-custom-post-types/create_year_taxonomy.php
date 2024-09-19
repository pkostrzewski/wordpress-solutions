<?php
function create_year_taxonomy() {
    $labels = array(
        'name'              => 'Years',
        'singular_name'     => 'Year',
        'search_items'      => 'Search Years',
        'all_items'         => 'All Years',
        'parent_item'       => 'Parent Year',
        'parent_item_colon' => 'Parent Year:',
        'edit_item'         => 'Edit Year',
        'update_item'       => 'Update Year',
        'add_new_item'      => 'Add New Year',
        'new_item_name'     => 'New Year Name',
        'menu_name'         => 'Years',
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'year' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'year', array( 'events' ), $args );
}
add_action( 'init', 'create_year_taxonomy' );
