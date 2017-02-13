<?php
App::uses('AppController', 'Controller');

class ChartController extends AppController {

	
	public function index() {
		
	}

	public function anual($datasets=null)
	{
		$charts_anual = $this->Chart->query("select MONTH(jobs.date) as month, sum(jobs.pages*jobs.copies) as total_pages from jobs group by MONTH(date);");
		$this->set(compact('charts_anual'));
	}

	public function user($datasets=null)
	{	
	}

	public function printers($datasets=null)
	{
		$charts_printer = $this->Chart->query("SELECT name, total_pages FROM prints.vw_charts_printer as charts_printer ORDER BY total_pages LIMIT 30");
		$this->set(compact('charts_printer'));
	}

	public function mensal($datasets=null)
	{
		if(isset($datasets)){
			
		}
	}
}
