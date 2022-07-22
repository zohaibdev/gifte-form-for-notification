<?php 

// Register Custom Post Type Patient
function create_GiftiForm_cpt()
{

    $labels = array(
        'name' => _x('GiftiForm', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('GiftiForm', 'Post Type Singular Name', 'textdomain'),
        'menu_name' => _x('GiftiForms', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('GiftiForm', 'Add New on Toolbar', 'textdomain'),
        'archives' => __('GiftiForm Archives', 'textdomain'),
        'attributes' => __('PatiGiftiForment Attributes', 'textdomain'),
        'parent_item_colon' => __('Parent GiftiForm:', 'textdomain'),
        'all_items' => __('All GiftiForms', 'textdomain'),
        'add_new_item' => __('Add New GiftiForm', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'new_item' => __('New GiftiForm', 'textdomain'),
        'edit_item' => __('Edit GiftiForm', 'textdomain'),
        'update_item' => __('Update GiftiForm', 'textdomain'),
        'view_item' => __('View GiftiForm', 'textdomain'),
        'view_items' => __('View GiftiForms', 'textdomain'),
        'search_items' => __('Search GiftiForm', 'textdomain'),
        'not_found' => __('Not found', 'textdomain'),
        'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
        'featured_image' => __('Featured Image', 'textdomain'),
        'set_featured_image' => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image' => __('Use as featured image', 'textdomain'),
        'insert_into_item' => __('Insert into GiftiForm', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this GiftiForm', 'textdomain'),
        'items_list' => __('Patients list', 'textdomain'),
        'items_list_navigation' => __('GiftiForms list navigation', 'textdomain'),
        'filter_items_list' => __('Filter GiftiForms list', 'textdomain'),
    );
    $args = array(
        'label' => __('GiftiForm', 'textdomain'),
        'description' => __('', 'textdomain'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array('title'),
        'taxonomies' => array(),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'hierarchical' => false,
        'exclude_from_search' => true,
        'show_in_rest' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
    );
    register_post_type('GiftiForm', $args);
}
add_action('init', 'create_GiftiForm_cpt', 0);