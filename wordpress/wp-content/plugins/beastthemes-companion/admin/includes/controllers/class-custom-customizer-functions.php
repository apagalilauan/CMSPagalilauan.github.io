<?php
defined('ABSPATH') or die();

if( class_exists( 'WP_Customize_Control' ) ) {

	/**
	 * Multiple checkbox customize control class.
	 * @access public
	 */
	class beastthemes_companion_Customize_Control_Checkbox_Multiple extends WP_Customize_Control {

		/**
		 * The type of customize control being rendered.
		 *
		 * @access public
		 * @var    string
		 */
		public $type = 'checkbox-multiple';

		/**
		 * Enqueue scripts/styles.
		 * @access public
		 * @return void
		 */
		public function enqueue() {
			wp_enqueue_script( 'rdcode-multi-checkbox-customize-controls', BEASTTHEMES_COMPANION_PLUGIN_URL. 'admin/assets/js/multi-checkbox.js', array( 'jquery' ), '', true );
		}

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 * @access public
		 * @return void
		 */
		public function to_json() {
			parent::to_json();

			$this->json['value']   = ! is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value();
			$this->json['choices'] = $this->choices;
			$this->json['link']    = $this->get_link();
			$this->json['id']      = $this->id;
		}

		/**
		 * Don't render the content via PHP.  This control is handled with a JS template.
		 * @access public
		 * @return bool
		 */
		protected function render_content() {}

		/**
		 * Underscore JS template to handle the control's output.
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

			<ul>
				<# _.each( data.choices, function( label, choice ) { #>
					<li>
						<label>
							<input type="checkbox" value="{{ choice }}" <# if ( -1 !== data.value.indexOf( choice ) ) { #> checked="checked" <# } #> />
							{{ label }}
						</label>
					</li>
				<# } ) #>
			</ul>
		<?php }
	}

	/**
	 * Multiple select customize control class.
	 * @access public
	 */
	class beastthemes_companion_Customize_Control_Select_Group extends WP_Customize_Control {

		/**
		 * The type of customize control being rendered.
		 * @access public
		 * @var    string
		 */
		public $type = 'select-group';

		/**
		 * Enqueue scripts/styles.
		 * @access public
		 * @return void
		 */
		public function enqueue() {
			wp_enqueue_script( 'rdcode-multi-checkbox-customize-controls', BEASTTHEMES_COMPANION_PLUGIN_URL. 'admin/assets/js/multi-checkbox.js', array( 'jquery' ), '', true );
		}

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 * @access public
		 * @return void
		 */
		public function to_json() {
			parent::to_json();

			$choices = $group = array();

			foreach ( $this->choices as $choice => $maybe_group ) {

				if ( is_array( $maybe_group ) )
					$group[ $choice ] = $maybe_group;
				else
					$choices[ $choice ] = $maybe_group;
			}

			$this->json['choices'] = $choices;
			$this->json['group']   = $group;
			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
		}

		/**
		 * Don't render the content via PHP.  This control is handled with a JS template.
		 * @access public
		 * @return bool
		 */
		protected function render_content() {}

		/**
		 * Underscore JS template to handle the control's output.
		 * @access public
		 * @return void
		 */
		public function content_template() { ?>

			<# if ( ! data.choices && ! data.group ) {
				return;
			} #>

			<label>

				<# if ( data.label ) { #>
					<span class="customize-control-title">{{ data.label }}</span>
				<# } #>

				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>

				<select {{{ data.link }}}>

					<# _.each( data.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

					<# _.each( data.group, function( group ) { #>

						<optgroup label="{{ group.label }}">

							<# _.each( group.choices, function( label, choice ) { #>

								<option value="{{ choice }}" <# if ( choice === data.value ) { #> selected="selected" <# } #>>{{ label }}</option>

							<# } ) #>

						</optgroup>
					<# } ) #>
				</select>
			</label>
		<?php }
	}

	/**
	 * Multiple select customize control class.
	 * @access public
	 */
	class beastthemes_companion_Customize_Control_Select_Multiple extends WP_Customize_Control {

		/**
		 * The type of customize control being rendered.
		 * @access public
		 * @var    string
		 */
		public $type = 'select-multiple';

		/**
		 * Loads the framework scripts/styles.
		 * @access public
		 * @return void
		 */
		public function enqueue() {
			wp_enqueue_script( 'rdcode-multi-checkbox-customize-controls', BEASTTHEMES_COMPANION_PLUGIN_URL. 'admin/assets/js/multi-checkbox.js', array( 'jquery' ), '', true );
		}

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 * @access public
		 * @return void
		 */
		public function to_json() {
			parent::to_json();

			$this->json['choices'] = $this->choices;
			$this->json['link']    = $this->get_link();
			$this->json['value']   = (array) $this->value();
			$this->json['id']      = $this->id;
		}

		/**
		 * Don't render the content via PHP.  This control is handled with a JS template.
		 * @access public
		 * @return bool
		 */
		protected function render_content() {}

		/**
		 * Underscore JS template to handle the control's output.
		 * @access public
		 * @return void
		 */
		public function content_template() { ?>

			<# if ( ! data.choices ) {
				return;
			} #>

			<label>

				<# if ( data.label ) { #>
					<span class="customize-control-title">{{ data.label }}</span>
				<# } #>

				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>

				<select multiple="multiple" {{{ data.link }}}>

					<# _.each( data.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( -1 !== data.value.indexOf( choice ) ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</label>
		<?php }
	}

	/**
	 * Class beastthemes_companion_Customize_Sortable_Control
	 */
	class beastthemes_companion_Customize_Sortable_Control extends WP_Customize_Control {

		/**
		 * Customize control type.
		 *
		 * @access public
		 * @var    string
		 */
		public $type = 'beastthemes-sortable';

		/**
		 * Renders the Underscore template for this control.
		 *
		 * @see    WP_Customize_Control::print_template()
		 * @access protected
		 * @return void
		 */
		protected function content_template() {
			?>

			<label class='beastthemes-sortable'>
				<span class="customize-control-title">
					{{{ data.label }}}
				</span>
				<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>

				<ul class="sortable">
					<# _.each( data.value, function( choiceID ) { #>
					<li {{{ data.inputAttrs }}} class='beastthemes-sortable-item' data-value='{{ choiceID }}'>
						<i class='dashicons dashicons-move'></i>
						<i class="dashicons dashicons-visibility visibility"></i>
						{{{ data.choices[ choiceID ] }}}
					</li>
					<# }); #>
					<# _.each( data.choices, function( choiceLabel, choiceID ) { #>
					<# if ( -1 === data.value.indexOf( choiceID ) ) { #>
					<li {{{ data.inputAttrs }}} class='beastthemes-sortable-item invisible' data-value='{{ choiceID }}'>
						<i class='dashicons dashicons-move'></i>
						<i class="dashicons dashicons-visibility visibility"></i>
						{{{ data.choices[ choiceID ] }}}
					</li>
					<# } #>
					<# }); #>
				</ul>
			</label>

			<?php
		}

		/**
		 * Render content is still called, so be sure to override it with an empty function in your subclass as well.
		 */
		protected function render_content() {

		}

	}

}