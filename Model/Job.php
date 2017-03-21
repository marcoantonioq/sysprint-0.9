<?php
App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class Job extends AppModel {

	// public $displayFild = 'name';
	public $order = array('date'=>'desc');

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
		'date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
			),
		),
		'pages' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				),
		),
	);


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


	public function beforeFind($results, $primary = false)
	{

	}
	public function afterFind($results, $primary = false)
	{
	// 	foreach ($results as $key => $val) {
	// 		if (isset($results[$key]['date'])) {
	// 			$results[$key]['date'] = $this->dateFormatAfterFind($val['date']);
	// 			continue;
	// 		}
	// 		foreach ($val as $k => $v) {
	// 			if (isset($results[$key][$k]['date'])) {
	// 				//$results[$key][$k]['date'] = $this->dateFormatAfterFind($v['date']);
	// 				break;
	// 			}
	// 		}
	// 	}
	//
	// 	$results['User'] = array();
	//
	// 	$total = 0;
	// 	foreach ($results as $key => $job) {
	// 		if (!empty($results[$key]['Job'])) {
	//
	// 			if (!isset($results['User'][$job['User']['name']])) {
	// 				$results['User'][$job['User']['name']] = array();
	// 				$results['User'][$job['User']['name']]['total_pages'] = 0;
	// 			}
	//
	// 			if (!isset($results['Printer'][$job['Printer']['name']])) {
	// 				$results['Printer'][$job['Printer']['name']] = array();
	// 				$results['Printer'][$job['Printer']['name']]['total_pages'] = 0;
	// 			}
	//
	// 			if (!isset( $results['Results'] )){
	// 				$results['Results'] = array();
	// 				$results['Results']['total'] = 0;
	// 			}
	//
	// 			$results['User'][$job['User']['name']]['total_pages'] += $job['Job']['pages'] * $job['Job']['copies'];
	// 			$results['Printer'][$job['Printer']['name']]['total_pages'] += $job['Job']['pages'] * $job['Job']['copies'];
	// 			$results['Results']['total'] += $job['Job']['pages'] * $job['Job']['copies'];
	// 		}
	// 	}
	// 	return $results;
	}
}
