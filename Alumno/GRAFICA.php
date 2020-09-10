<script>
 var data = [{
    name: "Completo",
    
    y: 
    <?php echo $Porcentaje?>,
    color:"#ffd400",
    dataLabels: {
        enabled: false
    }
},

{
    name: "Incompleto",
    y: <?php echo $TotalTalleresAlumno?>,
    color: "grey",
    dataLabels: {
        enabled: false
    }
}
];

Highcharts.chart("container", {
chart: {
    plotBorderWidth: 0,
    height: "200px",
    
},

credits: {

    enabled: false
},
title: {
    text: "Módulos<?php echo "<br>$TotalTalleresAlumno"."/6" ?>"
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