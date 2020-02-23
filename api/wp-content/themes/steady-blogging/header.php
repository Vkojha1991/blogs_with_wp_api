<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package steady Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="main-container">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'steady-blogging' ); ?></a>
		<header id="site-header" role="banner">
			<div class="primary-navigation header-activated">
				<a href="#" id="pull" class="toggle-mobile-menu"><?php esc_html_e('Menu', 'steady-blogging'); ?></a>
				<div class="container clear">
					<nav id="navigation" class="primary-navigation mobile-menu-wrapper" role="navigation">
						<?php if (has_custom_logo()) { ?>
						<span id="logo" class="image-logo" itemprop="headline">
							<?php the_custom_logo(); ?>
						</span>
						<?php } else { ?>
						<span class="site-logo" itemprop="headline">
							<a href="<?php echo esc_url(home_url()); ?>">
								<?php bloginfo( 'name' ); ?>
								<span><?php bloginfo("description"); ?></span>
							</a>
						</span>
						<?php } ?>
						<?php if ( has_nav_menu( 'primary' ) ) { ?>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu clearfix', 'container' => '' ) ); ?>
						<?php } else { ?>
						<ul class="menu clearfix">
							<?php wp_list_categories('title_li='); ?>
						</ul>
						<?php } ?>
					</nav><!-- #site-navigation -->
				</div>
			</div>            
		</div><!-- .site-branding -->
	</div>
</header><!-- #masthead -->