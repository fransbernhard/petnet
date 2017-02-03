<?php
/*
    Template Name: FAQ
*/

/**
 *  ACF field group FAQ
 *
 * article.page.faq
 *     header
 *         h1.page-title
 *         the_content
 *     section.qa .qa:before (fontawesome chevron-down & close) * repeater field: questions
 *         h2.question
 *         p.answer
 *     div.scroll-to-top
 *
 */

?>

<?php get_header(); ?>

<main class="main main-animal-listing">
<article class="page faq">

<div class="faq-header">
	<h1 class="page-title"><?php the_title(); ?></h1>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</div>

    <?php if( have_rows('questions') ): ?>

        <?php while ( have_rows('questions') ) : the_row(); ?>
		<section class="qa">
            <h2 class="question"><?php the_sub_field('question'); ?></h2>
            <?php the_sub_field('answer'); ?>
		</section>
        <?php endwhile; ?>

    <?php endif; ?>

<!--<a href="#petnet-menu" class="scroll-to-top"><i class="fa fa-chevron-circle-up"></i></a>-->
</article>

<?php get_footer(); ?>
