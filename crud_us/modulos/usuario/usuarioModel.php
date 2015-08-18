<?php
require ("../../core/conex.php");
class usuarioModel extends conex{
	public $result;
	public $sql;

	public function __construct(){
	}

	//--Metodo para insertar campos en la tabla usuarios2
	public function insert_data($user_data = array()){
		if (array_key_exists('cedula_us', $user_data)){
			foreach ($user_data as $campo => $valor) {
				$$campo = $valor;
			}
			$this->sql = "INSERT INTO usuarios2
									(
										cedula,
										nombres
									)
						  VALUES(	'".$cedula_us."',
						  			'".$nombre_us."')";	
			$this->result = $this->enviarQuery($this->sql);
			return $this->result; 	
		}
	}

	public function __destruct(){
		unset($this);
	}
}
?>