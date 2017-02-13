<?php
class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
		'from' => 'you@localhost',
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('ifgcordigoias@gmail.com' => 'Cordi Goiás'),
		'host' => 'ssl://smtp.gmail.com',
		'port' => 465,
		'timeout' => 30,
		'username' => 'ifgcordigoias@gmail.com',
		'password' => '',
		//'client' => null,
		//'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
}
