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
	$social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram','github','snapchat', 'email');
 
	return $social_sites;
}

function rgdeuce_theme_customizer( $wp_customize ) {
	
	    /*--------------------------------------------------------------
	//Header Options
--------------------------------------------------------------*/
    $wp_customize->add_panel('rgdeuce_header_options', array(
      'capabitity' => 'edit_theme_options',
      'description' => __('Change the Header Settings from here as you want', 'rgdeuce'),
      'priority' => 500,
      'title' => __('Header Options', 'rgdeuce')
   ));
    $wp_customize->add_section( 'rgdeuce_logo_section' , array(
	    'title'       => __( 'Logo Options', 'rgdeuce' ),
	    'panel' => 'rgdeuce_header_options',
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
	 $wp_customize->add_section( 'rgdeuce_header_section' , array(
	    'title'       => __( 'Header Settings', 'rgdeuce' ),
	    'panel' => 'rgdeuce_header_options',
	    'priority'    => 30,
	) );
     $wp_customize->add_setting('rgdeuce_sticky_header', array(
        'default'    =>  'true',
        'transport'  =>  'postMessage'
	    )
	);
	$wp_customize->add_control('rgdeuce_sticky_header', array(
        'section'   => 'rgdeuce_header_section',
        'label'     => 'Sticky/Fixed Header?',
        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting( 'rgdeuce_header_color', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_header_color', array(
        'label'	   => 'Header Color',
        'section'  => 'rgdeuce_header_section',
        'settings' => 'rgdeuce_header_color',
    ) ) );
     $wp_customize->add_section( 'rgdeuce_ub_section' , array(
	    'title'       => __( 'Utility Bar Settings', 'rgdeuce' ),
	    'panel' => 'rgdeuce_header_options',
	    'priority'    => 30,
	) );
    $wp_customize->add_setting('rgdeuce_display_utilitybar', array(
        'default'    =>  'true',
        'transport'  =>  'postMessage'
	    )
	);
	$wp_customize->add_control('rgdeuce_display_utilitybar', array(
        'section'   => 'rgdeuce_ub_section',
        'label'     => 'Display Utility Bar?',
        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting( 'rgdeuce_utilitybar_color', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_utilitybar_color', array(
        'label'	   => 'Utility Bar Color',
        'section'  => 'rgdeuce_ub_section',
        'settings' => 'rgdeuce_utilitybar_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_utilitybar_text_color', array(
        'default'           => '#000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_utilitybar_text_color', array(
        'label'	   => 'Utility Bar Text Color',
        'section'  => 'rgdeuce_ub_section',
        'settings' => 'rgdeuce_utilitybar_text_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_top-menu_color', array(
        'default'           => '#4169E1',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_top-menu_color', array(
        'label'	   => 'Top Menu Color',
        'section'  => 'rgdeuce_ub_section',
        'settings' => 'rgdeuce_top-menu_color',
    ) ) );
 $wp_customize->add_section( 'rgdeuce_main_menu_section' , array(
	    'title'       => __( 'Main Menu Settings', 'rgdeuce' ),
	    'panel' => 'rgdeuce_header_options',
	    'priority'    => 30,
	) );
    $wp_customize->add_setting( 'rgdeuce_menu_color', array(
        'default'           => '#4169E1',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_menu_color', array(
        'label'	   => 'Main Menu Color',
        'section'  => 'rgdeuce_main_menu_section',
        'settings' => 'rgdeuce_menu_color',
    ) ) );
     $wp_customize->add_section( 'rgdeuce_int_header_section' , array(
	    'title'       => __( 'Interior Header Settings', 'rgdeuce' ),
	    'panel' => 'rgdeuce_header_options',
	    'priority'    => 30,
	) );

	 $wp_customize->add_setting('rgdeuce_display_page_header', array(
        'default'    =>  'true',
        'transport'  =>  'postMessage'
	    )
	);
	$wp_customize->add_control('rgdeuce_display_page_header', array(
        'section'   => 'rgdeuce_int_header_section',
        'label'     => 'Display Page Title Header Backgrounds?',
        'type'      => 'checkbox'
	    )
	);
	 $wp_customize->add_setting( 'rgdeuce_page_header', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rgdeuce_page_header', array(
        'label'    => __( 'Default Interior Page Title Background', 'rgdeuce' ),
        'section'  => 'rgdeuce_int_header_section',
        'settings' => 'rgdeuce_page_header',
        'description' => 'recommended size of 1900x300',
        
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_page_title_align', array(
		'default'	        => 'left',
		'transport'  =>  'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rgdeuce_page_title_align', array(
		'label'    => __( 'Alignment of Page Header Title', 'rgdeuce' ),
		'section'  => 'rgdeuce_int_header_section',
		'settings' => 'rgdeuce_page_title_align',
		'type'     => 'select',
		'choices'  => array(
			'left' => 'Align Left',
			'center' => 'Align Center',
			'right' => 'Align Right',
			),
	) ) );

        /*--------------------------------------------------------------
	// Homepage Options
--------------------------------------------------------------*/
$wp_customize->add_panel('rgdeuce_homepage_section', array(
      'capabitity' => 'edit_theme_options',
      'description' => __('Change the Homepage Settings from here as you want', 'rgdeuce'),
      'priority' => 505,
      'title' => __('Homepage Options', 'rgdeuce')
   ));
$wp_customize->add_section( 'rgdeuce_homeslide_section' , array(
	    'title'       => __( 'Homepage Main Image', 'rgdeuce' ),
	    'panel'		  => 'rgdeuce_homepage_section',
	    'priority'    => 1,
	    'description' => 'Upload an image to be your main slider on your homepage',
	) );
	$wp_customize->add_setting( 'rgdeuce_homeslide', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rgdeuce_homeslide', array(
		'label'    => __( 'Homepage Slider', 'rgdeuce' ),
		'section'  => 'rgdeuce_homeslide_section',
		'settings' => 'rgdeuce_homeslide',
		'description' => 'recommended size of 1900x750',
	) ) );

	$wp_customize->add_section( 'rgdeuce_home_buckets_section' , array(
	    'title'       => __( 'Home Buckets Section', 'rgdeuce' ),
	    'panel'		  => 'rgdeuce_homepage_section',
	    'priority'    => 1,
	    'description' => 'Select your amount of bucket sections, they can be individually customized on "Widgets" Section',
	) );
	$wp_customize->add_setting( 'rgdeuce_home_buckets', array(
		'default'	        => 'option1',
		'transport'  =>  'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rgdeuce_home_buckets', array(
		'label'    => __( 'Homepage Bucket Sections', 'rgdeuce' ),
		'section'  => 'rgdeuce_home_buckets_section',
		'settings' => 'rgdeuce_home_buckets',
		'type'     => 'select',
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
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_home_buckets_bkg_color', array(
        'label'	   => 'Homepage Bucket Section Background Color',
        'section'  => 'rgdeuce_home_buckets_section',
        'settings' => 'rgdeuce_home_buckets_bkg_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_home_buckets_bkg_color', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    
	$wp_customize->add_section( 'rgdeuce_display_newsbar_section' , array(
	    'title'       => __( 'News Sidebar Section', 'rgdeuce' ),
	    'panel'		  => 'rgdeuce_homepage_section',
	    'priority'    => 3,
	    'description' => 'Display News Section',
	) );
	 $wp_customize->add_setting('rgdeuce_display_newsbar', array(
        'default'    =>  'false',
        'transport'  =>  'postMessage'
	    )
	);
	$wp_customize->add_control('rgdeuce_display_newsbar', array(
        'section'   => 'rgdeuce_display_newsbar_section',
        'label'     => 'Display News Sidebar?',
        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting( 'rgdeuce_news_number', array(
		'default'	        => '3',
		'transport'  =>  'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rgdeuce_news_number', array(
		'label'    => __( 'Number of News Items to Display', 'rgdeuce' ),
		'section'  => 'rgdeuce_display_newsbar_section',
		'settings' => 'rgdeuce_news_number',
		'type'     => 'select',
		'choices'  => array(
			'1' => '1 News Item',
			'2' => '2 News Items',
			'3' => '3 News Items',
			'4' => '4 News Items',
			'5' => '5 News Items',
			),
	) ) );
	$wp_customize->add_setting('rgdeuce_news_read_more_text', array(
        'default'            => 'Read All News',
        'sanitize_callback'  => 'rgdeuce_sanitize_copyright',
        'transport'          => 'postMessage'
    )
);
	$wp_customize->add_control('rgdeuce_news_read_more_text', array(
        'section'  => 'rgdeuce_display_newsbar_section',
        'label'    => 'News Read More Link',
        'type'     => 'text',
        'description' => 'Text for "Read More Link" in News Section',
    )
);

	$wp_customize->add_section( 'rgdeuce_display_services_section' , array(
	    'title'       => __( 'Services Section', 'rgdeuce' ),
	    'panel'		  => 'rgdeuce_homepage_section',
	    'priority'    => 3,
	    'description' => 'Display News Section',
	) );
	$wp_customize->add_setting('rgdeuce_display_services', array(
        'default'    =>  'false',
        'transport'  =>  'postMessage'
	    )
	);
	$wp_customize->add_control('rgdeuce_display_services', array(
        'section'   => 'rgdeuce_display_services_section',
        'label'     => 'Display Services Section on Homepage?',
        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting( 'rgdeuce_services_bkg_color', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_services_bkg_color', array(
        'label'	   => 'Services Section Background Color',
        'section'  => 'rgdeuce_display_services_section',
        'settings' => 'rgdeuce_services_bkg_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_services_color', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_services_color', array(
        'label'	   => 'Services highlight Color',
        'section'  => 'rgdeuce_display_services_section',
        'settings' => 'rgdeuce_services_color',
    ) ) );
     $wp_customize->add_setting( 'rgdeuce_services_text_color', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
     $wp_customize->add_setting('rgdeuce_display_services_icon_border', array(
        'default'    =>  'true',
        'transport'  =>  'postMessage'
	    )
	);
	$wp_customize->add_control('rgdeuce_display_services_icon_border', array(
        'section'   => 'rgdeuce_display_services_section',
        'label'     => 'Display Circle Border around Service Icon?',
        'type'      => 'checkbox'
	    )
	);
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_services_text_color', array(
        'label'	   => 'Services Text Color',
        'section'  => 'rgdeuce_display_services_section',
        'settings' => 'rgdeuce_services_text_color',
    ) ) );
    $wp_customize->add_setting('rgdeuce_services_title', array(
        'default'            => 'Services',
        'sanitize_callback'  => 'rgdeuce_sanitize_copyright',
        'transport'          => 'postMessage'
    )
);

	$wp_customize->add_control('rgdeuce_services_title', array(
        'section'  => 'rgdeuce_display_services_section',
        'label'    => 'Services Title',
        'type'     => 'text',
        'description' => 'Title for Services Section on Homepage',
    )
);
	$wp_customize->add_setting('rgdeuce_services_desc', array(
        'default'            => '',
        'sanitize_callback'  => 'rgdeuce_sanitize_copyright',
        'transport'          => 'postMessage'
    )
);
	$wp_customize->add_control('rgdeuce_services_desc', array(
        'section'  => 'rgdeuce_display_services_section',
        'label'    => 'Services Text',
        'type'     => 'textarea',
        'description' => 'Text/description for Services Section on Homepage',
    )
);
    $wp_customize->add_setting('rgdeuce_services_posts', array(
        'default'            => '3',
        'sanitize_callback'  => 'rgdeuce_sanitize_copyright',
        'transport'          => 'postMessage'
    )
);
	$wp_customize->add_control('rgdeuce_services_posts', array(
        'section'  => 'rgdeuce_display_services_section',
        'label'    => 'Number of Services to show',
        'type'     => 'number',
        'input_attrs' => array(
	        'min'   => 0,
	        'step'  => 1,
	        ),
        
    )
);
	$wp_customize->add_setting('rgdeuce_services_columns', array(
        'default'            => '3',
        'transport'          => 'postMessage'
    )
);
	$wp_customize->add_control('rgdeuce_services_columns', array(
        'section'  => 'rgdeuce_display_services_section',
        'label'    => 'Number of columns 2-4',
        'type'     => 'number',
        'input_attrs' => array(
	        'min'   => 2,
	        'max'   => 4,
	        'step'  => 1,
	        ),
        
    )
);
	$wp_customize->add_setting('rgdeuce_services_read_more_text', array(
        'default'            => 'View All Sevices',
        'sanitize_callback'  => 'rgdeuce_sanitize_copyright',
        'transport'          => 'postMessage'
    )
);
	$wp_customize->add_control('rgdeuce_services_read_more_text', array(
        'section'  => 'rgdeuce_display_services_section',
        'label'    => 'Services Read More Link',
        'type'     => 'text',
        'description' => 'Text for "Read More Link" in Services Section',
    )
);

     /*--------------------------------------------------------------
	// Typography
--------------------------------------------------------------*/
$wp_customize->add_panel('rgdeuce_typography_panel', array(
      'capabitity' => 'edit_theme_options',
      'description' => __('Typography - Font, Headings', 'rgdeuce'),
      'priority' => 505,
      'title' => __('Typography Options', 'rgdeuce')
   ));
$wp_customize->add_section( 'rgdeuce_typography_section' , array(
	    'title'       => __( 'Typography', 'rgdeuce' ),
	    'priority'    => 30,
	    'panel' 	  => 'rgdeuce_typography_panel',
	    'description' => 'Typography - Select your fonts',
	) );
	$wp_customize->add_setting( 'rgdeuce_main_font', array(
        'default'           => 'opensans',
        'transport'  =>  'postMessage'
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rgdeuce_main_font', array(
        'label'    => __( 'Select your main font', 'rgdeuce' ),
        'section'  => 'rgdeuce_typography_section',
        'settings' => 'rgdeuce_main_font',
        'type'     => 'select',
        'choices'  => array(
            'opensans' => 'Open Sans',
            'arial' => 'Arial',
            'courier' => 'Courier New',
            'lato' => 'Lato',
            'montserrat' => 'Montserrat',
            'oswald' => 'Oswald',
            'quicksand' => 'Quicksand',
            'raleway' => 'Raleway',
            'roboto' => 'Roboto',
            'slabo' => 'Slabo 27px',
            'ssp' => 'Source Sans Pro',
            'times' => 'Times New Roman',
            'ubuntu' => 'Ubuntu'
            )
    ) ) );

    $wp_customize->add_setting( 'rgdeuce_h1_font', array(
        'default'           => 'opensans',
        'transport'  =>  'postMessage'
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rgdeuce_h1_font', array(
        'label'    => __( 'Select your h1 font', 'rgdeuce' ),
        'section'  => 'rgdeuce_typography_section',
        'settings' => 'rgdeuce_h1_font',
        'type'     => 'select',
        'choices'  => array(
            'opensans' => 'Open Sans',
            'arial' => 'Arial',
            'courier' => 'Courier New',
            'lato' => 'Lato',
            'montserrat' => 'Montserrat',
            'oswald' => 'Oswald',
            'quicksand' => 'Quicksand',
            'raleway' => 'Raleway',
            'roboto' => 'Roboto',
            'slabo' => 'Slabo 27px',
            'ssp' => 'Source Sans Pro',
            'times' => 'Times New Roman',
            'ubuntu' => 'Ubuntu'
            )
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_h2_font', array(
        'default'           => 'opensans',
        'transport'  =>  'postMessage'
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rgdeuce_h2_font', array(
        'label'    => __( 'Select your h2 font', 'rgdeuce' ),
        'section'  => 'rgdeuce_typography_section',
        'settings' => 'rgdeuce_h2_font',
        'type'     => 'select',
        'choices'  => array(
            'opensans' => 'Open Sans',
            'arial' => 'Arial',
            'courier' => 'Courier New',
            'lato' => 'Lato',
            'montserrat' => 'Montserrat',
            'oswald' => 'Oswald',
            'quicksand' => 'Quicksand',
            'raleway' => 'Raleway',
            'roboto' => 'Roboto',
            'slabo' => 'Slabo 27px',
            'ssp' => 'Source Sans Pro',
            'times' => 'Times New Roman',
            'ubuntu' => 'Ubuntu'
            )
    ) ) );

	$wp_customize->add_setting( 'rgdeuce_h1_color', array(
        'default'           => '#000000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_h1_color', array(
        'label'	   => 'h1 Color',
        'section'  => 'rgdeuce_typography_section',
        'settings' => 'rgdeuce_h1_color',
    ) ) );
     $wp_customize->add_setting( 'rgdeuce_h1_int_color', array(
        'default'           => '#000000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_h1_int_color', array(
        'label'	   => 'Page Header h1 Color',
        'section'  => 'rgdeuce_typography_section',
        'settings' => 'rgdeuce_h1_int_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_h2_color', array(
        'default'           => '#000000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_h2_color', array(
        'label'	   => 'h2 Color',
        'section'  => 'rgdeuce_typography_section',
        'settings' => 'rgdeuce_h2_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_link_color', array(
        'default'           => '#4169E1',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_link_color', array(
        'label'	   => 'Link and Highlight Color',
        'section'  => 'rgdeuce_typography_section',
        'settings' => 'rgdeuce_link_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_link_highlight_color', array(
        'default'           => '#4169E1',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_link_highlight_color', array(
        'label'	   => 'Link and Highlight Color',
        'section'  => 'rgdeuce_typography_section',
        'settings' => 'rgdeuce_link_highlight_color',
    ) ) );
    // Choose excerpt or full content on blog
    

	
    /*--------------------------------------------------------------
	// Social Icons
--------------------------------------------------------------*/
	
 
	
   /*--------------------------------------------------------------
	// Footer Section
--------------------------------------------------------------*/
 $wp_customize->add_panel('rgdeuce_footer_panel', array(
      'capabitity' => 'edit_theme_options',
      'description' => __('Footer Options', 'rgdeuce'),
      'priority' => 500,
      'title' => __('Footer', 'rgdeuce')
   ));
	$wp_customize->add_section( 'rgdeuce_footer_section' , array(
	    'title'       => __( 'Footer', 'rgdeuce' ),
	    'priority'    => 35,
	    'panel'       => 'rgdeuce_footer_panel',
	    'description' => 'Footer Options',
	    ) );
	 $wp_customize->add_setting( 'rgdeuce_footer-menu_color', array(
        'default'           => '#4169E1',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_footer-menu_color', array(
        'label'	   => 'Footer Menu Color',
        'section'  => 'rgdeuce_footer_section',
        'settings' => 'rgdeuce_footer-menu_color',
    ) ) );
	
	 $wp_customize->add_setting( 'rgdeuce_footer_logo', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rgdeuce_footer_logo', array(
        'label'    => __( 'Footer Logo', 'rgdeuce' ),
        'section'  => 'rgdeuce_footer_section',
        'settings' => 'rgdeuce_footer_logo',
        
    ) ) );
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
        'label'	   => 'Footer Text Color',
        'section'  => 'rgdeuce_footer_section',
        'settings' => 'rgdeuce_footer_text_color',
    ) ) );
$wp_customize->add_setting( 'rgdeuce_bottom_footer_color', array(
        'default'           => '#333333',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_bottom_footer_color', array(
        'label'	   => 'Bottom Footer Color',
        'section'  => 'rgdeuce_footer_section',
        'settings' => 'rgdeuce_bottom_footer_color',
    ) ) );
