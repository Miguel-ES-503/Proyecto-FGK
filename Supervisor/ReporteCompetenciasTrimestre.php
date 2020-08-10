<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>

<title>Competencias por trismestre</title>

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
                    <div class="col-sm" style="margin:1%;">
                        <select class="browser-default custom-select" name="Trimestre">
                            <option value="1" class="dropdown-item">Trimestre 1</option>
                            <option value="2" class="dropdown-item">Trimestre 2</option>
                            <option value="3" class="dropdown-item">Trimestre 3</option>
                            <option value="4" class="dropdown-item">Trimestre 4</option>
                               <?php 
                              if (isset($_POST['Trimestre']) != Null) {
                                    if ($_POST['Trimestre'] == '1') {
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>Trimestre 1</option>";
                                }elseif($_POST['Trimestre'] == '2'){
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>Trimestre 2</option>";
                                }elseif($_POST['Trimestre'] == '3'){
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>Trimestre 3</option>";
                                }
                                else{
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>Trimestre 4</option>";
                                } 
                                   
                                } 
                                else{
                                     echo "<option class='dropdown-item' selected disabled style='display:none'>Trimestre</option>";
                                }
                                ?>
                        </select>
                    </div>
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
                        <select class="browser-default custom-select" name="Sedes" onchange="">
                            <option value="SSFT" class="dropdown-item">San Salvador</option>
                            <option value="SAFT" class="dropdown-item">Santa Ana</option>
                            <option value="AHFT" class="dropdown-item">Ahuchapan</option>
                            <option value="SMFT" class="dropdown-item">San Miguel</option>
                            <?php 
                            if (isset($_POST['Sedes']) != Null) {
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
                         }
                         ?>
                     </select>
                    </div>
                 <div class="col-sm" style="margin: 1%;">
                    <button id="btnEnviarForm" onclick="submitformM()" class="btn btn-warning  btn-block">
                    Filtrar</button>
                </div>
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
                    if (isset($_POST['Year'])) {
                        $GLOBALS['FYear'] = $_POST['Year'];//Variable Global para usar en el filtro
                    }
                    if (isset($_POST['Sedes'])) {
                        $GLOBALS['FSedes'] = $_POST['Sedes'];
                    }
                    if (isset($_POST['Trimestre'])) {
                        if ($_POST['Trimestre'] == 1) {
                            $GLOBALS['FTrimestre1'] = '1';
                            $GLOBALS['FTrimestre2'] = '3';
                        }elseif($_POST['Trimestre'] == 2){
                                 $GLOBALS['FTrimestre1'] = '4';
                            $GLOBALS['FTrimestre2'] = '6';
                        }elseif($_POST['Trimestre'] == 3){
                                 $GLOBALS['FTrimestre1'] = '7';
                            $GLOBALS['FTrimestre2'] = '9';
                        }else{
                            $GLOBALS['FTrimestre1'] = '10';
                            $GLOBALS['FTrimestre2'] = '12';
                        }
                        

                    }
                    ?>
                </div>



                <!--Fin del btnFiltroSedes-->
          
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
                                where Month(A.Fecha) >= ? AND Month(A.Fecha) <= ? AND A.ID_Sede = ? AND Date_Format(A.Fecha,'%Y') = ?                             
                                GROUP BY (C.Nombre) ASC LIMIT 5");

                    $consulta1->execute(array($FTrimestre1,$FTrimestre2,$FSedes,$FYear));//Asistencia real

                    $conteo1;

                    if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
                    {
                        while ($fila=$consulta1->fetch())
                        {       
                            echo "
                            <tr class='table-light'>
                            <td>".utf8_encode($fila['Nombre'])."</td>
                            <td>".$fila['Total']."</<td> 
                            <td><a href='TalleresCompetenciasTopTrimestre.php?id=".$FYear."&id2=".$FSedes."&id3=".$FTrimestre1."&id4=".$FTrimestre2."&id5=".$fila['IdC']."' data-toggle='popover' data-trigger='hover' data-content='Lista de talleres.' data-placement='right' > <button  class='fa fa-list  btn btn-info'    type='button'  >
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