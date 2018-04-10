<?php get_header(); ?>

<!-- main content goes here -->
<main role="main">
	<!-- section -->
	<section>
		<div class="title"><h1><?php the_title(); ?></h1></div>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php the_content(); ?>

			<?php comments_template( '', true ); // Remove if you don't want comments ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>



	<?php endif; ?>

	</section>
	<!-- /section -->
</main>
<?php get_footer(); ?>
