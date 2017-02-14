<?php
App::uses('AppModel', 'Model');

class Update extends AppModel {
	public $useTable = false;

	public function AutoUpdate($value='')
	{
		// Backups
		$patch="/app/tmp/backup_`date +%Y-%m-%d_%H`";
		$command = "mkdir ".ROOT."$patch; cp -rf ".ROOT."/app/{Config,Controller,Vendor,Model,View,Console,webroot} ".ROOT.$patch;
		exec($command, $result, $error);

		// Repositorio gitHub
		$command = "cd ".ROOT."/app/ &&  git fetch origin; git reset --hard HEAD; git reset --hard origin/master; git pull; git fetch --tag";
		pr($command); exit;
		exec( $command, $result);
	}
	
}
