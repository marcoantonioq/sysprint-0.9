<?php
	echo $this->Paginator->counter(array(
	'format' => __('Paginas {:page}/{:pages}. Registros {:current}/{:count}.')
	));
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