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
<h1>Eliminar Horario</h1>
<a href="javascript:history.back();" class="btn float-left"  title="Regresar"><i class="fas fa-chevron-circle-left display-4"></i></a>

<?php 
$id = $_POST['Disponible2'];
      $query = "SELECT * FROM one_on_one WHERE estado = 'Disponible' and id = $id ";
              $stat = $dbh->prepare($query);
              $stat->execute();
              $result = $stat->fetchAll();
        foreach($result as $row)
                            {
                              $id = $row["id"];
                              $titulo = utf8_encode($row["titulo"]);
                              $fecha = $row["fecha"];
                              $horaInicio = $row["hora_inicio"];
                              $horafin = $row["hora_fin"];
                            }
?>
<div  aria-hidden="true" class="text-center float-center" style="margin-right: 6%;">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-dark" id="exampleModalLabel">Eliminar Session One on One</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" Method="POST" style="width:80%; margin:auto">

  <div class="form-group">
    <label for="exampleInputEmail1" class="text-dark">Titulo de la sesión</label><br>
    <label for="exampleInputEmail1" class="text-dark"><?php echo $titulo; ?></label>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-dark">Fecha de la sesión</label><br>
    <label for="exampleInputPassword1" class="text-dark"><?php echo $fecha; ?></label>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-dark">Hora de inicio de la se sessión: </label><br>
    <label for="exampleInputPassword1" class="text-dark"><?php echo $horaInicio; ?></label>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-dark">Hora de finalización de la sessión: </label><br>
    <label for="exampleInputPassword1" class="text-dark"><?php echo $horafin; ?></label>
  </div>
  <button type="submit" class="btn btn-danger btn1" value="<?php echo $id ?>" name='idactualizar'>Eliminar <i class="fas fa-paper-plane"></i></button>
  </form><br>
  <a href="sessionesOneonOne.php"><button type="submit" class="btn btn-primary btn1" >Regresar <i class="fas fa-paper-plane"></i></button>
</a>
<br>
          </div>
        </div>
      </div>        
</div>

<?php 
require_once '../Conexion/conexion.php';
// delete preguntas
$id = $_POST['idactualizar'];
$sql = "DELETE FROM one_on_one WHERE id = $id";
if ($dbh->query($sql) === TRUE) {
  echo "Registro Eliminado";
  header("Location:../sessionesOneonOne.php");

} else {
 
}
$dbh->close();
// Actualizar Horario

?>
  <br> 
<script type="text/javascript" src="js/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>