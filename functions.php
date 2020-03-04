<?php
require 'customizer.php';
show_admin_bar( false );
add_theme_support( 'post-thumbnails' );

function enqueue_style() {
    wp_enqueue_style('style', get_bloginfo('template_url') . '/style.css');
    wp_enqueue_style('hamburger', get_bloginfo('template_url') . '/css/hamburger.css');

    wp_enqueue_script( 'jquery' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_style' );

function google_fonts() {
    wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,900&display=swap');
    wp_enqueue_style( 'googleFonts');
}
add_action('wp_print_styles', 'google_fonts');

function register_menus() {
    register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_menus' );

function register_posttypes() {

    register_post_type( 'features',
        array(
            'labels' => array(
                'name' => __( 'Features' ),
                'singular_name' => __( 'Feature' )
            ),
            'public' => true,
            'menu_icon' => 'dashicons-star-filled',
            'has_archive' => true,
            'rewrite' => array('slug' => 'features'),
            'supports' => array( 'title', 'editor', 'thumbnail' ),
        )
    );

    register_post_type( 'plans',
        array(
            'labels' => array(
                'name' => __( 'Plans' ),
                'singular_name' => __( 'Plan' )
            ),
            'public' => true,
            'menu_icon' => 'dashicons-money',
            'has_archive' => true,
            'rewrite' => array('slug' => 'plans'),
            'supports' => array( 'title', 'editor' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'register_posttypes' );

function plans_metaboxes() {
    add_meta_box(
        'plans_meta_box',
        'Plan details',
        'show_plans_meta_box',
        'plans',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'plans_metaboxes' );


function show_plans_meta_box( $post ){
    // make sure the form request comes from WordPress
    wp_nonce_field( basename( __FILE__ ), 'plans_meta_box_nonce' );

    // retrieve the _food_cholesterol current value
    $cur_price = get_post_meta( $post->ID, '_plan_price', true );
    $cur_cta = get_post_meta( $post->ID, '_plan_cta', true );
    $cur_cta_url = get_post_meta( $post->ID, '_plan_cta_url', true );

    ?>
    <div class='inside'>
        <h3>Price</h3>
        <p>
            <input type="text" name="price" class="widefat" value="<?php echo $cur_price; ?>" />
        </p>

        <h3>CTA text</h3>
        <p>
            <input type="text" name="cta" class="widefat" value="<?php echo $cur_cta; ?>" />
        </p>

        <h3>CTA url</h3>
        <p>
            <input type="text" name="cta_url" class="widefat" value="<?php echo $cur_cta_url; ?>" />
        </p>
    </div>
    <?php
}

function plans_save_meta_box( $post_id ){
    // verify taxonomies meta box nonce
    if ( !isset( $_POST['plans_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['plans_meta_box_nonce'], basename( __FILE__ ) ) ){
        return;
    }

    // return if autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
        return;
    }

    // Check the user's permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ){
        return;
    }

    // store custom fields values
    if ( isset( $_REQUEST['price'] ) ) {
        update_post_meta( $post_id, '_plan_price', sanitize_text_field( $_POST['price'] ) );
    }

    if ( isset( $_REQUEST['cta'] ) ) {
        update_post_meta( $post_id, '_plan_cta', sanitize_text_field( $_POST['cta'] ) );
    }

    if ( isset( $_REQUEST['cta_url'] ) ) {
        update_post_meta( $post_id, '_plan_cta_url', sanitize_text_field( $_POST['cta_url'] ) );
    }
}
add_action( 'save_post', 'plans_save_meta_box' );