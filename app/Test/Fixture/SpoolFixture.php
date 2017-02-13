<?php
/**
 * SpoolFixture
 *
 */
class SpoolFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'printer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'pages' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'copies' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'host' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'file' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'params' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'printWebApp' => array('type' => 'boolean', 'null' => true, 'default' => '1', 'comment' => '0 - Stop
1 - Imprimir'),
		'status' => array('type' => 'integer', 'null' => true, 'default' => '1', 'unsigned' => false, 'comment' => '0 - Impresso
1 - Em trabalho'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_jobs_users_idx' => array('column' => 'user_id', 'unique' => 0),
			'fk_jobs_prints1_idx' => array('column' => 'printer_id', 'unique' => 0)
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
			'printer_id' => 1,
			'pages' => 1,
			'copies' => 1,
			'host' => 'Lorem ipsum dolor sit amet',
			'file' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'printWebApp' => 1,
			'status' => 1,
			'created' => '2014-11-21 10:38:35',
			'updated' => '2014-11-21 10:38:35'
		),
	);

}
