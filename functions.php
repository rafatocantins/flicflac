<?php
/**
 * Flic Flac Functions 
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Flic Flac
 * @since 1.0
 */

/**
 * Flic Flac works with wordpress 4.7 ou >
 */

/** Require wp-load */

/* Remember remember to add translations after everything __('text', 'flictheme') */

/***************************************************************************** 
 * Register scripts for my theme
*****************************************************************************/


function flictheme_enqueue_scripts(){
   wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
   wp_enqueue_script("jquery");
   wp_enqueue_script( 'boot', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ),'',true );
   wp_enqueue_script( 'smoothstate', get_template_directory_uri() . '/assets/js/jquery.smoothState.js', array( 'jquery'), null, true );
   wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'smoothstate' ), '1.0.0' );
   wp_enqueue_style( 'style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'flictheme_enqueue_scripts', PHP_INT_MAX );


/***************************************************************************** 
 * create pages, and then set front-page and blog
*****************************************************************************/

// setup a function to check if these slugs exist
function the_slug_exists($post_name) {
	global $wpdb;
	if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
		return true;
	} else {
		return false;
	}
}

// create the about page

if (isset($_GET['activated']) && is_admin()){
    $about_page_title = 'Quem Somos';
    $about_page_content = 'This is about page placeholder. Anything you enter here will not appear in the front end, except for search results pages.';
    $about_page_check = get_page_by_title($about_page_title);
    $about_page = array(
	    'post_type' => 'page',
	    'post_title' => $about_page_title,
	    'post_content' => $about_page_content,
	    'post_status' => 'publish',
	    'post_author' => 1,
	    'post_slug' => 'quem-somos'
    );
    if(!isset($about_page_check->ID) && !the_slug_exists('quem-somos')){
        $about_page_id = wp_insert_post($about_page);
    }
}
// create the estudio page

if (isset($_GET['activated']) && is_admin()){
    $estudio_page_title = 'Estudio';
    $estudio_page_check = get_page_by_title($estudio_page_title);
    $estudio_page = array(
	    'post_type' => 'page',
	    'post_title' => $estudio_page_title,
	    'post_status' => 'publish',
	    'post_author' => 1,
	    'post_slug' => 'estudio'
    );
    if(!isset($estudio_page_check->ID) && !the_slug_exists('estudio')){
        $estudio_page_id = wp_insert_post($estudio_page);
    }
}

// create the Blog page

if (isset($_GET['activated']) && is_admin()){
    $blog_page_title = 'Noticias';
    $blog_page_check = get_page_by_title($blog_page_title);
    $blog_page = array(
	    'post_type' => 'page',
	    'post_title' => $blog_page_title,
	    'post_status' => 'publish',
	    'post_author' => 1,
	    'post_slug' => 'noticias'
    );
    if(!isset($blog_page_check->ID) && !the_slug_exists('noticias')){
        $blog_page_id = wp_insert_post($blog_page);
    }
}

// create the companhia page

if (isset($_GET['activated']) && is_admin()){
    $companhia_page_title = 'Companhia';
    $companhia_page_check = get_page_by_title($companhia_page_title);
    $companhia_page = array(
	    'post_type' => 'page',
	    'post_title' => $companhia_page_title,
	    'post_status' => 'publish',
	    'post_author' => 1,
	    'post_slug' => 'companhia'
    );
    if(!isset($companhia_page_check->ID) && !the_slug_exists('companhia')){
        $companhia_page_id = wp_insert_post($companhia_page);
    }
}
// create the Contactos page

if (isset($_GET['activated']) && is_admin()){
    $contactos_page_title = 'Contactos';
    $contactos_page_check = get_page_by_title($companhia_page_title);
    $contactos_page = array(
	    'post_type' => 'page',
	    'post_title' => $contactos_page_title,
	    'post_status' => 'publish',
	    'post_author' => 1,
	    'post_slug' => 'contactos'
    );
    if(!isset($contactos_page_check->ID) && !the_slug_exists('contactos')){
        $contactos_page_id = wp_insert_post($contactos_page);
    }
}
// change the Sample page to the home page

if (isset($_GET['activated']) && is_admin()){
    $home_page_title = 'Home';
    $home_page_content = '';
    $home_page_check = get_page_by_title($home_page_title);
    $home_page = array(
	    'post_type' => 'page',
	    'post_title' => $home_page_title,
	    'post_content' => $home_page_content,
	    'post_status' => 'publish',
	    'post_author' => 1,
	    'ID' => 2,
	    'post_slug' => 'home'
    );
    if(!isset($home_page_check->ID) && !the_slug_exists('home')){
        $home_page_id = wp_insert_post($home_page);
    }
}
if (isset($_GET['activated']) && is_admin()){
    // Set the blog page
    
	$blog = get_page_by_title( 'noticias' );
	update_option( 'page_for_posts', $blog->ID );

    // Use a static front page
    
	$front_page = 2; // this is the default page created by WordPress
	update_option( 'page_on_front', $front_page );
	update_option( 'show_on_front', 'page' );
}


