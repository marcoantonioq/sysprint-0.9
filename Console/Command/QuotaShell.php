<?php
class QuotaShell extends AppShell {

  public $uses = array('User', 'Printer');

  public function main() {

  }

  public function setPrivilege() {
    $users_allow = array(); // lista de usuários liberados
    $users_deny = array(); // lista de usuários deny

    $prints = $this->User->Printer->find('all', array(
      'recursive'=> 1,
      'fields' => array(
        'Printer.id',
        'Printer.allow',
        'Printer.name',
        'job-quota-period',
        'job-page-limite',
        'job-k-limit',
      )
    ));

    pr($prints); exit;

    foreach ($prints as $print) {
      // Quota por impressora
      $job_quota_period=(empty( $print['Printer']['job-quota-period'] ) ) ? 0 : $print['Printer']['job-quota-period'];
			$job_page_limit=(empty( $print['Printer']['job-page-limite'] ) ) ? 0 : $print['Printer']['job-page-limite'];
			$job_k_limit=(empty( $print['Printer']['job-k-limit'] ) ) ? 0 : $print['Printer']['job-k-limit'];
			$cmd = "/usr/sbin/lpadmin -p '{$print['Printer']['name']}' -o job-quota-period={$job_quota_period} -o job-page-limit={$job_page_limit} -o job-k-limit={$job_k_limit}";
			exec($cmd, $result, $error); pr($cmd);

      // Impressoras Padrão negado para todos usuários
      $cmd = "/usr/sbin/lpadmin -p {$print['Printer']['name']} -u deny:all";
      pr($cmd); exec($cmd);
      if ($print['Printer']['allow']){
    		$cmd = "/usr/sbin/lpadmin -p {$print['Printer']['name']} -u allow:all";
        pr($cmd); exec($cmd);
    		continue;
    	}

      // Usuários

    	foreach ( $print['User'] as $user)
      {
        if ( !$user['status'] )
          continue;
          // verifica status do usuário e quota mês
        if ($user['month_count'] > $user['quota'])
          continue;
    		$users_allow[] = $user['username'];
    	}
      // se a lista não estiver vazia
    	if (!empty($users_allow)) {
    		$allow = implode(",", $users_allow);
    		$cmd = "/usr/sbin/lpadmin -p {$print['Printer']['name']} -u allow:{$allow}";
    		pr($cmd); exec($cmd);
    		$users_allow = array();
    	}
    }
  }
}

//  sudo rpcclient localhost -U suporte -c 'enumdrivers'
//  net rpc rights grant user1 SePrintOperatorPrivilege -U user1
// rpcclient localhost -U user1 -c 'enumdrivers'
// net rpc printer
// rpcclient localhost -U user1 -c 'setdriver "printername" "DriverName"'

// #!/bin/sh
// # net rpc rights grant 'Domain Admins' SePrintOperatorPrivilege -U'IFPRINT\suporte'
// # net rpc rights list accounts -U'IFPRINT\suporte'
// # rpcclient localhost -U suporte -c 'enumdrivers'
// # net rpc rights grant suporte SePrintOperatorPrivilege -U suporte
// # net rpc printer
// # smbcontrol all reload-config
// # systemctl restart smb

// [global]
// admin users = root, @adm, user1
// Now with authenticate with that user in Windows i was able to add drivers via the Windows-Printer-Wizard. After that I ran into the same problem as volkswagner. Via the windows dialog I wasn't able to associate the driver with the printer. This is where your two commands help.

// Code:
// rpcclient localhost -U user1 -c 'enumdrivers'
// from that listing you have to copy the exact name between the [] and associate the printer with the driver. The printer names can be listed via:

// Code:
// net rpc printer
// Code:
// rpcclient localhost -U user1 -c 'setdriver "printername" "DriverName"'

// case $1 in
//   start)
//     # users_allow=$(echo "SELECT username AS '' FROM prints.users WHERE status=1" | $querySql);
//     # users_allow=$(echo $users_allow | sed "s/ /,/");
//     ### /usr/sbin/lpadmin -p $print -u allow:all;
//     # lpadmin -p $print -u allow:$users_allow;
//     # echo "lpadmin -p $print -u allow:$users_allow";
//     # lpadmin -p $print -u deny:all

//     # Conta por periodo um mês e limite de pagina
//     # /usr/sbin/lpadmin -p $print -u allow:all -o job-quota-period=2592000 -o job-page-limit=0;

//     # bloqueado usuário
//     # /usr/sbin/lpadmin -p $print -u deny:pedro,thiago -u allow:root,suporte, marco ;

//   ;;
//   status)
//     echo 'Configurado';
//   ;;
//   *)
//     exit 2
// esac
// exit 0;
