<?php
App::uses('AppModel', 'Model');
// App::uses('ConnectionManager', 'Model');


class Update extends AppModel {
	public $useTable = false;

	public function AutoUpdate($value='')
	{
		$command = "cd ".ROOT."/app/; git tag | tail -n 1";
		exec($command, $last_version);



		// Backups3
		$this->backupDB();
		$patch="/app/tmp/backup_`date +%Y-%m-%d`_v".$last_version[0];
		$command = "mkdir ".ROOT."$patch; cp -rf ".ROOT."/app/{Config,Controller,Vendor,Model,View,Console,webroot} ".ROOT.$patch;
		exec($command, $result, $error);

		// Repositorio gitHub
		$command = "cd ".ROOT."/app/; git fetch; git pull --tag; git reset --hard HEAD; git reset --hard origin/master; chmod 777 -R ./";
		exec( $command, $result);
		return $result;
	}

	public function backupDB($patch=""){
		$return=false;
		try {
			ConnectionManager::getDataSource('default');
			extract(ConnectionManager::$config->default);
			if (empty($patch)) {
				$patch="/app/tmp/backupDB_`date +%Y-%m-%d_%H-%M-%S`.sql";
			}
			$command = "`command -v mysqldump` -u $login --password=$password $database > ".ROOT.$patch;
			exec( $command, $result);
			$return=true;
		} catch (Exception $e) {}
		return $return;
	}


	public function restoreDBDefault($value='')
	{
		$this->backupDB();
		echo "iniciar reset";
		try {
			ConnectionManager::getDataSource('default');
			extract(ConnectionManager::$config->default);
			$patch="/app/Config/Schema/BD/sql.sql";
			$command = "`command -v mysqldump` -u $login --password=$password sysprints < ".ROOT.$patch;
			// exec( $command, $result);
			pr($command);
			pr($result);
			exit;
		} catch (Exception $e) {}
		exit;
	}
}
