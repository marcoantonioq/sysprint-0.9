<!DOCTYPE html>
<html>
<head>
<!--
/*******************************************************************************
  Sistema de impressão IFG Câmpus Cidade de Goias

  Distribuido sob domínio público.
  2015 Marco Antônio Queiroz <marco.queiroz@ifg.edu.br>
*******************************************************************************/

 * Tema IFG Câmpus Cidade de Goias
 *
 * Copyright 2015
 * Licensed free
 * http://www.ifg.edu.br/goias
 *
 * Desenvolvido por:
 *	Marco Antônio Queiroz
 *	Tec. de Tecnologia Da Informação,
 *	Analista Desenvolvedor de Sistemas
 */
 -->
	<?php echo $this->Html->charset('UTF-8'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php echo Configure::read("Setting.title") ?>: <?php echo __($title_for_layout); ?>
	</title>
	<?php
	setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'pt-br');

	echo $this->Html->meta('icon');

	echo $this->Html->css(array(
		'/bootstrap/css/bootstrap.min.css',
		'/bootstrap/css/bootstrap-responsive.min.css',
		'admin.css',
		'print.css',
		"icons.css",
		"multi-select.css",
	));

	echo $this->Html->script(
		array(
			'jquery.js',
			'/bootstrap/js/bootstrap.min.js',
			'ckeditor/ckeditor.js',
			'jquery.mask.min.js',
			'admin.js',
			'ajax.js',
			'spool.js',
			'stupidtable.js',
			'multi-select.js',
			'chart.js',
		)
	);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>

</head>
<body>
	<div class="container">

		<!-- <legend class="title_for_layout">
			<?php echo __($title_for_layout); ?>
		</legend> -->

		<div class="row-fluid no-print">

			<?php
				echo $this->element('admin/admin_menu');
				echo $this->element('admin/breadcrumb') ?>

		</div>

		<div class="row-fluid">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>
			<div class="print content">
				<?php
					echo $this->fetch('content');
				?>
			</div>
		</div>

	</div>

	<div id="footer">
		<?php echo $this->element('sql_dump'); ?>
	</div>

	<div id="print">&nbsp; </div>


<?php
  echo $this->element('footer-by');
?>
</body>
</html>
