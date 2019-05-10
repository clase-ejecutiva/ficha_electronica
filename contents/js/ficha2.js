$(document).ready(function() {
$('#chile_tipo_documento').removeClass("d").addClass("d-none");		
$( "#f_nacimiento" ).datepicker({
	dateFormat: "dd/mm/yy",
	changeMonth: true,
	changeYear: true,
	yearRange: "c-90:c+30",
});
$('#pais').on('change',function(event) {
var pais=$('#pais').val();
	if(pais!='null'){
		if(pais==='Chile(PS-38)'){
		/*	
		$('#inlineCheckbox1').attr("disabled", false);	
		$('#inlineCheckbox2').attr("disabled", false);	
		$('#inlineCheckbox3').attr("disabled", false);
		$('#inlineCheckbox4').attr("disabled", true);	
		$('#inlineCheckbox5').attr("disabled", false);	
		$('#inlineCheckbox6').attr("disabled", false);	
		*/
		$('#inlineCheckbox1').removeClass("d").addClass("d-none");	
		$('#inlineCheckbox2').removeClass("d-none").addClass("d");	
		$('#inlineCheckbox3').removeClass("d-none").addClass("d");	
		$('#inlineCheckbox4').removeClass("d").addClass("d-none");	
		$('#inlineCheckbox5').removeClass("d-none").addClass("d");		
		$('#inlineCheckbox6').removeClass("d-none").addClass("d");	
		$('#inlineCheckbox7').removeClass("d-none").addClass("d");	
		$('#inlineCheckbox8').removeClass("d-none").addClass("d");	
		
		
		$('#label-region1').removeClass("d-none").addClass("d");
		$('#label-comuna').removeClass("d-none").addClass("d");
		$('#label-ciudad').removeClass("d").addClass("d-none");

        $('#region1').removeClass("d").addClass("d-none");
        $('#comuna1').removeClass("d").addClass("d-none");	


        $('#region2').removeClass("d-none").addClass("d");
        $('#comuna2').removeClass("d-none").addClass("d");
		
		$('#txt_tipo_documento').removeClass("d").addClass("d-none");	
		$('#div_tipo_documento').removeClass("d").addClass("d-none");
        $('#chile_tipo_documento').removeClass("d-none").addClass("d");			
		 
        //$('#tipo_documento option:selected').text('Cédula de Identidad(1)');		
        //$('#tipo_documento').val('Cédula de Identidad(1)');		

		
		}else{
		$('#inlineCheckbox1').removeClass("d-none").addClass("d");	
		$('#inlineCheckbox2').removeClass("d").addClass("d-none");
		$('#inlineCheckbox3').removeClass("d").addClass("d-none");
        $('#inlineCheckbox4').removeClass("d-none").addClass("d");
		$('#inlineCheckbox5').removeClass("d").addClass("d-none");
		$('#inlineCheckbox6').removeClass("d").addClass("d-none");
		$('#inlineCheckbox7').removeClass("d").addClass("d-none");	
		$('#inlineCheckbox8').removeClass("d").addClass("d-none");	
		
		$('#label-comuna').removeClass("d").addClass("d-none");
        $('#label-region1').removeClass("d").addClass("d-none");
		$('#label-ciudad').removeClass("d-none").addClass("d");
        $('#region1').removeClass("d").addClass("d-none");
        $('#comuna1').removeClass("d-none").addClass("d");
		$('#region2').removeClass("d").addClass("d-none");
        $('#comuna2').removeClass("d").addClass("d-none");	
        $('#ciudad').removeClass("d-none").addClass("d");	
		
		$('#txt_tipo_documento').removeClass("d-none").addClass("d");	
		$('#div_tipo_documento').removeClass("d-none").addClass("d");		
		$('#chile_tipo_documento').removeClass("d").addClass("d-none");	
		//$('#tipo_documento option:selected').text('Seleccionar');
		}
	}
 });
//Datos de pagador
$('#tipo_p').on('change',function(event) {
var t_per=$('#tipo_p').val();
	if(t_per!='null'){
		if(t_per==='Juridica(2)'){
		$('#datosPagoTercero').removeClass("d").addClass("d-none");
		$('#datosPagoPN').removeClass("d").addClass("d-none");		
		$('#datosPagoPJ').removeClass("d-none").addClass("d");
		$('#Direccion_contacto').removeClass("d-none").addClass("d");
		$('#informacion_de_contacto_PJ').removeClass("d-none").addClass("d");
		}else if(t_per==='Natural(1)'){
		$('#datosPagoTercero').removeClass("d").addClass("d-none");
		$('#datosPagoPJ').removeClass("d").addClass("d-none");
		$('#informacion_de_contacto_PJ').removeClass("d").addClass("d-none");				
	    $('#datosPagoPN').removeClass("d-none").addClass("d");
	    $('#Direccion_contacto').removeClass("d-none").addClass("d");
		//Replica nombre del alumno a Persona Natural
		 var str2 = " ";
		//$('#id_nom_pn').val($('#id_name').val());
		document.getElementById("id_nom_pn").value=$('#id_name').val();
		//$('#id_rut_alumno').val($('#dni').val());
		document.getElementById("id_rut_alumno").value=$('#dni').val();
		//$('#id_ape_pn').val($('#id_apeP').val().concat(str2,$('#id_apeM').val()));
		document.getElementById("id_ape_pn").value=$('#id_apeP').val().concat(str2,$('#id_apeM').val());
		//$('#id_dir_pagador').val($('#id_dir').val());
		document.getElementById("id_dir_pagador").value=$('#id_dir').val();
		//$('#id_ciudad_pagador').val($('#region').val());
		document.getElementById("id_ciudad_pagador").value=$('#region').val();
		//$('#id_pais_pagador').val($('#pais').val());
		document.getElementById("id_pais_pagador").value=$('#pais').val();
		//$('#id_com_pagador').val($('#id_comuna_alumno').val());
		document.getElementById("id_com_pagador").value=$('#id_comuna_alumno').val();
		}else if(t_per==='Tercero(3)'){
		$('#datosPagoPN').removeClass("d").addClass("d-none");
		$('#datosPagoPJ').removeClass("d").addClass("d-none");
		$('#informacion_de_contacto_PJ').removeClass("d").addClass("d-none");	
        $('#datosPagoTercero').removeClass("d-none").addClass("d");
		 $('#Direccion_contacto').removeClass("d-none").addClass("d");
		}else{
		$('#datosPagoTercero').removeClass("d").addClass("d-none");	
		$('#datosPagoPN').removeClass("d").addClass("d-none");
		$('#datosPagoPJ').removeClass("d").addClass("d-none");
		$('#informacion_de_contacto_PJ').removeClass("d").addClass("d-none");
        $('#Direccion_contacto').removeClass("d").addClass("d-none");	
		}
	}
 }); 
 
//otic
$('#DataCheckbox8').on('change',function(event) {
 var t_per=$('#tipo_p').val();
	if(t_per!='null'){
		if(t_per==='Juridica(2)'){
		$('#tipo_otic').removeClass("d-none").addClass("d");
         $('#tipo_p').removeClass("errores");		
		}else{
		alert('Orden de compra Otic solo Pra Empresas');
       //$('#DataCheckbox8').checked = false;  
       document.getElementById("DataCheckbox8").checked=false	      
	   $('#tipo_p').addClass("errores");	
		}
	}
 
 
 
 }); 
//Crear div para medios de pago
var iCnt2 = 0;
// Crear un elemento div añadiendo estilos CSS
var containerPago = $(document.createElement('div')).css({
border: '1px dashed',
borderTopColor: '#999', borderBottomColor: '#999',
borderLeftColor: '#999', borderRightColor: '#999'
}).addClass(".hidden-xs-down  mx-auto");
container.setAttribute("id", "divPago" ); 
 

var iCnt = 0;
// Crear un elemento div añadiendo estilos CSS
var container = $(document.createElement('div')).css({
border: '1px dashed',
borderTopColor: '#999', borderBottomColor: '#999',
borderLeftColor: '#999', borderRightColor: '#999'
}).addClass(".hidden-xs-down  mx-auto");
//container.setAttribute("class", ".hidden-xs-down" );
$('#btAdd').click(function() {
if (iCnt <= 9) {
 
iCnt = iCnt + 1;
 
// Añadir caja de texto.<input type="file" name="userfile" size="20" />
$(container).append('<input type=file class="input col-md-6" name="userfile[]" size="20" id=tb' + iCnt + ' ' +'value="Archivo Numero' +iCnt+ '" onchange="validaArchivo'+iCnt+'()"/>');

/* 
if (iCnt == 1) {
 
var divSubmit = $(document.createElement('div'));
$(divSubmit).append('<input type=button class="bt" onclick="GetTextValue()"' +
'id=btSubmit value=Enviar />');
}
*/
//$('#main').after(container, divSubmit);
$('#main').after(container);

}
else { //se establece un limite para añadir elementos, 10 es el limite
 
$(container).append('<label>Limite Alcanzado</label>');
$('#btAdd').attr('class', 'btn btn-primary bt-disable');
$('#btAdd').attr('disabled', 'disabled');
 
}
});





 
$('#btRemove').click(function() { // Elimina un elemento por click
if (iCnt != 0) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; }
 
if (iCnt == 0) { $(container).empty();
 
$(container).remove();
$('#btSubmit').remove();
$('#btAdd').removeAttr('disabled');
$('#btAdd').attr('class', 'btn btn-primary bt')
 
}
});
 
$('#btRemoveAll').click(function() { // Elimina todos los elementos del contenedor
 
$(container).empty();
$(container).remove();
$('#btSubmit').remove(); iCnt = 0;
$('#btAdd').removeAttr('disabled');
$('#btAdd').attr('class', 'btn btn-primary bt');
 
});


$('#ok').click(function() {
	
if(iCnt == 0){
alert ('No olvide subir sus Antecedentes');
}	
	$("#form_pre").validate({
      rules:{
		"f_inscripcion"    :{required:true},
		"ejecutivo"        :{required:true},
		"nombre"           :{required:true},
		"apellido"         :{required:true},
		"tipo_documento"   :{required:true},
		"dni"              :{required:true,
					         minlength:5, 
					         maxlength:20,
					         pattern:true,
					         checkRut:function(){ if($('#form_pre').find('select[name="pais"]').val() == "Chile(PS-38)") return false; },
					        },
		"genero"          :{required:true},
		"estado_civil"    :{required:true},
		"empresa"         :{required:true},
		"cargo"           :{required:true},
		"dir"             :{required:true},
		"dir_num"         :{required:true},
		"f_nacimiento"    :{required:true},
		"pais"            :{required:true},
		"comuna"          :{required:true},
		"region"          :{required:true},
		"tel"             :{required:true},
		"email"           :{required:true,email:true},
		"userfile[]"      :{required:true},
		"acepta"          :{required:true},
		"mpago"           :{required:true},
		"tipo_p"          :{required:true},
		"nom_pn"          :{required:true},
		"ape_pn"          :{required:true},
		"nom_pj"          :{required:true},
		"web_e"           :{required:true},
		"giro"            :{required:true},
		"nombre_rl"       :{required:true},
		"rut_rl"          :{required:true},
		"dir_pagador"     :{required:true},
		"ciudad_pagador"  :{required:true},
		"pais_pagador"    :{required:true},
		"com_pagador"     :{required:true},
		"nom_con"         :{required:true},
		"cargo_con"       :{required:true},
		"ape_pat_con"     :{required:true},
		"email_con"       :{required:true},
		"ape_mat_con"     :{required:true},
		"tipo_otic"       :{required:true},
		"pass"            :{required:true,
		                    minlength:5,
						   },
		"pass2"           :{required:true,
		                    minlength:5, 
							validaPass:true,
						    },
		"tel_con"         :{required:true}
      },
      messages:{
        "nombre"          :{required:"Ingresa tu nombre"},
        "apellido"        :{required:"Ingresa tu teléfono"},
        "tipo_documento"  :{required:"Selecciona tu Tipo de Documento"},
        "dni"             :{required:"Ingresa tu Rut o DNI"},
        "genero"          :{required:"Ingresa tu Genero"},
        "estado_civil"    :{required:"Ingresa tu Estado Civil"},
        "empresa"         :{required:"Ingresa tu empresa"},		
        "cargo"           :{required:"Ingresa tu cargo"},		
        "dir"             :{required:"Ingresa tu Direccion"},		
        "dir_num"         :{required:"Ingresa el numero de tu Direccion"},		
        "f_nacimiento"    :{required:"Favor de agregar fecha de nacimiento"},		
        "pais"            :{required:"Selecciona tu país"},		
        "comuna"          :{required:"Ingresa tu Comuna"},		
        "region"          :{required:"Ingresa tu Region"},		
        "tel"             :{required:"Ingresa tu Telefono"},		
		"email"           :{required:"Ingresa tu email",email:"Ingresa un email válido"},
		"userfile[]"      :{required:"Ingresa tus Archivos"},
		"acepta"          :{required:"Favor de Aceptar las Condiciones <br>"},      
		"mpago"           :{required:"Favor de Seleccionar un medio de Pago<br>"},      
		"tipo_p"          :{required:"Favor de Seleccionar Tipo de Persona<br>"},      
		"nom_pn"          :{required:"Favor de Ingresar algun Nombre"},      
		"ape_pn"          :{required:"Favor de Ingresar algun Apellido"},      
		"nom_pj"          :{required:"Favor de Ingresar algun Nombre"},      
		"web_e"           :{required:"Favor de Ingresar alguna Web"},     
		"giro"            :{required:"Favor de Ingresar Giro"},     
		"nombre_rl"       :{required:"Favor de Ingresar Nombre"},     
		"rut_rl"          :{required:"Favor de Ingresar Rut"},     
		"dir_pagador"     :{required:"Favor de Ingresar Direccion"},     
		"ciudad_pagador"  :{required:"Favor de Ingresar Ciudad"},     
		"pais_pagador"    :{required:"Favor de Ingresar Pais"},     
		"com_pagador"     :{required:"Favor de Ingresar Comuna"},     
		"nom_con"         :{required:"Favor de Ingresar Nombre"},     
		"cargo_con"       :{required:"Favor de Ingresar Cargo"},     
		"ape_pat_con"     :{required:"Favor de Ingresar Apellido Paterno"},     
		"email_con"       :{required:"Favor de Ingresar Email"},     
		"ape_mat_con"     :{required:"Favor de Ingresar Apellido Materno"},     
		"tipo_otic"       :{required:"Selecciona una OTIC"},     
		"pass"            :{required:"Favor de Ingresar su Password"},     
		"pass2"           :{required:"Favor de Ingresar su Password"},     
		"tel_con"         :{required:"Favor de Ingresar Telefono"}     
      },
      errorElement: "span",
      submitHandler: function(form){
//	$('#ok').removeClass("btn btn-success").addClass("btn btn-warning").val("Enviando....");	  
//	$('#loader').removeClass('invisible');
//	$('#loader').addClass('visible');	  
//	$("#form_pre").submit();

    var formUrl = "http://ws.diplomadosuc.cl/landing/index.php/testing/do_upload";
    var formData = new FormData($('#form_pre')[0]);
    var percent = $('.percent');
    var status = $('#status');
	
        $.ajax({
		 xhr: function() {
			var xhr = new window.XMLHttpRequest();

			xhr.upload.addEventListener("progress", function(evt) {
			  if (evt.lengthComputable) {
				var percentComplete = evt.loaded / evt.total;
				percentComplete = parseInt(percentComplete * 100);
				//console.log(percentComplete);
				var percentVal = percentComplete + '%';
				//bar.width(percentVal);
				document.getElementsByClassName("progress-bar")[0].style.width =percentVal;
				percent.html(percentVal);
				//element.setAttribute("style", "background-color: red;");
				if (percentComplete === 100) {
                $('#ok').removeClass("btn btn-success").addClass("btn btn-warning").val("Enviando....");
				}

			  }
			}, false);

			return xhr;
		  },			
                url: formUrl,
                type: 'POST',
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data, textSatus, jqXHR){
                respuesta = JSON.parse(data);
				//console.log(respuesta);
				 $('#ok').removeClass("btn btn-warning").addClass("btn btn-success").val("Datos Enviados");
				 $('#ok').prop('disabled', true);
				if(respuesta.status=='ok'){
					alert('Datos Ingresado Correctamente');
					setTimeout('window.location.href = "http://www.claseejecutiva.com";', 2000);
				}else
				{
					alert(data);
				}
				
                },
                error: function(jqXHR, textStatus, errorThrown){
                        //handle here error returned
                }
        });
	





	
        }
    });

});


});//Fin Funcion Document Ready
 
 
 //Funciones Para la Clase Validate
