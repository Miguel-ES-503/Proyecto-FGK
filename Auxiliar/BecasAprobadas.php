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
<br>

<style type="text/css" media="screen">
	.dt-buttons
	{
		margin-right: 100%;
		padding: 0%;

	}

	#example3_info
	{
		color: white;
	}

	
	.paginate_button {
		color: white;
		background: linear-gradient(to bottom, 
			#04040400 0%,
			#8a8a8a00 100%);
	}
  
  #example3_filter
  {
  	margin-top: -5%;

  }


</style>
<div class="container-fluid text-center">

	<!--Comiezo de estructura de trabajo -->
	<!--Navbar-->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Estados Becas</a>

		<!-- Collapse button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
		aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- Collapsible content -->
	<div class="collapse navbar-collapse" id="basicExampleNav">

		<!-- Links -->
		<ul class="navbar-nav mr-auto">
			
			<li class="nav-item">
				<a class="nav-link active" href="#" >Becas</a>
			</li>
		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->
<br>

<div class="card">

	<div class="card-header">
		<h4 style="color: black;">Lista de Becados por ciclos</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table   id="example3"  class="table table-hover table-sm table-bordered table-fixed" >
				<p>Descargar Lista becas</p>
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
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="DataTableExcel/main.js"></script>  

<?php

include 'Modularidad/PiePagina.php';
?>
