<?php
/* IdeFile Test cases generated on: 2011-12-02 20:49:32 : 1322855372*/
App::uses('IdeFile', 'Model');

/**
 * IdeFile Test Case
 *
 */
class IdeFileTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.ide_file', 'app.project', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->IdeFile = ClassRegistry::init('IdeFile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->IdeFile);

		parent::tearDown();
	}

}
