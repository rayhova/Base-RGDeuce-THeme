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
<div class="home-slide"><img src='<?php echo esc_url( get_theme_mod( 'rgdeuce_homeslide' ) ); ?>' class="home-slide-img"></div>
<?php endif; ?> 

<div class="container container-fluid content-container">
<div id="content" class="site-content">

	
	<?php
    $home_buckets = get_theme_mod( 'rgdeuce_home_buckets' );
    if( $home_buckets == 'option1' ) {
        echo "no buckets";
        }
    elseif ($home_buckets == 'option2') {
               ?>
               </div>
                </div>
                <div class="container full-width">
                <section id="buckets">
                <div class="container container-fluid content-container">
                <div id="content" class="site-content">
               <div class="col-md-6"> <div class="widget-area home-buckets hb-one" role="complementary">
               <?php dynamic_sidebar( 'home-bucket-1' ); ?>
                </div></div>
                </div>
                </div> <!-- container container-fluid content-container -->
                </section>
                 </div>
                 <div class="container container-fluid content-container">
                <div id="content" class="site-content">
            
    <?php } 
    elseif ($home_buckets == 'option3') { 
        ?>
            </div>
                </div>
                <div class="container full-width">
                <section id="buckets">
                <div class="container container-fluid content-container">
                <div id="content" class="site-content">
                <div class="col-md-6"> <div class="widget-area home-buckets hb-one" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-1' ); ?>
                </div></div>
                <div class="col-md-6"> <div class="widget-area home-buckets hb-two" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-2' );  ?>
                </div></div>
                </div>
                </div> <!-- container container-fluid content-container -->
                </section>
                 </div>
                 <div class="container container-fluid content-container">
                <div id="content" class="site-content">
            <?php } 
    elseif ($home_buckets === 'option4') 
        { ?>
            </div>
                </div>
                <div class="container full-width">
                <section id="buckets">
                <div class="container container-fluid content-container">
                <div id="content" class="site-content">
                <div class="col-md-4"> <div class="widget-area home-buckets hb-one hb-left" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-1' ); ?>
                </div></div>
                <div class="col-md-4"> <div class="widget-area home-buckets hb-two hb-center" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-2' );  ?>
                </div></div>
                <div class="col-md-4"> <div class="widget-area home-buckets hb-three hb-right" role="complementary">';
                <?php dynamic_sidebar( 'home-bucket-3' );  ?>
                </div></div>
                </div>
                </div> <!-- container container-fluid content-container -->
                </section>
                 </div>
                 <div class="container container-fluid content-container">
                <div id="content" class="site-content">
                <?php }
            elseif ($home_buckets === 'option5') { ?>
                </div>
                </div>
                <div class="container full-width">
                <section id="buckets">
                <div class="container container-fluid content-container">
                <div id="content" class="site-content">
                <div class="col-md-3"> <div class="widget-area home-buckets hb-one hb-qtr-left" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-1' ); ?>
                </div></div>
                <div class="col-md-3"> <div class="widget-area home-buckets hb-two hb-center-left" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-2' ); ?>
                </div></div>
                <div class="col-md-3"> <div class="widget-area home-buckets hb-three hb-center-right" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-3' );  ?>
                </div></div>
                <div class="col-md-3"> <div class="widget-area home-buckets hb-four hb-qtr-right" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-4' );  ?>
                </div></div>
                </div>
                </div> <!-- container container-fluid content-container -->
                </section>
                 </div>
                 <div class="container container-fluid content-container">
                <div id="content" class="site-content">
                <?php }
            elseif ($home_buckets === 'option6') { ?>
                </div>
                </div>
                <div class="container full-width">
                <section id="buckets">
                <div class="container container-fluid content-container">
                <div id="content" class="site-content">
                <div class="col-md-4"> <div class="widget-area home-buckets hb-one hb-left" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-1' ); ?>
                </div></div>
                <div class="col-md-4"> <div class="widget-area home-buckets hb-two hb-center" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-2' ); ?>
                </div></div>
                <div class="col-md-4"> <div class="widget-area home-buckets hb-three hb-right" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-3' ); ?>
                </div></div>
                <div class="col-md-6"> <div class="widget-area home-buckets hb-four hb-bot-left-half" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-4' ); ?>
                </div></div>
                <div class="col-md-6"> <div class="widget-area home-buckets hb-five hb-bot-right-half" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-5' ); ?>
                </div></div>
                </div>
                </div> <!-- container container-fluid content-container -->
                </section>
                 </div>
                 <div class="container container-fluid content-container">
                <div id="content" class="site-content">
                <?php }
            elseif ($home_buckets === 'option7') { ?>
                </div>
                </div>
                <div class="container full-width">
                <section id="buckets">
                <div class="container container-fluid content-container">
                <div id="content" class="site-content">
                <div class="col-md-4"> <div class="widget-area home-buckets hb-one hb-top-left" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-1' ); ?>
                </div></div>
                <div class="col-md-4"> <div class="widget-area home-buckets hb-two hb-top-center" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-2' ); ?>
                </div></div>
                <div class="col-md-4"> <div class="widget-area home-buckets hb-three hb-top-right" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-3' ); ?>
                </div></div>
                <div class="col-md-4"> <div class="widget-area home-buckets hb-four hb-bot-left" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-4' ); ?>
                </div></div>
                <div class="col-md-4"> <div class="widget-area home-buckets hb-five hb-bot-center" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-5' ); ?>
                </div></div>
                <div class="col-md-4"> <div class="widget-area home-buckets hb-six hb-bot-right" role="complementary">
                <?php dynamic_sidebar( 'home-bucket-6' ); ?>
                </div></div>
                </div>
                </div> <!-- container container-fluid content-container -->
                </section>
                 </div>
                 <div class="container container-fluid content-container">
                <div id="content" class="site-content">
                <?php } else { ?>


<?php } ?>
		
	
    <?php if( true === get_theme_mod( 'rgdeuce_display_services' ) ) { //display services section if selected 
        $column = get_theme_mod( 'rgdeuce_services_columns' );
     switch( $column ) {
 
            case '2':
                $columns = 'col-md-6';
                break;
 
            case '3':
                $columns = 'col-md-4';
                break;

            case '4':
                $columns = 'col-md-3';
                break;

            default:
                $columns = 'col-md-4';
                break;
 
        }

        ?> 
    <section id="services">
    <h1 class="services header"><?php echo get_theme_mod( 'rgdeuce_services_title' ); ?></h1>
<div class="services-desc"><?php echo get_theme_mod( 'rgdeuce_services_desc' ); ?></div>
    <?php $args=array('post_type'=>'services', 'orderby'=>'date', 'posts_per_page'=> get_theme_mod( 'rgdeuce_services_posts' ) );
    $servicesposts=new WP_Query($args);
    while ($servicesposts->have_posts()) : $servicesposts->the_post(); ?>
    <div class="<?php echo $columns; ?>">
    <div class="service-name"><?php the_title(); ?></div>
    <div class="service-image">
    <?php if ( has_post_thumbnail() ) {
              the_post_thumbnail('service-thumb');
            }
        else {
            $icons = get_post_meta($post->ID,'services_icon_select',true );
        require get_template_directory() . '/inc/font-awesome-icons.php';
         echo $icon; 
     } ?>
    
</div>
    <div class="service-content"><?php the_content(); // or the_content(); ?></div>
        
    </div><!--bootstrap column $columns-->
    <?php endwhile;
wp_reset_postdata(); ?>
        <div class="read-more"><a href="/news"><?php echo get_theme_mod( 'rgdeuce_services_read_more_text' ); ?></a></div>

    </section>
<?php } ?>