jQuery.validator.addMethod("pattern", function(value, element) {
return this.optional(element) || /^[a-z0-9\-\.\s]+$/.test(value);
}, "Favor de Ingresar valores Correctos");

jQuery.validator.addMethod("checkRut", function(value, element) {
 return this.optional(element) || checkRut(value);
}, "Digito Verificador Incorrecto");


jQuery.validator.addMethod("validaPass", function(value, element) {
 return this.optional(element) || validaPass(value);
}, "Las password deben coincidir");



function validaPass(){
var p1=$('#pass_1').val(); 
var p2=$('#pass_2').val(); 

	if (p1 != p2) {
	  return false;
	} else {
	  return true; 
	}
	
}			
			
//Funcion Valida RUT
function checkRut(campo) {
 	if ( campo.length == 0 ){ return false; }
	if ( campo.length < 8 ){ return false; }

	campo = campo.replace('-','')
	campo = campo.replace(/\./g,'')

	var suma = 0;
	var caracteres = "1234567890kK";
	var contador = 0;    
	for (var i=0; i < campo.length; i++){
		u = campo.substring(i, i + 1);
		if (caracteres.indexOf(u) != -1)
		contador ++;
	}
	if ( contador==0 ) { return false }
	
	var rut = campo.substring(0,campo.length-1)
	var drut = campo.substring( campo.length-1 )
	var dvr = '0';
	var mul = 2;
	
	for (i= rut.length -1 ; i >= 0; i--) {
		suma = suma + rut.charAt(i) * mul
                if (mul == 7) 	mul = 2
		        else	mul++
	}
	res = suma % 11
	if (res==1)		dvr = 'k'
                else if (res==0) dvr = '0'
	else {
		dvi = 11-res
		dvr = dvi + ""
	} 
	// Formatear RUN
	var rut_o= Number(rut).toString();
    var rutF = rut_o+'-'+ dvr;
	
	if ( dvr != drut.toLowerCase() ) 
	{   return false;  }
	else { $('#dni').val(rutF);  return true; }
} 
 
 
 
 
// Obtiene los valores de los textbox al dar click en el boton "Enviar"
var divValue, values = '';
 
