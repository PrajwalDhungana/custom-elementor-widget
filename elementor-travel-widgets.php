<?php

/**
 * Plugin Name: Elementor Card Widgets Original
 * Plugin URI:  https://elementorcardwidgets.com
 * Author:      przwll
 * Author URI:  https://elementorcardwidgets.com
 * Description: This plugin does wonders
 * Version:     0.1.0-alpha
 * License:     GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: elementor-card-widgets
 * 
 * Elementor tested up to: 3.0.0
 * Elementor Pro tested up to: 3.0.0
*/

/**
 * 
 * If this file is called directly, abort!
 * 
 */
defined( 'ABSPATH' ) || exit;

/**
 * Register Currency Control.
 *
 * Include control file and register control class.
 *
 * @since 1.0.0
 * @param \Elementor\Controls_Manager $controls_manager Elementor controls manager.
 * @return void
 */

 function register_card_control( $controls_manager ) {

    require_once( __DIR__ . '/controls/class-card-controls.php' );

    $controls_manager->register( new \ElementorCardControls() );

 }

 add_action( 'elementor/controls/register', 'register_card_control' );


/**
 * Register widgets in elementor.
 * 
 * Include widget and register widget class
 * 
 * @since 1.0.0
 * @param widget_manager This manager object helps to register your widget
 * @return void
 */

function register_new_widgets( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/class-travel-card-widget.php' );

    $widgets_manager->register( new \ElementorTravelCardWidget() );

}

add_action( 'elementor/widgets/register', 'register_new_widgets' );


/**
 * 
 * Create new widgets categories
 * 
 */
function add_elementor_widget_categories( $elements_manager ) {

    $elements_manager->add_category(
        'card-widgets',
        array(
            'title' =>  __( 'Card Widgets', 'elementor-card-widgets' ),
            'icon'  =>  'fa fa-plug',
        )
    );

}

add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );


function register_widget_styles() {

	wp_register_style( 'travel-card', plugins_url( 'assets/css/card.css', __FILE__ ), [] );

}

add_action( 'wp_enqueue_scripts', 'register_widget_styles' );