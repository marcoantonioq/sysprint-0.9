<?php
/**
 * JobFixture
 *
 */
class JobFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'print_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'pages' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'copies' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'host' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'file' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_jobs_users_idx' => array('column' => 'user_id', 'unique' => 0),
			'fk_jobs_prints1_idx' => array('column' => 'print_id', 'unique' => 0)
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
			'user_id' => 1,
			'print_id' => 1,
			'date' => '2014-09-19 07:43:05',
			'pages' => 1,
			'copies' => 1,
			'host' => 'Lorem ipsum dolor sit amet',
			'file' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-09-19 07:43:05',
			'updated' => '2014-09-19 07:43:05'
		),
	);

}
