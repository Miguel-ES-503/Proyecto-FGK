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
<link rel="stylesheet" type="text/css" href="css/modulos-moodle.css">
<link rel="stylesheet" type="text/css" href="css/EstiloCrearCuentas.css">
<div class="title">
    <a href="javascript:history.back();" title=""><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title">Modulos de Moodle</h2>
</div>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center" id="main-inicio">
    <!-- botones de redirección -->
    <div class="buttons">
        <a href="activarmodulos.php"><button type="buttom" class="btn btn-danger" /><img src="../img/add.png"
                class="icon2">Activar Inscripción</button> </a>
        <a href="AprobarModulos.php"><button type="buttom" class="btn btn-success" /><img src="../img/add.png"
                class="icon2">Aprobar Modulos</button> </a>
    </div>

    <br><br><br>
    <!-- Tabla con datos de alumnos -->
    <div class="card-body  bg-dark">
        <div class="table-responsive">
            <br>
            <table id="tabla" class="table table-hover w-100 ">
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
                <tbody class="w-100">
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