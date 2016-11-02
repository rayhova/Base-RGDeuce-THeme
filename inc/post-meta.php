<?php 

// Team Members Meta Boxes
add_action( 'add_meta_boxes', 'rgdeuce_team_meta_box_add' );
/* Save post meta on the 'save_post' hook. */
  

function rgdeuce_team_meta_box_add()
{
    add_meta_box(
        'custom_meta_box', // $id
        'Team Member Details', // $title 
        'team_members_meta_box', // $callback
        'team-members', // $page
        'normal', // $context
        'high'); // $priority
}
/**
 * Outputs the content of the meta box
 */
function team_members_meta_box( $post ) {
	global $post;
    $values = get_post_meta( $post->ID );
    //$rgdeuce_stored_meta = get_post_meta( $post->ID );
    $team_title = isset( $values['team_title-text'] ) ? esc_attr( $values['team_title-text'] [0]): '';
    $team_phone = isset( $values['team_phone-text'] ) ? esc_attr($values['team_phone-text'] [0]): '';
    $team_email = isset( $values['team_email-text'] ) ? esc_attr($values['team_email-text'] [0]): '';
    $team_fb = isset( $values['team_fb-text'] ) ? esc_attr( $values['team_fb-text'] [0]): '';
    $team_twit = isset( $values['team_twit-text'] ) ? esc_attr($values['team_twit-text'] [0]): '';
    $team_ig = isset( $values['team_ig-text'] ) ? esc_attr($values['team_ig-text'] [0]): '';
    $team_li = isset( $values['team_li-text'] ) ? esc_attr($values['team_li-text'] [0]): '';
    $team_url = isset( $values['team_url-text'] ) ? esc_attr($values['team_url-text'] [0]): '';
    
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
 
    <p>
        <label for="team_title-text" class="rgdeuce-row-title">Job Title</label>
        <input type="text" name="team_title-text" id="team_title-text" value= "<?php echo $team_title; ?>" />
    </p>
    <p>
        <label for="meta-text" class="rgdeuce-row-title">Telephone</label>
        <input type="text" name="team_phone-text" id="team_phone-text" value="<?php echo $team_phone; ?>" />
    </p>
    <p>
        <label for="meta-text" class="rgdeuce-row-title">Email Address</label>
        <input type="text" name="team_email-text" id="team_email-text" value="<?php echo $team_email; ?>" />
    </p>
    <p><strong>Social & Other</strong><br />
        <label for="meta-text" class="rgdeuce-row-title">Facebook</label>
        <input type="text" name="team_fb-text" id="team_fb-text" value="<?php echo $team_fb; ?>" />
    </p>
    <p>
        <label for="meta-text" class="rgdeuce-row-title">Twitter</label>
        <input type="text" name="team_twit-text" id="team_twit-text" value="<?php echo $team_twit; ?>" />
    </p>
     <p>
        <label for="meta-text" class="rgdeuce-row-title">Instagram</label>
        <input type="text" name="team_ig-text" id="team_ig-text" value="<?php echo $team_ig; ?>" />
    </p>
    <p>
        <label for="meta-text" class="rgdeuce-row-title">Linked In</label>
        <input type="text" name="team_li-text" id="team_li-text" value="<?php echo $team_li; ?>" />
    </p>
    <p>
        <label for="meta-text" class="rgdeuce-row-title">URL</label>
        <input type="text" name="team_url-text" id="team_url-text" value="<?php echo $team_url; ?>" />
    </p>
     <?php
}
/* Save the meta box's post metadata. */
add_action( 'save_post', 'rgdeuce_team_box_save' );
function rgdeuce_team_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_posts' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['team_title-text'] ) )
        update_post_meta( $post_id, 'team_title-text', wp_kses( $_POST['team_title-text'], $allowed ) );
         
    if( isset( $_POST['team_phone-text'] ) )
        update_post_meta( $post_id, 'team_phone-text', esc_attr( $_POST['team_phone-text'] ) );

    if( isset( $_POST['team_email-text'] ) )
        update_post_meta( $post_id, 'team_email-text', esc_attr( $_POST['team_email-text'] ) );

    if( isset( $_POST['team_fb-text'] ) )
        update_post_meta( $post_id, 'team_fb-text', esc_attr( $_POST['team_fb-text'] ) );
         
    if( isset( $_POST['team_twit-text'] ) )
        update_post_meta( $post_id, 'team_twit-text', esc_attr( $_POST['team_twit-text'] ) );

    if( isset( $_POST['team_ig-text'] ) )
        update_post_meta( $post_id, 'team_ig-text', esc_attr( $_POST['team_ig-text'] ) );

    if( isset( $_POST['team_li-text'] ) )
        update_post_meta( $post_id, 'team_li-text', esc_attr( $_POST['team_li-text'] ) );

    if( isset( $_POST['team_url-text'] ) )
        update_post_meta( $post_id, 'team_url-text', esc_attr( $_POST['team_url-text'] ) );
}


// Normal Pages Meta Boxes
add_action( 'add_meta_boxes', 'rgdeuce_page_meta_box_add' );

function rgdeuce_page_meta_box_add()
{
    add_meta_box(
        'custom_meta_box', // $id
        'RGDeuce Page Options', // $title 
        'page_meta_box', // $callback
        'page', // $page
        'normal', // $context
        'high'); // $priority
}
/**
 * Outputs the content of the meta box
 */
