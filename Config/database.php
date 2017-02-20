<?php
Configure::write('Config.language', 'pt-br');
App::build(array('Locale' => array(dirname(__FILE__) . DS . '..' . 'Locale' . DS)));

function object_to_array($obj) {
   if (is_object($obj))
       $obj = get_object_vars($obj);
   return is_array($obj) ? array_map(__METHOD__, $obj) : $obj;
}
$appjson = @file_get_contents(APP."Config/app.json");
$config_json = object_to_array(json_decode($appjson));
// pr($config_json['SYSApp']);
// Configure::write('App.SYSApp', $config_json['SYSApp']);

// App::uses('ConnectionManager', 'Model');
$config_json['DATA']['password'] = base64_decode($config_json['DATA']['password']);
@ConnectionManager::create('default',$config_json['DATA']);


class EmailConfig {
	public $default;
	public $smtp;
	public function EmailConfig()
	{
		$data = Configure::read('EMAIL');
		$this->default = $data;
		$this->smtp = $data;
		Configure::write('EMAIL', '');
	}
}
