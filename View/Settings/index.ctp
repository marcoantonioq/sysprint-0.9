<script type="text/javascript">

</script>

<?php
  echo $this->Form->create('Setting', array());
  $this->Form->inputDefaults(array(
    'class'=>'span12',
    // 'div'=>'controls',
    'label'=>false,
  ));
?>

<ul id="myTab" class="nav nav-tabs">
  <li tab="tabApp" class="active"><a href="#tabApp" data-toggle="tab">Aplicação</a>  </li>
  <li tab="tabAd" class=""><a href="#tabAd" data-toggle="tab">Autenticação</a></li>
  <li tab="tabEmail"><a href="#tabEmail" data-toggle="tab">E-mail</a></li>
  <li tab="tabDataBase"><a href="#tabDataBase" data-toggle="tab">Banco de Dados</a></li>
  <li tab="tabSystem"><a href="#tabSystem" data-toggle="tab">Sistema</a></li>
  <!-- <li><a href="#tabNetwork" data-toggle="tab">Network</a></li> -->
  <!-- <li>
    <?php  echo $this->Html->link('Sistema',
        "https://{$_SERVER['HTTP_HOST']}:10000",
        array('target'=>"_blank",)
      )." "; ?>
  </li> -->
  <li>
    <?php  echo $this->Html->link('CUPS',
        "https://{$_SERVER['HTTP_HOST']}:631/admin/",
        array('target'=>"_blank",)
      )." "; ?>
  </li>
</ul>

<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="tabApp">
    <div class="right">
      <?php echo "Versão: {$this->request->data['Setting']['version']}"; ?>
    </div>
    <?php
    echo $this->Form->input('status', array(
      'label' => 'Manutenção',
      'type' => 'checkbox',
    ));
    echo $this->Form->input('title', array(
      'placeholder'=>'Nome do servidor',
      'title'=>'Nome do servidor',
    ));
    echo $this->Form->input('hostname', array(
      'placeholder'=>'Hostname',
      'title'=>'Hostname',
    ));
    echo $this->Form->input('locale', array(
    	'placeholder'=>ucfirst(__('locale')),
    	'title'=>ucfirst(__('locale')),
    ));
    echo $this->Form->input('bootstraps', array(
    	'placeholder'=>ucfirst(__('bootstraps')),
    	'title'=>ucfirst(__('bootstraps')),
    ));
    echo $this->Form->input('date_time_format', array(
    	'placeholder'=>ucfirst(__('date_time_format')),
    	'title'=>ucfirst(__('date_time_format')),
    ));
    echo $this->Form->input('force_https', array(
      'label' => 'Forçar https?',
      'type' => 'checkbox',
    ));
    echo $this->Form->input('descrition', array(
      'type'=>'textarea',
      'label'=>'Descrição do servidor:',
    ));
    ?>
  </div>

  <div class="tab-pane fade" id="tabAd">
    
    <?php
    echo $this->Form->input('auth', array(
      'label'=>'Autenticação',
      'placeholder'=>ucfirst(__('Auth')),
      'title'=>ucfirst(__('Auth')),
      'type'=>'checkbox',
      'div'=>'clear',
      'id'=>'Auth'
    ));
     ?>

     <?php
    echo $this->Form->input('AD.conect', array(
      'class'=>'hide',
      'value'=> 1,
      'type'=>'checkbox',
      'div'=>'clear',
    ));
    ?>

    <div id="toggleAD">
    <h1>LDAP/AD (opcional) </h1>

    <div id="admessage" data-url="<?= $this->Html->url(array('action'=>'statusConectionAD')); ?>" class="message alert-message success-message hide"></div>

    

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
			'placeholder'=>'ADAttr: name,displayname,mail,mobile,homephone,telephonenumber,streetaddress,postalcode,physicaldeliveryofficename,l,group,thumbnailPhoto',
			'title'=>ucfirst(__('attr')),
		));
    echo $this->Form->input('AD.filter', array(
      'placeholder'=>ucfirst(__('filter')),
			'title'=>ucfirst(__('filter')),
		));
    ?>
    </div>
  </div>

  <div class="tab-pane fade" id="tabEmail">
    <?php
    echo $this->Form->input('EMAIL.email_notification', array(
      'label' => 'Notificação via email',
      'type' => 'checkbox',
    ));
    echo $this->Form->input('EMAIL.transport', array(
      'placeholder' => 'transport',
      'title' => 'transport',
      'type' => 'select',
      'options' => array(
        "Smtp" => "Smtp"
      )
		));
    echo $this->Form->input('EMAIL.title', array(
      'placeholder' => 'title',
      'title' => 'title',
		));
    echo $this->Form->input('EMAIL.from', array(
      'placeholder' => 'from',
      'title' => 'from',
		));
    echo "<div class='row-fluid'>";
    echo $this->Form->input('EMAIL.host', array(
      'placeholder' => 'host',
      'title' => 'host',
      'div'=>'span8',
		));
    echo $this->Form->input('EMAIL.port', array(
      'placeholder' => 'port',
      'title' => 'port',
      'div'=>'span4',
		));
    echo "</div>";
    echo $this->Form->input('EMAIL.timeout', array(
      'placeholder' => 'timeout',
      'title' => 'timeout',
		));
    echo $this->Form->input('EMAIL.username', array(
      'placeholder' => 'username',
      'title' => 'username',
		));
    echo $this->Form->input('EMAIL.password', array(
      'placeholder' => 'password',
      'title' => 'password',
    ));
    echo $this->Form->input('EMAIL.log', array(
      'placeholder' => 'log',
      'title' => 'log',
    ));
    echo $this->Form->input('EMAIL.charset', array(
      'placeholder' => 'charset',
      'title' => 'charset',
    ));
    echo $this->Form->input('EMAIL.headerCharset', array(
      'placeholder' => 'headerCharset',
      'title' => 'headerCharset',
		));

    ?>
  </div>

