</div>
</div>
</div>
<!-- FOOTER START -->
<div class="footer">
    <div class="contain">

        <div class="col">
            <h1>Derechos reservados</h1>
            <ul>
                <li>
                    <img src="../img/logoblanco2.png" width="100" style="width:100px;">
                </li>
            </ul>

        </div>
        <div class="col">
            <ul>
                <li>
                    <img src="../img/funda.png" width="50" style="width:50px;">
                </li>
            </ul>
        </div>
        <div class="col social">
            <h1>Contáctanos:</h1>
            <ul>
                <li>
                    <a href="https://www.facebook.com/exalumnos.ccgk?ref=br_tf&epa=SEARCH_BOX"><img
                            src="../img/facebook.png" width="32" style="width:32px;"></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/bk2oportunidades/"><img src="../img/instagram.png" width="32"
                            style="width: 32px;"></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- END OF FOOTER -->

<!-- Bootstrap core JavaScript -->


<script src="js/alerta.js"></script>
<!--Mostrar el mensaje de alerta-->

<!-- Semantic -->
<!--Segunda Tabla-->

<!--*************TIENE QUE SER EN ESE ORDEN SINO SE JODE TODO PORQUE COMBINO LAS DOS OJAS DE ESTILO****************-->

<script type="text/javascript" src="DataTables/dataTables.bootstrap4.min"></script>
<script src="DataTables/jquery-3.3.1.js" type="text/javascript"></script>
<script src="DataTables/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="DataTables/dataTables.fixedHeader.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!--script src="DataTables/dataTables.semanticui.min.js" type="text/javascript"></script-->
<!--script src="DataTables/semantic.min.js" type="text/javascript"></script-->

<!--Finaliza segunda Tabla-->


<script>
//Todo esta logica es para el DataTable con el filtro en el Header
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo('#example thead');
    $('#example thead tr:eq(1) th').each(function(i) {
        var title = $(this).text().trim(); //Trae el nombre de los encabezados de las columnas
        //Creaa un txt tipo input utilizando los estilos Semantic
        if (title.trim() == 'Comentarios') {//Se oculta el input de la parte de graficos ya que no se usara
            $(this).html(
                '<div >' +
                '<input  class="form-control " style= "display: none;" type="text" placeholder="' + title + ' ">' +
                '</div>');
        } else {
            $(this).html(
                '<div >' +
                '<input class="form-control " type="text" placeholder="' + title + ' ">' +
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

<!--Fin Semantic-->


<!--Validaciones-->
<!--script src="js/FormValidarCuentas.js"></script>
  <script src="js/FormValidarAlumno.js"></script>
  <script src="js/FormValidarEmpresas.js"></script>
  <script src="js/FormCarreras.js" ></script>
  <script src="js/FormValidarFacultades.js"></script>
  <script src="js/FormValidarCiclos.js"></script>
  <script src="js/ObtnerIDEmpresa.js"></script>
  <script src="js/FormValidarReunion.js"></script-->

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

$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>
</body>

</html>