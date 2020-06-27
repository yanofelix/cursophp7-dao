<?php
require_once("config.php");
	
	$user = new Usuario();

	$user->findById(1);

	echo $user;

?>