<?php 

$host = "mysql:host=localhost; dbname=real_news";
$user = "root";
$pass = "";

 try{
      $conn = new PDO($host,$user,$pass);
      $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
 }catch(PDOException $e){
     die($e);
 }

$con  = mysqli_connect('localhost','root','','real_news');

?>