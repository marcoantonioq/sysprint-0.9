<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Archive', array('type'=>'file'));
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  	

			echo $this->Form->input('user_id', array(
				'label'=>ucfirst(__('user_id')),
			));

			echo $this->Form->hidden('name', array(
				'label'=>ucfirst(__('name')),
			));

			echo $this->Form->hidden('size', array(
				'label'=>ucfirst(__('size')),
			));

			echo $this->Form->input('file', array(
				'label'=>ucfirst(__('file')),
			));

			echo $this->Form->input('file_dir', array(
				'label'=>ucfirst(__('file_dir')),
			));

			echo $this->Form->hidden('permission', array(
				'label'=>ucfirst(__('permission')),
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
