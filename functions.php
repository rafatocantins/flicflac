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

/** Register scripts for my theme */

/** Require wp-load */


function flictheme_enqueue_scripts(){
   wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
   wp_enqueue_style( 'style', get_stylesheet_uri() );
   wp_enqueue_script("jquery");
   wp_enqueue_script( 'boot', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ),'',true );
   wp_enqueue_script('vue', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js', [], '2.6.10');
   wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0', true);
}

add_action( 'wp_enqueue_scripts', 'flictheme_enqueue_scripts', PHP_INT_MAX );



// programmatically create some basic pages, and then set Home and about
// setup a function to check if these pages exist
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
    $about_page_title = 'About';
    $about_page_content = 'This is about page placeholder. Anything you enter here will not appear in the front end, except for search results pages.';
    $about_page_check = get_page_by_title($about_page_title);
    $about_page = array(
	    'post_type' => 'page',
	    'post_title' => $about_page_title,
	    'post_content' => $about_page_content,
	    'post_status' => 'publish',
	    'post_author' => 1,
	    'post_slug' => 'about'
    );
    if(!isset($about_page_check->ID) && !the_slug_exists('about')){
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
    $blog_page_title = 'Blog';
    $blog_page_check = get_page_by_title($blog_page_title);
    $blog_page = array(
	    'post_type' => 'page',
	    'post_title' => $blog_page_title,
	    'post_status' => 'publish',
	    'post_author' => 1,
	    'post_slug' => 'estudio'
    );
    if(!isset($blog_page_check->ID) && !the_slug_exists('blog')){
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
	$blog = get_page_by_title( 'blog' );
	update_option( 'page_for_posts', $blog->ID );

	// Use a static front page
	$front_page = 2; // this is the default page created by WordPress
	update_option( 'page_on_front', $front_page );
	update_option( 'show_on_front', 'page' );
}


/** Register Menus  */

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

// Setting up theme logo with custom size

function flictheme_logo_setup() {
	
	add_theme_support( 'custom-logo', array(
		'width'       => 100,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'flictheme_logo_setup' );
