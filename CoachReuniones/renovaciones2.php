<?php 

include 'Modularidad/CabeceraInicio.php';
?>
<title>Renovaciónes</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
require_once '../Conexion/conexion.php';

?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="css/modulos-moodle.css">

<link rel="stylesheet" type="text/css" href="css/modulos-moodle.css">
<div class="title">
  <a href="javascript:history.back();" title=""><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Renovaciónes faltantes</h2>
    <div class="title2">
</div>
</div>
<br><br>
<form method="POST" action="renovaciones2.php">
	    <div class="card" style="margin-top: 10px; ">
        <div class='row'>
            <div class="col-sm" style="margin: 1%;">
            	<select  id="class" class="browser-default bg-light custom-select" name="class" onchange="">
            		<option value="0" class='dropdown-item' disabled selected>Class</option>
                    <?php
                    foreach ($dbh->query("SELECT DISTINCT(Class) FROM alumnos ORDER BY Class DESC") as $alumnos) {
                    
                    ?>
                    <option value="<?php echo $alumnos['Class']  ?>" ><?php echo $alumnos['Class']  ?></option>  
                    <?php 
                    	}
                    ?>

                </select>
            </div>
            <div class="col-sm" style="margin: 1%;">
                <select id="ciclo" class="browser-default bg-light custom-select" name="ciclo">
                    <option value=" " class='dropdown-item' disabled selected>Ciclo</option>
                    <option value="1" >1</option>
                    <option value="2" >2</option>

                </select>
            </div>

            <div class="col-sm" style="margin: 1%;">
                <select id="year" class="browser-default bg-light custom-select" name="year" onchange="">
                    <option value="0" class='dropdown-item' disabled selected>Año</option>
                    <?php
                    $year = date("Y");
                    $i = 0;
                    for ($i=$year; $i >=2014 ; $i--) {   
                    ?>
                    <option value="<?php echo $i ?>" ><?php echo $i ?></option>
                    <?php
                }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <br>
    <center>
    <input type="checkbox" id="todo" name="todo" value="todo">
    <label for="todo" style="color:black;">Todo</label><br>
    <br>
    <input type="submit" name="mostrar" class="btn btn-success" value="Mostrar"  style="margin-bottom: 5%;">
    </center>
</form>


