<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>

<title>Competencias ciclo</title>

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
include 'Modularidad/MenuCompetencias.php';
?>
   
    <div class="card" style="margin: 3.5%;  ">
        <div class="dropdown">
            <form id="form" action="" method="POST">
                <div class="row">
                    <div class="col-sm" style="margin: 1%;">
                        <select class="browser-default custom-select" name="Ciclos" onchange="">
                            <?php 
                            require_once 'Modelo/CargarCiclos.php';
                            ?>
                            <?php 

                            if (isset($_POST['Ciclos']) != Null) {
                                $TU = $_POST['Ciclos'];
                                echo "<option class='dropdown-item' selected disabled style='display:none'>".$TU."</option>";

                            } 
                            else{
                                echo "<option class='dropdown-item' selected disabled style='display:none'>Ciclo</option>";
                            }


                            ?>
                        </select>

                        <!--input id='txtMeses' value="<?php echo $FMeses?>" class="form-control" type="text"
                            placeholder="Default input" style="width: 35%; margin-top: 5%;"-->

                        </div>
                    <!--div class="col-sm" style="margin: 1%;">
                        <select class="browser-default custom-select" name="Sedes" onchange="">
                            <option value="SSFT" class="dropdown-item">San Salvador</option>
                            <option value="SAFT" class="dropdown-item">Santa Ana</option>
                            <option value="AHFT" class="dropdown-item">Ahuchapan</option>
                            <option value="SMFT" class="dropdown-item">San Miguel</option>


                            <?php 
                               /*if (isset($_POST['Sedes']) != Null) {
                                if ($_POST['Sedes'] == 'SSFT') {
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>San Salvador</option>";
                                }elseif($_POST['Sedes'] == 'SAFT'){
                                        echo "<option class='dropdown-item' selected disabled style='display:none'>Santa Ana</option>";
                                }elseif($_POST['Sedes'] == 'AHFT'){
                                        echo "<option class='dropdown-item' selected disabled style='display:none'>Ahuchapan</option>";
                                }
                                else{
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>San Miguel</option>";
                                }                                                                                                         
                                } 
                                else{
                                     echo "<option class='dropdown-item' selected disabled style='display:none'>Sede</option>";
                                }*/
                                ?>
                            </select-->
                    <!--input id='txtMeses' value="<?php //echo $FSedes?>" class="form-control" type="text"
                        placeholder="Default input" style="width: 35%; margin-top: 5%;"-->
                        <!--/div-->
                        <div class="col-sm" style="margin: 1%;">
                            <select class="browser-default custom-select" name="Year">
                                <?php 
                                require_once 'Modelo/CargarAnos.php';
                                ?>
                                <?php 
                                if (isset($_POST['Year']) != Null) {
                                    $TU = $_POST['Year'];
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>".$TU."</option>";

                                } 
                                else{
                                   echo "<option class='dropdown-item' selected disabled style='display:none'>Año</option>";
                               }
                               ?>
                           </select>

                       </div>
                       <div class="col-sm" style="margin: 1%;">
                        <button id="btnEnviarForm" onclick="submitformM()" class="btn btn-warning  btn-block">
                        Filtrar</button>
                    </div>
                </div>
            </form>

            <!--a class="dropdown-item" href="javaScript:Meses(4)" value="San">Enereo </a-->
            <script>
                function submitformM() {
                    document.getElementById('form').submit();

                }
            </script>

            <?php
            if (isset($_POST['Ciclos'])) {
                        $GLOBALS['FCiclos'] = $_POST['Ciclos'];//Variable Global para usar en el filtro

                    }
                    if (isset($_POST['Sedes'])) {
                        $GLOBALS['FSedes'] = $_POST['Sedes'];

                    }
                    if (isset($_POST['Year'])) {
                        $GLOBALS['FYear'] = $_POST['Year'];

                    }
                    ?>
                </div>



                <!--Fin del btnFiltroSedes-->
            </div>
            <div class="card" style="margin: 3%;">
                <div class="card-header">
                    <p style="font-size: 25px;"> Lista de competencias <?php  //echo $ubicacion ?></p>
                </div>
                <div class="card-body">
                    <!--div class="table-responsive"-->
                    <table id="example2" class="table ">
                        <thead class="table-secondary ">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Total</th>
                                <th scope="col">Talleres</th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php 
                            $GLOBALS['id'] =  $_GET['id'];
                            $consulta1=$pdo->prepare("SELECT C.Nombre as 'Nombre',C.IDComptenecia as 'IdC', COUNT(T.ID_Taller) as  'Total'
                                        FROM tallercompetencia T
                                        INNER JOIN competencias C
                                        ON T.IDComptenecia = C.IDComptenecia
                                        INNER JOIN talleres A
                                        ON T.ID_Taller = A.ID_Taller
                                        WHERE A.ID_Ciclo = ? AND Date_Format(A.Fecha,'%Y') = ?
                                        GROUP BY (C.Nombre) ASC LIMIT 5");

                    $consulta1->execute(array($FCiclos,$FYear));//Asistencia real

                    $conteo1;

                    if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
                    {
                        while ($fila=$consulta1->fetch())
                        {       
                            echo "
                            <tr class='table-light'>
                            <td>".utf8_encode($fila['Nombre'])."</td>
                            <td>".$fila['Total']."</<td> 
                            <td><a href='TalleresCompetenciasTopCiclo.php?id=".$fila['IdC']."&id2=".$FCiclos."&id3=".$FYear."' data-toggle='popover' data-trigger='hover' data-content='Lista de talleres.' data-placement='right' > <button  class='fa fa-list  btn btn-info'    type='button'  >
                </button> </a></td></tr>"; 
                        }
                    }
                        ?>

                    </tbody>

                </table>

                <!--/div-->
                <!--Fin de la caja responsivo de la tabla-->
            </div>
        </div>


        <!--Finaliza Consulta para traer los datos -->
    </div>

    <!--Finaliza estrucutra de trabajo-->


    <?php
//Incluir el footer
    include 'Modularidad/PiePagina.php';
    ?>