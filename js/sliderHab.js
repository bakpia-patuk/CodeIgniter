$(document).ready(function(){


  $("#imagen1").click(mostrarSlider12);
  $("#imagen2").click(mostrarSlider22);
  $("#imagen3").click(mostrarSlider32);


    function mostrarSlider11(){
    if(document.getElementById("slider1")){
    //Calcular ancho de pantalla y sacar el margen
    var ancho=$(window).width();
    var resultado=(ancho-1200)/2;

    //Titulos para las fotos
    var titulos=["Acogedora habitación simple con un tono acorde con el lugar","Distinta distribucion de la misma habitación","Preciosa vista al mar por el gran ventanal."];

    //Div con el slider
  	var cuerpo = document.getElementById("cuerpo");
    if(document.getElementById("slider1")){
      cuerpo.removeChild(document.getElementById("slider1"));
    } 
  	var div=document.createElement("div");
  	cuerpo.appendChild(div);
  	div.setAttribute('id','slider1');
    //Le damos el margen calculado en funcion de la
    $('#slider1').css('margin-left',resultado)

    //Div dentro del primer div del slider
    var div2=document.createElement("div");
    div.appendChild(div2);
    div2.setAttribute('id','slideshow');
    
    //Div dentro de los otros dos div del slider
    var lista=document.createElement("ul");
    div2.appendChild(lista);

    //Creamos las imagenes del slider


    for(i=1;i<=3;i++){
      var lista2=document.createElement("li");
      var img=document.createElement("img");
      lista.appendChild(lista2);
      lista2.appendChild(img);
      img.setAttribute('src','../imagenes/habSimple'+i+'.jpg');
      img.setAttribute('data-thumb','../imagenes/habSimple'+i+'.jpg');
      img.setAttribute('alt','foto');
      img.setAttribute('title',titulos[i-1]);
    }


    //Fondo difuminado detras del script con el slider de cada habitacion
    var cuerpo=document.getElementById('cuerpo');
    if(document.getElementById("fondoDif")){
      cuerpo.removeChild(document.getElementById("fondoDif"));
    } 
    var fondo=document.createElement("div");
    cuerpo.appendChild(fondo);
    fondo.setAttribute('id','fondoDif');

    $("#slideshow").craftyslide();

    $("#fondoDif").click(atras);

    }
  };

   function mostrarSlider12(){

    $(window).resize(mostrarSlider11);
    //Calcular ancho de pantalla y sacar el margen
    var ancho=$(window).width();
    var resultado=(ancho-1200)/2;

    //Titulos para las fotos
    var titulos=["Acogedora habitación simple con un tono acorde con el lugar","Distinta distribucion de la misma habitación","Preciosa vista al mar por el gran ventanal."];

    //Div con el slider
    var cuerpo = document.getElementById("cuerpo");
    if(document.getElementById("slider1")){
      cuerpo.removeChild(document.getElementById("slider1"));
    } 
    var div=document.createElement("div");
    cuerpo.appendChild(div);
    div.setAttribute('id','slider1');
    //Le damos el margen calculado en funcion de la
    $('#slider1').css('margin-left',resultado)

    //Div dentro del primer div del slider
    var div2=document.createElement("div");
    div.appendChild(div2);
    div2.setAttribute('id','slideshow');
    
    //Div dentro de los otros dos div del slider
    var lista=document.createElement("ul");
    div2.appendChild(lista);

    //Creamos las imagenes del slider


    for(i=1;i<=3;i++){
      var lista2=document.createElement("li");
      var img=document.createElement("img");
      lista.appendChild(lista2);
      lista2.appendChild(img);
      img.setAttribute('src','../imagenes/habSimple'+i+'.jpg');
      img.setAttribute('data-thumb','../imagenes/habSimple'+i+'.jpg');
      img.setAttribute('alt','foto');
      img.setAttribute('title',titulos[i-1]);
    }


    //Fondo difuminado detras del script con el slider de cada habitacion
    var cuerpo=document.getElementById('cuerpo');
    if(document.getElementById("fondoDif")){
      cuerpo.removeChild(document.getElementById("fondoDif"));
    } 
    var fondo=document.createElement("div");
    cuerpo.appendChild(fondo);
    fondo.setAttribute('id','fondoDif');

    $("#slideshow").craftyslide();

    $("#fondoDif").click(atras);

      
     

  };

  /*----------------------------------------
              SEGUNDO SLIDER
  ------------------------------------------*/


   function mostrarSlider21(){

    if(document.getElementById("slider1")){
    //Calcular ancho de pantalla y sacar el margen
    var ancho=$(window).width();
    var resultado=(ancho-1200)/2;

    //Titulos para las fotos
    var titulos=["Amplio salón con barra americana","Habitación de grandes dimensiones con vistas increibles al mar","Vista del resort al completo"];

    //Div con el slider
    var cuerpo = document.getElementById("cuerpo");
    if(document.getElementById("slider1")){
      cuerpo.removeChild(document.getElementById("slider1"));
    } 
    var div=document.createElement("div");
    cuerpo.appendChild(div);
    div.setAttribute('id','slider1');
    //Le damos el margen calculado en funcion de la
    $('#slider1').css('margin-left',resultado)

    //Div dentro del primer div del slider
    var div2=document.createElement("div");
    div.appendChild(div2);
    div2.setAttribute('id','slideshow');
    
    //Div dentro de los otros dos div del slider
    var lista=document.createElement("ul");
    div2.appendChild(lista);

    //Creamos las imagenes del slider


    for(i=1;i<=3;i++){
      var lista2=document.createElement("li");
      var img=document.createElement("img");
      lista.appendChild(lista2);
      lista2.appendChild(img);
      img.setAttribute('src','../imagenes/habDoble'+i+'.jpg');
      img.setAttribute('data-thumb','../imagenes/habDoble'+i+'.jpg');
      img.setAttribute('alt','foto');
      img.setAttribute('title',titulos[i-1]);
    }


    //Fondo difuminado detras del script con el slider de cada habitacion
    var cuerpo=document.getElementById('cuerpo');
    if(document.getElementById("fondoDif")){
      cuerpo.removeChild(document.getElementById("fondoDif"));
    } 
    var fondo=document.createElement("div");
    cuerpo.appendChild(fondo);
    fondo.setAttribute('id','fondoDif');

    $("#slideshow").craftyslide();
    $("#fondoDif").click(atras);
    }

  };



     function mostrarSlider22(){

    $(window).resize(mostrarSlider21);
    //Calcular ancho de pantalla y sacar el margen
    var ancho=$(window).width();
    var resultado=(ancho-1200)/2;

    //Titulos para las fotos
    var titulos=["Amplio salón con barra americana","Habitación de grandes dimensiones con vistas increibles al mar","Vista del resort al completo"];

    //Div con el slider
    var cuerpo = document.getElementById("cuerpo");
    if(document.getElementById("slider1")){
      cuerpo.removeChild(document.getElementById("slider1"));
    } 
    var div=document.createElement("div");
    cuerpo.appendChild(div);
    div.setAttribute('id','slider1');
    //Le damos el margen calculado en funcion de la
    $('#slider1').css('margin-left',resultado)

    //Div dentro del primer div del slider
    var div2=document.createElement("div");
    div.appendChild(div2);
    div2.setAttribute('id','slideshow');
    
    //Div dentro de los otros dos div del slider
    var lista=document.createElement("ul");
    div2.appendChild(lista);

    //Creamos las imagenes del slider


    for(i=1;i<=3;i++){
      var lista2=document.createElement("li");
      var img=document.createElement("img");
      lista.appendChild(lista2);
      lista2.appendChild(img);
      img.setAttribute('src','../imagenes/habDoble'+i+'.jpg');
      img.setAttribute('data-thumb','../imagenes/habDoble'+i+'.jpg');
      img.setAttribute('alt','foto');
      img.setAttribute('title',titulos[i-1]);
    }


    //Fondo difuminado detras del script con el slider de cada habitacion
    var cuerpo=document.getElementById('cuerpo');
    if(document.getElementById("fondoDif")){
      cuerpo.removeChild(document.getElementById("fondoDif"));
    } 
    var fondo=document.createElement("div");
    cuerpo.appendChild(fondo);
    fondo.setAttribute('id','fondoDif');

    $("#slideshow").craftyslide();
    $("#fondoDif").click(atras);
    

  };

  /*----------------------------------------
              TERCER SLIDER
  ------------------------------------------*/


   function mostrarSlider31(){

    if(document.getElementById("slider1")){

    //Calcular ancho de pantalla y sacar el margen
    var ancho=$(window).width();
    var resultado=(ancho-1200)/2;

    //Titulos para las fotos
    var titulos=["Habitación de la suite con un ambiente arabe brutal","Salon con gran capacidad para fiestas especiales","Salon para reunior familiar más intima"];

    //Div con el slider
    var cuerpo = document.getElementById("cuerpo");
    if(document.getElementById("slider1")){
      cuerpo.removeChild(document.getElementById("slider1"));
    } 
    var div=document.createElement("div");
    cuerpo.appendChild(div);
    div.setAttribute('id','slider1');
    //Le damos el margen calculado en funcion de la
    $('#slider1').css('margin-left',resultado)

    //Div dentro del primer div del slider
    var div2=document.createElement("div");
    div.appendChild(div2);
    div2.setAttribute('id','slideshow');
    
    //Div dentro de los otros dos div del slider
    var lista=document.createElement("ul");
    div2.appendChild(lista);

    //Creamos las imagenes del slider


    for(i=1;i<=3;i++){
      var lista2=document.createElement("li");
      var img=document.createElement("img");
      lista.appendChild(lista2);
      lista2.appendChild(img);
      img.setAttribute('src','../imagenes/suite'+i+'.jpg');
      img.setAttribute('data-thumb','../imagenes/suite'+i+'.jpg');
      img.setAttribute('alt','foto');
      img.setAttribute('title',titulos[i-1]);
    }


    //Fondo difuminado detras del script con el slider de cada habitacion
    var cuerpo=document.getElementById('cuerpo');
    if(document.getElementById("fondoDif")){
      cuerpo.removeChild(document.getElementById("fondoDif"));
    } 
    var fondo=document.createElement("div");
    cuerpo.appendChild(fondo);
    fondo.setAttribute('id','fondoDif');

    $("#slideshow").craftyslide();
    $("#fondoDif").click(atras);
  }

  };


  function mostrarSlider32(){

    $(window).resize(mostrarSlider31);
    //Calcular ancho de pantalla y sacar el margen
    var ancho=$(window).width();
    var resultado=(ancho-1200)/2;

    //Titulos para las fotos
    var titulos=["Habitación de la suite con un ambiente arabe brutal","Salon con gran capacidad para fiestas especiales","Salon para reunior familiar más intima"];

    //Div con el slider
    var cuerpo = document.getElementById("cuerpo");
    if(document.getElementById("slider1")){
      cuerpo.removeChild(document.getElementById("slider1"));
    } 
    var div=document.createElement("div");
    cuerpo.appendChild(div);
    div.setAttribute('id','slider1');
    //Le damos el margen calculado en funcion de la
    $('#slider1').css('margin-left',resultado)

    //Div dentro del primer div del slider
    var div2=document.createElement("div");
    div.appendChild(div2);
    div2.setAttribute('id','slideshow');
    
    //Div dentro de los otros dos div del slider
    var lista=document.createElement("ul");
    div2.appendChild(lista);

    //Creamos las imagenes del slider


    for(i=1;i<=3;i++){
      var lista2=document.createElement("li");
      var img=document.createElement("img");
      lista.appendChild(lista2);
      lista2.appendChild(img);
      img.setAttribute('src','../imagenes/suite'+i+'.jpg');
      img.setAttribute('data-thumb','../imagenes/suite'+i+'.jpg');
      img.setAttribute('alt','foto');
      img.setAttribute('title',titulos[i-1]);
    }


    //Fondo difuminado detras del script con el slider de cada habitacion
    var cuerpo=document.getElementById('cuerpo');
    if(document.getElementById("fondoDif")){
      cuerpo.removeChild(document.getElementById("fondoDif"));
    } 
    var fondo=document.createElement("div");
    cuerpo.appendChild(fondo);
    fondo.setAttribute('id','fondoDif');

    $("#slideshow").craftyslide();
    $("#fondoDif").click(atras);

  };

  function atras(){

      document.getElementById('slider1').style.display='none';
      document.getElementById('fondoDif').style.display='none';

      $('#slider1').remove();
      $('#fondoDif').remove();

  }
  

});

