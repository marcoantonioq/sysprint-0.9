
<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo '.__('group'),
				array('controller' => 'groups', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?>
		<div id="rowmenus" class="row-fluid">
			<br>
			    <?php echo $this->Html->link('Novo '.__('group'),
						array('controller' => 'groups', 'action' => 'add'),
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
						echo $this->Paginator->sort('name', ucfirst(__('name')));
					?>
				</th>

				<th>
					<?php
						echo $this->Paginator->sort('quota', ucfirst(__('quota')));
					?>
				</th>

				<th class="hide">
					<?php
						echo $this->Paginator->sort('descrition', ucfirst(__('descrition')));
					?>
				</th>

				<th class="hide">
					<?php
						echo $this->Paginator->sort('ad', ucfirst(__('ad')));
					?>
				</th>

				<th>
					<?php
						echo $this->Paginator->sort('admin', ucfirst(__('admin')));
					?>
				</th>

				<th class="actions">
							</th>
			</tr>
			<tr id="filter">
				<td>
					<?php echo $this->Form->checkbox('all.row', array( 'id'=>'allrow' ));?>
				</td>

					<?php echo $this->Filter->conditions('id'); ?>

					<?php echo $this->Filter->conditions('name'); ?>

					<?php echo $this->Filter->conditions('quota'); ?>

					<?php echo $this->Filter->conditions('descrition'); ?>

					<?php echo $this->Filter->conditions('ad'); ?>

					<?php echo $this->Filter->conditions('admin'); ?>

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

		<?php foreach ($groups as $group): ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$group['Group']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?php echo ucfirst(__('id'));?>" >
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('name'));?>" >
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('quota'));?>" >
			<?php echo h($group['Group']['quota']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('descrition'));?>" >
			<?php echo h($group['Group']['descrition']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('ad'));?>" >
			<?php echo h($group['Group']['ad']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('admin'));?>" >
			<?php echo h($group['Group']['admin']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">

				<?php
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>',
					array(
						'action' => 'view',
						$group['Group']['id']
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
						$group['Group']['id']
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
