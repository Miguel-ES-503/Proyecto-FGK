<div>
    <style type="text/css">
        a:hover{
            background-color: #6A6B6B ;
            color: white;
        }
           #nel{
             pointer-events: none;
cursor: default;

        }
    </style>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="d-flex w-50 order-0">
        <a class="navbar-brand mr-1" href="#" id="nel">Talleres</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse justify-content-center order-2" id="collapsingNavbar">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="Graficos.php">Taller</a><!--Si se quiere poner espacio usar &nbsp-->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ReporteFecha.php">Fecha</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ReporteMensual.php">Mes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ReporteCiclo.php">Ciclo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ReporteAlumno.php">Alumno</a>
            </li>
        </ul>
    </div>
    <span class="navbar-text small text-truncate mt-1 w-50 text-right order-1 order-md-last"></span><!--No borrar-->
</nav>
</div>