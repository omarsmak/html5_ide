<?php
/* CodeBit Test cases generated on: 2012-01-15 20:33:48 : 1326656028*/
App::uses('CodeBit', 'Model');

/**
 * CodeBit Test Case
 *
 */
class CodeBitTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.code_bit', 'app.code_bits_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->CodeBit = ClassRegistry::init('CodeBit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CodeBit);

		parent::tearDown();
	}

}
