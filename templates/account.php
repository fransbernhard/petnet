<?php
/*
    Template Name: Account
*/

/**
 *      article.page.account-user
 *         h1.page-title
 *         plugin?
 */

?>

<?php get_header(); ?>

<main class="main main-animal-listing">

    <?php  $current_user =  wp_get_current_user(); ?>

    <article class="page account-user">
    		<div class="user-info">
    			<?php while ( have_posts() ) : the_post(); ?>

    				<div class="user-account">
    					<a href="/logout"><button class="logout-btn um-button">Log Out</button></a>
    					<h1 class="page-title"><?php _e('My Account') ?></h1>
    					<h2> Welcome <?php echo $current_user->user_firstname; ?> </h2>
    				</div>

    				<?php the_content(); ?>
    			<?php endwhile; ?>
    		</div>

      	<div class="user-animals">
        		<?php
        				$author_id = get_current_user_id();
        		 		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array(
                		'author' => $author_id,
                    'post_type' => 'animal',
                    'posts_per_page' => -1, // will get ALL posts
                    'paged'          => $paged
                );

                $author_animals = new WP_Query( $args );
            ?>
            <?php if( $author_animals->have_posts() ) :
                while ( $author_animals->have_posts() ): $author_animals->the_post(); ?>


                   <?php animalTeaser('h3', get_the_id()); ?>

                <?php endwhile; wp_reset_query();?>
            <?php endif; ?>

        </div>
    </article>

<?php get_footer(); ?>
