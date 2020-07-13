<?php
 
$host = "mysql:host=localhost; dbname=real_news";
$user = "root";
$pass = "";

try{
    $con = new PDO($host,$user,$pass);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}catch(PDOException $e){
    die($e->getMessage());
}


?>