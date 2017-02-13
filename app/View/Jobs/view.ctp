<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($job['Job']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('User')); ?></dt>
            <dd>
                <?php echo $this->Html->link($job['User']['name'], array('controller' => 'users', 'action' => 'view', $job['User']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Printer')); ?></dt>
            <dd>
                <?php echo $this->Html->link($job['Printer']['name'], array('controller' => 'printers', 'action' => 'view', $job['Printer']['id'])); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('date')); ?></dt>
            <dd>
                <?php echo h($job['Job']['date']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('pages')); ?></dt>
            <dd>
                <?php echo h($job['Job']['pages']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('copies')); ?></dt>
            <dd>
                <?php echo h($job['Job']['copies']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('host')); ?></dt>
            <dd>
                <?php echo h($job['Job']['host']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?php echo h($job['Job']['file']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($job['Job']['created']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($job['Job']['updated']); ?>
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
