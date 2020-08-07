<?php
  require_once 'templates/head.php';
?>
<title>Preguntas Frecuentes</title>
<?php
//llama las plantillas
  require_once 'templates/header.php';
  //require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require_once '../Conexion/conexion.php';
?> 

<div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Preguntas Frecuentes</h2>
</div>
<?php 
    include  "../Conexion.php";
    date_default_timezone_set('America/El_Salvador');
    $fecha = date('Y-m-d H:i');
    $pregunta = " ";
    @$pregunta = $_POST['pregunta'];
     $contar = strlen($pregunta);
    if(isset($_POST['pregunta'])){
        if($contar <= 255){
        $sql = "INSERT INTO preguntas(pregunta, estado, fechaPregunta) values (?,?,?) ";
        $stmt= $dbh->prepare($sql);
        $stmt->execute([utf8_decode($pregunta),'pendiente',$fecha]);
        echo "<p class='text-success'>La pregunta: ".$pregunta." fue enviada con éxito<p>";
    }else{
        echo "<p class='text-danger'>La pregunta sobrepasa los 255 carácteres</p>";
        echo "<p class='text-danger'>Usted escribió: ".$contar.", vuelva a redactar la pregunta. Gracias</p>";
    }
}
?>
		<div class="container d-flex justify-content-center mx-auto float-center">
           <div class="row"  >
              <div  id='accordion'>
            <?php 
              $num = 1;
              $num2 = 1;
              $num3 = 1;
              $num4 = 1;
              $query = "SELECT * FROM preguntas";
              $stat = $dbh->prepare($query);
              $stat->execute();
              $result = $stat->fetchAll();
              
              $fechaActual = date("Y-m-d");
              $datetime1 = date_create($fechaActual);
?>
            <?php
                            foreach($result as $row)
                            {
                              $createday = $row["fechaRespuesta"];
                              $datetime2 = date_create($createday);
                              $interval = date_diff($datetime2, $datetime1);                         
                             echo "
  <div class='card cambio-card' >
    <div class='card-header bg-dark' id='headingOne'>
      <h5 class='mb-0'>
        <button class='btn btn-link text-decoration-none text-uppercase font-weight-normal text-light float-left ' data-toggle='collapse' data-target='#collapseOne".($num++)."' aria-expanded='true' aria-controls='collapseOne".($num3++)."'>
        #".($num4++)." ".$row["pregunta"]." <span class='text-primary'><i class='fas fa-caret-down ml-5' style='font-size:32px;'></i></span>
        </button>
      </h5>
    </div>
    <div id='collapseOne".($num2++)."' class='collapse show' aria-labelledby='headingOne' data-parent='#accordion'>
      <div class='card-body'>
      ".$row["respuesta"]."
      <blockquote class='blockquote'>
  <span class='blockquote-footer float-left'>Publicado hace: <cite title='Fecha'>".  $interval->format('%a días')."</cite></span>
</blockquote>
      </div>
    </div>
  </div>";
                            }
                            ?>
                            </div>
      </div>
		</div>
		<br>
<?php
  require_once 'templates/footer.php';
?>
