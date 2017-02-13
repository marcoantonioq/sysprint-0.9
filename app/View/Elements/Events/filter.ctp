<ul class="filter">
	<li>Saiba mais: </li>
	<li><?= $this->Html->link("Eventos", array('controller' => 'events', 'action' => 'index'), array('title' => 'Veja todos eventos'));  ?></li>
	<li><?= $this->Html->link("Participações", array('controller' => 'holdings', 'action' => 'index'), array('title' => 'Veja suas pariticipações'));  ?></li>	
	<li><?= $this->Html->link("Programas", array('controller' => 'programs', 'action' => 'index'), array('title' => 'Veja todos programas'));  ?></li>
	<li><?= $this->Html->link("Palestrantes", array('controller' => 'speakers', 'action' => 'index'), array('title' => 'Todos palestrantes em eventos no IFGoiano - Urutaí'));  ?></li>	
</ul>