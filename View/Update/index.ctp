<div class="row-fluid">
    <div class="span12">
    	<h3>
    		Versão atual: <?php echo Configure::read("Setting.version"); ?>
    	</h3>     	

    	<h3>
    		Nova versão: <?php echo $version; ?>
    	</h3>     	
    </div>

    <div class="span12">
    	<?php
			echo $this->Html->link('Atualizar',
				array(
					'controller' => 'spools',
					'action' => 'add'
				),
				array('class'=> 'btn btn-success')
			);
		?>
	</div>
</div>
