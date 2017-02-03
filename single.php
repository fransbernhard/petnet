<?php get_header(); ?>

<div class="petnet-container">

		<?php
		if(have_posts()) :
			// Start the loop.
			while ( have_posts() ) : the_post();
			?>
			 <article id="post-<?php the_ID(); ?>" class="full-post">
				<header class="post-header">
					<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
				</header>

					<?php the_content('<div class="post-content">', '</div>'); ?>

				<footer class="post-footer"></footer>
			</article>

			<?php
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next >>>', 'petnet' ) . '</span> ',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '<<< Previous', 'petnet' ) . '</span> ',
				) );

			// End the loop.
			endwhile;

		else : ?>
			<div class="page-not-found">
				<h2> <?php _e('Oops! That page can’t be found.', 'petnet') ?> </h2>
				<p><?php _e('It looks like nothing was found at this location.', 'petnet'); ?></p>
			</div>
		<?php endif; ?>

</div>

<?php get_footer(); ?>
