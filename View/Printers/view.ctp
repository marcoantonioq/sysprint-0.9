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
                <?php echo $printer['Printer']['descrition']; ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($printer['Printer']['created']); ?>
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

			<?php echo $this->Html->link('Novo '.__('printer'),
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
		
		
<?php if (!empty($printer['Job'])): ?>

		<h3>
			<a href="#"  id="Job">
				<?php echo __('Jobs'); ?> (30)</a>
		</h3>
		
	<div class="tabela " id="Job">
	<table class='rwd-table'>
		<tr>
		<th><?php echo __('user_id'); ?></th>
		<th><?php echo __('date'); ?></th>
		<th><?php echo __('pages'); ?></th>
		<th><?php echo __('copies'); ?></th>
		<th><?php echo __('host'); ?></th>
		<th><?php echo __('file'); ?></th>
		<th><?php echo __('updated'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($printer['Job'] as $job): ?>
		<?php if ( !isset($job['id']))
			continue; ?>
		<tr>
			<td data-th="<?php echo ucfirst(__('user_id')) ?>" >
				<?php echo $this->Html->link(
					ucfirst($users[$job['user_id']]), 
					array(
						'controller'=>'users', 
						'action'=>'view', 
						$job['user_id']
					)
				); ?>
			</td>
			<td data-th="<?php echo ucfirst(__('date')) ?>" ><?php echo $job['date']; ?></td>
			<td data-th="<?php echo ucfirst(__('pages')) ?>" ><?php echo $job['pages']; ?></td>
			<td data-th="<?php echo ucfirst(__('copies')) ?>" ><?php echo $job['copies']; ?></td>
			<td data-th="<?php echo ucfirst(__('host')) ?>" ><?php echo $job['host']; ?></td>
			<td data-th="<?php echo ucfirst(__('file')) ?>" ><?php echo $job['file']; ?></td>
			<td data-th="<?php echo ucfirst(__('updated')) ?>" ><?php echo $job['updated']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'jobs', 
						'action' => 'view', 
						$job['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'jobs', 
						'action' => 'edit', 
						$job['id']
					),
					array(
						'escape'=>false,
						'class'=>'edit',
						'title'=>'Editar',
					)
				);

			?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
	</div>

<?php endif; ?>


		

</div>
