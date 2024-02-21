function drawCampaignStatsChart(totalEnvios, entregados, clicks) {
  var ctx = document.getElementById("campaignStatsChart").getContext("2d");
  var campaignStatsChart = new Chart(ctx, {
    type: "bar", // Tipo de gráfico, puede ser 'line', 'bar', 'pie', etc.
    data: {
      labels: ["Total de Envíos", "Entregados", "Clicks"],
      datasets: [
        {
          label: "Estadísticas de la Campaña",
          data: [totalEnvios, entregados, clicks],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}
