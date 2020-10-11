<?php require_once "../../../BaseDatos/conexion.php"; ?>

<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $consulta=$pdo->prepare("SELECT ID_Reunion,Titulo,Fecha,emp.Nombre AS 'Universidad',emp.ID_Empresa,ID_Ciclo,Estado,reu.Tipo,reu.Lugar as Lugar FROM reuniones reu INNER JOIN empresas emp on reu.ID_Empresa = emp.ID_Empresa WHERE ID_Reunion = :ID_Reunion ");
  $consulta->bindParam(":ID_Reunion",$id);
  $consulta->execute();


  // Variables Globales
  $idReunion; $TituloReunion; $Fecha; $Universidad; 
  $IDUniversidad; $Ciclo; $estado; $Tipo;




  if ($consulta->rowCount() >=0)
  {
   $fila=$consulta->fetch();

   $TituloReunion = $fila['Titulo'];
   $Fecha =$fila['Fecha'];
   $Universidad = $fila['Universidad'];
   $IDUniversidad = $fila['ID_Empresa'];
   $Ciclo = $fila['ID_Ciclo'];
   $estado = $fila['Estado']; 
   $tipo = $fila['Tipo'];  
   $place = $fila['Lugar']; 
 }


}// Fin del consulta del if   
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Actualizar Reunión | FGK</title>
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" type="text/css" href="../../css/EstiloCrearCuentas.css">
    <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Estilo css CrearCuentas-->
    <link rel="stylesheet" type="text/css" href="css/EstiloCrearCuentas.css">
    <link rel="shortcut icon" href="../img/WorkeysIcon.png" />
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--<script src="../../js/NombreReunionActualizar.js" >-->


</script>

<body class="container">
    <br><br><br><br>

    <div class="card">
        <div class="card-header">
            <b>Actualizar Reunión</b>
        </div>
        <div class="card-body">
            <!--Contenido de la caja de crear Cuentas de alumnos Formulario-->
            <div class="card-body px-lg-5 pt-0">
                <!--Inicio del Formulario-->
                <form action="../../Modelo/ModeloReunion/ActualizarReunion.php" method="POST" accept-charset="utf-8">
                    <input type="hidden" name="idReunion" value="<?php echo $id ?>">
                    <br>
                    <div id="alerta2"></div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="NombreReunion" value="<?php echo $TituloReunion ?>"
                                    name="NombreReunion" class="form-control" placeholder="Nombre de la reunión"
                                    >
                                <label for="materialRegisterFormLastName">Titulo Reunión </label>
                            </div>
                        </div>

                        <div class="col">
                            <!-- Last name -->
                            <div class="md-form">
                                <input type="date" id="fecha" name="fecha" value="<?php echo $Fecha ?>"
                                    class="form-control" placeholder="Nombre Completo">
                                <label for="materialRegisterFormLastName">Fecha</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="Lugar" value="<?php echo $place ?>" name="Lugar"
                                    class="form-control" placeholder="Especifique el lugar">
                                <label for="materialRegisterFormLastName">Lugar/Plataforma</label>
                            </div>
                        </div>
                        <div class="col">

                            <!-- Last name -->
                            <div class="md-form">
                                <select id="idCICLO" name="idCICLO" class="form-control" blocked>
                                    <option value="<?php echo $Ciclo ?>" selected><?php echo $Ciclo ?></option>
                                    <?php     
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
                    </divs>


                    <div class="form-row">
                        <div class="col">
                            <div class="md-form">
                                <select type="text" id="tipo" name="tipo" class="form-control">
                                    <option value="<?php echo $tipo ?>" selected> <?php echo $tipo ?></option>
                                    <option value="Charla Informativa">Charla Informativa</option>
                                    <option value="Taller">Taller</option>
                                    <option value="Reunión General">Reunión General</option>
                                    <option value="Otro">Otro</option>

                                </select>
                                <label for="materialRegisterFormLastName">Tipo de Reunión</label>
                            </div>
                        </div>

                        <div class="col">
                            <!-- Last name -->
                            <div class="md-form">
                                <select type="text" id="estado" name="estado" class="form-control">
                                    <option value="<?php echo $estado ?>" selected> <?php echo $estado ?> </option>
                                    <option value="Activo">Activo</option>
                                    <option value="Finalizado">Finalizar</option>
                                </select>
                                <label for="materialRegisterFormLastName">Estado</label>
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-light btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"
                        name="ActualizarReunion" value="Actualizar Reunión" id="Actualizar_Reunion">
                    <hr>
                </form>
                <!-- Fin del Formulario -->
                <a href="../../LIS-Reunion.php" title="Regresar atras" style="color: white;">Regresar</a>
            </div>
            <!--Fin de la caja contendora Formulario-->
        </div>
    </div>
    </div>



</body>

</html>