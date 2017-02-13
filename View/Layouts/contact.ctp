<?php $cakeDescription = 'NUCLEO'; ?>

<!DOCTYPE html>
<html>
	<head>
		<?php echo $this -> Html -> charset('UTF-8'); ?>
		<title><?php echo $cakeDescription ?>:
			<?php echo $title_for_layout; ?></title>
		<?php echo $this -> Html -> meta('icon');

		echo $this -> Html -> css('contact');
		//echo $this -> Html -> css('users');

		echo $this -> fetch('meta');
		echo $this -> fetch('css');
		echo $this -> fetch('script');
		echo $this -> fetch('script');
	?>
	</head>
	<body>

		<div id="container">
			<div id="header">
				<div class="wrapper">
					<?php echo $this -> element('layout/logo', array('cache' => '+1 day')); ?>
					
					<?php echo $this -> element('layout/session-user', array('cache' => '+1 day')); ?>
				</div>
			</div>
			
			<?php echo $this -> element('users_menu', array('cache' => '+1 day')); ?>

			<div class='clearfix'></div>
			
			<div class="wrapper">
				<div id="content">
					<?php // echo $this->Html->nestedList($menu); ?>
					<?php echo $this -> Session -> flash(); ?>
					<?php echo $this -> Session -> flash('auth'); ?>
	
					<?php echo $this -> fetch('content'); ?>
				</div>
			</div>
			
			<div id="footer">
				<div class="wrapper">
					<?php echo $this -> element('footer', array('cache' => '+1 day')); ?>
					<?php echo $this->element('sql_dump'); ?>
				</div>
			</div>
			
			<div id="bottom">
				<!-- wrapper-bottom -->
				<div class="wrapper">
					<?php echo $this -> element('bootom', array('cache' => '+1 day')); ?>
				</div>
				<!-- ENDS wrapper-bottom -->
			</div>
		</div>
	</body>
</html>
