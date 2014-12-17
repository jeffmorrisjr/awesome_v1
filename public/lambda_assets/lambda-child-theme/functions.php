<?php
/**
 * Child Theme functions loads the main theme class and extra options
 *
 * @package Omega Child
 * @subpackage Child
 * @since 1.3
 *
 * @copyright (c) 2013 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.0
 */

/**
 * Loads a child css script
 *
 * @return void
 * @author
 **/
function oxy_load_child_scripts() {
    wp_enqueue_style( THEME_SHORT . '-child-theme' , get_stylesheet_directory_uri() . '/style.css', array( THEME_SHORT . '-theme' ), false, 'all' );
}
add_action( 'wp_enqueue_scripts', 'oxy_load_child_scripts');


/**
 * Example override of the blogquote shortcode
 *
 * @return void
 * @author
 **/
function oxy_shortcode_blockquote( $atts, $content ) {
    extract( shortcode_atts( array(
        'who'                    => '',
        'cite'                   => '',
        'align'                  => 'left',
        'text_color'             => 'text-normal',
        // global options
        'extra_classes'          => '',
        'margin_top'             => 20,
        'margin_bottom'          => 20,
        'scroll_animation'       => 'none',
        'scroll_animation_delay' => '0'
    ), $atts ) );

    if ($align == 'left') {
        $align_class = 'text-left';
    }
    else if ($align == 'right') {
        $align_class = 'text-right';
    }
    else {
        $align_class = 'text-center';
    }
    $classes = array();
    $classes[] = $extra_classes;
    $classes[] = $align_class;
    $classes[] = $text_color;
    $classes[] = 'element-top-' . $margin_top;
    $classes[] = 'element-bottom-' . $margin_bottom;
    if( $scroll_animation !== 'none' ) {
        $classes[] = 'os-animation';
    }

    // override here
    $content = 'This is and example of how to override the code';
    $who = 'Morris Onions';

    ob_start();
    include( locate_template( 'partials/shortcodes/blockquote.php' ) );
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}