	<div class="row-fluid">
		<?php foreach ($printers as $printer): ?>
			<table class="profile" printer="<?php echo $printer['Printer']['id'] ?>">
				<tr>
					<td style="position:relative;">
						<?php
							if($printer['Printer']['allow'])
								echo $this->Html->image("/img/icons/1_users.png", array('class'=>'shared','title'=>"compartilhamento"));
							echo $this->Html->image("/img/icons/edit.png", array('class'=>'block'));
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
