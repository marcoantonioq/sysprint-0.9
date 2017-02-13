<?php

class SettingComponent extends Component {


	protected $_appjson = array();

	public function __contruct($configuration = array()) {

	}

	public function hostname() {
		return php_uname( 'n' );
	}

	public function getSettings() {
		$this->appjson = file_get_contents(APP."Config/app.json");
		$config['IFPrint'] = json_decode($appjson);
		pr($config['IFPrint']);
	}


}
