<?php
defined('ABSPATH') or die();

if( class_exists( 'WP_Customize_Control' ) ) {

	/**
     * Customize controls for repeater field
     *
     * @since 1.0.0
     */
    class beastthemes_companion_Repeater_Controler extends WP_Customize_Control {
        /**
         * The control type.
         *
         * @access public
         * @var string
         */
        public $type = 'repeater';

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
            $this->fields = $fields;
            $this->rdcode_box_label = $args['rdcode_box_label'] ;
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
            <input type="hidden" name="field_limit" class="field-limit" value="20">
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
                    $default   = isset( $field['default'] ) ? $field['default'] : '';

                    if ( empty ( $new_value ) ) {
                        $img_class = 'no-img-url-set';
                    } else {
                        $img_class = '';
                    }

                    switch ( $field['type'] ) {
                        case 'text':
                            echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="text" value="'.esc_attr( $new_value ).'"/>';
                            break;

                        case 'textarea':
                            echo '<textarea rows="3" data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'">'.esc_attr( $new_value ).'</textarea>';
                            break;

                        case 'url':
                            echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="text" value="'.esc_url( $new_value ).'"/>';
                            break;

                        case 'image':
                            echo '<input type="text" data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" name="team_image-'.esc_attr( $key ).'" id="team_image_url-'.esc_attr( $key ).'" class="form-control team_image" value="'.esc_attr( esc_attr( $new_value ) ).'" >';
                            echo '<input type="button" name="upload-btn" class="button-secondary button upload_image_btn upload_team_c" id="upload_team-'.esc_attr( $key ).'" value="Upload">';
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
                    <a class="rdcode-repeater-field-remove" href="#remove"><?php esc_html_e( 'Delete', 'beastthemes_companion' ) ?></a> |
                    <a class="rdcode-repeater-field-close" href="#close"><?php esc_html_e( 'Close', 'beastthemes_companion' ) ?></a>
                    </div>
                </div>
            </div>
            </li>
            <?php   
            }
            }
        }
    } // end beastthemes_companion_Repeater_Controler

    /**
     * Customize controls for One Pgae Editor
     *
     * @since 1.0.0
     */
    class beastthemes_companion_One_Page_Editor_Controler extends WP_Customize_Control {
        private $include_admin_print_footer = false;
        private $teeny = false;
        public $type   = 'text-editor';
        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
            if ( ! empty( $args['include_admin_print_footer'] ) ) {
                $this->include_admin_print_footer = $args['include_admin_print_footer'];
            }
            if ( ! empty( $args['teeny'] ) ) {
                $this->teeny = $args['teeny'];
            }
        }
        /* Render the content on the theme customizer page */
        public function render_content() {
            ?>

            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
            <?php
            $settings = array(
                'textarea_name' => $this->id,
                'teeny'         => $this->teeny,
            );
            $control_content = $this->value();
            wp_editor( $control_content, $this->id, $settings );

            if ( $this->include_admin_print_footer === true ) {
                do_action( 'admin_print_footer_scripts' );
            }
        }
    }

    /**
     * Heading control
     */
    class beastthemes_Customizer_Heading extends WP_Customize_Control {

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

    /**
     * Switch button customize control.
     *
     * @since 1.0.0
     * @access public
     */
    class beastthemes_Customize_Switch_Control extends WP_Customize_Control {

        /**
         * The type of customize control being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $rdcode_type = 'switch';

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
    } // end beastthemes_Customize_Switch_Control
}