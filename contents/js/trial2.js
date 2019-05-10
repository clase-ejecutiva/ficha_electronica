function pass(){
var p1 =$('#input_pass1').val();
var p2 =$('#input_pass2').val();

var espacios = false;
var cont = 0;
while (!espacios && (cont < p1.length)) {
  if (p1.charAt(cont) == " ")
    espacios = true;
  cont++;
}

	if (p1.length == 0 || p2.length == 0) {
	  alert("Los campos de la password no pueden quedar vacios");
	  return false;
	
	}

   var valid=false;
	if (p1 != p2) {
	  alert("Las passwords deben de coincidir");
	  return false;
	 // var valid=false;
	} else {
	 // alert("Todo esta correcto");
	  return true; 
	// var valid=true;
	ajax();
	}
	
}
function submitformsso(email)
{	
	var username= email;
    var key="0f5b3fe9d0b975e0cb6e1afb15adbb61"; 
	var fecha = new Date().format("%Y%m%d"); 
	var hash = CryptoJS.MD5('2'+'1'+username+key+fecha);	
  $("#username_sso").val(email);
  $("#hash").val(hash);
  //alert($('#sso').serialize());
  $("#sso").submit();
}


function ajax(){
			alert('ajax');
		  $.ajax({
                url :'https://ws2.diplomadosuc.cl/landing/index.php/trial/matricula',
                type : "POST",
                data :$('#erp_form').serialize(),
                success: function(data2){
					
				//$('#loader-landing-2').removeClass('show');
	            //$('#loader-landing-2').addClass('hide');
	            //$("#submitlanding-2" ).val('Gracias,Pronto te contactaremos');
	            submitformsso($('#input_email').val());
                  //console.log(data2); // Debería imprimir {ajax2: true}
				  //setTimeout('window.location.href = "http://erpuc.capsul.cl/publico/index/login";', 2000); 
                },
                error : function(xhr,errmsg,err) {
                  //console.log(xhr.status + ": " + xhr.responseText);
				  setTimeout('window.location.href = "http://www.claseejecutiva.com";', 2000);
                }
              });
		
}