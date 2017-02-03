<?php
/*
    Template Name: Create User
*/

/**
 *      article.page.create-user
 *         h1.page-title
 *         plugin?
 */

?>

<?php get_header(); ?>
<main class="main">

<article class="page create-user">
    <section class="register-form">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <h1 class="page-title"> <?php the_title(); ?></h1>
        <?php the_content(); ?>

        <?php endwhile; ?>
    <?php endif; ?>
    </section>

</article>

<?php get_footer(); ?>

