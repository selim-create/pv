<?php
// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
// Disables the block editor from managing widgets.
add_filter('use_widgets_block_editor', '__return_false');

require_once 'inc/currency-graph-helper.php';

function piyasavizyon() {
wp_enqueue_style('my-theme-extra-style', get_theme_file_uri('piyasavizyon.css') );
}

add_action( 'wp_enqueue_scripts', 'piyasavizyon', 99 );


function birfinansstyle() {
wp_enqueue_style('mainstyle', get_theme_file_uri('css/style.css') );
}
add_action( 'wp_enqueue_scripts', 'birfinansstyle', 98 );


function ns_register_piyasavizyon_footer_widget() {
	register_sidebar( array(
		'name'          => 'Footer Abone Ol!',
		'id'            => 'piyasavizyon_footer_widget',
		'description'   => '<b>Abone ol</b>',
		'before_widget' => '<div id="%1$s" class="footer-aboneol">',
		'after_widget'  => '</div>',
		'before_sidebar'=> '<div id="footer-aboneol-bar">',
		'after_sidebar'=> '</div>',
	) );
}
add_action( 'widgets_init', 'ns_register_piyasavizyon_footer_widget' );

function ns_register_piyasavizyon_copyright_widget() {
	register_sidebar( array(
		'name'          => 'Copyright Widget',
		'id'            => 'piyasavizyon_copyright_widget',
		'description'   => '<b>Abone ol</b>',
		'before_widget' => '<div id="%1$s" class="piyasavizyon_copyright">',
		'after_widget'  => '</div>',
		'before_sidebar'=> '<div id="piyasavizyon_copyright-bar">',
		'after_sidebar'=> '</div>',
	) );
}
add_action( 'widgets_init', 'ns_register_piyasavizyon_copyright_widget' );



function ns_register_piyasavizyon_home_widget() {
	register_sidebar( array(
		'name'          => 'Home Widget',
		'id'            => 'piyasavizyon_home_widget',
		'description'   => '<b>Anasayfa Sol Widget</b>',
		'before_widget' => '<div id="%1$s" class="piyasavizyon_home">',
		'after_widget'  => '</div>',
		'before_sidebar'=> '<div id="piyasavizyon_home-bar">',
		'after_sidebar'=> '</div>',
	) );
}
add_action( 'widgets_init', 'ns_register_piyasavizyon_home_widget' );

function ns_register_piyasavizyon_homesag_widget() {
	register_sidebar( array(
		'name'          => 'Home Sağ Widget',
		'id'            => 'piyasavizyon_homesag_widget',
		'description'   => '<b>Anasayfa Sağ Widget</b>',
		'before_widget' => '<div id="%1$s" class="piyasavizyon_homesag">',
		'after_widget'  => '</div>',
		'before_sidebar'=> '<div id="piyasavizyon_homesag-bar">',
		'after_sidebar'=> '</div>',
	) );
}
add_action( 'widgets_init', 'ns_register_piyasavizyon_homesag_widget' );

function ns_register_piyasavizyon_footer1_widget() {
	register_sidebar( array(
		'name'          => 'Footer 1 Widget',
		'id'            => 'piyasavizyon_footer1_widget',
		'description'   => '<b>Footer 1 Widget</b>',
		'before_widget' => '<div id="%1$s" class="piyasavizyon_footer1">',
		'after_widget'  => '</div>',
		'before_sidebar'=> '<div id="piyasavizyon_footer1-bar">',
		'after_sidebar'=> '</div>',
	) );
}
add_action( 'widgets_init', 'ns_register_piyasavizyon_footer1_widget' );

function ns_register_piyasavizyon_footer2_widget() {
	register_sidebar( array(
		'name'          => 'Footer 2 Widget',
		'id'            => 'piyasavizyon_footer2_widget',
		'description'   => '<b>Footer 2 Widget</b>',
		'before_widget' => '<div id="%1$s" class="piyasavizyon_footer2">',
		'after_widget'  => '</div>',
		'before_sidebar'=> '<div id="piyasavizyon_footer2-bar">',
		'after_sidebar'=> '</div>',
	) );
}
add_action( 'widgets_init', 'ns_register_piyasavizyon_footer2_widget' );

function ns_register_piyasavizyon_footer3_widget() {
	register_sidebar( array(
		'name'          => 'Footer 3 Widget',
		'id'            => 'piyasavizyon_footer3_widget',
		'description'   => '<b>Footer 3 Widget</b>',
		'before_widget' => '<div id="%1$s" class="piyasavizyon_footer3">',
		'after_widget'  => '</div>',
		'before_sidebar'=> '<div id="piyasavizyon_footer3-bar">',
		'after_sidebar'=> '</div>',
	) );
}
add_action( 'widgets_init', 'ns_register_piyasavizyon_footer3_widget' );

function ns_register_piyasavizyon_footer4_widget() {
	register_sidebar( array(
		'name'          => 'Footer 4 Widget',
		'id'            => 'piyasavizyon_footer4_widget',
		'description'   => '<b>Footer 4 Widget</b>',
		'before_widget' => '<div id="%1$s" class="piyasavizyon_footer4">',
		'after_widget'  => '</div>',
		'before_sidebar'=> '<div id="piyasavizyon_footer4-bar">',
		'after_sidebar'=> '</div>',
	) );
}
add_action( 'widgets_init', 'ns_register_piyasavizyon_footer4_widget' );

function ns_register_piyasavizyon_footer5_widget() {
	register_sidebar( array(
		'name'          => 'Footer 5 Widget',
		'id'            => 'piyasavizyon_footer5_widget',
		'description'   => '<b>Footer 5 Widget</b>',
		'before_widget' => '<div id="%1$s" class="piyasavizyon_footer5">',
		'after_widget'  => '</div>',
		'before_sidebar'=> '<div id="piyasavizyon_footer5-bar">',
		'after_sidebar'=> '</div>',
	) );
}
add_action( 'widgets_init', 'ns_register_piyasavizyon_footer5_widget' );

function ns_register_piyasavizyon_footer6_widget() {
	register_sidebar( array(
		'name'          => 'Footer 6 Widget',
		'id'            => 'piyasavizyon_footer6_widget',
		'description'   => '<b>Footer 6 Widget</b>',
		'before_widget' => '<div id="%1$s" class="piyasavizyon_footer6">',
		'after_widget'  => '</div>',
		'before_sidebar'=> '<div id="piyasavizyon_footer6-bar">',
		'after_sidebar'=> '</div>',
	) );
}
add_action( 'widgets_init', 'ns_register_piyasavizyon_footer6_widget' );