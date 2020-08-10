<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>

<title>Reporte de talleres por Fecha</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->

<div class="container-fluid text-center">
    <?php 
include 'Modularidad/Menu.php';
?>

    <br>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Reporte De Talleres</a>

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
                <a class="nav-link" href="Graficos.php">Reporte Por Taller</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="mesAsistencia.php">Reporte Por mes</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="ReporteFecha.php">Fecha</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ReporteMensual.php">Mes</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ReporteCiclo.php">Ciclo</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ReporteAlumno.php">Por alumno</a>
            </li>
        </ul>
        <!-- Links -->   
    </div>
    <!-- Collapsible content -->
</nav>
<br>

     <div class="float-left">
       <a href="mesAsistencia.php" class="btn btn-success"  >Detalles por mes</a>
   </div>
   <br>
   
    <div class="card" style="margin: 3.5%;  ">
        <div class="dropdown">
            <form id="form" action="" method="POST">
                <div class="row">
                    <div class="col-sm" style="margin:1%;">
                        <input type="date" name="Fecha1" class="form-control" id="F1" >
                    </div>
                    <div class="col-sm" style="margin:1%;">
                        <input type="date" name="Fecha2" class="form-control" id="F2" >   
                    </div>                
                    <div class="col-sm" style="margin: 1%;">
                        <select class="browser-default custom-select" name="Sedes" onchange="">
                            <option value="SSFT" class="dropdown-item">San Salvador</option>
                            <option value="SAFT" class="dropdown-item">Santa Ana</option>
                            <option value="AHFT" class="dropdown-item">Ahuchapan</option>
                            <option value="SMFT" class="dropdown-item">San Miguel</option>
                            <?php 
                            if (isset($_POST['Sedes']) != Null) {
                                if ($_POST['Sedes'] == 'SSFT') {
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>San Salvador</option>";
                                }elseif($_POST['Sedes'] == 'SAFT'){
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>Santa Ana</option>";
                                }elseif($_POST['Sedes'] == 'AHFT'){
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>Ahuchapan</option>";
                                }
                                else{
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>San Miguel</option>";
                                }                                                                                                         
                            } 
                            else{
                             echo "<option class='dropdown-item' selected disabled style='display:none'>Sede</option>";
                         }
                         ?>
                     </select>
                    </div>
                 <div class="col-sm" style="margin: 1%;">
                    <button id="btnEnviarForm" onclick="submitformM()" class="btn btn-warning  btn-block">
                    Filtrar</button>
                </div>
            </div>
       
    </form>
    
    <?php
                    if (isset($_POST['Fecha1'])) {
                        $GLOBALS['Fecha1'] = $_POST['Fecha1'];//Variables Global para usar en el filtro
                    }
                    if (isset($_POST['Sedes'])) {
                        $GLOBALS['FSedes'] = $_POST['Sedes'];
                    }
                    if (isset($_POST['Fecha2'])) {
                        $GLOBALS['Fecha2'] = $_POST['Fecha2'];

                    }
                    ?> 
     <!--Consulta para traer los datos -->
 <?php 
        $GLOBALS['id'] =  $_GET['id'];
        $consulta1=$pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'Total'
            from inscripciontalleres I
            INNER JOIN talleres T
            ON I.ID_Taller = T.ID_Taller
             WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND T.Fecha BETWEEN ? AND ? ");

        $consulta2 = $pdo->prepare("SELECT  COUNT(I.ID_Alumno) as 'Total'
            from inscripciontalleres I
            INNER JOIN talleres T
            ON I.ID_Taller = T.ID_Taller
            WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND T.Fecha BETWEEN ? AND ? ");


        $consulta3=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total'
            from evaluaciontalleres E
            INNER JOIN talleres T 
            ON E.ID_Taller = T.ID_Taller
            where E.Rating = '0'   AND T.ID_Sede = ? AND T.Fecha BETWEEN ? AND ?");

        $consulta4=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total'
            from evaluaciontalleres E
            INNER JOIN talleres T 
            ON E.ID_Taller = T.ID_Taller
            where E.Rating = '50'  AND T.ID_Sede = ? AND T.Fecha BETWEEN ? AND ?");

        $consulta5=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total'
            from evaluaciontalleres E
            INNER JOIN talleres T 
            ON E.ID_Taller = T.ID_Taller
            where E.Rating = '100'  AND T.ID_Sede = ? AND T.Fecha BETWEEN ? AND ?");

        $consulta6=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total' 
            from evaluaciontalleres E
            INNER JOIN talleres T 
            ON E.ID_Taller = T.ID_Taller
            where     T.ID_Sede = ? AND T.Fecha BETWEEN ? AND ? ");

         $consulta7=$pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalHOM' 
            from inscripciontalleres I
            INNER JOIN talleres T
            ON I.ID_Taller = T.ID_Taller
            INNER JOIN alumnos A
            ON I.ID_Alumno = A.ID_Alumno
            WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio'  AND T.Fecha BETWEEN ? AND ?  AND A.Sexo = 'M'");

        $consulta8=$pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalMUJ' 
            from inscripciontalleres I
            INNER JOIN talleres T
            ON I.ID_Taller = T.ID_Taller
            INNER JOIN alumnos A
            ON I.ID_Alumno = A.ID_Alumno
            WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio'  AND T.Fecha BETWEEN ? AND ? AND A.Sexo = 'F'");
         $consulta9=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total'
               from evaluaciontalleres E
               INNER JOIN talleres T 
               ON E.ID_Taller = T.ID_Taller
               where E.Rating = '25'  AND T.ID_Sede = ? AND T.Fecha BETWEEN ? AND ?");
             $consulta10=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total'
               from evaluaciontalleres E
               INNER JOIN talleres T 
               ON E.ID_Taller = T.ID_Taller
               where E.Rating = '75'  AND T.ID_Sede = ? AND T.Fecha BETWEEN ? AND ?");


        $consulta1->execute(array($FSedes,$Fecha1,$Fecha2));//Asistencia real
        $consulta2->execute(array($FSedes,$Fecha1,$Fecha2));//Asistencoa de impacto
        $consulta3->execute(array($FSedes,$Fecha1,$Fecha2));//Todal con Rating = 0
        $consulta4->execute(array($FSedes,$Fecha1,$Fecha2));//Todal con Rating = 50
        $consulta5->execute(array($FSedes,$Fecha1,$Fecha2));//Todal con Rating = 100
        $consulta6->execute(array($FSedes,$Fecha1,$Fecha2));//Todal de evaluaciones
        $consulta7->execute(array($FSedes,$Fecha1,$Fecha2));//Total real de hombres que asistieron
        $consulta8->execute(array($FSedes,$Fecha1,$Fecha2));//Total real de mujeres que asistieron
        $consulta9->execute(array($FSedes,$Fecha1,$Fecha2));//Todal con Rating = 25
        $consulta10->execute(array($FSedes,$Fecha1,$Fecha2));//Todal con Rating = 75
        

        $conteo1;
        $conteo2;
        $conteo3;
        $conteo4;
        $conteo5;
        $conteo6;
        $conteo7;
        $conteo8;
        $conteo9;
        $conteo10;
        if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta1->fetch();
            $conteo1 = $fila2['Total'];
        }
        
        if ($consulta2->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta2->fetch();
            $conteo2 = $fila2['Total'];
        }
        if ($consulta3->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta3->fetch();
            $conteo3 = $fila2['Total'];
        }
        if ($consulta4->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta4->fetch();
            $conteo4 = $fila2['Total'];
        }
        if ($consulta5->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta5->fetch();
            $conteo5 = $fila2['Total'];
        }
        if ($consulta6->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta6->fetch();
            $conteo6 = $fila2['Total'];
        }
            if ($consulta7->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta7->fetch();
            $conteo7 = $fila2['TotalHOM'];
        }
        if ($consulta8->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta8->fetch();
            $conteo8 = $fila2['TotalMUJ'];
        }
         if ($consulta9->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta9->fetch();
            $conteo9 = $fila2['Total'];
        }
        if ($consulta10->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta10->fetch();
            $conteo10 = $fila2['Total'];
        }

        $Prom0 = round(($conteo3*100)/($conteo6),2);
        $Prom50 = round(($conteo4*100)/($conteo6),2);
        $Prom100 = round(($conteo5*100)/($conteo6),2);
        $Prom25 = round(($conteo9*100)/($conteo6),2);
        $Prom75 = round(($conteo10*100)/($conteo6),2);
        
        

