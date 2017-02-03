<?php

/**
 * div.hero-container
 *     aside.hero
 *         div.featured-img.sm 3x
 *     div.featured-img.lg
 *     header.animal-header
 *         h1.title
 *         fa-heart.favourites
 *         h4.seller-info
 *         div.city-price
 *             div.city
 *             div.price
 *      template include sidebar-quick-info
 *      div.animal-desc
 *      template include related-animal
 *
 */

get_header(); ?>
<main class="main main-animal-listing">
<?php if(have_posts()) :
    while (have_posts()): the_post();
        $animal_images = get_field('images');
        $primary_animal_image = $animal_images[0]['image']; ?>

        <div class="hero-container">
            <div class="featured-img lg"  style="background-image: url('<?php echo $primary_animal_image; ?>');"></div>
            <aside class="gallery">
                <?php for ($i= 1; $i < count($animal_images) ; $i++) {
                        $animal_image = $animal_images[$i]['image']; ?>
                        <div class="featured-img sm" style="background-image: url('<?php echo $animal_image; ?>');"></div>
                <?php } ?>
            </aside>
        </div>

        <!-- DENNA SKALL VARA INNUTI HERO-IMAGE?! -->
        <div class="animal-header-wrapper">
            <div class="animal-header">
                <div class="animal-title">
                    <div class="titleheart-container">
                        <h1 class="single-animal-title"><?php the_title(); ?></h1>
                        <!-- <span class="heart"></span> -->
                    </div>
                    <h4 class="info-box seller"> <?php _e('Sold by '); echo get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name') . ' '; the_date('j F Y'); ?> </h4>
                </div>
                <div class="info-wrapper">
                    <?php $city = get_field('city'); ?>
                    <h5 class="info-box city"><span><?php echo $city['address']; ?></span></h5>
                    <h5 class="info-box price"><span><?php the_field('price'); ?> :-</span></h5>
                </div>
            </div>
        </div>

        <div class="animal-content">
            <aside class="sidebar-quick-info">
                <?php
                    $animalProps = new AnimalProps('properties');
                    echo $animalProps->initAnimalProps(get_the_id());
                ?>
            </aside>

            <div class="description">
                <?php the_field('description'); ?>
            </div>

            <section class="related-animal">
                <!-- include related-animal -->
            </section>

    </div>
<?php endwhile;  endif; ?>
<?php get_footer(); ?>
