<?php require_once 'templates/head.php';?>

<title>Inicio</title>

<?php

  require_once 'templates/header.php';

  require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';


  //Consulta para la esxtraccion de datos ALUMNO 

  setlocale(LC_TIME, 'es_SV.UTF-8');

  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno`, `ID_Empresa` FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
      $universidad=$fila["ID_Empresa"];
  }


?>



<div class="container-fluid text-center">
  <br><br>
  <div class="text-center">

      <h1>Solicitud de transporte</h1>

     
        

      <form action="Modelo/ModeloTransporte/insertar.php" method="POST" accept-charset="utf-8">
<div class="form-row">
    <div class="form-group col-md-4">


      <!--idsolicitudTrans-->
        <input type="hidden" name="solitrans" value="<?php echo $_GET['id'];?>"> 
     
      <label for="inputCity">Dia</label>
      <select id="dia" name="dia" class="form-control" class="form-control" required>
        <option value=" disabled selected ">Seleccione una opción...</option>
         
        <option value="Lunes">Lunes</option>
        <option value="Martes">Martes</option>
        <option value="Miercoles">Miercoles</option>
        <option value="Jueves">Jueves</option>
        <option value="Viernes">Viernes</option>
        <option value="Sabado">Sabado</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Horario de entrada</label>
      <input type="time" class="form-control" id="inputZip" name="horainicio" class="form-control" min="06:00" max="20:00"  placeholder="Ingrese su horario">
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">Horario de llegada</label>
      <input type="time" class="form-control" id="inputZip" name="horafinal" class="form-control" min="06:00" max="20:00" placeholder="Ingrese su horario final">
    </div>
  </div>


  <div class="form-row">
    
     <div class="form-group col-md-4">
      <label for="inputCity">Seleccione ida o regreso</label>
      <select id="inputState" name="tipo" class="form-control" required>
        <option selected>Seleccione una opción...</option>
        <option>IDA</option>
        <option>REGRESO</option>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="inputZip">Ruta</label>
      <input type="text" class="form-control" id="inputZip" name="nombreruta"  placeholder="Ingrese la ruta" required>
    </div>

    <div class="form-group col-md-4">
      <label for="inputZip">Costo</label>
      <input type="text" class="form-control" id="inputZip" name="costo" placeholder="Ingrese el costo" required>
    </div>

    

  </div>

  <br>

  <input type="submit" name="Registrar" name="Guardar_Soli" id="Guardar_Soli" value="Agregar Costo" class="btn btn-secondary">
  
      

</form>




<h4 class="float-left">IDA</h4>   
<br><br>
 <div class="row">
    <div class="col">
      <table class="table table-responsive-lg float-left">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Dia</th>
            <th scope="col">Hora</th>
            <th scope="col">Ruta</th>
            <th scope="col">Costo</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody class="bg-light">



        </tbody>
          <tfoot>
          <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Total $0.00</th>
          </tr>
          </tfoot>
      </table>
    </div>
  </div>

  


  <h4 class="float-left">Regreso</h4>   
<br><br>  
 <div class="row">
    <div class="col">
      <table class="table table-responsive-lg float-left">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Dia</th>
            <th scope="col">Hora</th>
            <th scope="col">Ruta</th>
            <th scope="col">Costo</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody class="bg-light">



        </tbody>
         <tfoot>
          <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Total $0.00</th>
            <th scope="col"></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>


  <br><br>  
 <div class="row">
    <div class="col">
      <table class="table table-responsive-lg float-left">
        <thead class="thead-dark">
          <tr>
            <th scope="col">$Costo ida</th>
            <th scope="col">$Costo Regreso</th>
            <th scope="col">$Total de la semana</th>
            <th scope="col">$Total del mes</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody class="bg-light">
          <tr>
            <th scope="col">$0.00</th>
            <th scope="col">$0.00</th>
            <th scope="col">$0.00</th>
            <th scope="col">$0.00</th>
            <th scope="col"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Subir socioecnomico</button></th>
          </tr>


        </tbody>
        
      </table>
    </div>
  </div>

 

  <center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2">Finalizar Solicitud</button></center>
   


    </div>
  </div>
  <br>
  <br>
</div>

<!-- /#page-content-wrapper -->



</div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comprobante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <br><br>

          <div class="custom-file">
          <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo" required>
          <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Comprobante</label>
          <center><small>El archivo no debe pesar más de 5MB</small></center>
        </div>
        <br><br>
        <div>
        <textarea placeholder="Comentario"  class="form-control" ></textarea>
        <center><small>Comentario</small></center>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- /#wrapper -->




<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seguro desea Finalizar la solicitud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="text-align: justify;">Nota: Recueda el monto que aparece debera ser aprobado por tu coach de lo contrario ellos te asigaran la cantidad o sera denegado.</p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>



<?php

  require_once 'templates/footer.php';

?>
