<?php require_once 'templates/head.php'; ?>
<title>Historial Notas</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
<?php  
  
  //Manda  allamar plantillas
  require_once 'templates/header.php';

  //require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';

        //Carnet del alumno
        $stmt1 =$dbh->prepare("SELECT `ID_Alumno`  FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
        $stmt1->execute();
         while($fila = $stmt1->fetch()){
           $alumno=$fila["ID_Alumno"];
         }//Fin de while 



         // Expediente U
        $consulta=$pdo->prepare("SELECT idExpedienteU  FROM expedienteu WHERE ID_Alumno = ? AND estado = 'Activo'");
     
        $consulta->execute(array($alumno));
        $idExpedienteU;
         if ($consulta->rowCount()>=1)
         {
           while ($fila=$consulta->fetch())
           {   
             $idExpedienteU = $fila['idExpedienteU'];
           }
         }//fin de condicion


?>

 

<!--div principal-->
<div class="container-fluid text-center">
  <!--Navbar-->
 
  <div class="title">
	<a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Historial Notas</h2>
</div>
<br>



<!--///////////////////////////////////////////////-->
<!--Para ver el nombre del archivo que sube-->
    <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
  
  <!--Fin de funcion-->
  <!--///////////////////////////////////////////////-->



    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

 

<!--/.Navbar-->
  
  <div>

    <div>

                             
        <div class="container" style="background: white; "><br>

         <br>   
         <br>   
                  
           <div class="row">
             
              <!--Primera columna-->
                  <div class="col-sm" style="color: #343434;">

                              
                             

                  <style type="text/css">

.card{
  background: red;
}
  table {
    border-collapse: separate;
    border-spacing: 6px;
    background:  bottom left repeat-x;
    color: #fff;


  }

  tr, th{
    background: white;
    color: #585858;
    text-align: center;


  }
  td  {
    width: 150px;
    background: #D8D8D8;
    border-radius: 3px;
    color: #000;
  }

   .oscuro{
    background: #A4A4A4;

  }



  h3 {
    color: #be0032;
  }

  h4{
    color: white;
  }
  div.centerTable{
text-align: center;
 }

 h5, p{ text-align: center; }



div.centerTable table {
 margin: 0 auto;
 text-align: left;
 width: 100%;
}

.alert{
  height: 50px;
}

  
</style>


<div class='centerTable '>
<table  id="makeEditable"  >

  
  <thead>
    <tr>
      <th style="color: red;">Codigo</th>
      <th style="color: red;">Asignatura</th>
      
      <th style="color: red;">Ciclo</th>
      <th style="color: red;">Nota</th>
      <th style="color: red;">Estado</th>
      
    </tr>
  </thead>

  <tbody>
   
  <?php
        //consulta que muestra las materias
       $consulMaterias=$pdo->prepare("SELECT  IM.nota,IM.idMateria,IM.matricula, M.nombreMateria, IM.estado, IC.cicloU, M.idExpedienteU
      from materias M
      INNER JOIN inscripcionmateria IM
      ON IM.idMateria= M.idMateria

      INNER JOIN inscripcionciclos IC
      ON IC.Id_InscripcionC=IM.Id_InscripcionC
  
      WHERE M.idExpedienteU = ? AND (IM.estado = 'Reprobada' OR IM.estado = 'Aprobada' OR IM.estado ='Retirada' ) ");

       $consulMaterias->execute(array($idExpedienteU));



        
        if ($consulMaterias->rowCount()>=1)
        {
          while ($fila2=$consulMaterias->fetch())
          { 


            if ($fila2['estadoM'] !='Inscrita') {

              echo "<tr>
                   <td >".$fila2['idMateria']."</td>
                   <td class='oscuro'>".$fila2['nombreMateria']."</td>
                   
                    <td >".$fila2['cicloU']."</td>
                      <td >".$fila2['nota']."</td>
                   <td >".$fila2['estado']."</td>
                 </tr>";     

       
        
            }else
                {

                  echo "<tr>
                   <td >".$fila2['idMateria']."</td>
                   <td class='oscuro'>".$fila2['nombreMateria']."</td>
                   <td ></td>
                    <td ></td>
                     <td >".$fila2['nota']."</td>
                   <td >".$fila2['estadoM']."</td>
                  
                   


                   
                 </tr>";     

      
                 } //fin de else



          
                           
              }//fin de while
           }else{
             echo "<tr><td colspan='6'>No ha agregado ninguna Asignatura</td></tr>";
           }//fin de else-if
                                      

                                 
           ?>
             



 </tbody>

 <tfoot>
   
 </tfoot>
</table>
</div>
<br>
<br>
<br><br><br>

                           
                         <br> 
                        
                          <!--div class="f1-buttons">
                              <button type="button" class="btn btn-next btn-dark">Enviar</button>
                         </div-->
                         <br>


                  </div>

              <!-- Fin Primera columna-->

                      <br>
                      
     
   
          </div> <!--Fin de row-->


        </div><!--Fin de container-->

      </div> 

    </div>
 </div> 
 <br>
 <br><br><br>
</div><!-- Fin de div principal-->

<!-- /#page-content-wrapper -->





</div>

<!-- /#wrapper -->





<?php

 require_once 'templates/footer.php';

?>