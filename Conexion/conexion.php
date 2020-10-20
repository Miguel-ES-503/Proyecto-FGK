<?php
try {
    $dbname="oportuni_despega";
    $user="root";
    $password="";
    $dsn = "mysql:host=localhost;dbname=$dbname;charset=utf8";
    $dbh = new PDO($dsn, $user, $password);
//$dbh = new PDO('mysql:host=fdb23.awardspace.net;dbname=3502401_miguel',"3502401_miguel","-ypmq9b5x");
} catch (PDOException $e){
    echo $e->getMessage();
}
?>