function GetTextValue() {
 
$(divValue).empty();
$(divValue).remove(); values = '';
 
$('.input').each(function() {
divValue = $(document.createElement('div')).css({
padding:'5px', width:'200px'
});
values += this.value + '<br />'
});
 
$(divValue).append('<p><b>Tus valores añadidos</b></p>' + values);
$('body').append(divValue);
 
}





function malla_diplo(sku){	
//$('#malla').attr('data-toggle','modal');
var sku=sku;	

 $.ajax({
                url :'https://ws2.diplomadosuc.cl/landing/index.php/testing/malla?idOp='+sku,
                type : "GET",
                data :sku,
                success: function(data){
               				
				respuesta = JSON.parse(data);
				// console.log(respuesta); 	

				if(respuesta){
					var table='<table class="table">';
						table+= '<thead>';
						table+= '<tr>';
						table+= '<th scope="col">Nombre:</th>';
						table+= '<th scope="col" colspan="1">Inicio:</th>';
						table+= '<th scope="col" colspan="1">Termino:</th>';
						table+= '<th scope="col">Bimestre</th>';
						table+= '</tr>';
						table+= '</thead>';
					Object.keys(respuesta).forEach(function (key) {
						table+='<tbody>';
					    table+='<tr>';				
						table+='<td>'+respuesta[key].Name+'</td>';						
						table+='<td colspan="1">'+convertDateFormat(respuesta[key].Fecha_de_Inicio__c)+'</td>';
						table+='<td colspan="1">'+convertDateFormat(respuesta[key].Fecha_Fin__c)+'</td>';
						table+='<td><center>'+respuesta[key].Bimestre__c+'</center></td>';		
						table+='</tr>';
						table+='</tbody>';
      
					});
				    table+='</table>';
			      //console.log(respuesta);
                  document.getElementById("mallaBody").innerHTML =table;
			    $('#open').click();
                //alert(data);
				}else{
				// setTimeout('window.location.href = "http://trial.claseejecutiva.com/publico/index/login";', 2000); 	
				}
				 
                },
                error : function(xhr,errmsg,err) {
                 // console.log(xhr.status + ": " + xhr.responseText);
				  //setTimeout('window.location.href = "http://www.claseejecutiva.com";', 2000);
                }
  });

}
function convertDateFormat(string) {
  var info = string.split('-');
  return info[2] + '/' + info[1] + '/' + info[0];
}

