<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Job $Job
 */
class User extends AppModel {
	public $displayFild = 'name';
	public $order = array('User.name'=>'asc');
	public $firstDay = '';

	public $actsAs = array(
	    'AD' => array(),
	    'Samba' => array(),
	);

	public $validate = array(
		'username' => array(
			'ruleRequired' => array(
	      'rule' => 'notEmpty',
	      'message' => 'Usuário inválido'
	    ),
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create',
				'message' => 'Usuário existente',
			)
		),
	);

	public static function firstDate($format='Y/m/01'){
		$this->firstDay = date('Y/m/01', strtotime('-1month'));
		return $this->firstDay;
	}

	public $hasMany = array(
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => array('Job.date'=>'desc'),
			'limit' => '30',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public $hasAndBelongsToMany = array(
		'Printer' => array(
			'className' => 'Printer',
			'joinTable' => 'users_printers',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'printer_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Group' => array(
			'className' => 'Group',
			'joinTable' => 'users_groups',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'group_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)

	);

	public function beforeSave($options = array())
	{
		if (empty($this->data['User']['name'])) {
			$this->data['User']['name'] = $this->data['User']['username'];			
		}

		if (isset($this->data['User']['password'])) {
			$this->data['User']['password'] = Security::hash($this->data['User']['password'], null, true);
		}
		return true;
	}
	public function afterSave($created, $options = array())
	{

	}

	public function updateUsedMonth($user_id)
	{
		$query = "
			UPDATE users SET
				users.month_count=(
					SELECT sum(jobs.pages*jobs.copies) as sum
			        FROM jobs
			        WHERE jobs.user_id={$user_id} AND jobs.created > DATE_SUB(NOW(), INTERVAL 30 DAY)
			        GROUP BY users.name LIMIT 1
				)
			WHERE
				users.id='{$user_id}'";
		// pr("updateUsedMonth: $query");
		return $this->query($query);
	}

	public function get_ID($username)
	{
		$username = strtolower($username);

		$user_id = key($this->find('list', array(
			'recursive'=> -1,
			'conditions'=>array('User.username'=>$username)
		)));

		if(empty($user_id)){
			$data = array('User' => array(
				'name' => $username,
				'username'=>$username,
			));
			$this->save($data);
			$user_id = key($this->find('list', array(
				'conditions'=>array('User.username'=>$username)
			)));
		}
		return $user_id;
	}

	public function userDeny($users=array())
	{
		pr($users);
	}

	public function userAllow($users=array())
	{
		pr($users);
	}

  public function AuthAD($data) {
  		if($this->bindAD($data['User']['username'], $data['User']['password']) ){
				$this->id = key($this->find('list', array(
					'conditions'=>array('User.username'=>$data['User']['username'])
				)));
				if($this->saveField("password",$data['User']['password'])){
					return true;
			}
		}
		return false;
	}
}
