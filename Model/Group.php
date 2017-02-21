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
			if(!empty($this->data['User']['User'])){
				$this->User->updateAll(
					array(
						'User.quota' => $this->data['Group']['quota'],
						'User.admin' => $this->data['Group']['admin']
					),
					array('OR'=>array(
						'User.id'=> $this->data['User']['User']
					))
				);
			}
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

	public function get_ID($name)
	{
		$name = strtoupper($name);
		$group_id = key($this->find('list', array(
			'recursive'=> -1,
			'conditions'=>array('Group.name'=>$name)
		)));

		if(empty($group_id)){
			$data = array('Group' => array(
				'name'=>$name,
				'quota'=>0,
			));
			$this->create();
			$this->save($data);
			echo "Criado: $name: {$this->id}<br>";
			$group_id = $this->id;
		}
		// echo "$name: $group_id<br>";
		return $group_id;
	}

}
