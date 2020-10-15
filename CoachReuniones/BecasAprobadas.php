<?php
include 'Modularidad/CabeceraInicio.php';
?>
<title>Lista de becas por ciclos</title>

<?php
include 'Modularidad/EnlacesCabecera.php';
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once '../Conexion/conexion.php';
?>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/Becas-Aprobadas.css">
<div class="title">
    <img src="../img/back.png" class="icon">
    <h2 class="main-title" >Estado de Becas</h2>
    <!--<div class="title2">
        <br>
    <div class="title2-text">
    <a href="#" style="text-decoration: none;"><p><img src="../img/Ver.png" class="icon-2">Becas</p></a>
</div>
</div>-->
</div>
<br><br><br>
<div class="container-fluid text-center">
<div>

	<div>
		<h4 style="color: black;">Lista de Becados por ciclos</h4>
	</div>
	<div class="card-body" style="border-radius: 20px;">
		<div class="table-responsive">
			<table   id="example3"  class="table table-hover table-sm table-bordered table-fixed">
				  <a href="#" class="float-left" >
				<button class="btn btn-success" id="button"><img src="../img/excell.png">Descargar</button></a>
				<thead class="table-secondary">
					<tr>  
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
						<th scope="col">Class</th>
						<th scope="col">Sede</th>
						<th scope="col">Univerisdad</th>
						<th scope="col">Estado laboral</th>
						<th scope="col">STATUS ACTUAL</th>
						<th scope="col">Interno</th>	
						<th scope="col">Externo</th>
						<th scope="col">Reuniones</th>
						<th scope="col">Total</th>	
						<th scope="col">Horas Vinculación</th>
						<th scope="col">Porcentaje</th>	
						<th scope="col">Estado</th>	
						<th scope="col">Modificar Beca</th>	
					</tr>
				</tr>
			</thead>
			<tfoot class="table-secondary">
				<tr>   
					<th scope="col">ID</th>
					<th scope="col">Nombre</th>
					<th scope="col">Class</th>
					<th scope="col">Sede</th>
					<th scope="col">Univerisdad</th>
					<th scope="col">Estado laboral</th>
					<th scope="col">STATUS ACTUAL</th>
					<th scope="col">Interno</th>	
					<th scope="col">Externo</th>
					<th scope="col">Reuniones</th>
					<th scope="col">Total</th>	
					<th scope="col">Horas Vinculación</th>
					<th scope="col">Porcentaje</th>	
					<th scope="col">Estado</th>	
					<th scope="col">Modificar Beca</th>	


				</tr>
			</tr>
		</tfoot>
		<tbody>
			
			<?php
			include 'Modelo/ModeloBecas/ComprobanteBecas.php'
			?>
		</tbody>        
	</table>  
</div>

</div>
</div>


<br>

<!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="DataTableExcel/jquery/jquery-3.3.1.min.js"></script>
    <script src="DataTableExcel/popper/popper.min.js"></script>
    <script src="DataTableExcel/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="DataTableExcel/datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="DataTableExcel/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="DataTableExcel/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="DataTableExcel/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="DataTableExcel/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="DataTableExcel/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo AQUI ESTA LO DEL DATA TABLE-->    
    <script type="text/javascript" src="DataTableExcel/main.js"></script>  

<?php

include 'Modularidad/PiePagina.php';
?>
