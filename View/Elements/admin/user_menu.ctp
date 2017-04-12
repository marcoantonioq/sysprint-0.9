<div class="menu">
	<?php
		echo $this->Html->image('/img/icons/app.png',
			array('class'=>'app pulse')
		);
	 ?>

	<?php echo $this->Html->link( $this->Html->image("/img/icons/print.png"),
		array('controller'=>'printers'),
		array(
			'escape' => false,
			'title'=>'Impressoras'
		)
	); ?>



		<?php
			$user =  $this->Session->read('Auth');
			echo  $this->Html->link(
				$this->Html->image("/img/icons/control_panel.png"),
				array(
					'plugin'=>false,
					'app'=>false,
					'controller' => 'printers',
					'action' => 'index'
				),
				array(
					'escape'=> false,
					'title'=>'Painel de controle'
				)
			)." ";

			$nome = explode(" ",$user['name']);
  			$primeiro_nome = $nome[0];

			echo $this->Html->link(
				$this->Html->image("/img/icons/users.png"),
				array(
					'plugin'=>false,
					'app'=>true,
					'controller' => 'users',
					'action' => 'index'
				),
				array(
					'escape' => false,
					'title'=>"Olá $primeiro_nome!"
				)
			)." ";

			echo $this->Html->link( $this->Html->image("/img/icons/chart.png"),
				array('controller'=>'jobs'),
				array(
					'escape' => false,
					'title'=>'Trabalhos de impressão'
				)
			)." ";

			echo $this->Html->link(
				$this->Html->image("/img/icons/logout.png"),
				array(
					// 'plugin'=>'administration',
					'app'=>true,
					'controller'=>'users',
					'action'=>'logout'
				),
				array(
					'escape' => false,
					'title'=>'Sair'
				)
			)." ";
		?>

</div>
