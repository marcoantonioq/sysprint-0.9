<div class="row-fluid">
    <div class="span12 painel-admin">

		<?php
    echo $this->Html->link( $this->Html->image("/img/icons/dashboard.png"),
			array(
				'controller'=>'dashboard',
				'action' => 'index'
			),
			array(
				'escape' => false,
				'title'=>'Dashboard'
			)
		);

    echo $this->Html->link( $this->Html->image("/img/icons/print.png"),
			array(
				'controller'=>'printers',
				'action' => 'index'
			),
			array(
				'escape' => false,
				'title'=>'Impressoras'
			)
		);

    echo $this->Html->link(
			$this->Html->image("/img/icons/1_users.png"),
			array(
				'controller' => 'users',
				'action' => 'index'
			),
			array(
				'escape' => false,
				'title'=>"Usuários"
			)
		)." ";

			echo $this->Html->link( $this->Html->image("/img/icons/chart.png"),
				array(
					'controller'=>'jobs',
					'action'=>'index'
				),
				array(
					'escape' => false,
					'title'=>'Trabalhos de impressão'
				)
			)." ";

      echo $this->Html->link( $this->Html->image("/img/icons/advancedsettings.png"),
  			array(
  				'controller'=>'settings',
  				'action' => 'index'
  			),
  			array(
  				'escape' => false,
  				'title'=>'Impressoras'
  			)
  		);

      	echo $this->Html->link( $this->Html->image("/img/icons/up.png"),
  			array(
  				'controller'=>'updates',
  				'action' => 'index'
  			),
  			array(
  				'escape' => false,
  				'title'=>'Update'
  			)
  		);

			echo $this->Html->link(
				$this->Html->image("/img/icons/logout.png"),
				'/',
				array(
					'escape' => false,
					'title'=>'Sair do painel'
				)
			)." ";
		?>


	</div>
</div>
