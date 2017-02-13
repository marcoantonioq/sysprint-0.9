<?php
App::uses('Print', 'Model');

/**
 * Print Test Case
 *
 */
class PrintTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Print = ClassRegistry::init('Print');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Print);

		parent::tearDown();
	}

}
