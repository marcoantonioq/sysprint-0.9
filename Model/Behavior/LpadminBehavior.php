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

	public function setQuota(Model $User, $data){
		foreach ($data as $print) {
			// pr($print);
			$job_quota_period=(empty( $print['Printer']['job-quota-period'] ) ) ? 0 : $print['Printer']['job-quota-period'];
			$job_page_limit=(empty( $print['Printer']['job-page-limite'] ) ) ? 0 : $print['Printer']['job-page-limite'];
			$job_k_limit=(empty( $print['Printer']['job-k-limit'] ) ) ? 0 : $print['Printer']['job-k-limit'];
			$cmd = "/usr/sbin/lpadmin -p {$print['Printer']['name']} -o job-quota-period={$job_quota_period} -o job-k-limit={$job_page_limit} -o job-page-limit={$job_k_limit} ";
			exec($cmd, $result);
			// pr($cmd); pr($result);
		}
		// exit;
	}


}
