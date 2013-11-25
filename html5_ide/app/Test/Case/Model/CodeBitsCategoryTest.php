<?php
/* CodeBitsCategory Test cases generated on: 2012-01-15 20:30:04 : 1326655804*/
App::uses('CodeBitsCategory', 'Model');

/**
 * CodeBitsCategory Test Case
 *
 */
class CodeBitsCategoryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.code_bits_category', 'app.code_bit');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->CodeBitsCategory = ClassRegistry::init('CodeBitsCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CodeBitsCategory);

		parent::tearDown();
	}

}
