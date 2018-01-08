<?php

$user = "root";
$pass = "";
$dsn = "mysql:host=localhost;dbname=event_db";

try
{

	$pdo = new PDO($dsn,$user,$pass);

}catch(PDOException $e)
{
	die("Erreur :".$e->getMessage());
}




?>