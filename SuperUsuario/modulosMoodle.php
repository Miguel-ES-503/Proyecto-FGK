<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Modulos de Moodle</title>
<link rel="stylesheet" type="text/css" href="css/modulos-moodle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.topnav {
    overflow: hidden;
    background-color: #ADADB2;
    max-width: 100%;
}

.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    border-width: 3px;
    font-weight: bold;


}

.submenu1 {
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 18px;
    background-color: #9d120e;
    border-width: 3px;
    font-weight: bold;
    height: 68px;
    letter-spacing: 2px;



}

.icon {}

.topnav a:hover {
    background-color: #ddd;
    color: black;
}

.topnav a.active {
    background-color: #4CAF50;
    color: white;
}

.topnav .icon1 {
    display: none;
}

@media screen and (max-width: 600px) {
    .topnav a:not(:first-child) {
        display: none;
    }

    .topnav a.icon1 {
        float: right;
        display: inline-block;
    }
}

@media screen and (max-width: 600px) {
    .topnav.responsive {
        position: relative;
    }

    .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
    }

    .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
        font-size: 15px;
        height: 50px;
    }

    .titulomenu a {
        font-size: 15px;
    }
}
</style>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';

?>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>



</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
    <!-- botones de redirección -->
    <div class="topnav" id="myTopnav">
        <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
        <a class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Modulos de Moodle</a>


        <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

</div>
<div class="buttons">
    <a href="activarmodulos.php"><button type="buttom" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" /><img src="../img/add.png" class="icon2">Activar Inscripción</button> </a>
    <a href="AprobarModulos.php"><button type="buttom" style="border-radius: 20px;
    border: 2px solid green;
    width: 200px;height: 38px;
     background-color: green;
     color:white;" /><img src="../img/add.png" class="icon2">Aprobar Modulos</button> </a>
</div>

<br><br><br>
<!-- Tabla con datos de alumnos -->
<div class="card-body  bg-dark">
    <div class="table-responsive">
        <br>
        <table id="tabla" class="table table-hover w-100 table-bordered text-center table-striped ">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">Alumno</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Class/Sede</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Módulos Aprobados</th>
                    <th scope="col">Talleres</th>
                    <th scope="col">Estado de Certificación</th>
                    <th scope="col">Actualizar</th>
                </tr>
            </thead>
            <tbody class="w-100 table-light">
                <?php
          require_once 'Modelo/ModeloAlumno/MostrarDatosAlumnos2.php';
          ?>
            </tbody>
        </table>

    </div>
    <!--Fin de la caja responsivo de la tabla-->
</div>
<br><br>
<script>
$(document).ready(function() {
    var table = $('#tabla').DataTable({

        "scrollX": true,
        "scrollY": "50vh",
        //Esto sirve que se auto ajuste la tabla al aplicar un filtro
        "scrollCollapse": true,

        initComplete: function() {
            //En el columns especificamos las columnas que queremos que tengan filtro
            this.api().columns([0, 1, 2, 3, 4, 5, 6]).every(function() {
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

                    select.append('<option value="' + d + '">' + d +
                        '</option>')

                });



            });
        },
        "aoColumnDefs": [{
            "bSearchable": false
            //"aTargets": [ 1] sirve para indicar que columna no queremos que funcione el filtro

        }]

    });
    //****Esta bendita linea hace la magia, adjusta el header de la tabla con el body
    table.columns.adjust();
});
</script>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>