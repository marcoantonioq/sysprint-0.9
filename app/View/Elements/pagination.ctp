
<?php
	echo $this->Paginator->counter(array(
	'format' => __('Paginas {:page} de {:pages}, mostrando {:current} registros fora de {:count} total.')
	));
	//'format' => __('Paginas {:page} de {:pages}, mostrando {:current} registros fora de {:count} total, começando no registro {:start}, indo em {:end}.')
?>	
</p>
<div class="paging">
<?php
	echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('proximo') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>

</p>