//Al cargar el documento javascript lo priero que hace es la funcion de carga de eventos.
window.onload=cargaEventos;

/**************************************************************************************
                                     PATRONES
***************************************************************************************/
var patronNombreApellido = /^[A-Za-zñÑ-áéíóúÁÉÍÓÚ]+([A-Za-zñÑ-áéíóúÁÉÍÓÚ] ?)*[A-Za-zñÑ-áéíóúÁÉÍÓÚ]$/;
var patronDNI = /^\d{8}[\-]?[a-zA-Z]$/;
var patronEmail = /^[\w\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}$/;
var patronTelefono = /^[0-9]{9}/;
/**************************************************************************************
                               BANDERAS DE VERIFICACIONES
***************************************************************************************/
var flag1,flag2,flag3,flag4,flag5;//Banderas que al estar a true significa que el campo es correcto
/**************************************************************************************
                                  CARGA CON EL DOCUMENTO
***************************************************************************************/
function cargaEventos(){
	activar();
	enviar.addEventListener('click',validar,false);//Al hacer click en el boton enviar del formulario te manda a la funcion validar
	button.addEventListener('click',borrar,false);//Al hacer click en el boton limpiar del forulario te manda a la funcion borrar
    nombre.addEventListener('blur', validarNombre , false);
    apellidos.addEventListener('blur', validarApellidos , false);
    dni.addEventListener('blur', validarDNI , false);
    email.addEventListener('blur', validarEmail , false);
    direccion.addEventListener('blur', validarDireccion , false);
    telefono.addEventListener('blur', validarTelefono , false);
}

function activar(){
	document.getElementById('botonEspecial').disabled=false;
}
/**************************************************************************************
                                        VALIDACIONES
***************************************************************************************/
//Validamos el nombre segun el patron
function validarNombre(){
	if(nombre.value.search(patronNombreApellido)!= -1){
		flag1 = true;
		document.getElementById("nombre").style.border="2px solid green";
		document.getElementById("nombre").style.backgroundColor="rgba(0,255,0,0.6)";	
	}
	else{
		nombre.focus();
		document.getElementById("nombre").style.border="2px solid red";
		document.getElementById("nombre").style.backgroundColor="rgba(255,0,0,0.6)";
	}
}

function validarApellidos(){
	if(apellidos.value.search(patronNombreApellido)!= -1){	
		flag2 = true;
		document.getElementById("apellidos").style.border="2px solid green";
		document.getElementById("apellidos").style.backgroundColor="rgba(0,255,0,0.6)";
	}
	else{
		apellidos.focus();
		document.getElementById("apellidos").style.border="2px solid red";
		document.getElementById("apellidos").style.backgroundColor="rgba(255,0,0,0.6)";
	}
}

function validarDNI(){

    if(dni.value.search(patronDNI)!= -1){
    	flag3 = true;
        document.getElementById("dni").style.border="2px solid green";
		document.getElementById("dni").style.backgroundColor="rgba(0,255,0,0.6)";
    }
    else{
        document.getElementById("dni").style.border="2px solid red";
		document.getElementById("dni").style.backgroundColor="rgba(255,0,0,0.6)";
        dni.focus();
        return false;
    }
}
function validarEmail(){
    if(email.value.search(patronEmail) != -1){
    	flag4 = true;
    	document.getElementById("email").style.border="2px solid green";
		document.getElementById("email").style.backgroundColor="rgba(0,255,0,0.6)";
    }
    else{
        document.getElementById("email").style.border="2px solid red";
		document.getElementById("email").style.backgroundColor="rgba(255,0,0,0.6)";
        email.focus();
        return false;
    }
}
function validarTelefono(){
    if(!isNaN(telefono.value) && telefono.value.length == 9){
    	flag5 = true;
        document.getElementById("telefono").style.border="2px solid green";
		document.getElementById("telefono").style.backgroundColor="rgba(0,255,0,0.6)";
    }
    else{

        document.getElementById("telefono").style.border="2px solid red";
		document.getElementById("telefono").style.backgroundColor="rgba(255,0,0,0.6)";
        telefono.focus();
    }
}
function validarDireccion(){
    document.getElementById("direccion").style.border="2px solid green";
	document.getElementById("direccion").style.backgroundColor="rgba(0,255,0,0.6)";
}

