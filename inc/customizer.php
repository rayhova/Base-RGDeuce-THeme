<?php
/**
 * RGDeuce Theme Customizer.
 *
 * @package RGDeuce
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rgdeuce_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

// Highlight and link color
$wp_customize->add_setting( 'rgdeuce_header_color', array(
        'default'           => '#ff0000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_header_color', array(
        'label'	   => 'Header Color',
        'section'  => 'colors',
        'settings' => 'rgdeuce_header_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_menu_color', array(
        'default'           => '#ff0000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_menu_color', array(
        'label'	   => 'Main Menu Color',
        'section'  => 'colors',
        'settings' => 'rgdeuce_menu_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_top-menu_color', array(
        'default'           => '#ff0000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_top-menu_color', array(
        'label'	   => 'Top Menu Color',
        'section'  => 'colors',
        'settings' => 'rgdeuce_top-menu_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_footer-menu_color', array(
        'default'           => '#ff0000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_footer-menu_color', array(
        'label'	   => 'Footer Menu Color',
        'section'  => 'colors',
        'settings' => 'rgdeuce_footer-menu_color',
    ) ) );
     $wp_customize->add_setting( 'rgdeuce_mobile-menu_color', array(
        'default'           => '#ff0000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_mobile-menu_color', array(
        'label'	   => 'Mobile Menu Color',
        'section'  => 'colors',
        'settings' => 'rgdeuce_mobile-menu_color',
    ) ) );
    
    $wp_customize->add_setting( 'rgdeuce_h1_color', array(
        'default'           => '#ff0000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_h1_color', array(
        'label'	   => 'h1 Color',
        'section'  => 'colors',
        'settings' => 'rgdeuce_h1_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_h2_color', array(
        'default'           => '#ff0000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_h2_color', array(
        'label'	   => 'h2 Color',
        'section'  => 'colors',
        'settings' => 'rgdeuce_h2_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_link_color', array(
        'default'           => '#ff0000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_link_color', array(
        'label'	   => 'Link and Highlight Color',
        'section'  => 'colors',
        'settings' => 'rgdeuce_link_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_footer-link_color', array(
        'default'           => '#ff0000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_footer-link_color', array(
        'label'	   => 'Link and Highlight Color',
        'section'  => 'colors',
        'settings' => 'rgdeuce_footer-link_color',
    ) ) );

add_action( 'customize_register', 'rgdeuce_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rgdeuce_customize_preview_js() {
	wp_enqueue_script( 'rgdeuce_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'rgdeuce_customize_preview_js' );

/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 * @since 1.5
 */
function rgdeuce_add_customizer_css() {
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_header_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		header#masthead {
			color: <?php echo $color; ?>;
		}
		
	</style>
<?php }

{
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_link_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		a, a:visited {
			color: <?php echo $color; ?>;
		}
		
	</style>
<?php }

{
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_menu_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		nav ul#primary-menu li a
		{
			color: <?php echo $color; ?>;
		}
	</style>
<?php }

{
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_top-menu_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		nav ul#top-menu li a
		{
			color: <?php echo $color; ?>;
		}
	</style>
<?php }
{
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_footer-menu_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		nav ul#footer-menu li a
		{
			color: <?php echo $color; ?>;
		}
	</style>
<?php }
{
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_h1_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		h1
		{
			color: <?php echo $color; ?>;
		}
	</style>
<?php }
{
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_h2_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		h2
		{
			color: <?php echo $color; ?>;
		}
	</style>
<?php }
{
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_footer-link_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		footer a
		{
			color: <?php echo $color; ?>;
		}
	</style>
<?php }

add_action( 'wp_head', 'rgdeuce_add_customizer_css' );
