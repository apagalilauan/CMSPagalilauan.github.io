<?php
/**
 * Getting Started Panel.
 *
 * @package Dcode
 */
?>
<div id="getting-started-panel" class="panel-left visible">
	<div class="row">
		<?php 
		$businessexpo_free_plugins = array(
			'beastthemes-companion' => array(
			    'name'      => esc_html__( 'Beastthemes Companion', 'dcode' ),
				'slug'     	=> 'beastthemes-companion',
				'filename' 	=> 'beastthemes-companion.php',
			),
		);
		if( !empty( $businessexpo_free_plugins ) ) { ?>
			<?php
			foreach( $businessexpo_free_plugins as $rdcode_plugin ) {
				$businessexpo_info 		= rdcode_call_plugin_api( $rdcode_plugin['slug'] ); ?>
				<div class="col-6">
					<div class="panel-aside panel-column">
						<div class="recomended-plugin-wrap">
						<h4 title="">
							<?php esc_html_e( 'Beastthemes Companion Plugin','dcode' ); ?>
						</h4>
						<p class="mt-0"><?php esc_html_e( 'Beastthemes Companion Plugin requires to show all the front page features and Customization setting of Front Page. It also adds extra functionality to the themes of beastthemes like ( Predefined content sections, Drag and drop page customization, Beautiful ready-made homepage Sections, Live content editing and many more ).', 'dcode'); ?></p>
						<?php 
						echo '<div class="mt-12">';
						echo rdcode_Getting_Started_Page_Plugin_Helper::instance()->get_button_html( $rdcode_plugin['slug'] );
						echo '</div>';
						?>
						</div>
					</div>
				</div>
				<?php
			} ?>
			
		<?php
		} ?>
		<div class="col-6">
		   <div class="panel-aside panel-column">
		        <h4><?php esc_html_e( 'Go to the Customizer', 'dcode' ); ?></h4>
		        <p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every single aspect of the theme. Because this theme provides advanced settings to control the theme layout through the customizer.', 'dcode' ); ?></p>
		        <a class="button button-primary" target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'dcode' ); ?>"><?php esc_html_e( 'Go to the Customizer', 'dcode' ); ?></a>
		    </div>
		</div>
    </div>
</div>