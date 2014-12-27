<?php

$host = 'localhos';
$port = 3308;
$dbname = 'test';
$dbuser = 'root';
$dbpwd  = 'wcq537';
$dns    = "mysql:host=$host;port=$port;dbname=$dbname";
try{
    $pdo = new PDO($dns , $dbuser , $dbpwd);
    $con = $pdo->prepare('select * from user' );
    $result = $con->execute();

    foreach($result as $record){
        echo $record['password'] , "\n";
    }

}catch(PDOException $c){

    echo $c->getMessage();
    die();
}