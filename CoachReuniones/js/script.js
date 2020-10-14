$(document).ready(function($) {
    $(document).on('click', '#mostrarPDF', function(){
    
    //obtenemos el id
    var idEditar = $('#id').val();
    $("#idRenovacion").val(idEditar);    
    var direccion = $('#direccion').val();
    $('#pdf2').html('<iframe  src="'+direccion+'" width="720px" height="500px"></iframe>');

    });
});