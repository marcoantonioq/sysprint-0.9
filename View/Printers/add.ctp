<div class="row-fluid">


	<div class='span8'>		
		<?php 
			echo $this->Form->create('Printer'); 
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php  
		

			echo $this->Form->input('name', array(
				'label'=>ucfirst(__('name')),
			));

			echo $this->Form->input('local', array(
				'label'=>ucfirst(__('local')),
			));

			echo $this->Form->input('ip', array(
				'label'=>'IP (monitorar):',
			));

			echo $this->Form->input('descrition', array(
				'label'=>ucfirst(__('descrition')),
			));

			echo $this->Form->input('allow', array(
				'label'=>'Pública',
				'type'=>'checkbox',
				'id'=>"public"
			));

			echo $this->Form->input('User', array(
				'label'=>ucfirst(__('User')),
				'div'=>'input select listuser',
			));			
		?>
		<div class="form-actions form-horizontal">
			<?php			  echo $this->Form->button('Enviar', array(
				'class'=>'btn btn-info'
			))." ";
			echo $this->Form->button('Limpar', array(
				'type'=>'reset',
				'class'=>'btn btn-warning'
			));
			
			echo $this->Form->end();

			?>		</div>

	</div>

	<div class="span4">
		<div class="actions form-horizontal well ucase">
			<h3><?php echo __('Actions'); ?></h3>
			
			<?php  echo $this->Html->link('Voltar', 
				array( 'action' => 'index'),
				array('class'=> 'btn btn-block')
			); ?>
		</div>
	</div>

</div>


<script>
	var publica = $("#public");

	var checkbox = function(){
		if (publica.prop( "checked" ) ) {
			// alert("hide");
			$(".listuser").hide();
		} else {
			// alert("show");
			$(".listuser").show();
		}
	}
	
	publica.each(function(){
		$(this).on("click", checkbox);
	});
	checkbox

    // multible select
    $('select[multiple=multiple]').multiSelect({ selectableOptgroup: true });
    
</script>