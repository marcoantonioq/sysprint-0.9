<?php
Configure::write('Config.language', 'pt-br');
App::build(array('Locale' => array(dirname(__FILE__) . DS . '..' . 'Locale' . DS)));

function object_to_array($obj) {
   if (is_object($obj))
       $obj = get_object_vars($obj);
   return is_array($obj) ? array_map(__METHOD__, $obj) : $obj;
}

$appjson = @file_get_contents(APP."Config/app.json");
$config = object_to_array(json_decode($appjson));
Configure::write('Setting', $config['Setting']);

class DATABASE_CONFIG {
	public $default;
	public function DATABASE_CONFIG()
	{
		$data = Configure::read('Setting.DATA');
		$data['password'] = base64_decode($data['password']);
		$this->default = $data;
		Configure::write('Setting.DATA', '');
	}
}

class EmailConfig {
	public $default;
	public $smtp;
	public function EmailConfig()
	{
		$data = Configure::read('Setting.EMAIL');
		$data['password'] = base64_decode($data['password']);
		$this->default = $data;
		$this->smtp = $data;
		Configure::write('Setting.EMAIL', '');
	}
}
