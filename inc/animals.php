<?php

/**
 * Limit Excerpt from ACF discription field
 */
function animalExcerpt($post_id = null) {
    return wp_trim_words( get_field('description' ), 15, ' ... <a class="moretag" href=" '. get_permalink($post_id) . ' "> Read more</a>');
}

function animalTeaser($header_tag = 'h2', $post_id = null) {

    $featured_image_field = get_field('images', $post_id);
    $featured_image = $featured_image_field[0]['image'];
    $city = get_field('city'); ?>

    <article class="animal" data-id="<?php echo $post_id; ?>">

        <div class="featured-image" style="background-image: url('<?php echo $featured_image; ?>')"></div>
        <header class="animal-info">

            <<?php echo $header_tag; ?> class="animal-title">
                <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
            </<?php echo $header_tag; ?>>
            <!--<span class="heart" data-id="<?php //echo $post_id; ?>"></span>-->
            <?php petnet_delete_post_link(); ?>
            <h4 class="seller-info"> <?php printf(__('Sold by %s', 'petnet'), get_the_author() ); ?> <?php the_date(); ?></h4>
            <p class="animal-excerpt">
                <?php echo animalExcerpt($post_id); ?>
            </p>

            <ul class="animal-tags">
                <?php $animalTeaserProps = new AnimalProps('tags');
                echo $animalTeaserProps->initAnimalProps(get_the_id()); ?>
            </ul>
        </header>
        <div class="city-price">
            <h5 class="city"><span><?php echo $city['address']; ?></span></h5>
            <h5 class="price"><span><?php printf(__('%s :-', 'petnet'), the_field('price')); ?></span></h5>
        </div>

    </article>

<?php }
