
<canvas id="myChartAnaul" ></canvas>

<?php 
  $month = array();
  $total = array();
  $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');

  foreach ($charts_anual as $charts) {
    $month[] .= $mes[ $charts['0']['month'] ];
    $total[] .= $charts['0']['total_pages'];
  }

  $data['labels'] = $month;
  $data['datasets'][] = array(
    "label" => 'Anual',
    "backgroundColor" => 'rgba(0, 136, 204, 0.3)',
    "borderColor" => "#08c",
    "borderWidth" => 1,
    "hoverBackgroundColor" => "#08c",
    "data" =>  $total
  );
  $data = json_encode($data, JSON_PRETTY_PRINT);
?>


<script type="text/javascript">

var data = <?=$data; ?>;

var ctx = document.getElementById("myChartAnaul");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: data
});

</script>