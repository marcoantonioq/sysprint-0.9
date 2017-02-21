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
      $appjson = json_decode(@file_get_contents(APP."Config/app.json"));
	    self::$ldap_host = $appjson->AD->ldap_host;
  		self::$ldap_port = $appjson->AD->ldap_port;
  		self::$base_dn = $appjson->AD->base_dn;
  		self::$ldap_user = $appjson->AD->ldap_user;
  		self::$ldap_pass = base64_decode($appjson->AD->ldap_pass);
  		self::$suffix = $appjson->AD->suffix;
  		self::$attr = explode(",", $appjson->AD->attr);
  		self::$filter = $appjson->AD->filter;
	}
	private static function startConect( ){
    try {
  			$connect = ldap_connect( self::$ldap_host, self::$ldap_port);
  			ldap_set_option($connect, LDAP_OPT_NETWORK_TIMEOUT, 3);
  			ldap_set_option($connect, LDAP_OPT_TIMELIMIT, 3);
  			ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
        $bind = @ldap_bind($connect, self::$ldap_user, self::$ldap_pass); // or die("Erro bind");
        self::$connect = $connect;
      } catch (Exception $e) { }
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
    $result=null;
    try {
      self::startConect();
      $read = ldap_search(self::$connect, self::$base_dn, $filter, self::$attr); # or die("Erro search");
      $result = ldap_get_entries(self::$connect, $read);
    } catch (Exception $e) {}
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
      try {

  			if (!empty($userAD['0']['displayname']['0']))
          	$users[$key]['User']['name'] = $userAD['0']['displayname']['0'];
  			if (!empty($userAD['0']['mail']['0']))
  				$users[$key]['User']['email'] = $userAD['0']['mail']['0'];
  			if (!empty($userAD['0']['thumbnailphoto']['0'])) {
  				$finfo = new finfo(FILEINFO_MIME_TYPE);
  				$mime = explode(';', $finfo->buffer($userAD['0']['thumbnailphoto']['0']));
  				$users[$key]['User']['thumbnailphoto'] = "data:image/jpeg;base64," . base64_encode($userAD['0']['thumbnailphoto']['0']);
  			}
        if ($userAD['0']['memberof']['count'] >= 1) {
          // pr($userAD['0']['memberof']);
          foreach ($userAD['0']['memberof'] as $group) {
            foreach (explode(',',$group) as $CNs) {
              $cn=explode('=',$CNs);
              if($cn[0]=="CN"){
                $users[$key]['Group']['Group'][]=$Model->Group->get_ID($cn[1]);
              }
            }
          }
        }
      } catch (Exception $e) {}
		}
		foreach ($users as $key => $user) {
			unset($user["User"]["status"]);
      unset($user["User"]["password"]);
      try {
        $Model->save($user);
      } catch (Exception $e) {}
		}
		return $users;
	}

	public function __destruct(){
		@ldap_close(self::$connect);
	}
}