/***************************************************************************** 
 *  Register Menus
*****************************************************************************/

function flictheme_register_menu() {
    register_nav_menus(
        array(
            'top-menu' => __('Top Menu'),
            'sidebar-menu' => __('Sidebar Menu'),
            'footer-menu' => __('Footer Menu')
        )
    );
}

add_action('init', 'flictheme_register_menu');



/***************************************************************************** 
 *  Add Customization to Pages
*****************************************************************************/


// Setting up theme logo with custom size

function flictheme_logo_setup() {
	
	add_theme_support( 'custom-logo', array(
		'width'       => 100,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'flictheme_logo_setup' );

/* -------------------------------------------------------- */

// Defining General Settings to change in Customize

function flictheme_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here
    $wp_customize->add_setting( 'header_textcolor' , array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_section( 'flictheme_section_header' , array(
        'title'      => __( 'Header', 'flictheme' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'      => __( 'Link Color', 'flictheme' ),
        'section'    => 'flictheme_section_header',
        'settings'   => 'header_textcolor',
    ) ) );
 }
 add_action( 'customize_register', 'flictheme_customize_register' );

 /* -------------------------------------------------------- */

 // Function to add to styles

 function flictheme_customize_css()
{
    ?>
         <style type="text/css">
             li.menu-item a { color: <?php echo '#' . get_theme_mod('header_textcolor', '#000000'); ?>; }
         </style>
    <?php
}
add_action( 'wp_head', 'flictheme_customize_css', 10);

/* -------------------------------------------------------- */


// add video to custom-header

add_theme_support( 'custom-header', array(
    'video' => true
) );

add_filter( 'is_header_video_active', 'custom_video_header_pages' );

// Add video only to front-page

function custom_video_header_pages( $active ) {
  if( is_home() || is_front_page() ) {
    return true;
  }

  return false;
}


/* -------------------------------------------------------- */

// Customize Front-Page

function flictheme_front_callout($wp_customize) {

    // Add Header Title

    $wp_customize->add_section( 'flictheme-front-callout-section', array(
        'title' => 'Página de Entrada',
    ));

    $wp_customize->add_setting( 'flictheme-front-callout-headline', array(
        'default' => 'Welcome to Home',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'flictheme-front-callout-headline-control', array(
        'label' => 'Header Página de Entrada',
        'section' => 'flictheme-front-callout-section',
        'settings' => 'flictheme-front-callout-headline'
    )));
}

add_action('customize_register', 'flictheme_front_callout');

/* -------------------------------------------------------- */

// Customize about page

function flictheme_about_callout($wp_customize) {

    // Add Header Title

    $wp_customize->add_section( 'flictheme-about-callout-section', array(
        'title' => 'Página Quem Somos'
    ));

    $wp_customize->add_setting( 'flictheme-about-callout-headline', array(
        'default' => 'Welcome to page about',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'flictheme-about-callout-headline-control', array(
        'label' => 'Header Quem Somos',
        'section' => 'flictheme-about-callout-section',
        'settings' => 'flictheme-about-callout-headline'
    )));
}

add_action('customize_register', 'flictheme_about_callout');

/* -------------------------------------------------------- */

// Customize Estudio page

function flictheme_studio_callout($wp_customize) {

    // Add Header Title 

    $wp_customize->add_section( 'flictheme-studio-callout-section', array(
        'title' => 'Página Estudio'
    ));

    $wp_customize->add_setting( 'flictheme-studio-callout-headline', array(
        'default' => 'Welcome to page Studio',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'flictheme-studio-callout-headline-control', array(
        'label' => 'Header Estudio',
        'section' => 'flictheme-studio-callout-section',
        'settings' => 'flictheme-studio-callout-headline'
    )));
}

add_action('customize_register', 'flictheme_studio_callout');

/* -------------------------------------------------------- */

// Customize Companhia page

function flictheme_company_callout($wp_customize) {

    // Add Header Title 

    $wp_customize->add_section( 'flictheme-company-callout-section', array(
        'title' => 'Página Companhia'
    ));

    $wp_customize->add_setting( 'flictheme-company-callout-headline', array(
        'default' => 'Welcome to Company Page',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'flictheme-company-callout-headline-control', array(
        'label' => 'Header Companhia',
        'section' => 'flictheme-company-callout-section',
        'settings' => 'flictheme-company-callout-headline'
    )));
}

add_action('customize_register', 'flictheme_company_callout');

/* -------------------------------------------------------- */


