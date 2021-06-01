<div id="useful-plugin-panel" class="panel-left">
	<div class="row">
		<?php 
		$rdcode_free_plugins = array(
			'slider-factory-pro' => array(
			    'name'      => esc_html__( 'Clockify Lite - Time/Staff Management Sysytem', 'dcode' ),
				'slug'     	=> 'clockify-lite',
				'filename' 	=> 'clockify-lite.php',
				'desc'      => esc_html__( 'World’s most advanced employee/staff management Plugin to track their time & Attendance. You can manage Attendance, Departments, Employees, Salary, Real-Time Working Hours, Monthly Report Generation, Leaves, Notices, Holidays, User Roles.', 'dcode' )
			),
			'flickr-album-gallery-pro' => array(
			    'name'      => esc_html__( 'Projectify Lite - Advance Project Management System', 'dcode' ),
				'slug'     	=> 'projectify-lite',
				'filename' 	=> 'projectify-lite.php',
				'desc'      => esc_html__( 'Projectify Lite is the World’s most advanced project management system which helps you to run your business efficiently and effectively, providing all of the tools that you need to communicate with your clients and your team. Keep all your information in one place, easily accessible. This plugin provides you the features to create a project, tasks, also you can create annucements', 'dcode' )
			),
		);
		if ( ! empty( $rdcode_free_plugins ) ) {
			foreach( $rdcode_free_plugins as $rdcode_plugin ) {
		?>
		<div class="col-6">
			<div class="panel-aside panel-column">
				<div class="recomended-plugin-wrap">
					<h4 class="usefull-plugin-title">
						<?php echo esc_html( $rdcode_plugin['name'] ); ?>
					</h4>
					<p class="mt-0">
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
		<?php } } ?>
	</div>
</div>