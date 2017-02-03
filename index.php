<?php get_header();?>
		<div class="petnet-container">
				<div class="petnet-content">
						<?php
						if(have_posts()) :
								while (have_posts()): the_post(); ?>
										<article id="post-<?php the_ID(); ?>" class="excerpt-post">
												<div class="post-header">
														<div class="post-featured-img"><?php the_post_thumbnail(); ?></div>
														<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
												</div>

												<div class="post-excerpt"><p><?php the_excerpt(); ?></p></div>
										</article>
								<?php endwhile;

						else : ?>
								<div class="post-not-found">
										<h2> <?php _e('Oops! That page can’t be found.', 'petnet') ?> </h2>
										<p><?php _e('It looks like nothing was found at this location.', 'petnet'); ?></p>
								</div>
						<?php endif; ?>
				</div>
				<aside class="aside petnet-sidebar">
						<ul><?php dynamic_sidebar('petnet-sidebar'); ?></ul>
				</aside>
		</div>
<?php get_footer(); ?>
