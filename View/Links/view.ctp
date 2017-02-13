<div class="row-fluid">

	
	<div class='span8'>
	    <dl>
			<dt><?php echo ucfirst(__('id')); ?></dt>
            <dd>
                <?php echo h($link['Link']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('ParentLink')); ?></dt>
            <dd>
                <?php echo $this->Html->link($link['ParentLink']['title'], array('controller' => 'links', 'action' => 'view', $link['ParentLink']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo ucfirst(__('Menu')); ?></dt>
            <dd>
                <?php echo $this->Html->link($link['Menu']['title'], array('controller' => 'menus', 'action' => 'view', $link['Menu']['id'])); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('title')); ?></dt>
            <dd>
                <?php echo h($link['Link']['title']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('class')); ?></dt>
            <dd>
                <?php echo h($link['Link']['class']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('description')); ?></dt>
            <dd>
                <?php echo h($link['Link']['description']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('link')); ?></dt>
            <dd>
                <?php echo h($link['Link']['link']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('target')); ?></dt>
            <dd>
                <?php echo h($link['Link']['target']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('rel')); ?></dt>
            <dd>
                <?php echo h($link['Link']['rel']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('status')); ?></dt>
            <dd>
                <?php echo h($link['Link']['status']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('lft')); ?></dt>
            <dd>
                <?php echo h($link['Link']['lft']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('rght')); ?></dt>
            <dd>
                <?php echo h($link['Link']['rght']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('visibility_roles')); ?></dt>
            <dd>
                <?php echo h($link['Link']['visibility_roles']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('params')); ?></dt>
            <dd>
                <?php echo h($link['Link']['params']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('updated')); ?></dt>
            <dd>
                <?php echo h($link['Link']['updated']); ?>
                &nbsp;
            </dd>
			<dt><?php echo ucfirst(__('created')); ?></dt>
            <dd>
                <?php echo h($link['Link']['created']); ?>
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

			<?php echo $this->Html->link('Novo '.__('link'),
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
		
		
<?php if (!empty($link['ChildLink'])): ?>

		<h3>
			<a href="#" id="viewtable" >
				<?php echo __('Links'); ?>			</a>
		</h3>
		
	<div class="tabela" >
	<table id="tableid1" class='rwd-table'>
		<tr>
			<th><?php echo __('id'); ?></th>
		<th><?php echo __('parent_id'); ?></th>
		<th><?php echo __('menu_id'); ?></th>
		<th><?php echo __('title'); ?></th>
		<th><?php echo __('class'); ?></th>
		<th><?php echo __('description'); ?></th>
		<th><?php echo __('link'); ?></th>
		<th><?php echo __('target'); ?></th>
		<th><?php echo __('rel'); ?></th>
		<th><?php echo __('status'); ?></th>
		<th><?php echo __('lft'); ?></th>
		<th><?php echo __('rght'); ?></th>
		<th><?php echo __('visibility_roles'); ?></th>
		<th><?php echo __('params'); ?></th>
		<th><?php echo __('updated'); ?></th>
		<th><?php echo __('created'); ?></th>
			<th data-th="Ações" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($link['ChildLink'] as $childLink): ?>
		<tr>
			<td data-th=<?= ucfirst(__('id')) ?> ><?php echo $childLink['id']; ?></td>
			<td data-th=<?= ucfirst(__('parent_id')) ?> ><?php echo $childLink['parent_id']; ?></td>
			<td data-th=<?= ucfirst(__('menu_id')) ?> ><?php echo $childLink['menu_id']; ?></td>
			<td data-th=<?= ucfirst(__('title')) ?> ><?php echo $childLink['title']; ?></td>
			<td data-th=<?= ucfirst(__('class')) ?> ><?php echo $childLink['class']; ?></td>
			<td data-th=<?= ucfirst(__('description')) ?> ><?php echo $childLink['description']; ?></td>
			<td data-th=<?= ucfirst(__('link')) ?> ><?php echo $childLink['link']; ?></td>
			<td data-th=<?= ucfirst(__('target')) ?> ><?php echo $childLink['target']; ?></td>
			<td data-th=<?= ucfirst(__('rel')) ?> ><?php echo $childLink['rel']; ?></td>
			<td data-th=<?= ucfirst(__('status')) ?> ><?php echo $childLink['status']; ?></td>
			<td data-th=<?= ucfirst(__('lft')) ?> ><?php echo $childLink['lft']; ?></td>
			<td data-th=<?= ucfirst(__('rght')) ?> ><?php echo $childLink['rght']; ?></td>
			<td data-th=<?= ucfirst(__('visibility_roles')) ?> ><?php echo $childLink['visibility_roles']; ?></td>
			<td data-th=<?= ucfirst(__('params')) ?> ><?php echo $childLink['params']; ?></td>
			<td data-th=<?= ucfirst(__('updated')) ?> ><?php echo $childLink['updated']; ?></td>
			<td data-th=<?= ucfirst(__('created')) ?> ><?php echo $childLink['created']; ?></td>
			<td data-th="Ações" class="actions">

			<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'controller' => 'links', 
						'action' => 'view', 
						$childLink['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); 
				
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'controller' => 'links', 
						'action' => 'edit', 
						$childLink['id']
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
