<?php
App::uses('Spool', 'Model');

/**
 * Spool Test Case
 *
 */
class SpoolTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.spool',
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
		$this->Spool = ClassRegistry::init('Spool');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Spool);

		parent::tearDown();
	}

}
