
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
