<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<?php
require_once "../../../BaseDatos/conexion.php";


$estado = $_POST['estado'];
$ciclo = $_POST['ciclo'];

#===========Se agrega la clase a la tabla
echo"<script>";
echo"$(document).ready(function(){";
    echo "var dato= '<thead class=\"text-white\"><tr><th >Enviaron</th> <th >No enviaron</th></tr> </thead>';";
    echo"$('#table').append(dato);";
    echo "var dat = '<tbody class=\"bg-light\" >';";
    echo "$('#table').append(dat);";
    echo" $('#table').addClass(  'table-dark text-dark' );";
  echo" $('#fondo').addClass(  'card' );";
  echo"});";
echo"</script>";


/*Inicio*/
$i=0;
$Noenviaron =0;
$enviado=0;


if ($estado== 'enviado' && $ciclo == 'ciclo 1') {
    #Con la consulta query se obtiene el total de alumnos que han asistido a las reuniones 
    $query = "SELECT  COUNT(r.id_alumno) as 'Total' FROM renovacion r where r.estado = 'enviado' and r.ciclo = '1'";
        $consulta =$pdo->prepare($query) ;
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        

   while ($enviado=$consulta->fetch()){
       $enviado=$enviado["Total"];
       
       #====================SE DIBUJA EL GRAFICO PRINCIPAL
echo"<script>";
// Load Charts and the corechart package.
echo"       google.charts.load('current', {";
echo"           packages: ['controls', 'corechart']";
echo"       });";
// Draw the pie chart for Sarah's pizza when Charts is loaded.
echo"        function GraficoPrincipal() {";
echo"            var data = google.visualization.arrayToDataTable([";
  echo"          ['Task', 'Hours per Day'],";
  echo"          ['Enviaron',     ".$enviado."],";
  echo"         ['No enviaron',     ".$Noenviaron."],";
  
  echo"       ]);";

  echo"       var options = {";
      echo"          title: 'Resumen general de Renovacion',";
            
      echo"          height: 300,";
      echo"          pieHole: 0.4,";
      echo "        colors: ['#43E684', '#A61C1C', '#F2C438','#94BF75'],";
      echo"         chartArea: {'width': '80%', 'height': '80%'}";
      echo"        };";

      echo"       var chart = new google.visualization.PieChart(document.getElementById('piechart_principal'));";

      echo"        chart.draw(data, options);";
      echo"       }";

      echo"        google.charts.setOnLoadCallback(GraficoPrincipal);";
  
      echo"        </script>";
   }


}else if ($estado== 'enviado' && $ciclo == 'ciclo 2'){

    #Con la consulta query se obtiene el total de alumnos que han asistido a las reuniones 
    $query = "SELECT  COUNT(r.id_alumno) as 'Total' FROM renovacion r where r.estado = 'enviado' and r.ciclo = '2'";
        $consulta =$pdo->prepare($query) ;
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();

      
 while ($enviado=$consulta->fetch()){
       $enviado=$enviado["Total"];
             #====================SE DIBUJA EL GRAFICO PRINCIPAL
echo"<script>";
// Load Charts and the corechart package.
echo"       google.charts.load('current', {";
echo"           packages: ['controls', 'corechart']";
echo"       });";
// Draw the pie chart for Sarah's pizza when Charts is loaded.
echo"        function GraficoPrincipal() {";
echo"            var data = google.visualization.arrayToDataTable([";
  echo"          ['Task', 'Hours per Day'],";
  echo"          ['Enviaron',     ".$enviado."],";
  echo"         ['No enviaron',     ".$Noenviaron."],";
  
  echo"       ]);";

  echo"       var options = {";
      echo"          title: 'Resumen general de Renovacion',";
            
      echo"          height: 300,";
      echo"          pieHole: 0.4,";
      echo "        colors: ['#43E684', '#A61C1C', '#F2C438','#94BF75'],";
      echo"         chartArea: {'width': '80%', 'height': '80%'}";
      echo"        };";

      echo"       var chart = new google.visualization.PieChart(document.getElementById('piechart_principal'));";

      echo"        chart.draw(data, options);";
      echo"       }";

      echo"        google.charts.setOnLoadCallback(GraficoPrincipal);";
  
      echo"        </script>";
   }  
}

   


?>