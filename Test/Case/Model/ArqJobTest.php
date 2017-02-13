<?php
App::uses('ArqJob', 'Model');

/**
 * ArqJob Test Case
 *
 */
class ArqJobTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.arq_job'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ArqJob = ClassRegistry::init('ArqJob');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArqJob);

		parent::tearDown();
	}

}
