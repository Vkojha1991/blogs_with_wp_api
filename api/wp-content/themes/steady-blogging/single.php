<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package steady Lite
 */

get_header(); ?>

<div id="page" class="single">
	<div class="content">
		<!-- Start Article -->
		<article class="article">		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
					<div class="single_post">
						<!-- Start Content -->
						<div id="content" class="post-single-content box mark-links">
							<header>
								<!-- Start Title -->
								<h1 class="title single-title"><?php the_title(); ?></h1>
								<!-- End Title -->
								<div class="post-date-steady"><?php esc_html_e('Posted On', 'steady-blogging' ); ?> <?php the_time( get_option( 'date_format' ) ); ?></div>

							</header>

							<?php the_content(); ?>
							<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next', 'steady-blogging' ), 'previouspagelink' => __('Previous', 'steady-blogging' ), 'pagelink' => '%','echo' => 1 )); ?>
						</div><!-- End Content --> 
						<?php comments_template( '', true ); ?>
					</div>
				</div>
			<?php endwhile; ?>
		</article>
		<!-- End Article -->
		<!-- Start Sidebar -->
		<?php get_sidebar(); ?>
		<!-- End Sidebar -->
	</div>
</div>
<?php get_footer(); ?>
