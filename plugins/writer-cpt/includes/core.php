<?php

function wcpt_activation()
{
    $label =[
        'name'                  => _x( 'Writers', 'Post type general name', 'writer-cpt' ),
        'singular_name'         => _x( 'Writer', 'Post type singular name', 'writer-cpt' ),
        'menu_name'             => _x( 'Writers', 'Admin Menu text', 'writer-cpt' ),
        'name_admin_bar'        => _x( 'Writer', 'Add New on Toolbar', 'writer-cpt' ),
        'add_new'               => __( 'Add New Writer', 'writer-cpt' ),
        'add_new_item'          => __( 'Add New Writer', 'writer-cpt' ),
        'new_item'              => __( 'New Writer', 'writer-cpt' ),
        'edit_item'             => __( 'Edit Writer', 'writer-cpt' ),
        'view_item'             => __( 'View Writer', 'writer-cpt' ),
        'all_items'             => __( 'All Writers', 'writer-cpt' ),
        'not_found'             => __('No writers were found.', 'writer-cpt'),
        'not_found_in_trash'    => __('No writers were found in Trash.', 'writer-cpt'),
    ];
    $args = [
        'label'                 => 'writer',
        'labels'                => $label,
        'public'                => true,
        'publicly_queryable'    => true,
        'has_archive'           => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'writers'),
        'capability_type'       => 'post',
        'menu_icon'             => 'dashicons-book-alt',
        'hierarchical'          => false,
        'supports'              => ['title','editor','thumbnail','custom-fields'],
        // 'show_in_rest'       => true, // In case we want to activate Gutenberg
    ];
    register_post_type('Writer', $args);
}
add_action('init', 'wcpt_activation');



function wcpt_flush_rewrites()
{
    wcpt_activation();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'wcpt_flush_rewrites');

function wcpt_plugin_deactivation()
{
    unregister_post_type('Writer');
}
register_deactivation_hook(__FILE__, 'wcpt_plugin_deactivation');
