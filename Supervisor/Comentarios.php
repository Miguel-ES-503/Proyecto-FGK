<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';

?>
<?php include "../BaseDatos/conexion.php"; //Realizamos la conexión con la base de datos
?>
<title>Comentarios</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
    <!--Navbar-->
    <nav class="navbar navbar-expand-sm bg-light navbar-light" style="margin: 1%;">
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">
            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <?php

echo " <a href='Graficos.php?id=" . $id . " '><button type='button' class=' btn btn-light' style='background-color: #D9DEDE'><div class='fas fa-angle-left' ></div> Regresar</button></a>";

?>
                    <a class="navbar-brand"> </a>
                    <a class="navbar-brand"> Detalles del Taller</a>
                </li>

            </ul>
            <!-- Links -->
        </div>
        <!-- Collapsible content -->
    </nav>
    <!--/.Navbar-->
    <!-- Inicio Logica para traer los datos-->
    <?php
$GLOBALS['id'] = $_GET['id'];
// echo $id;
$GLOBALS['id2'] = $_GET['id2'];
$GLOBALS['id3'] = $_GET['id3'];
$GLOBALS['id4'] = $_GET['id4'];
$GLOBALS['id5'] = $_GET['id5'];
$GLOBALS['id6'] = $_GET['id6'];
$GLOBALS['id7'] = $_GET['id7'];


$consulta1 = $pdo->prepare("SELECT COUNT(ID_alumno) as 'Total' from evaluaciontalleres  where Rating = 0  AND  ID_Taller = ?");
$consulta2 = $pdo->prepare("SELECT COUNT(ID_alumno) as 'Total' from evaluaciontalleres  where Rating = 50 AND  ID_Taller = ? ");
$consulta3 = $pdo->prepare("SELECT COUNT(ID_alumno) as 'Total' from evaluaciontalleres  where Rating = 100 AND  ID_Taller = ? ");
$consulta4 = $pdo->prepare("SELECT TRUNCATE(AVG(Rating),2) as 'Prom' from evaluaciontalleres  where   ID_Taller = ? ");
$consulta5 = $pdo->prepare("UPDATE talleres SET Rating = (SELECT TRUNCATE(AVG(Rating),2) from evaluaciontalleres where ID_Taller = ? ) WHERE ID_Taller = ? ");
$consulta6 = $pdo->prepare("SELECT COUNT(ID_alumno) as 'Total' from evaluaciontalleres  where Rating = 25 AND  ID_Taller = ? ");
$consulta7 = $pdo->prepare("SELECT COUNT(ID_alumno) as 'Total' from evaluaciontalleres  where Rating = 75 AND  ID_Taller = ? ");
#Consultas para el grafico de asistencia
$consulta8 = $pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'Total'
               from inscripciontalleres I
               INNER JOIN talleres T
               ON I.ID_Taller = T.ID_Taller
               WHERE T.ID_Sede = ?  AND I.Asistencia = 'Asistio'   AND T.ID_Taller = ? ");

