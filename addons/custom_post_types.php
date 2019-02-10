<?php

// Cats post type
function add_cats_post_type(){

    $labels = array(
        'name' => _x('Cats', 'post type name', 'catcms'),
        'singular_name' => _x('Cat', 'post types singular name', 'catcms'),
        'add_new_item' => _x('Add New Cat', 'adding new cat', 'catcms')
    );

    $args = array(
        'labels' => $labels,
        'description' => 'A post type for cats up for adoption',
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-groups',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        ),
        'query_var' => true
    );

    register_post_type('cats', $args);
}
add_action('init', 'add_cats_post_type');

// Enquiries post type
function add_enquiries_post_type(){
    $labels = array(
        'name' => _x('Enquiries', 'post type name', 'catcms'),
        'singular_name' => _x('Enquiry', 'post types singular name', 'catcms'),
        'add_new_item' => _x('Add New Enquiry', 'adding new enquiry', 'catcms')
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Enquiries submitted through the contact page',
        'public' => false,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 30,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array(
            'title',
            'editor'
        ),
        'query_var' => true
    );
    register_post_type('enquiries', $args);
}
add_action('init', 'add_enquiries_post_type');
