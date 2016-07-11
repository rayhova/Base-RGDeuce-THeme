<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RGDeuce
 */

?>

	</div><!-- #content -->
</div><!-- #container -->
	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container container-fluid">
<div class="col-md-4">
		<div class="widget-area footer-left" role="complementary">
		<?php if ( get_theme_mod( 'rgdeuce_footer_logo' ) ) : ?>
    <div class='site-logo'>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'rgdeuce_footer_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
    </div>
		<?php endif; ?>
			<?php dynamic_sidebar( 'footer-left' ); ?>
		</div>
		</div>
		<div class="col-md-4">
		<div class="widget-area footer-center" role="complementary">
			<?php dynamic_sidebar( 'footer-center' ); ?>
		</div>
		</div>
		<div class="col-md-4">
		<div class="widget-area footer-right" role="complementary">
			<?php dynamic_sidebar( 'footer-right' );  ?>
		</div>
		</div>
</div> <!-- .container -->
	<div class="bottom-footer">
		<div class="container container-fluid">
			<div class="col-md-6">
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_id' => 'menu-footer' ) ); ?>
			<div class="site-info">
							<?php echo get_theme_mod( 'rgdeuce_footer_text' ); ?>
							<br />
							RGDeuce Theme Powered By <a href="http://rgdeucemedia.com" rel="designer" target="_blank">RGDeuce Media</a>
						</div><!-- .site-info -->
			</div>
			<div class="col-md-6
			"><div class="footer-social"><?php my_social_media_icons() ?></div></div>
		</div><!-- .container container-fluid -->
		</div><!-- .site-info -->
	</footer><!-- .bottom-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
