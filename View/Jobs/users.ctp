
<div class="row-fluid">
<?php echo $this->Form->create('Filter'); ?>

<div class="span12 well">
	<?php 

		echo $this->Html->link('Voltar',
			array('controller' => 'jobs', 'action' => 'index'),
			array('class'=> 'btn btn-success')
		)." ";
		echo $this->Html->link('Imprimir relatório',
			"#",
			array(
				'class'=> 'btn',
				"onclick"=>"window.print()"
			)
		)." ";
	?> 
</div>
</div>

<div class="plugin span12">
	<h3 align="center">Impressões</h3>
	<canvas id="myChartAnaul" ></canvas>
	<?php 
		
		$mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
		$data = array();
		if(!empty($charts_anual)){		
			foreach ($charts_anual as $charts) {
				$months[$charts['0']['month']] = 0;
				$data['labels'][$charts['0']['month']] = $mes[ $charts['0']['month'] ];
				$usersSetLabel[ $charts['User']['name'] ][$charts['0']['month']] = $charts['0']['total_pages'];
			}
			$data['labels'] = array_values($data['labels']);
			foreach ($usersSetLabel as $user => $month) {
				$data['datasets'][] = array(
					"label" => $user,
					"backgroundColor" =>'rgb(' . rand(128,255) . ',' . rand(128,255) . ',' . rand(128,255) . ')',
					"data" =>  array_values(array_replace($months, $month)),
				);
			}
		}
		$data = json_encode($data, JSON_PRETTY_PRINT);
	?>
<script type="text/javascript">

var data = <?=$data; ?>

var ctx = document.getElementById("myChartAnaul");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: data
});

</script>

</div>



<div class="plugin span12">
	
	<h3 align="center">Impressoras</h3>

	<canvas id="myChartPrinter" ></canvas>

	<?php 
		$data = array();
		$usersSetLabel = array();
		if(!empty($chart_print)){		
			foreach ($chart_print as $charts) {
				$printers[$charts['Printer']['name']] = 0;
				$data['labels'][$charts['Printer']['name']] = $charts['Printer']['name'];
				$usersSetLabel[ $charts['User']['name'] ][$charts['Printer']['name']] = $charts['0']['total_pages'];
			}
			$data['labels'] = array_values($data['labels']);
			foreach ($usersSetLabel as $user => $printer) {
				$data['datasets'][] = array(
					"label" => $user,
					"backgroundColor" => 'rgb(' . rand(128,255) . ',' . rand(128,255) . ',' . rand(128,255) . ')',
					"data" =>  array_values(array_replace($printers, $printer)),
				);
			}
		}
		$data = json_encode($data, JSON_PRETTY_PRINT);
	?>

	<script type="text/javascript">

	var data = <?=$data; ?>

	var ctx = document.getElementById("myChartPrinter");
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: data
	});

	</script>
</div>

<div class="row-fluid">
	<div class="span12 well">
		<?php 
			echo $this->Html->link('Imprimir relatório',
				"#",
				array(
					'class'=> 'btn',
					"onclick"=>"window.print()"
				)
			)." ";
		?> 
	</div>
</div>


<?php echo $this->Form->create('Filter'); ?>

<div class="row-fluid no-print">
	<div class="span12">

	<?php
			$this->Form->inputDefaults(array(
				'label'=>false,
				'div'=>false,
				'class'=>'span6',
				'autocomplete'=>'off',
				'onfocus'=>'this.select();',
			));

	 ?>
	<div class="tabela">
		<table class='table rwd-table'>
		<thead>
			<tr>
				<th class="btnFilter">
					<?php $this->Filter->img(); ?>

				</th>

				<th class="actions">
					<?php echo $this->Filter->limit( ); ?>
				</th>

				<th class="">
					<?php
						echo $this->Paginator->sort('id', ucfirst(__('Job')));
					?>
				</th>

				<th>
					<?php
						echo $this->Paginator->sort('user_id', ucfirst(__('user_id')));
					?>
				</th>

				<th>
					Username
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

				<!-- <th>
					<?php
						echo $this->Paginator->sort('file', ucfirst(__('file')));
					?>
				</th> -->



			</tr>
			<tr id="filter">
				<td>
					<?php echo $this->Form->checkbox('all.row', array( 'id'=>'allrow' ));?>
				</td>
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
					<?php echo $this->Filter->conditions('id'); ?>

					<?php echo $this->Filter->conditions('User.name'); ?>

					<!--
					<?php echo $this->Filter->conditions('User.username'); ?>
					 -->
					 <td></td>

					<?php echo $this->Filter->conditions('Printer.name'); ?>

					<?php echo $this->Filter->conditionsDate('date'); ?>

					<?php echo $this->Filter->conditions('pages'); ?>

					<?php echo $this->Filter->conditions('copies'); ?>

					<?php echo $this->Filter->conditions('host'); ?>

					<?php //echo $this->Filter->conditions('file'); ?>


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

		<td data-th='Ações' class="actions">

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
			); ?>
		</td>

		<td data-th="<?php echo ucfirst(__('id'));?>" >
			<?php echo h($job['Job']['id']); ?>
			&nbsp;
		</td>

		<td data-th="<?php echo ucfirst(__('user_id'));?>" >
			<?php echo $this->Html->link(ucfirst($job['User']['name']), array('controller' => 'users', 'action' => 'view', $job['User']['id'])); ?>
		</td>

		<td data-th="username" >
			<?php echo $this->Html->link(ucfirst($job['User']['username']), array('controller' => 'users', 'action' => 'view', $job['User']['id'])); ?>
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

		<!-- <td data-th="<?php echo ucfirst(__('file'));?>" >
			<?php echo h($job['Job']['file']); ?>
			&nbsp;
		</td> -->




	</tr>

	<?php endforeach; ?>
	</table>

	</div>

	<?php echo $this->element('layout/pagination'); ?>
	</div>
</div>
<?php echo $this->Form->end(); ?>
