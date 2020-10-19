<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Listados-Renovacion</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
require_once '../Conexion/conexion.php';
?>

        
        <!-- Required meta tags -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <!--<script type="text/javascript" src="js/script.js"></script>-->


<?php

if (isset($_SESSION['noti'])) {
	echo $_SESSION['noti'];
	unset($_SESSION['noti']);
	unset($_SESSION['idRenovacion']);
}
?>
<link rel="stylesheet" type="text/css" href="css/modulos-moodle.css">
<div class="title">
  <a href="javascript:history.back();" title=""><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Listados-Renovacion</h2>
    <div class="title2">
</div>
</div>
<br><br>
    <body>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ausentes" 
        style="float: right;margin-right: 113px;">
        No Recibidas
</button>
<br>
        <div class="container" style="background: black;color: white;margin-top: 20px;border-radius: 20px;text-align: center;">
 <table id="example" class="display" style="width:100%;padding: 50px;margin-top: 20px;">

                 <thead style="background-color: pink;">
            <tr>
                <th>ID Renovacion</th>
                <th>ID Alumno</th>
                <th>Alumno</th>
                <th>Carrera</th>
                <th>Universidad</th>
                <th>Ciclo</th>
                <th>Año</th>
                <th>Estado</th>
                <th>PDF</th>
            </tr>
        </thead>
        <tbody style="color: black;">
          <?php 
          $sql = "SELECT idRenovacion,renovacion.Estado,renovacion.ID_Alumno,alumnos.Nombre as 'alumno',carrera.nombre as 'carrera',empresas.Nombre as 'uni',ciclo,año,direccion FROM renovacion JOIN alumnos
ON alumnos.ID_Alumno = renovacion.ID_Alumno
JOIN carrera
ON carrera.Id_Carrera = alumnos.ID_Carrera
JOIN empresas
ON empresas.ID_Empresa = alumnos.ID_Empresa";
foreach ($dbh->query($sql) as $datos) {
                $n=1;
            ?>
            <tr>
                <td><?php echo $datos['idRenovacion'] ?></td>
                <td><?php echo $datos['ID_Alumno'] ?></td>
                <td><?php echo utf8_decode($datos['alumno'] )?></td>
                <td><?php echo $datos['carrera'] ?></td>
                <td><?php echo $datos['uni'] ?></td>
                <td><?php echo $datos['ciclo'] ?></td>
                <td><?php echo $datos['año'] ?></td>
                <td><?php echo $datos['Estado'] ?></td>
<td>
    <div class="btn-grupo">
    <button type="button" value="<?php echo $datos['direccion']?>" class="btn btn-success buton" data-toggle="modal" data-target="#mostrarPDF"   id="direccion<?php echo $n ?>" >Ver PDF</button>
    </div>
</td>
    <input type="hidden" name="id" id="id" value="<?php echo $datos['idRenovacion']?>">
    
            </tr>
            <?php 
            $n++;
        }
            ?>
                    <br><br>  
        </tbody>

 </table>  
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 

<script>
let temp = $("#btn1").clone();
$("#btn1").click(function(){
    $("#btn1").after(temp);
});

$(document).ready(function(){
    var table = $('#example').DataTable({
       orderCellsTop: true,
       fixedHeader: true 
    });
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#example thead tr').clone(true).appendTo( '#example thead' );

    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html( '<input type="text" placeholder="Search"/>' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } ); 
    $('#tabla2').DataTable();
});


 

</script>
<div class="modal fade" id="mostrarPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="Modelo/ModeloRenovacion/procesoRenovacion.php" method="POST">
  <div class="modal-dialog modal-lg" role="document" style="width: 750px;margin: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button"  id="mostrar" class="btn btn-success" style="margin:auto;">Mostrar</button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idRenovacion" id="idRenovacion">
        <input type="hidden" name="direccionpdf" id="direccionpdf">
        <div id="pdf2" style="margin: 0 auto;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Close</button>
        <input type="submit" name="aceptar" class="btn btn-success" value="Aceptar">
        <input type="submit" name="rechazar" class="btn btn-danger" value="Rechazar">
      </div>
    </div>
  </div>
</form>
</div>
<div class="modal fade" id="ausentes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
  <div class="modal-dialog modal-lg" role="document" style="width: 750px;margin: auto;">
    <div class="modal-content">
           <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">No recibidas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tabla2" class="display" style="width:100%">
<thead>
                <td>Carné</td>
                <td>Nombre</td>
                <td>Class</td>
                <td>Correo</td>
                <td>Carrera</td>
            </thead>
            <tbody>
        <?php 
        $consulta = "SELECT ID_Alumno,alumnos.Nombre as 'name',Class,correo,carrera.nombre FROM alumnos 
        JOIN carrera 
        ON carrera.Id_Carrera = alumnos.ID_Carrera
        WHERE ID_Alumno 
        NOT IN( 
        SELECT r.ID_alumno FROM renovacion r LEFT JOIN alumnos A ON r.ID_alumno = A.ID_Alumno 
        WHERE ciclo = 1
        )";
        foreach ($dbh->query($consulta) as $ausentes) {
        ?>
        <tr>
            <td><?php echo $ausentes['ID_Alumno'] ?></td>
            <td><?php echo utf8_decode($ausentes['name']) ?></td>
            <td><?php echo $ausentes['Class'] ?></td>
            <td><?php echo $ausentes['correo'] ?></td>
            <td><?php echo $ausentes['nombre'] ?></td>
        </tr>
        <?php  
    }
        ?>
            </tbody>
        <tfoot>
            <tr>
                <th>Carné</th>
                <th>Nombre</th>
                <th>Class</th>
                <th>Correo</th>
                <th>Carrera</th>
            </tr>
        </tfoot>
    </table>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(".btn-grupo button").click(function(){
    
   var dir =$('#direccionpdf').val($(this).val());

 })
</script>


<script type="text/javascript">
    $(document).ready(function($) {
    $(document).on('click', '#mostrar', function(){
    
    //obtenemos el id
    
    var dir = $('#direccionpdf').val();
    var idEditar = $('#id').val();
      
   // var direccion = $('#direccion').val();
    
    $('#pdf2').html('<iframe  src="'+dir+'" width="720px" height="500px"></iframe>');
    

    });
     $(document).on('click', '#cerrar', function(){
        $('#pdf2').html('');
     });
});
</script>

<script type="text/javascript">
    window.onload=function(){
    $("table tbody tr").click(function(){
        // Tomar la captura la información  de la tabla 
        var id= $(this).find("td:eq(0)").text(); 
        document.getElementById('idRenovacion').value=id;    
      });    
  }
</script>
</body>

