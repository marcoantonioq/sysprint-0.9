<?php
App::uses('AppModel', 'Model');

class Setting extends AppModel {
	public $useTable = false;

	public $actsAs = array(
	    'Setting' => array(),
	    // 'Server' => array(),
	    'AD' => array(),
	);

	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
			'tagline' => array(
				'rule' => 'isUnique',
				'required' => 'create',
				'message' => 'Usuário existente',
			)
		),
	);

	
}
