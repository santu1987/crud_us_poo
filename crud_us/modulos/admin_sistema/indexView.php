<?php
//--Armo diccionario
$diccionario = array(
						'form_actions'=>array(
												"url_server"=>RUTA_SERVER,
												'user_controller' => USER_CONTROLLER,
												'user_list_controller' => USER_LIST_CONTROLLER,
												"CARGAR_PANTALLA_US"=>PANTALLA_US,
												"url_imagen"=>RUTA_IMAGEN
											 )
						
					);
//--Para realizar la renderización dinámica de las vistas
function render_dinamico($html,$data){
	foreach ($data as $clave => $valor) {
		$html = str_replace('{'.$clave.'}', $valor, $html);
	}
	return $html;
}
//-
//--Para realizar el render de la vista
function render_vista($html,$data){
	global $diccionario;
	$template = get_template($html);
	$html = render_dinamico($template,$diccionario["form_actions"]);
	print $html;
}
//-
?>