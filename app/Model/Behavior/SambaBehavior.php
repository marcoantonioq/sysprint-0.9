<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class SambaBehavior extends ModelBehavior {

		
	public function __construct($configuration = array()) {


	}

	public function sambaUserADD(Model $Model, $user){
		pr($user);
		echo shell_exec("adduser --shell /bin/false --no-create-home teste");

		// exec("usermod -s /bin/false usuario")
		exit;
	}

}

