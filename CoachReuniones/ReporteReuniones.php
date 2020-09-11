<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>

<title>Reportería</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--****************************************Comiezo de estructura de trabajo *************************-->
<link rel="stylesheet" type="text/css" href="css/Renovacion.css">
<div class="title mb-5">
  <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Reporteria</h2>
</div>
<div class="container-fluid text-center">
    <!--*********INICIO SECCION PARA UTILIZAR EL FILTRO DE DATOS-->
    <div class="card" style="margin-top: 10px; ">
        <div class='row'>
            <div class="col-sm" style="margin: 1%;">
                <select id="FNombre" class="browser-default bg-light custom-select" name="Year">
                    <option value=" " class='dropdown-item' disabled selected>Nombre reunión</option>
                    <?php 
                                require_once 'Modelo/ModeloReportes/CargarNombreReuniones.php';
                                ?>
                </select>
            </div>
            <div class="col-sm" style="margin: 1%;">
                <select id="FAno" class="browser-default bg-light custom-select" name="Year">
                    <option value=" " class='dropdown-item' disabled selected>Año</option>
                    <?php 
                                require_once 'Modelo/ModeloReportes/CargarAnosReunion.php';
                                ?>
                </select>
            </div>

            <div class="col-sm" style="margin: 1%;">
                <select id="FFinanciamiento" class="browser-default bg-light custom-select" name="Meses" onchange="">
                    <option value=" " class='dropdown-item' disabled selected>Fuente de financiamieto</option>
                    <option value="FGK" class="dropdown-item">FGK</option>
                    <!--Incluye beca externa-->
                    <option value="BORJA" class="dropdown-item">BORJA</option>
                    <option value="FOM" class="dropdown-item">FOM</option>
                    <option value="Financiamiento Propio" class="dropdown-item">Financiamiento propio</option>
                </select>

                <!--input id='txtMeses' value="<?php //echo $FMeses?>" class="form-control" type="text"
                            placeholder="Default input" style="width: 35%; margin-top: 5%;"-->
            </div>
        </div>
    </div>
    <!--*********FINALIZA SECCION PARA UTILIZAR EL FILTRO DE DATOS-->
    <!--========================GRAFICO PRINCIPAL--->

    <!--==========INICIA SECCION DONDE SE MUESTRA EL GRAFICO-->
    <div id="dashboard_div">
        <div class='row'>
            <!--Divs that will hold each control and chart-->
            <div class='col'>
                <div id="chart_div"></div>
            </div>
            <div class='col'>
                <div class='row'>
                    <div class='col'>
                        <div id="categoryPicker_div"></div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <div id="table_div"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========FINALIZA SECCION DONDE SE MUESTRA EL GRAFICO-->
    <!--=========================FINALIZA GRAFICO PRINCIPAL-->

    <!--============****************INICIA SECCION DONDE SE MOSTRARAN TODOS LOS GRAFICOS-->
    <!--INICIO LOGICA PARA EXTRAER LOS DATOS-->
    <?php
        #Consulta para saber cuantos alumnos asistieron a las reuniones por universidad 
        $query = "SELECT DISTINCT(e.Nombre) as 'Nombre' , COUNT(i.id_alumno) as 'Total'
        FROM inscripcionreunion i
        INNER JOIN reuniones r
        ON i.id_reunion = r.ID_Reunion
        INNER JOIN empresas e
        ON r.ID_Empresa = e.ID_Empresa
        where r.Titulo = 'Reunion 1' and i.asistencia = 'Asistio'
        GROUP by e.ID_Empresa ";
        $consulta =$pdo->prepare($query) ;
        $consulta->execute();
        
        #Consulta para saber cuantos alumnos femeninos con beca no FGK que  asistieron a la reunion 
        $queryUDB = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = 'Reunion 1' AND A.FuenteFinacimiento <> 'FGK' AND R.ID_Empresa ='UDB' AND IR.asistencia='Asistio' AND A.Sexo = 'F'";
        $AsisEXTUDB =$pdo->prepare($queryUDB) ;
        $AsisEXTUDB->execute();
        $CAsisEXTUDB = $AsisEXTUDB->fetch();
        $RAsisEXTUDB = $CAsisEXTUDB['TotalAlum'];

        #Consulta para saber cuantos alumnos Masculinos con beca no FGK que  asistieron a la reunion 
        $queryUDB2 = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = 'Reunion 1' AND A.FuenteFinacimiento <> 'FGK' AND R.ID_Empresa ='UDB' AND IR.asistencia='Asistio' AND A.Sexo = 'M'";
        $AsisEXTUDB2 =$pdo->prepare($queryUDB2) ;
        $AsisEXTUDB2->execute();
        $CAsisEXTUDB2 = $AsisEXTUDB2->fetch();
        $RAsisEXTUDB2 = $CAsisEXTUDB2['TotalAlum'];

        #Consulta para saber cuantos alumnos femeninos con beca FGK que  asistieron a la reunion 
        $queryUDB3 = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = 'Reunion 1' AND A.FuenteFinacimiento = 'FGK' AND R.ID_Empresa ='UDB' AND IR.asistencia='Asistio' AND A.Sexo = 'F'";
        $AsisEXTUDB3 =$pdo->prepare($queryUDB3) ;
        $AsisEXTUDB3->execute();
        $CAsisEXTUDB3 = $AsisEXTUDB3->fetch();
        $RAsisEXTUDB3 = $CAsisEXTUDB3['TotalAlum'];
        
        #Consulta para saber cuantos alumnos Masculinos con beca  FGK que  asistieron a la reunion 
        $queryUDB4 = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = 'Reunion 1' AND A.FuenteFinacimiento = 'Financiamiento Propio' AND R.ID_Empresa ='UDB' AND IR.asistencia='Asistio' AND A.Sexo = 'M'";
        $AsisEXTUDB4 =$pdo->prepare($queryUDB4) ;
        $AsisEXTUDB4->execute();
        $CAsisEXTUDB4 = $AsisEXTUDB4->fetch();
        $RAsisEXTUDB4 = $CAsisEXTUDB4['TotalAlum'];
        #Consulta para saber cuantos alumnos becados FGK existen
        $queryUDB5 = "SELECT  COUNT(id_alumno) AS 'TotalAlum' from alumnos where FuenteFinacimiento = 'FGK' AND ID_Empresa ='UDB'";
        $AsisEXTUDB5 =$pdo->prepare($queryUDB5) ;
        $AsisEXTUDB5->execute();
        $CAsisEXTUDB5 = $AsisEXTUDB5->fetch();
        $RAsisEXTUDB5 = $CAsisEXTUDB5['TotalAlum'];
         #Consulta para saber cuantos alumnos no becados FGK existen
         $queryUDB6 = "SELECT  COUNT(id_alumno) AS 'TotalAlum' from alumnos where FuenteFinacimiento <> 'FGK' AND ID_Empresa ='UDB'";
         $AsisEXTUDB6 =$pdo->prepare($queryUDB6) ;
         $AsisEXTUDB6->execute();
         $CAsisEXTUDB6 = $AsisEXTUDB6->fetch();
         $RAsisEXTUDB6 = $CAsisEXTUDB6['TotalAlum'];

         #UFGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG
         #Consulta para saber cuantos alumnos femeninos con beca no FGK que  asistieron a la reunion 
        $queryUDB7 = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = 'Reunion 1' AND A.FuenteFinacimiento <> 'FGK' AND R.ID_Empresa ='UFGSS' AND IR.asistencia='Asistio' AND A.Sexo = 'F'";
        $AsisEXTUDB7 =$pdo->prepare($queryUDB7) ;
        $AsisEXTUDB7->execute();
        $CAsisEXTUDB7 = $AsisEXTUDB7->fetch();
        $RAsisEXTUDB7 = $CAsisEXTUDB7['TotalAlum'];

        #Consulta para saber cuantos alumnos Masculinos con beca no FGK que  asistieron a la reunion 
        $queryUDB8 = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = 'Reunion 1' AND A.FuenteFinacimiento <> 'FGK' AND R.ID_Empresa ='UFGSS' AND IR.asistencia='Asistio' AND A.Sexo = 'M'";
        $AsisEXTUDB8 =$pdo->prepare($queryUDB8) ;
        $AsisEXTUDB8->execute();
        $CAsisEXTUDB8 = $AsisEXTUDB8->fetch();
        $RAsisEXTUDB8 = $CAsisEXTUDB8['TotalAlum'];

        #Consulta para saber cuantos alumnos femeninos con beca FGK que  asistieron a la reunion 
        $queryUDB9 = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = 'Reunion 1' AND A.FuenteFinacimiento = 'FGK' AND R.ID_Empresa ='UFGSS' AND IR.asistencia='Asistio' AND A.Sexo = 'F'";
        $AsisEXTUDB9 =$pdo->prepare($queryUDB9) ;
        $AsisEXTUDB9->execute();
        $CAsisEXTUDB9 = $AsisEXTUDB9->fetch();
        $RAsisEXTUDB9 = $CAsisEXTUDB9['TotalAlum'];
        
        #Consulta para saber cuantos alumnos Masculinos con beca  FGK que  asistieron a la reunion 
        $queryUDB10 = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = 'Reunion 1' AND A.FuenteFinacimiento = 'Financiamiento Propio' AND R.ID_Empresa ='UFGSS' AND IR.asistencia='Asistio' AND A.Sexo = 'M'";
        $AsisEXTUDB10 =$pdo->prepare($queryUDB10) ;
        $AsisEXTUDB10->execute();
        $CAsisEXTUDB10 = $AsisEXTUDB10->fetch();
        $RAsisEXTUDB10 = $CAsisEXTUDB10['TotalAlum'];
        #Consulta para saber cuantos alumnos becados FGK existen
        $queryUDB11 = "SELECT  COUNT(id_alumno) AS 'TotalAlum' from alumnos where FuenteFinacimiento = 'FGK' AND ID_Empresa ='UFGSS'";
        $AsisEXTUDB11 =$pdo->prepare($queryUDB11) ;
        $AsisEXTUDB11->execute();
        $CAsisEXTUDB11 = $AsisEXTUDB11->fetch();
        $RAsisEXTUDB11= $CAsisEXTUDB11['TotalAlum'];
         #Consulta para saber cuantos alumnos no becados FGK existen
         $queryUDB12 = "SELECT  COUNT(id_alumno) AS 'TotalAlum' from alumnos where FuenteFinacimiento <> 'FGK' AND ID_Empresa ='UFGSS'";
         $AsisEXTUDB12 =$pdo->prepare($queryUDB12) ;
         $AsisEXTUDB12->execute();
         $CAsisEXTUDB12 = $AsisEXTUDB12->fetch();
         $RAsisEXTUDB12 = $CAsisEXTUDB12['TotalAlum'];

    ?>
    <!--FIN LOGICA PARA EXTRAER LOS DATOS-->
    <div>


    </div>
    <div style="margin-bottom:30px;margin-top: 30px;">
    </div>


    <div id="columnchart_material">
    </div>

    <div class="row border border-dark w-100 h-100 mx-auto rounded" style="margin-bottom: 40px;">
        <div class="col" style="margin-top:5px; width: 100%; margin-left:15%;" id="piechart_principal">
        </div>
        <div class="col w-50 mx-auto " id="tabla">
            <div id="fondo" style="margin-top:5%; margin-right:20%">
                <table id="table">

                </table>
            </div>
        </div>
    </div>

    <!--En el div G1 se cargan todos los graficos dinamicamente-->
    <div class="container" id="G1" style="margin-bottom: 10px;">

    </div>

    <!--============****************FINALIZA SECCION DONDE SE MOSTRARAN TODOS LOS GRAFICOS-->

    <div class="G" style="margin-bottom: 10px;"></div>
    <!--********************INICIA SECCION PARA HACER DINAMICOS LOS GRAFICOS-->
    <script>
    var i = 0;

    function llamada() {
        if (i == 0) {
            var table = $('#table').dataTable({
                "scrollY": "175px",
                "scrollCollapse": true,
                "paging": false,
                "searching": false
            });


            i = 1

        } else {

        }
    }
    $(document).ready(function() {

        $("#FNombre").change(function() {

            $.ajax({
                type: 'POST',
                url: 'Modelo/ModeloReportes/CargarGraficos.php',
                data: {
                    id: $('#FNombre option:selected').val(),
                    year: $('#FAno option:selected').val(),
                    financiamieto: $('#FFinanciamiento option:selected').val()
                },
                success: function(data) {
                    $("#G1").empty();
                    $("#table").empty();
                    $(".G").remove();
                    $("#G1").append(data);
                }

            });
            //  llamada();
        });
        $("#FAno").change(function() {

            $.ajax({
                type: 'POST',
                url: 'Modelo/ModeloReportes/CargarGraficos.php',
                data: {
                    id: $('#FNombre option:selected').val(),
                    year: $('#FAno option:selected').val(),
                    financiamieto: $('#FFinanciamiento option:selected').val()
                },
                success: function(data) {
                    $("#G1").empty();
                    $("#table").empty();
                    $(".G").remove();
                    $("#G1").append(data);
                }

            });
            // llamada();
        });
        $("#FFinanciamiento").change(function() {

            $.ajax({
                type: 'POST',
                url: 'Modelo/ModeloReportes/CargarGraficos.php',
                data: {
                    id: $('#FNombre option:selected').val(),
                    year: $('#FAno option:selected').val(),
                    financiamieto: $('#FFinanciamiento option:selected').val()
                },
                success: function(data) {
                    $("#G1").empty();
                    $(".G").remove();
                    $("#G1").append(data);
                }

            });
            if (i == 0) {
                llamada();
            }

        });
    });
    </script>
    <!---->
</div>
<script>
if ($('#table').lenght == 0) {

} else {

}
</script>

<!--*****************************************Finaliza estrucutra de trabajo ************************************-->


<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>