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

$config = array();