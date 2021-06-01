<?php
/**
 * Recommended Plugins Panel
 *
 * @package Dcode
 */
?>
<div id="recommended-plugins-panel" class="panel-left">
	<?php 
	$rdcode_free_plugins = array(
		'beastthemes-companion' => array(
		    'name'     => esc_html__( 'Beastthemes Companion', 'dcode' ),
			'slug'     => 'beastthemes-companion',
			'filename' => 'beastthemes-companion.php',
			'desc'      => esc_html__( 'Beastthemes Companion Plugin is highly recommended for dcode Theme, After installing it, you will be able to show all the Front-Page features and Business sections for your Website. It also adds extra functionality to the themes of beastthemes like ( Predefined content sections, Drag and drop page customization, Beautiful ready-made homepage Sections, Live content editing and many more ).', 'dcode' )
		),
	);
	if( !empty( $rdcode_free_plugins ) ) { ?>
		<div class="recomended-plugin-wrap">
			<h4 class="recommended-title"><?php esc_html_e( 'Recommended Plugins', 'dcode' ); ?></h4>
			<div class="row">
			<?php
			foreach( $rdcode_free_plugins as $rdcode_plugin ) {
				$rdcode_info = rdcode_call_plugin_api( $rdcode_plugin['slug'] ); ?>
				<div class="col-12">
					<div class="recom-plugin-wrap mb-0">
						<div class="plugin-title-install clearfix">
							<span class="title" title="">
								<?php echo esc_html( $rdcode_plugin['name'] ); ?>
							</span>
							<p>
								<?php echo esc_html( $rdcode_plugin['desc'] ); ?>
							</p>
							<?php 
							echo '<div class="button-wrap">';
							echo rdcode_Getting_Started_Page_Plugin_Helper::instance()->get_button_html( $rdcode_plugin['slug'] );
							echo '</div>';
							?>
						</div>
					</div>
				</div>
				<?php
			} ?>
			</div>
		</div>
	<?php
	} ?>
</div>