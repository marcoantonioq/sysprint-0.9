<?php
App::uses('AppModel', 'Model');

/**
 * Archive Model
 *
 * @property User $User
 */
class Archive extends AppModel {

	public $actsAs = array(
	    'Upload' => array(
	        'foto' => array(
	        	'field' => 'file',
	        	'field_dir' => 'file_dir',
	        )
	    )
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave($options = array())
	{
		// pr(shell_exec("sudo /usr/bin/lp -n 1 -o scaling=75 -o media=A4 -o landscape -o page-ranges=1 -d CODIR-20 /home/marco/teste.sh"));
		pr( shell_exec("ls -la") );
		pr( shell_exec("sudo ls") );
		// pr(shell_exec("ls"));
		exit;		
	}

	public function afterFind($results, $primary = false)
	{

		// $dir = new Folder(WWW_ROOT . 'img');
		// $files = $dir->find('.*\.png', true);

		// pr($files);

		// $directory = WWW_ROOT.'files'.DS.'Archive';
		// $files1 = array_diff(scandir($directory), array('..', '.'));
		// // $files1 = glob($directory);
		// pr($files1);

		// exit;

		// return $results;
	}
}
