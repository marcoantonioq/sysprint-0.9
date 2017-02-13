<?php
App::uses('Archive', 'Model');

/**
 * Archive Test Case
 *
 */
class ArchiveTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.archive',
		'app.user',
		'app.department',
		'app.job',
		'app.printer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Archive = ClassRegistry::init('Archive');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Archive);

		parent::tearDown();
	}

}
