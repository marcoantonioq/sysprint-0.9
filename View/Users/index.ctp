<?php
    echo $this->Form->create('Filter', array('novalidate' => true));
 ?>

<div class="row-fluid">
    <div class="span12 well">
		<?php echo $this->Html->link('Novo',
				array('controller' => 'users', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

      if ($auth) {
          echo $this->Form->button('Sincronizar AD',
            array(
              'formaction' => Router::url(
                array('controller' => 'users','action' => 'syc')
              ),
              'class'=> 'btn',
            )
    			);
        }
     ?>
	    <?php echo $this->Html->link('Grupo',
				array('controller' => 'groups', 'action' => 'index'),
				array('class'=> 'btn')
			);
	    ?>
	</div>
</div>

<div class="row-fluid">
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

				<th width="30%">
					<?php
						echo $this->Paginator->sort('name', ucfirst(__('name')));
					?>
				</th>

				<th class="hide">
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
						echo $this->Paginator->sort('month_count', ucfirst("USED"));
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

          <?php echo $this->Filter->conditions('username'); ?>

          <?php echo $this->Filter->conditions('name'); ?>

					<?php echo $this->Filter->conditionsSelect('group_id', $groups); ?>

					<?php echo $this->Filter->conditions('Group.quota'); ?>
					<?php echo $this->Filter->conditions('Group.month_count'); ?>

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
						<div class="avatardiv">
							<?php
                echo (!empty($user['User']['thumbnailphoto'])) ?
                  "<img src='{$user['User']['thumbnailphoto']}' />" :
                  ucwords($user['User']['name']{0});
              ?>
						</div>
						<?php echo ucfirst( (empty($user['User']['name'])) ? $user['User']['username'] : $user['User']['name'] ); ?></td>
					<td data-th="Grupo" >
            <?php
            foreach ($user['Group'] as $group) {
              echo $group['name'].'; ';
            }
             ?>
						</td>
					<td data-th="Quota" >
						<?php echo $user['User']['quota']; ?></td>
					<td data-th="month_count" >
						<?php echo $user['User']['month_count']; ?></td>
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
