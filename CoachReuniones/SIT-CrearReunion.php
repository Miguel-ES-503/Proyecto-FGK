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

<!--<script src="js/NombreReunion.js">-->
</script>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/Crear-Reunion.css">
<link rel="stylesheet" type="text/css" href="css/Menu.css">
<nav class="navbar navbar-expand-lg navbar-light" id="row">
    <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
    <a class="navbar-brand" id="T1">Reuniones</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item" id="bloque">
                <a class="nav-link text-center justify-content-center" href="LIS-Reunion.php"><svg width="2em"
                        height="1.5em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" style="margin-top: -2px;">
                        <path fill-rule="evenodd"
                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                        <path fill-rule="evenodd"
                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                    </svg>Ver Reuniones</a>
            </li>
        </ul>
    </div>
</nav>
<!--<div class="title div0 ">
    <img src="../img/back.png" class="icon">
    <h2 class="main-title div1" >Reuniones</h2> 
    <div class="title2">
        <br>
    <div class="title2-text ">
    <a href="LIS-Reunion.php" class="text-decoration-none div2 " ><p><img src="../img/Ver.png" class="icon-2">Ver Reuniones</p></a>
</div>
</div>
</div>-->
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid ">
    <br>
    <!--Navbar-->
    <!--/.Navbar-->
    <div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
    <!--/.Navbar-->
    <br>
    <div>
        <div>
            <p class="title-1">Nueva Reunión</p>
            <span class="float-right">
            </span>
        </div>
        <div>
            <!--Contenido de la caja de crear Cuentas de alumnos Formulario-->

            <div id="main" class="w-100">
                <form class="text-center m-3" action="Modelo/ModeloReunion/GuardarDatosReu.php" method="POST">
                    <div id="alerta2"></div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                            <div class="Imfo">
                                <label for="materialRegisterFormLastName">Titulo Reunión</label>
                                <input type="text" id="NombreReunion" value="Reunion " name="NombreReunion" class="form-control"
                                    >
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                            <div class="Imfo">
                                <label for="materialRegisterFormLastName">Fecha</label>
                                <input type="date" id="fecha" name="fecha" class="form-control"
                                    placeholder="Nombre Completo" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                            <div class="Imfo">
                                <label for="materialRegisterFormFirstName">Tipo de reunión</label>
                                <select type="text" id="tipo" name="tipo" class="form-control" required>
                                    <option value="" disabled selected>Seleccione la opción</option>
                                    <option value="Charla Informativa">Charla Informativa</option>
                                    <option value="Taller">Taller</option>
                                    <option value="Reunión General">Reunión General</option>
                                    <option value="Sesión individual">Sesión individual</option>
                                    <option value="Otro">Otro</option>

                                </select>
                            </div>

                        </div>
                        <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                            <div class="Imfo">
                                <label for="materialRegisterFormFirstName">Ciclo</label>
                                <select id="idCICLO" name="idCICLO" class="form-control" required>
                                    <?php
                                        echo '<option value="" disabled selected >Seleccione la opción</option>';
                                        foreach($pdo->query("SELECT * FROM ciclos") as $row)
                                        {
                                          echo '<option value="'.$row['ID_Ciclo'].'">'.$row['ID_Ciclo'].'</option>';
                                        }
                                        echo '</select>';
                                                          ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                            <div class="Imfo">
                                <label for="materialRegisterFormLastName">Lugar/Plataforma</label>
                                <input type="text" id="Lugar" name="Lugar" class="form-control"
                                    placeholder="Especifique el lugar" required>

                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                            <div class="Imfo">
                                <label for="materialRegisterFormLastName">Encargado</label>
                                <select type="text" id="encargado" name="encargado" class="form-control" required>
                                    <option value="" disabled selected>Seleccione la opción</option>
                                    <option value="Ónix Landaverde">Ónix Landaverde</option>
                                    <option value="Cristina Guerrero">Cristina Guerrero</option>
                                    <option value="Rogelio Gonzalez">Rogelio Gonzalez </option>
                                    <option value="Geo Albanés">Geo Albanés</option>
                                </select>
                            </div>
                        </div>
                       
                        <input class="bot btn btn-light btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"
                            name="Guardar_Reunion" value="Crear Reunión" id="Guardar_Reunion">
                    </div>

                </form>

            </div>

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