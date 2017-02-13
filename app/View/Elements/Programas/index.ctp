<?php $events = $this->requestAction('Events/index'); ?>

<?php if(!empty($events)): ?>
	<?php foreach ($events as $event):?>
		
		<div id="headline">
			<span class="main">Aberta inscrições para <?= $event['Event']['nome'];  ?></span>
			<span class="sub">Realização <?= $event['Event']['realizacao'];  ?>.</span>
			
			<!--<?php echo $this->Html->link($event['Event']['nome'], array('controller' => 'events', 'action' => 'view', $event['Event']['id']), array('id' => 'link', 'class' => 'link-button-big')); ?>-->
			
			<?php echo $this->Html->link(
				'<span>'.$event['Event']['nome'].'</span>',
				array(
					'controller' => 'events',
					'action' => 'view',
					$event['Event']['id']
				),
				array(
					'class' =>'link-button-big',
					'id'=>'link',
					'escape' => false
				)
			); ?>		
			
		</div>
		
	<?php endforeach; ?>
<?php endif; ?>