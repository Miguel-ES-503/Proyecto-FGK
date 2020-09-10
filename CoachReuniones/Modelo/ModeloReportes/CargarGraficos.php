<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<?php
require_once "../../../BaseDatos/conexion.php";



$NombreReu = $_POST['id'];
$Ano = $_POST['year'];
$Financiamiento = $_POST['financiamieto'];
#===========Se agrega la clase a la tabla
echo"<script>";
echo"$(document).ready(function(){";
    echo "var dato= '<thead class=\"text-white\"><tr><th >Universidad</th> <th >Asistieron</th> <th >No asistieron</th> <th >No inscritos</th></tr> </thead>';";
    echo"$('#table').append(dato);";
    echo "var dat = '<tbody class=\"bg-light\" >';";
    echo "$('#table').append(dat);";
    echo" $('#table').addClass(  'table-dark text-dark' );";
  echo" $('#fondo').addClass(  'card' );";
  echo"});";
echo"</script>";
#===========CON EL SIGUIENTE BLOQUE DE CONSULTAS SE OBTIENE EL TOTAL GENERAL DE TODAS LAS UNIVERSIDADES,
#===========EN OTRAS PALABRAS ES LA SUMATORIA DE LOS GRAFICOS PEQUENOS
if ($Financiamiento == 'FGK') {
    #Con la consulta query se obtiene el total de alumnos que han asistido a las reuniones 
    $queryG = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
    FROM reuniones R 
    INNER JOIN inscripcionreunion IR 
    ON R.ID_Reunion = IR.id_reunion  
    LEFT JOIN alumnos A 
    ON IR.id_alumno = A.ID_Alumno
    WHERE R.Titulo = ? AND (A.FuenteFinacimiento = 'FGK' || A.FuenteFinacimiento = 'Beca Externa con Apoyo Adicion')  AND   IR.asistencia='Asistio' AND Date_Format(R.Fecha,'%Y') = ? ";
    $consultaG =$pdo->prepare($queryG);
    $consultaG->execute(array($NombreReu,$Ano));
    $filaG = $consultaG->fetch();

    #Con la consulta query3 se obtienen el total de alumnos que no se inscribieron a la reunion
    $query3G = "SELECT COUNT(ID_Alumno) as 'T'
    FROM alumnos 
    WHERE   (FuenteFinacimiento = 'FGK' || FuenteFinacimiento = 'Beca Externa con Apoyo Adicion')  AND ID_Alumno NOT IN( 
        SELECT IR.id_alumno 
        FROM reuniones R
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno 
        WHERE R.Titulo = ?
        AND (A.FuenteFinacimiento  = 'FGK' || A.FuenteFinacimiento = 'Beca Externa con Apoyo Adicion')
        
        AND Date_Format(R.Fecha,'%Y')= ?)";
    $consulta3G =$pdo->prepare($query3G);
    $consulta3G->execute(array($NombreReu, $Ano));
    $fila3G = $consulta3G->fetch();

   #Con la consulta query3 se obtienen el total de alumnos que no asistieron a la reunion
   $query4G = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
   FROM reuniones R 
   INNER JOIN inscripcionreunion IR 
   ON R.ID_Reunion = IR.id_reunion  
   LEFT JOIN alumnos A 
   ON IR.id_alumno = A.ID_Alumno
   WHERE R.Titulo = ? AND (A.FuenteFinacimiento = 'FGK' || A.FuenteFinacimiento = 'Beca Externa con Apoyo Adicion')   AND   IR.asistencia='Inasistencia' AND Date_Format(R.Fecha,'%Y') = ?";
   $consulta4G =$pdo->prepare($query4G);
   $consulta4G->execute(array($NombreReu,$Ano));
   $fila4G = $consulta4G->fetch();
}else{
    #Con la consulta query se obtiene el total de alumnos que han asistido a las reuniones 
    $queryG = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
    FROM reuniones R 
    INNER JOIN inscripcionreunion IR 
    ON R.ID_Reunion = IR.id_reunion  
    LEFT JOIN alumnos A 
    ON IR.id_alumno = A.ID_Alumno
    WHERE R.Titulo = ? AND A.FuenteFinacimiento = ?   AND   IR.asistencia='Asistio' AND Date_Format(R.Fecha,'%Y') = ?";
    $consultaG =$pdo->prepare($queryG);
    $consultaG->execute(array($NombreReu,$Financiamiento,$Ano));
    $filaG = $consultaG->fetch();


    #Con la consulta query3 se obtienen el total de alumnos que no se inscribieron a la reunion
    $query3G = "SELECT COUNT(ID_Alumno) as 'T'
    FROM alumnos 
    WHERE   FuenteFinacimiento= ?  AND ID_Alumno NOT IN( 
        SELECT IR.id_alumno 
        FROM reuniones R
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno 
        WHERE R.Titulo = ?
        AND A.FuenteFinacimiento = ?
        AND Date_Format(R.Fecha,'%Y')= ?)";
    $consulta3G =$pdo->prepare($query3G);
    $consulta3G->execute(array($Financiamiento,$NombreReu,$Financiamiento, $Ano));
    $fila3G = $consulta3G->fetch();

    #Con la consulta query3 se obtienen el total de alumnos que no asistieron a la reunion
    $query4G = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
    FROM reuniones R 
    INNER JOIN inscripcionreunion IR 
    ON R.ID_Reunion = IR.id_reunion  
    LEFT JOIN alumnos A 
    ON IR.id_alumno = A.ID_Alumno
    WHERE R.Titulo = ? AND A.FuenteFinacimiento = ?   AND   IR.asistencia='Inasistencia' AND Date_Format(R.Fecha,'%Y') = ?";
    $consulta4G =$pdo->prepare($query4G);
    $consulta4G->execute(array($NombreReu,$Financiamiento,$Ano));
    $fila4G = $consulta4G->fetch();

}
#====================AQUI FINALIZAN LAS CONSULTAS PARA EL GRAFICO PRINCIPAL===============


