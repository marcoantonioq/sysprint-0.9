<?php

class LpadminBehavior extends ModelBehavior {

	// colocar configuração no json
	public static $CUPS_CONF = array(
		"PATH" => "/etc/cups/cupsd.conf",
		"PAGE_LOG" => "/var/log/cups/page_log",
	);

	public function getSetting()
	{
		return self::$CUPS_CONF;
	}

	public function setPrivileges(Model $User){

	    $users_allow = array(); // lista de usuários liberados
	    $users_deny = array(); // lista de usuários deny

	    // Lista com as impressoras
	    // $User->Printer->unbindModel(array(
	    // 	'hasMany' => array('Job')
	    // ), false );

	    $prints = $User->Printer->find('all', array(
	    	'recursive'=> 1,
	    	'fields' => array('Printer.id', 'Printer.allow', 'Printer.name'),
	    	'User' => array(
	    		'fields' => array('User.id')
	    	)
	    ));

	    pr($prints);

	    // foreach ($prints as $print) {

	    // 	if ($print['Printer']['allow']){
	    // 		$cmd = "/usr/sbin/lpadmin -p {$print['Printer']['name']} -u allow:all";
	    // 		pr($cmd); exec($cmd);
	    // 		continue;
	    // 	}

	    //   	// Padrão negado para todos usuários
	    // 	$cmd = "/usr/sbin/lpadmin -p {$print['Printer']['name']} -u deny:all";
	    // 	pr($cmd); exec($cmd);

	    //   	//  get lista de usuários
	    // 	foreach ( $print['User'] as $user) {
	    //     // verifica status do usuário
	    // 		if (!$user['status'])
	    // 			continue;
	    // 		$users_allow[] = $user['username'];
	    // 	}

	    // 	if (!empty($users_allow)) {
	    // 		$allow = implode(",", $users_allow);
	    // 		$cmd = "/usr/sbin/lpadmin -p {$print['Printer']['name']} -u allow:{$allow}";
	    // 		pr($cmd); exec($cmd);
	    // 		$users_allow = array();
	    // 	}
	    // }
	}


}
