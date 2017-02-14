<div class="row-fluid">
    <div class="span12">
    	<h3>
    		Versão atual: <?php echo $version[0]; ?>
    	</h3>
    </div>

    <div class="span12">
    	<?php
			echo $this->Form->postLink('Atualizar',
				array('action' => 'index'),
				array('class'=> 'btn btn-success'),
                __('Tem certeza de que deseja atualizar o sistema? (Faça backup)')
			);
		?>
	</div>

    <div class="span12">
        <?php echo $return ?>
    </div>
</div>
