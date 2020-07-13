<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';

?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
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
    <!-- Inicio Logica para traer los datos-->
    <?php
          $GLOBALS['id'] =  $_GET['id'];



          $consulta1=$pdo->prepare("SELECT COUNT(ID_alumno) as 'Total' from evaluaciontalleres  where Rating = 0  AND  ID_Taller = ?");
          $consulta2=$pdo->prepare("SELECT COUNT(ID_alumno) as 'Total' from evaluaciontalleres  where Rating = 50 AND  ID_Taller = ? ");
          $consulta3=$pdo->prepare("SELECT COUNT(ID_alumno) as 'Total' from evaluaciontalleres  where Rating = 100 AND  ID_Taller = ? ");
          $consulta4=$pdo->prepare("SELECT TRUNCATE(AVG(Rating),2) as 'Prom' from evaluaciontalleres  where   ID_Taller = ? ");
          $consulta5=$pdo->prepare("UPDATE talleres SET Rating = (SELECT TRUNCATE(AVG(Rating),2) from evaluaciontalleres where ID_Taller = ? ) WHERE ID_Taller = ? ");


            //$consulta2->bindParam(":IdAlumno", $Correo);
          $consulta1->execute(array($id));
          $consulta2->execute(array($id));
          $consulta3->execute(array($id));
          $consulta4->execute(array($id));
          $consulta5->execute(array($id,$id));
          $conteo1;
          $conteo2;
          $conteo3;
          $conteo4;
          if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
          {
            $fila2=$consulta1->fetch();
            $conteo1 = $fila2['Total'];
          }
          if ($consulta2->rowCount() >=0)
          {
            $fila2=$consulta2->fetch();
            $conteo2 = $fila2['Total'];
          }
          if ($consulta3->rowCount() >=0)
          {
            $fila2=$consulta3->fetch();
            $conteo3 = $fila2['Total'];
          }
          if ($consulta4->rowCount() >=0) {
            $fila2=$consulta4->fetch();
            $conteo4 = $fila2['Prom'];
          }

  ?>
    <!--Finaliza Logica para traer los datos-->
    <!--Finaliza la seccion donde se muestran los datos del taller y el grafico-->
    <div class="CabeceraComentario" style="">
        <div class="card" style="margin-top: 3%;">
          <div class="card-header">
            <p style="font-size: 25px;"><?php echo $_GET['id2']; ?></p>
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
                        var a = "<?php echo $id = $_GET['id'];?>"
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

                            // Create the data table.
                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'Topping');
                            data.addColumn('number', 'Slices');
                            data.addRows([
                                ['Nada Satisfecho', Number(var1)],
                                ['Poco Satisfecho', Number(var2)],
                                ['Muy Satisfecho', Number(var3)]

                            ]);

                            // Set chart options
                            var options = {
                                'title': 'Satisfación estudiantil',
                                'width': 375,
                                titleTextStyle: {
                                    color: 'green',
                                    fontName: 15,
                                    fontSize: 15,
                                    bold: 'true',
                                    italic: 'false'
                                },
                                is3D: true,
                                'height': 275,
                                colors: ['#BF0310', '#B6C72C', '#DB9600']
                            };


                            // Instantiate and draw our chart, passing in some options.
                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                        }
                        </script>
                        <!--Div that will hold the pie chart-->
                        <div id="piechart_3d"></div>
                    </div>
                    <!-- Finaliza seccion de grafico-->
                </div>
                <!-- Inicia seccion donde se muestran los datos del taller-->
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            Datos del taller
                        </div>
                        <div class="card-body">
                            <!--h5 class="card-title">Special title treatment</h5-->
                            <p class="card-text"><b>Fecha: </b> <?php  echo $_GET['id3']?></p>
                            <p class="card-text"><b>Sede: </b> <?php  echo $_GET['id4']?></p>
                            <p class="card-text"><b>Total de evaluaciones: </b><?php  echo $_GET['id6']?></p>
                            <p class="card-text"><b>Rating: </b><?php  echo $conteo4?></p>
                            <!--a href="#" class="btn btn-primary">Go somewhere</a-->
                        </div>
                    </div>
                    <!-- Finaliza seccion donde se muestran los datos del taller-->
                </div>
            </div>
        </div>
    </div>
    <!--Finaliza la seccion donde se muestran los datos del taller y el grafico-->
    <div class="CargarComentarios">
        <?php
          require_once 'Modelo/CargarComentarios.php';
          
          ?>
    </div>
    <!-- Inicio Tabla Responsiva con estilo de zebra-->
    <!--div class="TablaTalleres">
  <div class="card-body">
    <div class=" ">
      <br>
      <table  id=" " class="table table-striped table-light table-hover table-sm table-bordered table-fixed" >
        <thead class=" table-primary">
          <tr>  
            <th scope="col">Comentario</th>         	
            
          </tr>
        </thead>
        
        <tbody class=" ">
        
        </tbody>  
        <tfoot class="table-primary">
          <tr>
            <th scope="col">Comentario</th>
                      
          </tr>
        </tfoot>      
      </table>  
    </div> <Fin de la caja responsivo de la tabla>

  </div >
</div-->
    <!--Fin Tabla Responsiva con estilo de zebra-->
    <!--Inicia Modal de grafico -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--Finaliza modal del grafico-->
</div>
<!--Finaliza estrucutra de trabajo-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
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