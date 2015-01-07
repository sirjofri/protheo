<?php
// Run Setup function
function protheo_setup() {

}

function custom_theme_setup() {

add_theme_support("html5", array("search-form","comment-form","comment-list","gallery","caption"));
add_theme_support("custom-background");
add_theme_support("custom-header");

// Register main menu
function register_my_menu() {
	register_nav_menu('header-menu',__( "Hauptmenu" ));
}
add_action( 'init', 'register_my_menu' );

}
add_action( "after_setup_theme", "custom_theme_setup");

?>
