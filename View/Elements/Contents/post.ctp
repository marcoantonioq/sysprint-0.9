<div class="post">
	
	<h1><?php echo $this->Html->link($content['Content']['title'], array('controller' => 'contents', 'action' => 'view', $content['Content']['id'])); ?></h1>
	<div class="thumb-shadow">
		<div class="post-thumbnail">
			<?php if($content['Content']['file_dir']){
				echo $this->Html->image('/files/content/file/'.$content['Content']['file_dir'].'/'.$content['Content']['file']);
			}else{
				echo $this->Html->image('/img/template/596x270.gif');
			} ?>
		</div>
		<div>
			<?php echo h($content['Content']['body']); ?>		
		</div>
	</div>
</div>
