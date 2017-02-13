<canvas id="myChart" ></canvas>
<script type="text/javascript">

var data = {
  labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
  datasets: [
  {
    label: "Anual",
    backgroundColor: "rgba(0, 136, 204, 0.30)",
    borderColor: "#08c",
    borderWidth: 1,
    hoverBackgroundColor: "#08c",
    data: [65, 590, 800, 8100, 56, 55, 40],
  }
  ]
};

var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: data
});

</script>