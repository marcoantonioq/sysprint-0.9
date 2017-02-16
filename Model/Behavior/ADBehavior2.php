<?php

class ADBehavior extends ModelBehavior {

	/**
	 * Instância de classe AD
	 * @var object
	 */
	private $ldap_host = "10.8.0.10";
    private $ldap_port = "389";
    private $base_dn = "OU=IFG,DC=ifg,DC=br";
    private $ldap_user ="";
    private $ldap_pass = "";
	private $suffix = '@ifg.br';
    private $attr = array("name", "displayname", "mail", "mobile", "homephone", "telephonenumber", "streetaddress", "postalcode", "physicaldeliveryofficename", "l", "group");
    private $filter = "&(objectClass=user)(!(extensionattribute2=*Aluno*))";


	function __construct() {

		$connect = ldap_connect( $this->ldap_host, $this->ldap_port);


	    pr($user);

   }

	private function getUserAD($username = null){

    	$filter = "($this->filter(name={$username}))"; // username
    	//pr($filter);
    	//exit;

	    $connect = ldap_connect( $this->ldap_host, $this->ldap_port);
	    ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);

	    $bind = ldap_bind($connect, $this->ldap_user, $this->ldap_pass); // or die("Erro bind");
	    $read = ldap_search($connect, $this->base_dn, $filter, $this->attr); // or die("Erro search");

	    $user = ldap_get_entries($connect, $read);

	    ldap_close($connect);
	    // ldap_unbind($connect);

	    return $user;
	}

	public function getUser(Model $Model, $username = null){
		return $this->getUserAD($username);
	}



	public function sycAD(Model $Model, $users = array()){

		foreach ($users as $key => $user) {
			if (empty($user['User']['username']))
				continue;

			$userAD = $this->getUserAD($user['User']['username']);

			if (!empty($userAD['0']['displayname']['0']))
				$users[$key]['User']['name'] = $userAD['0']['displayname']['0'];
			if (!empty($userAD['0']['mail']['0']))
				$users[$key]['User']['email'] = $userAD['0']['mail']['0'];
			// pr($userAD);
		}
		// pr($users); exit;
		foreach ($users as $key => $user) {
			$Model->save($user);
		}
		return $users;
	}

	public function authUser(Model $Model, $username = null, $pass = null) {

		$user = $this->getUserAD($username);

		if (empty($user['0']['displayname']['0']))
			return false;

		$connect 	= ldap_connect( $this->ldap_host, $this->ldap_port);
		ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
		$ldap_bind 	= @ldap_bind($connect, "{$username}{$this->suffix}", $pass);

		ldap_close($connect);
		return $ldap_bind;
	}
}
