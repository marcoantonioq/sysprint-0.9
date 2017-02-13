<div class="row-fluid">
    <div class="span12 well">
		<?php
      echo $this->Html->link('Voltar',
        array(
          'controller' => 'settings',
          'action' => 'index'
        ),
        array('class'=> 'span3 btn')
      )." ";

		?>
	</div>
</div>

<?php
  echo $this->Form->create('Setting', array());
  $this->Form->inputDefaults(array(
    'class'=>'span12',
    // 'div'=>'controls',
    'label'=>false,
  ));
?>

<ul id="myTab" class="nav nav-tabs">
  <li class="active">
    <a href="#tabSystem" data-toggle="tab">Sistema</a>
  </li>
  <li class=""><a href="#tabNetwork" data-toggle="tab">Network</a></li>
</ul>

<div id="myTabContent" class="tab-content">

  <div class="tab-pane fade active in" id="tabSystem">

    <?php

    echo $this->Form->input('hostname', array(
      'placeholder'=>'Hostname',
      'title'=>'Hostname',
    ));
    ?>
  </div>

  <div class="tab-pane fade" id="tabNetwork">
    <div class="span6">
    <?php
    echo $this->Form->input('AD.auth', array(
      'label'=>'Autenticação',
      'placeholder'=>ucfirst(__('Auth')),
      'title'=>ucfirst(__('Auth')),
      'type'=>'checkbox',
      'div'=>'clear',
    ));
     ?>
   </div>

   <div class="span6">
     <?php
		echo $this->Form->input('allow', array(
			'label'=>'Liberar acesso',
			'type'=>'checkbox',
			'id'=>"public",
      'div'=>'clear',
		));
    ?>
    </div>
    <?php
    echo "<div class='row-fluid'>";
    echo $this->Form->input('AD.ldap_host', array(
			'placeholder'=>ucfirst(__('ldap_host')),
			'title'=>ucfirst(__('ldap_host')),
			'div'=>'span8',
		));
    echo $this->Form->input('AD.ldap_port', array(
			'placeholder'=>ucfirst(__('ldap_port')),
			'title'=>ucfirst(__('ldap_port')),
      'div'=>'span4',
		));
    echo "</div>";
    echo $this->Form->input('AD.base_dn', array(
			'placeholder'=>ucfirst(__('base_dn')),
			'title'=>ucfirst(__('base_dn')),
		));
    echo $this->Form->input('AD.ldap_user', array(
			'placeholder'=>ucfirst(__('ldap_user')),
			'title'=>ucfirst(__('ldap_user')),
		));
    echo $this->Form->input('AD.ldap_pass', array(
			'placeholder'=>ucfirst(__('ldap_pass')),
			'title'=>ucfirst(__('ldap_pass')),
			'type'=>'password',
		));
    echo $this->Form->input('AD.suffix', array(
			'placeholder'=>ucfirst(__('suffix')),
			'title'=>ucfirst(__('suffix')),
		));
    echo $this->Form->input('AD.attr', array(
			'placeholder'=>ucfirst(__('attr')),
			'title'=>ucfirst(__('attr')),
		));
    echo $this->Form->input('AD.filter', array(
      'placeholder'=>ucfirst(__('filter')),
			'title'=>ucfirst(__('filter')),
		));
    ?>
  </div>


</div>
		<div class="form-actions form-horizontal">
			<?php			  
      echo $this->Form->button('Enviar', array(
				'class'=>'btn btn-info'
			))." ";
			echo $this->Form->button('Limpar', array(
				'type'=>'reset',
				'class'=>'btn btn-warning'
			));

			echo $this->Form->end();

			?>
    </div>
