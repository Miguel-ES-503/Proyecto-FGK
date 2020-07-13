<!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg border-bottom" id="menu">
          <button class="btn btn-dark" id="menu-toggle" style="background: #717175;"><i class="fas fa-bars"></i></button>
    
    <center>
      <a href="http://portal.workeysoportunidades.org/Auxiliar/index.php">
        <img width="100px" height="30px" src="../img/WorkeysBlanco.png" alt="">
      </a>
    </center>


        <button class="navbar-toggler btn-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><i class="fas fa-sort-down"></i></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

            <?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos

            $consulta20=$pdo->prepare("SELECT COUNT(`ID_HSociales`)as 'soliHoras' FROM hsociales WHERE `estado` = 'En espera' ");
            $consulta20->execute();
            $resultHoras;
            if ($consulta20->rowCount()>=1)
            {
              while ($fila20=$consulta20->fetch()) {

                $resultHoras = $fila20['soliHoras'];

             }//fin de while
              }// in del if


              if($resultHoras == null)
              {
                $resultHoras = 0;
              }else
              {
                $resultHoras;
              }



              $consulta21=$pdo->prepare("SELECT COUNT(`id_solicitud`)AS 'soliTalleres' FROM solicituddesinscribir WHERE `estado` = 'En espera'");
              $consulta21->execute();
              $resultTalleres;
              if ($consulta21->rowCount()>=1)
              {
                while ($fila21=$consulta21->fetch()) {

                  $resultTalleres = $fila21['soliTalleres'];

             }//fin de while
              }// in del if


              if($resultTalleres == null)
              {
                $resultTalleres = 0;
              }else
              {
                $resultTalleres;
              }


              $resultTotal = $resultTalleres + $resultHoras;

            ?>

            


            <li class="nav-item dropdown" >
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-bell"></i> <span class="badge badge-dark"><?php echo$resultTotal ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background: #343a40;">
                <a class="dropdown-item" href="PermisosDesincribirTaller.php" style="color: white;">Permisos Talleres <span class="badge badge-dark"><?php echo$resultTalleres ?></span></a>
                <a class="dropdown-item" href="HorasVinculacion.php" style="color: white;">Horas Sociales <span class="badge badge-dark"><?php echo$resultHoras ?></span></a>
              </div>
            </li>
      
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php 
              $NombreUser = $_SESSION['Nombre'];
              $PrimerNombre = explode(" ", $NombreUser);
              echo $PrimerNombre[0]." ".$PrimerNombre[2]; 
              ?>
              </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background: #343a40;">
                <a class="dropdown-item" href="Configuracion.php" style="color: white;">Configuración</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../CerrarSession.php" style="color: white;">Salir</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>