?>
        <!--Finaliza Consulta para traer los datos -->
     <div class="row">
                <div class="col-sm"></div>
                
                <div class="col-sm" style="margin: 1%;">
               <?php 
               // echo "<a href='Excel/ExcelMensual.php?id=".$conteo1."&id2=".$conteo2."&id3=".$conteo3."&id4=".$conteo4."&id5=".$conteo5."&id6=".$conteo6."&id7=".$conteo7."&id8=".$conteo8."'>"
               
                echo "<a href='Excel/ExcelMensual.php?id=".$conteo1."&id2=".$conteo2."&id3=".$conteo3."&id4=".$conteo4."&id5=".$conteo5."&id6=".$conteo6."&id7=".$conteo7."&id8=".$conteo8."&id9=".$conteo9."&id10=".$conteo10."' style='text-decoration: none;'>
                <button id='btnGenerarExcel'  class='btn btn-success  btn-block'>
                     <div class='fas fa-file-excel'></div> Excel </button></a>"?>
               
               </div>
               <div class="col-sm"></div>
            </div>
 </div>
    <!--a class="dropdown-item" href="javaScript:Meses(4)" value="San">Enereo </a-->
    <script>
        function submitformM() {
        	if (document.getElementById('F1').value >= document.getElementById('F2').value) {
        		alert('La segunda fecha no puede ser menor o igual que la primera.');
        	}else{
        		
        		  document.getElementById('form').submit();
        	}
          

        }
    </script>       
