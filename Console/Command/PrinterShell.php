<?php

class PrinterShell extends AppShell {
  public $uses = array('User', 'Printer', 'Job', 'Server');

  public function main() {

  }
  public function reloadLog() {
      $yer = date("Y");
      $day = date("m-d");
      $CUPS_CONF = $this->Printer->getSetting();

      $dir_log = new Folder(ROOT."/app/Console/Command/shell/log/", true, 0755);
      $dir_yer = new Folder(ROOT."/app/Console/Command/shell/log/$yer", true, 0755);

      $page_log_system = new File($CUPS_CONF['PAGE_LOG']);
      if(!$page_log_system->exists()){
        return 0;
      }
      $page_log_tmp = new File("$dir_log->path/page_log", true, 0755);
      $page_error = new File("$dir_yer->path/$day-page_error", true, 0755);

      $conteudo = $page_log_system->read(); // lê arquivo cups_log
      $page_log_tmp->append($conteudo); // adiciona conteudo em arquivo tmp
      // $page_log_system->delete(); // limpa o cups_log
      // exec('echo ""> /var/log/cups/page_log');

      $page_log_system->close(); // fecha o arquivo

      $conteudo = $page_log_tmp->read(); // ler arquivo tmp (caso outra execução tenha falhado)
      $conteudo = explode("\n",$conteudo);
      $conteudo = array_unique($conteudo);


      foreach ($conteudo as $key => $job_json) {
        if (empty($job_json))
          continue;

        $job = json_decode($job_json, true);

        if (empty($job)){
          $page_error->append("\n$job_json");
          continue;
        }
        $time = str_replace(array("[", "]"), "",$job['time']);
        $time = preg_replace("/:/"," ",$time,1);
        $time = preg_replace("/\//","-",$time);
        $time = date("Y-m-d H:m:s", strtotime($time));
        $print_id = $this->Printer->get_ID($job['print']);
        $user_id = $this->User->get_ID($job['user']);

        if(empty($print_id) && empty($user_id) ){
          $page_error->append("\n$job_json");
          continue;
        }

        $job = @array('Job' => array(
          'id'=>$job['job'],
          'printer_id' => $print_id,
          'user_id' => $user_id,
          'date' => $time,
          'pages' => $job['pages'],
          'copies' => $job['copies'],
          'host' => "{$job['job-originating-host-name']}",
          'file' => "{$job['job-name']}",
          'params' => "{$job['media']} - {$job['media']}"
        ));
        if(!$this->Job->save($job)){
          $page_error->append("\n$job_json");
          continue;
        }
        $this->User->updateUsedMonth($user_id);
      }
      $page_log_tmp->delete(); // limpa o cups_log temporario
      $page_log_tmp->close();
      $page_error->close();
  }

  public function setCupsConf()
  {
    $CUPS_CONF = $this->Printer->getSetting();
    exec("sed -i '/^PageLogFormat*/d' {$CUPS_CONF['PATH']}");
    exec("sed -i '1 a PageLogFormat {\"print\": \"%p\",\"user\": \"%u\",\"job\": \"%j\",\"time\": \"%T\",\"pages\": \"%P\",\"copies\": \"%C\",\"job-billing\": \"%{job-billing}\",\"job-originating-host-name\": \"%{job-originating-host-name}\",\"job-name\":\"%{job-name}\",\"media\": \"%{media}\",\"sides\": \"%{sides}\"}' {$CUPS_CONF['PATH']};");
    exec("sed -i '/^LogLevel*/d' {$CUPS_CONF['PATH']};");
    exec("sed -i '2 a LogLevel debug2' {$CUPS_CONF['PATH']};");
    exec("systemctl restart cups", $result);
    exec("cat {$CUPS_CONF['PATH']}", $result);
    $this->out($result);
  }

}
