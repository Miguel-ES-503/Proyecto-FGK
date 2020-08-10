<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>

<title>Talleres por competencias top</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->

<div class="container-fluid text-center">
    <!--Navbar-->
    <nav class="navbar navbar-expand-sm bg-light navbar-light" style="margin: 1%;">

     

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
                <?php

                echo " <a href='ReporteCompetenciasFecha.php'><button type='button' class='btn btn-light' style='background-color: #D9DEDE'><div class='fas fa-angle-left' ></div>Regresar</button></a>";

                ?>
                <a class="navbar-brand">  </a>
                        <a class="navbar-brand">    Detalles del Taller</a>
            </li>

        </ul>
        <!-- Links -->
    </div>
    <!-- Collapsible content -->
</nav>
<!--/.Navbar-->

<div class="card" style="margin: 3%;">
    <div class="card-header">
        <p style="font-size: 25px;"> Lista de talleres <?php  //echo $ubicacion ?></p>
    </div>
    <div class="card-body">
        <!--div class="table-responsive"-->
        <table id="example" class="table table-responsive">
            <thead class="table-secondary ">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>

                    <th scope="col">Sede</th>
                    <th scope="col">Tipo</th>

                </tr>
            </thead>


            <tbody>

                <?php 
			         // Consulta De La BASE DE DATOS
                $consulta=$pdo->prepare("   SELECT A.Titulo as 'Titulo', A.Fecha as 'Fecha',S.Nombre as 'Sede',F.Nombre as 'Tipo'
                    from tallercompetencia T
                    INNER JOIN talleres A
                    ON T.ID_Taller = A.ID_Taller
                    INNER JOIN sedes S
                    ON A.ID_Sede = S.ID_Sede
                    INNER JOIN formatotalleres F
                    ON F.ID_Formato = A.ID_Formato
                   WHERE A.ID_Sede = ? AND (A.Fecha BETWEEN ? AND ?) AND T.IDComptenecia = ?
                    ");
                $Sede = $_GET['id'];
                $Date1 = $_GET['id2'];
                $Date2 = $_GET['id3'];
                $IdC = $_GET['id4'];

                setlocale(LC_TIME, 'es_SV.UTF-8');
                $consulta->execute(array($Sede,$Date1,$Date2,$IdC));

                if ($consulta->rowCount()>=0)
                {
                    while ($fila=$consulta->fetch())
                    {   
                        echo "
                        <tr class='table-light'>
                        <td>".$fila['Titulo']."</td> 
                        <td>".$fila['Fecha']."</td> 
                        <td>".$fila['Sede']."</td> 
                        <td>".$fila['Tipo']."</td> 
                        </tr>
                      "; 
                    }
                }
                ?>

            </tbody>

        </table>

        <!--/div-->
        <!--Fin de la caja responsivo de la tabla-->
    </div>
</div>
<?php
//Incluir el footer
    include 'Modularidad/PiePagina.php';
    ?>