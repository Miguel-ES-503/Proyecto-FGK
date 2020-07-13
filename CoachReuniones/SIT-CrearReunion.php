<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>FGK | Crear Reunión</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<script src="js/NombreReunion.js" >


</script>

<link rel="stylesheet" type="text/css" href="css/Crear-Reunion.css">
<div class="title">
    <img src="../img/back.png" class="icon">
    <h2 class="main-title" >Reuniones</h2>
    <div class="title2">
        <br>
    <div class="title2-text">
    <a href="LIS-Reunion.php" style="text-decoration: none;"><p><img src="../img/Ver.png" class="icon-2">Ver Reuniones</p></a>
    
</div>
</div>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid ">
    <br>
    <!--Navbar-->
    <!--/.Navbar-->
    <div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
    <!--/.Navbar-->
    <br>
    <div >
        <div>
            <p  class="title-1">Nueva Reunión</p>
            <span class="float-right">
            </span>
        </div>
        <div>
            <!--Contenido de la caja de crear Cuentas de alumnos Formulario-->
            <div id="main-body">
                <!--Inicio del Formulario-->
                <form class="text-center" action="Modelo/ModeloReunion/GuardarDatosReu.php" method="POST">
                    <br>
                    <div id="alerta2"></div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="NombreReunion" name="NombreReunion" class="form-control"
                                    placeholder="Nombre de la reunión" readonly>
                                <label for="materialRegisterFormLastName">Titulo Reunión</label>
                            </div>
                        </div>

                        <div class="col">
                            <!-- Last name -->
                            <div class="md-form">
                                <input type="date" id="fecha" name="fecha" class="form-control"
                                    placeholder="Nombre Completo" required>
                                <label for="materialRegisterFormLastName">Fecha</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">  
                        <div class="col">
                            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
                            <div class="md-form">
                                <select id="idempresa" name="idempresa" class="form-control" required>
                                    <?php     
                                  echo '<option value="0" disabled selected >Seleccione la opción</option>';
                                  foreach($pdo->query("SELECT * FROM  empresas  WHERE  Tipo =  'Universidad' ORDER by nombre asc") as $row) 
                                  {
                                    echo '<option value="'.$row['ID_Empresa'].'">'.utf8_encode($row['Nombre']).'</option>';
                                  }
                                  echo '</select>';
                                  ?>
                                    <label for="materialRegisterFormFirstName">Universidad</label>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <div class="md-form">
                                <select id="idCICLO" name="idCICLO" class="form-control" required>
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
                    <div class="form-row">
                            <!--Para recibir el lugar-->
                          <div class="col">
                          <div class="md-form">
                                <input type="text" id="Lugar" name="Lugar" class="form-control"
                                    placeholder="Especifique el lugar" required>
                                <label for="materialRegisterFormLastName">Lugar/Plataforma</label>
                            </div>
                          </div>
                        <div class="col">
                            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
                            <div class="md-form">
                                <select type="text" id="tipo" name="tipo" class="form-control" required>
                                    <option value="" disabled selected>Seleccione la opción</option>
                                    <option value="Charla Informativa">Charla Informativa</option>
                                    <option value="Taller">Taller</option>
                                    <option value="Reunión General">Reunión General</option>
                                    <option value="Otro">Otro</option>

                                </select>
                                <label for="materialRegisterFormFirstName">Tipo de reunión</label>
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-light btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"
                        name="Guardar_Reunion" value="Crear Reunión" id="Guardar_Reunion">
                    <hr>
                </form>
                <!-- Fin del Formulario -->
            </div>
            <!--Fin de la caja contendora Formulario-->
        </div>
    </div>
</div>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>