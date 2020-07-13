<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading justify-content-center align-items-center">
        <center>
          <img src ="../img/imgUser/<?php echo $_SESSION['Foto']?>" class="rounded-circle" class="img-responsive" style="width: 100px; height: 100px" >
        </center> 
        <hr>
        <b><p style="font-size: 10px; text-align: center; "><?php echo $_SESSION['Email'] ?></p></b>
      </div>
      <div class="list-group list-group-flush">
        <ul class="snip1135">
          
          

          <li>
            <a class="list-group-item list-group-item-action" href="Calendario.php" >
              <i class="far fa-calendar-alt"></i>  Calendario 
            </a>
          </li>

          

          <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fas fa-chalkboard-teacher"></i> Administración <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample">  
              <ul>
               <li><a href="SIT-ProcesoInscripcion.php" class="list-group-item list-group-item-action">Hora Inscripción</a></li>
               <li><a href="SIT-CrearTaller.php" class="list-group-item list-group-item-action">Crear Taller</a></li>
               <li><a href="LIS-Talleres.php" class="list-group-item list-group-item-action">Talleres Activos</a></li>
             </ul>
           </div>
         </li>

         <li>
          <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-book"></i> Informativo <i class="fas fa-sort-down"></i>
          </a>
          <div class="collapse" id="collapseExample2">  
            <ul> 
             <li><a href="ListadoTalleresFinalizado.php" class="list-group-item list-group-item-action">Talleres Finalizados</a></li> 
             <li><a href="ListadoTalleresDesactivo.php" class="list-group-item list-group-item-action">Talleres Desactivos</a></li> 
             <li><a href="RecordAlumnos.php" class="list-group-item list-group-item-action">Récord Alumnos</a></li> 
           </ul>
         </div>
       </li>
       
       <li>
        <a class="list-group-item list-group-item-action" href="Graficos.php" >
          <i class="fas fa-archive"></i> Reportes Talleres 
        </a>
      </li>


      <li>
        <a class="list-group-item list-group-item-action" href="ReporteCompetenciasFecha.php" >
          <i class="fas fa-archive"></i> Reportes Competencias
        </a>
      </li>
      
      <li>
        <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
          <i class="fas fa-envelope"></i> Solicitud <i class="fas fa-sort-down"></i>
        </a>
        <div class="collapse" id="collapseExample4">  
          <ul> 
            <li><a href="PermisosDesincribirTaller.php" class="list-group-item list-group-item-action">Permisos Talleres</a></li> 
          </ul>
        </div>
      </li>

      <li>
        <a class="list-group-item list-group-item-action" href="Manual/ManualTaller.pdf" >
          <i class="fas fa-info-circle"></i> Instrucciones
        </a>
      </li>
      

    </ul>
  </div>
</div>
<!-- /#sidebar-wrapper -->

