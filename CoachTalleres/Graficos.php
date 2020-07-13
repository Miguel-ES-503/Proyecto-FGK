<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>

<title>Lista de talleres</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->

<div class="container-fluid text-center">

    <br>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Reporte De Talleres</a>

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
                <a class="nav-link active" href="Graficos.php">Reporte Por Taller</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="ReporteFecha.php">Fecha</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ReporteMensual.php">Mes</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ReporteCiclo.php">Ciclo</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ReporteAlumno.php">Por alumno</a>
            </li>
        </ul>
        <!-- Links -->   
    </div>
    <!-- Collapsible content -->
</nav>
<br>

    <div class="card">
        <div class="card-header">
            Lista de talleres
        </div>
        <div class="card-body">
            
                <div class="table-responsive">
        <table  id="example" class="table table-hover table-sm table-bordered table-fixed" >
            <thead class="table-secondary">
                <tr>  
                       <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Sede</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Comentarios</th> 
                </tr>
            </thead>
            <tfoot class="table-secondary">
                <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Sede</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Comentarios</th>
                    
                </tr>
            </tfoot>

            <tbody>

            <?php   require_once 'Modelo/CargarTalleres.php';  ?>

            </tbody>        
        </table>  

    </div> <!--Fin de la caja responsivo de la tabla-->
        </div>
    </div>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>