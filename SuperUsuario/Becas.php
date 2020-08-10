<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//Cambiar Despues
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Inicio Super Usuario</title>
 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="DataTableExcel/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="DataTableExcel/main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="/DataTableExceldatatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="DataTableExcel/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once '../Conexion/conexion.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid">
<div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <h2 class="main-title" >Estados de Becas</h2>
  <div class="title2" style="background-color: #9d120e">
  <a class="nav-link active" href="#" >Becas</a>
</div>
</div>
			<!--Comiezo de estructura de trabajo -->
		<!--Navbar-->
	

<h5 style="color:black">Lista de Becados por ciclos</h5>



<!--Ejemplo tabla con DataTables-->

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">        
				<table id="example3" class="table table-striped table-bordered" cellspacing="0" width="100%">
			
					<thead class="thead-dark">
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
						</tr>
					</thead>
					<tfoot class="thead-dark">
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
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="DataTableExcel/main.js"></script>  

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

