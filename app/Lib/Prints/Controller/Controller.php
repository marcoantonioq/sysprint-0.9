<?php

// include('../Config/Config.php');
print_r($_SERVER['PWD']);
echo "\n";
// print_r($_SERVER);
echo "\n";

class Controller {

/**
 * Constructor.
 */
	public function __construct($argv = null) {

		print_r($argv);

	}
}

new Controller($argv);