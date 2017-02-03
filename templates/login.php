<?php
/*
    Template Name: Login
*/

/**
 *
 * article.page.login
 *     h1.page-title
 *     section.login-form
 *         plugin?
 *     section.login-image (style="background-image")
 */

?>


<?php get_header(); ?>

<article class="page-login">

    <section class="login-form">

    <div class="center-login-form">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <h1 class="page-title"> <?php the_title(); ?></h1>
        <?php the_content(); ?>

        <?php endwhile; ?>
    <?php endif; ?>

    </div>

    </section>
    <section class="login-image" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></section>
</article>

<?php get_footer(); ?>

