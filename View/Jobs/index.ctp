
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
		echo $this->Html->link('Usuários',
			array('controller' => 'jobs', 'action' => 'users'),
			array('class'=> 'btn')
			)." ";

			echo $this->Html->link('Arquivados',
				array('controller' => 'arq_jobs', 'action' => 'index'),
				array('class'=> 'btn')
				)." ";

			?>
	</div>
</div>

	<?php
		echo $this->Form->create('Filter');
		$this->Form->inputDefaults(array(
			'label'=>false,
			'div'=>false,
			'class'=>'span6',
			'autocomplete'=>'off',
			'onfocus'=>'this.select();',
		));
	?>

	<h3 class="print center">Relatorio de impressão</h3>



	<div class="tabbable tabs-left ">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab">Mensal</a></li>
			<li><a href="#tab2" data-toggle="tab">Impressoras</a></li>
			<li><a href="#tab3" data-toggle="tab">Usuários</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">

				<div class="plugin">

					<canvas id="myChartAnaul" ></canvas>

					<?php
					$month = array();
					$total = array();
					$mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');

					foreach ($charts_anual as $charts) {
						$month[] .= $mes[ $charts['0']['month'] ];
						$total[] .= $charts['0']['total_pages'];
					}
					$data = array();
					$data['labels'] = $month;
					$data['datasets'][] = array(
						"label" => 'Mensal',
						"backgroundColor" => 'rgba(0, 136, 204, 0.3)',
						"borderColor" => "#08c",
						"borderWidth" => 1,
						"hoverBackgroundColor" => "#08c",
						"data" =>  $total
						);
					$dataSet = json_encode($data, JSON_PRETTY_PRINT);
					// pr($dataSet);
					?>


						<summary>Resumo</summary>
						<table>
							<tr>
								<th>Mês</th>
								<th>Total</th>
							</tr>
							<?php foreach ($data['labels'] as $id => $value): ?>
							<tr>
								<td><?php echo $value; ?></td>
								<td><?php echo number_format($data['datasets'][0]['data'][$id],0,",","."); ?> páginas</td>
							</tr>
							<?php endforeach; ?>
						</table>
					<script type="text/javascript">

						var ctx = document.getElementById("myChartAnaul");
						var myChart = new Chart(ctx, {
							type: 'bar',
							data: <?=$dataSet; ?>
						});

					</script>

				</div>
			</div>

			<div class="tab-pane" id="tab2">
				<div class="plugin">

					<canvas id="myChartPrinter" ></canvas>

					<?php
					$printers = array();
					$total = array();
					foreach ($charts_printer as $charts) {
						$printers[] .= $charts['Printer']['name'];
						$total[] .= $charts['0']['total_pages'];
					}

					// $printers = sprintf( '%s', implode( "','", $printers ) );
					// $total = implode( ',', $total );

					$data = array();
					$data['labels'] = $printers;
					$data['datasets'][] = array(
						"label" => 'Mensal',
						"backgroundColor" => 'rgba(0, 136, 204, 0.3)',
						"borderColor" => "#08c",
						"borderWidth" => 1,
						"hoverBackgroundColor" => "#08c",
						"data" =>  $total
						);
					$dataSet = json_encode($data, JSON_PRETTY_PRINT);

					?>


						<summary>Resumo</summary>
						<table>
							<tr>
								<th>Impressora</th>
								<th>Total</th>
							</tr>
							<?php foreach ($data['labels'] as $id => $value): ?>
							<tr>
								<td><?php echo $value; ?></td>
								<td><?php echo number_format($data['datasets'][0]['data'][$id],0,",","."); ?> páginas</td>
							</tr>
							<?php endforeach; ?>
						</table>


					<script type="text/javascript">
						var myChartPrinter = document.getElementById("myChartPrinter");
						var myChart = new Chart(myChartPrinter, {
							type: 'bar',
							data: <?=$dataSet; ?>
						});

					</script>
				</div>
			</div>

			<div class="tab-pane" id="tab3">
				<div class="plugin">
					<canvas id="myChartUsers" ></canvas>

					<?php
					$users = array();
					$total = array();
					foreach ($charts_users as $user) {
						$users[] .= $user['User']['name'];
						$total[] .= $user['0']['total_pages'];
					}
					// $users = sprintf( "'%s'", implode( "','", $users ) );
					// $total = implode( ",", $total );

					$data = array();
					$data['labels'] = $users;
					$data['datasets'][] = array(
						"label" => 'Mensal',
						"backgroundColor" => 'rgba(0, 136, 204, 0.3)',
						"borderColor" => "#08c",
						"borderWidth" => 1,
						"hoverBackgroundColor" => "#08c",
						"data" =>  $total
						);
					$dataSet = json_encode($data, JSON_PRETTY_PRINT);
					// pr($dataSet);
					?>


						<summary>Resumo</summary>
						<table>
							<tr>
								<th>Usuário</th>
								<th>Total</th>
							</tr>
							<?php foreach ($data['labels'] as $id => $value): ?>
							<tr>
								<td><?php echo $value; ?></td>
								<td><?php echo number_format($data['datasets'][0]['data'][$id],0,",","."); ?> páginas</td>
							</tr>
							<?php endforeach; ?>
						</table>


					<script type="text/javascript">

						var myChartUsers = document.getElementById("myChartUsers");
						var myChart = new Chart(myChartUsers, {
							type: 'bar',
							data: <?=$dataSet; ?>
						});

					</script>
				</div>
			</div>

		</div>
	</div>

	<table class='table rwd-table no-print'>
		<thead>
			<tr>
				<th class="btnFilter">
					Selecionar
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

				<th class="hide">
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

				<th class="actions">
					<?php //echo $this->Filter->limit( ); ?>
					Ações
				</th>
