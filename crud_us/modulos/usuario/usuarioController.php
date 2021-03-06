<?php
//View	
require ("usuarioView.php");
//Modelo
require ("usuarioModel.php");
$mensaje = array();
$mensaje[0] = "Prueba";
//--Recibe el parametro accion por post, segun la acción desarrollará una operación
if(array_key_exists("accion",$_POST)){
	//--
	$arreglo_datos = helper_userdata();
	//--
	switch ($_POST["accion"]) {
		//--Para insertar
		case "insertar":
			$recordset = insertar_usuario($arreglo_datos);	
			if($recordset != false){
				$mensaje[0] =  "Registro";
			}else
			{
				$mensaje[0] = "no_registro";
			}
			die(json_encode($mensaje));	
			break;
		case "actualizar":
			$recordset = actualizar_usuario($arreglo_datos);
			if($recordset != false)	{
				$mensaje[0] = "Actualizo";
			}else{
				$mensaje[0] = "no_actualizo";
			}	
			die(json_encode($mensaje));
			break;	
		default:
			break;
	}
}
else
{
	render_vista("usuario",0);
}

//--Bloque de funciones
function insertar_usuario($arreglo){
	$obj = new usuarioModel();
	$resp = $obj->insert_data($arreglo);
	return $resp;
}

function actualizar_usuario($arreglo){
	$obj = new usuarioModel();
	$resp = $obj->update_data($arreglo);
	return $resp;
}

function consultar_usuarios(){
	$obj = new usuarioModel();
	$resp = $obj->consultar_usuarios();

	return $resp;
}

function helper_userdata(){
	$user_data = array();
	if($_POST){
		//--
		if(array_key_exists('nombre_us', $_POST)){
			$user_data['nombre_us'] = $_POST['nombre_us'];
		}
		if(array_key_exists('cedula_us', $_POST)){
			$user_data['cedula_us'] = $_POST['cedula_us'];
		}
		if(array_key_exists('id_us', $_POST)){
			$user_data['id_us'] = $_POST['id_us'];
		}
		//--
	}
	return $user_data;
}
//--
?>