<?php
/**
 * The template for displaying search results pages.
 *
 * @package steady Lite
 */

get_header(); ?>
	<div id="page" class="search-area">
		<div class="article">
			<?php if ( have_posts() ) :
				$steady_blogging_full_posts = get_theme_mod('steady_blogging_full_posts');
				while ( have_posts() ) : the_post();
					steady_blogging_archive_post();
				endwhile;
				the_posts_pagination();
			else : ?>
				<div class="single_post clear">
					<article id="content" class="article page">
						<header>
							<h1 class="title"><?php esc_html_e( 'Nothing Found', 'steady-blogging' ); ?></h1>
						</header>
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'steady-blogging' ); ?></p>
						<?php get_search_form(); ?>
					</article>
				</div>
			<?php endif; ?>
		</div><!-- .article -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
