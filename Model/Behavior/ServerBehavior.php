<?php

class ServerBehavior extends ModelBehavior {
  public static $awk;
  public static $ifconfig;
  public static $ip;
  public static $lscpu;
  public static $netstat;
  public static $sort;
  public static $uniq;
  public static $mpstat;



	protected $_configuration = array(
	);

	public function __construct($configuration = array()) {
    self::$awk = exec("command -v awk");
    self::$ifconfig = exec("command -v ifconfig");
    self::$ip = exec("command -v ip");
    self::$lscpu = exec("command -v lscpu");
    self::$netstat = exec("command -v netstat");
    self::$sort = exec("command -v sort");
    self::$uniq = exec("command -v uniq");
    self::$mpstat = exec("command -v mpstat");

	}

	public function info() {
		return array(
			"hostname" => $this->hostname(),
			"getDate" => $this->getDate(),
			"getTime" => $this->getTime(),
			"disk" => $this->disk(),
			"getNetConnection" => $this->getNetConnection(),
			"swap" => $this->swap(),
			"diskStats" => $this->diskStats(),
			"getIP" => $this->getIP(),
			"loadavg" => $this->loadavg(),
			"logged_in_accounts" => $this->logged_in_accounts(),
			"memory_info" => $this->memory_info(),
			"ram_intensive_processes" => $this->ram_intensive_processes(),
      "cpu" => $this->cpu(),
			"mpstat" => $this->mpstatCPU(),
			"servicesStatus" => $this->servicesStatus(array(
				"systemctl"=>array(
          'smb' => 'Servidor samba',
          'cups' => 'Servidor cups',
          'httpd' => 'Servidor pache',
        ),
				// "grep"=>array(
    //       'shell/service' => 'IFPrint service',
    //     ),
        "config"=>array(
          '/etc/crontab' => 'shell/service',
        )
			)),
		);
	}

	public function hostname() {
		return php_uname( 'n' );
	}

	public function getDate() {
      return shell_exec('/bin/date +"%d/%m/%Y"');
  }

	public function getTime() {
      return date("h:i A", strtotime(shell_exec('/bin/date +"%H:%m"')));
  }

	public function disk() {
		exec('/bin/df -Ph | awk \'BEGIN {OFS=","} {print $1,$2,$3,$4,$5,$6}\'', $result);
    $data = array();
    if (!$result) {$result = array();}
    $x = 0;
    foreach ($result as $a) {
        if ($x==0) {
            $x++;
            continue;
        }
        $data[] = explode(',', $result[$x]);
        unset($result[$x], $a);
        $x++;
    }
    return $data;
  }

	public function getNetConnection() {
		exec(self::$netstat." -ntu | ".self::$awk." 'NR>2 {print $5}' | ".self::$sort."  | ".self::$uniq." -c", $result);
    // pr($result); exit;
		return $result;
	}

	public function swap() {
    $result=array();
		exec(
	      '/bin/cat /proc/swaps | /usr/bin/tail -n +2 | '.
	      '/usr/bin/awk \'{print $1","$2","$3","$4","$5}\'',$result
	  );
		return $result;
	}

	public function diskStats(){
		exec(
        '/bin/cat /proc/diskstats | '.
        '/usr/bin/awk \'{print $1","$2","$3","$4","$5","$6","$7","$8","$9","$10","$11","$12","$13","$14}\'',
        $result
    );
		return $result;
	}

	public function getIP(){
		$command= self::$ip.' -oneline link show | /usr/bin/awk \'{print $2}\' | /bin/sed "s/://"';
    $result = array();
    exec($command, $result, $error);
		foreach ($result as $key => $eth) {
			$ip = null;
			$command= self::$ip.' -4 -o addr show dev '.$eth.' | grep "inet " | awk \'{split($4,a,"/");print a[1]}\'';
			exec($command, $ip);
			// $ipconfig[$eth] = $ip[0];
		}
		// return $ipconfig;
	}

