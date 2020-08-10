<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>FGK | Actualizar Reunión</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>


<!--Comiezo de estructura de trabajo -->
<div class="container-fluid ">
<br><div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <h2 class="main-title" >Fase Creación Reunión</h2>
<div class="title2" style="background-color: #9d120e">
  <a class="nav-link active" href="HorasVinculacionPorAlumno.php?id=<?php echo$IDAlumno ?>">Horas por Alumno</a>
</div>
</div>

<!--Navbar-->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Fase Creación Reunión</a>

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
        <a class="nav-link" href="SIT-ProcesoInscripcion.php">Proceso Inscripción</a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="SIT-CrearTaller.php">Crear Taller</a>
     </li> 

     <li class="nav-item">
      <a class="nav-link active " href="SIT-CrearReunion.php">Crear Reunión</a>
    </li> 

  </ul>
  <!-- Links -->   
</div>
<!-- Collapsible content -->
</nav>
<!--/.Navbar-->
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<!--/.Navbar-->
<br>
<div class="card">
  <div class="card-header">
    <b>Nueva Reunión</b>
    <span class="float-right">  

      <a href="LIS-Reunion.php">
        <button type="button" class="btn btn-danger px-3">
          <i class="fas fa-users" aria-hidden="true"></i>
          Ver Reuniónes
        </button>
        </a>
 </span>
  </div>
  <div class="card-body">
    <!--Contenido de la caja de crear Cuentas de alumnos Formulario-->
    <div class="card-body px-lg-5 pt-0" >
      <!--Inicio del Formulario-->
      <form class="text-center" action="Modelo/ModeloReunion/GuardarDatosReu.php" method="POST">  
        <br>
        <div id="alerta2"></div>
        <br>


        <div class="form-row">
         <div class="col">
          <div class="md-form">
            <input type="text" id="NombreReunion" name="NombreReunion" class="form-control" placeholder="Nombre de la reunión"  required>
            <label for="materialRegisterFormLastName">Titulo Reunión</label>
          </div>
        </div>

        <div class="col">
          <!-- Last name -->
          <div class="md-form">
            <input type="date" id="fecha" name="fecha" class="form-control" placeholder="Nombre Completo" required>
            <label for="materialRegisterFormLastName">Fecha</label>
          </div>
        </div>
      </div> 

        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <select id="idempresa" name="idempresa" class="form-control" required >
                <?php     
                echo '<option value="" disabled selected >Seleccione la opción</option>';
                foreach($pdo->query("SELECT * FROM  empresas  WHERE  Tipo =  'Universidad'") as $row) 
                {
                  echo '<option value="'.$row['ID_Empresa'].'">'.$row['Nombre'].'</option>';
                }
                echo '</select>';
                ?>
                <label for="materialRegisterFormFirstName">Universidad</label>
              </div>
            </div>
            <div class="col">
              <!-- Last name -->
              <div class="md-form">
               <select id="idCICLO" name="idCICLO" class="form-control" required >
                <?php     
                echo '<option value="" disabled selected >Seleccione la opción</option>';
                foreach($pdo->query("SELECT * FROM ciclos") as $row) 
                {
                  echo '<option value="'.$row['ID_Ciclo'].'">'.$row['ID_Ciclo'].'</option>';
                }
                echo '</select>';
                ?>
                <label for="materialRegisterFormFirstName">Ciclo</label>
              </div>
            </div>
          </div>

          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <select type="text" id="tipo" name="tipo" class="form-control" required >
                <option value="" disabled selected >Seleccione la opción</option>
                <option value="Charla Informativa" >Charla Informativa</option>
                <option value="Taller" >Taller</option>
                <option value="Reunión General" >Reunión General</option>
                <option value="Otro" >Otro</option>
                
              </select>
              <label for="materialRegisterFormFirstName">Tipo de reunión</label>
            </div>
          </divs>      

          <input class="btn btn-light btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_Reunion" value="Crear Reunión" id="Guardar_Reunion">
          <hr>
        </form>
        <!-- Fin del Formulario -->
      </div> <!--Fin de la caja contendora Formulario-->
    </div> 
  </div>
</div>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>
