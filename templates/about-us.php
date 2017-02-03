<?php
/*
    Template Name: About Us
*/

/**
 * div.hero-image
 * article.page.about
 *         header.intro
 *             h1.page-title
 *             the_content
 *         section.employees (field group employees, repeater field)
 *             img.image
 *             h2.name
 *             p.description
 *
 */

?>

<?php get_header();
    $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>

    <?php if( has_post_thumbnail() ) { // check for feature image ?>
        <div class="hero-image" style="background-image: url('<?php echo $thumbnail_url; ?>');" data-type="background" data-speed="2"></div>
    <?php } else { // fallback image ?>
        <div class="hero-image hero-image-default" data-type="background" data-speed="2"></div>
    <?php } ?>
<main class="main">
    <article class="page-about">
        <div class="header-intro">
            <h1 class="about-title"><?php the_title(); ?></h1>

            <p><?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?></p>
        </div>
        <section class="employees">
            <?php if( have_rows('employee_fields') ): ?>

                <?php while ( have_rows('employee_fields') ) : the_row(); ?>
                    <div class="employee">
                        <img class="employee-img" src="<?php the_sub_field('employee_image'); ?>" alt="" />
                        <h3><?php the_sub_field('employee_name'); ?></h3>
                        <p><?php the_sub_field('employee_description'); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
    </article>

<?php get_footer(); ?>
