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
function my_customizer_social_media_array() {
 
	/* store social site names in array */
	$social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');
 
	return $social_sites;
}

function rgdeuce_theme_customizer( $wp_customize ) {
	
    // Homepage - Logo Upload
    $wp_customize->add_section( 'rgdeuce_logo_section' , array(
	    'title'       => __( 'Header Options', 'rgdeuce' ),
	    'priority'    => 30,
	    'description' => 'Upload a logo to replace the default site name and description in the header, select utility bar',
	) );
	$wp_customize->add_setting( 'rgdeuce_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rgdeuce_logo', array(
		'label'    => __( 'Logo', 'rgdeuce' ),
		'section'  => 'rgdeuce_logo_section',
		'settings' => 'rgdeuce_logo',
	) ) );
	 $wp_customize->add_setting( 'rgdeuce_footer_logo', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rgdeuce_footer_logo', array(
        'label'    => __( 'Footer Logo', 'rgdeuce' ),
        'section'  => 'rgdeuce_logo_section',
        'settings' => 'rgdeuce_footer_logo',
        
    ) ) );
    $wp_customize->add_setting('rgdeuce_display_utilitybar', array(
        'default'    =>  'true',
        'transport'  =>  'postMessage'
	    )
	)
	$wp_customize->add_control('rgdeuce_display_utilitybar', array(
        'section'   => 'rgdeuce_logo_section',
        'label'     => 'Display Utility Bar?',
        'type'      => 'checkbox'
	    )
	);

    //home page options 
$wp_customize->add_section( 'rgdeuce_homepage_section' , array(
	    'title'       => __( 'Homepage', 'rgdeuce' ),
	    'priority'    => 30,
	    'description' => 'Homepage options - Upload an image to be your main slider on your homepage; select your amount of bucket sections',
	) );
	$wp_customize->add_setting( 'rgdeuce_homeslide', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rgdeuce_homeslide', array(
		'label'    => __( 'Homepage Slider', 'rgdeuce' ),
		'section'  => 'rgdeuce_homepage_section',
		'settings' => 'rgdeuce_homeslide',
	) ) );
	$wp_customize->add_setting( 'rgdeuce_home_buckets', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'rgdeuce_sanitize_index_content',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rgdeuce_home_buckets', array(
		'label'    => __( 'Homepage Bucket Sections', 'rgdeuce' ),
		'section'  => 'rgdeuce_homepage_section',
		'settings' => 'rgdeuce_home_buckets',
		'type'     => 'radio',
		'choices'  => array(
			'option1' => 'No sections',
			'option2' => '1 section',
			'option3' => '2 sections',
			'option4' => '3 sections',
			'option5' => '4 Sections',
			'option6' => '5 sections',
			'option7' => '6 Sections',
			),
	) ) );

 //home page options 
$wp_customize->add_section( 'rgdeuce_typography_section' , array(
	    'title'       => __( 'Typography', 'rgdeuce' ),
	    'priority'    => 30,
	    'description' => 'Typography - Select your fonts',
	) );
	$wp_customize->add_setting( 'rgdeuce_main_font', array(
		'default'	        => 'opensans',
		'sanitize_callback' => 'rgdeuce_sanitize_index_content',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rgdeuce_home_buckets', array(
		'label'    => __( 'Homepage Bucket Sections', 'rgdeuce' ),
		'section'  => 'rgdeuce_typography_section',
		'settings' => 'rgdeuce_main_font',
		'type'     => 'select',
		'choices'  => array(
			'opensans' => 'Open Sans',
			'arial' => 'Arial',
			'courier' => 'Courier New',
			'lato' => 'Lato',
			'montserrat' => 'Montserrat',
			'raleway' => 'Raleway',
			'roboto' => 'Roboto',
			'slabo' => 'Slabo 27px',
			'times' => 'Times New Roman',
			'ubuntu' => 'Ubuntu',
			),
	) ) );
    // Choose excerpt or full content on blog
    $wp_customize->add_section( 'rgdeuce_layout_section' , array(
	    'title'       => __( 'Layout', 'rgdeuce' ),
	    'priority'    => 30,
	    'description' => 'Change how rgdeuce displays posts',
	) );
	$wp_customize->add_setting( 'rgdeuce_post_content', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'rgdeuce_sanitize_index_content',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rgdeuce_post_content', array(
		'label'    => __( 'Post content', 'rgdeuce' ),
		'section'  => 'rgdeuce_layout_section',
		'settings' => 'rgdeuce_post_content',
		'type'     => 'radio',
		'choices'  => array(
			'option1' => 'Excerpts',
			'option2' => 'Full content',
			),
	) ) );

