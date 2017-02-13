<?php

class SettingBehavior extends ModelBehavior {


	function __construct() {
	}
	private static function object_to_array($obj) {
	   if (is_object($obj))
	       $obj = get_object_vars($obj);
	   return is_array($obj) ? array_map(__METHOD__, $obj) : $obj;
	}
	public function writejson($model, $data)
	{
		// pr($data['Setting']['DATA']);
		$data['Setting']['AD']['ldap_pass'] = base64_encode($data['Setting']['AD']['ldap_pass']);
		$data['Setting']['EMAIL']['password'] = base64_encode($data['Setting']['EMAIL']['password']);
		$data['Setting']['DATA']['password'] = base64_encode($data['Setting']['DATA']['password']);
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents(APP."Config/app.json", $data);
	}
	public function readjson()
	{
		
		$appjson = file_get_contents(APP."Config/app.json");
		$appjson = json_decode($appjson);
		$data = $this->object_to_array($appjson);
		$data['Setting']['AD']['ldap_pass'] = base64_decode($data['Setting']['AD']['ldap_pass']);
		$data['Setting']['EMAIL']['password'] = base64_decode($data['Setting']['EMAIL']['password']);
		$data['Setting']['DATA']['password'] = base64_decode($data['Setting']['DATA']['password']);
		// pr($data); exit;
		return $data;
	}
}
