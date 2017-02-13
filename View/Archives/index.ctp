
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('archive'),
				array('controller' => 'archives', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?> 
		<div id="rowmenus" class="row-fluid">
			<br>
			    <?php echo $this->Html->link('Novo '.__('archive'),
						array('controller' => 'archives', 'action' => 'add'),
						array('class'=> 'btn btn-block btn-success')
					);
			    ?> 
		    

					<?php 
					echo $this->Html->link(__('Users'),
						array('controller' => 'users', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>
			
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">		

	<?php 
			echo $this->Form->create('Filter');
			
			$this->Form->inputDefaults(array(
				'label'=>false,
				'div'=>false,
				'class'=>'span6',
				'autocomplete'=>'off',
				'onfocus'=>'this.select();',
			));

			$options = array(
                '=' => 'igual',
                'LIKE' => 'contenha',
                'NOT LIKE' => 'não contenha',
                'LIKE BEGIN' => 'começando com',
                'LIKE END' => 'terminando com',
                '!=' => 'diferente',
                '>'  => 'maior do que',
                '>=' => 'maior ou igual a',
                '<'  => 'menor que',
                '<=' => 'menor ou igual a'
            );
			
	 ?>
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
						echo $this->Paginator->sort('user_id', ucfirst(__('user_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('name', ucfirst(__('name'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('size', ucfirst(__('size'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('file', ucfirst(__('file'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('file_dir', ucfirst(__('file_dir'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('permission', ucfirst(__('permission'))); 
					?>				
				</th>
				
				<th class="actions">
					
					<?php echo __('Ações'); ?>
				</th>
			</tr>
			<tr id="filter">
				<td>
					<?php echo $this->Form->checkbox('all.row', array( 'id'=>'allrow' ));?>					
				</td>
									
					<?php echo $this->Filter->conditions('id'); ?>
									
					<?php echo $this->Filter->conditions('user_id'); ?>
									
					<?php echo $this->Filter->conditions('name'); ?>
									
					<?php echo $this->Filter->conditions('size'); ?>
									
					<?php echo $this->Filter->conditions('file'); ?>
									
					<?php echo $this->Filter->conditions('file_dir'); ?>
									
					<?php echo $this->Filter->conditions('permission'); ?>
								
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

		<?php foreach ($archives as $archive): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$archive['Archive']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?php echo ucfirst(__('id'));?>" >
			<?php echo h($archive['Archive']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('user_id'));?>" >
			<?php echo $this->Html->link($archive['User']['name'], array('controller' => 'users', 'action' => 'view', $archive['User']['id'])); ?>
		</td>

		<td data-th="<?php echo ucfirst(__('name'));?>" >
			<?php echo h($archive['Archive']['name']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('size'));?>" >
			<?php echo h($archive['Archive']['size']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('file'));?>" >
			<?php echo h($archive['Archive']['file']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('file_dir'));?>" >
			<?php echo h($archive['Archive']['file_dir']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('permission'));?>" >
			<?php echo h($archive['Archive']['permission']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$archive['Archive']['id']
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
						$archive['Archive']['id']
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
