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
							// echo $this->Html->image("/img/icons/edit.png", array('class'=>'block'));
						?>
						<?php echo $this->Html->image("/img/icons/print.png", array(
							'class'=>'iconprofile',
							'title'=>$printer['Printer']['local'],
							'url' => array('controller'=>'printers', 'action'=>'edit', $printer['Printer']['id'])
						)); ?>
					</td>
				</tr>
				<tr>
					<td>
						<b>Editar: <br><?php echo $printer['Printer']['name']; ?><br></b>
						<?php echo $printer['Printer']['local']; ?><br>
					</td>
				</tr>
			</table>
		<?php endforeach; ?>
	</div>

</div>
