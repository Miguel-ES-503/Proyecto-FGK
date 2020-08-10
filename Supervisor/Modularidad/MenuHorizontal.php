<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading justify-content-center align-items-center">
      <center>
      <img src ="../img/imgUser/<?php echo $_SESSION['Foto']?>" class="rounded-circle" class="img-responsive" style="width: 100px; height: 100px" >
       </center> 
        <hr>
        <b><p style="font-size: 11px; text-align: center; "><?php echo $_SESSION['Email'] ?></p></b>
      </div>
      <div class="list-group list-group-flush">
        <ul class="snip1135">
           <li>

           	<!--*******************Si quieren que el menu sea en cascada***************-->
           	<!--
           	 <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapsexample1" role="button" aria-expanded="false" aria-controls="collapseExample">
             <i class="fas fa-clipboard-list"></i> Reportes Competencias Top <i class="fas fa-sort-down"></i>
            </a>-->

            <!--**************************************************************************-->

            <a class="list-group-item list-group-item-action" data-toggle="" href="Graficos.php" role="" >
             <i class="fas fa-clipboard-list"></i> Reportes  Talleres<i class=""></i>
            </a>
           <?php /*
            <div class="collapse" id="collapsexample">  
              <ul>
                <li><a href="Graficos.php" class="list-group-item list-group-item-action">Reporte por Taller</a></li>
                <li><a href="ReporteFecha.php" class="list-group-item list-group-item-action">Reporte por Fecha</a></li>
               <li><a href="ReporteMensual.php" class="list-group-item list-group-item-action">Reporte por Mes</a></li>
             	<li><a href="ReporteCiclo.php" class="list-group-item list-group-item-action">Reporte por Ciclo</a></li>
             	<li><a href="ReporteAlumno.php" class="list-group-item list-group-item-action">Reporte por alumno</a></li>                  
             </ul>
            </div>
            */?>
          </li>
          <li>
            <!--<a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapsexample1" role="button" aria-expanded="false" aria-controls="collapseExample">
             <i class="fas fa-clipboard-list"></i> Reportes Competencias Top <i class="fas fa-sort-down"></i>
            </a>-->
            <a class="list-group-item list-group-item-action" data-toggle="" href="ReporteCompetencias.php" role="" >
             <i class="fas fa-layer-group"></i> Reportes  Competencias Top<i class=""></i>
            </a>
            <?php /*
            <div class="collapse" id="collapsexample1">  
              <ul>     
              <li><a href="ReporteCompetenciasFecha.php" class="list-group-item list-group-item-action">Reportes por Fechas</a></li>     
             <li><a href="ReporteCompetencias.php" class="list-group-item list-group-item-action">Reportes por Mes</a></li>
             <li><a href="ReporteCompetenciasCiclo.php" class="list-group-item list-group-item-action">Reportes por Ciclo</a></li>
             
             <li><a href="ReporteCompetenciasTrimestre.php" class="list-group-item list-group-item-action">Reportes por Trimestres</a></li>
             </ul>
            </div>
            */?>
          </li>
          <!--li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapsexample2" role="button" aria-expanded="false" aria-controls="collapseExample">
             <i class="fas fa-clipboard-list"></i> Talleres <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapsexample2">  
              <ul>     
              <li><a href="SIT-CrearTaller.php" class="list-group-item list-group-item-action">Crear taller</a></li>     
             </ul>
            </div>
          </li-->
        </ul>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

