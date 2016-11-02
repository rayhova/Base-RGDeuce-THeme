<?php




/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("home_bucket_widget");' ) );

class home_bucket_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'home_bucket',
            'description' => 'Widget for creating a buckets for the homepage (Image Title and Text)'
        );

        parent::__construct( 'home_bucket', 'Home Bucket Widget', $widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
        add_action( 'load-widgets.php', array($this,'my_custom_load' ));
        }

    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', get_stylesheet_directory_uri() . '/js/upload-media.js', array('jquery'));

        wp_enqueue_style('thickbox');
    }
    function enqueue_styles(){
        wp_register_style( 'home-bucket-widget', get_stylesheet_directory_uri() .'/css/home-bucket-widget-style.css', false);
        wp_enqueue_style( 'home-bucket-widget' );

    }


function my_custom_load() {    
    wp_enqueue_style( 'wp-color-picker' );        
    wp_enqueue_script( 'wp-color-picker' );    
}


    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance )
    {
        // Add any html to output the image in the $instance array
if($instance['image'] == ''){

 $icons = $instance['selected'];
 require get_template_directory() . '/inc/font-awesome-icons.php'; ?>
<div class="hb-box <?php echo $this->get_field_id( 'icon_color' ); ?>">
<h3 class="hb-title"><?php echo $instance['title'] ?></h3>
<div class="hb-image <?php echo $this->get_field_id( 'icon_color' ); ?>"><?php echo $icon ?>
</div>
<div class="hb-text"><?php echo $instance['text'] ?></div>
</div>
<?php
    }

    else { ?>
        <div class="hb-box <?php echo $this->get_field_id( 'icon_color' ); ?>">
        <h3 class="hb-title"><?php echo $instance['title'] ?></h3>
<div class="hb-image"><img src="<?php echo $instance['image'] ?>" >
</div>
<div class="hb-text"><?php echo $instance['text'] ?></div>
</div>

   <?php } ?>
   <style type="text/css" id="home-bucket-css-override">
        .home-buckets .<?php echo $this->get_field_id( 'icon_color' ); ?> i.fa { color:<?php echo $instance['icon_color'] ?> ; }
        .home-buckets .hb-box.<?php echo $this->get_field_id( 'icon_color' ); ?> { border-top: 5px solid <?php echo $instance['icon_color'] ?>;}
    </style>
<?php } 




    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {

        // update logic goes here
        $updated_instance = $new_instance;
        $instance['icon_color'] = $new_instance['icon_color'];
        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form( $instance )
    {
        $title = __('Widget Image');
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }

        $image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }

        $text = '';
        if(isset($instance['text']))
        {
            $text = $instance['text'];
        }

        $selected = '';
        if(isset($instance['selected']))
        {
            $selected = $instance['selected'];
        }
         $defaults = array(
            'icon_color' => '#e3e3e3'
        );
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button" type="button" value="Upload Image" />
        </p>
         <p>
        <label for="<?php echo $this->get_field_name( 'selected' ); ?>">Icon</label>
        <select name="<?php echo $this->get_field_name( 'selected' ); ?>" id="<?php echo $this->get_field_id( 'selected' ); ?>" style="font-family: 'FontAwesome', Arial;">
            <option value="" <?php selected( $selected, '' ); ?>> </option>
                        <option value="anchor" <?php selected( $selected, 'anchor' ); ?>> Anchor</option>
            <option value="archive" <?php selected( $selected, 'archive' ); ?>> archive</option>
            <option value="arrows" <?php selected( $selected, 'arrows   ' ); ?>> arrows</option>
            <option value="arrows-h" <?php selected( $selected, 'arrows-h' ); ?>> arrows-h</option>
            <option value="arrows-v" <?php selected( $selected, 'arrows-v' ); ?>> arrows-v</option>
            <option value="asterisk" <?php selected( $selected, 'asterisk' ); ?>> asterisk</option>
            <option value="at" <?php selected( $selected, 'at' ); ?>> at</option>
            <option value="automobile" <?php selected( $selected, 'automobile' ); ?>> automobile</option>
            <option value="balance-scale" <?php selected( $selected, 'balance-scale' ); ?>> balance-scale</option>
            <option value="ban" <?php selected( $selected, 'ban' ); ?>> ban</option>
            <option value="bank" <?php selected( $selected, 'bank' ); ?>> bank</option>
            <option value="bar-chart" <?php selected( $selected, 'bar-chart' ); ?>> bar-chart</option>
            <option value="barcode" <?php selected( $selected, 'barcode' ); ?>> barcode</option>
            <option value="battery-half" <?php selected( $selected, 'battery-half' ); ?>> battery-half</option>
            <option value="battery-full" <?php selected( $selected, 'battery-full' ); ?>> battery-full</option>
            <option value="bed" <?php selected( $selected, 'bed' ); ?>> bed</option>
            <option value="beer" <?php selected( $selected, 'beer' ); ?>> beer</option>
            <option value="bell" <?php selected( $selected, 'bell' ); ?>> bell</option>
            <option value="bell-o" <?php selected( $selected, 'bell-o' ); ?>> bell-outline</option>
            <option value="bell-slash" <?php selected( $selected, 'bell-slash' ); ?>> bell-slash</option>
            <option value="bell-slash-o" <?php selected( $selected, 'bell-slash-o' ); ?>> bell-slash-outline</option>
            <option value="bicycle" <?php selected( $selected, 'bicycle' ); ?>> bicycle</option>
            <option value="binoculars" <?php selected( $selected, 'binoculars' ); ?>> binoculars</option>
            <option value="birthday-cake" <?php selected( $selected, 'birthday-cake' ); ?>> birthday-cake</option>
            <option value="blind" <?php selected( $selected, 'blind' ); ?>> blind</option>
            <option value="bluetooth" <?php selected( $selected, 'bluetooth' ); ?>> bluetooth</option>
            <option value="bolt" <?php selected( $selected, 'bolt' ); ?>> bolt</option>
            <option value="bomb" <?php selected( $selected, 'bomb' ); ?>> bomb</option>
            <option value="book" <?php selected( $selected, 'book' ); ?>> book</option>
            <option value="bookmark" <?php selected( $selected, 'bookmark' ); ?>> bookmark</option>
            <option value="bookmark-o" <?php selected( $selected, 'bookmark-o' ); ?>> bookmark-outline</option>
            <option value="braille" <?php selected( $selected, 'braille' ); ?>> braille</option>
            <option value="briefcase" <?php selected( $selected, 'briefcase' ); ?>> briefcase</option>
            <option value="bug" <?php selected( $selected, 'bug' ); ?>> bug</option>
            <option value="building" <?php selected( $selected, 'building' ); ?>> building</option>
            <option value="building-o" <?php selected( $selected, 'building-o' ); ?>> building-outline</option>
            <option value="bullhorn" <?php selected( $selected, 'bullhorn' ); ?>> bullhorn</option>
            <option value="bullseye" <?php selected( $selected, 'bullseye' ); ?>> bullseye</option>
            <option value="bus" <?php selected( $selected, 'bus' ); ?>> bus</option>
            <option value="cab" <?php selected( $selected, 'cab' ); ?>> cab</option>  
            <option value="calculator" <?php selected( $selected, 'calculator' ); ?>> calculator</option>
            <option value="calendar" <?php selected( $selected, 'calendar' ); ?>> calendar</option>
            <option value="calendar-o" <?php selected( $selected, 'calendar-o' ); ?>> calendar-o</option>
            <option value="calendar-check-o" <?php selected( $selected, 'calendar-check-o' ); ?>> calendar-check-o</option>
            <option value="camera" <?php selected( $selected, 'camera' ); ?>> camera</option>
            <option value="camera-retro" <?php selected( $selected, 'camera-retro' ); ?>> camera-retro</option>
            <option value="car" <?php selected( $selected, 'car' ); ?>> car</option>
            <option value="caret-square-o-down" <?php selected( $selected, 'caret-square-o-down' ); ?>> caret-square-o-down</option>
            <option value="caret-square-o-up" <?php selected( $selected, 'caret-square-o-up' ); ?>> caret-square-o-up</option>
            <option value="caret-square-o-left" <?php selected( $selected, 'caret-square-o-left' ); ?>> caret-square-o-left</option>
            <option value="caret-square-o-right" <?php selected( $selected, 'caret-square-o-right' ); ?>> caret-square-o-right</option>
            <option value="cart-plus" <?php selected( $selected, 'cart-plus' ); ?>> cart-plus</option>
            <option value="cc" <?php selected( $selected, 'cc' ); ?>> cc</option>
            <option value="certificate" <?php selected( $selected, 'certificate' ); ?>> certificate</option>
            <option value="check" <?php selected( $selected, 'check' ); ?>> check</option>
            <option value="check-circle" <?php selected( $selected, 'check-circle' ); ?>> check-circle</option>
            <option value="check-circle-o" <?php selected( $selected, 'check-circle-o' ); ?>> check-circle-o</option>  
            <option value="check-square" <?php selected( $selected, 'check-square' ); ?>> check-square</option>
            <option value="check-square-o" <?php selected( $selected, 'check-square-o' ); ?>> check-square-o</option>
            <option value="child" <?php selected( $selected, 'child' ); ?>> child</option>
            <option value="circle" <?php selected( $selected, 'circle' ); ?>> circle</option>
            <option value="circle-o" <?php selected( $selected, 'circle-o' ); ?>> circle-o</option>
            <option value="circle-o-notch" <?php selected( $selected, 'circle-o-notch' ); ?>> circle-o-notch</option>
            <option value="clipboard" <?php selected( $selected, 'clipboard' ); ?>> clipboard</option>
            <option value="clock-o" <?php selected( $selected, 'clock-o' ); ?>> clock-o</option>
            <option value="clone" <?php selected( $selected, 'clone' ); ?>> clone</option>
            <option value="close" <?php selected( $selected, 'close' ); ?>> close</option>
            <option value="cloud" <?php selected( $selected, 'cloud' ); ?>> cloud</option>
            <option value="cloud-download" <?php selected( $selected, 'cloud-download' ); ?>> cloud-download</option>
            <option value="cloud-upload" <?php selected( $selected, 'cloud-upload' ); ?>> cloud-upload</option>
            <option value="code" <?php selected( $selected, 'code' ); ?>> code</option>
            <option value="code-fork" <?php selected( $selected, 'code-fork' ); ?>> code-fork</option>
            <option value="coffee" <?php selected( $selected, 'coffee' ); ?>> coffee</option>  
            <option value="cog" <?php selected( $selected, 'cog' ); ?>> cog</option>
            <option value="cogs" <?php selected( $selected, 'cogs' ); ?>> cogs</option>
            <option value="comment" <?php selected( $selected, 'comment' ); ?>> comment</option>
            <option value="comment-o" <?php selected( $selected, 'comment-o' ); ?>> comment-o</option>
            <option value="commenting" <?php selected( $selected, 'commenting' ); ?>> commenting</option>
            <option value="comments" <?php selected( $selected, 'comments' ); ?>> comments</option>
            <option value="compass" <?php selected( $selected, 'compass' ); ?>> compass</option>
            <option value="copyright" <?php selected( $selected, 'copyright' ); ?>> copyright</option>
            <option value="credit-card" <?php selected( $selected, 'credit-card' ); ?>> credit-card</option>
            <option value="credit-card-alt" <?php selected( $selected, 'credit-card-alt' ); ?>> credit-card-alt</option>
            <option value="crop" <?php selected( $selected, 'crop' ); ?>> crop</option>
            <option value="crosshairs" <?php selected( $selected, 'crosshairs' ); ?>> crosshairs</option>
            <option value="cube" <?php selected( $selected, 'cube' ); ?>> cube</option>
            <option value="cubes" <?php selected( $selected, 'cubes' ); ?>> cubes</option>  
            <option value="cutlery" <?php selected( $selected, 'cutlery' ); ?>> cutlery</option>
            <option value="dashboard" <?php selected( $selected, 'dashboard' ); ?>> dashboard</option>
            <option value="database" <?php selected( $selected, 'database' ); ?>> database</option>
            <option value="desktop" <?php selected( $selected, 'desktop' ); ?>> desktop</option>
            <option value="diamond" <?php selected( $selected, 'diamond' ); ?>> diamond</option>
            <option value="dot-circle-o" <?php selected( $selected, 'dot-circle-o' ); ?>> dot-circle-o</option>
            <option value="download" <?php selected( $selected, 'download' ); ?>> download</option>
            <option value="edit" <?php selected( $selected, 'edit' ); ?>> edit</option>
            <option value="ellipsis-h" <?php selected( $selected, 'ellipsis-h' ); ?>> ellipsis-h</option>
            <option value="ellipsis-v" <?php selected( $selected, 'ellipsis-v' ); ?>> ellipsis-v</option>
            <option value="envelope" <?php selected( $selected, 'envelope' ); ?>> envelope</option>
            <option value="envelope-o" <?php selected( $selected, 'envelope-o' ); ?>> envelope-o</option>
            <option value="eraser" <?php selected( $selected, 'eraser' ); ?>> eraser</option>
            <option value="exchange" <?php selected( $selected, 'exchange' ); ?>> exchange</option>  
            <option value="exclamation" <?php selected( $selected, 'exclamation' ); ?>> exclamation</option>
            <option value="exclamation-triangle" <?php selected( $selected, 'exclamation-triangle' ); ?>> exclamation-triangle</option>
            <option value="external-link" <?php selected( $selected, 'external-link' ); ?>> external-link</option>
            <option value="eye" <?php selected( $selected, 'eye' ); ?>> eye</option>  
            <option value="eye-dropper" <?php selected( $selected, 'eye-dropper' ); ?>> eye-dropper</option>
            <option value="fax" <?php selected( $selected, 'fax' ); ?>> fax</option>
            <option value="feed" <?php selected( $selected, 'feed' ); ?>> feed</option>
            <option value="female" <?php selected( $selected, 'female' ); ?>> female</option>
            <option value="fighter-jet" <?php selected( $selected, 'fighter-jet' ); ?>> fighter-jet</option>
            <option value="file" <?php selected( $selected, 'file' ); ?>> file</option>
            <option value="file-code-o" <?php selected( $selected, 'file-code-o' ); ?>> file-code-o</option>
            <option value="film" <?php selected( $selected, 'film' ); ?>> film</option>
            <option value="filter" <?php selected( $selected, 'filter' ); ?>> filter</option>
            <option value="fire" <?php selected( $selected, 'fire' ); ?>> fire</option>
            <option value="fire-extinguisher" <?php selected( $selected, 'fire-extinguisher' ); ?>> fire-extinguisher</option>
            <option value="flag" <?php selected( $selected, 'flag' ); ?>> flag</option>
            <option value="flask" <?php selected( $selected, 'flask' ); ?>> flask</option>
            <option value="floppy-o" <?php selected( $selected, 'floppy-o' ); ?>> floppy-o</option>
            <option value="folder" <?php selected( $selected, 'folder' ); ?>> folder</option>
            <option value="folder-o" <?php selected( $selected, 'folder-o' ); ?>> folder-o</option>  
            <option value="folder-open" <?php selected( $selected, 'folder-open' ); ?>> folder-open</option>
            <option value="frown-o" <?php selected( $selected, 'frown-o' ); ?>> frown-o</option>
            <option value="gamepad" <?php selected( $selected, 'gamepad' ); ?>> gamepad</option>
            <option value="gavel" <?php selected( $selected, 'gavel' ); ?>> gavel</option>  
            <option value="gift" <?php selected( $selected, 'gift' ); ?>> gift</option>
            <option value="glass" <?php selected( $selected, 'glass' ); ?>> glass</option>
            <option value="globe" <?php selected( $selected, 'globe' ); ?>> globe</option>
            <option value="graduation-cap" <?php selected( $selected, 'graduation-cap' ); ?>> graduation-cap</option>
            <option value="group" <?php selected( $selected, 'group' ); ?>> group</option>
            <option value="hashtag" <?php selected( $selected, 'hashtag' ); ?>> hashtag</option>
            <option value="headphones" <?php selected( $selected, 'headphones' ); ?>> headphones</option>
            <option value="heart" <?php selected( $selected, 'heart' ); ?>> heart</option>
            <option value="heartbeat" <?php selected( $selected, 'heartbeat' ); ?>> heartbeat</option>
            <option value="heart-o" <?php selected( $selected, 'heart-o' ); ?>> heart-o</option>
            <option value="home" <?php selected( $selected, 'home' ); ?>> home</option>
            <option value="hospital-o" <?php selected( $selected, 'hospital-o' ); ?>> hospital-o</option>
            <option value="hourglass" <?php selected( $selected, 'hourglass' ); ?>> hourglass</option>
            <option value="key" <?php selected( $selected, 'key' ); ?>> key</option>
            <option value="keyboard-o" <?php selected( $selected, 'keyboard-o' ); ?>> keyboard-o</option>
            <option value="laptop" <?php selected( $selected, 'laptop' ); ?>> laptop</option>  
            <option value="leaf" <?php selected( $selected, 'leaf' ); ?>> leaf</option>
            <option value="lightbulb-o" <?php selected( $selected, 'lightbulb-o' ); ?>> lightbulb-o</option>
            <option value="lock" <?php selected( $selected, 'lock' ); ?>> lock</option>
            <option value="magic" <?php selected( $selected, 'magic' ); ?>> magic</option>  
            <option value="magnet" <?php selected( $selected, 'magnet' ); ?>> magnet</option>
            <option value="male" <?php selected( $selected, 'male' ); ?>> male</option>
            <option value="map" <?php selected( $selected, 'map' ); ?>> map</option>
            <option value="map-marker" <?php selected( $selected, 'map-marker' ); ?>> map-marker</option>
            <option value="map-o" <?php selected( $selected, 'map-o' ); ?>> map-o</option>
            <option value="microphone" <?php selected( $selected, 'microphone' ); ?>> microphone</option>
            <option value="mobile" <?php selected( $selected, 'mobile' ); ?>> mobile</option>
            <option value="money" <?php selected( $selected, 'money' ); ?>> money</option>
            <option value="moon-o" <?php selected( $selected, 'moon-o' ); ?>> moon-o</option>
            <option value="motorcycle" <?php selected( $selected, 'motorcycle' ); ?>> motorcycle</option>
            <option value="music" <?php selected( $selected, 'music' ); ?>> music</option>
            <option value="newspaper-o" <?php selected( $selected, 'newspaper-o' ); ?>> newspaper-o</option>
            <option value="object-group" <?php selected( $selected, 'object-group' ); ?>> object-group</option>
            <option value="paint-brush" <?php selected( $selected, 'paint-brush' ); ?>> paint-brush</option>
            <option value="paper-plane" <?php selected( $selected, 'paper-plane' ); ?>> paper-plane</option>  
            <option value="paw" <?php selected( $selected, 'paw' ); ?>> paw</option>
            <option value="pencil" <?php selected( $selected, 'pencil' ); ?>> pencil</option>
            <option value="percent" <?php selected( $selected, 'percent' ); ?>> percent</option>
            <option value="phone" <?php selected( $selected, 'phone' ); ?>> phone</option>  
            <option value="pie-chart" <?php selected( $selected, 'pie-chart' ); ?>> pie-chart</option>
            <option value="plane" <?php selected( $selected, 'plane' ); ?>> plane</option>
            <option value="plug" <?php selected( $selected, 'plug' ); ?>> plug</option>
            <option value="plus" <?php selected( $selected, 'plus' ); ?>> plus</option>
            <option value="power-off" <?php selected( $selected, 'power-off' ); ?>> power-off</option>
            <option value="print" <?php selected( $selected, 'print' ); ?>> print</option>
            <option value="puzzle-piece" <?php selected( $selected, 'puzzle-piece' ); ?>> puzzle-piece</option>
            <option value="qrcode" <?php selected( $selected, 'qrcode' ); ?>> qrcode</option>
            <option value="question" <?php selected( $selected, 'question' ); ?>> question</option>
            <option value="quote-left" <?php selected( $selected, 'quote-left' ); ?>> quote-left</option>
            <option value="quote-right" <?php selected( $selected, 'quote-right' ); ?>> quote-right</option>
            <option value="random" <?php selected( $selected, 'random' ); ?>> random</option>
            <option value="recycle" <?php selected( $selected, 'recycle' ); ?>> recycle</option>
            <option value="refresh" <?php selected( $selected, 'refresh' ); ?>> refresh</option>                                                                  
            <option value="reply" <?php selected( $selected, 'reply' ); ?>> reply</option>
            <option value="reply-all" <?php selected( $selected, 'reply-all' ); ?>> reply-all</option>
            <option value="retweet" <?php selected( $selected, 'retweet' ); ?>> retweet</option>
            <option value="road" <?php selected( $selected, 'road' ); ?>> road</option>
            <option value="search" <?php selected( $selected, 'search' ); ?>> search</option>
            <option value="server" <?php selected( $selected, 'server' ); ?>> server</option>
            <option value="share" <?php selected( $selected, 'share' ); ?>> share</option>
            <option value="share-alt" <?php selected( $selected, 'share-alt' ); ?>> share-alt</option>
            <option value="shield" <?php selected( $selected, 'shield' ); ?>> shield</option>                                                                                  
            <option value="ship" <?php selected( $selected, 'ship' ); ?>> ship</option>
            <option value="shopping-bag" <?php selected( $selected, 'shopping-bag' ); ?>> shopping-bag</option>
            <option value="shopping-basket" <?php selected( $selected, 'shopping-basket' ); ?>> shopping-basket</option>
            <option value="shopping-cart" <?php selected( $selected, 'shopping-cart' ); ?>> shopping-cart</option>
            <option value="sign-in" <?php selected( $selected, 'sign-in' ); ?>> sign-in</option>
            <option value="sign-language" <?php selected( $selected, 'sign-language' ); ?>> sign-language</option>
            <option value="sign-out" <?php selected( $selected, 'sign-out' ); ?>> sign-out</option>
            <option value="signal" <?php selected( $selected, 'signal' ); ?>> signal</option>
            <option value="sitemap" <?php selected( $selected, 'sitemap' ); ?>> sitemap</option>
            <option value="sliders" <?php selected( $selected, 'sliders' ); ?>> sliders</option>                                                                  
            <option value="smile-o" <?php selected( $selected, 'smile-o' ); ?>> smile-o</option>
            <option value="soccer-ball-o" <?php selected( $selected, 'soccer-ball-o' ); ?>> soccer-ball-o</option>
            <option value="sort" <?php selected( $selected, 'sort' ); ?>> sort</option>
            <option value="sort-alpha-asc" <?php selected( $selected, 'sort-alpha-asc' ); ?>> sort-alpha-asc</option>
            <option value="sort-alpha-desc" <?php selected( $selected, 'sort-alpha-desc' ); ?>> sort-alpha-desc</option>
            <option value="space-shuttle" <?php selected( $selected, 'space-shuttle' ); ?>> space-shuttle</option>
            <option value="spinner" <?php selected( $selected, 'spinner' ); ?>> spinner</option>
            <option value="spoon" <?php selected( $selected, 'spoon' ); ?>> spoon</option>
            <option value="square" <?php selected( $selected, 'square' ); ?>> square</option>    
            <option value="square-o" <?php selected( $selected, 'square-o' ); ?>> square-o</option>                                                                  
            <option value="star" <?php selected( $selected, 'star' ); ?>> star</option>
            <option value="star-o" <?php selected( $selected, 'star-o' ); ?>> star-o</option>
            <option value="sticky-note" <?php selected( $selected, 'sticky-note' ); ?>> sticky-note</option>
            <option value="sticky-note-o" <?php selected( $selected, 'sticky-note-o' ); ?>> sticky-note-o</option>
            <option value="street-view" <?php selected( $selected, 'street-view' ); ?>> street-view</option>
            <option value="subway" <?php selected( $selected, 'subway' ); ?>> subway</option>
            <option value="suitcase" <?php selected( $selected, 'suitcase' ); ?>> suitcase</option>
            <option value="sun-o" <?php selected( $selected, 'sun-o' ); ?>> sun-o</option>
            <option value="support" <?php selected( $selected, 'support' ); ?>> support</option>
            <option value="tablet" <?php selected( $selected, 'tablet' ); ?>> tablet</option>    
            <option value="tag" <?php selected( $selected, 'tag' ); ?>> tag</option>                                                                  
            <option value="tags" <?php selected( $selected, 'tags' ); ?>> tags</option>
            <option value="tasks" <?php selected( $selected, 'tasks' ); ?>> tasks</option>
            <option value="television" <?php selected( $selected, 'television' ); ?>> television</option>
            <option value="thumb-tack" <?php selected( $selected, 'thumb-tack' ); ?>> thumb-tack</option>                                                                  
            <option value="thumbs-down" <?php selected( $selected, 'thumbs-down' ); ?>> thumbs-down</option>
            <option value="thumbs-up" <?php selected( $selected, 'thumbs-up' ); ?>> thumbs-up</option>
            <option value="thumbs-o-down" <?php selected( $selected, 'thumbs-o-down' ); ?>> thumbs-o-down</option>
            <option value="thumbs-o-up" <?php selected( $selected, 'thumbs-o-up' ); ?>> thumbs-o-up</option>
            <option value="tint" <?php selected( $selected, 'tint' ); ?>> tint</option>
            <option value="toggle-off" <?php selected( $selected, 'toggle-off' ); ?>> toggle-off</option>
            <option value="toggle-on" <?php selected( $selected, 'toggle-on' ); ?>> toggle-on</option>
            <option value="trademark" <?php selected( $selected, 'trademark' ); ?>> trademark</option>
            <option value="train" <?php selected( $selected, 'train' ); ?>> train</option>
            <option value="trash" <?php selected( $selected, 'trash' ); ?>> trash</option>    
            <option value="trash-o" <?php selected( $selected, 'trash-o' ); ?>> trash-o</option>
            <option value="tree" <?php selected( $selected, 'tree' ); ?>> tree</option>
            <option value="trophy" <?php selected( $selected, 'trophy' ); ?>> trophy</option>    
            <option value="truck" <?php selected( $selected, 'truck' ); ?>> truck</option>                                                                  
            <option value="tty" <?php selected( $selected, 'tty' ); ?>> tty</option>
            <option value="umbrella" <?php selected( $selected, 'umbrella' ); ?>> umbrella</option>
            <option value="universal-access" <?php selected( $selected, 'universal-access' ); ?>> universal-access</option>
            <option value="university" <?php selected( $selected, 'university' ); ?>> university</option>
            <option value="unlock" <?php selected( $selected, 'unlock' ); ?>> unlock</option>
            <option value="unlock-alt" <?php selected( $selected, 'unlock-alt' ); ?>> unlock-alt</option>
            <option value="upload" <?php selected( $selected, 'upload' ); ?>> upload</option>
            <option value="user" <?php selected( $selected, 'user' ); ?>> user</option>
            <option value="users" <?php selected( $selected, 'users' ); ?>> users</option>
            <option value="video-camera" <?php selected( $selected, 'video-camera' ); ?>> video-camera</option>
            <option value="volume-control-phone" <?php selected( $selected, 'volume-control-phone' ); ?>> volume-control-phone</option>
            <option value="volume-down" <?php selected( $selected, 'volume-down' ); ?>> volume-down</option>
            <option value="volume-off" <?php selected( $selected, 'volume-off' ); ?>> volume-off</option>
            <option value="volume-up" <?php selected( $selected, 'volume-up' ); ?>> volume-up</option>
            <option value="warning" <?php selected( $selected, 'warning' ); ?>> warning</option>
            <option value="wheelchair" <?php selected( $selected, 'wheelchair' ); ?>> wheelchair</option>
            <option value="wheelchair-alt" <?php selected( $selected, 'wheelchair-alt' ); ?>> wheelchair-alt</option>
            <option value="wifi" <?php selected( $selected, 'wifi' ); ?>> wifi</option> 
            <option value="wrench" <?php selected( $selected, 'wrench' ); ?>> wrench</option>
            </select>
            </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'text' ); ?>"><?php _e( 'Text:' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" rows="16" cols="20"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php // Merge the user-selected arguments with the defaults
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
        <script type='text/javascript'>
            jQuery(document).ready(function($) {
                $('.my-color-picker').wpColorPicker();
            });
        </script>
        <p>
            <label for="<?php echo $this->get_field_id( 'icon_color' ); ?>">Icon Color</label>
            <br />
            <input class="my-color-picker" type="text" id="<?php echo $this->get_field_id( 'icon_color' ); ?>" name="<?php echo $this->get_field_name( 'icon_color' ); ?>" value="<?php echo esc_attr( $instance['icon_color'] ); ?>" />                            
        </p>

    <?php
    }
}
?>