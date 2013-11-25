<?php
/* TreeFile Test cases generated on: 2011-12-26 22:13:55 : 1324934035*/
App::uses('TreeFile', 'Model');

/**
 * TreeFile Test Case
 *
 */
class TreeFileTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.tree_file');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->TreeFile = ClassRegistry::init('TreeFile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TreeFile);

		parent::tearDown();
	}

}
