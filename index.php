<?php
require_once("config.php");
	
//	$user = new Usuario(); 
//	$user->findById(1);
//	echo $user;

	
//	$list = Usuario::getList();
//	echo json_encode($list);


//$search = Usuario::findByLogin("user");
//echo json_encode($search);


//$usuario = new Usuario();
//$usuario->login("user", "12345");
//echo $usuario;


//$aluno = new Usuario("ratatai", "13342");
//$aluno->insert();
//echo $aluno;


//$usuario = new Usuario();
//$usuario->findById(4);
//$usuario->update("jamaica", "242405");
//echo $usuario;


$usuario = new Usuario();
$usuario->findById(6);
$usuario->delete();
echo $usuario;




?>