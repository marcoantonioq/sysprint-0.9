<ul id="sidebar">
	<li>
		
		<?php $events = $this->requestAction('Events/recustIndex');	?>
		<h6><?php echo $this->Html->link('Eventos', array('controller' => 'events', 'action' => 'index')); ?></h6>		
		<ul>
			<?php foreach($events as $key => $list): ?>
				<li class="cat-item" >
					<?php echo $this->Html->link(
						$list,
						array(
							'controller' => 'events',
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
