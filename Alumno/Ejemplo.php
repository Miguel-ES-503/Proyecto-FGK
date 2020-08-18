<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body ng-app="app">
<script src="https://code.highcharts.com/highcharts.js"></script>


<?php $dato =  51;
      $dato2 = 39;
?>
</body>
<script src="main.js"></script>
<script>
    var data = [{
        name: "Realizadas",
        y: <?php echo $dato?>,
        color: "#ff6666",
        dataLabels: {
            enabled: false
        }
    },

    {
        name: "Faltantes",
        y: <?php echo $dato2?>,
        color: "#dddddd",
        dataLabels: {
            enabled: false
        }
    }
];

Highcharts.chart("container", {
    chart: {
        plotBorderWidth: 0,
        height: "200px"
    },
    title: {
        text: "Title"
    },
    tooltip: {
        pointFormat: "<b>{point.percentage:.1f}%</b>"
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: { fontWeight: "bold", color: "white" }
            },
            startAngle: -90,
            endAngle: 90,
            center: ["50%", "70%"],
            size: "200%"
        }
    },
    series: [{ type: "pie", name: "Value", innerSize: "70%", data: data }]
});
</script>
</html>