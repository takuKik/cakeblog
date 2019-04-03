<?php
App::uses('PostalCode', 'Model');

/**
 * PostalCode Test Case
 */
class PostalCodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.postal_code'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PostalCode = ClassRegistry::init('PostalCode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PostalCode);

		parent::tearDown();
	}

}
