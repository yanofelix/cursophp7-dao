<?php
require_once("config.php");
	
//	$user = new Usuario(); 
//	$user->findById(1);
//	echo $user;

	
//	$list = Usuario::getList();
//	echo json_encode($list);


//$search = Usuario::findByLogin("user");
//echo json_encode($search);


$usuario = new Usuario();

$usuario->login("user", "12345");

echo $usuario;


?>