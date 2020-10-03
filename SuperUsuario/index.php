<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//Cambiar Despues
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Inicio Super-Usuario</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="container-fluid text-center" id="movil">

     <div>
        <h3 style="color:#9d120e;"> Bienvenido al sistema Side by Side del Programa Oportunidades</h3>
    </div>
    
   
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/Super1slider.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Super2slider.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Super3slider.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>
   <div class="row" style="">
        <div class="col-lg-11 col-md-8 col-sm-8 col-xs-12">
        <div id="novedades">
        <h3 style="text-align: left; font-weight: bold;">Novedades<h3>
        <img class="img-fluid" id="img1" src="../img/novedades.png" width="100px" height="100px">
        <div style="float: right; margin-left: 5px;"><p style="text-align: left;">Boletin</p>
        <img class="img-fluid" id="img2" src="../img/logonegro.png" width="150px">
        </div>
            <br>
        <center><a href="https://issuu.com/oportunidades0?issuu_product=header&issuu_subproduct=document_page&issuu_context=link&issuu_cta=profile" target="_black" style="text-decoration: none;"><button class="btn-leer">Leer</button></center>
        </div>
        <div id="avisos" >
        <h3  style="font-weight: bold;color: black;">Avisos<h3>
        <img class="img-fluid" src="../img/avisos.png" width="100px" height="100px">
        <div style="float: right; " ><p style="text-align: left;">Entérate de lo<br>
             más reciente:<br>
        </p>
        
    </div>
<center><a href="https://instagram.com/bk2oportunidades?igshid=9m3e1upgfi84" target="_black" style="text-decoration: none;"><button class="btn-visitar" >Visita IG</button></center>

        </div>
        <div id="enlaces">
        <table>

        <h3  style="font-weight: bold; color: black;">Enlaces<h3>
        
        <tr>
        <td>
          <a href="Manual/ManualEstudiante.pdf" target="_black">
        <img class="img-fluid" src="../img/manual.png" width="100px" height="100px">
        </a>
        <td>
        <h4 style="color:black;">Manual de usuario</h4>
        </td>
        </td>
        </tr>
        <tr>
        <td>
        <a href="http://workeysoportunidades.org/" target="_black"><img class="img-fluid" src="../img/landing.png" width="90px" height="90px">
        </td>
        <td>
        <h4 style="color:black;">Workey's landing page</h4>
        </td>

        </tr>
        </table>
        </div>


    </div>
    <br>
    </div>
   
  </div>




<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