	public function loadavg() {
      exec('/bin/grep -c ^processor /proc/cpuinfo', $resultNumberOfCores);
      $numberOfCores = $resultNumberOfCores[0];

      exec(
          '/bin/cat /proc/loadavg | /usr/bin/awk \'{print $1","$2","$3}\'',
          $resultLoadAvg
      );
      $loadAvg = explode(',', $resultLoadAvg[0]);

      $data = array_map(
          function ($value, $numberOfCores) {
              return array($value, (int)($value * 100 / $numberOfCores));
          },
          $loadAvg,
          array_fill(0, count($loadAvg), $numberOfCores)
      );

      return $data;
  }

	public function logged_in_accounts($args=array()) {

    // change username column length for w command
    putenv("PROCPS_USERLEN=20");

    exec(
        'PROCPS_FROMLEN=40 /usr/bin/w -h |' .
        ' /usr/bin/awk \'{print $1","$3","$4","$5}\'',
        $result
    );

    if (!$result) {
        $result = array();
    }

    $data = array();

    $x = 0;
    foreach ($result as $a) {
        $temp = explode(',', $result[$x]);

        $data[] = array(
            'user' => $temp[0],
            'from' => $temp[1],
            'last_login' => $temp[2],
            'idle' => $temp[3],
        );

        unset($result[$x],$a);
        $x++;
    }

    return $data;
	}

	public function memory_info($args=array()) {
		$data = array();

		exec(
        "/bin/cat /proc/meminfo",
        $result
    );

    if (!$result) {
        $result = array();
    }

		foreach ($result as $a) {
			$p = explode(':', $a);
      if(substr($p[1], -2) === 'kB') {
          $number = intval(substr($p[1], 0, -2));
          $number_formatted = number_format($number);
          $number_formatted_with_units = (string)$number_formatted . ' kB';
          $p[1] = $number_formatted_with_units;
      }
			$data[$p[0]] = $p[1];
    }
		return $data;
  }

	public function ram_intensive_processes($args=array()) {

    exec(
        '/bin/ps axo pid,user,comm,pmem,rss,vsz --sort -pmem,-rss,-vsz | head -n 15 | /usr/bin/awk ' .
            "'{print ".
            '$1","$2","$3","$4","$5","$6}'.
            "'",
        $result
    );

    if (!$result) {
        $result = array();
    }

    $data = array();

    $x = 0;
    foreach ($result as $a) {
        $temp = explode(',', $result[$x]);

        $data[] = array(
            'pid' => $temp[0],
            'user' => $temp[1],
            'command' => $temp[2],
            'per' => $temp[3],
            'rss' => $temp[4],
            'vsz' => $temp[5],
        );

        unset($result[$x],$a);
        $x++;
    }

    array_shift($data); // remove header row
    return $data;
	}

	public function cpu() {
		exec(self::$lscpu,$result);
    $result = array_filter($result);

    // pr($result); exit;

		foreach ($result as $a) {
			$p = explode(':', $a);
	    $data[$p[0]] = $p[1];
		}
		return $data;
  }

  public function servicesStatus( $args = array() ){
    $return = array();
    if(isset($args['grep']))
    foreach ($args['grep'] as $service => $desc) {
      $return[$service] = array($this->grepStatus($service), $desc);
    }
    if(isset($args['config']))
    foreach ($args['config'] as $service => $desc) {
      $return[$service] = array($this->configStatus($service, $desc), $desc);
    }
    if(isset($args['systemctl']))
    foreach ($args['systemctl'] as $service => $desc) {
      $return[$service] = array($this->systemcltStatus($service), $desc);
    }
    return $return;
  }

	public function systemcltStatus($args){
		exec("/bin/systemctl status  $args.service | /usr/bin/awk '{print $2}'",$result);
		return $result[2];
	}

  public function grepStatus($args){
    exec("/bin/ps aux | /bin/grep $args | /bin/grep -v grep &>/dev/null && echo active || echo inactive",$result);
    return $result[0];
  }
  public function configStatus($args, $desc){
    exec("cat $args | /bin/grep $desc &>/dev/null && echo config || echo noconfig",$result);
    return $result[0];
  }

  public function mpstatCPU(){
    $result = array();
    $command=self::$mpstat.' | awk \'{print $12}\' | tail -n1';
    exec($command, $result, $error);
    return $result;
  }



}
