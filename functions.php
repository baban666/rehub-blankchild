<?php

define(CHILD_URI, get_stylesheet_directory_uri());

add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );
function enqueue_parent_theme_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'custom-parent-style', get_stylesheet_directory_uri().'/build/css/style.css', array(), 1 );
        wp_enqueue_style( 'custom-parent-anim', get_stylesheet_directory_uri().'/build/css/animate.css', array(), 1 );
    
    wp_enqueue_script( 'custom-parent-script', get_stylesheet_directory_uri().'/build/js/custom.js', array(), 1, true );


	if (is_rtl()) {
		 wp_enqueue_style( 'parent-rtl', get_template_directory_uri().'/rtl.css', array(), RH_MAIN_THEME_VERSION);
	}     
}


add_action( 'after_setup_theme', function(){
    register_nav_menus( [
        'header_menu' => 'Menu grid',
        'footer_menu' => 'Menu footer'
    ] );
} );


//if ( file_exists( get_stylesheet_directory() . '/helpers/Omega_Walker.php' ) ) {
//    require_once ( get_stylesheet_directory().'/helpers/Omega_Walker.php');
//}


function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>',  $args->link_after . '</a>'. '<div class="menu-item-description">' . $item->description . '</div>' , $item_output );
    }

    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );


function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');