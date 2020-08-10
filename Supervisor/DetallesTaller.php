<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>

<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php


if (isset($_GET['id'])) {
	
	$id=$_GET['id'];
    $id2 = $_GET['id2'];
    $id3 = $_GET['id3'];
    $id4 = $_GET['id4'];
    $id5 = $_GET['id5'];
    $id6 = $_GET['id6'];
    $id7 = $_GET['id7'];

	$consulta=$pdo->prepare("SELECT  ID_Taller ,Titulo , Fecha , Hora, F.Nombre AS 'Tipo' ,ID_Sede , ID_Ciclo, E.Nombre AS Empresa ,Estado , ComprobanteLista FROM talleres T INNER JOIN formatotalleres F on T.ID_Formato = F.ID_Formato LEFT JOIN empresas E on T.ID_Empresa = E.ID_Empresa WHERE ID_Taller = :ID_Taller");
	$consulta->bindParam(":ID_Taller",$id);
	$consulta->execute();

	$consulta2=$pdo->prepare("SELECT a.ID_Alumno, a.Nombre , T.Titulo , Asistencia ,IT.ID_Taller FROM inscripciontalleres IT INNER JOIN alumnos a on IT.ID_Alumno = a.ID_Alumno LEFT JOIN talleres T on IT.ID_Taller = T.ID_Taller  WHERE  IT.ID_Taller = ?");
	$consulta2->execute(array($id));


	
}


?>


<title>Detaller del Taller</title>
<style type="text/css" media="screen">
.file-upload input[type='file'] {
    display: none;
}
</style>
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
    <!--Navbar-->
    <nav class="navbar navbar-expand-sm bg-light navbar-light">

       

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
                            
                           echo " <a href='Comentarios.php?id=".$id."&id2=".$id2."&id3=".$id3."&id4=".$id4."&id5=".$id5."&id6=".$_GET['id6']."&id7=".$_GET['id7']."'><button type='button' class=' btn btn-light' style='background-color: #D9DEDE'><div class='fas fa-angle-left' ></div> Regresar</button></a>";
                           
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

    <div>
        <?php include 'Modularidad/Alerta.php'?>
    </div>

    <br>



    
        <?php if ($consulta->rowCount() >=0) {$fila=$consulta->fetch()?>
        <br>

        <div class="text-justify ">


            <div class="card text-center">
                <div class="card-header">
                    <h5 style="color: black;">Detalles del taller</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 mb-3 mb-md-0">
                            <div class="card">
                                <div class="card-body">

                                    <p class="mb-4" style="text-align:center;"><b>Identificación: </b>
                                        <?php echo $fila['ID_Taller']; ?><br>
                                        <b>Tema: </b><?php echo$fila['Titulo'];?><br>
                                        <b>Fecha: </b> <?php echo$fila['Fecha'];?>
                                        <b>Hora:</b> <?php echo$fila['Hora'];?><br>
                                        <b>Cargo: </b> <?php echo$fila['Empresa'];?><br>
                                        <b>Tipo: </b><?php echo$fila['Tipo'];?>
                                        <b>Sede: </b><?php echo$fila['ID_Sede'];?> <br>
                                        <b>Ciclo: </b><?php echo$fila['ID_Ciclo'];?> </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-4"><b>Estado: </b> <?php echo$fila['Estado'];}?></p>


                                    <p class="card-text"><b>Objetivo:</b></p>
                                    <?php

							$consulta3=$pdo->prepare("SELECT * FROM objetivostaller WHERE ID_Taller = ?");
							$consulta3->execute(array($id));
							$DetalleObjetivo ='';

							if ($consulta3->rowCount() >=0) 
							{
								$fila3=$consulta3->fetch();
								$DetalleObjetivo = $fila3['Objetivo'];
							} 
							?>

                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"
                                            disabled><?php echo$DetalleObjetivo ?></textarea>
                                    </div>
                                    <p class="card-text"><b>Competencia:</b></p>
                                    <?php 

							$consulta4=$pdo->prepare("SELECT IDTaller_Competencia , ID_Taller , COM.Nombre FROM tallercompetencia TC INNER JOIN competencias COM ON TC.IDComptenecia = COM.IDComptenecia WHERE ID_Taller = :ID_Taller ");
							$consulta4->bindParam(":ID_Taller",$id);
							$consulta4->execute();

							?>
                                    <ul class="float-left" style="text-align: left;">
                                        <?php 

								if ($consulta4->rowCount()>=1)
								{
									while ($fila4=$consulta4->fetch())
									{		
										echo "<li style='color: black;'>".$fila4['Nombre']."</li>";
									}
								}
								?>
                                    </ul>


                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Taller Finalizado
                </div>
            </div>

        </div>
        <div class="table-responsive">
        <div class="CargarComentarios">
            <?php
            require_once 'Modelo/CargarComentarios.php';

            ?>
        </div>
    </div>
    
                                
    <br><br>






    <br><br>

    <?php
//Incluir el footer
				include 'Modularidad/PiePagina.php';
				?>