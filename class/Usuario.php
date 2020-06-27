<?php

class Usuario {
	private $idusuario;
	private $login;
	private $password;
	private $dtcadastro;

	public function getIdusuario()
	{
	    return $this->idusuario;
	}
	 
	public function setIdusuario($idusuario)
	{
	    $this->idusuario = $idusuario;
	    return $this;
	}

	public function getLogin()
	{
	    return $this->login;
	}
	 
	public function setLogin($login)
	{
	    $this->login = $login;
	    return $this;
	}
		
	public function getPassword()
	{
	    return $this->password;
	}
	 
	public function setPassword($password)
	{
	    $this->password = $password;
	    return $this;
	}

	public function getDtcadastro()
	{
	    return $this->dtcadastro;
	}
	 
	public function setDtcadastro($dtcadastro)
	{
	    $this->dtcadastro = $dtcadastro;
	    return $this;
	}

	public function findById($id){
		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID"=>$id
		));

		if(count($result)>0){
			$row = $result[0];
			$this->setIdusuario($row['idusuario']);
			$this->setPassword($row['senha']);
			$this->setLogin($row['login']);
			$this->setDtcadastro(new DateTime($row['dtCadastro']));
		}
	}

	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY login");
	}

	public static function findByLogin($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE login LIKE :SEARCH ORDER BY login", array(
			':SEARCH'=>"%".$login."%"
		));
	}

	public function login($login, $password){
		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_usuarios WHERE login = :LOGIN AND senha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		if(count($result)>0){
			$row = $result[0];
			$this->setIdusuario($row['idusuario']);
			$this->setPassword($row['senha']);
			$this->setLogin($row['login']);
			$this->setDtcadastro(new DateTime($row['dtCadastro']));
		}
		else{
			throw new Exception("Login e/ou senha invalido(s)");
		}
	}

	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"password"=>$this->getPassword(),
			"login"=>$this->getLogin(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}

}
?>	