function page_meta_box( $post ) {
	global $post; 
    $rgdeuce_stored_meta = get_post_meta( $post->ID );
    $selected = isset( $rgdeuce_stored_meta['my_sidebar_select'] ) ? esc_attr( $rgdeuce_stored_meta['my_sidebar_select'][0] ) : '';
    wp_nonce_field( 'my_meta_page_box_nonce', 'meta_page_box_nonce' );
    ?>
  <p>
    <label for="meta-image" class="rgdeuce-row-title">Title Background</label>
    <input type="text" name="meta-image" id="meta-image" value="<?php if ( isset ( $rgdeuce_stored_meta['meta-image'] ) ) echo $rgdeuce_stored_meta['meta-image'][0]; ?>" />
    <input type="button" id="meta-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'rgdeuce-textdomain' )?>" />
</p> 
<p>
   <label for="my_sidebar_select">Sidebar Position</label>
        <select name="my_sidebar_select" id="my_sidebar_select">
            <option value="no-sidebar" <?php selected( $selected, 'no-sidebar' ); ?>>No Sidebar</option>
            <option value="left-sidebar" <?php selected( $selected, 'left-sidebar' ); ?>>Left Sidebar</option>
            <option value="right-sidebar" <?php selected( $selected, 'right-sidebar' ); ?>>Right Sidebar</option>
        </select>
</p>
<?php
}

/**
 * Loads the image management javascript
 */
function rgdeuce_image_enqueue() {
    global $typenow;
    if( $typenow == 'page' ) {
        wp_enqueue_media();
 
        // Registers and enqueues the required javascript.
        wp_register_script( 'meta-box-image', get_template_directory_uri() . '/js/meta-box-image.js', array( 'jquery' ) );
        wp_localize_script( 'meta-box-image', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'rgdeuce-textdomain' ),
                'button' => __( 'Use this image', 'rgdeuce-textdomain' ),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
    }
}
add_action( 'admin_enqueue_scripts', 'rgdeuce_image_enqueue' );
add_action( 'save_post', 'rgdeuce_page_box_save' );
function rgdeuce_page_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_page_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_page_box_nonce'], 'my_meta_page_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_posts' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Checks for input and saves if needed
if( isset( $_POST[ 'meta-image' ] ) ) {
    update_post_meta( $post_id, 'meta-image', $_POST[ 'meta-image' ] );
}
// Checks for input and saves if needed
if( isset( $_POST['my_sidebar_select'] ) ){
        update_post_meta( $post_id, 'my_sidebar_select', esc_attr( $_POST['my_sidebar_select'] ) );
}
}



// Services Post Type Meta Boxes

// Team Members Meta Boxes
add_action( 'add_meta_boxes', 'services_meta_box_add' );
/* Save post meta on the 'save_post' hook. */
  

function services_meta_box_add()
{
    add_meta_box(
        'services_meta_box', // $id
        'Service Details', // $title 
        'services_meta_box', // $callback
        'services', // $page
        'normal', // $context
        'high'); // $priority
}
/**
 * Outputs the content of the meta box
 */
function services_meta_box( $post ) {
	global $post;
    $services_stored_meta = get_post_meta( $post->ID );
    $selected = isset( $services_stored_meta['services_icon_select'] ) ? esc_attr( $services_stored_meta['services_icon_select'][0] ) : '';
    
    
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <label for="services_icon_select">Icon</label>
        <select name="services_icon_select" id="services_icon_select" style="font-family: 'FontAwesome', Arial;">
            <option value="anchor" <?php selected( $selected, 'anchor' ); ?>> Anchor</option>
            <option value="archive" <?php selected( $selected, 'archive' ); ?>> archive</option>
            <option value="arrows" <?php selected( $selected, 'arrows	' ); ?>> arrows</option>
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
 
    
     <?php
}
/* Save the meta box's post metadata. */
add_action( 'save_post', 'services_meta_box_save' );
function services_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_posts' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Checks for input and saves if needed
if( isset( $_POST['services_icon_select'] ) ){
        update_post_meta( $post_id, 'services_icon_select', esc_attr( $_POST['services_icon_select'] ) );
	}
}

// Testimonial Meta Boxes
add_action( 'add_meta_boxes', 'rgdeuce_testimonial_meta_box_add' );
/* Save post meta on the 'save_post' hook. */
  

function rgdeuce_testimonial_meta_box_add()
{
    add_meta_box(
        'testimonials_meta_box', // $id
        'Testimonial Details', // $title 
        'testimonials_meta_box', // $callback
        'testimonials', // $page
        'normal', // $context
        'high'); // $priority
}
/**
 * Outputs the content of the meta box
 */
function testimonials_meta_box( $post ) {
	global $post;
    $values = get_post_meta( $post->ID );
    //$rgdeuce_stored_meta = get_post_meta( $post->ID );
    $testimonial_author = isset( $values['testimonial_author'] ) ? esc_attr( $values['testimonial_author'] [0]): '';
   
    
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
 
    <p>
        <label for="testimonial_author" class="rgdeuce-row-title">Testimonial Author</label>
        <input type="text" name="testimonial_author" id="testimonial_author" value= "<?php echo $testimonial_author; ?>" />
    </p>
    
     <?php
}
/* Save the meta box's post metadata. */
add_action( 'save_post', 'testimonials_meta_box_save' );
function testimonials_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_posts' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['testimonial_author'] ) )
        update_post_meta( $post_id, 'testimonial_author', wp_kses( $_POST['testimonial_author'], $allowed ) );
         
    }
