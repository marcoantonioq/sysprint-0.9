<?php
App::uses('AppModel', 'Model');
/**
 * Printer Model
 *
 * @property Job $Job
 */
class Printer extends AppModel {
	public $displayFild = 'name';
	public $order = array('name'=>'asc');

	public $actsAs = array(
			'Lpadmin' => array()
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
	);

	public $hasMany = array(
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'printer_id',
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
		'User' => array(
			'className' => 'User',
			'joinTable' => 'users_printers',
			'foreignKey' => 'printer_id',
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

	public function get_ID($name){
		$print_id = key($this->find('list', array(
			'conditions'=>array('Printer.name'=>$name)
		)));
		if(empty($print_id)){
			$data = array('Printer' => array('name'=>$name));
			$this->save($data);
			$print_id = key($this->find('list', array(
				'conditions'=>array('Printer.name'=>$name)
			)));
		}
		return $print_id;
	}


	## Verificando a fila de impressão:
	# lpq -Pimp01

	// Removendo um trabalho da fila de impressão:
	# lprm -Pimp01 5
	// O 5 é o número do job na fila de impressão

	##Removendo todos os jobs da fila de impressÃo
	#lprm -P –
	#Obs.: Ao rejeitar a impressora, não imprime e nem manda as impressões para a fila. Rejeita as impressões.

	## Liberar impressora por usuário/grupo:
	# lpadmin -p impressora -u allow:all
	#(libera a impressora para todos usuários)

	# lpadmin -p impressora -u allow:user1,user2
	#(liberar a impressora apenas para o user1 e user2)

	# lpadmin -p impressora -u deny:user1,user2
	#(bloqueia a impressora para user1 e user2)

	# lpadmin -p impressora -u deny:user1,grupo2
	#(bloqueia a impressora para user1 e grupo2)

}
