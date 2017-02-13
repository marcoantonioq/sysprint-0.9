<!DOCTYPE html>
 <html lang="en">
 <head>
 	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo __($title_for_layout); ?>
	</title>
	<?php 	
		echo $this->Html->meta('icon');

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

	<style>
		body {font-family: sans-serif;
			font-size: 9pt;
		}
		h5, p {	margin: 0pt;
		}
		table.items {
			border-collapse: collapse;
			border: 3px solid #000;

			float: left;
			height: 33.99mm;
			margin: 25px 10px;
			padding: 2px 6px;
			position: relative;
			text-align: center;
			width: 101.60mm;
		}

		td { vertical-align: top; 
		}
		table thead td { background-color: #EEEEEE;
			text-align: center;
		}
		table tfoot td { background-color: #AAFFEE;
			text-align: center;
		}
		.barcode {
			padding: 1.5mm;
			margin: 0;
			vertical-align: top;
			color: #000000;
		}
		.barcodecell {
			text-align: center;
			vertical-align: middle;
			padding: 0;
		}
	</style>
	</head>
	<body>
		<?php echo $this->fetch('content'); ?>

		<dd id='id'>
			123456788
		</dd>


		 <script type="text/javascript">
		 	var id = document.getElementById("id");
		 	id.innerHTML="adada da dad";
			// function generateBarcode(){
			// 	value = 123456788;
			// 	$("#canvasTarget").hide();
			// 	$("#id").
			// 	$("#id").html("").show().barcode(value, 'code128');
			// }
			// $(function(){
			// 	generateBarcode();
			// });
		</script>

	</body>
</html>