// Highlight and link color
	$wp_customize->add_setting( 'rgdeuce_utilitybar_color', array(
        'default'           => '#000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_utilitybar_color', array(
        'label'	   => 'Utility Bar Color',
        'section'  => 'colors',
        'settings' => 'rgdeuce_utilitybar_color',
    ) ) );
$wp_customize->add_setting( 'rgdeuce_header_color', array(
        'default'           => '#ffffff',
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
    
    
    /*--------------------------------------------------------------
	// CSS Styles
--------------------------------------------------------------*/

	$wp_customize->add_section( 'css_styles', array(
		'title'                 => __( 'CSS Styles', 'rgdeuce' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'rgdeuce_theme_options[rgdeuce_inline_css]' ,array( 'sanitize_callback' => 'wp_filter_nohtml_kses', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_rgdeuce_inline_css', array(
		'label'                 => __( 'Custom CSS Styles', 'rgdeuce' ),
		'section'               => 'css_styles',
		'settings'              => 'rgdeuce_theme_options[rgdeuce_inline_css]',
		'type'                  => 'textarea'
	) );
//Social Icons
	
 
	$wp_customize->add_section( 'my_social_settings', array(
			'title'    => __('Social Media Icons', 'text-domain'),
			'priority' => 35,
	) );
 
	$social_sites = my_customizer_social_media_array();
	$priority = 5;
 
	foreach($social_sites as $social_site) {
 
		$wp_customize->add_setting( "$social_site", array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		) );
 
		$wp_customize->add_control( $social_site, array(
				'label'    => __( "$social_site url:", 'text-domain' ),
				'section'  => 'my_social_settings',
				'type'     => 'text',
				'priority' => $priority,
		) );
 
		$priority = $priority + 5;
	}

	// Footer Section
    $wp_customize->add_section( 'rgdeuce_footer_section' , array(
	    'title'       => __( 'Footer', 'rgdeuce' ),
	    'priority'    => 35,
	    'description' => 'Footer Options',
	    ) );
	$wp_customize->add_setting('rgdeuce_footer_text', array(
        'default'            => 'All Rights Reserved',
        'sanitize_callback'  => 'rgdeuce_sanitize_copyright',
        'transport'          => 'postMessage'
    )
);
	$wp_customize->add_control('rgdeuce_footer_text', array(
        'section'  => 'rgdeuce_footer_section',
        'label'    => 'Copyright Message',
        'type'     => 'text'
    )
);
	$wp_customize->add_setting( 'rgdeuce_footer_link_color', array(
        'default'           => '#ff0000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_footer_link_color', array(
        'label'	   => 'Footer Link and Highlight Color',
        'section'  => 'rgdeuce_footer_section',
        'settings' => 'rgdeuce_footer_link_color',
    ) ) );

    $wp_customize->add_setting( 'rgdeuce_footer_color', array(
        'default'           => '#000000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_footer_color', array(
        'label'	   => 'Footer  Color',
        'section'  => 'rgdeuce_footer_section',
        'settings' => 'rgdeuce_footer_color',
    ) ) );
$wp_customize->add_setting( 'rgdeuce_footer_text_color', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_footer_text_color', array(
        'label'	   => 'Footer  Color',
        'section'  => 'rgdeuce_footer_section',
        'settings' => 'rgdeuce_footer_text_color',
    ) ) );
$wp_customize->add_setting( 'rgdeuce_bottom_footer_color', array(
        'default'           => '#333333',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_bottom_footer_color', array(
        'label'	   => 'Footer  Color',
        'section'  => 'rgdeuce_footer_section',
        'settings' => 'rgdeuce_bottom_footer_color',
    ) ) );
