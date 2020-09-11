<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
      require_once '../Conexion/conexion.php';
      include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos

?>
<title>Sesiones One on One</title>
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
  .modal-content{
  background-color: white;
  border-color: black;
  border-radius: 30px;
  padding: 20px;
}
.modal-body{
  text-align: left;
}

.form-control{
  background-color: #ADADB2;
  color: black;
  border-radius: 20px;

}
.modal-header{
  border-color: #ADADB2;
  border:3px;
}
.modal-footer{
  border-color: #ADADB2;
  border:3px;
}

}
</style>

<?php
 date_default_timezone_set('America/El_Salvador');
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
// include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" type="text/css" href="css/Sesiones-ONE.css">
<div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Sesiones one on one</a>
  
  
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


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
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center ">
<br>
<h1>Sesiones One on One</h1> 
<div class="bg-dark w-100 mx-auto rounded">
<h3 class="text-left titulo-OneonOne text-white text-center" >Lista de asistencia</h3>
<p class="text-white text-center">En este aparto le colocará la asistencia a los alumnos, las opciones son: asistió o no asistió.</p>

 <div class="col-xs-4 col-sm-4 col-md-12 col-lg-12">
                    <div id="tablapdf" >
                    <table  id="example" class="table table-hover table-sm table-bordered table-fixed" >
        <thead class="table-secondary">
                                <tr>
                                    <th>Titulo</th>
                                    <th>Alumno</th>
                                    <th>Sede</th>
                                    <th>Sexo</th>
                                    <th>Universidad</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Asistió</th>
                                    <th>No Asistió</th>
                                </tr>
                            </thead>
                        <tbody>
                              <?php
          require_once 'Modelo/ModeloAlumno/MostrarDatosReunion2.php';
          ?>
          </tbody>
          </table>
          </div>
                        </div>
                        </div>
                    </div>
                    

</div>
  <br> 
<script type="text/javascript" src="js/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script>
      $("#OpenModal").click(function (e) { 
        e.preventDefault();
        $('#myModal').modal('show');
      });
    </script>

<!-- Horarios inscritos -->

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>