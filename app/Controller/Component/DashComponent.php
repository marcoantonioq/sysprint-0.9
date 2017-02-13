<?php

class DashComponent extends Component {

	protected $_configuration = array(
	);

	public function init($configuration = array()) {

	}

	public function hostname() {
		return php_uname( 'n' );
	}


}
