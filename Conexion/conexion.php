<?php
try {
    $dbname="oportuni_despega";
    $user="root";
    $password="";
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
    //mysqli_query("SET NAMES 'utf8'");
//$dbh = new PDO('mysql:host=fdb23.awardspace.net;dbname=3502401_miguel',"3502401_miguel","-ypmq9b5x");
} catch (PDOException $e){
    echo $e->getMessage();
}
?>
