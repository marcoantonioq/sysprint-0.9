<?php
class QuotaShell extends AppShell {
  
  public function main() {
  
  }

  public function setPrivilege() {
  	echo "asdas";
  	pr("setPrivilege");
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