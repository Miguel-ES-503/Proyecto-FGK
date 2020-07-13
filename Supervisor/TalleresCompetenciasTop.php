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
                            
                           echo " <a href='ReporteCompetencias.php'><button type='button' class='btn btn-light' style='background-color: #D9DEDE'><div class='fas fa-angle-left' ></div>Regresar</button></a>";
                           
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
			include 'Modelo/CargarTalleresCompetenciasTop.php'?>

                </tbody>

            </table>

            <!--/div-->
            <!--Fin de la caja responsivo de la tabla-->
        </div>
    </div>
<?php 

    /*<div class="TablaTalleres">
        <div class="card" style="margin: 3%;">
          <div class="card-header"> 
          <p style="font-size: 25px;">Talleres impartidos</p>      
          </div>
            <div class="card-body" style="margin: 0% 2.5% 2.5% 2.5%;">               
             <div class="table-responsive">
                <table id="example" class="table table-responsive " style="text-align: center;">
                    <thead class="table-responsive">
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Sede</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Comentarios</th>
                        </tr>
                    </thead>                
                    <tbody>
                       <?php
				          require_once 'Modelo/CargarTalleres.php';
				         // echo $id=$_GET['id'];
				          ?>
    </tbody>
    </table>
        </div>
        <!--Fin de la caja responsivo de la tabla-->
        </div>
        </div>*/
?>
</div>

<!--Finaliza estrucutra de trabajo-->


<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>