</div>

  
        <!-- Verificacion Datos -->

        <!-- Verificacion Datos -->
        <div id="ADataA" class="alert alert-danger" role="alert" style="margin: 4%;">
            NO HAY DATOS QUE MOSTRAR DE ASISTENCIA!
            <script type="text/javascript">
            var var1 = "<?php echo $conteo1; ?>";
            var var2 = "<?php echo $conteo2; ?>";
            if ((var1 == null || var1 == 0) && (var2 == null || var2 == 0)) {
                // (var1 == null && var2 == null && var3 == null && var4 == null  && var5 == null) || (var1 == 0 && var2 == 0 && var3 == 0 && var4 == 0  && var5 == 0)
            } else {
                document.getElementById('ADataA').style.display = 'none';
            }
            </script>
        </div>
        <div class="row" style="margin: 3.5%;">
            <div class="col-sm" id="GAsistencias">
                <!--Inicio la seccion de grafico-->
                <div class="GraficosPanel">
                    <!--Load the AJAX API-->
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    var var1 = "<?php echo $conteo1; ?>";
                    var var2 = "<?php echo $conteo2; ?>";
                    if (var1 > 0 && var2 > 0) {
                        //alert(var1);
                        //alert(var2);
                        //alert(var1 + var2 + var3);
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
                                ["Asistencia real ", Number(var1), "#BF0310"],
                                ["Asistencia de impacto", Number(var2), "#B6C72C"]
                                

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
                                bar: {
                                    groupWidth: "95%"
                                },titleTextStyle: {
                                    color: 'black',
                                    fontName: 15,
                                    fontSize: 15,
                                    bold: 'true',
                                    italic: 'false'
                                },
                                legend: {
                                    position: "none"
                                },
                            };
                            var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
                            chart.draw(view, options);
                        }
                    } else {
                        document.getElementById('GAsistencias').style.display = 'none';
                        //alert('si entro');
                    }
                    </script>
                    <!--Div that will hold the pie chart-->
                    <div id="barchart_values" style="width: 375px; height: 275px;"></div>
                </div>
                <!-- Finaliza seccion de grafico-->
            </div>
            <div class="col-sm">
                <div class="card" style="text-align: left;">
                    <div class="card-header">
                        Asistencia
                    </div>
                    <div class="card-body">
                        <!--h5 class="card-title">Special title treatment</h5-->
                        <p class="card-text"><b>Asistencia de impacto:
                            </b> <?php 
                echo $conteo2;
                     /*if ($Prom0 == NULL) {
                            echo $Prom0 .' %';
                     }  
                     else{
                        echo '0%';
                     }  */  
                     ?></p>
                        <p class="card-text"><b>Asistencia real: </b> <?php
                     echo $conteo1;
                      echo '<br>&emsp; <b> &bull; Hombres: </b>' . $conteo7;
                     echo '<br>&emsp; <b> &bull; Mujeres: </b>' . $conteo8;
                    /* if ($Prom50 == NULL) {
                            echo $Prom50 .' %';
                     }  
                      else{
                        echo '0%';
                     }      */      
                     ?></p>
                        <!--a href="#" class="btn btn-primary">Go somewhere</a-->
                    </div>
                </div>
            </div>
        </div>
        <div id="ADataE" class="alert alert-danger" role="alert" style="margin: 4%;">

            NO HAY DATOS QUE MOSTRAR DE EVALUACIONES!
            <script type="text/javascript">
            var var6 = "<?php echo $conteo6; ?>";
             //alert(var6);
            if (var6 == 0) {
                // (var1 == null && var2 == null && var3 == null && var4 == null  && var5 == null) || (var1 == 0 && var2 == 0 && var3 == 0 && var4 == 0  && var5 == 0)
            } else {
                document.getElementById('ADataE').style.display = 'none';
            }
            </script>
        </div>
        <div class="row" style="margin: 3.5%;">
            <div class="col-sm" id="GEvaluaciones">
                <!--Inicio la seccion de grafico Asistencia-->
                <div class="GraficosPanel">
                    <!--Load the AJAX API-->
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    var var3 = "<?php echo $conteo3; ?>";
                    var var4 = "<?php echo $conteo4; ?>";
                    var var5 = "<?php echo $conteo5; ?>";
                    var var9 = "<?php echo $conteo9; ?>";
                    var var10 = "<?php echo $conteo10; ?>";

                 if (var3 > 0 || var4 > 0 || var5 > 0 || var9 > 0 || var10 > 0) {


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
                        ['No Satisfecho', Number(var3)],
                        ['Moderadamente Satisfecho', Number(var4)],
                        ['Extremadamente Satisfecho', Number(var5)],
                        ['Poco Satisfecho',Number(var9)],
                        ['Muy Satisfecho',Number(var10)]
                        ]);

                            // Set chart options
                            var options = {
                                'title': 'Promedio de evaluaciones',
                                'width': 475,
                                titleTextStyle: {
                                    color: 'black',
                                    fontName: 15,
                                    fontSize: 15,
                                    bold: 'true',
                                    italic: 'false'
                                },
                                is3D: true,
                                'height': 275,
                                colors: ['#BF0310', '#B6C72C', '#DB9600','#0030f3','#717175']
                            };


                            // Instantiate and draw our chart, passing in some options.
                            var chart = new google.visualization.PieChart(document.getElementById('piechar_3d'));
                            chart.draw(data, options);
                        }
                    } else {
                        document.getElementById('GEvaluaciones').style.display = 'none';
                        //alert('si entro 2');
                    }
                    </script>
                    <!--Div that will hold the pie chart-->
                    <div id="piechar_3d"></div>
                </div>
                <!-- Finaliza seccion de grafico-->
            </div>
            <div class="col-sm">
                <div class="card" style="text-align: left;">
                    <div class="card-header">
                        Promedio de evaluaciones
                    </div>
                    <div class="card-body">
                       <p class="card-text"><b>No Satisfecho: </b> <?php 
                if ($Prom0 >= 0) {
                   echo $Prom0 .' %';
               }    
               else{
                   echo '0%';
               }            
               ?></p>
               <p class="card-text"><b>Poco Satisfecho: </b> <?php 
                if ($Prom25 >= 0) {
                   echo $Prom25 .' %';
               }    
               else{
                   echo '0%';
               }            
               ?></p>
               <p class="card-text"><b>Moderadamente Satisfecho: </b> <?php
               if ($Prom50 >= 0) {
                   echo $Prom50 .'%';
               }    
               else{
                   echo '0%';
               }                
               ?>
           </p>
           <p class="card-text"><b>Muy Satisfecho: </b> <?php 
                if ($Prom75 >= 0) {
                   echo $Prom75 .' %';
               }    
               else{
                   echo '0%';
               }            
               ?></p>
           <p class="card-text"><b>Extremadamente Satisfecho: </b> <?php 
           if ($Prom100 >= 0) {
              echo $Prom100 .'%';
          }     
          else{
              echo '0%';

          }         
          ?></p>
                    </div>
                </div>
            </div>
        </div>
        
</div>

<!--Finaliza estrucutra de trabajo-->


<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>