$wp_customize->add_setting( 'rgdeuce_bottom_footer_text_color', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_bottom_footer_text_color', array(
        'label'	   => 'Footer  Color',
        'section'  => 'rgdeuce_footer_section',
        'settings' => 'rgdeuce_bottom_footer_text_color',
    ) ) );

}
add_action( 'customize_register', 'rgdeuce_theme_customizer' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rgdeuce_customize_preview_js() {
	wp_enqueue_script( 'rgdeuce_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'rgdeuce_customize_preview_js' );

/**
 * Sanitizes a hex color. Identical to core's sanitize_hex_color(), which is not available on the wp_head hook.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 1.7
 */
function rgdeuce_sanitize_hex_color( $color ) {
	if ( '' === $color )
		return '';
	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;
	return null;
}
/**
 * Sanitizes our post content value (either excerpts or full post content).
 *
 * @since 1.7
 */
function rgdeuce_sanitize_index_content( $content ) {
	if ( 'option2' == $content ) {
		return 'option2';
	} else {
		return 'option1';
	}
}


/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 * @since 1.5
 */
function rgdeuce_add_customizer_css() {
	$font = get_theme_mod( 'rgdeuce_main_font' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		body {
			font-family: '<?php echo $font; ?>', sans-serif;
		}
		
	</style>
<?php }

{
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_header_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		header#masthead {
			background: <?php echo $color; ?>;
		}
		
	</style>
<?php }

{
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_utilitybar_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		#utility-bar {
			background: <?php echo $color; ?>;
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
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_footer_color' ) );
	$textcolor = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_footer_text_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		footer
		{
			background: <?php echo $color; ?>;
			color: <?php echo $textcolor; ?>;
		}
	</style>

<?php }
{
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_footer_link_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		footer a
		{
			color: <?php echo $color; ?>;
		}
	</style>
	<?php }
{
	$color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_bottom_footer_color' ) );
	$textcolor = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_bottom_footer_text_color' ) );
	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		.bottom-footer
		{
			background: <?php echo $color; ?>;
			color: <?php echo $textcolor; ?>;
		}
	</style>

<?php }
{

	if( false === get_theme_mod( 'rgdeuce_display_utilitybar' ) ) { ?>
    <!-- rgdeuce customizer CSS -->
	<style>
	#utility-bar { display: none; }
	</style>
<?php } // end if 

add_action( 'wp_head', 'rgdeuce_add_customizer_css' );


/* takes user input from the customizer and outputs linked social media icons */
function my_social_media_icons() {
 
    $social_sites = my_customizer_social_media_array();
 
    /* any inputs that aren't empty are stored in $active_sites array */
    foreach($social_sites as $social_site) {
        if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[] = $social_site;
        }
    }
 
    /* for each active social site, add it as a list item */
        if ( ! empty( $active_sites ) ) {
 
            echo "<ul class='social-media-icons'>";
 
            foreach ( $active_sites as $active_site ) {
 
	            /* setup the class */
		        $class = 'fa fa-' . $active_site.'-square';
                if ( $active_site == 'instagram' ) {
                    $class = 'fa fa-' . $active_site;
                }
 
 
                if ( $active_site == 'email' ) {
                    ?>
                    <li>
                        <a class="email" target="_blank" href="mailto:<?php echo antispambot( is_email( get_theme_mod( $active_site ) ) ); ?>">
                            <i class="fa fa-envelope" title="<?php _e('email icon', 'text-domain'); ?>"></i>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
                            <i class="<?php echo esc_attr( $class ); ?>" title="<?php printf( __('%s icon', 'text-domain'), $active_site ); ?>"></i>
                        </a>
                    </li>
                <?php
                }
            }
            echo "</ul>";
        }
}
