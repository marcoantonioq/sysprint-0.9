<?php 

// $numero_dia = date('w')*1;
// $dia_mes = date('d');
// $numero_mes = date('m')*1;
// $ano = date('Y');
// $dia = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
// $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
// echo $dia[$numero_dia] . ", " .$dia_mes . " de " . $mes[$numero_mes] . " de " . $ano . ".";

App::uses('AppHelper', 'View/Helper'); 
class DateHelper extends AppHelper {
	public $helpers = array('Html', 'Form');

	
	public function moun($datetime = "", $format = "Y/m/d H:m")
	{
		if(empty($datetime))
		{
			return date($format);
		}
		else
		{
			return date($format, strtotime($datetime));
		}
	}

	

	public function date($date=null, $format = "Y/m/d")
	{
		if(empty($date))
		{
			return date($format);
		}
		else
		{
			return date($format, strtotime($date));

		}
	}

	public function datetime($datetime = "", $format = "H:m Y/m/d")
	{
		if(empty($datetime))
		{
			return date($format);
		}
		else
		{
			return date($format, strtotime($datetime));
		}
	}

	public function datetime_local($date=null, $format = "Y/m/d\TH:m")
	{
		if(empty($date))
		{
			return date('Y-m-d\TH:00:00');
		}
		else
		{
			return date('Y-m-d\TH:m:00', strtotime($date));

		}
	}

	public function isToday($date, $date2=null)
	{
		$hoje = date('Ymd');
		$date1 = date('Ymd', strtotime($date));

		if ($date1 == $hoje) {
			return true;
		}
	}
} 
?>