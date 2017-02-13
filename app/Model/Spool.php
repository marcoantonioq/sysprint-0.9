<?php
App::uses('AppModel', 'Model');
/**
 * Spool Model
 *
 * @property User $User
 * @property Printer $Printer
 */
class Spool extends AppModel {
	public $useTable = false;
	public $order = array("Spool.updated"=>"DESC");

	public $actsAs = array('Convert');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'printer_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'page' => array(
			'page' => array(
				'rule' => array('page_ranges'),
				'message' => 'Intervalo inválido',
				'allowEmpty' => true,
			),
		),
		'file' => array(
			'type' => array(
				'rule'=> array("typeFile"),
				'message' =>'Arquivo enviado é inválido!'
			),
			// 	'rule' => array('notEmpty'),
			// 	'message' => 'Selecione arquivo',
			// 	'allowEmpty' => false,
			// 	//'required' => false,
			// 	//'last' => false, // Stop validation after this rule
			// 	//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
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
		),
		'Printer' => array(
			'className' => 'Printer',
			'foreignKey' => 'printer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

		public function params($data)
		{
			pr($data);
			$params = " -o fit-to-page";
			if (!empty($data['Spool']['copies']))
				$params .= " -n {$data['Spool']['copies']}";
			if (!empty($data['Spool']['pages']))
				$params .= " -o page-ranges={$data['Spool']['pages']}";
			if (!empty($data['Spool']['double_sided']))
				$params .= " -o sides={$data['Spool']['double_sided']}";
			if (!empty($data['Spool']['page_set']))
				$params .= " -o page-set={$data['Spool']['page_set']}";
			if (!empty($data['Spool']['media']))
				$params .= " -o media={$data['Spool']['media']}";
			if (!empty($data['Spool']['orientation']))
				$params .= " -o orientation-requested={$data['Spool']['orientation']}";
			return $params;
		}

	public function page_ranges($data)
	{
		$search = array("/"," ",":",";");
		$this->data['Spool']['page'] = str_replace($search, ",",  $this->data['Spool']['page']);
		return true;
	}

	public function sendPrint($data){

		$error_log = "";
		$this->User->recursive = -1;
		$this->Printer->recursive = -1;
		$user = $this->User->read(array('name', 'email', 'username'), $data['Spool']['user_id']);
		$print = $this->Printer->read(array('name'), $data['Spool']['printer_id']);
		$params = $this->params($data);
		// adicionar o ip de origem

		foreach ($data['Spool']['file'] as $key => $file) {
			$path = $this->convertTo($file); 
			
			if ($path) {
				$comand = "lp -U {$user['User']['username']} -d {$print['Printer']['name']} $params $path";
				// pr($comand); exit;
				if (shell_exec($comand)) {
					$error_log .= "Impressão enviada: {$file['name']}<br>";
				} else {
					$error_log .= "<a style='color:red'>Erro<a> ao enviar a impressão: {$file['name']}<br>Procure o administrador: Quota limit reached.";
				}
			}
		}
		return $error_log;
	}

}
