
/*-----------ESTA FUNCION HACE UN POST PARA RECIBIR LOS SERVICIOS QUE OFRECEMOS-----------*/

function cargarServicio(cod_servicio){
	document.getElementById('cargarServicio2').innerHTML='';
	$.post('http://'+location.host+'/CodeIgniter/index.php/principal/mostrarServicios',
		{cod_serv:cod_servicio},
		function(resultado){
			document.getElementById('cargarServicio').innerHTML=resultado;
		}
	);
}

/*------------ESTA FUNCION HACE POST PARA RECIBIR LAS DISTINTAS PISTAS DE LAS QUE DISPONEMOS----------*/

function servicioPistas(codigo){
	$.post('http://'+location.host+'/CodeIgniter/index.php/principal/datosPista',
		{cod:codigo},
		function(resultado){
			document.getElementById('cargarServicio2').innerHTML=resultado;
		}
	);
}

/*------------ESTA FUNCION HACE POST PARA RECIBIR LAS DISTINTOS COMEDORES DE LOS QUE DISPONEMOS----------*/

function servicioRestaurante(codigo){
	$.post('http://'+location.host+'/CodeIgniter/index.php/principal/datosRestaurante',
		{cod:codigo},
		function(resultado){
			document.getElementById('cargarServicio2').innerHTML=resultado;
		}
	);
}

/*------------ESTA FUNCION HACE POST PARA RECIBIR LAS DISTINTOS CIRCUITOS TERMALES----------*/

function servicioSpa(codigo){
	$.post('http://'+location.host+'/CodeIgniter/index.php/principal/datosSpa',
		{cod:codigo},
		function(resultado){
			document.getElementById('cargarServicio2').innerHTML=resultado;
		}
	);
}

/*------------ESTA FUNCION HACE POST PARA RECIBIR LAS DISTINTOS COMEDORES DE LOS QUE DISPONEMOS----------*/

function servicioCoche(codigo){
	$.post('http://'+location.host+'/CodeIgniter/index.php/principal/datosCoche',
		{cod:codigo},
		function(resultado){
			document.getElementById('cargarServicio2').innerHTML=resultado;
		}
	);
}