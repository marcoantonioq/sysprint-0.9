<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class ADBehavior extends ModelBehavior {

 	private static $ldap_host;
 	private static $ldap_port;
 	private static $base_dn;
 	private static $ldap_user;
 	private static $ldap_pass;
 	private static $suffix;
 	private static $attr;
 	private static $filter;
 	private static $connect;

	public function __construct($configuration = array()) {
	    $IFPrint = Configure::read('Setting.AD');
	    self::$ldap_host = $IFPrint['ldap_host'];
		self::$ldap_port = $IFPrint['ldap_port'];
		self::$base_dn = $IFPrint['base_dn'];
		self::$ldap_user = $IFPrint['ldap_user'];
		self::$ldap_pass = base64_decode($IFPrint['ldap_pass']);
		self::$suffix = $IFPrint['suffix'];	
		self::$attr = explode(",", $IFPrint['attr']);
		self::$filter = $IFPrint['filter'];
	}
	private static function startConect( ){
		// if(!ldap_bind(self::$connect, self::$ldap_user, self::$ldap_pass)){
			$connect = ldap_connect( self::$ldap_host, self::$ldap_port);
			ldap_set_option($connect, LDAP_OPT_NETWORK_TIMEOUT, 3);
			ldap_set_option($connect, LDAP_OPT_TIMELIMIT, 3);
			ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
			$bind = ldap_bind($connect, self::$ldap_user, self::$ldap_pass); // or die("Erro bind");
			self::$connect = $connect;			
		// }
	}



	// ------------ Public functions ------------- //

	public static function testConect(){
		$connect = @ldap_connect( self::$ldap_host, self::$ldap_port);
		ldap_set_option($connect, LDAP_OPT_NETWORK_TIMEOUT, 3);
		ldap_set_option($connect, LDAP_OPT_TIMELIMIT, 3);
		ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
		$bind = @ldap_bind($connect, self::$ldap_user, self::$ldap_pass);
		@ldap_close($connect);
		return $bind;
	}

	public static function ldapSearch($filter){
		self::startConect();
		$read = ldap_search(self::$connect, self::$base_dn, $filter, self::$attr); # or die("Erro search");
		$result = ldap_get_entries(self::$connect, $read);
		return $result;
	}
	
	public static function bindAD(Model $Model, $ldap_user, $ldap_pass){
		self::startConect();
		return (@ldap_bind(self::$connect, $ldap_user.self::$suffix, $ldap_pass))?true:false;
	}

	public function getUser($username){
	    $filter = "(".self::$filter."(name={$username}))"; // username
	    $user = self::ldapSearch($filter);
	    return $user;
	}

	public function sycAD(Model $Model, $users = array()){
		foreach ($users as $key => $user) {
			if (empty($user['User']['username']))
				continue;
      		$users[$key]['User']['name'] = $user['User']['username'];
			$userAD = $this->getUser($user['User']['username']);
			if (!empty($userAD['0']['displayname']['0']))
        	$users[$key]['User']['name'] = $userAD['0']['displayname']['0'];
			if (!empty($userAD['0']['mail']['0']))
				$users[$key]['User']['email'] = $userAD['0']['mail']['0'];
			if (!empty($userAD['0']['thumbnailphoto']['0'])) {				
				
				$finfo = new finfo(FILEINFO_MIME_TYPE);
				$mime = explode(';', $finfo->buffer($userAD['0']['thumbnailphoto']['0']));
				$users[$key]['User']['thumbnailphoto'] = "data:image/jpeg;base64," . base64_encode($userAD['0']['thumbnailphoto']['0']);
			}
		}
		foreach ($users as $key => $user) {
			unset($user["User"]["password"]);
			unset($user["User"]["status"]);
			$Model->save($user);
		}
		// pr($users); exit;
		return $users;
	}

	public function __destruct(){
		@ldap_close(self::$connect);
	}
}
