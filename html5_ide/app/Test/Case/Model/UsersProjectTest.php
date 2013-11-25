<?php
/* UsersProject Test cases generated on: 2011-11-25 12:44:04 : 1322221444*/
App::uses('UsersProject', 'Model');

/**
 * UsersProject Test Case
 *
 */
class UsersProjectTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.users_project', 'app.project', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->UsersProject = ClassRegistry::init('UsersProject');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersProject);

		parent::tearDown();
	}

}
