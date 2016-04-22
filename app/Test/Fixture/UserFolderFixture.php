<?php
/**
 * UserFolderFixture
 *
 */
class UserFolderFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'user_folder';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'id of login table'),
		'login_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'id of login table'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'utf8_general_ci', 'comment' => 'original user file name', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'information about user file', 'charset' => 'utf8'),
		'enc_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'utf8_general_ci', 'comment' => 'encrypted user file name', 'charset' => 'utf8'),
		'width' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => 'width of user file', 'charset' => 'utf8'),
		'height' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => 'height of user file', 'charset' => 'utf8'),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'comment' => 'user file type', 'charset' => 'utf8'),
		'status' => array('type' => 'string', 'null' => false, 'default' => 'f', 'length' => 1, 'collate' => 'utf8_general_ci', 'comment' => 't=true, f=false', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'when user file created'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'when user file modified'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'login_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'enc_name' => 'Lorem ipsum dolor sit amet',
			'width' => 'Lorem ipsum dolor ',
			'height' => 'Lorem ipsum dolor ',
			'type' => 'Lorem ipsum dolor sit amet',
			'status' => 'Lorem ipsum dolor sit ame',
			'created' => '2015-05-10 13:51:31',
			'modified' => '2015-05-10 13:51:31'
		),
	);

}
