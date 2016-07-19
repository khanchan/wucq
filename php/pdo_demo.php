<?php
$host = 'localhost';
$port = 3306;
$dbname = 'test';
$dbuser = 'root';
$dbpwd  = 'wcq537';
$dns    = "mysql:host=$host;port=$port;dbname=$dbname";

defined('DS') ? null : define('DS' , DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS' , PATH_SEPARATOR);
defined('EL') ? null : define('EL' , PHP_EOL);


foreach(PDO::getAvailableDrivers() as $driver){
    echo "$driver" , DS , PS , EL;
}
exit();

# connect to diff database 
#pgsql
$dbh = new PDO("pgsql:dbname=pdo;host=localhost", "username", "password" );
/*** connect to SQLite database ***/
$dbh = new PDO("sqlite:/path/to/database.sdb");


try{
    $pdo = new PDO($dns , $dbuser , $dbpwd);
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