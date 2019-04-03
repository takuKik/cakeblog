<?php
/**
 * PostalCode Fixture
 */
class PostalCodeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'jiscode' => array('type' => 'string', 'null' => false, 'length' => 6, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'zipcode' => array('type' => 'decimal', 'null' => false, 'default' => '0.0000000', 'length' => '8,7', 'unsigned' => true, 'key' => 'index'),
		'state' => array('type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'city' => array('type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'street' => array('type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'changed' => array('type' => 'tinyinteger', 'null' => false, 'default' => '0', 'length' => 3, 'unsigned' => true),
		'cause' => array('type' => 'tinyinteger', 'null' => false, 'default' => '0', 'length' => 3, 'unsigned' => true),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'zipcode' => array('column' => 'zipcode', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB', 'comment' => '郵便番号')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'jiscode' => 'Lore',
			'zipcode' => '',
			'state' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'street' => 'Lorem ipsum dolor sit amet',
			'changed' => 1,
			'cause' => 1
		),
	);

}
