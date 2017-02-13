<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($spool['Spool']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('User')); ?></dt>
            <dd>
                <?php echo $this->Html->link($spool['User']['name'], array('controller' => 'users', 'action' => 'view', $spool['User']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Printer')); ?></dt>
            <dd>

                <?php 
                    echo $spool['Printer']['name'];
                    // echo $this->Html->link($spool['Printer']['name'], 
                    //     array(
                    //         'controller' => 'printers', 
                    //         'action' => 'view', 
                    //         $spool['Printer']['id']
                    //     )
                    // ); 
                ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('pages')); ?></dt>
            <dd>
                <?php echo h($spool['Spool']['pages']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('copies')); ?></dt>
            <dd>
                <?php echo h($spool['Spool']['copies']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('host')); ?></dt>
            <dd>
                <?php echo h($spool['Spool']['host']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('file')); ?></dt>
            <dd>
                <?php echo h($spool['Spool']['file']); ?>
                &nbsp;
            </dd>
			<dt>Status</dt>
            <dd>
                <?php echo $this->Status->printer($spool['Spool']['status']); ?>
            </dd>
            <dt>Criado</dt>
            <dd>
                <?php echo h($spool['Spool']['created']); ?>
                &nbsp;
            </dd>
            <dt>Atualizado</dt>
            <dd>
                <?php echo h($spool['Spool']['updated']); ?>
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

			<?php echo $this->Html->link('Novo '.__('spool'),
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
