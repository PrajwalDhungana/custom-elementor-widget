<?php

/**
 * Card control.
 *
 * A control for displaying a time field with the ability to choose cities.
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'ElementorCardControls' ) ) {

    class ElementorCardControls extends \Elementor\Base_Data_Control {

        /**
         * Get card control type.
         *
         * Retrieve the control type, in this case `card`.
         *
         * @since 1.0.0
         * @access public
         * @return string Control type.
         */
        public function get_type() {
            return 'card-control';
        }

        /**
         * Get timezones.
         *
         * Retrieve all the available timezones.
         *
         * @since 1.0.0
         * @access public
         * @static
         * @return array Available timezones.
         */
        public static function get_timezone() {
            $timezone_obj = ( object ) array();
            $timezone_list = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
            foreach( $timezone_list as $timezone ) {
                $temp_obj = new DateTimeZone( $timezone );
                $time =  new DateTime( "now", $temp_obj );
                $formatted_time = $time->format( "H:i:s" );
                $timezone_obj->$formatted_time = $timezone;
            }
            return $timezone_obj;
        }

        /**
         * Get timezone control default settings.
         *
         * Retrieve the default settings of the timezone control. Used to return
         * the default settings while initializing the timezone control.
         *
         * @since 1.0.0
         * @access protected
         * @return array Timezone control default settings.
         */
        protected function get_default_settings() {
            return array(
                'timezones'  =>  self::get_timezone(),
            );
        }

        /**
         * Get timezone control default value.
         *
         * Retrieve the default value of the timezone control. Used to return the
         * default value while initializing the control.
         *
         * @since 1.0.0
         * @access public
         * @return array Timezone control default value.
         */
        public function get_default_value() {
            return '';
        }

        /**
         * Render timezone control output in the editor.
         *
         * Used to generate the control HTML in the editor using Underscore JS
         * template. The variables for the class are available using `data` JS
         * object.
         *
         * @since 1.0.0
         * @access public
         */
        public function content_template() {
            $control_uid = $this->get_control_uid();
            ?>

            <div class="elementor-control-field">

            <# if ( data.label ) {#>
                <label for="<?php echo $control_uid; ?>" class="elementor-control-title">{{{ data.label }}}</label>
            <# } else { #>
                <label for="<?php echo $control_uid; ?>" class="elementor-control-title">Undefined Label</label>
            <# } #>

                <div class="elementor-control-input-wrapper">
                    <select id="<?php echo $control_uid; ?>" data-setting="{{ data.name }}">
                        <option value=""><?php echo esc_html__( $this->get_default_value(), 'elementor-timezone-control' ); ?></option>
                        <# _.each( data.timezones, function( timezone_label, timezone_value ) { #>
                        <option value="{{ timezone_value }}">{{{ timezone_label }}}</option>
                        <# } ); #>
                    </select>
                </div>

            </div>

            <# if ( data.description ) { #>
            <div class="elementor-control-field-description">{{{ data.description }}}</div>
            <# } #>

            <?php
        }

        /**
         * Enqueue card control scripts and styles.
         *
         * Used to register and enqueue custom scripts and styles used by the card
         * control.
         *
         * @since 1.0.0
         * @access public
         */
        public function enqueue() {
            
        }
    }
}