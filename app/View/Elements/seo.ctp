<?php
	if($canonical!=null){
		$this->Html->meta('canonical', $canonical, array('inline' => false,'type' => null,'rel'=>'canonical','title'=>null));
	}
	if($keywords!=null){
		$this->Html->meta('keywords', $keywords, array('inline' => false));
	}
	if($description!=null){
		$this->Html->meta('description', $description, array("inline" => false));
	}
	
	if($robots==null) $robots='noindex,nofollow';
	$this->Html->meta(array('name'=>'robots','content'=>$robots), array(), array("inline" => false));
