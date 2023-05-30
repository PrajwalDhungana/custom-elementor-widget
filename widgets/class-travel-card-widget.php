<?php

// If this file is called directly, abort!
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'ElementorTravelCardWidget' ) ) {

    class ElementorTravelCardWidget extends \Elementor\Widget_Base {

        public function __contruct() {
            
            parent::__contruct();

            wp_register_script('travel-card', __DIR__ . '/assets/js/travel-card-widget.js', [], true);

        }

        /**
         * Get widget name.
         *
         * Retrieve currency widget name.
         *
         * @since 1.0.0
         * @access public
         * @return string Widget name.
         */
        public function get_name() {
            return 'travel_card';
        }

        /**
         * Get widget title.
         *
         * Retrieve currency widget title.
         *
         * @since 1.0.0
         * @access public
         * @return string Widget title.
         */
        public function get_title() {
            return __( 'Travel Card', 'elementor-card-widgets' );
        }

        /**
         * Get widget icon.
         *
         * Retrieve currency widget icon.
         *
         * @since 1.0.0
         * @access public
         * @return string Widget icon.
         */
        public function get_icon() {
            return 'eicon-header';
        }

        /**
         * Get custom help URL.
         *
         * Retrieve a URL where the user can get more information about the widget.
         *
         * @since 1.0.0
         * @access public
         * @return string Widget help URL.
         */
        public function get_custom_help_url() {
            return 'https://google.com';
        }

        /**
         * Get widget categories.
         *
         * Retrieve the list of categories the currency widget belongs to.
         *
         * @since 1.0.0
         * @access public
         * @return array Widget categories.
         */
        public function get_categories() {
            return array( 'basic' );
        }

        /**
         * Get widget keywords.
         *
         * Retrieve the list of keywords the currency widget belongs to.
         *
         * @since 1.0.0
         * @access public
         * @return array Widget keywords.
         */
        public function get_keywords() {
            return array( 'card', 'card widget', 'box', 'container', 'card', 'travel', 'trip' );
        }

        public function get_style_depends() {
            return array( 'travel-card' );
        }

        /**
         * Register currency widget controls.
         *
         * Add input fields to allow the user to customize the widget settings.
         *
         * @since 1.0.0
         * @access protected
         */
        protected function register_controls() {

            $this->start_controls_section(
                'content_section',
                array(
                    'label'     =>  __( 'Content', 'elementor-card-widgets' ),
                    'tab'       =>  \Elementor\Controls_Manager::TAB_CONTENT,
                )
            );

            $this->add_control(
                'title',
                array(
                    'label'     =>  __( 'Title', 'elementor-card-widgets' ),
                    'type'      =>  \Elementor\Controls_Manager::TEXT,
                    'default'   =>  'Click here to add content',
                )
            );

            $this->add_control(
                'description',
                array(
                    'label'         =>  __( 'Description', 'elementor-card-widgets' ),
                    'type'          =>  \Elementor\Controls_Manager::TEXTAREA,
                    'default'   =>  '',
                )
            );

            $this->end_controls_section();
        }

        /**
         * Render currency widget output on the frontend.
         *
         * Written in PHP and used to generate the final HTML.
         *
         * @since 1.0.0
         * @access protected
         */
        protected function render() {
            $settings = $this->get_settings_for_display();
            ?>

            <div class="travel-card-container">
                <?php if ( isset( $settings[ "title" ] ) && ! empty( $settings[ "title" ] ) ) { ?>
                    <div><?php echo $settings[ "title" ] ?></div>
                <?php } ?>
                <?php if ( isset( $settings[ "description" ] ) && ! empty( $settings[ "description" ] ) ) { ?>
                    <p><?php echo $settings[ "description" ] ?></p>
                <?php } ?>
            </div>

            <?php
        }
    }

}