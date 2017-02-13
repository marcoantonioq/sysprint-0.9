<div class="row-fluid">

	<div class="tabela">
		<table class='rwd-table'>
		<thead>
			<tr>								
				<th>
					<?php 
						echo $this->Paginator->sort('printer_id', ucfirst(__('printer_id'))); 
					?>				
				</th>
			</tr>
		</thead>

		<?php foreach ($spools as $spool): ?>
	<tr>
		<td data-th="<?php echo ucfirst(__('printer_id'));?>" >
			<?php echo $this->Html->link($spool['Printer']['name'], array('controller' => 'printers', 'action' => 'view', $spool['Printer']['id'])); ?> - 
			<?php echo h($spool['Spool']['file']); ?>

			<?php echo $this->Html->link('<span class="icon12 icon-trash"></span>', 
				array(
					'action' => 'delete', 
					$spool['Spool']['id']
				),
				array(
					'escape'=>false,
					'title'=>'Apagar',
					'class'=>'right',
				)
			); ?>
		</td>
	</tr>

	<?php endforeach; ?>
	<?php if (empty($spools)): ?>
		<tr>
			<td>Nenhuma impressão</td>
		</tr>
	<?php endif; ?>
	</table>
	</div>
</div>
