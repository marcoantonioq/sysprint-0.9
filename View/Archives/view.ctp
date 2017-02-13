<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($archive['Archive']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('User')); ?></dt>
            <dd>
                <?php echo $this->Html->link($archive['User']['name'], array('controller' => 'users', 'action' => 'view', $archive['User']['id'])); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($archive['Archive']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('size')); ?></dt>
            <dd>
                <?php echo h($archive['Archive']['size']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?php echo h($archive['Archive']['file']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file_dir')); ?></dt>
            <dd>
                <?php echo h($archive['Archive']['file_dir']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('permission')); ?></dt>
            <dd>
                <?php echo h($archive['Archive']['permission']); ?>
                &nbsp;
            </dd>
		</dl>
	</div>

	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<h3>Ações</h3>
			
			<?php echo $this->Html->link('Voltar', 
				array( 'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>

			<?php echo $this->Html->link('Novo '.__('archive'),
                array( 'action' => 'add'),
                array('class'=> 'btn btn-block btn-success')
            ); ?>
            <?php echo $this->Html->link('Editar',
                array( 'action' => 'edit', $this->params['pass'][0]),
                array('class'=> 'btn btn-block btn-warning')
            ); ?>			
			<?php echo $this->Form->postLink('Apagar',
				array( 'action' => 'delete', $this->params['pass'][0]),
                array('class'=> 'btn btn-block btn-danger', 'style'=>'margin-top: 5px;'),
                __('Tem certeza de que deseja excluir?')
			);?>
		</div>
	</div>
</div>


<div class="row-fluid">
			

</div>
