<?php 

// LOCALHOST
try {
	$host='127.0.0.1'; 
	$dbname='webservices';
	$userBD='root';
	$passwordBD='';
	$bd = new PDO("mysql:host=$host;dbname=$dbname;", $userBD, $passwordBD);
} catch(PDOException $e) {
  	echo 'Error conectando con la base de datos de webservices: ' . $e->getMessage();
  	die();
}


 //PRODUCCION ---- COMPLETAR CREDENCIALES ----
/*try {
	$host='127.0.0.1:3306'; 
	$dbname='consultasgdebadb';
	$userBD='consultasgdeba';
	$passwordBD='FWtBum?9w!FCsfHS';
	$bd = new PDO("mysql:host=$host;dbname=$dbname;", $userBD, $passwordBD);
} catch(PDOException $e) {
  	echo 'Error conectando con la base de datos Reimputaciones: ' . $e->getMessage();
  	die();
}*/


 ?>