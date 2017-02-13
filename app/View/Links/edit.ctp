<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Link'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('id', array(
				'label'=>ucfirst(__('id')),
			));

			echo $this->Form->input('parent_id', array(
				'label'=>ucfirst(__('parent_id')),
			));

			echo $this->Form->input('menu_id', array(
				'label'=>ucfirst(__('menu_id')),
			));

			echo $this->Form->input('title', array(
				'label'=>ucfirst(__('title')),
			));

			echo $this->Form->input('class', array(
				'label'=>ucfirst(__('class')),
			));

			echo $this->Form->input('description', array(
				'label'=>ucfirst(__('description')),
			));

			echo $this->Form->input('link', array(
				'label'=>ucfirst(__('link')),
			));

			echo $this->Form->input('target', array(
				'label'=>ucfirst(__('target')),
			));

			echo $this->Form->input('rel', array(
				'label'=>ucfirst(__('rel')),
			));

			echo $this->Form->input('status', array(
				'label'=>ucfirst(__('status')),
			));

			echo $this->Form->input('lft', array(
				'label'=>ucfirst(__('lft')),
			));

			echo $this->Form->input('rght', array(
				'label'=>ucfirst(__('rght')),
			));

			echo $this->Form->input('visibility_roles', array(
				'label'=>ucfirst(__('visibility_roles')),
			));

			echo $this->Form->input('params', array(
				'label'=>ucfirst(__('params')),
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
