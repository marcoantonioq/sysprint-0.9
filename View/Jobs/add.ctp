<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Job', array('type'=>"file")); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('user_id', array(
				'label'=>ucfirst(__('user_id')),
			));

			echo $this->Form->input('file', array(
				'label'=>"Descrição:",
				'value' => "Cópia"
			));

			echo $this->Form->input('printer_id', array(
				'label'=>"Impressora:",
				'legend'=>"Impressora",
				'type'=> "radio",
				'class'=>false
			));

			echo $this->Form->input('pages', array(
				'label'=>"Página(s):",
			));

			echo $this->Form->input('copies', array(
				'label'=>ucfirst(__('copies')),
			));

			echo $this->Form->input('date', array(
				'label'=>ucfirst(__('date')),
				// 'selected'=> date("Y-m-d\TH:i:s"),
				'div'=> "hide",
			));

		?>

		<div class="form-actions form-horizontal">
			<?php			  echo $this->Form->button('Enviar', array(
				'class'=>'btn btn-success'
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
				array('controller'=>'printers', 'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>
		</div>
	</div>

</div>