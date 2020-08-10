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
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fas fa-chalkboard-teacher"></i> Administración <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample">  
              <ul>
               <li><a href="SIT-CrearAlumno.php" class="list-group-item list-group-item-action">Crear Cuentas</a></li>
               <li><a href="SIT-CrearEmpresas.php" class="list-group-item list-group-item-action">Crear Empresas</a></li>
               <li><a href="SIT-Ciclos.php" class="list-group-item list-group-item-action">Crear Ciclos</a></li>
               <li><a href="SIT-Competencias.php" class="list-group-item list-group-item-action">Crear Competencia</a></li>
             </ul>
           </div>
         </li>
         <li>
          <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-book"></i> Informativo <i class="fas fa-sort-down"></i>
          </a>

          <div class="collapse" id="collapseExample2">  
            <ul>
              <li><a href="BecasAprobadas.php" class="list-group-item list-group-item-action">Estado Beca</a></li> 
              <li><a href="RecordAlumnos.php" class="list-group-item list-group-item-action">Récord Alumnos</a></li> 
              <li><a href="LIS-Alumnos.php" class="list-group-item list-group-item-action">Listas Alumnos</a></li> 
              <li><a href="LIS-Cuentas.php" class="list-group-item list-group-item-action">Lista Cuentas</a></li>
              
            </ul>
          </div>
        </li>
        
        <br>
        <li>
          <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-envelope"></i> Solicitud <i class="fas fa-sort-down"></i>
          </a>
          <div class="collapse" id="collapseExample4">  
            <ul>
              <li><a href="CampoLaboral.php" class="list-group-item list-group-item-action"  >Campo Laboral</a></li> 
              
            </ul>
          </div>
      </li>

      <li>
        <a class="list-group-item list-group-item-action" href="Manual/manual.pdf" >
        <i class="fas fa-info-circle"></i> Instrucciones
        </a>
      </li>





         

      </ul>
    </div>
  </div>
  <!-- /#sidebar-wrapper -->

</div>