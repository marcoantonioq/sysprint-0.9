<?php 
echo $this->Html->script(
		array(
			'jquery.js',
			'Administration.jquery-barcode-en13.js',
		)
	);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

 ?>

 pdf
 
<?php //echo $this->fetch('content'); ?>