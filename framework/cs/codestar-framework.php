<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

/**
 *
 * @package   Codestar Framework - WordPress Options Framework
 * @author    Codestar <info@codestarthemes.com>
 * @link      http://codestarframework.com
 * @copyright 2015-2018 Codestar
 *
 *
 * Plugin Name: Codestar Framework
 * Plugin URI: http://codestarframework.com/
 * Author: Codestar
 * Author URI: http://codestarthemes.com/
 * Version: 2.0.7
 * Description: A Simple and Lightweight WordPress Option Framework for Themes and Plugins
 * Text Domain: csf
 * Domain Path: /languages
 *
 */

require_once plugin_dir_path( __FILE__ ) .'classes/setup.class.php';
require_once plugin_dir_path( __FILE__ ) .'config/admin.config.php';
require_once plugin_dir_path( __FILE__ ) .'config/shortcode.config.php';
require_once plugin_dir_path( __FILE__ ) .'config/widget.config.php';
add_action("admin_head", function () {
    echo "<script> var $ = jQuery; </script>";
});
// AND... ANOTHER LINE OF CODE, NEARLY THE SAME BUT WITH DIFFERENT HOOK ENTRY
add_action("wp_head", function () {
    echo "<script> var $ = jQuery; </script>";
});


function add_ta_views_columns($columns) {
    global $ta_panel;
    if ( function_exists('getPostViews') ) {
        $columns['post_views_count'] = 'Görüntülenme';
    }

    return $columns;
}
add_filter('manage_posts_columns', 'add_ta_views_columns');

add_action('manage_posts_custom_column',  'bt_views_columns_data');

add_filter( 'manage_edit-post_sortable_columns', 'bt_sort_postviews_column' );
add_action( 'pre_get_posts',                     'bt_sort_postviews' );
function bt_views_columns_data($name) {
    $count_key = 'post_views_count';

    if ( $count_key == $name ) {
        global $post;
        echo getPostViews( $post->ID );
    }

}

function bt_sort_postviews_column( $defaults ){
    $defaults['post_views_count'] = 'post_views_count';
    return $defaults;
}

function bt_sort_postviews( $query ) {
    if( ! is_admin() ){
        return;
    }

    $orderby   = $query->get('orderby');
    $count_key = 'post_views_count';

    if( $orderby == $count_key ) {
        $query->set( 'meta_key', $count_key );
        $query->set( 'orderby',  'meta_value_num' );
    }
}