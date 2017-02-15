<?php
App::uses('AppModel', 'Model');

class Update extends AppModel {
	public $useTable = false;

	public function AutoUpdate($value='')
	{
		$command = "cd ".ROOT."/app/; git tag | tail -n 1";
		exec($command, $last_version);

		// Backups3
		$patch="/app/tmp/backup_`date +%Y-%m-%d`".$last_version;
		$command = "mkdir ".ROOT."$patch; cp -rf ".ROOT."/app/{Config,Controller,Vendor,Model,View,Console,webroot} ".ROOT.$patch;
		exec($command, $result, $error);

		// Repositorio gitHub
		$command = "cd ".ROOT."/app/; git reset --hard HEAD; git reset --hard origin/master; git fetch; git pull --tag";
		exec( $command, $result);
		return $result;
	}

}