/**************************************************************************************
                           CONFIRMACION DE ENVIO DEL FORMULARIO
***************************************************************************************/
function confirmacion(){
    if(confirm("¿Realmente desea enviar el formulario?")){
        return true;
    }else{
        return false;
    }
}

/**************************************************************************************
                               VERIFICACION FINAL
***************************************************************************************/
function validar(eventopordefecto){

	if(flag1 && flag2 && flag3 && flag4 && flag5 && flag6){//Si todas las validaciones de los campos estan a true pasamos a confirmar
        if(confirmacion()){//Confirmamos y el formulario realizara la accion de llevarnos a google
        	return true;
        }
		else{
			eventopordefecto.preventDefault();//En caso de que no cumpla le quitamos la accion que tenia el formulario por defecto
		}
	}
	else{//En caso de no estar validados todos los campos mostraremos cuales son erroneos

		if(!flag1){
			validarDNI();
		}
		if(!flag2){
			validarNombre();
		}
		if(!flag3){
			validarApellidos();
		}
		if(!flag4){
			validarEmail();
		}
		if(!flag5){	
			validarTelefono();
		}
		if(!flag6){	
			validarDireccion();
		}
		eventopordefecto.preventDefault();
	}
}
/**************************************************************************************
                               	BORRAR ESTILOS
***************************************************************************************/

function borrar(){
	document.getElementById("nombre").style.border="";
	document.getElementById("nombre").style.backgroundColor="";
	document.getElementById("apellidos").style.border="";
	document.getElementById("apellidos").style.backgroundColor="";
	document.getElementById("dni").style.border="";
	document.getElementById("dni").style.backgroundColor="";
	document.getElementById("email").style.border="";
	document.getElementById("email").style.backgroundColor="";
	document.getElementById("telefono").style.border="";
	document.getElementById("telefono").style.backgroundColor="";
	document.getElementById("direccion").style.border="";
	document.getElementById("direccion").style.backgroundColor="";

}
/**************************************************************************************
                                        COOKIES
**************************************************************************************
function borrarCookie(name){
	setCookie(name,"",-1);//Borramos la cookie al dare un tiempo de expiracion inferior a 0
}

function getCookie(name){
	var cname = name + "="; //NOMBRE DE LA COOKIE A BUSCAR
	var dc = document.cookie; //TODAS LAS COOKIES DEL DOCUMENTO
		if (dc.length > 0) {//Tiene algo o esta vacio
		begin = dc.indexOf(cname);// posición donde comienza la cookie con ese nombre
			if (begin != -1) { //si existe
			begin += cname.length;//Comienzo del valor de esa cookie
			end = dc.indexOf(";", begin);//posición donde acaba esa cookie
				if (end == -1){
				 end = dc.length;
				}
			return unescape(dc.substring(begin, end));//Retornamos el valor de la cookie
			}
		}
	return null;//No hay cookies almacenadas
}

function setCookie(name, value, expires, path, domain, secure) {//Obligatoriamente le damos un nombre y valor aunque este sea vacio
	document.cookie = name + "=" + value +
	((expires == null) ? "" : "; expires=" + expires.toGMTString()) +
	((path == null) ? "" : "; path=" + path) +
	((domain == null) ? "" : "; domain=" + domain) +
	((secure == null) ? "" : "; secure");
}
/**************************************************************************************
                         ESCRIBIMOS LOS INTENTOS EN EL DIV
**************************************************************************************
function escribirIntentos(){//Mostramos los intentos que estan siendo almacenados en las cookies
	intentos.innerHTML="<b><em>Intento de envio del formulario:"+getCookie('intentos')+"</em></b>";
}
*/
