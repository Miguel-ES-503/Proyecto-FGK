</div>          
</div>
</div>
<!-- FOOTER START -->
<div class="footer-copyright text-center py-3" style="background: black;">
          <img class="img-fluid" src="../img/funda.png" width="60px">
          </img>
          <img class="img-fluid" src="../img/logoblanco2.png" style="margin-left:30px;"></img>
          <span style="margin-right:50px; margin-left:50px; color:white; font-size: 18px;">© 2020 Copyright: Pograma Oportunidades</span>
          <span style="color: white; font-weight: bold; font-size: 18px;">Contáctanos:</span><a href="https://www.facebook.com/exalumnos.ccgk"><img class="img-fluid" src="../img/facebook.png" style="margin-left:30px; width:60px;"></img></a>
          <a href="https://instagram.com/bk2oportunidades?igshid=4rmcd55eld5h"><img class="img-fluid" src="../img/instagram.png" style="margin-left:30px; width:60px;"></a></img>
          
  </div>

<!-- END OF FOOTER -->

  <!-- Bootstrap core JavaScript -->
  
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/alerta.js"></script> <!--Mostrar el mensaje de alerta-->

 



  <!--Validaciones-->
  <script src="js/FormValidarCuentas.js"></script>
  <script src="js/FormValidarAlumno.js"></script>
  <script src="js/FormValidarEmpresas.js"></script>
  <script src="js/FormCarreras.js" ></script>
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
    $("#btnExito").click(function(){        
      $('#modal_exito').modal('show');
    });
});

$(function() {
    $("#btnFalla").click(function(){        
      $('#modal_falla').modal('show');
    });
});
  </script>

<script>
$(document).ready(function() {
    var table = $('#example2').DataTable({
        
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
            this.api().columns([0,1,2,3,4]).every(function() {
                var column = this;

                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.header()))
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
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
         { "bSearchable": false, "aTargets": [ 1 ] }
       ] 
      
    });
    //********Esta bendita linea hace la magia, adjusta el header de la tabla con el body 
    table.columns.adjust();

});
</script>
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
            this.api().columns([0,1,2,3,4,5,6,7,8]).every(function() {
                var column = this;

                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.header()))
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
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
         { "bSearchable": false, "aTargets": [ 1 ] }
       ] 
      
    });
    //********Esta bendita linea hace la magia, adjusta el header de la tabla con el body 
    table.columns.adjust();



  //La de Marquez
    // Setup - add a text input to each footer cell
  /*  $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        if (title.trim() == 'Actualizar') {//Se oculta el input de la parte de graficos ya que no se usara
            $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' + title + ' ">' +
                '</div>');
        }
        else if (title.trim() == 'Ver expediente')
        {
           $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' + title + ' ">' +
                '</div>');
         }
         else if (title.trim() == 'Todos')
        {
           $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' + title + ' ">' +
                '</div>');
         }
          else if (title.trim() == 'Notas')
        {
           $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' + title + ' ">' +
                '</div>');
         }
          else if (title.trim() == 'Detalles')
        {
           $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' + title + ' ">' +
                '</div>');
         }

             else if (title.trim() == 'Lugar de asistencia')
        {
           $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' + title + ' ">' +
                '</div>');
         }
                else if (title.trim() == 'Asistencia')
        {
           $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' + title + ' ">' +
                '</div>');
         }

               else if (title.trim() == 'Cargo')
        {
           $(this).html(
                '<div >' +
                '<input  class="form-control" style= "display: none;" type="text" placeholder="' + title + ' ">' +
                '</div>');
         }

         else {
            $(this).html(
                '<div >' +
                '<input  type="text" placeholder="' + title + ' ">' +
                '</div>');
        }
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );



    var table = $('#example').DataTable( {
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




*/

  } );

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


</body>

</html>
