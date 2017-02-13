<?php $contents = $this->requestAction('Contents/indexRequest'); ?>
<div id="page-title">
	<span class="title">Conteúdos</span>
	<span class="subtitle">Em destaque</span>
</div>

<div class="panes">	
	<div style="display: block;">
		<ul class="blocks-thumbs thumbs-rollover">
			<?php $i = 0; ?>
			<?php foreach ($contents as $content): ?>
				<?php if($content['Content']['promote'] && $content['Content']['status']): ?>
				<?php $i++; if($i > 3) break; ?>
				<li>
					<a href="/contents/view/<?= $content['Content']['id']; ?>" class="thumb" title="Imagem">
						<?php if(!empty($content['Content']['file_dir'])){
							echo $this->Html->image(
							'/files/content/file/'.$content['Content']['file_dir'].'/'.$content['Content']['file'],
							array(
								'width' => "282px",
								/*'height'=>'150px', */
								'alt' => $content['Content']['file']
							)
							);
						}else{
							echo $this->Html->image(
							'/img/template/596x270.gif', 
							array(
								'width' => "282px",
								/*'height'=>'150px', */
								'alt' => 'Post'
							)
							);
						} ?>
					</a>
					
					<div class="excerpt">
						<?= $this->Html->link(
							$content['Content']['title'], 
							array(
								'controller' => 'contents', 
								'action' => 'view', 
								$content['Content']['id'])
							, 
							array('class' => 'header')
						);?>
					</div>
					<?php //echo $this->Html->link('<span>Leia mais →</span>', array('controller' => 'contents', 'action' => 'view', $content['Content']['id']), array('escape' => false, 'class' => 'link-button')); ?>
				</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
</div>