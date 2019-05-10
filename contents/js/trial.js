function pass(){
var p1 =$('#input_pass1').val();
var p2 =$('#input_pass2').val();

var nom=$('#input_nombre').val();

var ape=$('#input_ape').val();

var espacios = false;
var cont = 0;

if (nom.length == 0 || ape.length == 0) {
	  alert("Favor de Ingresar Nombre y Apellido");
	  return false;
}

while (!espacios && (cont < p1.length )) 
{
  if (p1.charAt(cont) == " ")
    espacios = true;
  cont++; 
}
	if (p1.length == 0 || p2.length == 0) {
	  alert("Los campos de la password no pueden quedar vacios");
	  return false;
	}
	if (p1 != p2) {
	  alert("Las passwords deben de coincidir");
	  return false;
	}
	if(p1.length<6 || p2.length<6){
	 alert("La Password debe contener mas de 6 caracteres "); 	
	 return false;
	}
	
	if (nom.length == 0 || ape.length == 0) {
	  alert("Favor de Ingresar Nombre y Apellido");
	  return false;
	}
	
// funcion	
 return true; 	
}




function submitformsso(email)
{	
	var username= email;
    var key="0f5b3fe9d0b975e0cb6e1afb15adbb61"; 
	var fecha = new Date().format("%Y%m%d"); 
	var hash = CryptoJS.MD5('2'+'1'+username+key+fecha);	
  $("#username_sso").val(email);
  $("#hash").val(hash);
  $("#sso").submit();
}



$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#enviar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        if(pass()){
			var formData = {input_email:$('#input_email').val(),input_pass1:$('#input_pass1').val(),sku:$('#input_sku').val(),nombre:$('#input_nombre').val(),apellido:$('#input_ape').val()};
			document.getElementById("loader-landing-0").style.display='block';
			// Primero validará el formulario.
			 $.ajax({
                url :'https://ws2.diplomadosuc.cl/landing/index.php/trial/matriculav2',
                type : "POST",
                data :formData,
                success: function(data){	
				respuesta = JSON.parse(data);
				document.getElementById("loader-landing-0").style.display="none";         
	            $("#enviar" ).val('Gracias,Pronto te contactaremos');
				if(respuesta.tipo!='error'){
	            submitformsso($('#input_email').val());
				}else if(respuesta.respuesta===105){
					//alert('ya matriculado');
					 submitformsso($('#input_email').val());
				//setTimeout('window.location.href = "http://www.claseejecutiva.com";', 4000);
				}else{
				 setTimeout('window.location.href = "http://trial.claseejecutiva.com/publico/index/login";', 2000); 	
				}
				 
                },
                error : function(xhr,errmsg,err) {
                 // console.log(xhr.status + ": " + xhr.responseText);
				  setTimeout('window.location.href = "http://www.claseejecutiva.com";', 2000);
                }
              });
        }//fin if
    });    
});
