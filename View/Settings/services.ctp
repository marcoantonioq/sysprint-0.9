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

<div class="row-fluid">
  <div class="plugin">
    <h1>Serviços</h1>
    <div class="plugin-body scroll">
      <table class='table rwd-table'>
        <thead>
          <tr>
            <th data-sort="string" data-th="Data">
              <a href="#">Serviços</a>
            </th>
            <th data-sort="string" data-th="Descrição">
               <a href="#">Descrição</a>
            </th>
            <th data-sort="string" data-th="Status">
               <a href="#">Status</a>
            </th>
            <th data-sort="string" data-th="Ações">
               <a href="#">Ações</a>
            </th>
          </tr>
        </thead>

        <?php foreach ($infoSystem['servicesStatus'] as $service => $status): ?>
        <tr>
          <td  data-th="Serviço">
            <?php echo $service; ?>
          </td>
          <td  data-th="Descrição">

          </td>
          <td  data-th="Status">
            <b><?php echo $status; ?></b>
          </td>
          <td  data-th="Ações">
              <?php
              echo $this->Form->postLink('<span class="icon16 cut-icon-reload"></span>',
                array(
                  $service, 'restart'
                ),
                array(
                  'escape'=>false,
                  'title'=>'Restart',
                )
              );
              echo $this->Form->postLink('<span class="icon12  iconic-icon-stop"></span>',
                array(
                  $service, 'stop'
                ),
                array(
                  'escape'=>false,
                  'title'=>'stop',
                )
              );
              echo $this->Form->postLink('<span class="icon16 icomoon-icon-cog-2"></span>',
                array(
                  $service, 'config'
                ),
                array(
                  'escape'=>false,
                  'title'=>'config',
                )
              );
              ?>

          </td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
