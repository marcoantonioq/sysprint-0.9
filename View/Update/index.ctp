<div class="row-fluid">
    <div class="span12">
    	<h2>Versão atual: </h2>
    </div>

    <div class="span12 well">
		<?php
			echo $this->Html->link('Atualizar',
				array(
					'controller' => 'spools',
					'action' => 'add'
				),
				array('class'=> 'span3 btn btn-success')
			)." ";
			
			echo $this->Html->link('Editar impressoras',
				array('controller' => 'printers', 'action' => 'indexedit'),
				array('class'=> 'span3 btn')
			);
		?>
	</div>

</div>
