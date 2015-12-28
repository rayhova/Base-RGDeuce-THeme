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
	<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rgdeuce' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'rgdeuce' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'rgdeuce' ), 'rgdeuce', '<a href="http://rgdeucemedia.com" rel="designer">RGDeuce Media</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
