<?php

class Restricted_Site_Access_Test_Whitelist_Admin extends WP_UnitTestCase {

	private $_init_done = false;

	public function run_admin_init() {
		if ( ! $this->_init_done ) {
			$rsa = Restricted_Site_Access::get_instance();
			$rsa::admin_init();
			$this->_init_done = true;
		}
	}

	public function test_settings_field_allowed() {

		$rsa = Restricted_Site_Access::get_instance();

		// Run tests for specific fields that aren't covered in the
		// other tests.
		ob_start();
		$rsa::settings_field_allowed();
		$html = ob_get_clean();

		$this->assertContains( '<input type="text" value="192.168.1.50" disabled="true" />', $html );

	}
}
