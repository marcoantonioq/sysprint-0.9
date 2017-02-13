<?php
Configure::write('Config.language', 'pt-br');
App::build(array('Locale' => array(dirname(__FILE__) . DS . '..' . 'Locale' . DS)));

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
