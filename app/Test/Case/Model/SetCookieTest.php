<?php
App::uses('SetCookie', 'Model');

/**
 * SetCookie Test Case
 *
 */
class SetCookieTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.set_cookie'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SetCookie = ClassRegistry::init('SetCookie');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SetCookie);

		parent::tearDown();
	}

}
