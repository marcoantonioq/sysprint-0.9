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
		$data['AD']['ldap_pass'] = base64_encode($data['AD']['ldap_pass']);
		$data['EMAIL']['password'] = base64_encode($data['EMAIL']['password']);
		$data['DATA']['password'] = base64_encode($data['DATA']['password']);
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents(APP."Config/app.json", $data);
	}
	public function readjson()
	{
		$appjson = file_get_contents(APP."Config/app.json");
		$appjson = json_decode($appjson);
		$data = $this->object_to_array($appjson);
		$data['AD']['ldap_pass'] = base64_decode($data['AD']['ldap_pass']);
		$data['EMAIL']['password'] = base64_decode($data['EMAIL']['password']);
		$data['DATA']['password'] = base64_decode($data['DATA']['password']);
		return $data;
	}
}
