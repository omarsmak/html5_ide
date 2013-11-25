<?php
/* CodeBitCategory Test cases generated on: 2012-01-15 20:38:03 : 1326656283*/
App::uses('CodeBitCategory', 'Model');

/**
 * CodeBitCategory Test Case
 *
 */
class CodeBitCategoryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.code_bit_category', 'app.code_bit', 'app.code_bits_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->CodeBitCategory = ClassRegistry::init('CodeBitCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CodeBitCategory);

		parent::tearDown();
	}

}
