<?php 
App::uses('AppHelper', 'View/Helper'); 
class StatusHelper extends AppHelper {
	public $helpers = array('Html', 'Form');

	public function printer($status = false)
	{
		return ($status == 0) ? "Enviado...":"Imprimindo...";
	}
} 
?>