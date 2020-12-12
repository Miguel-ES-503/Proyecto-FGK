<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Renovación</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
require_once '../Conexion/conexion.php';

$ID = trim($_GET['id']);
$_SESSION['alumno'] = $ID;
foreach ($dbh->query("SELECT ID_Empresa FROM alumnos WHERE ID_Alumno = '".$ID."'") as $Uni) {
  $U = $Uni["ID_Empresa"];
}
foreach ($dbh->query("SELECT Nombre FROM alumnos WHERE ID_Alumno = '".$ID."'") as $ES) {
  $Alumno = $ES["Nombre"];
}
foreach ($dbh->query("SELECT imagen FROM usuarios WHERE nombre = '".$Alumno."'") as $PIC) {
  $FotoAlumno = $PIC["imagen"];
}
foreach ($dbh->query("SELECT COUNT(*) AS 'Condicion' FROM renovacion 
  WHERE ID_Alumno = '".$ID."' and Estado != 'eliminado'")  as $CON) {
  $condicion = $CON["Condicion"];
}
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

if (isset($_SESSION['noti'])) {
    echo $_SESSION['noti'];
    unset($_SESSION['noti']);
}
?>
        



<link rel="stylesheet" type="text/css" href="css/Renovacion.css">
  <style type="text/css">
     .modal-content{
  background-color: white;
  border-color: black;
  border-radius: 30px;
  padding: 20px;
}
.modal-body{
  text-align: left;
}

.form-control{
  background-color: #ADADB2;
  color: black;
  border-radius: 20px;

}
.modal-header{
  border-color: #ADADB2;
  border:3px;
}
.modal-footer{
  border-color: #ADADB2;
  border:3px;
}
 </style>
<div class="title">
  <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
    <h2 style="font-size: 25px;
    align-items: center;
    font-weight: bold;
    letter-spacing: 2px;margin-top: 10px;margin-left: 5px;">Renovaciones de Beca</h2>
</div>
    <div id="body">
      
    <table  id="table" class="table table-striped" style="width: 50%;" >
      <br>
<?php 

  if ($condicion < 1) {
      echo " <thead><td colspan='4' style='font-size: 18px;font-weight: bold;''>".utf8_decode($Alumno)."</td></thead>";
      echo "<thead><td colspan='4'><img src='../img/imgUser/$FotoAlumno?>' alt='img de usuario' id='perfil'></td></thead>";
      echo "<td colspan='4' class='alert alert-danger'>Sin renovaciones de Beca</td>";
    }else
    {
    ?>
          </thead>
      <thead>
        <td colspan="4" style="font-size: 18px;font-weight: bold;"><?php echo $Alumno ?></td>
      </thead>
      <thead>
        <td colspan="4"><img src="../img/imgUser/<?php echo $FotoAlumno?>" alt="img de usuario" id="perfil"></td>

      
          <thead class="table-dark">
            <tr>
              <th>Ciclo</th>
              <th>Año</th>
              <th>Estado</th>
              <th>Acciones</th>
          </thead>
<tbody>
  <?php 

    foreach ($dbh->query("SELECT idRenovacion,ciclo,year,direccion,Estado,ID_Alumno FROM renovacion 
  WHERE ID_Alumno = '".$ID."' AND Estado != 'eliminado' ORDER BY year DESC,ciclo DESC") as $datos) { 
   
 $n=1;
    
     ?>
     <tr>
    <td><?php  echo $datos["ciclo"] ?></td>
    <td><?php  echo $datos["year"] ?></td>
    <td><?php  echo $datos["Estado"]; ?></td>
    <td>
<div class="btn-grupo">
    <button type="button" value="<?php echo $datos['direccion']?>" class="btn btn-warning" data-toggle="modal" data-target="#mostrarPDF"   id="direccion<?php echo $n ?>" ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>Ver PDF</button>
 <!--<button type="button" value="<?php echo $datos['idRenovacion']?>" class="btn btn-success" data-toggle="modal" data-target="#subirPDF"   id="archivo"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>Editar</button>-->
<a id="btn"  href="proceso-renovacion.php?cn=<?php echo $datos["idRenovacion"]?>" class="btn btn-danger"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>Eliminar</a></td>
    </div>
    <input type="hidden" name="id" id="id" value="<?php echo $datos['idRenovacion']?>">
    <input type="hidden" name="carne" value="<?php echo $datos['ID_Alumno']?>">

  </tr>
    <?php
     $n++;
    }}
          ?>
        </tbody>
      </table>
    </div>
</body>


<!--VER PDF-->
<script>
let temp = $("#btn1").clone();
$("#btn1").click(function(){
    $("#btn1").after(temp);
});

</script>

<script type="text/javascript">
    $(".btn-grupo button").click(function(){
    
   var dir =$('#direccionpdf').val($(this).val());

 })
</script>
<script type="text/javascript">
    $("#archivo").click(function(){
    
   var dir =$('#idRenovacion2').val($(this).val());

 })
</script>
<script type="text/javascript">
    $(document).ready(function($) {
    $(document).on('click', '#mostrar', function(){
    
    //obtenemos el id
    
    var dir = $('#direccionpdf').val();
    var idEditar = $('#id').val();
      
   // var direccion = $('#direccion').val();
    
    $('#pdf2').html('<iframe  src="'+dir+'" width="700px" height="500px"></iframe>');
    

    });
     $(document).on('click', '#cerrar', function(){
        $('#pdf2').val('');
     });
     $(document).on('click', '#cerrar2', function(){
        $('#direccionpdf').val("");
     });
});
</script>

<script type="text/javascript">
    window.onload=function(){
    $("table tbody tr").click(function(){
        // Tomar la captura la informaci���n  de la tabla 
        var id= $(this).find("td:eq(0)").text(); 
        document.getElementById('idRenovacion').value=id;    
      });    
  }
</script>


<div class="modal fade" id="mostrarPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="Modelo/ModeloRenovacion/procesoRenovacion.php" method="POST">
  <div class="modal-dialog modal-lg" role="document" style="width: 750px;margin: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button"  id="mostrar" class="btn btn-success" style="margin:auto;">Mostrar</button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idRenovacion" id="idRenovacion">
        <input type="hidden" name="direccionpdf" id="direccionpdf">
        <div id="pdf2" style="margin: 0 auto;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Close</button>
      </div>
    </div>
  </div>
</form>
</div>

<div class="modal fade" id="subirPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Carta</h5>
      </div>

      <div class="modal-body" style="margin-top: -40px;">
        <br>
        <form action="proceso-renovacion.php" method="post" enctype="multipart/form-data">
          <input type="text" name="idRenovacion2" id="idRenovacion2">
          <label style="color: black">Estado:</label>
          <select name="estado" class="form-control">
            <option>enviado</option>
            <option>declinación</option>
          </select>
          <br>
          <div class="custom-file" >
          <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo" required>
          <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Carta</label>
          <center><small>El archivo no debe pesar más de 5MB</small></center>
        </div>
            <div class="modal-footer">
                <input style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;margin-bottom: -10px;" type="submit" id="subirCarta" name="subirCarta2" value="Guardar Cambios">
     <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar2">Close</button>
       
      </div>

      </form>
    </div>
  </div>
</div>


</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>
