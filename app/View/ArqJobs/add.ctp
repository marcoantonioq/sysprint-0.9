<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('ArqJob'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('user', array(
				'label'=>ucfirst(__('user')),
			));

			echo $this->Form->input('printer', array(
				'label'=>ucfirst(__('printer')),
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

			echo $this->Form->input('params', array(
				'label'=>ucfirst(__('params')),
			));

			echo $this->Form->input('status', array(
				'label'=>ucfirst(__('status')),
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
				</div>
	</div>

</div>
