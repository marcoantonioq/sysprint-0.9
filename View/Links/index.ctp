
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('link'),
				array('controller' => 'links', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?> 
		<div id="rowmenus">
		<hr>
			    <?php echo $this->Html->link('Novo '.__('link'),
						array('controller' => 'links', 'action' => 'add'),
						array('class'=> 'btn btn-block btn-success')
					);
			    ?> 
		    

					<?php 
					echo $this->Html->link(__('Links'),
						array('controller' => 'links', 'action' => 'index'),
						array('class'=> 'btn btn-block')
					);
					?>


					<?php 
					echo $this->Html->link(__('Menus'),
						array('controller' => 'menus', 'action' => 'index'),
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
		<table id="tableid1" class='rwd-table'>
		<thead>
			<tr>
				<th>
					<?php $this->Filter->img(); ?>
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('id', ucfirst(__('id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('parent_id', ucfirst(__('parent_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('menu_id', ucfirst(__('menu_id'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('title', ucfirst(__('title'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('class', ucfirst(__('class'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('description', ucfirst(__('description'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('link', ucfirst(__('link'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('target', ucfirst(__('target'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('rel', ucfirst(__('rel'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('status', ucfirst(__('status'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('lft', ucfirst(__('lft'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('rght', ucfirst(__('rght'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('visibility_roles', ucfirst(__('visibility_roles'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('params', ucfirst(__('params'))); 
					?>				
				</th>
												
				<th class="hide">
					<?php 
						echo $this->Paginator->sort('updated', ucfirst(__('updated'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('created', ucfirst(__('created'))); 
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
									
					<?php echo $this->Filter->conditions('parent_id'); ?>
									
					<?php echo $this->Filter->conditions('menu_id'); ?>
									
					<?php echo $this->Filter->conditions('title'); ?>
									
					<?php echo $this->Filter->conditions('class'); ?>
									
					<?php echo $this->Filter->conditions('description'); ?>
									
					<?php echo $this->Filter->conditions('link'); ?>
									
					<?php echo $this->Filter->conditions('target'); ?>
									
					<?php echo $this->Filter->conditions('rel'); ?>
									
					<?php echo $this->Filter->conditions('status'); ?>
									
					<?php echo $this->Filter->conditions('lft'); ?>
									
					<?php echo $this->Filter->conditions('rght'); ?>
									
					<?php echo $this->Filter->conditions('visibility_roles'); ?>
									
					<?php echo $this->Filter->conditions('params'); ?>
									
					<?php echo $this->Filter->conditions('updated'); ?>
									
					<?php echo $this->Filter->conditions('created'); ?>
								
				<td></td>
			</tr>
		</thead>

		<?php foreach ($links as $link): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$link['Link']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($link['Link']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('parent_id'));?>" >
			<?php echo $this->Html->link($link['ParentLink']['title'], array('controller' => 'links', 'action' => 'view', $link['ParentLink']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('menu_id'));?>" >
			<?php echo $this->Html->link($link['Menu']['title'], array('controller' => 'menus', 'action' => 'view', $link['Menu']['id'])); ?>
		</td>

		<td data-th="<?= ucfirst(__('title'));?>" >
			<?php echo h($link['Link']['title']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('class'));?>" >
			<?php echo h($link['Link']['class']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('description'));?>" >
			<?php echo h($link['Link']['description']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('link'));?>" >
			<?php echo h($link['Link']['link']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('target'));?>" >
			<?php echo h($link['Link']['target']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('rel'));?>" >
			<?php echo h($link['Link']['rel']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('status'));?>" >
			<?php echo h($link['Link']['status']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('lft'));?>" >
			<?php echo h($link['Link']['lft']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('rght'));?>" >
			<?php echo h($link['Link']['rght']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('visibility_roles'));?>" >
			<?php echo h($link['Link']['visibility_roles']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('params'));?>" >
			<?php echo h($link['Link']['params']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('updated'));?>" >
			<?php echo h($link['Link']['updated']); ?>
			&nbsp;
		</td>

		<td data-th="<?= ucfirst(__('created'));?>" >
			<?php echo h($link['Link']['created']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				
				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$link['Link']['id']
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
						$link['Link']['id']
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

	<?php 	
        echo $this->Form->input('Pagination.limit', array(
            'label'=>"Limite",
            'type'=>'select',
            'options'=> array(
				'20'=>'20',
				'50'=>'50',
				'100'=>'100',
				'500'=>'500',
				'1000'=>'1000',
				'10000'=>'10000'
			),
            'default'=>20,
            "class"=>"span2",
            'onchange'=>'this.form.submit();'
        ));
    ?> 
    
	<?php 
		echo  $this->Form->button('Buscar', array(
		'class'=>'btn',
		'style'=>'margin-bottom: 10px;'
		)); 
	?>

	<?php echo $this->Form->end(); ?>
	<?php echo $this->element('layout/pagination'); ?>
	</div>
</div>
