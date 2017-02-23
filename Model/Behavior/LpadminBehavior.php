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
	public function getConfigPrinter($printer='')
	{
		$config = @file_get_contents("/etc/cups/printers.conf");
		pr($config); exit;
	}


}
