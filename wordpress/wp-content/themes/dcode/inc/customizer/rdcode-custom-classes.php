<?php
/**
 * Define customizer custom classes
 *
 * @package Dcode
 * @since 1.0.0
 */

if( class_exists( 'WP_Customize_Control' ) ) {

    /**
     * Heading control
     */
    class rdcode_Customizer_Heading extends WP_Customize_Control {

        /**
         * The control type.
         *
         * @access public
         * @var string
         */
        public $type = 'rdcode-heading';

        /**
         * An Underscore (JS) template for this control's content (but not its container).
         *
         * Class variables for this control class are available in the `data` JS object;
         * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
         *
         * @see WP_Customize_Control::print_template()
         *
         * @access protected
         */
        protected function content_template() {
            ?>
            <h4 class="rdcode-customizer-heading">{{{ data.label }}}</h4>
            <?php
        }
    }

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Radio image customize control.
     *
     * @since  1.0.0
     * @access public
     */
    class rdcode_Customize_Image_Radio_Control extends WP_Customize_Control {

        /**
         * The type of customize control being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'rdcode-radio-image';

        /**
         * Loads the jQuery UI Button script and custom scripts/styles.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function enqueue() {
            wp_enqueue_script( 'jquery-ui-button');
        }

        /**
         * Add custom JSON parameters to use in the JS template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function to_json() {
            parent::to_json();

            // We need to make sure we have the correct image URL.
            foreach ( $this->choices as $value => $args )
                $this->choices[ $value ]['url'] = esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) );

            $this->json['choices'] = $this->choices;
            $this->json['link']    = $this->get_link();
            $this->json['value']   = $this->value();
            $this->json['id']      = $this->id;
        }

        /**
         * Underscore JS template to handle the control's output.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function content_template() { ?>

            <# if ( ! data.choices ) {
                return;
            } #>

            <# if ( data.label ) { #>
                <span class="customize-control-title">{{ data.label }}</span>
            <# } #>

            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>

            <div class="buttonset">

                <# for ( key in data.choices ) { #>

                    <input type="radio" value="{{ key }}" name="_customize-{{ data.type }}-{{ data.id }}" id="{{ data.id }}-{{ key }}" {{{ data.link }}} <# if ( key === data.value ) { #> checked="checked" <# } #> />
                    <label for="{{ data.id }}-{{ key }}">
                        <span class="screen-reader-text">{{ data.choices[ key ]['label'] }}</span>
                        <img src="{{ data.choices[ key ]['url'] }}" alt="{{ data.choices[ key ]['label'] }}" title="{{ data.choices[ key ]['label'] }}"/>
                    </label>
                <# } #>

            </div><!-- .buttonset -->
        <?php }
    } // end rdcode_Customize_Image_Radio_Control

    /*--------------------------------------------------------------------------------------------------------------*/

    /**
     * Switch button customize control.
     *
     * @since 1.0.0
     * @access public
     */
    class rdcode_Customize_Switch_Control extends WP_Customize_Control {

        /**
         * The type of customize control being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'rdcode-switch';

        /**
         * Displays the control content.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function render_content() {
    ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <div class="description customize-control-description"><?php echo esc_html( $this->description ); ?></div>
                <div class="switch_options">
                    <?php 
                        $show_choices = $this->choices;
                        foreach ( $show_choices as $key => $value ) {
                            echo '<span class="switch_part '.esc_attr( $key ).'" data-switch="'.esc_attr( $key ).'">'. esc_html( $value ).'</span>';
                        }
                    ?>
                    <input type="hidden" id="mt_switch_option" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
                </div>
            </label>
    <?php
        }
    } // end rdcode_Customize_Switch_Control

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Class rdcode_Range_Value_Control
     */
    class rdcode_Range_Value_Control extends WP_Customize_Control {
        public $type = 'rdcode-range-value';

        /**
         * Enqueue scripts/styles.
         *
         * @since 1.0.0
         */
        public function enqueue() {
            wp_enqueue_script( 'rdcode-range-value-control', get_template_directory_uri() . '/assets/js/customizer-range-value-control.js', array( 'jquery' ), rand(), true );
            wp_enqueue_style( 'rdcode-range-value-control', get_template_directory_uri() . '/assets/css/customizer-range-value-control.css', array(), rand() );
        }

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
                    <span  style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>"
                        <?php $this->input_attrs(); $this->link(); ?>
                    >
                    <span class="range-slider__value">0</span></span>
                </div>
                <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif; ?>
            </label>
            <?php
        }
    }

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Class rdcode_Font_Selector
     */
    class rdcode_Font_Selector extends WP_Customize_Control {
        /**
         * The control type.
         *
         * @access public
         * @var string
         */
        public $type = 'rdcode-selector-font';

        /**
         * Render the control's content.
         * Allows the content to be overriden without having to rewrite the wrapper in $this->render().
         *
         * @access protected
         */
        protected function render_content() {
            $std_fonts    = $this->get_standard_fonts();
            $google_fonts = rdcode_get_google_fonts();
            $value        = $this->value();
            ?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
                <?php endif; ?>
            </label>
            <div class="rdcode-ss-wrap">
                <input class="rdcode-fs-main-input" type="text"
                        name="<?php echo esc_attr( $this->id ); ?>"
                        value="<?php $valuee = ! empty( $value ) ? $value : 'Default'; echo esc_attr( $valuee ); ?>"
                        readonly>
                <span class="rdcode-fs-input-addon"><i class="dashicons dashicons-arrow-down"></i></span>
                <div class="rdcode-fs-dropdown">
                    <span class="rdcode-fs-search">
                            <input type="search" placeholder="<?php echo esc_attr_x( 'Search for:', 'label', 'dcode' ) . '...'; ?>">
                    </span>
                    <div class="rdcode-fs-options-wrapper">
                            <span class="rdcode-fs-option"
                                    data-option="<?php esc_attr_e( 'Default', 'dcode' ); ?>"><?php esc_html_e( 'Default', 'dcode' ); ?></span>
                        <?php
                        $this->render_dropdown_options_group( $std_fonts, esc_html__( 'Standard Fonts', 'dcode' ) );
                        $this->render_dropdown_options_group( $google_fonts, esc_html__( 'Google Fonts', 'dcode' ) );
                        ?>
                    </div>
                </div>
                <input type="hidden" class="rdcode-ss-collector" <?php $this->link(); ?> >
            </div>
            <?php
        }

        /**
         * Render the dropdown option group.
         *
         * @param array  $options Options in group.
         *
         * @param string $title Title of options group.
         */
        protected function render_dropdown_options_group( $options, $title ) {
            if ( ! empty( $options ) ) {
                ?>
                <span class="rdcode-fs-options-group">
                        <span class="rdcode-fs-options-heading"><?php echo esc_html( $title ); ?></span>
                    <?php foreach ( $options as $option ) { ?>
                        <span class="rdcode-fs-option"
                                data-filter="<?php echo esc_html( strtolower( $option ) ); ?>"
                                data-option="<?php echo esc_html( $option ); ?>"><?php echo esc_html( $option ); ?></span>
                    <?php } ?>
                    </span>
                <?php
            }
        }


        /**
         * List of standard fonts
         *
         * @since 1.1.38
         */
        function get_standard_fonts() {
            return apply_filters(
                'rdcode_standard_fonts_array',
                array(
                    'Arial, Helvetica, sans-serif',
                    'Arial Black, Gadget, sans-serif',
                    'Bookman Old Style, serif',
                    'Comic Sans MS, cursive',
                    'Courier, monospace',
                    'Georgia, serif',
                    'Garamond, serif',
                    'Impact, Charcoal, sans-serif',
                    'Lucida Console, Monaco, monospace',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'MS Sans Serif, Geneva, sans-serif',
                    'MS Serif, New York, sans-serif',
                    'Palatino Linotype, Book Antiqua, Palatino, serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif',
                    'Paratina Linotype',
                    'Trebuchet MS',
                )
            );
        }

    }

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Customize controls for repeater field
     *
     * @since 1.0.0
     */
    class rdcode_Repeater_Controler extends WP_Customize_Control {
        /**
         * The control type.
         *
         * @access public
         * @var string
         */
        public $type = 'rdcode-repeater';

        public $rdcode_box_label = '';

        public $rdcode_box_add_control = '';

        /**
         * The fields that each container row will contain.
         *
         * @access public
         * @var array
         */
        public $fields = array();

        /**
         * Repeater drag and drop controller
         *
         * @since  1.0.0
         */
        public function __construct( $manager, $id, $args = array(), $fields = array() ) {
            $this->fields                 = $fields;
            $this->rdcode_box_label       = $args['rdcode_box_label'] ;
            $this->rdcode_box_add_control = $args['rdcode_box_add_control'];
            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {

            $values = json_decode( $this->value() );
            $repeater_id = $this->id;
            $field_count = count( $values );
        ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

            <?php if( $this->description ){ ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post( $this->description ); ?>
                </span>
            <?php } ?>

            <ul class="rdcode-repeater-field-control-wrap">
                <?php $this->rdcode_get_fields(); ?>
            </ul>

            <input type="hidden" <?php esc_attr( $this->link() ); ?> class="rdcode-repeater-collector" value="<?php echo esc_attr( $this->value() ); ?>" />
            <input type="hidden" name="<?php echo esc_attr( $repeater_id ).'_count'; ?>" class="field-count" value="<?php echo absint( $field_count ); ?>">
            <input type="hidden" name="field_limit" class="field-limit" value="5">
            <button type="button" class="button rdcode-repeater-add-control-field"><?php echo esc_html( $this->rdcode_box_add_control ); ?></button>
    <?php
        }

        private function rdcode_get_fields(){
            $fields = $this->fields;
            $values = json_decode( $this->value() );

            if( is_array( $values ) ){
            foreach( $values as $value ){
        ?>
            <li class="rdcode-repeater-field-control">
            <h3 class="rdcode-repeater-field-title"><?php echo esc_html( $this->rdcode_box_label ); ?></h3>
            
            <div class="rdcode-repeater-fields">
            <?php
                foreach ( $fields as $key => $field ) {
                $class = isset( $field['class'] ) ? $field['class'] : '';
            ?>
                <div class="rdcode-repeater-field rdcode-repeater-type-<?php echo esc_attr( $field['type'] ).' '. esc_attr( $class ); ?>">

                <?php 
                    $label = isset( $field['label'] ) ? $field['label'] : '';
                    $description = isset( $field['description'] ) ? $field['description'] : '';
                    if( $field['type'] != 'checkbox' ) { 
                ?>
                        <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                        <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
                <?php 
                    }

                    $new_value = isset( $value->$key ) ? $value->$key : '';
                    $default = isset( $field['default'] ) ? $field['default'] : '';

                    switch ( $field['type'] ) {
                        case 'text':
                            echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="text" value="'.esc_attr( $new_value ).'"/>';
                            break;

                        case 'url':
                            echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="text" value="'.esc_url( $new_value ).'"/>';
                            break;

                        case 'social_icon':
                            echo '<div class="rdcode-repeater-selected-icon"><i class="'.esc_attr( $new_value ).'"></i><span><i class="fa fa-angle-down"></i></span></div><ul class="rdcode-repeater-icon-list rdcode-clearfix">';
                            $rdcode_font_awesome_social_icon_array = rdcode_font_awesome_social_icon_array();
                            foreach ( $rdcode_font_awesome_social_icon_array as $rdcode_font_awesome_icon ) {
                                $icon_class = $new_value == $rdcode_font_awesome_icon ? 'icon-active' : '';
                                echo '<li class='. esc_attr( $icon_class ) .'><i class="'. esc_attr( $rdcode_font_awesome_icon ) .'"></i></li>';
                            }
                            echo '</ul><input data-default="'. esc_attr( $default ) .'" type="hidden" value="'. esc_attr( $new_value ) .'" data-name="'.esc_attr( $key ).'"/>';
                            break;

                        default:
                            break;
                    }
                ?>
                </div>
                <?php
                } ?>

                <div class="rdcode-clearfix rdcode-repeater-footer">
                    <div class="alignright">
                    <a class="rdcode-repeater-field-remove" href="#remove"><?php esc_html_e( 'Delete', 'dcode' ) ?></a> |
                    <a class="rdcode-repeater-field-close" href="#close"><?php esc_html_e( 'Close', 'dcode' ) ?></a>
                    </div>
                </div>
            </div>
            </li>
            <?php   
            }
            }
        }
    } // end rdcode_Repeater_Controler

} //end WP_Customize_Control