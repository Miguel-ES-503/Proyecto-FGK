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
    <?php 
include 'Modularidad/Menu.php';
?>

    <div class="card" style="margin: 3%;">
        <div class="card-header">
            <p style="font-size: 25px;"> Lista de talleres <?php  //echo $ubicacion ?></p>
        </div>
        <div class="card-body">
            <!--div class="table-responsive"-->
           

                <table id="example" class="row-border hover order-column" width="100%">
                    <thead>
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

                    <!--thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Sede</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Comentarios</th>
                        </tr>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Office</th>
                            <th scope="col">Age</th>
                            <th scope="col">Start date</th>
                            <th scope="col">Salary</th>

                        </tr>
                    </thead-->
                    <tbody>
                       
                        <?php 
			               include 'Modelo/CargarTalleres.php'?>

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