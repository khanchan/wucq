<?php
$host = 'localhost';
$port = 3306;
$dbname = 'test';
$dbuser = 'root';
$dbpwd  = 'pwddd';
$dns    = "mysql:host=$host;port=$port;dbname=$dbname";
try{
    $pdo = new PDO($dns , $dbuser , $dbpwd);
    $pdo->query('set names utf8;');
    $con = $pdo->prepare('select * from user where password <> ?');
    $con->execute(array('password2'));
    $result = $con->fetchAll();



    foreach($result as $record){
        echo $record['password'] , "\n";
    }

}catch(PDOException $c){

    echo $c->getMessage();
    die();
}