<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>

<title>Lista alumnos por taller</title>

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


    <br>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Reporte de alumno</a>

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



    <div class="card" style="margin: 3%;">
        <div class="card-header">
            <p style="font-size: 25px; color: black; "> Lista de talleres asistidos por alumnos <?php  //echo $ubicacion ?></p>
        </div>
        <div class="card-header">
            <p style="font-size: 25px; text-align:  left; display: inline-block;margin-right:  15px; color: black;">Cambiar estado a
                graduado:</p>
            <button type="button" class="btn btn-info" onclick="UpdateEstado();" style="">Cambiar</button>

            <p style="font-size: 25px; text-align:  left; display: inline-block;margin-left:   25px; color: black">Seleccionar todos:
            </p>
            <input id="todos" type='checkbox'  style="margin-left: 8px; transform: scale(1.5);
        }">

        </div>
        <div class="card-body">
            <!--div class="table-responsive"-->
            <form action="Modelo/ActualizarEstadoAlumno.php" method="POST" id="FormGraduados">
                <table id="tableUser2" class="table ">
                    <thead class="table-secondary ">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Class</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Total</th>
                            <th scope="col">Actualizar</th>


                        </tr>
                    </thead>


                    <tbody>

                        <?php 
                                $GLOBALS['id'] =  $_GET['id'];
                                $consulta1=$pdo->prepare("SELECT  A.Nombre as 'Nombre',A.ID_Alumno as 'Id', A.Class as 'Class',A.Estado as 'Estado',TotalTalleres as 'Total'
                                    from alumnos A
                                   where TotalTalleres  >= 40 and Estado = 'Activo' ");//Este es el numero minimo de asistencia que debe tener

                    $consulta1->execute();//Asistencia real

                    $conteo1;

                    if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
                    {
                        while ($fila=$consulta1->fetch())
                        {       
                            echo "
                            <tr class='table-light'>
                            <td>".$fila['Nombre']."</td>
                            <td>".$fila['Class']."</<td>
                            <td>".$fila['Estado']."</<td> 
                            <td>".$fila['Total']."</<td> ";
                            echo " <td><input class='case' type='checkbox' name='IdAlumno[]' value=".$fila['Id']."></td>
                            </tr>"; 
                        }
                    }
                    ?>
                    </tbody>

                </table>
            </form>
            <!--/div-->
            <!--Fin de la caja responsivo de la tabla-->
          
            <script type="text/javascript">

            $("#todos").on("click", function() {//SI el checkbox grande con id todos se selecciona, marca checked a todos los
                                                //checkbox de clase case
                $(".case").prop("checked", this.checked);
            });

            // if all checkbox are selected, check the selectall checkbox and viceversa  
            $(".case").on("click", function() {
                if ($(".case").length == $(".case:checked").length) {
                    $("#todos").prop("checked", true);
                } else {
                    $("#todos").prop("checked", false);
                }
            });

            function UpdateEstado() {
                document.getElementById('FormGraduados').submit();






                //Llamar un .php y pasarle datos*****NO HACE NADA EN EL PROYECTO
                $.ajax({
                    type: 'POST', //aqui puede ser igual get
                    // url: 'Modelo/ActualizarEstadoAlumno.php',//aqui va tu direccion donde esta tu funcion php
                    // data: {id:1,otrovalor:'valor'},//aqui tus datos
                    success: function(data) {
                        //  alert(data);
                    },
                    error: function(data) {
                        //lo que devuelve si falla tu archivo mifuncion.php
                    }
                });

            }
            </script>
        </div>
    </div>

</div>

<!--Finaliza estrucutra de trabajo-->


<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>