<?php
if (isset($_POST['mostrar'])) {

	$class;$ciclo;$year;$consulta;

	if (isset($_POST['class']) AND isset($_POST['ciclo']) AND isset($_POST['year']) ) {
			$class = $_POST['class'];
			$ciclo = $_POST['ciclo'];
            $year = $_POST['year'];
            
            $consulta = "SELECT ID_Alumno,alumnos.Nombre as 'name',Class,correo,carrera.nombre,alumnos.ID_Sede,alumnos.ID_Empresa
            FROM alumnos 
            JOIN carrera ON carrera.Id_Carrera = alumnos.ID_Carrera 
            WHERE ID_Alumno 
            NOT IN( SELECT r.ID_alumno FROM renovacion r LEFT JOIN alumnos A ON r.ID_alumno = A.ID_Alumno 
            WHERE ciclo = ".$ciclo." AND year = ".$year.") 
            AND alumnos.StatusActual = 'Becado' AND alumnos.Class = $class";


	}elseif (isset($_POST['class']) AND isset($_POST['ciclo']) AND !(isset($_POST['year'])) ) {
			$class = $_POST['class'];
            $ciclo = $_POST['ciclo'];
            $consulta = "SELECT ID_Alumno,alumnos.Nombre as 'name',Class,correo,carrera.nombre,alumnos.ID_Sede,alumnos.ID_Empresa 
            FROM alumnos 
            JOIN carrera ON carrera.Id_Carrera = alumnos.ID_Carrera 
            WHERE ID_Alumno 
            NOT IN( SELECT r.ID_alumno FROM renovacion r LEFT JOIN alumnos A ON r.ID_alumno = A.ID_Alumno 
            WHERE ciclo = ".$ciclo.") 
            AND alumnos.StatusActual = 'Becado' AND alumnos.Class = $class";

	}elseif (!(isset($_POST['class'])) AND isset($_POST['ciclo']) AND isset($_POST['year'])) {
			$ciclo = $_POST['ciclo'];
            $year = $_POST['year'];

            $consulta = "SELECT ID_Alumno,alumnos.Nombre as 'name',Class,correo,carrera.nombre,alumnos.ID_Sede,alumnos.ID_Empresa 
            FROM alumnos 
            JOIN carrera ON carrera.Id_Carrera = alumnos.ID_Carrera 
            WHERE ID_Alumno 
            NOT IN( SELECT r.ID_alumno FROM renovacion r LEFT JOIN alumnos A ON r.ID_alumno = A.ID_Alumno 
            WHERE ciclo = ".$ciclo." AND year = ".$year.") 
            AND alumnos.StatusActual = 'Becado'";

            
	}elseif (isset($_POST['class']) AND !(isset($_POST['ciclo'])) AND isset($_POST['year'])) {
		$class = $_POST['class'];
        $year = $_POST['year'];
        $consulta = "SELECT ID_Alumno,alumnos.Nombre as 'name',Class,correo,carrera.nombre,alumnos.ID_Sede,alumnos.ID_Empresa
        FROM alumnos 
        JOIN carrera ON carrera.Id_Carrera = alumnos.ID_Carrera 
        WHERE ID_Alumno 
        NOT IN( SELECT r.ID_alumno FROM renovacion r LEFT JOIN alumnos A ON r.ID_alumno = A.ID_Alumno 
        WHERE year = ".$year.") AND alumnos.StatusActual = 'Becado' AND alumnos.Class = $class";
	}elseif (!(isset($_POST['class'])) AND !(isset($_POST['ciclo'])) AND isset($_POST['year'])) {
        $year = $_POST['year'];
        $consulta = "SELECT ID_Alumno,alumnos.Nombre as 'name',Class,correo,carrera.nombre,alumnos.ID_Sede,alumnos.ID_Empresa 
        FROM alumnos 
        JOIN carrera ON carrera.Id_Carrera = alumnos.ID_Carrera 
        WHERE ID_Alumno 
        NOT IN( SELECT r.ID_alumno FROM renovacion r LEFT JOIN alumnos A ON r.ID_alumno = A.ID_Alumno 
        WHERE year = ".$year.") ";
        
	}elseif(isset($_POST['class']) AND !(isset($_POST['ciclo'])) AND !(isset($_POST['year']))){
        $class = $_POST['class'];
        $consulta = "SELECT ID_Alumno,alumnos.Nombre as 'name',Class,correo,carrera.nombre,alumnos.ID_Sede,alumnos.ID_Empresa 
        FROM alumnos 
        JOIN carrera ON carrera.Id_Carrera = alumnos.ID_Carrera 
        WHERE ID_Alumno 
        NOT IN( SELECT r.ID_alumno FROM renovacion r LEFT JOIN alumnos A ON r.ID_alumno = A.ID_Alumno 
        ) 
        AND alumnos.StatusActual = 'Becado' AND alumnos.Class = $class";

    }elseif(!(isset($_POST['class'])) AND isset($_POST['ciclo']) AND !(isset($_POST['year']))){
        $ciclo = $_POST['ciclo'];  
        $consulta = "SELECT ID_Alumno,alumnos.Nombre as 'name',Class,correo,carrera.nombre,alumnos.ID_Sede,alumnos.ID_Empresa 
        FROM alumnos 
        JOIN carrera ON carrera.Id_Carrera = alumnos.ID_Carrera 
        WHERE ID_Alumno 
        NOT IN( SELECT r.ID_alumno FROM renovacion r LEFT JOIN alumnos A ON r.ID_alumno = A.ID_Alumno 
        WHERE ciclo = ".$ciclo." ) 
        AND alumnos.StatusActual = 'Becado'" ;
    }elseif(!(isset($_POST['class'])) AND !(isset($_POST['ciclo'])) AND !(isset($_POST['year'])) AND isset($_POST['todo']))
    {
        $consulta = "SELECT ID_Alumno,alumnos.Nombre as 'name',Class,correo,carrera.nombre,alumnos.ID_Sede,alumnos.ID_Empresa 
        FROM alumnos 
        JOIN carrera ON carrera.Id_Carrera = alumnos.ID_Carrera 
        WHERE ID_Alumno 
        NOT IN( SELECT r.ID_alumno FROM renovacion r LEFT JOIN alumnos A ON r.ID_alumno = A.ID_Alumno ) 
        AND alumnos.StatusActual = 'Becado'" ;
    }elseif(!(isset($_POST['class'])) AND !(isset($_POST['ciclo'])) AND !(isset($_POST['year'])) AND !(isset($_POST['todo'])))   
    {
        echo "<div class='alert alert-danger' style='margin:0 auto;text-align:center;'>Operación no valida</div>";
    }
?>
<div style="background-color:gray;color:white;width:95%;margin-left:3%;">
<table id="example" class="display" style="width:100%;margin-bottom:20px;">
        <thead style="background-color:black;color:white;">
            <tr>
                <th>Carné</th>
                <th>Nombre</th>
                <th>Class</th>
                <th>Universidad</th>
                <th>Carrera</th>
                <th>Sede</th>

            </tr>
        </thead>
        <br>
        <tbody>
        <?php 
        foreach ($dbh->query($consulta) as $ausentes) {
        ?>
        <tr>
            <td><?php echo $ausentes['ID_Alumno'] ?></td>
            <td><?php echo $ausentes['name'] ?></td>
            <td><?php echo $ausentes['Class'] ?></td>
            <td><?php echo $ausentes['ID_Empresa'] ?></td>
  
            <td><?php echo utf8_encode($ausentes['nombre']) ?></td>
            <td><?php echo $ausentes['ID_Sede']?></td>
        </tr>
        <?php  
    }}
        ?>
        </tbody>
 
    </table>
</div>
    <script type="text/javascript">
    	$(document).ready(function() {
    $('#example').DataTable( {

        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select style="margin-left: 10px;"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
        paging: false,
    	//searching: false
    } );
} );
    </script>
<br><br><br>
    <?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>