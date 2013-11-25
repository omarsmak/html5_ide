<?php
/* OmarTest Test cases generated on: 2011-11-20 15:15:22 : 1321798522*/
App::uses('OmarTest', 'Model');

/**
 * OmarTest Test Case
 *
 */
class OmarTestTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.omar_test');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->OmarTest = ClassRegistry::init('OmarTest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OmarTest);

		parent::tearDown();
	}

}