$consulta9 = $pdo->prepare("SELECT  COUNT(I.ID_Alumno) as 'Total'
               from inscripciontalleres I
               INNER JOIN talleres T
               ON I.ID_Taller = T.ID_Taller
               WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND T.ID_Taller = ? ");
$consulta10 = $pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalHOM' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'M' AND T.ID_Taller = ? ");

$consulta11 = $pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalMUJ' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'F' AND T.ID_Taller = ? ");

//$consulta2->bindParam(":IdAlumno", $Correo);
$consulta1->execute(array($id));
$consulta2->execute(array($id));
$consulta3->execute(array($id));
$consulta4->execute(array($id));
$consulta5->execute(array($id, $id));
$consulta6->execute(array($id));
$consulta7->execute(array($id));
$consulta8->execute(array($id7, $id)); //Para la asistencia real
$consulta9->execute(array($id7, $id)); //Para la asistencia de impacto
$consulta10->execute(array($id7, $id)); //Para la asistencia de los hombres
$consulta11->execute(array($id7, $id)); //Para la asistencia de las mujeres
$conteo1;
$conteo2;
$conteo3;
$conteo4;
$conteo6;
$conteo7;
$conteo8;
$conteo9;
$conteo10;
$conteo11;
if ($consulta1->rowCount() >= 0) //Para verificar que devuelva algo la consulta
{
    $fila2   = $consulta1->fetch();
    $conteo1 = $fila2['Total'];
}
if ($consulta2->rowCount() >= 0) {
    $fila2   = $consulta2->fetch();
    $conteo2 = $fila2['Total'];
}
if ($consulta3->rowCount() >= 0) {
    $fila2   = $consulta3->fetch();
    $conteo3 = $fila2['Total'];
}
if ($consulta4->rowCount() >= 0) {
    $fila2   = $consulta4->fetch();
    $conteo4 = $fila2['Prom'];
}
if ($consulta6->rowCount() >= 0) {
    $fila2   = $consulta6->fetch();
    $conteo6 = $fila2['Total'];
}
if ($consulta7->rowCount() >= 0) {
    $fila2   = $consulta7->fetch();
    $conteo7 = $fila2['Total'];
}
if ($consulta8->rowCount() >= 0) {
    $fila2   = $consulta8->fetch();
    $conteo8 = $fila2['Total'];
}
if ($consulta9->rowCount() >= 0) {
    $fila2   = $consulta9->fetch();
    $conteo9 = $fila2['Total'];
}
if ($consulta10->rowCount() >= 0) {
    $fila2   = $consulta10->fetch();
    $conteo10 = $fila2['TotalHOM'];
}
if ($consulta11->rowCount() >= 0) {
    $fila2   = $consulta11->fetch();
    $conteo11 = $fila2['TotalMUJ'];
}

?>
    <!--Finaliza Logica para traer los datos-->
    <!--Finaliza la seccion donde se muestran los datos del taller y el grafico-->
    <div class="CabeceraComentario" style="">
        <div class="card" style="margin: 3% 0% 3% 0%;">
            <div class="card-header">
                <p style="font-size: 25px;"><b>Tema:</b> <?php echo $_GET['id2']; ?></p>
            </div>
            <div class="row" style="padding: 3% 3% 0% 3% ;">
                <div class="col-sm">
                    <!--Inicio la seccion de grafico-->
                    <div class="GraficosPanel">
                        <!--Load the AJAX API-->
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        var var1 = "<?php echo $conteo1; ?>";
                        var var2 = "<?php echo $conteo2; ?>";
                        var var3 = "<?php echo $conteo3; ?>";
                        var var6 = "<?php echo $conteo6; ?>";
                        var var7 = "<?php echo $conteo7; ?>";

                        //var a = "<?php//echo $id = $_GET['id6'];?>"
                        //alert(a);
                        // Load the Visualization API and the corechart package.
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });

                        // Set a callback to run when the Google Visualization API is loaded.
                        google.charts.setOnLoadCallback(drawChart);

                        // Callback that creates and populates a data table,
                        // instantiates the pie chart, passes in the data and
                        // draws it.
                        function drawChart() {

                            // Create the data table.
                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'Topping');
                            data.addColumn('number', 'Slices');
                            data.addRows([
                                ['No Satisfecho', Number(var1)],
                                ['Moderadamente Satisfecho', Number(var2)],
                                ['Extremadamente Satisfecho', Number(var3)],
                                ['Poco Satisfecho', Number(var6)],
                                ['Muy Satisfecho', Number(var7)]
                            ]);

                            // Set chart options
                            var options = {
                                'title': 'Satisfación estudiantil',
                                'width': 475,
                                titleTextStyle: {
                                    color: 'green',
                                    fontName: 15,
                                    fontSize: 15,
                                    bold: 'true',
                                    italic: 'false'
                                },
                                is3D: true,
                                'height': 275,
                                colors: ['#BF0310', '#B6C72C', '#DB9600', '#0030f3', '#717175']
                            };


                            // Instantiate and draw our chart, passing in some options.
                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                        }
                        </script>
                        <!--Div that will hold the pie chart-->
                        <div class="card">                      
                          <div id="piechart_3d"></div>
                          </div>

                    </div>
                    <!-- Finaliza seccion de grafico-->
                </div>
                <!-- Inicia seccion donde se muestran los datos del taller-->
                <div class="col-sm">
                    <div class="card" style="margin: 1%;">
                        <div class="card-header">
                            Objetivos
                        </div>
                        <div class="card-body">
                            <?php

                                echo " <a href='DetallesTaller.php?id=" . $id . "&id2=" . $id2 . "&id3=" . $id3 . "&id4=" . $id4 . "&id5=" . $id5 . "&id6=" . $_GET['id6'] . "&id7=".$_GET['id7']."'.><button type='button' class='btn btn-info'>Información</button></a></a>";

                        ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Datos del taller
                        </div>
                        <div class="card-body">
                            <!--h5 class="card-title">Special title treatment</h5-->
                            <p class="card-text"><b>Fecha: </b> <?php echo $_GET['id3'] ?></p>
                            <p class="card-text"><b>Sede: </b> <?php echo $_GET['id4'] ?></p>
                            <p class="card-text"><b>Total de evaluaciones: </b><?php echo $_GET['id6']; ?></p>
                            <p class="card-text"><b>Rating: </b><?php echo $conteo4 ?></p>
                            <!--a href="#" class="btn btn-primary">Go somewhere</a-->
                        </div>
                    </div>


                </div>
                <!-- Finaliza seccion donde se muestran los datos del taller-->
            </div>
            <!--**********Inicia seccion para el grafico de asistencia-->
            <div class="row" style="padding: 3% 3% 0% 3%;">
                <div class="col-sm">
                    <!--Inicio la seccion de grafico-->
                    <div class="GraficosPanel">
                        <!--Load the AJAX API-->
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        //Declaramos las variables del chart para poderlas usar fuera de las funciones drawChart, a la hora de generarl el pdf

                        var var21 = "<?php echo $conteo10; ?>";
                        var var22 = "<?php echo $conteo11; ?>";

                        //var Mes = "<?php# echo $FMeses;?>";
                        //var Sede = "<?php #echo $FSedes;?>";
                        //var Years = "<?php #echo $FYear;?>";
                        if (var21 > 0 || var22 > 0) {

                            // Load the Visualization API and the corechart package.
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });

                            // Set a callback to run when the Google Visualization API is loaded.
                            google.charts.setOnLoadCallback(drawChart);

                            // Callback that creates and populates a data table,
                            // instantiates the pie chart, passes in the data and
                            // draws it.
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ["Element", "Density", {
                                        role: "style"
                                    }],
                                    ["Asistencia hombres ", Number(var21), "#b87333"],
                                    ["Asistencia mujeres", Number(var22), "silver"]


                                ]);

                                var view = new google.visualization.DataView(data);
                                view.setColumns([0, 1,
                                    {
                                        calc: "stringify",
                                        sourceColumn: 1,
                                        type: "string",
                                        role: "annotation"
                                    },
                                    2
                                ]);

                                var options = {
                                    title: "Asistencia",
                                    width: 475,
                                    height: 275,
                                    titleTextStyle: {
                                        color: 'black',
                                        fontName: 15,
                                        fontSize: 15,
                                        bold: 'true',
                                        italic: 'false'
                                    },
                                    bar: {
                                        groupWidth: "95%"
                                    },
                                    legend: {
                                        position: "none"
                                    },
                                };
                                var chart2 = new google.visualization.BarChart(document.getElementById(
                                    "barchart_values"));
                                chart2.draw(view, options);
                            }
                        } else {
                            //document.getElementById('GAsistencias').style.display = 'none';

                        }
                        </script>
                        <!--Div that will hold the pie chart-->
                        <div class="card" style="margin: 0% 0% 3% 0%;"> 
                        <div id="barchart_values" style="width: 375px; height: 275px;"></div>
                        </div>

                    </div>
                    <!-- Finaliza seccion de grafico-->
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            Asistencia
                        </div>
                        <div class="card-body">
                           

                            <p class="card-text"><b style="">Asistencia real: </b> <?php
                    echo $conteo8;

                    echo '<br>&emsp; <b> &bull; Hombres: </b>' . $conteo10;
                    echo '<br>&emsp; <b> &bull; Mujeres: </b>' . $conteo11;
						
					 ?>
                            </p>


                            <!--a href="#" class="btn btn-primary">Go somewhere</a-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Finaliza seccion para el grafico de asistencia-->

    </div>
    <!--Finaliza la seccion donde se muestran los datos del taller y el grafico-->
    


</div>
<!--Finaliza estrucutra de trabajo-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>