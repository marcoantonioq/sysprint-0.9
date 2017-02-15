<div class="row-fluid">


	<div class='span8'>
		<?php
			echo $this->Form->create('User');
			$this->Form->inputDefaults(array(
				'class'=>'span12'
			));
		?>
		<?php


			echo $this->Form->input('name', array(
				'label'=>ucfirst(__('name')),
			));

			echo $this->Form->input('username', array(
				'label'=>ucfirst(__('username')),
			));

			echo $this->Form->input('password', array(
				'label'=>ucfirst(__('password')),
			));

			echo $this->Form->input('email', array(
				'label'=>ucfirst(__('email')),
			));

			echo $this->Form->input('quota', array(
				'label'=>ucfirst(__('quota')),
			));

			echo $this->Form->input('day_count', array(
				'label'=>ucfirst(__('day_count')),
			));

			echo $this->Form->input('week_count', array(
				'label'=>ucfirst(__('week_count')),
			));

			echo $this->Form->input('month_count', array(
				'label'=>ucfirst(__('month_count')),
			));

			echo $this->Form->input('status', array(
				'label'=>ucfirst(__('status')),
			));

			echo $this->Form->input('job_count', array(
				'label'=>ucfirst(__('job_count')),
			));

			echo $this->Form->input('Printer', array(
				'label'=>ucfirst(__('Printer')),
				'div'=>'input select listuser',
			));

			echo $this->Form->input('Group', array(
				'label'=>ucfirst(__('Group')),
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
	checkbox();
    // multible select
    $('select[multiple=multiple]').multiSelect({ selectableOptgroup: true });
</script>
