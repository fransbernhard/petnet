<?php
/**
 * FOR PAGES
 * Användarvillkor
 * Inför köp
 * Så här funkar petnet
 * Sälj på petnet
 * Säkerhet
 *
 * div.hero-image
 * article.page.default
 *   	h1.page-title
 *   	the_content
 */

get_header();

$thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>

<?php if( has_post_thumbnail() ) { // check for feature image ?>
		<div class="hero-image" style="background-image: url('<?php echo $thumbnail_url; ?>');" data-type="background" data-speed="2">
		</div>
<?php } else { // fallback image ?>
		<div class="hero-image hero-image-default" data-type="background" data-speed="2">
		</div>
<?php } ?>
<main class="main">

<article class="page default">

	<h1 class="page-title"><?php the_title(); ?></h1>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>

</article>

<?php get_footer(); ?>
