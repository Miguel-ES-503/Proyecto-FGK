</div>
</div>
</div>
<!-- FOOTER START -->
<div class="footer">
    <div class="contain">
        <div class="col">
            <h1 style="color: white;">Derechos reservados</h1>
            <ul>
                <li>
                    <center><img src="../img/logoblanco2.png" width="100" style="width:100px;"></center>
                </li>
            </ul>

        </div>

        <div class="col social">
            <h1 style="color: white;">Contáctanos:</h1>
            <ul>
                <li>
                    <center><a href="https://www.facebook.com/exalumnos.ccgk?ref=br_tf&epa=SEARCH_BOX"><img
                                src="../img/facebook.png" width="32" style="width:32px;"></a></center>
                </li>
                <li>
                    <center><a href="https://www.instagram.com/bk2oportunidades/"><img src="../img/instagram.png"
                                width="32" style="width: 32px;"></a></center>

                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- END OF FOOTER -->

<!-- Bootstrap core JavaScript -->

<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/alerta.js"></script>
<!--Mostrar el mensaje de alerta-->





<!--Validaciones-->
<script src="js/FormValidarCuentas.js"></script>
<script src="js/FormValidarAlumno.js"></script>
<script src="js/FormValidarEmpresas.js"></script>
<script src="js/FormCarreras.js"></script>
<script src="js/FormValidarFacultades.js"></script>
<script src="js/FormValidarCiclos.js"></script>
<script src="js/ObtnerIDEmpresa.js"></script>
<script src="js/FormValidarReunion.js"></script>
<Script src="js/alerta.js"></Script>
<script src="js/SubidaArchivo.js"></script>



<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>

<script>
$(function() {
    $("#btnExito").click(function() {
        $('#modal_exito').modal('show');
    });
});

$(function() {
    $("#btnFalla").click(function() {
        $('#modal_falla').modal('show');
    });
});
</script>


<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo('#example thead');
    $('#example thead tr:eq(1) th').each(function(i) {
        var title = $(this).text();
        if (title.trim() ==
            'Actualizar') { //Se oculta el input de la parte de graficos ya que no se usara
            $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' +
                title + ' ">' +
                '</div>');
        } else if (title.trim() == 'Ver expediente') {
            $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' +
                title + ' ">' +
                '</div>');
        } else if (title.trim() == 'Todos') {
            $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' +
                title + ' ">' +
                '</div>');
        } else if (title.trim() == 'Notas') {
            $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' +
                title + ' ">' +
                '</div>');
        } else if (title.trim() == 'Detalles') {
            $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' +
                title + ' ">' +
                '</div>');
        } else {
            $(this).html(
                '<div >' +
                '<input  type="text" placeholder="' + title + ' ">' +
                '</div>');
        }

        $('input', this).on('keyup change', function() {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });



    var table = $('#example').DataTable({
        orderCellsTop: true,
        fixedHeader: true,


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
        }


    });




});
</script>


<script>
var table2 = $('#tableUser').DataTable({
    orderCellsTop: true,
    fixedHeader: true,

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
    }
});
</script>

<script>
var table2 = $('#tableUser2').DataTable({
    orderCellsTop: true,
    fixedHeader: true,

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
    }
});
</script>

<script>
$(document).ready(function() {
    var current = 1,
        current_step, next_step, steps;
    steps = $("fieldset").length;
    $(".next").click(function() {
        current_step = $(this).parent();
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        setProgressBar(++current);
    });
    $(".previous").click(function() {
        current_step = $(this).parent();
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
        setProgressBar(--current);
    });
    setProgressBar(current);
    // Change progress bar action
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
            .html(percent + "%");
    }
});
</script>
</body>

</html>