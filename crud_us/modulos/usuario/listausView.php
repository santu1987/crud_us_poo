<?php
require("../../core/helpers/fbasic.php");
//--Armo el diccionario
function render_list_us($html,$data){
	$match_cal = set_match_identificador_dinamico($html,"<!--row_lista_us-->");
	if($data!="error"){
		for($i=0;$i<count($data);$i++){
			$dic = array(
									"{i}" => $i,
									"{nombre}"	=> $data[$i][0],
									"{cedula}" => $data[$i][1],
									"{id}" => $data[$i][2],
									"{funcion}" => "desplegar_us('".$i."')"

								);
			$render.=str_replace(array_keys($dic), array_values($dic), $match_cal);
		}
	}
	$html = str_replace($match_cal, $render, $html);
	return $html;
}
//--
//--Para realizar la renderización de la vista para elemento estaticos
function render_estaticos($html,$data){
	foreach ($data as $clave => $valor) {
		$html = str_replace('{'.$clave.'}', $valor, $html);
	}
	return $html;
}
//--
//--Para realizar la renderización de la vista
function render_vista_consulta($html,$data,$arr_pag,$arreglo_filtro){
	$template = get_template($html);
	$html = render_list_us($template,$data);//--renderización dinamica
	$html = render_estaticos($html,$arr_pag);//--renderización estatica
	$html = render_estaticos($html,$arreglo_filtro);//--renderización con los filtros
	print $html;
}
//--
?>