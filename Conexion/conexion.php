<?php
try {
    $dbname="oportuni_despega_desarrollo";
    $user="oportuni_Admin";
    $password="UDB123456@";
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
//$dbh = new PDO('mysql:host=fdb23.awardspace.net;dbname=3502401_miguel',"3502401_miguel","-ypmq9b5x");
} catch (PDOException $e){
    echo $e->getMessage();
}
?>
