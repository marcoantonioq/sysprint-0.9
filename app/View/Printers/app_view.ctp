<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($printer['Printer']['id']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('name')); ?></dt>
            <dd>
                <?php echo h($printer['Printer']['name']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('local')); ?></dt>
            <dd>
                <?php echo h($printer['Printer']['local']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('descrition')); ?></dt>
            <dd>
                <?php echo h($printer['Printer']['descrition']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo $printer['Printer']['created']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($printer['Printer']['updated']); ?>
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
		</div>
	</div>
</div>