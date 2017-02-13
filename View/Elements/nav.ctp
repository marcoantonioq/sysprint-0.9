<div class="grid_12">
    <ul class="nav main">
    	<li class="">
			<?php echo $this->Html->link(
                '<span>Home</span>', 
                array(
                    'admin' => true, 
                    'controller'=>'pages'
                ),
                array(
                    'escape' => false
                )
            ); ?>
    	</li>
        <li class="conteudo">
            <?php echo $this->Html->link(
                "<span>Conteúdo</span>",
                array(
                    'admin' => true, 
                    'controller'=>'contents', 
                    'action'=>'index'
                ),
                array('escape' => false)
            ); ?>
            <ul>
                <li>
                    <a href="#">Cadastrar</a> 
                </li>
            </ul>
        </li>
        
        <li class="eventos">
            <?php echo $this->Html->link(
                "<span>Eventos</span>",
                array(
                    'admin' => true, 
                    'controller'=>'events', 
                    'action'=>'index'
                ),
                array('escape' => false)
            ); ?>
            <ul>
                <li>
                    <?php echo $this->Html->link(
                        "Eventos",
                        array(
                            'admin' => true, 
                            'controller'=>'events', 
                            'action'=>'index'
                        )
                    ); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        "Programas",
                        array(
                            'admin' => true, 
                            'controller'=>'programs',
                            'action'=>'index'
                        )
                    ); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        "Palestrantes",
                        array(
                            'admin' => true, 
                            'controller'=>'palestrantes', 
                            'action'=>'index'
                        )
                    ); ?>
                </li>
            </ul>
        </li>
    </ul>
</div>