$wp_customize->add_setting( 'rgdeuce_bottom_footer_text_color', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_bottom_footer_text_color', array(
        'label'	   => 'Bottom Footer text  Color',
        'section'  => 'rgdeuce_footer_section',
        'settings' => 'rgdeuce_bottom_footer_text_color',
    ) ) );
$wp_customize->add_section( 'my_social_settings', array(
			'title'    => __('Social Media Icons', 'text-domain'),
			'priority' => 35,
			'panel'    => 'rgdeuce_footer_panel'
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
	 $wp_customize->add_setting( 'rgdeuce_social_color', array(
        'default'           => '#333333',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_social_color', array(
        'label'	   => 'Social Icon Color',
        'section'  => 'my_social_settings',
        'settings' => 'rgdeuce_social_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_social_hover_color', array(
        'default'           => '#333333',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_social_hover_color', array(
        'label'	   => 'Social Icon Hover Color',
        'section'  => 'my_social_settings',
        'settings' => 'rgdeuce_social_hover_color',
    ) ) );
           /*--------------------------------------------------------------
	 // Mobile
--------------------------------------------------------------*/

	$wp_customize->add_panel('rgdeuce_mobile_panel', array(
      'capabitity' => 'edit_theme_options',
      'description' => __('Mobile Settings (', 'rgdeuce'),
      'priority' => 500,
      'title' => __('Mobile Settings', 'rgdeuce')
   ));
	$wp_customize->add_section( 'rgdeuce_mobile_section' , array(
	    'title'       => __( 'Mobile', 'rgdeuce' ),
	    'priority'    => 35,
	    'panel'       => 'rgdeuce_mobile_panel',
	    'description' => 'Mobile Options',	
	    ) );
	$wp_customize->add_setting( 'rgdeuce_mobile_menu_bkg_color', array(
        'default'           => '#000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_mobile_menu_bkg_color', array(
        'label'	   => 'Mobile Menu Background Color',
        'section'  => 'rgdeuce_mobile_section',
        'settings' => 'rgdeuce_mobile_menu_bkg_color',
    ) ) );
     $wp_customize->add_setting( 'rgdeuce_mobile_menu_color', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_mobile_menu_color', array(
        'label'	   => 'Mobile Menu Color',
        'section'  => 'rgdeuce_mobile_section',
        'settings' => 'rgdeuce_mobile_menu_color',
    ) ) );
    $wp_customize->add_setting( 'rgdeuce_mobile_toggle_color', array(
        'default'           => '#000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rgdeuce_mobile_toggle_color', array(
        'label'	   => 'Mobile Menu Toggle (hamburger) Color',
        'section'  => 'rgdeuce_mobile_section',
        'settings' => 'rgdeuce_mobile_toggle_color',
    ) ) );


       /*--------------------------------------------------------------
	 // Analytics and Other Section
--------------------------------------------------------------*/
   $wp_customize->add_panel('rgdeuce_misc_section', array(
      'capabitity' => 'edit_theme_options',
      'description' => __('Misc Options (Analytics, CSS, Layout)', 'rgdeuce'),
      'priority' => 500,
      'title' => __('Misc Options', 'rgdeuce')
   ));
    $wp_customize->add_section( 'rgdeuce_ga_section' , array(
	    'title'       => __( 'Analytics and Others', 'rgdeuce' ),
	    'panel'       => 'rgdeuce_misc_section',
	    'priority'    => 35,
	    'description' => 'Google Analytics and other Misc Options',
	    ) );
	$wp_customize->add_setting('rgdeuce_ga_code', array(
        'default'            => '',
        'description' 		 => 'Copy entire Analytics code here',
        'transport'          => 'postMessage'
    )
);
	$wp_customize->add_control('rgdeuce_ga_code', array(
        'section'  => 'rgdeuce_ga_section',
        'label'    => 'Analytics Code',
        'type'     => 'textarea'
    )
);
	$wp_customize->add_section( 'css_styles', array(
		'title'                 => __( 'CSS Styles', 'rgdeuce' ),
		'priority'              => 30,
		'panel'       => 'rgdeuce_misc_section'
	) );
	$wp_customize->add_setting( 'rgdeuce_theme_options[rgdeuce_inline_css]' ,array( 'sanitize_callback' => 'wp_filter_nohtml_kses', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_rgdeuce_inline_css', array(
		'label'                 => __( 'Custom CSS Styles', 'rgdeuce' ),
		'section'               => 'css_styles',
		'settings'              => 'rgdeuce_theme_options[rgdeuce_inline_css]',
		'type'                  => 'textarea'
	) );
	$wp_customize->add_section( 'rgdeuce_layout_section' , array(
	    'title'       => __( 'Layout', 'rgdeuce' ),
	    'priority'    => 30,
	    'panel'       => 'rgdeuce_misc_section',
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
	$font = get_theme_mod( 'rgdeuce_main_font' );
	 switch( $font ) {
 
            case 'opensans':
                $sfont = 'Open Sans';
                break;
 
            case 'arial':
                $sfont = 'Arial';
                break;
 
            case 'courier':
                $sfont = 'Courier New';
                break;
 
            case 'roboto':
                $sfont = 'Roboto';
                break;

            case 'times':
                $sfont = 'Times New Roman';
                break;
            case 'slabo':
                $sfont = 'Slabo 27px';
                break;
            case 'ssp':
                $sfont = 'Source Sans Pro';
                break;    
            case 'lato':
                $sfont = 'Lato';
                break;
            case 'montserrat':
                $sfont = 'Montserrat';
                break;
            case 'quicksand':
                $sfont = 'Quicksand';
                break;    
            case 'ubuntu':
                $sfont = 'Ubuntu';
                break;
            case 'oswald':
                $sfont = 'Oswald';
                break;
 
            default:
                $sfont = 'Open Sans';
                break;
 
        }
        $h1font = get_theme_mod( 'rgdeuce_h1_font' );
	 switch( $h1font ) {
 
             case 'opensans':
                $sfont = 'Open Sans';
                break;
 
            case 'arial':
                $sfont = 'Arial';
                break;
 
            case 'courier':
                $sfont = 'Courier New';
                break;
 
            case 'roboto':
                $sfont = 'Roboto';
                break;

            case 'times':
                $sfont = 'Times New Roman';
                break;
            case 'slabo':
                $sfont = 'Slabo 27px';
                break;
            case 'ssp':
                $sfont = 'Source Sans Pro';
                break;    
            case 'lato':
                $sfont = 'Lato';
                break;
            case 'montserrat':
                $sfont = 'Montserrat';
                break;
            case 'quicksand':
                $sfont = 'Quicksand';
                break;    
            case 'ubuntu':
                $sfont = 'Ubuntu';
                break;
            case 'oswald':
                $sfont = 'Oswald';
                break;
 
            default:
                $sfont = 'Open Sans';
                break;
 
        }
         $h2font = get_theme_mod( 'rgdeuce_h2_font' );
	 switch( $h2font ) {
 
             case 'opensans':
                $sfont = 'Open Sans';
                break;
 
            case 'arial':
                $sfont = 'Arial';
                break;
 
            case 'courier':
                $sfont = 'Courier New';
                break;
 
            case 'roboto':
                $sfont = 'Roboto';
                break;

            case 'times':
                $sfont = 'Times New Roman';
                break;
            case 'slabo':
                $sfont = 'Slabo 27px';
                break;
            case 'ssp':
                $sfont = 'Source Sans Pro';
                break;    
            case 'lato':
                $sfont = 'Lato';
                break;
            case 'montserrat':
                $sfont = 'Montserrat';
                break;
            case 'quicksand':
                $sfont = 'Quicksand';
                break;    
            case 'ubuntu':
                $sfont = 'Ubuntu';
                break;
            case 'oswald':
                $sfont = 'Oswald';
                break;
 
            default:
                $sfont = 'Open Sans';
                break;
        }
	$rgdeuce_header_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_header_color' ) );
	$rgdeuce_header_border_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_header_border_color' ) );
	$rgdeuce_utilitybar_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_utilitybar_color' ) );
	$rgdeuce_utilitybar_text_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_utilitybar_text_color' ) );
	$rgdeuce_link_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_link_color' ) );
	$rgdeuce_link_highlight_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_link_highlight_color' ) );
	$rgdeuce_menu_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_menu_color' ) );
		$rgdeuce_top_menu_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_top-menu_color' ) );
	$rgdeuce_footer_menu_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_footer-menu_color' ) );
	$rgdeuce_h1_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_h1_color' ) );
	$rgdeuce_h1_int_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_h1_int_color' ) );
		$rgdeuce_h2_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_h2_color' ) );
	$rgdeuce_footer_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_footer_color' ) );
	$rgdeuce_footer_text_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_footer_text_color' ) );
		$rgdeuce_footer_link_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_footer_link_color' ) );
		$rgdeuce_bottom_footer_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_bottom_footer_color' ) );
	$rgdeuce_bottom_footer_text_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_bottom_footer_text_color' ) );
	$rgdeuce_page_title_align = get_theme_mod('rgdeuce_page_title_align');
	$rgdeuce_mobile_toggle_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_mobile_toggle_color' ) );
		$rgdeuce_mobile_menu_bkg_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_mobile_menu_bkg_color' ) );
		$rgdeuce_mobile_menu_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_mobile_menu_color' ) );
		$rgdeuce_services_bkg_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_services_bkg_color' ) );
		$rgdeuce_services_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_services_color' ) );
		$rgdeuce_services_text_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_services_text_color' ) );
		$rgdeuce_test_bkg_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_test_bkg_color' ) );
		$rgdeuce_test_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_test_color' ) );
		$rgdeuce_test_text_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_test_text_color' ) );
		$rgdeuce_social_color = rgdeuce_sanitize_hex_color( get_theme_mod( 'rgdeuce_social_color' ) );
		
		
		
		
	
	
	

	?>
	<!-- rgdeuce customizer CSS -->
	<style>
		body {
            font-family: '<?php echo $sfont; ?>', sans-serif;
        }
        body, button, input, select, textarea {
            font-family: '<?php echo $sfont; ?>', sans-serif;
        }
        h1 {
            font-family: '<?php echo $sh1font; ?>', sans-serif;
        }
        h2 {
            font-family: '<?php echo $sh2font; ?>', sans-serif;
        }
	
		header#masthead {
			background: <?php echo $rgdeuce_header_color; ?>;
		}
		
	
		#utility-bar {
			background: <?php echo $rgdeuce_utilitybar_color; ?>;
			color: <?php echo $rgdeuce_utilitybar_text_color; ?>;
		}
		
	
		a, a:visited {
			color: <?php echo $rgdeuce_link_color; ?>;
		}
		a:hover,
		a:focus,
		a:active {
			color: <?php echo $rgdeuce_link_highlight_color; ?>;
	
		}
		
		.main-navigation a
		{
			color: <?php echo $rgdeuce_menu_color; ?>;
		}
		nav ul#top-menu li a
		{
			color: <?php echo $rgdeuce_top_menu_color; ?>;
		}
		nav ul#footer-menu li a
		{
			color: <?php echo $rgdeuce_footer_menu_color; ?>;
		}
		h1
		{
			color: <?php echo $rgdeuce_h1_color; ?>;
		}
		.page-head-bg 	h1.entry-title {
    text-align: <?php echo $rgdeuce_page_title_align; ?>;
    color: <?php echo $rgdeuce_h1_int_color; ?>;
}
		h2
		{
			color: <?php echo $rgdeuce_h2_color; ?>;
		}
		footer#colophon
		{
			background: <?php echo $rgdeuce_footer_color; ?>;
			color: <?php echo $rgdeuce_footer_text_color; ?>;
		}
		footer#colophon a
		{
			color: <?php echo $rgdeuce_footer_link_color; ?>;
		}

		.bottom-footer
		{
			background: <?php echo $rgdeuce_bottom_footer_color; ?>;
			color: <?php echo $rgdeuce_bottom_footer_text_color; ?>;
		}

		@media (max-width:768px) {
			#mobile-nav{
			background: <?php echo $rgdeuce_mobile_menu_bkg_color; ?>;
		}
		#mobile-menu a {
		color: <?php echo $rgdeuce_mobile_menu_color; ?>;
		}
		#menu-toggle {
		color: <?php echo $rgdeuce_mobile_toggle_color; ?>;

		}

		}
	
<?php 

	if( false === get_theme_mod( 'rgdeuce_display_utilitybar' ) ) { ?>
   
	
	#utility-bar { display: none; }
	


<?php } else { }?> </style> <?php }


// end if 

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
