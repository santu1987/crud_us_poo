<?php
//View
require("listausView.php");
//Model
require("usuarioModel.php");
//
$mensaje = array();
$mensaje[0] = "";
//--armar los elementos que forman parte de la paginación
$arreglo_datos = helper_userdata();
$arreglo_filtros = helper_user_filtros();
$obj2 = new usuarioModel();
$cuantos_son_us = $obj2->cuantos_son_us();//--consulto cuantos usuarios
$arr_pag = armar_paginacion($cuantos_son_us[0][0],$arreglo_datos);
$data = consultar_usuarios($arr_pag["offset_tabla"],$arreglo_datos["cuantos_x_pagina"],$arreglo_filtros);//--consulto usuarios

//-Renderizo la vista
render_vista_consulta("listaus",$data,$arr_pag,$arreglo_filtros);
//--
//Bloque de funciones
function consultar_usuarios($offset,$limit,$arreglo_filtros){
	$obj = new usuarioModel();
	$recordset = $obj->consultar_usuarios($offset,$limit,$arreglo_filtros);
	return $recordset;
}

//--Para data
function helper_userdata(){
	$user_data = array();
	if($_POST){
		//--Para variables de entorno:
		if(array_key_exists('actual', $_POST)){
			$user_data['actual'] = $_POST['actual'];
		}
		if(array_key_exists('cuantos_son', $_POST)){
			$user_data['cuantos_son'] = $_POST['cuantos_son'];
		}
		if(array_key_exists('cuantos_x_pagina', $_POST)){
			$user_data['cuantos_x_pagina'] = $_POST['cuantos_x_pagina'];
		}
		if(array_key_exists('tipo', $_POST)){
			$user_data['tipo'] = $_POST['tipo'];
		}
		//--
	}
	return $user_data;
}

//--Para filtros:
function helper_user_filtros(){
	$user_filtros = array();
	if($_POST){
		if(array_key_exists('filtro_name', $_POST)){
			$user_filtros['filtro_name'] = strtoupper($_POST['filtro_name']);
		}else{
			$user_filtros['filtro_name'] ='';
		}
		if(array_key_exists('filtro_id', $_POST)){
			$user_filtros['filtro_id'] = $_POST['filtro_id'];
		}else{
			$user_filtros['filtro_id'] ='';
		}
		if(array_key_exists('filtro_ci', $_POST)){
			$user_filtros['filtro_ci'] = $_POST['filtro_ci'];
		}else{
			$user_filtros['filtro_ci'] = '';
		}
	}
	return $user_filtros;
}
?>