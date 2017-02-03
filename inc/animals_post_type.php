<?php
/**
 * Register a animal post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function animals_post_type() {
    $labels = array(
        'name'               => _x( 'Animals', 'petnet' ),
        'singular_name'      => _x( 'Animal', 'petnet' ),
        'menu_name'          => _x( 'Animals', 'petnet' ),
        'name_admin_bar'     => _x( 'Animal', 'petnet' ),
        'add_new'            => _x( 'Add New', 'petnet' ),
        'add_new_item'       => __( 'Add New Animal', 'petnet' ),
        'new_item'           => __( 'New Animal', 'petnet' ),
        'edit_item'          => __( 'Edit Animal', 'petnet' ),
        'view_item'          => __( 'View Animal', 'petnet' ),
        'all_items'          => __( 'All Animals', 'petnet' ),
        'search_items'       => __( 'Search Animals', 'petnet' ),
        'parent_item_colon'  => __( 'Parent Animals:', 'petnet' ),
        'not_found'          => __( 'No animals found.', 'petnet' ),
        'not_found_in_trash' => __( 'No animals found in Trash.', 'petnet' )
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __( 'Description.', 'petnet' ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'animal' ),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => true,
        'menu_position'         => null,
        'supports'              => array( 'title', 'author', 'thumbnail' ),
        'taxonomies'            => array('category'),
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'exclude_from_search'   => false
    );

    register_post_type( 'animal', $args );
}
add_action( 'init', 'animals_post_type' );
?>
