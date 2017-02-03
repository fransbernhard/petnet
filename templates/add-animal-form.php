<?php
/*
    Template Name: Add Animal Form
*/

global $post;
acf_form_head();
get_header();?>

<main class="main main-animal-listing">

<div class="page add-animal-form">

<?php while ( have_posts() ) : the_post(); ?>

	<?php  $options = array(
				'post_id'		=> 	'new_post',
				'new_post'		=>	 array(
									'post_type'		=> 'animal',
									'post_status'	=> 'publish'
									),
				'field_groups' 	=>  array(124),
				'form' => true,
				// 'return'             => '%post_url%', // Redirect to new post url
				// 'html_before_fields' => '',
				// 'html_after_fields' => '',
				'submit_value'	=> __('Create a new animal' , 'acf'),
				// 'updated_message'    => 'Saved!'
			);

	acf_form( $options ); ?>

<?php endwhile; ?>

<?php get_footer(); ?>
