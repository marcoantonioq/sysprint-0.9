<!DOCTYPE html>
 <html lang="en">
 <head>
 	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo __($title_for_layout); ?>
	</title>
	<?php 	
		// echo $this->Html->meta('icon');

		// echo $this->Html->script(
		// 	array(
		// 		'jquery.js',
		// 		'Administration.jquery-barcode-en13.js',
		// 	)
		// );

		// echo $this->fetch('meta');
		// echo $this->fetch('css');
		// echo $this->fetch('script');

	 ?>

	</head>
	<body>


		<?php echo $this->fetch('content'); ?>


	</body>
</html>