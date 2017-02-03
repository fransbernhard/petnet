<?php

/* Template Name: Animal Listing */

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

            <div class="animal-listing"></div>
        </div>
    </div>
<?php get_footer(); ?>
