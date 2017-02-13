<?php
App::uses('AppModel', 'Model');

/**
 * Archive Model
 *
 * @property User $User
 */
class Dashboard extends AppModel {
	public $useTable = false;

	public $actsAs = array(
	    'Setting' => array(),
	    'Server' => array(),
	);
}
