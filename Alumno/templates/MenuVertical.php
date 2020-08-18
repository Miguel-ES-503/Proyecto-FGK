<body >

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading justify-content-center align-items-center">
      <center>
      <img src ="../img/imgUser/<?php echo $_SESSION['Foto']?>" class="rounded-circle" class="img-responsive" style="width: 100px; height: 100px" >
       </center>
        <hr>
        <b><p style="font-size: 11px;"><?php echo $_SESSION['Email'] ?></p></b>
      </div>
      <div class="list-group list-group-flush">
        <ul class="snip1135">
          <li><a href="AlumnoInicio.php" class="list-group-item list-group-item-action"><i class="far fa-address-book"></i> Expediente</a></li>
                    <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fas fa-tasks"></i> Talleres <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample">
              <ul>
               <li><a href="AlumnoInscritos.php" class="list-group-item list-group-item-action">Talleres inscritos</a></li>
               <li><a href="AlumnoMensuales.php" class="list-group-item list-group-item-action">Talleres mensuales</a></li>
             </ul>

            </div>
          </li>


          <?php
          $anio=date("Y");
          $month=date("m");
          $que2=$pdo->prepare("SELECT `estado` FROM `inscripcion` WHERE MONTH(`Fecha`)='".$month."' AND YEAR(`Fecha`)='".$anio."' AND `ID_Sede`='".$_SESSION['Lugar']."'");
          $que2->execute();
          $estadoInsc;
          if ($que2->rowCount() >0)
          {
            $r2=$que2->fetch();
            $estadoInsc = $r2['estado'];
          }

          if ($estadoInsc=='Activo') {
          ?>
          <li><a href="AlumnoInscribir.php" class="list-group-item list-group-item-action"><i class="fas fa-pencil-alt"></i> Inscribir taller</a></li>
        <?php }else {
          ?>
          <li><a href="AlumnoInscribir.php" class="list-group-item list-group-item-action disabled"><i class="fas fa-pencil-alt"></i> Inscribir taller</a></li>
          <?php
        }
         ?>
          <li><a href="AlumnoReuniones.php" class="list-group-item list-group-item-action"><i class="fas fa-clipboard-list"></i> Reuniones</a></li>


        <!--Menu Transporte-->
           <li><a href="inscripcionTransporte.php" class="list-group-item list-group-item-action"><i class="fas fa-bus"></i> Transporte</a></li>
          <li>

        <!--Menu Carrera Universitaria-->


         <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
              <i class="fas fa-graduation-cap"></i> Universidad <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample2">
              <ul>
               <li><a href="expedienteU.php" class="list-group-item list-group-item-action"><i class="fas fa-user-graduate"></i> Expediente</a></li>


               <li><a href="pensum.php" class="list-group-item list-group-item-action">  <i class="fas fa-file-pdf"></i> Pensum</a></li>
               
               <li><a href="Notas.php" class="list-group-item list-group-item-action">  <i class="fas fa-book"></i> Materias</a></li>

               <li><a href="IndicacionesMaterias.php" class="list-group-item list-group-item-action">  <i class="fas fa-check"></i> Notas</a></li>
               <li><a href="IndicacionesRetiros.php" class="list-group-item list-group-item-action">  <i class="fas fa-ban"></i> Retiros</a></li>



             </ul>

            </div>
          </li>


            


            


        </ul>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
