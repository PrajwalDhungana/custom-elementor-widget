<?php

namespace MyElementor\AddonWidgets\Widgets;

use Elementor\Widget_Base;

/**
 * Have the widget code for Custom Elementor Nav Menu
 */

 class Nav_Menu extends Widget_Base {
    public function get_name() {
        return 'custom-nav-menu';
    }

    public function get_title() {
        return __( 'My Nav Menu', 'my-elementor-addon-widget' );
    }

    public function get_icon() {
        // return 'fa fa-menu';
        return 'eicon-nav-menu';
    }

    public function get_categories() {
        return array( 'basic' );
    }

    public function _register_control() {

    }

    protected function render() {

    }

    protected function _content_tempplate() {

    }
 }