
<div class="row-fluid">
   <div class="span6 plugin">
    <h1>Sistema</h1>
    <div class="plugin-body scroll">
    <div class="plugin-body scroll">
      <table class='table rwd-table'>
        <thead>
          <tr>
            <th data-sort="string" data-th="Data">
              <small>
                <?php echo $infoSystem['getDate']; ?>
                <?php echo $infoSystem['getTime']; ?>
              </small>
            </th>
            <th data-sort="int" data-th="Sistema">
               <a href="#">Sistema</a>
            </th>
          </tr>

        </thead>

        <?php if(!empty($infoSystem['cpu']['hostname'])): ?>
        <tr>
          <td>
            Hostname
          </td>
          <td  data-th="Name">
            <?php echo $infoSystem['hostname']; ?>
          </td>
        </tr>
        <?php endif; ?>
        <?php if(!empty($infoSystem['cpu']['Model name'])): ?>
        <tr>
          <td>
            CPU
          </td>
          <td data-th="Model name">
            <?php 
              // pr($infoSystem['cpu']);
              echo $infoSystem['cpu']['Model name']; 
              echo "<br>Architecture: ".$infoSystem['cpu']['Architecture'];
            ?>
            
          </td>
        </tr>
        <?php endif; ?>
          <td>RAM</td>
          <td data-th="RAM">
            <?php
            // pr($infoSystem['memory_info']);
              $MemTotal = str_replace(',','',$infoSystem['memory_info']['MemTotal']);
              $MemTotal = explode(" ",$MemTotal);
              $MemFree = str_replace(',','',$infoSystem['memory_info']['MemAvailable']);
              $MemFree = explode(" ",$MemFree);
              $USED = ($MemTotal[0]-$MemFree[0]);
              $percent = number_format($USED/$MemTotal[0], 2);
              ?>
              <details>
                <summary>
                  Utilizada: <?php echo $percent*100; ?>%
                  <progress max="<?php echo $MemTotal[0]; ?>" value="<?php echo $USED; ?>">
                </summary>
                <dl>
                <dt>Tamanho total:</dt>
                <dd><?php $m = $MemTotal[0]; echo "{$m} $MemTotal[1]" ?></dd>
                <dt>Utilizada:</dt>
                <dd><?php $m = $USED; echo "{$m} $MemTotal[1]"; ?></dd>
                <dt>Disponível:</dt>
                <dd><?php $m = $MemFree[0]; echo "{$m} $MemTotal[1]"; ?></dd>
                </dl>
              </details>
              
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
 
 <div class="span6 plugin">
    <h1>DISK PARTITIONS</h1>
    <div class="plugin-body scroll">
      <table class='table rwd-table'>
        <thead>
          <tr>
            <th data-sort="string" data-th="Disco">
              <a href="#">Disco</a>
            </th>
            <th data-sort="string" data-th="Status">
              <a href="#">Status</a>
            </th>
            <th data-sort="int" data-th="Cheio">
               <a href="#">Cheio</a>
            </th>
            <th data-sort="int" data-th="Mount">
               <a href="#">MOUNT PATH</a>
            </th>
          </tr>

        </thead>

        <?php
        foreach ($infoSystem['disk'] as $disk):
          // pr($disk);
          if($disk[0])
        ?>
        <tr>
          <td data-th="Disco">
            <?php echo $disk[0]; ?>
          </td>
          <td data-th="Status">
            <?php echo "{$disk[2]} / {$disk[1]}"; ?>
          </td>

          <td data-th="Cheio">
            <?php echo $disk[4]; ?>
          </td>
          <td data-th="Mount">
            <?php echo $disk[5]; ?>
          </td>
        </tr>
        <?php endforeach; ?>


      </table>
    </div>
  </div>
</div>


<div class="row-fluid">
 


  <div class="span6 plugin">
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

        <?php foreach ($infoSystem['servicesStatus'] as $service => $desc): ?>
        <tr>
          <td  data-th="Serviço">
            <?php echo $service; ?>
          </td>
          <td  data-th="Descrição">
            <?php echo $desc[1]; ?>
          </td>
          <td  data-th="Status">
            <b><?php echo $desc[0]; ?></b>
          </td>
          <td  data-th="Ações">
              <?php
              echo $this->Form->postLink('<span class="icon16 cut-icon-reload"></span>',
                array(
                  'action' => 'restart',
                  'ifprint'
                ),
                array(
                  'escape'=>false,
                  'title'=>'Restart',
                )
              );
              echo $this->Form->postLink('<span class="icon12  iconic-icon-stop"></span>',
                array(
                  'action' => 'stop',
                  // $service, 'stop'
                ),
                array(
                  'escape'=>false,
                  'title'=>'stop',
                )
              );
              echo $this->Form->postLink('<span class="icon16 icomoon-icon-cog-2"></span>',
                array(
                  'action' => 'config',
                  // $service, 'config'
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

  <div class="span6 plugin">
    <h1>Processos</h1>
    <div class="plugin-body scroll">
      <table class='table rwd-table'>
        <thead>
          <tr>
            <th data-sort="string" data-th="Usuário">
              <a href="#">Usuário</a>
            </th>
            <th data-sort="string" data-th="Comando">
              <a href="#">Comando</a>
            </th>
            <th data-sort="int" data-th="PER">
               <a href="#">PER</a>
            </th>
          </tr>

        </thead>

        <?php
        foreach ($infoSystem['ram_intensive_processes'] as $service):
        ?>
        <tr>
          <td data-th="Usuário">
            <?php echo $service['user']; ?>
          </td>
          <td data-th="Comando">
            <?php echo $service['command']; ?>
          </td>

          <td data-th="PER">
            <?php echo $service['per']; ?>
          </td>
        </tr>
        <?php endforeach; ?>

      </table>
    </div>
  </div>
</div>
