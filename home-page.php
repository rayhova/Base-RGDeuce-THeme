<?php
/**
 * Home Page Template
 *
Template Name:  Home Page	
 *
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RGDeuce
 */

get_header(); ?>
<?php if ( get_theme_mod( 'rgdeuce_homeslide' ) ) : ?>
<div class="home-slide"><?php rgdeuce_homeslide() ?></div>
<?php endif; ?> 

<div class="container container-fluid content-container">
<div id="content" class="site-content">
<div class="col-md-8">
	<section id="buckets">
	<?php
    $home_buckets = get_theme_mod( 'rgdeuce_home_buckets' );
    if( $home_buckets != '' ) {
        switch ( $home_buckets ) {
            case 'option1':
                // Do nothing. The theme already aligns the logo to the left
                break;
            case 'option2':
                echo '<div class="col-md-6"> <div class="widget-area hb-one" role="complementary">';
                dynamic_sidebar( 'home-bucket-1' ); 
                echo '</div></div>';
                break;
            case 'option3':
                echo '<div class="col-md-6"> <div class="widget-area hb-one" role="complementary">';
                dynamic_sidebar( 'home-bucket-1' ); 
                echo '</div></div>';
                echo '<div class="col-md-6"> <div class="widget-area hb-two" role="complementary">';
                dynamic_sidebar( 'home-bucket-2' ); 
                echo '</div></div>';
                break;
            case 'option4':
                echo '<div class="col-md-4"> <div class="widget-area hb-one hb-left" role="complementary">';
                dynamic_sidebar( 'home-bucket-1' ); 
                echo '</div></div>';
                echo '<div class="col-md-4"> <div class="widget-area hb-two hb-center" role="complementary">';
                dynamic_sidebar( 'home-bucket-2' ); 
                echo '</div></div>';
                echo '<div class="col-md-4"> <div class="widget-area hb-three hb-right" role="complementary">';
                dynamic_sidebar( 'home-bucket-3' ); 
                echo '</div></div>';
                break;
            case 'option5':
                echo '<div class="col-md-3"> <div class="widget-area hb-one hb-qtr-left" role="complementary">';
                dynamic_sidebar( 'home-bucket-1' ); 
                echo '</div></div>';
                echo '<div class="col-md-3"> <div class="widget-area hb-two hb-center-left" role="complementary">';
                dynamic_sidebar( 'home-bucket-2' ); 
                echo '</div></div>';
                echo '<div class="col-md-3"> <div class="widget-area hb-three hb-center-right" role="complementary">';
                dynamic_sidebar( 'home-bucket-3' ); 
                echo '</div></div>';
                echo '<div class="col-md-3"> <div class="widget-area hb-four hb-qtr-right" role="complementary">';
                dynamic_sidebar( 'home-bucket-4' ); 
                echo '</div></div>';
                break;
            case 'option6':
                echo '<div class="col-md-4"> <div class="widget-area hb-one hb-left" role="complementary">';
                dynamic_sidebar( 'home-bucket-1' ); 
                echo '</div></div>';
                echo '<div class="col-md-4"> <div class="widget-area hb-two hb-center" role="complementary">';
                dynamic_sidebar( 'home-bucket-2' ); 
                echo '</div></div>';
                echo '<div class="col-md-4"> <div class="widget-area hb-three hb-right" role="complementary">';
                dynamic_sidebar( 'home-bucket-3' ); 
                echo '</div></div>';
                echo '<div class="col-md-6"> <div class="widget-area hb-four hb-bot-left-half" role="complementary">';
                dynamic_sidebar( 'home-bucket-4' ); 
                echo '</div></div>';
                echo '<div class="col-md-6"> <div class="widget-area hb-five hb-bot-right-half" role="complementary">';
                dynamic_sidebar( 'home-bucket-5' ); 
                echo '</div></div>';
                break;
            case 'option7':
                echo '<div class="col-md-4"> <div class="widget-area hb-one hb-top-left" role="complementary">';
                dynamic_sidebar( 'home-bucket-1' ); 
                echo '</div></div>';
                echo '<div class="col-md-4"> <div class="widget-area hb-two hb-top-center" role="complementary">';
                dynamic_sidebar( 'home-bucket-2' ); 
                echo '</div></div>';
                echo '<div class="col-md-4"> <div class="widget-area hb-three hb-top-right" role="complementary">';
                dynamic_sidebar( 'home-bucket-3' ); 
                echo '</div></div>';
                echo '<div class="col-md-4"> <div class="widget-area hb-four hb-bot-left" role="complementary">';
                dynamic_sidebar( 'home-bucket-4' ); 
                echo '</div></div>';
                echo '<div class="col-md-4"> <div class="widget-area hb-five hb-bot-center" role="complementary">';
                dynamic_sidebar( 'home-bucket-5' ); 
                echo '</div></div>';
                echo '<div class="col-md-4"> <div class="widget-area hb-six hb-bot-right" role="complementary">';
                dynamic_sidebar( 'home-bucket-6' ); 
                echo '</div></div>';
                break;
        }
    }
?>
		<div class="col-md-4">
			

		</div><!-- .col-md-4 -->
		<div class="col-md-4">
			
		</div><!-- .col-md-4 -->
		<div class="col-md-4">
			
		</div><!-- .col-md-4 -->
	</section><!--#buckets -->


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- col-md-8 -->
<div class="col-md-4">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
