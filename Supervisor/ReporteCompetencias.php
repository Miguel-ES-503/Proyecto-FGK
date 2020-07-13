<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>

<title>Competencias por mes</title>

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
                        <select class="browser-default custom-select" name="Meses" onchange="">
                            <option value="January" class="dropdown-item">Enero</option>
                            <option value="February" class="dropdown-item">Febrero</option>
                            <option value="March" class="dropdown-item">Marzo</option>
                            <option value="April" class="dropdown-item">Abril</option>
                            <option value="May" class="dropdown-item">Mayo</option>
                            <option value="June" class="dropdown-item">Junio</option>
                            <option value="July" class="dropdown-item">Julio</option>
                            <option value="August" class="dropdown-item">Agosto</option>
                            <option value="September" class="dropdown-item">Septiembre</option>
                            <option value="October" class="dropdown-item">Octubre</option>
                            <option value="November" class="dropdown-item">Noviembre</option>
                            <option value="December" class="dropdown-item">Diciembre</option>
                            <?php 
                       
                                if (isset($_POST['Meses']) != Null) {
                                    $TU = $_POST['Meses'];
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>".$TU."</option>";
                                   
                                } 
                                else{
                                     echo "<option class='dropdown-item' selected disabled style='display:none'>Mes</option>";
                                }
                            
                                
                                ?>
                        </select>

                        <!--input id='txtMeses' value="<?php //echo $FMeses?>" class="form-control" type="text"
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
                        if (isset($_POST['Meses'])) {
                        $GLOBALS['FMeses'] = $_POST['Meses'];//Variable Global para usar en el filtro

                        
                        //echo $TU; 

                    }
                    if (isset($_POST['Sedes'])) {
                        $GLOBALS['FSedes'] = $_POST['Sedes'];
                            //echo $T; 
                    }
                    if (isset($_POST['Year'])) {
                        $GLOBALS['FYear'] = $_POST['Year'];
                            //echo $T; 
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
			include 'Modelo/CargarCompetenciasTop.php'?>

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