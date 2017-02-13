<ul id="footer-cols">
	<li class="col">
		<h6>Pages</h6>
		<ul>
			<li class="page_item">
					<?php echo $this->Html->link(
						'Home',
						array(
							'controller' => 'homes',
							'action' => 'index'
						),
						array('escape' => false)
					); ?>
					
				</li>
				<li class="page_item">
					<?php echo $this->Html->link(
						'Conteúdo',
						array(
							'controller' => 'contents',
							'action' => 'index'
						),
						array('escape' => false)
					); ?>
					
				</li>
				
				<li class="page_item">
					<?php echo $this->Html->link(
						'Cursos',
						array(
							'controller' => 'cursos',
							'action' => 'index'
						),
						array('escape' => true)
					); ?>
				</li>
				
				<li class="page_item">
					<?php echo $this->Html->link(
						'Eventos',
						array(
							'controller' => 'events',
							'action' => 'index'
						),
						array('escape' => true)
					); ?>
				</li>
				
				<li class="page_item">
					<?php echo $this->Html->link(
						'Contato',
						array(
							'controller' => 'contacts',
							'action' => 'index'
						),
						array('escape' => false)
					); ?>
				</li>
			
		</ul>
	</li>
	
	<li>
		<center>
		<br>
		</p>
		<?php 
			$img = $this->Html->image("/files/home/ifg.png",array('height' =>'60px')).' ';
			echo $this->Html->link($img, 'http://www.ifgoiano.edu.br/', array( 'escape'=>false,'target'=>'_blank'));

			$img = $this->Html->image("/files/home/nucleo.png", array('height' =>'60px',)).' ';
			echo $this->Html->link($img, '/', array( 'escape'=>false,'target'=>'_blank'));
			
			$img = $this->Html->image("/files/home/tads.png", array('height' =>'60px')).' ';
			echo $this->Html->link($img,  array('controller'=>'cursos', 'action'=>'view', 1), array( 'escape'=>false,'target'=>'_blank'));

			$img = $this->Html->image("/files/home/tr.png", array('height' =>'60px')).' ';
			echo $this->Html->link($img,  array('controller'=>'cursos', 'action'=>'view', 3), array( 'escape'=>false,'target'=>'_blank'));

			$img = $this->Html->image("/files/home/gti.png", array('height' =>'60px')).' ';
			echo $this->Html->link($img,  array('controller'=>'cursos', 'action'=>'view', 2), array( 'escape'=>false,'target'=>'_blank'));


			$img = $this->Html->image("/files/home/ptv.png", array('height' =>'60px')).' ';
			echo $this->Html->link($img, 'http://www.ptvnet.com.br/', array( 'escape'=>false,'target'=>'_blank'));

			$img = $this->Html->image("/files/home/stefanini.png", array('height' =>'60px')).' ';
			echo $this->Html->link($img, 'http://stefanini.com/br/', array( 'escape'=>false,'target'=>'_blank'));


		?>
		</center>
	</li>
	<!-- <li class="col">
		<h6>Nucleo de informática</h6>
		Esta pagina pertence ao Nucleo de Irmormática		
	</li> -->
	
</ul>