<!--
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
				</th> -->

				<!-- <th>
				<?php
					echo $this->Paginator->sort('file', ucfirst(__('file')));
				?>
				</th> -->
			</tr>

			<tr>
				<td class="actions">
							<?php echo $this->Filter->limit( ); ?>
				</td>

					<?php echo $this->Filter->conditions('id'); ?>

					<?php echo $this->Filter->conditions('User.name'); ?>

					<!--
					<?php echo $this->Filter->conditions('User.username'); ?>
				-->
				<td></td>

				<?php echo $this->Filter->conditions('Printer.name'); ?>

				<?php echo $this->Filter->conditionsDate('date'); ?>

				<td>
					<?php

					echo  $this->Form->button('Buscar', array(
						'class'=>'btn btn-success',
						'style'=>'margin-bottom: 10px;'
						))."<br>";

					echo $this->Html->link('Limpar',
						array('action'=>'index'),
						array('class'=>'btn btn-warning')
						);

						?>

				</td>

				<?php //echo $this->Filter->conditions('pages'); ?>

				<?php //echo $this->Filter->conditions('copies'); ?>

				<?php //echo $this->Filter->conditions('host'); ?>

				<?php //echo $this->Filter->conditions('file'); ?>

			</tr>
		</thead>
	</table>

	<details>
		<summary> + Detalhes</summary>

			<table class='table rwd-table'>
			<thead>
			<tr>
				<th>
					Todos <br>
					<?php echo $this->Form->checkbox('all.row', array('checked'=>'', 'id'=>'allrow' ));?>
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

				<th class="hide">
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
			</thead>


				<?php
					foreach ($jobs as $job):
					if ( !isset($job['Job']['id'])) { continue; }
				?>
				<tr>

					<td data-th='Selecionar' >
						<?php echo $this->Form->checkbox('row.'.$job['Job']['id'], array( 'class'=>'rowfilter' ));?>
					</td>

					<td data-th="<?php echo ucfirst(__('id'));?>" >
						<?php echo $this->Html->link(ucfirst($job['Job']['id']), array('action' => 'view', $job['Job']['id'])); ?>
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
						<?php echo $this->Date->datetime($job['Job']['date']); ?>
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

					<td data-th="<?php echo ucfirst(__('host'));?>" >
						<?php echo h($job['Job']['host']); ?>
						&nbsp;
					</td>
				</tr>

				<?php endforeach; ?>
			</table>

			<?php echo $this->element('layout/pagination'); ?>
	</details>
<?php echo $this->Form->end(); ?>
