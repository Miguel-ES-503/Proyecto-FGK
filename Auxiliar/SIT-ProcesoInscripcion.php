<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>FGK | Creación de taller</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid ">
<br>
<!--Navbar-->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Fechas de publicación talleres</a>

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
        <a class="nav-link active " href="SIT-ProcesoInscripcion.php">Proceso Inscripción</a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="SIT-CrearTaller.php">Crear Taller</a>
     </li>
  </ul>
  <!-- Links -->   
</div>
<!-- Collapsible content -->
</nav>
<div class="float-right">
<?php include 'Modularidad/Alerta.php'?>  
</div>

<br>
<div class="card">
  <h5 class="card-header h5 bg-light" style="color: black;">
   Horario de inscripción  <?php if($ubicacion == "SS"){ echo "San Salvador";}else{ echo "Santa Ana";}?>
 <span class="float-right">
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
       Crear inscripción
     </button>
    </span>
  
 </span>
   </h5>
</div>
<div class="card-body">
  <div class="table-responsive">
          <br><br>
          <table  id="tableUser4" class="table table-hover table-sm table-bordered table-fixed" >
            <thead class="table-secondary">
              <tr>  
                <th scope="col">#</th>
                <th scope="col">SEDE</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Estado</th>
                <th scope="col">Actualizar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>

            <tfoot class="table-secondary">
              <tr>
               <th scope="col">#</th>
               <th scope="col">SEDE</th>
               <th scope="col">Fecha</th>
               <th scope="col">Hora</th>
               <th scope="col">Estado</th>
               <th scope="col">Actualizar</th>
               <th scope="col">Eliminar</th>
             </tr>
           </tfoot>
           <tbody>
            <?php include 'Modelo/ModeloInscripcion/MostrarDatosInscripcion.php' ?>
          </tbody>        
        </table>  

      </div> <!--Fin de la caja responsivo de la tabla--> 
    </div><!-- Fin de la caja --> 
  </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: black">Nuevo inscripción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Modelo/ModeloInscripcion/GuardarInscripcion.php" method="POST">
          <div class="form-group"  >

            <div class="col">
           


              <div class="md-form">
                <input type="date" class="form-control" id="Fecha"  name="Fecha" placeholder="Ingrese la fecha de inscripción" required >    
                <label for="materialRegisterFormFirstName" style="color: black">Fecha de inscripción</label>
              </div>

                 <div class="md-form">
                <input type="time" class="form-control" id="Hora" name="Hora"  placeholder="Ingrese la hora correspodiente" required >    
                <label for="materialRegisterFormFirstName" style="color: black">Hora de inscripción</label>
              </div>

            </div>      
          </div>

          <input type="submit" name="Inscripcion" value="Iniciar Proceso" class="btn btn-primary btn-lg btn-block">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>
