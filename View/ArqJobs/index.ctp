
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('arqJob'),
				array('controller' => 'arqJobs', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?> 
		<div id="rowmenus" class="row-fluid">
			<br>
			    <?php echo $this->Html->link('Novo '.__('arqJob'),
						array('controller' => 'arqJobs', 'action' => 'add'),
						array('class'=> 'btn btn-block btn-success')
					);
			    ?> 
		    			
		</div>
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
												
				<th>
					<?php 
						echo $this->Paginator->sort('id', ucfirst(__('id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('user', ucfirst(__('user'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('printer', ucfirst(__('printer'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('date', ucfirst(__('date'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('pages', ucfirst(__('pages'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('copies', ucfirst(__('copies'))); 
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
												
				<th>
					<?php 
						echo $this->Paginator->sort('params', ucfirst(__('params'))); 
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
												
				<th>
					<?php 
						echo $this->Paginator->sort('updated', ucfirst(__('updated'))); 
					?>				
				</th>
				
				<th class="actions">
					<?php echo->limit( ); ?>				</th>
			</tr>
			<tr id="filter">
				<td>
					<?php echo $this->Form->checkbox('all.row', array( 'id'=>'allrow' ));?>					
				</td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('user'); ?>
									
					<?php echo $this->Filter->conditions('printer'); ?>
									
					<?php echo $this->Filter->conditions('date'); ?>
									
					<?php echo $this->Filter->conditions('pages'); ?>
									
					<?php echo $this->Filter->conditions('copies'); ?>
									
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

		<?php foreach ($arqJobs as $arqJob): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$arqJob['ArqJob']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?php echo ucfirst(__('id'));?>" >
			<?php echo h($arqJob['ArqJob']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('user'));?>" >
			<?php echo h($arqJob['ArqJob']['user']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('printer'));?>" >
			<?php echo h($arqJob['ArqJob']['printer']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('date'));?>" >
			<?php echo h($arqJob['ArqJob']['date']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('pages'));?>" >
			<?php echo h($arqJob['ArqJob']['pages']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('copies'));?>" >
			<?php echo h($arqJob['ArqJob']['copies']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('host'));?>" >
			<?php echo h($arqJob['ArqJob']['host']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('file'));?>" >
			<?php echo h($arqJob['ArqJob']['file']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('params'));?>" >
			<?php echo h($arqJob['ArqJob']['params']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('status'));?>" >
			<?php echo h($arqJob['ArqJob']['status']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('created'));?>" >
			<?php echo h($arqJob['ArqJob']['created']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('updated'));?>" >
			<?php echo h($arqJob['ArqJob']['updated']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$arqJob['ArqJob']['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); ?>				
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'action' => 'edit', 
						$arqJob['ArqJob']['id']
					),
					array(
						'escape'=>false,
						'class'=>'edit',
						'title'=>'Editar',
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
