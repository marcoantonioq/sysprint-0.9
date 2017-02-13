<canvas id="myChartPrinter" ></canvas>

<?php 
  $printers = array();
  $total = array();
  foreach ($charts_printer as $charts) {
    $printers[] .= $charts['charts_printer']['name'];
    $total[] .= $charts['charts_printer']['total_pages'];
  }
  $printers = sprintf( "'%s'", implode( "','", $printers ) );
  $total = implode( ",", $total );
?>

<script type="text/javascript">

  var data = {
    labels: [<?=$printers; ?>],
    datasets: [
    {
      label: "Impressoras(30 dias)",
      backgroundColor: "rgba(0, 136, 204, 0.30)",
      borderColor: "#08c",
      borderWidth: 1,
      hoverBackgroundColor: "#08c",
      data: [<?=$total; ?>],
    }
    ]
  };

  var myChartPrinter = document.getElementById("myChartPrinter");
  var myChart = new Chart(myChartPrinter, {
      type: 'bar',
      data: data
  });

</script>