<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Job'); 
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
				'label'=>ucfirst(__('printer_id')),
			));

			echo $this->Form->input('date', array(
				'label'=>ucfirst(__('date')),
			));

			echo $this->Form->input('pages', array(
				'label'=>ucfirst(__('pages')),
			));

			echo $this->Form->input('copies', array(
				'label'=>ucfirst(__('copies')),
			));

			echo $this->Form->input('host', array(
				'label'=>ucfirst(__('host')),
			));

			echo $this->Form->input('file', array(
				'label'=>ucfirst(__('file')),
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

			?>		</div>

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
