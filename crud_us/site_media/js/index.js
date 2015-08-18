//--Bloque de eventos
cargar_form_usuario();
//--Registrar Usuario..
	$(document).on("click","#guardar_us",function(){
		
		var accion = "insertar";
		var nombre_us = $("#nombre_us").val();
		var cedula_us = $("#cedula_us").val();
		var data={
						'nombre_us':nombre_us,
						'cedula_us':cedula_us,
						'accion': accion
				 }
		if(validar_form_su()==true)
		{
			$.ajax({
						url:"{url_server}{user_controller}",
						//url:"./modulos/usuario/usuarioController.php",
						data:data,
						//dataType: "json",
						type:"POST",
						cache:false,
						error: function()
			            {
			            	console.log(arguments);
			            	mensajes(3);
			          	},
			            success: function(data)
			          	{
			          		var html = $.parseJSON(data);
			          		var campo = "#mensaje_us";
			          		if(html == "Registro"){
			          			mensaje_afirmativo(campo, " <i class='fa fa-check'></i> Registro realizado de manera exitosa");
			          			limpiar_campos();
			          		}else if(html == "no_registro")
			          		{
			          			mensaje_validacion(campo," <i class='fa fa-exclamation-circle'></i> Ocurri&oacute; un error inesparedao en proceso de registro");
			          		}
			          		else
			          		{
			          			mensaje_validacion(campo,html);
			          		}	
			          		
			          	}	
			});
		}
	});
//--
//--Bloque de Funciones
function validar_form_su(){
	if($("#nombre_us").val()==""){
		mensaje_validacion("#mensaje_us","<i class='fa fa-exclamation-circle'></i> Debe ingresar nombre de usuario");
		return false;
	}else if($("#cedula_us").val()==""){
		mensaje_validacion("#mensaje_us","<i class='fa fa-exclamation-circle'></i> Debe ingresar c&eacute;dula de usuario");
		return false;
	}else
	{
		return true
	}
}
function limpiar_campos()
{
	$("#nombre_us,#cedula_us").val("");
}
function cargar_form_usuario(){
	var data='';
	window.history.pushState(data, "Titulo", "entorno_sistema.html");
	$.ajax({
				url:"{url_server}{user_controller}",
				type:"POST",
				cache:false,
				error:function()
				{
					console.log(arguments);
					mensajes(3);							
				},
				success: function(data)
				{
					$("#entorno_form").html(data);
				}
	});
}
//--		
