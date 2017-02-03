<?php
/*
* Enqueue JQuery, JS, stylsheets, fontawsome
*/
function petnet_delete_post_link() {
    global $post;

    if ( $post->post_type == 'page' ) {
        if ( !current_user_can( 'edit_page', $post->ID ) )
        return;
    } else {
        if ( !current_user_can( 'edit_post', $post->ID ) )
        return;
    }

    $link = "<a href='" . wp_nonce_url( get_bloginfo('url') . "/wp-admin/post.php?action=delete&amp;post=" . $post->ID, 'delete-post_' . $post->ID) . "'><span class=\"trash\"></span></a>";
    echo $link;
}

function petnet_enqueue_scripts() {
    wp_enqueue_style( 'petnet-style', get_template_directory_uri().'/dist/css/style.css' );
    wp_enqueue_script( 'petnet-script', get_template_directory_uri() . '/dist/js/petnet.min.js', array("jquery") );

    // Google fonts
    wp_enqueue_style( 'google-body', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');
    wp_enqueue_style( 'google-heading', '//fonts.googleapis.com/css?family=Sanchez');
    /*wp_localize_script( 'petnet-script', 'ajax_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));*/
}
add_action( 'wp_enqueue_scripts', 'petnet_enqueue_scripts' );

// Edit css for admin view
function petnet_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/dist/css/wp-admin.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
// Dosen't work properly?
add_action( 'admin_enqueue_scripts', 'petnet_custom_wp_admin_style' );

/*
* Register menus
*/
function petnet_after_setup_theme(){
	register_nav_menus(array(
		'primary' => __('Primary Menu')
	));

    load_theme_textdomain('petnet', get_template_directory() . '/languages');
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'petnet_after_setup_theme');

require get_template_directory() . '/inc/AnimalProps.class.php';
require get_template_directory() . '/inc/animals_post_type.php';
require get_template_directory() . '/inc/animals.php';
require get_template_directory() . '/inc/ajax-search-animal.php';

function petnet_widgets_init() {
    register_sidebar(array(
        'name'          => 'Footer Widget',
        'id'            => 'footer-widget',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action( 'widgets_init', 'petnet_widgets_init' );

// Google Maps API key
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyCDGllI9iXhyGiCvt3WfSZQhWPZOui67qg';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/*
* ACF FORM FRONTEND
*/
function my_pre_save_post( $post_id ) {
// $animalname = get_field('name');
global $post;
    // check if this is to be a new post
    //  COMMENTED THIS OUT SINCE EVEN NEW POSTS ALREADY HAVE A NUMERIC ID
    //  MIGHT GET US INTO TROUBLE LATER WHEN WE ADD EDITING CAPABILITIES
    //  WILL POSTS DOUBLE SAVE THEN?
    /*if( $post_id != 'new_post' ){
        return $post_id;
    }*/

    // Create a new post
    $post = array(
        'post_status'  => 'publish',
        'post_title'  => $_POST['acf']['field_582af1e356f7b'],
        'post_type'  => 'animal'
    );

    // Insert the post
    $post_id = wp_insert_post( $post );
    // update $_POST['return']
    $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );
    //var_dump($post);
    // Return the new ID
    return $post_id;
}
add_filter('acf/pre_save_post' , 'my_pre_save_post' );





