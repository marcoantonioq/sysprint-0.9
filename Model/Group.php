<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 * @property User $User
 */
class Group extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'quota' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

		public function afterSave($created, $options = array())
		{
			// $this->User->updateAll(
			// 	array("quota"=>$this->data['Group']['quota']),
			// 	array("id"=>$this->data['User']['User'])
			// );
			// foreach ($this->data['User']['User'] as $key => $id) {
			// 	// $this->User->id = $id;
			// 	if($this->User->saveField('quota', $this->data['Group']['quota'])){
			// 		echo "Echo update ok";
			// 	}
			// 	pr($this->User->read());
			// }
			// pr($this->data['Group']['quota']);
			// exit;
			return true;
		}
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'users_groups',
			'foreignKey' => 'group_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
