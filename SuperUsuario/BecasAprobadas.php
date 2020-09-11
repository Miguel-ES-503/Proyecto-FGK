<?php
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Lista de becas por ciclos</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.topnav {
  overflow: hidden;
  background-color: #ADADB2;
  max-width: 100%;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  border-width: 3px;
  font-weight: bold;

 
}
.submenu1{
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
  background-color: #9d120e;
  border-width: 3px;
  font-weight: bold;
  height: 68px;
  letter-spacing: 2px;



}
.icon{
  

}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon1 {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon1 {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
    font-size: 15px;
    height: 50px;
  }
  .titulomenu a{
    font-size: 15px;
  }
    .botonresponsivo {
    max-width: 150px;
    
    margin-bottom: 1px;
    display: block;
    text-decoration: none;
  }
}
</style>

<?php
include 'Modularidad/EnlacesCabecera.php';
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once '../Conexion/conexion.php';
?>


<style type="text/css" media="screen">

	
	.dt-buttons
	{
		margin-right: 100%;
		padding: 0%;
		border-radius: 20px;

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
  	margin-top: -4%;

  }

  

</style>
<link rel="stylesheet" href="css/Competencia.css">
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<div class="container-fluid text-center">
	<div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Estados de Becas</a>
  <a href="" class="submenu1">Becas</a>
    <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>




<div class="card">

	<div class="card-header">
		<h5 style="color: black;">Lista de Becados por ciclos</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table   id="example3"  class="table table-hover table-sm table-bordered table-fixed" >
				<p>Descargar Lista becas<p>
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
				</tr>
			</thead>
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
  	<style>
	  .colorcito{
		background: green;
		border-radius: 20px;
	}
	  </style>
<?php

include 'Modularidad/PiePagina.php';
?>