#Con la consulta queryPrincipal se obtienen los datos de las empresas en las que se han impartido reuniones
$queryPrincipal="SELECT DISTINCT(r.ID_Empresa) as 'Empresa' , e.Nombre as 'Nombre'
FROM `reuniones` r
INNER JOIN empresas e 
ON r.ID_Empresa = e.ID_Empresa
WHERE  r.Titulo = ? AND Date_Format(r.Fecha,'%Y') = ?";
$consultaPrincipal = $pdo->prepare($queryPrincipal);

$consultaPrincipal->execute(array($NombreReu,$Ano));
$i=0;
$InasistenciaG =0;
$AsistenciaG =0;
$IniscritosG = 0;
while($filaPrincipal = $consultaPrincipal->fetch()){
    if ($Financiamiento == 'FGK') {
        #Con la consulta query se obtiene el total de alumnos que han asistido a las reuniones 
        $query = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = ? AND (A.FuenteFinacimiento = 'FGK' || A.FuenteFinacimiento = 'Beca Externa con Apoyo Adicion')  AND R.ID_Empresa = ? AND   IR.asistencia='Asistio' AND Date_Format(R.Fecha,'%Y') = ? ";
        $consulta =$pdo->prepare($query);
        $consulta->execute(array($NombreReu,$filaPrincipal['Empresa'],$Ano));
        $fila = $consulta->fetch();
        $AsistenciaG = $fila['TotalAlum'] + $AsistenciaG;
        #Con la consulta query2 se obtiene el total de alumnos becados por universidad
        $query2 = "SELECT COUNT(ID_Alumno) as 'T' from alumnos where (FuenteFinacimiento = 'FGK' || FuenteFinacimiento = 'Beca Externa con Apoyo Adicion') AND ID_Empresa = ?";
        $consulta2 =$pdo->prepare($query2);
        $consulta2->execute(array($filaPrincipal['Empresa']));
        $fila2 = $consulta2->fetch();
        #Con la consulta query3 se obtienen el total de alumnos que no se inscribieron a la reunion
        $query3 = "SELECT COUNT(ID_Alumno) as 'T'
        FROM alumnos 
        WHERE  ID_Empresa = ? AND  (FuenteFinacimiento = 'FGK' || FuenteFinacimiento = 'Beca Externa con Apoyo Adicion')  AND ID_Alumno NOT IN( 
            SELECT IR.id_alumno 
            FROM reuniones R
            INNER JOIN inscripcionreunion IR 
            ON R.ID_Reunion = IR.id_reunion
            LEFT JOIN alumnos A 
            ON IR.id_alumno = A.ID_Alumno 
            WHERE R.Titulo = ?
            AND (A.FuenteFinacimiento  = 'FGK' || A.FuenteFinacimiento = 'Beca Externa con Apoyo Adicion')
            AND R.ID_Empresa = ? 
            AND Date_Format(R.Fecha,'%Y')= ?)";
        $consulta3 =$pdo->prepare($query3);
        $consulta3->execute(array($filaPrincipal['Empresa'],$NombreReu,$filaPrincipal['Empresa'], $Ano));
        $fila3 = $consulta3->fetch();
        $IniscritosG = $fila3['T'] +$IniscritosG;
       #Con la consulta query3 se obtienen el total de alumnos que no asistieron a la reunion
       $query4 = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
       FROM reuniones R 
       INNER JOIN inscripcionreunion IR 
       ON R.ID_Reunion = IR.id_reunion  
       LEFT JOIN alumnos A 
       ON IR.id_alumno = A.ID_Alumno
       WHERE R.Titulo = ? AND (A.FuenteFinacimiento = 'FGK' || A.FuenteFinacimiento = 'Beca Externa con Apoyo Adicion')  AND R.ID_Empresa = ? AND   IR.asistencia='Inasistencia' AND Date_Format(R.Fecha,'%Y') = ?";
       $consulta4 =$pdo->prepare($query4);
       $consulta4->execute(array($NombreReu,$filaPrincipal['Empresa'],$Ano));
       $fila4 = $consulta4->fetch();
       $InasistenciaG = $fila4['TotalAlum'] + $InasistenciaG;
    }else{
        #Con la consulta query se obtiene el total de alumnos que han asistido a las reuniones 
        $query = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = ? AND A.FuenteFinacimiento = ?  AND R.ID_Empresa = ? AND   IR.asistencia='Asistio' AND Date_Format(R.Fecha,'%Y') = ?";
        $consulta =$pdo->prepare($query);
        $consulta->execute(array($NombreReu,$Financiamiento,$filaPrincipal['Empresa'],$Ano));
        $fila = $consulta->fetch();
        $AsistenciaG = $fila['TotalAlum'] + $AsistenciaG;
        #Con la consulta query2 se obtiene el total de alumnos becados por universidad
        $query2 = "SELECT COUNT(ID_Alumno) as 'T' from alumnos where FuenteFinacimiento = ? AND ID_Empresa = ? ";
        $consulta2 =$pdo->prepare($query2);
        $consulta2->execute(array($Financiamiento,$filaPrincipal['Empresa']));
        $fila2 = $consulta2->fetch();

        #Con la consulta query3 se obtienen el total de alumnos que no se inscribieron a la reunion
        $query3 = "SELECT COUNT(ID_Alumno) as 'T'
        FROM alumnos 
        WHERE  ID_Empresa = ? AND FuenteFinacimiento= ?  AND ID_Alumno NOT IN( 
            SELECT IR.id_alumno 
            FROM reuniones R
            INNER JOIN inscripcionreunion IR 
            ON R.ID_Reunion = IR.id_reunion
            LEFT JOIN alumnos A 
            ON IR.id_alumno = A.ID_Alumno 
            WHERE R.Titulo = ?
            AND A.FuenteFinacimiento = ?
            AND R.ID_Empresa = ? 
            AND Date_Format(R.Fecha,'%Y')= ?)";
        $consulta3 =$pdo->prepare($query3);
        $consulta3->execute(array($filaPrincipal['Empresa'],$Financiamiento,$NombreReu,$Financiamiento,$filaPrincipal['Empresa'], $Ano));
        $fila3 = $consulta3->fetch();
        $IniscritosG = $fila3['T'] +$IniscritosG;
        #Con la consulta query3 se obtienen el total de alumnos que no asistieron a la reunion
        $query4 = "SELECT  COUNT(IR.id_alumno) AS 'TotalAlum' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = ? AND A.FuenteFinacimiento = ?  AND R.ID_Empresa = ? AND   IR.asistencia='Inasistencia' AND Date_Format(R.Fecha,'%Y') = ?";
        $consulta4 =$pdo->prepare($query4);
        $consulta4->execute(array($NombreReu,$Financiamiento,$filaPrincipal['Empresa'],$Ano));
        $fila4 = $consulta4->fetch();
        $InasistenciaG = $fila4['TotalAlum'] + $InasistenciaG;
    }
    

//Para crear la tabla dinamicamente
echo"<script>";
echo"$(document).ready(function(){";

    echo "var nuevoTr= '<tr><th>".$filaPrincipal['Empresa']."</th><th>".$fila['TotalAlum']."</th><th>".$fila4['TotalAlum']."</th><th>".$fila3['T']."</th></tr>';";
  echo " $('#table').append(  nuevoTr );";

  echo"});";
echo"</script>";
//echo "<button type='button' class='btn btn-info' data-toggle='modal'
//data-target='#exampleModal'>Información</button>";
$name = $fila['TotalAlum'];
//echo "<script>alert(".($fila2['T'] - $name).");</script>";
$Company =str_replace(' ', '', $filaPrincipal['Empresa']);
if ($i ==0) {
    echo "<div class= 'card'>";
    echo "<div class=' row' style='margin-top: 10px;'>";
    echo "<div id=".$Company." class = 'col-md-4'></div> ";
    echo "<div class='col-md-2'>";
        echo "<div class=' row '>";
        echo " <div style='padding-left: 0;' class='col-md-12' width:50px;><button style='margin-top:10px;width:90%; border-color: #696969;'  type='button' class='btn btn-outline-dark' data-toggle='modal' data-target='#'>Poblacion<br>Estudiantil<br><b>".$fila2['T']." Alumnos</b></div>";
    echo " <div class='w-100'></div>";
            echo "<div style='padding-left: 0;' class='col-12 ' ><button style='margin-top:10px;width:90%; border-color: #43E684;' type='button' class='btn btn-outline-dark' data-toggle='modal'
            data-target='#".$Company."1'>Asistieron</button> </div> ";
            echo " <div class='w-100'></div>";
            echo "<div style='padding-left: 0;' class='col-12' ><button style='margin-top:10px;width:90%; border-color: #A61C1C;' type='button' class='btn btn-outline-dark' data-toggle='modal'
            data-target='#".$Company."2'>Inasistieron</button> </div> ";
            echo " <div class='w-100'></div>";
            
            echo "<div  style='padding-left: 0;' class='col-12'  ><button  style='margin-top:10px;width:90%; border-color: #F2C438;' type='button' class='btn btn-outline-dark' data-toggle='modal'
            data-target='#".$Company."3'>No incritos</button> </div> </div></div>";
   

    $i++;
}

else if($i==1)
{
    echo "<div id=".$Company." class = 'col-md-4'></div>";
    echo "<div class='col-md-2'>";
    echo "<div class='row '>";
    echo " <div style='padding-left: 0;' class='col-md-12' width:50px; ><button style='margin-top:10px;width:90%; border-color: #696969;'  type='button' class='btn btn-outline-dark' data-toggle='modal' data-target='#'>Poblacion<br>Estudiantil<br><b>".$fila2['T']." Alumnos</b></div>";
    echo " <div class='w-100'></div>";
        echo "<div style='padding-left: 0;' class='col-md-12' ><button style='margin-top:10px;width:90%; border-color: #43E684;'  type='button' class='btn btn-outline-dark' data-toggle='modal'
        data-target='#".$Company."1'>Asisitieron</button> </div> ";
        echo " <div class='w-100'></div>";
        echo "<div style='padding-left: 0;'  class='col-md-12' ><button style='margin-top:10px;width:90%; border-color: #A61C1C;' type='button' class='btn btn-outline-dark' data-toggle='modal'
            data-target='#".$Company."2'>Inasistieron</button> </div> ";
            echo " <div class='w-100'></div>";
        echo "<div style='padding-left: 0;' class='col-md-12' ><button style='margin-top:10px;width:90%; border-color: #F2C438;'  type='button' class='btn btn-outline-dark' data-toggle='modal'
        data-target='#".$Company."3'>No incritos</button> </div> </div></div></div>";
    echo "</div>";
    echo "</div>";
    $i=0;
}

echo "<script>";
 // Load Charts and the corechart package.
 echo "google.charts.load('current', {";
    echo "   packages: ['controls', 'corechart']";
    echo "});";
 // Draw the pie chart for Sarah's pizza when Charts is loaded.



 echo "function drawUDB2Chart() {";
    echo "   var data = google.visualization.arrayToDataTable([";
        echo "       ['Element', 'Density', { ";
            echo "         role: 'style' " ;
            echo "     }],";
            echo "    ['Asistieron', ".$name.", '#43E684'],";
            echo "    ['No asistieron',".$fila4['TotalAlum'].", '#A61C1C'],";
            echo "    ['No inscritos',".$fila3['T'].", '#F2C438']";
         
            echo " ]);";

            echo "  var view = new google.visualization.DataView(data);";
            echo "view.setColumns([0, 1,";
            echo "     {";
                echo "        calc: 'stringify',";
                echo "        sourceColumn: 1,";
                echo "        type: 'string',";
                echo "       role: 'annotation' ";
                echo "    },";
                echo "     2";
                echo "  ]);";
                echo "  var options = {";
                echo "    title: '".utf8_encode($filaPrincipal['Nombre'])."',";#Se parsea los nombres por las tildes
                echo "   width: '100%',";
                echo "    height: 300,";
                echo "    bar: {";
                echo "        groupWidth: '95%'";
                        echo "    },";
                        echo "   legend: {";
                            echo "       position: 'none'";
                            echo "    },";
                            echo "  };";
                            echo " var chart = new google.visualization.ColumnChart(document.getElementById('".$Company."'));";
                            echo " chart.draw(view, options);";

                            echo "}";
                            echo "google.charts.setOnLoadCallback(drawUDB2Chart);";
                            echo "</script>";
                            #***********************INICIA SECCION DE LOS MODALES-->
    # Modal -->
    echo "<div class='modal fade' id='".$Company."1' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'";
    echo "aria-hidden='true'>";
    echo "<div class='modal-dialog' role='document'>";
    echo "      <div class='modal-content'>";
    echo "      <div class='modal-header'>";
    echo "          Alumnos becados FGk que asistieron";
    echo "          <h5 class='modal-title' id='exampleModalLabel'>Titulo</h5>";
    echo "          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
    echo "              <span aria-hidden='true'>&times;</span>";
    echo "          </button>";
    echo "      </div>";
    echo "      <div class='modal-body'>";
    echo "          <table class='table table-striped'>";
    echo "              <thead class='thead-dark'>";
    echo "                  <tr>";
    echo "                      <th scope='col'>#</th>";
    echo "                      <th scope='col'>Nombre</th>";
    echo "                  </tr>";
    echo "              </thead>      "    ;   
    echo "              <tbody  class=\"bg-light\">";
    if ($Financiamiento == 'FGK') {
        $consulta1=$pdo->prepare("SELECT  A.Nombre as 'Nombre' 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = ? AND (A.FuenteFinacimiento = 'FGK' || A.FuenteFinacimiento = 'Beca Externa con Apoyo Adicion') AND R.ID_Empresa = ? AND IR.asistencia='Asistio' AND Date_Format(R.Fecha,'%Y')= ? ");//Este es el numero minimo de asistencia que debe tener
       
       $consulta1->execute(array($NombreReu,$filaPrincipal['Empresa'],$Ano));//Asistencia real
       
       $conteo1;
       
       if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
       {
       $ia = 1;
       while ($filaA=$consulta1->fetch())
       {       
       echo "
       <tr>
       <th scope='row'>".$ia++."</th> 
     
       <td>".$filaA['Nombre']."</td></tr>" ;
       
       }
       }
    }
    else{
        $consulta1=$pdo->prepare("SELECT  A.Nombre 
                FROM reuniones R 
                INNER JOIN inscripcionreunion IR 
                ON R.ID_Reunion = IR.id_reunion  
                LEFT JOIN alumnos A 
                ON IR.id_alumno = A.ID_Alumno
                WHERE R.Titulo = ? AND A.FuenteFinacimiento = ? AND R.ID_Empresa = ? AND IR.asistencia='Asistio' AND Date_Format(R.Fecha,'%Y')= ? ");//Este es el numero minimo de asistencia que debe tener
            
            $consulta1->execute(array($NombreReu,$Financiamiento,$filaPrincipal['Empresa'],$Ano));//Asistencia real
            
            $conteo1;
            
            if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
            {
            $ia = 1;
            while ($filaA=$consulta1->fetch())
            {       
            echo "
            <tr>
            <th scope='row'>".$ia++."</th> 
            <td>".$filaA['Nombre']."</td></tr>" ;
            
            }
   }
    }
    


    echo "              </tbody>";
    echo "            </table>";
    echo "       </div>";
    echo "      <div class='modal-footer'>";
    echo "          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>";
    echo "        </div>";
    echo "  </div>";
    echo " </div>";
    echo "</div>";
    #===============SEGUNDO PARA INASISTENCIA
    echo "<div class='modal fade' id='".$Company."2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'";
    echo "aria-hidden='true'>";
    echo "<div class='modal-dialog' role='document'>";
    echo "      <div class='modal-content'>";
    echo "      <div class='modal-header'>";
    echo "          Alumnos becados FGk que asistieron";
    echo "          <h5 class='modal-title' id='exampleModalLabel'>Titulo</h5>";
    echo "          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
    echo "              <span aria-hidden='true'>&times;</span>";
    echo "          </button>";
    echo "      </div>";
    echo "      <div class='modal-body'>";
    echo "          <table class='table table-striped'>";
    echo "              <thead class='thead-dark'>";
    echo "                  <tr>";
    echo "                      <th scope='col'>#</th>";
    echo "                      <th scope='col'>Nombre</th>";
    echo "                  </tr>";
    echo "              </thead>      "    ;   
    echo "              <tbody class=\"bg-light\" >";
    if ($Financiamiento == 'FGK') {
        $consulta1=$pdo->prepare("SELECT  A.Nombre 
        FROM reuniones R 
        INNER JOIN inscripcionreunion IR 
        ON R.ID_Reunion = IR.id_reunion  
        LEFT JOIN alumnos A 
        ON IR.id_alumno = A.ID_Alumno
        WHERE R.Titulo = ? AND (A.FuenteFinacimiento = 'FGK' || A.FuenteFinacimiento = 'Beca Externa con Apoyo Adicion') AND R.ID_Empresa = ? AND IR.asistencia='Inasistencia' AND Date_Format(R.Fecha,'%Y')= ? ");//Este es el numero minimo de asistencia que debe tener
       
       $consulta1->execute(array($NombreReu,$filaPrincipal['Empresa'],$Ano));//Asistencia real
       
       $conteo1;
       
       if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
       {
       $ia = 1;
       while ($filaA=$consulta1->fetch())
       {       
       echo "
       <tr>
       <th scope='row'>".$ia++."</th> 
       <td>".$filaA['Nombre']."</td></tr>" ;
       
       }
       }
    }
    else{
        $consulta1=$pdo->prepare("SELECT  A.Nombre 
                FROM reuniones R 
                INNER JOIN inscripcionreunion IR 
                ON R.ID_Reunion = IR.id_reunion  
                LEFT JOIN alumnos A 
                ON IR.id_alumno = A.ID_Alumno
                WHERE R.Titulo = ? AND A.FuenteFinacimiento = ? AND R.ID_Empresa = ? AND IR.asistencia='Inasistencia' AND Date_Format(R.Fecha,'%Y')= ? ");//Este es el numero minimo de asistencia que debe tener
            
            $consulta1->execute(array($NombreReu,$Financiamiento,$filaPrincipal['Empresa'],$Ano));//Asistencia real
            
            $conteo1;
            
            if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
            {
            $ia = 1;
            while ($filaA=$consulta1->fetch())
            {       
            echo "
            <tr>
            <th scope='row'>".$ia++."</th> 
            <td>".$filaA['Nombre']."</td></tr>" ;
            
            }
   }
    }
    


    echo "              </tbody>";
    echo "            </table>";
    echo "       </div>";
    echo "      <div class='modal-footer'>";
    echo "          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>";
    echo "        </div>";
    echo "  </div>";
    echo " </div>";
    echo "</div>";
    #===========TERCERO PARA LOS QUE NI SE ESCRIBIERON
    echo "<div class='modal fade' id='".$Company."3' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'";
    echo "aria-hidden='true'>";
    echo "<div class='modal-dialog' role='document'>";
    echo "      <div class='modal-content'>";
    echo "      <div class='modal-header'>";
    echo "          Alumnos becados FGk que asistieron";
    echo "          <h5 class='modal-title' id='exampleModalLabel'>Titulo</h5>";
    echo "          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
    echo "              <span aria-hidden='true'>&times;</span>";
    echo "          </button>";
    echo "      </div>";
    echo "      <div class='modal-body'>";
    echo "          <table class='table table-striped'>";
    echo "              <thead class='thead-dark'>";
    echo "                  <tr>";
    echo "                      <th scope='col'>#</th>";
    echo "                      <th scope='col'>Nombre</th>";
    echo "                  </tr>";
    echo "              </thead>      "    ;   
    echo "              <tbody >";
    if ($Financiamiento == 'FGK') {
        $consulta1=$pdo->prepare("SELECT Nombre
        FROM alumnos 
        WHERE  ID_Empresa = ? AND (FuenteFinacimiento= 'FGK' || FuenteFinacimiento = 'Beca Externa con Apoyo Adicion') AND ID_Alumno NOT IN( 
            SELECT IR.id_alumno 
            FROM reuniones R
            INNER JOIN inscripcionreunion IR 
            ON R.ID_Reunion = IR.id_reunion
            LEFT JOIN alumnos A 
            ON IR.id_alumno = A.ID_Alumno 
            WHERE R.Titulo = ?
            AND (A.FuenteFinacimiento = 'FGK' || A.FuenteFinacimiento = 'Beca Externa con Apoyo Adicion')
            AND R.ID_Empresa = ?
            AND Date_Format(R.Fecha,'%Y')= ?)");//Este es el numero minimo de asistencia que debe tener
       
       $consulta1->execute(array($filaPrincipal['Empresa'],$NombreReu,$filaPrincipal['Empresa'],$Ano));//Asistencia real
       
       $conteo1;
       
       if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
       {
       $ia = 1;
       while ($filaA=$consulta1->fetch())
       {       
       echo "
       <tr>
       <th scope='row'>".$ia++."</th> 
       <td>".$filaA['Nombre']."</td></tr>" ;
       
       }
       }
    }
    else{
        $consulta1=$pdo->prepare("SELECT Nombre
        FROM alumnos 
        WHERE  ID_Empresa = ? AND FuenteFinacimiento = ? AND ID_Alumno NOT IN( 
            SELECT IR.id_alumno 
            FROM reuniones R
            INNER JOIN inscripcionreunion IR 
            ON R.ID_Reunion = IR.id_reunion
            LEFT JOIN alumnos A 
            ON IR.id_alumno = A.ID_Alumno 
            WHERE R.Titulo = ?
            AND A.FuenteFinacimiento = ?
            AND R.ID_Empresa = ?
            AND Date_Format(R.Fecha,'%Y')= ?)");//Este es el numero minimo de asistencia que debe tener
       
       $consulta1->execute(array($filaPrincipal['Empresa'],$Financiamiento,$NombreReu,$Financiamiento,$filaPrincipal['Empresa'],$Ano));//Asistencia real
       
       $conteo1;
            
            if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
            {
            $ia = 1;
            while ($filaA=$consulta1->fetch())
            {       
            echo "
            <tr>
            <th scope='row'>".$ia++."</th> 
            <td>".$filaA['Nombre']."</td></tr>" ;
            
            }
   }
    }


    echo "              </tbody>";
    echo "            </table>";
    echo "       </div>";
    echo "      <div class='modal-footer'>";
    echo "          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>";
    echo "        </div>";
    echo "  </div>";
    echo " </div>";
    echo "</div>";
    #**********************FINALIZA SECCION DE LOS MODALES-->

}
 #====================SE DIBUJA EL GRAFICO PRINCIPAL
echo"<script>";
// Load Charts and the corechart package.
echo"       google.charts.load('current', {";
echo"           packages: ['controls', 'corechart']";
echo"       });";
// Draw the pie chart for Sarah's pizza when Charts is loaded.
echo"        function GraficoPrincipal() {";
echo"            var data = google.visualization.arrayToDataTable([";
  echo"          ['Task', 'Hours per Day'],";
  echo"          ['Asistieron',     ".$AsistenciaG."],";
  echo"         ['No asistieron',     ".$InasistenciaG."],";
  echo"         ['No inscritos',      ".$IniscritosG."]";
  echo"       ]);";

  echo"       var options = {";
      echo"          title: 'Resumen general de participación estudiantil',";
            
      echo"          height: 300,";
      echo"          pieHole: 0.4,";
      echo "        colors: ['#43E684', '#A61C1C', '#F2C438','#94BF75'],";
      echo"         chartArea: {'width': '80%', 'height': '80%'}";
      echo"        };";

      echo"       var chart = new google.visualization.PieChart(document.getElementById('piechart_principal'));";

      echo"        chart.draw(data, options);";
      echo"       }";

      echo"        google.charts.setOnLoadCallback(GraficoPrincipal);";
  
      echo"        </script>";

?>