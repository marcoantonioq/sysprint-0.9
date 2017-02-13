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
		</dl>
	</div>
	
	</p>
	
	<div class="span4">
		<div class="actions form-horizontal well ucase">

			<?php echo $this->Html->link('Voltar', 
				array('controller'=>'printers',  'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>

			<?php 
				echo $this->Html->link(
					'Sair',
					array(
						// 'plugin'=>'administration',
						'app'=>true,
						'controller'=>'users',
						'action'=>'logout'
					),
					array(
						'escape' => false,
						'class'=> 'btn btn-info btn-block'
					)
				)." ";

			 ?>

		</div>
	</div>
</div>


<div class="row-fluid">
		
		
<?php if (!empty($user['Job'])): ?>

		<h3>
			<a href="#"  id="Job">
				<?php echo __('Jobs'); ?> (30)</a>
		</h3>
		
	<div class="tabela " id="Job">
		<?php 
			// pr($prints);
		?>
	<table class='rwd-table'>
		<tr>
		<th><?php echo ucfirst(__('printer_id')); ?></th>
		<th><?php echo ucfirst(__('date')); ?></th>
		<th><?php echo ucfirst(__('pages')); ?></th>
		<th><?php echo ucfirst(__('copies')); ?></th>
		<th><?php echo ucfirst(__('host')); ?></th>
		<th><?php echo ucfirst(__('file')); ?></th>
		<th><?php echo ucfirst(__('created')); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($user['Job'] as $job): ?>
		<?php if ( !isset($job['id']))
			continue; ?>
		<tr>
			<td data-th="<?php echo ucfirst(__('printer_id')) ?>" >
				<?php echo $this->Html->link(
					ucfirst($prints[$job['printer_id']]), 
					array(
						'controller'=>'printers', 
						'action'=>'view', 
						$job['printer_id']
					)
				); ?>
			</td>
			<td data-th="<?php echo ucfirst(__('date')) ?>" ><?php echo $job['date']; ?></td>
			<td data-th="<?php echo ucfirst(__('pages')) ?>" ><?php echo $job['pages']; ?></td>
			<td data-th="<?php echo ucfirst(__('copies')) ?>" ><?php echo $job['copies']; ?></td>
			<td data-th="<?php echo ucfirst(__('host')) ?>" ><?php echo $job['host']; ?></td>
			<td data-th="<?php echo ucfirst(__('file')) ?>" ><?php echo $job['file']; ?></td>
			<td data-th="<?php echo ucfirst(__('created')) ?>" ><?php echo $job['created']; ?></td>
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