<?php if( true === get_theme_mod( 'rgdeuce_display_newsbar' ) ) { //display news sidebar if selected
?>
<div class="col-md-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'home' ); ?>

				

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!--col-md-8 -->
<div class="col-md-4">
    <h1>News</h1>
    <?php $args=array('post_type'=>'news', 'orderby'=>'date', 'posts_per_page'=> get_theme_mod( 'rgdeuce_news_number' ) );
    $newsposts=new WP_Query($args);
    while ($newsposts->have_posts()) : $newsposts->the_post(); ?>
    <div class="col-md-3"><a href="<?php the_title(esc_url( get_permalink() )) ?>"><?php the_post_thumbnail() ?></a></div>
        <div class="col-md-9"><div class="blogpost-name"><a href="<?php the_title(esc_url( get_permalink() )) ?>"><?php the_title(); ?></a></div>
        <div class="blogpost-excerpt"><?php the_excerpt(); // or the_content(); ?></div>
        
    </div><!--col-md-6 -->
    <?php endwhile;
wp_reset_postdata(); ?>
        <div class="read-more"><a href="/news"><?php echo get_theme_mod( 'rgdeuce_news_read_more_text' ); ?></a></div>
</div><!--col-md-4 -->

<?php } else { ?>


        <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'home' ); ?>

                

            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

    <?php } ?>

<?php get_footer(); ?>
