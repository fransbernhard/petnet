<?php
/* Template Name: Page Sidebar */
?>
<?php get_header(); ?>
<div class="container">
	<div class="main-content">
	<?php
	if(have_posts()) :
		while (have_posts()): the_post(); ?>
		<div class="page">
		<div class="page-content"><p><?php the_content(); ?></p></div>
		</div>
		<?php endwhile;

		else : ?>
			<div class="page-not-found">
				<h2> <?php _e('Oops! That page can’t be found.', 'petnet') ?> </h2>
				<p><?php _e('It looks like nothing was found at this location.', 'petnet'); ?></p>
			</div>
		<?php endif; ?>

	</div>
	<aside class="aside"><div class="sidebar"><ul><?php dynamic_sidebar('bruno-page-sidebar'); ?></ul></div></aside>

</div>
<?php get_footer(); ?>