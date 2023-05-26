<?php
/**
 * Plugin Name: My Elementor Addon Widgets
 * Plugin URI:  https://google.com
 * Author:      przwll
 * Author URI:  https://google.com
 * Description: This plugin does wonders
 * Version:     0.1.0
 * License:     GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: my-elementor-addon-widget
*/

namespace MyElementor\AddonWidgets;

use MyElementor\AddonWidgets\Widgets\Nav_Menu;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class MyElementorAddonWidgets {
    const VERSION = '0.1.0';
    const ELEMENTOR_MINIMUM_VERSION = '3.0.0';
    const MINIMUM_PHP_VERSION = '7.4';

    private static $_instance = null;

    public function __construct() {
        add_action( 'init', array( $this, 'i18n' ) );
        add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
        add_action( 'elementor/widgets/widgets_registered', array( $this, 'init_widgets' ) );
    }

    public function i18n() {
        load_plugin_textdomain( 'my-elementor-addon-widget' );
    }

    public function init_plugin() {
        /**
         * Check PHP Version
         */
        //  check elementor installation
        //  bring in the widget classes
        // $this->init_widgets();
        //  bring in the controls
    }

    public function init_controls() {

    }

    public function init_widgets() {
        // Require the widget class
        require_once __DIR__ . '/widgets/nav-menu.php';
        // print_r( __DIR__ );
        // die;

        // Register widget with elementor
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Nav_Menu() );
    }

    public static function get_instance() {
        if ( self::$_instance == null ) {
            self::$_instance == new Self();
        }

        return self::$_instance;
    }
}

MyElementorAddonWidgets::get_instance();