<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Activar o Desactivar Módulos</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera2.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once '../Conexion/conexion.php';
?>
<link rel="stylesheet" type="text/css" href="css/Activar-Modulo.css">
<div class="title">
    <a href="javascript:history.back();" title=""><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title">Activar o Desactivar Módulos</h2>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
    <br>
    <div class="row">
        <div class="w-75 mx-auto" id="nota">
            <strong>NOTA: </strong>
            <p>Al momento de activar un módulos los alumnos se prodran inscribir a dicho módulo y al momento de
                desactivar, los alumnos ya no podrán inscribirse hasta que se vuelva a activar el módulo.</p>
        </div>
        <div class="table table-responsive  w-50  mx-auto table-hover table-striped">
            <div class="table table-responsive  table-hover table-striped">
                <table id="tabla" class="">
                    <thead class="table-dark table-bordered">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Activar/Desactivar</th>
                            <th scope="col">Cambiar contraseña</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

// seleccionar módulo mientras que este desactivado
$stmt2 = $dbh->query("SELECT * FROM modulos WHERE estado = 1");
  while ($row = $stmt2->fetch()) {
    echo "<tr class='bg-light'>";
    echo "<th scope='row'>".$row['id_modulo']."</th>";
    echo "<td>".utf8_encode($row['titulo'])."</td>";
    echo "<td><form action='actualizarmodulo.php' method='POST'><button type='submit' class='btn btn-warning' value= '".$row['id_modulo']."' name='id' id='btn-desactivar'><img src='../img/desactivar.png' class='icon-img'>Desactivar </button> </form> </td>";
    echo "<td><form action='cambiarpasswd.php' method='POST'><button type='submit' class='btn btn-success' value= '".$row['id_modulo']."' name='id' id='btn-cambiar'><i class='fas fa-key'></i>Cambiar</button></form> </td>";
    echo "</tr>";
}

// seleccionar módulo mientras que este activo
$stmt = $dbh->query("SELECT * FROM modulos WHERE estado = 0");
while ($row = $stmt->fetch()) {
    echo "<tr class='bg-light'>";
    echo "<th scope='row'>".$row['id_modulo']."</th>";
    echo "<td>".utf8_encode($row['titulo'])."</td>";
    echo "<td><form action='actualizarmodulo2.php' method='POST'><button type='submit' class='btn btn-block' value= '".$row['id_modulo']."' name='id' id='btn-activar'><img src='../img/activar.png' class='icon-img-2' >Activar </button> </form> </td>";
    echo "<td><form action='cambiarpasswd.php' method='POST'><button type='submit' class='btn btn-success' value= '".$row['id_modulo']."' name='id' id='btn-cambiar' ><i class='fas fa-key'></i> Cambiar</button> </form> </td>";
    echo "</tr>";
}
?>
                    </tbody>
                </table>
            </div>
        </div>
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
                this.api().columns([0, 1]).every(function() {
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