<div class="tab-pane fade" id="tabDataBase">
  <?php
  echo $this->Form->postLink('Restaurar Default',
    array( 'action' => 'dbbackup', 'restore'),
    array('class'=> 'btn', 'style'=>'margin-top: 5px;'),
    __('Tem certeza de que deseja restaurar banco de dados? Apagara todos regisros!')
  )."<p>";

  echo $this->Form->input('DATA.datasource', array(
    'placeholder' => 'datasource',
    'title' => 'datasource',
    'type' => 'select',
    'options' => array(
      "Database/Mysql" => "Database/Mysql"
    )
  ));
  echo $this->Form->input('DATA.host', array(
    'placeholder' => 'host',
    'title' => 'host',
  ));
  echo $this->Form->input('DATA.login', array(
    'placeholder' => 'login',
    'title' => 'login',
  ));
  echo $this->Form->input('DATA.password', array(
    'placeholder' => 'password',
    'title' => 'password',
  ));
  echo $this->Form->input('DATA.database', array(
    'placeholder' => 'database',
    'title' => 'database',
  ));

  echo $this->Form->input('DATA.persistent', array(
    'placeholder' => 'persistent',
    'title' => 'persistent',
  ));
  echo $this->Form->input('DATA.prefix', array(
    'placeholder' => 'prefix',
    'title' => 'prefix',
  ));
  echo $this->Form->input('DATA.encoding', array(
    'placeholder' => 'encoding',
    'title' => 'encoding',
  ));
  ?>

</div>

<div class="tab-pane fade" id="tabSystem">
  
  <div class="plugin">
    <h1>Network</h1>
    <div class="plugin-body scroll">
      <table class='table rwd-table'>
        <thead>
          <tr>
            <th data-sort="string" data-th="Interface">
              <a href="#">Interface</a>
            </th>
            <th data-sort="string" data-th="Descrição">
               <a href="#">Descrição</a>
            </th>
            <th data-sort="string" data-th="Ações">
               <a href="#">Ações</a>
            </th>
          </tr>
        </thead>

        <tr>
          <td  data-th="Interface">
            enp1s0
          </td>
          <td  data-th="Descrição">
            MAC: d0:bf:9c:e3:43:8d
          </td>
          <td  data-th="Ações">
            <?php 
            echo $this->Form->postLink('<span class="icon16 icomoon-icon-cog-2"></span>',
                array(
                ),
                array(
                  'escape'=>false,
                  'title'=>'config',
                )
              ); ?>
          </td>
        </tr>
      </table>
    </div>
  </div>



    <?php

    echo $this->Form->input('hostname', array(
      'placeholder'=>'Hostname',
      'title'=>'Hostname',
    ));

    echo $this->Form->input('resolv_conf', array(
      'placeholder'=>'resolv.conf',
      'title'=>'resolv.conf',
      'label' => 'Arquivo: resolv.conf',
      'type' => 'textarea',
    ));
    ?>
  </div>

  <div class="tab-pane fade" id="tabNetwork">
    
    <?php
    echo "<div class='row-fluid'>";
    echo $this->Form->input('Network.DEFROUTE', array(
      'placeholder'=>ucfirst(__('DEFROUTE')),
      'label'=>ucfirst(__('DEFROUTE')),
      'title'=>ucfirst(__('DEFROUTE')),
      'div'=>'span6',
      'type'=>'checkbox',
    ));
    echo $this->Form->input('Network.ONBOOT', array(
      'placeholder'=>ucfirst(__('ONBOOT')),
      'title'=>ucfirst(__('ONBOOT')),
      'label'=>ucfirst(__('ONBOOT')),
      'type'=>'checkbox',
      'div'=>'span6',
    ));
    echo "</div>";
    echo $this->Form->input('Network.TYPE', array(
      'placeholder'=>ucfirst(__('TYPE')),
      'title'=>ucfirst(__('TYPE')),
      'value' => 'Ethernet'
    ));
    echo $this->Form->input('Network.DEVICE', array(
      'placeholder'=>ucfirst(__('DEVICE')),
      'title'=>ucfirst(__('DEVICE')),
    ));
    echo $this->Form->input('Network.NAME', array(
      'placeholder'=>ucfirst(__('NAME')),
      'title'=>ucfirst(__('NAME')),
    ));
    echo $this->Form->input('Network.IPADDR', array(
      'placeholder'=>ucfirst(__('IPADDR')),
      'title'=>ucfirst(__('IPADDR')),
    ));
    echo $this->Form->input('Network.NETMASK', array(
      'placeholder'=>ucfirst(__('NETMASK')),
      'title'=>ucfirst(__('NETMASK')),
    ));
    echo $this->Form->input('Network.GATEWAY', array(
      'placeholder'=>ucfirst(__('GATEWAY')),
      'title'=>ucfirst(__('GATEWAY')),
    ));
    ?>
  </div>

</div>
	<div class="form-actions form-horizontal">
		<?php			  
    echo $this->Form->button(
      "Enviar<span class='icon14 icomoon-icon-arrow-right-2'></span>", 
      array(
        'escape' => false,
        'class'=>'span4 btn btn-success'
      )
    )." ";
    echo $this->Form->button("Limpar", array(
      'type'=>'reset',
      'class'=>'span4 btn btn-warning'
    ));

		echo $this->Form->end();

		?>
  </div>
</div>

<?php echo $this->Html->script(
    array(
      'settings.js',
    )
  ); ?>