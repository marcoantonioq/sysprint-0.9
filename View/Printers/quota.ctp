<div class="row-fluid">
    <div class="span12 well">
		<?php
			echo $this->Html->link('Nova impressão',
				array(
					// 'app'=>true,
					'controller' => 'spools',
					'action' => 'add'
				),
				array('class'=> 'span3 btn btn-success')
			)." ";
			echo $this->Html->link('Nova impressora',
				"https://{$_SERVER['HTTP_HOST']}:631/admin/",
				array(
          'target'=>"_blank",
          'class'=> 'span3 btn'
        )
			)." ";
			echo $this->Html->link('Quota',
        array('controller' => 'printers', 'action' => 'quota'),
        array('class'=> 'span3 btn')
			)." ";
			echo $this->Html->link('Editar impressoras',
				array('controller' => 'printers', 'action' => 'indexedit'),
				array('class'=> 'span3 btn')
			);
		?>
	</div>
</div>

<?php
    echo $this->Form->create('Printer');
    $this->Form->inputDefaults(array(
      'class'=>'span12'
    ));
 ?>

	<div class="row-fluid tabela">
    	<table class='rwd-table'>
  		<tbody>
        <tr>
          <div>
            <b>Período</b> determina o intervalo de tempo para o rastreamento de quota por usuário. O intervalo é expresso em segundos, para que um dia é 86.400, uma semana é 604.800, e um mês é 2,592,000 segundos.<br>
            <b>Págias</b> especifica o número de limite de páginas por usuário.<br>
            <b>Tamanho</b> opção especifica o limite de tamanho do trabalho de impressão em kilobytes.<br>
            </p>
          </div>
        </tr>
        <?php foreach ($printers as $key => $printer): ?>
        <tr>
    					<td>
                <?php $updated_quota=$printer['Printer']['updated_quota']; ?>
                <?php echo $this->Form->input("$key.Printer.id", array( 'value'=>$printer['Printer']['id'])); ?>
                <?php echo $this->Form->input("$key.Printer.name", array('type'=>'hidden',  'value'=>$printer['Printer']['name'])); ?>
                <?php $date=date('Y-m-d H:i:s'); ?>
                <?php echo $this->Form->input("$key.Printer.updated_quota", array('div'=>'hidden','type'=>'datetime', 'selected'=>$date)); ?>
                <?php echo $printer['Printer']['name']; ?><br>
    						<?php echo $printer['Printer']['local']; ?>
    					</td>
              <td><?php echo $this->Form->input("$key.Printer.job-quota-period", array( 'label'=>'Período','value'=>$printer['Printer']['job-quota-period'] )) ?></td>
              <td><?php echo $this->Form->input("$key.Printer.job-page-limite", array( 'label'=>'Págias','value'=>$printer['Printer']['job-page-limite'] )) ?></td>
    					<td><?php echo $this->Form->input("$key.Printer.job-k-limit", array( 'label'=>'Tamanho','value'=>$printer['Printer']['job-k-limit'] )) ?></td>

        </tr>
    		<?php endforeach; ?>
        <tr>
          <div class="form-actions form-horizontal">
        			<?php			  echo $this->Form->button('Salvar', array(
        				'class'=>'btn btn-success'
        			))." ";
        			echo $this->Form->button('Limpar', array(
        				'type'=>'reset',
        				'class'=>'btn btn-warning'
        			))." ";

              echo "Regra atualizada em: ".date("d/m/H H:i:s", strtotime($updated_quota));

        			echo $this->Form->end();

        			?>
          </div>

        </tr>

  		</tbody>
  	</div>
  </div>


<?php echo $this->Form->end(); ?>
