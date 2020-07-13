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
              <li><a href="SIT-CrearReunion.php" class="list-group-item list-group-item-action">Crear Reunión</a></li>
              <li><a href="LIS-Reunion.php" class="list-group-item list-group-item-action">Reuniones Activos</a></li>
              <li><a href="reunionesFinalizados.php" class="list-group-item list-group-item-action">Reuniones Finalizadas</a></li>
             </ul>
           </div>
         </li>
          <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-user-graduate"></i>Estudiantes<i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample4">  
              <ul>
                <li><a href="LIS-Alumnos.php" class="list-group-item list-group-item-action">Alumnos</a></li>
                <li><a href="RecordAlumnos.php" class="list-group-item list-group-item-action">Récord Alumnos</a></li>
                <li><a href="BecasAprobadas.php" class="list-group-item list-group-item-action">Estado Beca</a></li> 
               </ul>
            </div>
          </li>

<br>
          <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
             <i class="far fa-envelope"></i>Solicitud <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample3">  
              <ul>
              <li><a href="HorasVinculacion.php" class="list-group-item list-group-item-action">Horas De Vinculación</a></li> 
                  
               </ul>
            </div>
          </li>

             <li>
        <a class="list-group-item list-group-item-action" href="Manual/ManualTaller.pdf" >
          <i class="fas fa-info-circle"></i> Instrucciones
        </a>
      </li>

      <li>
        <a class="list-group-item list-group-item-action" href="ReporteReuniones.php" >
          <i class="fas fa-chart-pie"></i> Reporteria
        </a>
      </li>
      <!-- Link de preguntas Frecuentes -->
      <li>
        <a class="list-group-item list-group-item-action" href="preguntas.php" ><i class="fas fa-question-circle"></i> Preguntas Frecuentes
        </a>
      </li>
      <!-- fin de preguntas frecuentes -->
      <li>
        <a class="list-group-item list-group-item-action" href="sessionesOneonOne.php"><i class="fas fa-user-friends"></i> Sesiones Individuales
        </a>
      </li>
      <li>
        <a class="list-group-item list-group-item-action" href="modulosMoodle.php"><i class="fas fa-briefcase"></i> Módulos
        </a>
      </li>
      </ul>
    </div>
  </div>
  <!-- /#sidebar-wrapper -->

