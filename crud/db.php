<?php

$dsn= 'mysql:host=localhost; dbname=company';
$username = 'root';
$password = '';
$options = array();



try {
  $connection = new PDO($dsn, $username, $password, $options);
}catch(PDOException $e){

}
 ?>

