<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
      require_once '../Conexion/conexion.php';
?>
<title>Sessiones One on One</title>

<?php
 date_default_timezone_set('America/El_Salvador');
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<br>
<h1>Actualizar Horario</h1>
<a href="javascript:history.back();" class="btn float-left"  title="Regresar"><i class="fas fa-chevron-circle-left display-4"></i></a>

<div  aria-hidden="true" class="text-center float-center" style="margin-right: 6%;">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-dark" id="exampleModalLabel">Actualizar Sessiones One on One</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" Method="POST" style="width:80%; margin:auto">

  <div class="form-group">
    <label for="exampleInputEmail1" class="text-dark">Ingrese el titulo de la sessión</label>
    <select name="titulo" id="" class="form-control float-right">
                            <option value="Geo Albanés">Geo Albanés</option>
                            <option value="Ónix Landaverde">Ónix Landaverde</option>
                        </select>  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-dark">Ingrese la fecha de la sessión</label>
    <?php $today = date("Y-m-d");?>
    <input type="date" name="fecha" class="form-control" min='<?php echo $today; ?>'  required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-dark">Hora de inicio de la se sessión: </label>
    <input type="time" name="TimeInit" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-dark">Hora de finalización de la sessión: </label>
    <input type="time" name="TimeEnd" class="form-control" required>
  </div><button type="submit" class="submit btn btn-success btn1 mx-auto text-center">Crear <i
                                class="fas fa-paper-plane"></i></button>
  </form><br>
  <a href="sessionesOneonOne.php"><button type="submit" class="btn btn-primary btn1" >Regresar <i class="fas fa-paper-plane"></i></button>
</a>

<br>
          </div>
        </div>
      </div>        
</div>

<?php  

    @$timeInit = $_POST['TimeInit']; 
    @$timeEnd = $_POST['TimeEnd'];
    @$fecha = $_POST['fecha'];
    @$titulo = $_POST['titulo'];
    @$TimeStart = $_POST['TimeInit'];
    @$TimeE  = $_POST['TimeEnd'];

                            
     if(isset($fecha) && isset($titulo) && isset($TimeStart) && isset($TimeE)){
        if(isset($timeInit)){
          if ($timeInit < $timeEnd) {

            $stmt2 = $dbh->query("SELECT * FROM one_on_one");
            
            while ($row = $stmt2->fetch()) { 
              $fecha1[] = ($row['fecha'])." ".$row['hora_inicio']." - ".$row['hora_fin'];
              $titulo1[] = utf8_encode($row['titulo']);
            }
            $fechavar[] = $fecha." ".$timeInit." - ".$timeEnd;
            $titulovar[] = $titulo;
            
           if(($fechavar != $fecha1) && ($titulovar != $titulo1)){
              $sql = "INSERT INTO one_on_one (titulo, fecha, hora_inicio, hora_fin, cupo, estado, estado_alumno) VALUES (?,?,?,?,?,?,?)";
              $stmt= $dbh->prepare($sql);
              $stmt->execute([utf8_decode($titulo), $fecha,$TimeStart,$TimeE,1,'Disponible','Disponible']);
              header("Location:sessionesOneonOne.php");
              echo "<p class='text-center text-success font-weight-bold'>Enviado correctamente</p>";
          }else{
              echo "<script>alert('Error, Ya hay una fecha existente para ese día')</script>";
          }
          
         }
         else{
           echo "<p class='text-danger text-center font-weight-bold' >Error al guardar, la hora de inicio debe ser menor a la hora de finalización</p>";
         }
        }
      }
      ?>
  <br> 
<script type="text/javascript" src="js/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>