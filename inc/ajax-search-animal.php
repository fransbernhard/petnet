<?php

// function animal_search() {

// 	global $wpdb;

//     $search_query = $_GET['s'];
//     $esc_like = '%' . $wpdb->esc_like( $search_query ) . '%';

//     $query = $wpdb->get_results(
//         $wpdb->prepare(
//            "SELECT p.ID, p.post_title, p.post_date, p.post_type, p.post_status, pm.post_id, pm.meta_key, pm.meta_value
//             FROM wp_posts AS p
//             INNER JOIN wp_postmeta AS pm
//             ON p.ID = pm.post_id
//             WHERE p.post_type ='animal'
//             AND p.post_status = 'publish'
//             AND ( p.post_title LIKE %s
// 					OR (pm.meta_key = 'animal' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'addtitel' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'description' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'images' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'gender' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'birthdate' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'deliveryready' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'price' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'city' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'dogbreed' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'catbreed' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'withers' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'vaccinated' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'dewormed' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'castrated' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'chipped' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'longhair' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'allergyfriendly' AND pm.meta_value LIKE %s)
// 					OR (pm.meta_key = 'contactme' AND pm.meta_value LIKE %s)
//                 )
//             GROUP BY p.ID
//             ORDER BY p.post_date DESC
//            ", $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like, $esc_like
//         )
//     );

//     $animals_list = [];


//     foreach( $query as $animal ) :
//         //echo '<pre>'; var_dump($animal); '</pre>';

//         $animals_list[] = [
//             'id' => $animal->ID,
//             'title' => $animal->post_title,


//         ];

//     endforeach;

//     //echo '<pre>'; var_dump($animals_list); '</pre>';
//     echo json_encode( $animals_list );
//     die;
// }
// add_action( 'wp_ajax_nopriv_animal_search', 'animal_search');
// add_action( 'wp_ajax_animal_search', 'animal_search');
