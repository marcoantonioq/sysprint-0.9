<div class="row-fluid">
    <div class="span12 well">
		<?php
			echo $this->Html->link('Nova impressão',
				array(
					// 'app'=>true,
					'controller' => 'spools',
					'action' => 'add'
				),
				array('class'=> 'span3 btn btn-success')
			)." ";
			echo $this->Html->link('Nova impressora',
				"https://{$_SERVER['HTTP_HOST']}:631/admin/",
				array(
          'target'=>"_blank",
          'class'=> 'span3 btn'
        )
			)." ";
			echo $this->Html->link('Quota',
        array('controller' => 'printers', 'action' => 'quota'),
        array('class'=> 'span3 btn')
			)." ";
			echo $this->Html->link('Editar impressoras',
				array('controller' => 'printers', 'action' => 'indexedit'),
				array('class'=> 'span3 btn')
			);
		?>
	</div>
</div>

	<div class="row-fluid">
		<?php foreach ($printers as $printer): ?>
			<table class="profile" printer="<?php echo $printer['Printer']['id'] ?>">
				<tr>
					<td style="position:relative;">
						<?php
							if($printer['Printer']['allow'])
								echo $this->Html->image("/img/icons/1_users.png", array('class'=>'shared','title'=>"compartilhamento"));
							// if(!$printer['Printer']['status'])
							// 	echo $this->Html->image("/img/icons/block.png", array('class'=>'block','title'=>"Desligada ou bloqueada pelo administrador"));
						?>

						<?php echo $this->Html->image("/img/icons/print.png", array(
							'class'=>'iconprofile',
							'title'=>$printer['Printer']['local'],
							'url' => array('controller'=>'spools', 'action'=>'add', $printer['Printer']['id'])
						)); ?>

					</td>
				</tr>
				<tr>
					<td>
						<b><?php echo $printer['Printer']['name']; ?><br></b>
						<?php echo $printer['Printer']['local']; ?><br>

					</td>
				</tr>

			</table>
		<?php endforeach; ?>
	</div>

	<?php
	// echo $this->Html->link("",
	// 	array('controller'=>'spools', 'action'=>'active'),
	// 	array('id' => 'UrlSpools')
	// );
	?>

</div>


<?php
echo $this->Html->link('',
	array(
		'app'=>true,
		'controller'=>'spools',
		'action'=>'upload',
	),
	array(
		'id'=>'uploadURL',
		// 'class'=>'hide',
	)
);
 ?>
