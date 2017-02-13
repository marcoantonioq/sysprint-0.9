<ul id="sidebar">
	<li>
		<?php $programs = $this->requestAction('Programs/requestIndex');	?>
		<h6><?php echo $this->Html->link('Programas ativos', array('controller' => 'programs', 'action' => 'index')); ?></h6>		
		<ul>
			<?php foreach($programs as $key => $list): ?>
				<li class="cat-item" >
					<?php echo $this->Html->link(
						$list,
						array(
							'controller' => 'programs',
							'action' => 'view',
							$key
						)
					); ?>		
				</li>
			<?php endforeach; ?>
			<li ></li>
		</ul>
	</li>
</ul>
