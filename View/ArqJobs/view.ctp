<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('user')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['user']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('printer')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['printer']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('date')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['date']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('pages')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['pages']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('copies')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['copies']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('host')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['host']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['file']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('params')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['params']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['created']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($arqJob['ArqJob']['updated']); ?>
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

			<?php echo $this->Html->link('Novo '.__('arqJob'),
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
