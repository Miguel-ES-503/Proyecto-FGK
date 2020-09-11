<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Preguntas frecuentes</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/Preguntas.css">
<link rel="stylesheet" type="text/css" href="css/Renovacion.css">
<div class="title">
  <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Preguntas Frecuentes</h2>
</div>>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<!-- Responder a pregunta -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Responder a preguntas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" Method="POST" style="width:80%; margin:auto">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-dark">Redacte  la pregunta: </label>            
    <input type="text" name="pregunta" id="year" class="form-control" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-dark">Ingrese la respuesta a la pregunta seleccionada: </label>
        <textarea name="respuesta"  class="form-control"id="respuesta" cols="20" rows="5"></textarea>
  </div>
  <div  id="nota">
    <label  for="exampleCheck1"><b>NOTA: </b>La respuesta dede tener como máximo 255 carácteres</label>
  </div>
  <button type="submit" class="btn btn-primary btn1" id="btn-modal"><img src="../img/paper.png" id="img">Enviar</button>
  </form>
<br>
          </div>
        </div>
      </div>        
</div> <br> 
<h3   id="title-1" >Respuestas Guardadas</h3>
 <div class="mx-auto"  > 
 <div class="panel-body">
                    <div id="tablapdf" class="sessiones" >
                        <table  id="datatable2" class="table table-responsive w-100"  >
                            <thead id="cabezera">
                                <tr>
                                    <th>Pregunta</th>
                                    <th>Respuesta</th>
                                    <th>Fecha Respuesta</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                        </table>
                        </div>
                    </div>
</div>
<button type='button' class='btn btn-success btn-agregar add-pregunta' data-toggle='modal' data-target='#myModal3' id="btn">
  <img src="../img/responder.svg" id="icon">Responder a preguntas</button>  
   <br>  
      <?php 
      require_once '../Conexion/conexion.php';
              @$pregunta = $_POST['pregunta'];
              @$respuesta = $_POST['respuesta'];
            //actualizar estado
          if(isset($respuesta)){
            date_default_timezone_set('America/El_Salvador');
            $fecha = date('Y-m-d H:i');
            $sql2 = "INSERT INTO preguntas (pregunta, respuesta, fechaRespuesta) VALUES (?,?,?)";
            $stmt2= $dbh->prepare($sql2);
            $stmt2->execute([$pregunta, $respuesta, $fecha]);
            header("Location:preguntas.php");
            echo  "<p class='text-success text-center' id='prueba'>La respuesta: ".$respuesta." fue enviada con éxito :</p>";
           }
             ?> 
<script type="text/javascript" src="js/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script>
      $("#OpenModal").click(function (e) { 
        e.preventDefault();
        $('#myModal').modal('show');
      });
    </script>
<!-- Horarios inscritos -->
<script type="text/javascript">
$(document).ready(function(){
      fill_datatable();
      fill_datatable2();    
      function fill_datatable(year = '')
      {
       var dataTable = $('#datatable2').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No hay sessiones One on One disponibles",
            "info": "Mostrando página  _PAGE_ de _PAGES_",
            "infoEmpty": "Registros no encontrados",
            "infoFiltered": "(filtrados  _MAX_  registros del total)",
            "search": "Buscar",
            "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior",
        "sProcessing":     "Procesando...",
        "sLoadingRecords": "Cargando..."
    },
        },
        "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "searching" : true,
        "ajax" : {
         url:"fech.php",
         type:"POST",
         data:{
          year:year
         }
        }
       });
      }
  });
  </script>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