//Funciones Valida Extenciones

function validaArchivo1(){   
	var ext = $('#tb1').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	alert("Archivo con Extension Incorrecta");
	$("#tb1").empty();
	document.getElementById('tb1').value = "";
	 } 
  }

function validaArchivo2(){   
	var ext = $('#tb2').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	alert("Archivo con Extension Incorrecta");
	$("#tb2").empty();
	document.getElementById('tb2').value = "";
	 } 
  }

function validaArchivo3(){   
	var ext = $('#tb3').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	alert("Archivo con Extension Incorrecta");
	$("#tb3").empty();
	document.getElementById('tb3').value = "";
	 } 
  }

function validaArchivo4(){   
	var ext = $('#tb4').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	alert("Archivo con Extension Incorrecta");
	$("#tb4").empty();
	document.getElementById('tb4').value = "";
	 } 
  } 

function validaArchivo5(){   
	var ext = $('#tb5').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	alert("Archivo con Extension Incorrecta");
	$("#tb5").empty();
	document.getElementById('tb5').value = "";
	 } 
  } 

function validaArchivo6(){   
	var ext = $('#tb6').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	alert("Archivo con Extension Incorrecta");
	$("#tb6").empty();
	document.getElementById('tb6').value = "";
	 } 
  } 


function validaArchivo7(){   
	var ext = $('#tb7').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	alert("Archivo con Extension Incorrecta");
	$("#tb7").empty();
	document.getElementById('tb7').value = "";
	 } 
  }  

