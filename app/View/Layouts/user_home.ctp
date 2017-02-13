<?php $cakeDescription = 'NUCLEO'; ?>

<!DOCTYPE html>
<html>
	<head>
		<?php echo $this -> Html -> charset('UTF-8'); ?>
		<title><?php echo $cakeDescription ?>:
			Home
		</title>

		<?php 
			echo $this -> Html -> meta('icon');
			echo $this -> Html -> css(array('users_home', 'social-icons'));
			echo $this -> fetch('meta');
			echo $this -> fetch('css');
			echo $this -> fetch('script');
			echo $this -> fetch('script');
		?>

		<meta property="og:title" content="NÚCLEO: Home"/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content="http://ifgoiano.edu.br/urutai/seminfo2013/"/>
		<meta property="og:image" content="http://200.137.237.4/files/content/file/7/seminfo2013.png"/>
		<meta property="og:site_name" content="http://ifgoiano.edu.br/urutai/seminfo2013/"/>
		<meta property="og:description" content="O Câmpus Urutaí do Instituto Federal Goiano (IF Goiano) realizará durante os dias 21 a 24 de outubro, a Semana da Informática 2013 (SEMINFO). O evento será composto por  apresentação de palestras e minicursos e mesa redonda, na qual gestores de Tecnologia da Informação (TI) e analistas/desenvolvedores de sistemas discutirão sobre os desafios da profissão e o relacionamento entre estas duas áreas."/>
		<meta property="fb:app_id" content="79865798756498564" />
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
					
					<div id="section-1">
				      <?php echo $this->fetch('section-1') ?>
				    </div>
				    
				</div>
			</div>
			
			<div class='clearfix'></div>
			
			<!-- <div id="noticias">
				<div class="wrapper">
				<a href="#" id="prev-notic" style="left: 30px;"></a>
				<a href="#" id="next-notic"></a>
				<img id="bird" src="img/bird.png" alt="notics">
				<div id="notics">
					<ul class="notic_list"></ul>
				<ul class="notic_list"></ul></div>
				</div>
			</div> -->

			<div id="footer">
				<div class="wrapper">
					<?php echo $this -> element('footer', array('cache' => '+1 day')); ?>
				</div>
			</div>
			<?php echo $this->element('sql_dump'); ?>
			<div id="bottom">
				<div class="wrapper">
					<?php //echo $this -> element('bootom', array('cache' => '+1 day')); ?>
				</div>
			</div>
		</div>
	</body>
</html>
