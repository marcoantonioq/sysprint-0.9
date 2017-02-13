<ul class="filter">
	<li>Saiba mais: </li>
	<li><?= $this->Html->link("Programas", array('controller' => 'programas', 'action' => 'index'));  ?></li>
	<li><?= $this->Html->link("Particiações", array('controller' => 'holdings', 'action' => 'index'));  ?></li>
	<li><?= $this->Html->link("Certificados", array('controller' => 'holdings', 'action' => 'certificados'));  ?></li>
	<li><?= $this->Html->link("Palestrantes", array('controller' => 'palestrantes', 'action' => 'index'));  ?></li>	
</ul>