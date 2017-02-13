<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('user'),
				array('controller' => 'users', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Sair',
				array('app'=>true, 'controller' => 'users', 'action' => 'logout'),
				array('class'=> 'btn')
			);

		?> 
		
	    <?php echo $this->Html->link('Sincronizar AD',
				array('controller' => 'users', 'action' => 'syc'),
				array('class'=> 'btn')
			);
	    ?> 

	    <?php echo $this->Html->link('Departamentos',
				array('controller' => 'groups', 'action' => 'index'),
				array('class'=> 'btn')
			);
	    ?>
	</div>
</div>

<div class="row-fluid">
	<?php 
			echo $this->Form->create('Filter');
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
						echo $this->Paginator->sort('username', ucfirst(__('username'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('name', ucfirst(__('name'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('group_id', ucfirst(__('group'))); 
					?>				
				</th>
												
				<th>
					<?php 
						echo $this->Paginator->sort('quota', ucfirst(__('quota'))); 
					?>				
				</th>
													
				<th>
					<?php 
						echo $this->Paginator->sort('status', ucfirst(__('status'))); 
					?>				
				</th>
												
				<th class="hide">
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
									
					<?php echo $this->Filter->conditions('name'); ?>
									
					<?php echo $this->Filter->conditionsSelect('group_id', $groups); ?>
									
					<?php echo $this->Filter->conditions('Group.quota'); ?>
					
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
		<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<td data-th='Ações' class="actions">				
					<?php 
					echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
						array(
							'action' => 'view', 
							$user['User']['id']
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
							$user['User']['id']
						),
						array(
							'escape'=>false,
							'class'=>'edit',
							'title'=>'Editar',
						)
					); ?>
					</td>
					<td data-th="Suap" >
						<?php echo ucfirst($user['User']['username']); ?></td>
					<td data-th="Nome" >
						<?php if($user['User']['name']{0}): ?>
						<div class="avatardiv">
							<?php echo ucwords($user['User']['name']{0}); ?>
						</div>
						<?php endif; ?>
						<?php echo ucfirst( (empty($user['User']['name'])) ? $user['User']['username'] : $user['User']['name'] ); ?></td>
					<td data-th="Grupo" >
						<?php echo (empty($user['Group']['name'])) ? "nenhum grupo" : $user['Group']['name']; ?></td>
					<td data-th="Quota" >
						<?php echo (empty($user['User']['group_id'])) ? "0" : $user['Group']['quota']; ?></td>
					<td data-th="Status" >
						<?php echo $this->Link->status($user['User']['id'], $user['User']['status']); ?></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">		

	<?php echo $this->element('layout/pagination'); ?>
   	<?php echo $this->Form->end(); ?>
	</div>
</div>