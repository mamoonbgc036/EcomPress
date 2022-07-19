<?php 

require get_theme_file_path( 'inc/product_search_route.php' );


function xpent_style_and_scripts() {
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/css/font-awesome.min.css' ), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'jquery-ui-css', get_theme_file_uri( 'css/jquery-ui.css' ), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'magnific-popup', get_theme_file_uri( 'css/magnific-popup.css' ), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'fotorama-css', get_template_directory_uri() . '/css/fotorama.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'custom-css', get_theme_file_uri( 'css/custom.css' ), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'responsive', get_theme_file_uri( 'css/responsive.css' ), array(), wp_get_theme()->get( 'Version' ) );


	wp_enqueue_script( 'my-jquery', get_theme_file_uri( 'js/jquery-1.12.3.min.js' ), array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'fotorama', get_template_directory_uri() . '/js/fotorama.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'jquery-magnify', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), wp_get_theme()->get( 'Version' ), true );

}

add_action( 'wp_enqueue_scripts', 'xpent_style_and_scripts' );


// GIVE CLIENT TO HAVE CUSTOM LOGO

add_theme_support( 'custom-logo' );


//LOGOUT TO HOME PAGE

$user = wp_get_current_user();

if( $user->roles[0] == 'customer' ) {
	add_action( 'wp_logout', 'auto_redirect_after_logout' );
}

function auto_redirect_after_logout() {
	wp_safe_redirect( home_url() );
  	exit;
}
