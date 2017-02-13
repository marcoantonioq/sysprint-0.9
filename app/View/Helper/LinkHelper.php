<?php 
App::uses('AppHelper', 'View/Helper'); 
class LinkHelper extends AppHelper {
	public $helpers = array('Html', 'Form');

	
	public function icon($title, $icon = null, $url = '#', $params = array(), $message = null) {
		$params += array(
			'escape'=>false,
			'class'=>$icon
		);
		$link = $this->Html->link(
			__("{$title}"),
			$url,
			$params,
			$message
		);
		return $link;
	}

	
	public function status($id, $status=0, $collum='status') {
		// pr($this); exit;
		$url = array(
			'plugin' => $this->request->params['plugin'],
			'controller' =>$this->request->params['controller'],
			'action' => 'status',
			$id,
			($status)?1:0,
			$collum,
		);
		$class = ($status == 1) ? 'statusAjax icon-ok' : 'statusAjax icon-remove';
		return $this->icon('', $class, $url);
	}

	public function filter($name){

		$this->Form->inputDefaults(array(
            'label'=>false,
            'div'=>false,
            'class'=>'span6',
            'autocomplete'=>'off',
            'onfocus'=>'this.select();',
        ));

		$options = array(
            '=' => 'igual',
            'LIKE' => 'contenha',
            'NOT LIKE' => 'não contenha',
            'LIKE BEGIN' => 'começando com',
            'LIKE END' => 'terminando com',
            '!=' => 'diferente',
            '>'  => 'maior do que',
            '>=' => 'maior ou igual a',
            '<'  => 'menor que',
            '<=' => 'menor ou igual a'
        );

		echo $conditions = $this->Form->input("conditions.$name", array(
            'options' => $options,
        ));

        echo $this->Form->input('id', array(
			'autofocus' => true,
			'onkeydown'=>'bloquearCtrlJ();',
			'placeholder' => ucfirst(__($name)).'...',
		));
	}


} 

?>

