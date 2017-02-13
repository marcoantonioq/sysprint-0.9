<?php $mensagens_count = $this->requestAction('Users/mensagens_count'); ?>
<?php if($mensagens_count > 0): ?>

<li>
<?php
	$img = $this->Html->image('/img/template/icons/mail.png',array(
			'width' =>'30px',
			'height' => '30px'
		), array(
			'escape' => false,
		)
	);

	echo $this->Html->link(
	"$img <span class='rednum'>".$mensagens_count."</span>",
	array(
		'admin' => false,
		'controller' => 'users',
		'action' => 'mensagens'
	),
	array(
		'escape' => false,
	)
); ?>
</li>
<?php endif; ?>
<li>
	<?php echo $this->Html->link($user['name'],array(
		'controller' => 'users', 
		'action' => 'index'
	),
	array(
		'escape' => false,
	));?>
</li>
