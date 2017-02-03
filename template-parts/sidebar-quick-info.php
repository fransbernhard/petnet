<?php

/**
 *     h2
 *     ul
 *         li
 *             h3
 *             p or span for fontawesome icons
 *
 */  ?>

 <?php
	//$deliveryready = GetIconClass(get_field('deliveryready'));
	$castrated = GetIconClass(get_field('castrated'));
	$vaccinated = GetIconClass(get_field('vaccinated'));
	$chipped = GetIconClass(get_field('chipped'));
	$allergyfriendly = GetIconClass(get_field('allergyfriendly'));

	function GetIconClass($field){
		if ($field = "yes") {
			return "class-for-check-icon"; //change this
		}
		else {
			return "class-for-x-icon"; //change this
		}
	}

  ?>

<h2> <?php _e("Information", 'petnet'); ?></h2>
	<ul class="quick-info-list">
		<li>
			<h3> <?php _e('Gender', 'petnet') ?></h3>
			<p> <?php the_field('gender'); ?> </p>
		</li>
		<li>
			<h3> <?php _e('Date of birth', 'petnet') ?></h3>
			<p> <?php the_field('birthdate'); ?> </p>
		</li>
		<li>
			<h3> <?php _e('Breed', 'petnet') ?></h3>
			<p> <?php the_field('gender'); ?> </p>
		</li>
		<li>
			<h3> <?php _e('Wither heigt', 'petnet') ?></h3>
			<p> <?php the_field('dogsize'); ?> </p>
		</li>
		<li>
			<h3> <?php _e('Delivery ready', 'petnet') ?></h3>
			<!--<i class="info-icon <?php // echo $deliveryready; ?>"></i>-->
		</li>
		<li>
			<h3> <?php _e('Castrated', 'petnet') ?></h3>
			<i class="info-icon <?php echo $castrated; ?>"></i>
		</li>
		<li>
			<h3> <?php _e('Vaccinated', 'petnet') ?></h3>
			<i class="info-icon <?php echo $vaccinated; ?>"></i>
		</li>
		<li>
			<h3> <?php _e('Chipped', 'petnet') ?></h3>
			<i class="info-icon <?php echo $chipped; ?>"></i>
		</li>
		<li>
			<h3> <?php _e('Allergy friendly', 'petnet') ?></h3>
			<i class="info-icon <?php echo $allergyfriendly; ?>"></i>
		</li>

	</ul>

