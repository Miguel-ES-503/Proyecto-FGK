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
    <a class="navbar-brand" href="#">Creación de talleres</a>

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
        <a class="nav-link " href="SIT-ProcesoInscripcion.php">Proceso Inscripción</a>
      </li>
      <li class="nav-item">
       <a class="nav-link active" href="SIT-CrearTaller.php">Crear Taller</a>
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
      <b>Nuevo Taller</b>
      <span class="float-right">  
       <a href="LIS-Talleres.php">
        <button type="button" class="btn btn-danger px-3">
          <i class="fas fa-key" aria-hidden="true"></i>
            Ver Talleres
        </button>
      </a>
    </span>
  </div>
  <div class="card-body">
      <!--Contenido de la caja de crear Cuentas de alumnos Formulario-->
      <div class="card-body px-lg-5 pt-0" >
        <!--Inicio del Formulario-->
        <form class="text-center" action="Modelo/ModeloTaller/GuardarTaller.php" method="POST">  
          <br>
          <div id="alerta2"></div>
          <br>

          <div class="form-row">
            <div class="col">
              <!-- First name   Tema , fecha , la hora y el tipo de taller -->
              <div class="md-form">
               <input type="text" id="TitutloTaller" name="TitutloTaller" class="form-control" placeholder="Nombre del Taller" required="">
               <label for="materialRegisterFormFirstName">Titulo</label>
             </div>
           </div>
           <div class="col">
            <!-- Last name -->
            <div class="md-form">
              <input type="date" id="Fecha" name="Fecha" class="form-control" placeholder="Fecha del taller" required >
              <label for="materialRegisterFormLastName">Fecha de publicación</label>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <input type="time" id="Horario" name="Horario" class="form-control" placeholder="Nombre del Taller" required >
              <label for="materialRegisterFormFirstName">Hora</label>
            </div>
          </div>
          <div class="col">
            <!-- Last name -->
            <div class="md-form">
              <select class="form-control" name="TipoTaller" id="TipoTaller" required >
               <?php     
               echo '<option value="" disabled selected >Seleccione la opción</option>';
               foreach($pdo->query('SELECT ID_Formato,Nombre FROM formatotalleres') as $row) 
               {
                echo '<option value="'.$row['ID_Formato'].'">'.$row['Nombre'].'</option>';
              }
              echo '</select>';
              ?>

              <label for="materialRegisterFormLastName">Tipo de taller</label>
            </div>
          </div>
        </div>

        
      <div class="form-row">
        <div class="col">
          <!-- Last name -->
          <div class="md-form">
            <select class="form-control" name="empresa" id="empresa" required >
             <?php     
             echo '<option value="" disabled selected >Seleccione la opción</option>';
             foreach($pdo->query('SELECT * FROM empresas WHERE Tipo = "Oportunidades" or Tipo = "Empresa Externa"') as $row) 
             {
              echo '<option value="'.$row['ID_Empresa'].'">'.$row['Nombre'].'</option>';
            }
            echo '</select>';
            ?>
            <label for="materialRegisterFormLastName">Empresa Cargada</label>

          </div>


        </div>


        <div class="col">
          <!-- First name   Tema , fecha , la hora y el tipo de taller -->
          <div class="md-form">
           <input type="number" id="Cantidad" name="Cantidad" class="form-control" placeholder="Cantidad de taller" min="1" required >
           <label for="materialRegisterFormFirstName">Cupo a disponer</label>
         </div>
       </div>
     </div>

     <div class="form-row">
     
      <div class="col">
        <div class="md-form">
          <select class="form-control" name="ciclo" id="ciclo" required >
           <?php     
           echo '<option value="" disabled selected >Seleccione la opción</option>';
           foreach($pdo->query('SELECT * FROM ciclos ORDER BY ID_Ciclo  DESC ') as $row) 
           {
            echo '<option value="'.$row['ID_Ciclo'].'">'.$row['ID_Ciclo'].'</option>';
          }
          echo '</select>';
          ?>

          <label for="materialRegisterFormLastName">Ciclo Actual</label>

        </div>
      </div>


        <div class="col">
          <!-- First name   Tema , fecha , la hora y el tipo de taller -->
          <div class="md-form">
           <input type="text" id="lugar" name="lugar" class="form-control" placeholder="Ingrese el lugar correspodiente" min="1" required >
           <label for="materialRegisterFormFirstName">Lugar</label>
         </div>
       </div>
</div>



     <input class="btn btn-light btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_Taller" value="Crear Taller" id="Guardar_Taller">   
     <hr>
   </form>
   <!-- Fin del Formulario -->
 </div> <!--Fin de la caja contendora Formulario-->
</div> 
</div>
</div>
	


<br><br>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>
