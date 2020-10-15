<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<?php
require_once "../../../BaseDatos/conexion.php";



$ciclo = $_POST['ciclo'];




/*Inicio*/
$i=0;
$Noenviado =0;
$enviado=0;


if ($ciclo == 'ciclo 1') {
    #Con la consulta query se obtiene el total de alumnos que han asistido a las reuniones 
    $query = "SELECT  COUNT(r.id_alumno) as 'Total' FROM renovacion r where r.estado = 'enviado' and r.ciclo = '1'";
        $consulta =$pdo->prepare($query) ;

        //$consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        $enviado=$consulta->fetchColumn();
        $query2="SELECT COUNT(ID_Alumno) as 'T' FROM alumnos WHERE ID_Alumno NOT IN( SELECT r.ID_alumno FROM renovacion r LEFT JOIN alumnos A ON r.ID_alumno = A.ID_Alumno WHERE r.ciclo = '1')";
$consulta2 =$pdo->prepare($query2) ;
         $consulta2->execute();
        $Noenviado=$consulta2->fetchColumn();
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

}else if ($ciclo == 'ciclo 2'){

    #Con la consulta query se obtiene el total de alumnos que han asistido a las reuniones 
    $query = "SELECT  COUNT(r.id_alumno) as 'Total' FROM renovacion r where r.estado = 'enviado' and r.ciclo = '2'";
       $consulta =$pdo->prepare($query) ;

  
        $consulta->execute();
        $enviado=$consulta->fetchColumn();
        $query2="SELECT COUNT(ID_Alumno) as 'T' FROM alumnos WHERE ID_Alumno NOT IN( SELECT r.ID_alumno FROM renovacion r LEFT JOIN alumnos A ON r.ID_alumno = A.ID_Alumno WHERE r.ciclo = '2')";
$consulta2 =$pdo->prepare($query2) ;
         $consulta2->execute();
        $Noenviado=$consulta2->fetchColumn();

      

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
  echo"         ['No enviaron',     ".$Noenviado."]";
  
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

   


?>