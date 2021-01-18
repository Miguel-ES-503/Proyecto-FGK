<?php require_once 'templates/head.php'; ?>
<title>Indicaciones retiro</title>
<link rel="stylesheet" href="assets1/css1/style.css">
<?php  
 
 //Manda  allamar plantillas
 require_once 'templates/header.php';

 //require_once 'templates/MenuVertical.php';

 require_once 'templates/MenuHorizontal.php';

 require '../Conexion/conexion.php';
 $idMateria = $_GET['id']; 
 $idAlumno = $_GET['idAlumno'];
?>
<!--div principal-->
<div class="container-fluid text-center">
    <div class="title">
        <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
        <h2 class="main-title">Retiro materias</h2>
        <br>
    </div>
    <div>
        <div>
            <div class="container w-50 mx-auto bg-light" style="background: white;">
                <br>
                <!--Primera columna-->
                <form action="Modelo/ModeloRetiro/retirarMateria.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="float-left">Materia a retirar:
                            <b><?php echo $materia = $_GET['materia'];?></b></label>
                    </div><br><br>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2" class="float-left">Ciclo actual:</label>
                        <select class="form-control" name="ciclo" id="exampleFormControlSelect1">
                              <!-- año 2015 -->
                              <option disabled>2015</option>
                            <option value="Ciclo 01-2017">Ciclo 01-2015</option>
                            <option value="Ciclo 02-2017">Ciclo 02-2015</option>
                            <option value="Ciclo 03-2017">Ciclo 03-2015</option>
                            <!-- año 2016 -->
                            <option disabled>2016</option>
                            <option value="Ciclo 01-2017">Ciclo 01-2016</option>
                            <option value="Ciclo 02-2017">Ciclo 02-2016</option>
                            <option value="Ciclo 03-2017" title="Interciclo">Ciclo 03-2016</option>
                            <!-- año 2017 -->
                            <option disabled>2017</option>
                            <option value="Ciclo 01-2017">Ciclo 01-2017</option>
                            <option value="Ciclo 02-2017">Ciclo 02-2017</option>
                            <option value="Ciclo 03-2017" title="Interciclo">Ciclo 03-2017</option>
                            <!-- año 2018 -->
                            <option disabled>2018</option>
                            <option value="Ciclo 01-2018">Ciclo 01-2018</option>
                            <option value="Ciclo 02-2018">Ciclo 02-2018</option>
                            <option value="Ciclo 03-2018" title="Interciclo">Ciclo 03-2018</option>
                            <!-- año 2019 -->
                            <option disabled>2019</option>
                            <option value="Ciclo 01-2019">Ciclo 01-2019</option>
                            <option value="Ciclo 02-2019">Ciclo 02-2019</option>
                            <option value="Ciclo 03-2019" title="Interciclo">Ciclo 03-2019</option>
                            <!-- año 2020 -->
                            <option disabled>2020</option>
                            <option value='Ciclo 01-2020'>Ciclo 01-2020</option>
                            <option value='Ciclo 02-2020'>Ciclo 02-2020</option>
                            <option value='Ciclo 03-2020' title="Interciclo">Ciclo 03-2020</option>
                            <!-- año 2021 -->
                            <option disabled>2021</option>
                            <option value='Ciclo 01-2021'>Ciclo 01-2021</option>
                            <option value='Ciclo 02-2021'>Ciclo 02-2021</option>
                            <option value='Ciclo 03-2021' title="Interciclo">Ciclo 03-2021</option>";


                        </select>
                    </div>
                    <div class="form-group"><br>
                        <label for="exampleFormControlSelect2" class="float-left">Nota acumulada:</label>
                        <input type="number" name="nota" class="form-control" step="0.1" min="0" max="10">
                        <input type="hidden" name="idMateria" class="form-control" value="<?php echo $idMateria;  ?>">
                        <input type="hidden" name="idAlumno" class="form-control" value="<?php  echo $idAlumno; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="float-left">Motivo</label>
                        <textarea class="form-control" name="motivo" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label for="exampleFormControlTextarea1" class="float-left">Carta de retiro</label>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="carta" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Carta de retiro</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
                <?php
?>
                <!--Fin de container-->
            </div>

        </div>
    </div>
    <br>
    <br>
</div><!-- Fin de div principal-->
<!-- /#page-content-wrapper -->

</div>
</div>
<!-- /#wrapper -->
<?php

 require_once 'templates/footer.php';

?>