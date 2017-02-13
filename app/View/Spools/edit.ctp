<div class="row-fluid">

	<div class='span8'>		
		<?php 
			echo $this->Form->create('Spool', array('type'=>'file')); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		
			echo $this->Form->input('id', array(
				'label'=>ucfirst(__('id')),
			));

			echo $this->Form->input('user_id', array(
				'label'=>ucfirst(__('user_id')),
			));

			echo $this->Form->input('printer_id', array(
				'label'=>"Impressora",
				'legend'=>"Selecione impressora",
				'type'=> "radio",
				'class'=>false
			));

			echo $this->Form->input('host', array(
				'label'=>ucfirst(__('host')),
				'type'=>'hide',
				'value'=>$_SERVER['REMOTE_ADDR']
			));


			echo $this->Form->input('copies', array(
				'label'=>'Cópias',
				));

			?>
			<a href="#" class="options span12">Opções...</a>
		<div class="options">				
			<?php 
			
			echo $this->Form->input('pages', array(
				'label'=>"Página(s):",
				'type'=>'text',
				'div'=>'span4',
				'placeholder'=>'ex: 1-5 or 2,3,4'
			));

			echo $this->Form->input('double_sided', array(
				'label'=>"Frente e verso:",
				'type'=>'select',
				'div'=>'span4',
				'empty'=>'Um lado',
				'options'=>array(
					'two-sided-long-edge'=>'Virar na borda(padrão)',
					'two-sided-short-edge'=>'Virar na borda(short)',
				)
			));

			echo $this->Form->input('page_set', array(
				'label'=>"Apenas imprimir:",
				'type'=>'select',
				'div'=>'span4',
				'empty'=>'Todas folhas',
				'options'=>array(
					'even'=>'Folhas pares',
					'odd'=>'Folhas impares',					
				)
			));

		?>
		</div>
		<div class="options">
		<?php 
			echo $this->Form->input('media', array(
				'label'=>"Tamanho do papel:",
				'type'=>'select',
				'div'=>'span4',
				'default'=>'A4',
				'options'=>array(
					'A3'=>'A3',
					'A4'=>'A4',
					'A5'=>'A5',
					'A6'=>'A6',
				)
			));

			echo $this->Form->input('orientation', array(
				'label'=>"Orientação",
				'type'=>'select',
				'div'=>'span4',
				'default'=>'3',
				'options'=>array(
					'3'=>'retrato',
					'4'=>'paisagem',
				)
			));

		 ?>
		</div>
		<?php 
			echo $this->Form->input('file.', array(
				'label'=>false,
				'type'=>'file',
				'multiple'=>true,
			));			

			echo $this->Form->input('file_dir', array(
				'type'=>'hide'
			));			

			echo $this->Form->input('params', array(
				'label'=>ucfirst(__('params')),
				'type'=>'hide',
			));

			echo $this->Form->input('printWebApp', array(
				'label'=>ucfirst(__('printWebApp')),
				'type'=>'hide',
			));

			echo $this->Form->input('status', array(
				'label'=>ucfirst(__('status')),
				'type'=>'hide',
			));

			echo $this->Form->input('status', array(
				'label'=>ucfirst(__('status')),
				'type'=>'hide',
				'value'=>1
			));

		 ?>
		<div class="form-actions form-horizontal">
			<?php			  echo $this->Form->button('Enviar', array(
				'class'=>'btn btn-info'
			))." ";
			echo $this->Form->button('Limpar', array(
				'type'=>'reset',
				'class'=>'btn btn-warning'
			));
			
			echo $this->Form->end();

			?>		
		</div>

	</div>

	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<h3><?php echo __('Actions'); ?></h3>
			
			<?php  echo $this->Html->link('Voltar', 
				array( 'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>
		
			<?php  echo $this->Html->link('Visualizar', 
				array('action' => 'view', $this->params['pass'][0]),
				array('class'=> 'btn btn-block btn-success')
			); ?>			
			<?php  echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block btn-danger', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>
				</div>
	</div>

</div>
