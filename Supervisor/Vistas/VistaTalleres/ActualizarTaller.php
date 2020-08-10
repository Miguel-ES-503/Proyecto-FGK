<?php require_once "../../../BaseDatos/conexion.php"; ?>

<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $consulta=$pdo->prepare("SELECT Titulo , Fecha , Hora , Tip.Nombre as 'Tipo' , ID_Sede , ID_Ciclo , Emp.Nombre AS 'Empresa' , Estado , Cupo ,Tip.ID_Formato , Emp.ID_Empresa FROM talleres tal inner join formatotalleres Tip on tal.ID_Formato = Tip.ID_Formato left join empresas Emp on tal.ID_Empresa = Emp.ID_Empresa WHERE ID_Taller = :ID_Taller ");
  $consulta->bindParam(":ID_Taller",$id);
  $consulta->execute();


  // Variables Globales
  $TituloTaller; $Fecha; $Hora;
  $Tipo; $SEDE; $Ciclo; $Empresa;
  $Estado; $Cupo; $IDFormato;


  if ($consulta->rowCount() >=0)
  {
   $fila=$consulta->fetch();

   $TituloTaller = $fila['Titulo'];
   $Fecha = $fila['Fecha'];
   $Hora = $fila['Hora'];
   $Tipo = $fila['Tipo'];
   $SEDE = $fila['ID_Sede'];
   $Ciclo = $fila['ID_Ciclo'];
   $Empresa = $fila['Empresa'];
   $Estado = $fila['Estado'];
   $Cupo = $fila['Cupo'];
   $IDFormato = $fila['ID_Formato'];
   $IDEmpresa = $fila['ID_Empresa'];


   
 }


}// Fin del consulta del if   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualizar Taller | FGK</title>
	<link rel="stylesheet" href="../css/master.css">
	<link rel="stylesheet" type="text/css" href="../../css/EstiloCrearCuentas.css">
	<link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!--Estilo css CrearCuentas-->
	<link rel="stylesheet" type="text/css" href="css/EstiloCrearCuentas.css">
</head>

<body class="container">
	<br><br>
	
	<br>
  <div class="card">
    <div class="card-header">
      <b>Actualizar Taller</b>
    </div>
    <div class="card-body">
      <!--Contenido de la caja de crear Cuentas de alumnos Formulario-->
      <div class="card-body px-lg-5 pt-0" >
        <!--Inicio del Formulario-->
        <form class="text-center" action="../../Modelo/ModeloTaller/ActualizarTaller.php" method="POST">  
          <br>
          <div id="alerta2"></div>
          <br>
          <input type="hidden" name="IDTaller" value="<?php echo $id ?>">
          <div class="form-row">
            <div class="col">
              <!-- First name   Tema , fecha , la hora y el tipo de taller -->
              <div class="md-form">
               <input type="text" id="TitutloTaller" value="<?php echo $TituloTaller ?>" name="TitutloTaller" class="form-control" placeholder="Nombre del Taller">
               <label for="materialRegisterFormFirstName">Titulo</label>
             </div>
           </div>
           <div class="col">
            <!-- Last name -->
            <div class="md-form">
              <input type="date" id="Fecha" value="<?php echo $Fecha ?>" name="Fecha" class="form-control" placeholder="Fecha del taller">
              <label for="materialRegisterFormLastName">Fecha de publicación</label>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <input type="time" id="Horario" value="<?php echo $Hora ?>" name="Horario" class="form-control" placeholder="Nombre del Taller">
              <label for="materialRegisterFormFirstName">Hora</label>
            </div>
          </div>
          <div class="col">
            <!-- Last name -->
            <div class="md-form">
              <select class="form-control" name="TipoTaller" id="TipoTaller">
                <option value="<?php echo $IDFormato  ?>"  selected > <?php echo $Tipo  ?> </option>
                <?php     
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
              <!-- First name   Tema , fecha , la hora y el tipo de taller -->
              <div class="md-form">
              <select class="form-control" name="empresa" id="empresa">
                  <option value="<?php echo $IDEmpresa ?>"  selected ><?php echo $Empresa ?></option>
                  <?php     
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
            <!-- Last name -->
            <div class="md-form">
              <select class="form-control" name="ciclo" id="ciclo">
                <option value="<?php echo $Ciclo ?>" selected ><?php echo $Ciclo ?></option>
                <?php     

                foreach($pdo->query('SELECT * FROM ciclos ORDER BY ID_Ciclo  DESC ') as $row) 
                {
                  echo '<option value="'.$row['ID_Ciclo'].'">'.$row['ID_Ciclo'].'</option>';
                }
                echo '</select>';
                ?>
                <label for="materialRegisterFormLastName">Ciclo Actual</label>
              </div>
            </div>
          </div>
          <div class="form-row">
           
              <div class="col">
                <!-- First name   Tema , fecha , la hora y el tipo de taller -->
                <div class="md-form">
                 <input type="number" value="<?php echo $Cupo ?>" id="Cantidad" name="Cantidad" class="form-control" placeholder="Cantidad de taller" min="1">
                 <label for="materialRegisterFormFirstName">Cupo a disponer</label>
               </div>
             </div>

             <div class="col">
              <!-- First name   Tema , fecha , la hora y el tipo de taller -->
              <div class="md-form">
               <select class="form-control" name="estado" id="estado">
                <option value="<?php echo $Estado ?>" selected ><?php echo $Estado ?></option>
                <option value="Activo" >Activo</option>
                <option value="Finalizado" >Finalizado</option>
                <option value="Inactivo" >Inactivo</option>
              </select>
              <label for="materialRegisterFormFirstName">Estado</label>
            </div>
          </div>

        </div>
        <input class="btn btn-light btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Actualizar_Taller" value="Actualizar Taller" id="Guardar_Taller"> 
        <span class="float-left">  
        <a href="../../LIS-Talleres.php" title="Regresar" style="color: white;">Regresar</a>
        </span> 
        <br> 
        <hr>
      </form>
      <!-- Fin del Formulario -->
    </div> <!--Fin de la caja contendora Formulario-->
  </div> 
</div>
</div>



</body>
</html>