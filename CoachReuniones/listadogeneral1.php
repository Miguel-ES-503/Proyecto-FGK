<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Modulos de Moodle</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" type="text/css" href="css/Aprobar-Modulos.css">
<div class="title">
  <a href="javascript:history.back();" ><img src="../img/back.png" class="icon"></a>

    <h2 class="main-title" >Aprobar/Reprobar Módulo 1</h2>
</div>

  
<!--Comiezo de estructura de trabajo -->
<!-- Menu 2-->
<br><br><br>
<div class="btn" >

  <a href="Reportes/ReporteModulo1.php" target="_blank" ><button class="btn btn-danger" id="button"><img src="../img/PDF.png">Descargar</button></a>

  <a href="ReportesExcel/ReporteModulo1.php" class="float-left"  ><button class="btn btn-success" id="button"><img src="../img/excell.png">Descargar</button></a>
</div>
<br><br>
<div class="container-fluid text-center" id="main">
<div class="table-responsive-sm" id="nav1">
  <table cellpadding="10" align="center">
    <tr>
      <tr>
        <td colspan="2"><p style="color: black;font-size: 20px;text-align: center;margin-bottom: -10px;">*Menu</p></td>
      </tr>
      <td><a class="nav-link active ml-2" href="AprobarModulos.php" style="width: 80px;font-size: 10px;" id="btn-h">Módulo C1</a></td>
     <td><a class="nav-link ml-2" href="modulo2.php" style="width: 80px;font-size: 10px;" id="btn-h">Módulo C2</a></td>
    </tr>
    <tr>
       <td><a class="nav-link ml-2" href="modulo3.php" style="width: 80px;font-size: 10px;" id="btn-h">Módulo B1</a></td>
     <td><a class="nav-link ml-2" href="modulo4.php" style="width: 80px;font-size: 10px;" id="btn-h">Modulo B2</a></td>
    </tr>
    <tr>
      <td><a class="nav-link ml-2" href="modulo5.php" style="width: 80px;font-size: 10px;" id="btn-h">Módulo A1</a></td>
     <td><a class="nav-link ml-2" href="modulo6.php"style="width: 80px;font-size: 10px;" id="btn-h">Módulo A2</a></td>
    </tr>
    </table>
  </div>
<div class="table-responsive-sm" id="nav2">

  <table class="table">
    <tr>
      <td colspan="6"><h2 class="main-title">* Menu</h2></td>
    </tr>
   <tr>
     <td><a class="nav-link active ml-2" href="AprobarModulos.php" style="width: 80px;font-size: 10px;" id="btn-h">Módulo C1</a></td>
     <td><a class="nav-link ml-2" href="modulo2.php" style="width: 80px;font-size: 10px;" id="btn-h">Módulo C2</a></td>
     <td><a class="nav-link ml-2" href="modulo3.php" style="width: 80px;font-size: 10px;" id="btn-h">Módulo B1</a></td>
     <td><a class="nav-link ml-2" href="modulo4.php" style="width: 80px;font-size: 10px;" id="btn-h">Modulo B2</a></td>
     <td><a class="nav-link ml-2" href="modulo5.php" style="width: 80px;font-size: 10px;" id="btn-h">Módulo A1</a></td>
     <td><a class="nav-link ml-2" href="modulo6.php"style="width: 80px;font-size: 10px;" id="btn-h">Módulo A2</a></td>
   </tr>
  </table>
</div>

<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2" id="nav3">
  <nav class="nav flex-column" id="nav">
    <h2 class="title-1">Menu</h2>
<a class="nav-link active" href="AprobarModulos.php" style="background-color:#BE0032; color:white;">Módulo C1</a>
<a class="nav-link" href="modulo2.php">Módulo C2</a>
  <a class="nav-link" href="modulo3.php">Módulo B1</a>
  <a class="nav-link" href="modulo4.php">Modulo B2</a>
   <a class="nav-link" href="modulo5.php">Módulo A1</a>
    <a class="nav-link" href="modulo6.php">Módulo A2</a>
</nav>
</div>

<!-- Inicio de tabla de asistencia  -->
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 w-100 ml-lg-5 ml-md-5">
    <div class="card-body w-100 h-100" id="cont2">
      <div class="table-responsive">
        <form action="Aprobartodos.php" method="POST">  <br>
   <!--<input type="submit" name="Aprobado" value="Aprobado" class="btn btn-primary btn-sm">
        <input type="submit" name="Reprobado" value="Reprobado" class="btn btn-primary btn-sm">-->
    <br>
      <table  id="example" class="table table-hover table-sm table-bordered table-fixed h-100 w-100" >
      <br>
          <thead class="table-secondary h-100 w-100">
            <tr>
              <th scope="col"><input type='checkbox' name='' class='case' value="" id="todos">Todos</th>
              <th scope="col">ID Alumno</th>
              <th scope="col">Alumno</th>
              <th scope="col">Sexo</th>
              <th scope="col">Class</th>
              <th scope="col">Sede</th>
              <th scope="col">Universidad</th>
              <th scope="col">Aprobar</th>
              <th scope="col">Reprobar</th>
            </tr>
          </thead>
<tbody>
<?php
    require_once 'Modelo/ModeloModulos/ListadoGeneral/listageneral1.php';

?>
        </tbody>
      </table>
</form>
    </div>
  </div>
</div>
  </div>
</div>
<br>
<script>
$(document).ready(function() {
  var table = $('#example').DataTable({

        "scrollX": true,
        "scrollY": "50vh",
        //Esto sirve que se auto ajuste la tabla al aplicar un filtro
         "scrollCollapse": true,

        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },

        initComplete: function() {
            //En el columns especificamos las columnas que queremos que tengan filtro
            this.api().columns([0,1,2,3,4,5,6]).every(function() {
                var column = this;

                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.header()))
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val().trim()
                        );

                            column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();


                    });
                    //Este codigo sirve para que no se active el ordenamiento junto con el filtro
                $(select).click(function(e) {
                    e.stopPropagation();
                });
                //===================

                column.data().unique().sort().each(function(d, j) {
                    // select.append('<option value="' + d + '">' + d + '</option>')

                        select.append('<option value="' + d + '">' + d + '</option>')

                });



            });
        },
        "aoColumnDefs": [
         { "bSearchable": false
         //"aTargets": [ 1] sirve para indicar que columna no queremos que funcione el filtro

          }
       ]

    });
    //********Esta bendita linea hace la magia, adjusta el header de la tabla con el body
    table.columns.adjust();
} );

</script>
<script type="text/javascript">

  $("#todos").on("click", function() {
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
        </script>
        <div class="footer-copyright text-center py-3" style="background: black;margin-top:30%;">
                  <img class="img-fluid" src="../img/funda.png" width="60px">
                  </img>
                  <img class="img-fluid" src="../img/logoblanco2.png" style="margin-left:30px;"></img>
                  <span style="margin-right:50px; margin-left:50px; color:white; font-size: 18px;">© 2020 Copyright: Pograma Oportunidades</span>
                  <span style="color: white; font-weight: bold; font-size: 18px;">Contáctanos:</span><a href="https://www.facebook.com/exalumnos.ccgk"><img class="img-fluid" src="../img/facebook.png" style="margin-left:30px; width:60px;"></img></a>
                  <a href="https://instagram.com/bk2oportunidades?igshid=4rmcd55eld5h"><img class="img-fluid" src="../img/instagram.png" style="margin-left:30px; width:60px;"></a></img>

          </div>



























