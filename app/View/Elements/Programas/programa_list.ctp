<div class="panes">	
	<!-- Contents -->
	
	<div style="display: block;">
		
		<ul class="blocks-thumbs thumbs-rollover">
			<?php foreach ($events as $event): ?>
				<li>
					<?php $this->Html->link(
						$this->Html->img('/img/template/596x270.gif', array('width'=>'282px', 'height'=>'150px')),
						array(
							'controller' => 'events',
							'action' => 'view',
							$event['Event']['id'],
						),
						array(
							'class' => 'thumb',
							'escape' => false
						)
					); ?>
					<div class="excerpt">
						<?= $this->Html->link($event['Event']['nome'], array('controller' => 'events', 'action' => 'view', $event['Event']['id']), array('class' => 'header') ); ?>
					</div>
					<?php $this->Html->link(
						'<span>Veja mais →</span>',
						array(
							'controller' => 'events',
							'action' => 'view',
							$event['Event']['id'],
						),
						array(
							'class' => 'link-button',
							'escape' => false
						)
					); ?>
				</li>			
			<?php endforeach; ?>
		</ul>
	</div>
</div>