function validaArchivo8(){   
	var ext = $('#tb8').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	alert("Archivo con Extension Incorrecta");
	$("#tb8").empty();
	document.getElementById('tb8').value = "";
	 } 
  } 
  
function validaArchivo9(){   
	var ext = $('#tb9').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	alert("Archivo con Extension Incorrecta");
	$("#tb9").empty();
	document.getElementById('tb9').value = "";
	 } 
  } 
  
  function validaArchivo10(){   
	var ext = $('#tb10').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	alert("Archivo con Extension Incorrecta");
	$("#tb10").empty();
	document.getElementById('tb10').value = "";
	 } 
  } 
  
  
  

/*	
		$.ajax({
	       xhr: function() {
		   var xhr = new window.XMLHttpRequest();

		   xhr.upload.addEventListener("progress", function(evt) {
		     if (evt.lengthComputable) {
			   var percentComplete = evt.loaded / evt.total;
			   percentComplete = parseInt(percentComplete * 100);
			   console.log(percentComplete);

			   if (percentComplete === 100) {

			  }

		    }
		  }, false);

		  return xhr;
	    },
		
		var DataForm:{data:$('#form_pre').serialize()},
	    url: 'http://ws.diplomadosuc.cl/landing/index.php/testing/do_upload',
	    type: "POST",
	    data: DataForm,
	    contentType: "application/json",
	    dataType: "json",
	    success: function(result) {
		console.log(result);
		//alert('Enviar');
		
	  }
	});

*/

