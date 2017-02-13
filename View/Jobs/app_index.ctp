<?php echo $this->Form->create('Filter'); ?>
<div class="row-fluid">

    <div class="span12 well">
		<?php
			echo $this->Html->link('Nova impressão',
				array('controller' => 'spools', 'action' => 'add'),
				array('class'=> 'btn btn-success')
			)." ";

			echo $this->Html->link('Menu', '#',
				array('class'=> 'btn btn-info','id'=>'btnmenu')
			);

		?>
		<div id="rowmenus" class="row-fluid">
			<br>
			    <br>
					<?php
					echo $this->Html->link('Imprimir',
						array('controller' => 'printers', 'action' => 'index'),
						array(
							'class'=> 'btn btn-block',
							"onclick"=>"window.print()"
						)
					);
					?>

		</div>
	</div>
</div>

<div class="row-fluid">
<div class="span12">

	<?php
		//pr($jobs);
	?>

</head>
		<!-- Table users -->
		<?php if(!empty($jobs['User'])): ?>
		<table class='table rwd-table'>
			<thead>
				<tr>
					<th data-sort="string" width="50%">
						<a href="#">Usuário</a>
					</th>
					<th data-sort="int" data-th="Páginas">
						 <a href="#">Páginas impressas</a>
					</th>
				</tr>
			</thead>

		<?php foreach ($jobs['User'] as $name => $user): ?>
			<tr>
				<td data-sort="string" data-th="<?php echo ucfirst(__('user'));?>"  width="50%" >
					<?php echo ucfirst($name); ?>
				</td>
				<td data-sort="int" data-th="Páginas">
					<?php echo $user['total_pages']; ?>
				</td>
			</tr>

		<?php endforeach; ?>

		</table>

		</p>

		<?php
			endif;
			if(!empty($jobs['User'])):
		 ?>

		<!-- Table prints -->
		<table class='table rwd-table'>
			<thead>
				<tr>
					<th data-sort="string"  width="50%">
						<a href="#">Impressora</a>
					</th>
					<th data-sort="int">
						<a href="#">Páginas impressas</a>
					</th>
				</tr>
			</thead>
		<?php $total = 0; ?>
		<?php foreach ($jobs['Printer'] as $name => $printer): ?>
			<tr>
				<td data-th="<?php echo ucfirst(__('printer'));?>" >
					<?php echo ucfirst($name); ?>
				</td>
				<td data-th="Total de páginas">
					<?php
						$total += $printer['total_pages'];
						echo $printer['total_pages'];
					?>
				</td>
			</tr>

		<?php endforeach; ?>
		</table>

		</p>
		<?php endif; ?>

	</div>
</div>

<div class="row-fluid no-print">
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
						echo $this->Paginator->sort('printer_id', ucfirst(__('printer_id')));
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

				<th class="hide">
					<?php
						echo $this->Paginator->sort('host', ucfirst(__('host')));
					?>
				</th>

				<th>
					<?php
						echo $this->Paginator->sort('file', ucfirst(__('file')));
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
					<?php echo $this->Filter->conditions('Printer.name'); ?>

					<?php echo $this->Filter->conditionsDate('date'); ?>

					<?php echo $this->Filter->conditions('pages'); ?>

					<?php echo $this->Filter->conditions('copies'); ?>

					<?php echo $this->Filter->conditions('host'); ?>

					<?php echo $this->Filter->conditions('file'); ?>

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

	<?php
		foreach ($jobs as $job):
		if ( !isset($job['Job']['id']))
			continue;
	 ?>
	<tr>

		<td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$job['Job']['id'], array( 'class'=>'rowfilter' ));?>
		</td>

		<td data-th="<?php echo ucfirst(__('printer_id'));?>" >
			<?php echo $this->Html->link($job['Printer']['name'], array('controller' => 'printers', 'action' => 'view', $job['Printer']['id'])); ?>
		</td>

		<td data-th="<?php echo ucfirst(__('date'));?>" >
			<?php echo h($job['Job']['date']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('pages'));?>" >
			<?php echo h($job['Job']['pages']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('copies'));?>" >
			<?php echo h($job['Job']['copies']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('host'));?>" >
			<?php echo h($job['Job']['host']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('file'));?>" >
			<?php echo h($job['Job']['file']); ?>
			&nbsp;
		</td>

			<td data-th='Ações' class="actions">
				<!--

				<?php
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>',
					array(
						'action' => 'view',
						$job['Job']['id']
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
						$job['Job']['id']
					),
					array(
						'escape'=>false,
						'class'=>'edit',
						'title'=>'Editar',
					)
				); ?> -->
			</td>


	</tr>

	<?php endforeach; ?>
	</table>

	</div>

	<?php echo $this->element('layout/pagination'); ?>
	</div>
</div>
<?php echo $this->Form->end(); ?>
