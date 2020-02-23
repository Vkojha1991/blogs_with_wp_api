<?php
/**
 * The main template file.
 *
 * Used to display the homepage when home.php doesn't exist.
 */
?>
<?php get_header(); ?>
	<div id="page" class="home-page">
		<div class="article">
			<?php if ( have_posts() ) :
				$steady_blogging_full_posts = get_theme_mod('steady_blogging_full_posts');
				while ( have_posts() ) : the_post();
					steady_blogging_archive_post();
				endwhile;
				the_posts_pagination();
			endif; ?>
		</div><!-- .article -->
		<?php get_sidebar(); ?>
		</div>
		<?php get_footer(); ?>
