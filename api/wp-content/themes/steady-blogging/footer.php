<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package steady Lite
 */

?>
<footer id="site-footer" role="contentinfo">
	<div class="copyrights">
		<div class="container">
			<div class="row" id="copyright-note">
				<span>
					<?php echo esc_html('&copy; '). esc_html(date_i18n(__('Y','steady-blogging'))); ?> <?php bloginfo( 'name' ); ?></a>
				</span>
			</div>
		</div>
	</div>
</footer><!-- #site-footer -->
<?php wp_footer(); ?>

</body>
</html>
