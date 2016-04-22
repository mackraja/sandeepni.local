<?php
App::uses('UserFolder', 'Model');

/**
 * UserFolder Test Case
 *
 */
class UserFolderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_folder'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserFolder = ClassRegistry::init('UserFolder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserFolder);

		parent::tearDown();
	}

}
