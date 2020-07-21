$(document).ready(function() {    
    var table = $('#example3').DataTable({  
        "scrollX": true,
        "scrollY": "50vh",
        //Esto sirve que se auto ajuste la tabla al aplicar un filtro
         "scrollCollapse": true,     
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
            'rowCallback': function(row, data, index){
                if(data[12]<= 74 && data[12]>=50){
                    $(row).find('td:eq(12)').css('color', 'orange');
                }else if(data[12]>= 75)
                {
                    $(row).find('td:eq(12)').css('color', 'green');
                }
                else{
                    $(row).find('td:eq(12)').css('color', 'red');
                }

                if (data[13] == "Aprobado") {
                    $(row).find('td:eq(13)').css('color', 'green');
                }else{
                    $(row).find('td:eq(13)').css('color', 'red');
                }
            },
            
            initComplete: function() {
                //En el columns especificamos las columnas que queremos que tengan filtro
                this.api().columns().every(function() {
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
            
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<img src="../img/excell.png" width="25px" height="25px">',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			}
			
			
        ]
        
    });     
    //********Esta bendita linea hace la magia, adjusta el header de la tabla con el body 
    table.columns.adjust();
});