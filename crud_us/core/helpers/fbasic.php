<?php
//--Administración sistema
	const RUTA_SERVER = 'http://10.0.2.28/crud_us/';
//--Controladores
	const USER_CONTROLLER = "modulos/usuario/usuarioController.php";
//--Vistas
	const PANTALLA_US =	"site_media/html/usuario.html";
//--Imagenes
	const RUTA_IMAGEN = "site_media/img/";
//--Función que obtiene la estructura de una página para ser renderizada
function get_template($form){
	$file =$_SERVER['DOCUMENT_ROOT'].'/crud_us/site_media/html/'.$form.'.html';
	$template = file_get_contents($file);
	return $template;
}
//--
?>