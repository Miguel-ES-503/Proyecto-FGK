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
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapsexample" role="button" aria-expanded="false" aria-controls="collapseExample">
             <i class="fas fa-clipboard-list"></i> Reportes <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapsexample">  
              <ul>
                <li><a href="Graficos.php" class="list-group-item list-group-item-action">Reportes por talleres</a></li>
               <li><a href="ReporteMensual.php" class="list-group-item list-group-item-action">Reportes Mensuales</a></li>
             <li><a href="ReporteTrimestral.php" class="list-group-item list-group-item-action">Reportes Trimestrales</a></li>
             

             </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

