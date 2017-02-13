<?php 
	// pr($this->request->params);
	if(!empty($this->request->params['plugin'])){
    	$this->Html->addCrumb(
    		"Administração", 
    		array(
    			'plugin' => $this->request->params['plugin'], 
    			'controller'=>'homes', 
    			'action'=>'index'
			)
		); 
    }

    if(!empty($this->request->params['controller'])){
    	$this->Html->addCrumb(
    		ucfirst(__($this->request->params['controller'])), 
    		array(
    			'controller'=> $this->request->params['controller'], 
    			'action'=>'index'
			)
		); 
    }

    if(!empty($this->request->params['action'])){
    	if (empty($this->request->params['pass'][0])) {
	    	$this->Html->addCrumb(
	    		ucfirst(__($this->request->params['action'])), 
	    		array(
	    			'action'=>$this->request->params['action']
				)
			);    		
    	} else {
    		$this->Html->addCrumb(
	    		ucfirst(__($this->request->params['action'])), 
	    		array(
	    			'action'=>$this->request->params['action'], 
	    			$this->request->params['pass'][0]
				)
			);
    	}
    }

    foreach ($this->request->params['pass'] as $key => $value) {
        $this->Html->addCrumb( $value); 
    }
 ?>

<?php
$crumbs = $this->Html->getCrumbs(' > ', array(
    'text' => $this->Html->image('/img/icons/home.png'),
    'url' => array('controller' => 'printers', 'action' => 'index', 'Todas'),
    'escape' => false
));

?>
<?php if (!empty($crumbs)): ?>
	<div class="breadcrumb">
		<?php echo $crumbs; ?>
	</div>
<?php endif; ?>

