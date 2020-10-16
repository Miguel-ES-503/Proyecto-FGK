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
    <h2 class="main-title" >Reporteria Renovacion</h2>
</div>
<div class="container-fluid text-center">
    <?php
   
  ?>
    <!--*********INICIO SECCION PARA UTILIZAR EL FILTRO DE DATOS-->
    <div class="card" style="margin-top: 10px; ">
        <div class='row'>
            <div class="col-sm" style="margin: 1%;">
                <select id="Fciclo" class="browser-default bg-light custom-select" name="ciclo">
                    <option value=" " class='dropdown-item' disabled selected>Ciclo</option>
                    <option value="ciclo 1" class="dropdown-item">ciclo 1</option>
                    
                    <option value="ciclo 2" class="dropdown-item">ciclo 2</option>
                </select>
            </div>
<div class="col-sm" style="margin: 1%;">
                

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
        $("#Fciclo").change(function() {

            $.ajax({
                type: 'POST',
                url: 'Modelo/ModeloRenovacion/cargarGraficos.php',
                data: {
                    estado: $('#Festado option:selected').val(),
                    ciclo: $('#Fciclo option:selected').val(),
                   
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


   
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>