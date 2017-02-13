<?php 
	echo $this->Html->script(
		array(
			'spool.js',
		)
	);


 ?>
<div class="row-fluid">
    <div class="span12 well">
		<?php 
			echo $this->Html->link('Nova '.__('spool'),
				array('controller' => 'spools', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('All', '#',
				array('class'=> 'btn','id'=>'allSpool')
			)." ";

		?> 
	</div>
</div>

<div class="row-fluid">
	<div class="span12">		

	<div class="tabela">
		<table class='rwd-table'>
		<thead>
			<tr>
				<th class="btnFilter">
					<?php $this->Filter->img(); ?>
				</th>
												
				<th class="hide">
					<?php 
						echo $this->Paginator->sort('id', ucfirst(__('id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('user_id', ucfirst(__('user_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('printer_id', ucfirst(__('printer_id'))); 
					?>				
				</th>
				<th>
					<?php 
						echo $this->Paginator->sort('job', ucfirst(__('job'))); 
					?>				
				</th>
																	
				<th>
					<?php 
						echo $this->Paginator->sort('host', ucfirst(__('host'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('file', ucfirst(__('file'))); 
					?>				
				</th>
												
				<th class="hide">
					<?php 
						echo $this->Paginator->sort('params', ucfirst(__('params'))); 
					?>				
				</th>
												
				<th class="hide">
					<?php 
						echo $this->Paginator->sort('printWebApp', ucfirst(__('printWebApp'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('status', ucfirst(__('status'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('created', ucfirst(__('created'))); 
					?>				
				</th>
												
				<th class="hide">
					<?php 
						echo $this->Paginator->sort('updated', ucfirst(__('updated'))); 
					?>				
				</th>
				
				<th class="actions">
					<?php echo $this->Filter->limit( ); ?>
				</th>
			</tr>
			<tr id="filter">
				<td>
					<?php echo $this->Form->checkbox('all.row', array( 'id'=>'allrow' ));?>					
				</td>

					<?php echo $this->Filter->conditions('id'); ?>

					<?php echo $this->Filter->conditions('user_id'); ?>

					<?php echo $this->Filter->conditions('printer_id'); ?>

					<?php echo $this->Filter->conditions('copies'); ?>

					<?php echo $this->Filter->conditions('job'); ?>

					<?php echo $this->Filter->conditions('host'); ?>

					<?php echo $this->Filter->conditions('file'); ?>

					<?php echo $this->Filter->conditions('params'); ?>

					<?php echo $this->Filter->conditions('status'); ?>

					<?php echo $this->Filter->conditions('created'); ?>

					<?php echo $this->Filter->conditions('updated'); ?>

				<td>
					<?php 
						echo  $this->Form->button('Buscar', array(
							'class'=>'btn btn-success',
							'style'=>'margin-bottom: 10px;'
						)); 

						echo $this->Html->link('Limpar',
							array('action'=>'index'),
							array('class'=>'btn btn-warning')
						);

					?>
				</td>
			</tr>
		</thead>

		<?php foreach ($spools as $spool): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$spool['Spool']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?php echo ucfirst(__('id'));?>" >
			<?php echo h($spool['Spool']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('user_id'));?>" >
			<?php echo $this->Html->link($spool['User']['name'], array('controller' => 'users', 'action' => 'view', $spool['User']['id'])); ?>
		</td>

		<td data-th="<?php echo ucfirst(__('printer_id'));?>" >
			<?php echo $this->Html->link($spool['Printer']['name'], array('controller' => 'printers', 'action' => 'view', $spool['Printer']['id'])); ?>
		</td>

		<td data-th="<?php echo ucfirst(__('job'));?>" >
			<?php echo h($spool['Spool']['job']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('host'));?>" >
			<?php echo h($spool['Spool']['host']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('file'));?>" >
			<?php echo h($spool['Spool']['file']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('params'));?>" >
			<?php echo h($spool['Spool']['params']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('printWebApp'));?>" >
			<?php echo h($spool['Spool']['printWebApp']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('status'));?>" value="<?php echo $spool['Spool']['status']; ?>">
			<?php echo $this->Status->printer($spool['Spool']['status']); ?>
		</td>

		<td data-th="<?php echo ucfirst(__('created'));?>" >
			<?php echo h($spool['Spool']['created']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('updated'));?>" >
			<?php echo h($spool['Spool']['updated']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-trash"></span>', 
					array(
						'action' => 'view', 
						$spool['Spool']['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); ?>				
				
			</td>

	
	</tr>

	<?php endforeach; ?>
	</table>
	</div>


	<?php echo $this->element('layout/pagination'); ?>
    
	<?php echo $this->Form->end(); ?>
	</div>
</div>
