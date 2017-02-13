<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($user['User']['name']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('username')); ?></dt>
            <dd>
                <?php echo h($user['User']['username']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('email')); ?></dt>
            <dd>
                <?php echo h($user['User']['email']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('group')); ?></dt>
            <dd>
                <?php echo h($user['Group']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('quota')); ?></dt>
            <dd>
                <?php echo h($user['User']['quota']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($user['User']['created']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($user['User']['updated']); ?>
                &nbsp;
            </dd>
		</dl>
	</div>

	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<a href="javascript:history.back()" class="btn btn-block">Voltar</a>
			
			<?php echo $this->Html->link('Sair', 
				array( 'action' => 'logout'),
				array('class'=> 'btn btn-block btn-info')
			); ?>

		</div>
	</div>

</div>

