<?php

get_header(); ?>

<main class="main main-animal-listing">

    <div class="animals-buy">

        <aside class="search-filter">
            <div class="filter-listing">
                <?php
                    $searchFilter = new AnimalProps();
                    echo $searchFilter->searchFilterProps('group_582af197ba6ad');
                ?>
            </div>
        </aside>

        <div class="searchList-container">
            <div class="searchform">
                <?php get_template_part('template-parts/searchform'); ?>
            </div>

            <div class="animal-listing-search-result">
                <?php
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $args = array(
                        'post_type' => 'animal',
                        's' => $_GET['s'],
                        'posts_per_page' => 4,
                        'paged'          => $paged
                    );
                    $loop = new WP_Query( $args );

            				if( $loop->have_posts() ) :
            						while ( $loop->have_posts() ): $loop->the_post();
                            animalTeaser();
            								// get_template_part('template-parts/content_search', 'search');
                      	endwhile; wp_reset_postdata();
            				endif;

                    $big = 999999999;
                     echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $loop->max_num_pages
                    ) );
        				?>

            </div>
        </div>
    </div>

<?php get_footer(); ?>
