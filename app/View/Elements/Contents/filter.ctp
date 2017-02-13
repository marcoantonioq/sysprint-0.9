<ul class="filter">
	
	<li></li>
	
	<li class="active">
		<?php echo $this->Html->link('Todos', array('controller' => 'contents', 'action' => 'index')); ?>
	</li>
	
	<?php $types = $this->requestAction('Types/index'); ?>
	
	<?php foreach($types as $key => $tipo): ?>
		<li><?= $this->Html->link($tipo['Type']['alias'], array('controller' => 'types', 'action' => 'view', $tipo['Type']['id']));  ?></li>
	<?php endforeach;  ?>
	 
</ul>