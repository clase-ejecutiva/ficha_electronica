$(document).ready(function() {
	

$('#pais').click(function(event) {
var pais=$('#pais').val();
	if(pais!='null'){
		if(pais==='Chile'){
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
		
		
		$('#label-region1').removeClass("d-none").addClass("d");
		$('#label-comuna').removeClass("d-none").addClass("d");
		$('#label-ciudad').removeClass("d").addClass("d-none");

        $('#region1').removeClass("d").addClass("d-none");
        $('#comuna1').removeClass("d").addClass("d-none");	


        $('#region2').removeClass("d-none").addClass("d");
        $('#comuna2').removeClass("d-none").addClass("d");		

		
		}else{
		/*	
		$('#inlineCheckbox1').attr("disabled", true);	
		$('#inlineCheckbox2').attr("disabled", true);
		$('#inlineCheckbox3').attr("disabled", true);
        $('#inlineCheckbox4').attr("disabled", false);	
		$('#inlineCheckbox5').attr("disabled", true);	
		$('#inlineCheckbox6').attr("disabled", true);	
		*/
		$('#inlineCheckbox1').removeClass("d-none").addClass("d");	
		$('#inlineCheckbox2').removeClass("d").addClass("d-none");
		$('#inlineCheckbox3').removeClass("d").addClass("d-none");
        $('#inlineCheckbox4').removeClass("d-none").addClass("d");
		$('#inlineCheckbox5').removeClass("d").addClass("d-none");
		$('#inlineCheckbox6').removeClass("d").addClass("d-none");
		$('#inlineCheckbox7').removeClass("d").addClass("d-none");	
		
		$('#label-comuna').removeClass("d").addClass("d-none");
        $('#label-region1').removeClass("d").addClass("d-none");
		$('#label-ciudad').removeClass("d-none").addClass("d");
        $('#region1').removeClass("d").addClass("d-none");
        $('#comuna1').removeClass("d-none").addClass("d");
		$('#region2').removeClass("d").addClass("d-none");
        $('#comuna2').removeClass("d").addClass("d-none");	
        $('#ciudad').removeClass("d-none").addClass("d");	
		
		}
	}
 });
//Datos de pagador
$('#tipo_p').click(function(event) {
var t_per=$('#tipo_p').val();
	if(t_per!='null'){
		if(t_per==='Juridica'){
		$('#datosPagoPN').removeClass("d").addClass("d-none");		
		$('#datosPagoPJ').removeClass("d-none").addClass("d");
		$('#Direccion_contacto').removeClass("d-none").addClass("d");
		$('#informacion_de_contacto_PJ').removeClass("d-none").addClass("d");
		}else if(t_per==='Natural'){
		$('#datosPagoPJ').removeClass("d").addClass("d-none");
		$('#informacion_de_contacto_PJ').removeClass("d").addClass("d-none");				
	    $('#datosPagoPN').removeClass("d-none").addClass("d");
	    $('#Direccion_contacto').removeClass("d-none").addClass("d");
		}else{
		$('#datosPagoPN').removeClass("d").addClass("d-none");
		$('#datosPagoPJ').removeClass("d").addClass("d-none");
		$('#informacion_de_contacto_PJ').removeClass("d").addClass("d-none");
        $('#Direccion_contacto').removeClass("d").addClass("d-none");		
		}
	}
 }); 
 
 

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
		"f_inscripcion" :{required:true},
		"ejecutivo" :{required:true},
		"nombre" :{required:true},
		"apellido" :{required:true},
		"dni" :{required:true},
		"empresa" :{required:true},
		"cargo" :{required:true},
		"dir" :{required:true},
		"pais" :{required:true},
		"comuna" :{required:true},
		"region" :{required:true},
		"tel" :{required:true},
		"email" :{required:true,email:true},
		"userfile[]" :{required:true},
		"acepta" :{required:true},
		"mpago":{required:true},
		"tipo_p":{required:true},
		"nom_pn":{required:true},
		"ape_pn":{required:true},
		"nom_pj":{required:true},
		"web_e":{required:true},
		"giro":{required:true},
		"nombre_rl":{required:true},
		"rut_rl":{required:true},
		"dir_pagador":{required:true},
		"ciudad_pagador":{required:true},
		"pais_pagador":{required:true},
		"com_pagador":{required:true},
		"nom_con":{required:true},
		"cargo_con":{required:true},
		"ape_pat_con":{required:true},
		"email_con":{required:true},
		"ape_mat_con":{required:true},
		"tel_con":{required:true}
      },
      messages:{
        "nombre" :{required:"Ingresa tu nombre"},
        "apellido" :{required:"Ingresa tu teléfono"},
        "dni" :{required:"Ingresa tu Rut o DNI"},
        "empresa" :{required:"Ingresa tu empresa"},		
        "cargo" :{required:"Ingresa tu cargo"},		
        "dir" :{required:"Ingresa tu Direccion"},		
        "pais" :{required:"Selecciona tu país"},		
        "comuna" :{required:"Ingresa tu Comuna"},		
        "region" :{required:"Ingresa tu Region"},		
        "tel" :{required:"Ingresa tu Telefono"},		
		"email" :{required:"Ingresa tu email",email:"Ingresa un email válido"},
		"userfile[]" :{required:"Ingresa tus Archivos"},
		"acepta" :{required:"Favor de Aceptar las Condiciones <br>"},      
		"mpago" :{required:"Favor de Seleccionar un medio de Pago<br>"},      
		"tipo_p" :{required:"Favor de Seleccionar Tipo de Persona<br>"},      
		"nom_pn" :{required:"Favor de Ingresar algun Nombre"},      
		"ape_pn" :{required:"Favor de Ingresar algun Apellido"},      
		"nom_pj" :{required:"Favor de Ingresar algun Nombre"},      
		"web_e" :{required:"Favor de Ingresar alguna Web"},     
		"giro" :{required:"Favor de Ingresar Giro"},     
		"nombre_rl":{required:"Favor de Ingresar Nombre"},     
		"rut_rl":{required:"Favor de Ingresar Rut"},     
		"dir_pagador":{required:"Favor de Ingresar Direccion"},     
		"ciudad_pagador":{required:"Favor de Ingresar Ciudad"},     
		"pais_pagador":{required:"Favor de Ingresar Pais"},     
		"com_pagador":{required:"Favor de Ingresar Comuna"},     
		"nom_con":{required:"Favor de Ingresar Nombre"},     
		"cargo_con":{required:"Favor de Ingresar Cargo"},     
		"ape_pat_con":{required:"Favor de Ingresar Apellido Paterno"},     
		"email_con":{required:"Favor de Ingresar Email"},     
		"ape_mat_con":{required:"Favor de Ingresar Apellido Materno"},     
		"tel_con":{required:"Favor de Ingresar Telefono"}     
      },
      errorElement: "span",
      submitHandler: function(form){
//	$('#ok').removeClass("btn btn-success").addClass("btn btn-warning").val("Enviando....");	  
//	$('#loader').removeClass('invisible');
//	$('#loader').addClass('visible');	  
//	$("#form_pre").submit();
//var DataForm=$('#form_pre').serialize();	

        var formUrl = "http://ws.diplomadosuc.cl/landing/index.php/testing2/do_upload";
        var formData = new FormData($('#form_pre')[0]);

        $.ajax({
                url: formUrl,
                type: 'POST',
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data, textSatus, jqXHR){
                        //now get here response returned by PHP in JSON fomat you can parse it using JSON.parse(data)
                },
                error: function(jqXHR, textStatus, errorThrown){
                        //handle here error returned
                }
        });

	
        }
    });

});
//


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
		
		
	    url: 'http://ws.diplomadosuc.cl/landing/index.php/testing/do_upload',
	    type: "POST",
	    data: DataForm,
	    contentType: "application/json",
	    dataType: "json",
	    success: function(result) {
		console.log(result);
		alert('result');
		
	  }
	});
*/




});//Fin Funcion Document Ready
 
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
/*
$('#modal_ayuda').on('shown.bs.modal', function modal_ayuda() {
  $('#myInput').trigger('focus')
})
*/

function modal_ayuda(){
//$('#modal_ayuda').modal('show');

$('#modal_ayuda').on('shown.bs.modal', function modal_ayuda() {
  $('#modal_ayuda').trigger('focus')
})

}

function malla_diplo(sku){	
//$('#malla').attr('data-toggle','modal');
//var sku=sku;	
//var url='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php?idOp='+sku+'&action=malla';
			$(document).ready(function() {
				$("#boton").click(function(event) {
					$("#capa").load('/demos/2013/03-jquery-load05.php #contenido');
				});
			});

//data-toggle="modal" data-target="#ModalMalla"
//return url	
//alert(sku);	
/*
 $.ajax({
                url :'https://ws2.diplomadosuc.cl/landing/index.php/testing/malla?idOp='+sku,
                type : "GET",
                data :sku,
                success: function(data){
                console.log(data) 					
				respuesta = JSON.parse(data);
				//respuesta = data;
				//document.getElementById("loader-landing-0").style.display="none";         
	            //$("#enviar" ).val('Gracias,Pronto te contactaremos');
				if(respuesta){
		
		
                $('#ModalMalla').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever')
				var modal = $(this)
				// modal.find('.modal-title').text('New message to ' + recipient)
                 modal.find('.modal-body').val('llego')
				 
				})

                //alert(data);
				}else{
				// setTimeout('window.location.href = "http://trial.claseejecutiva.com/publico/index/login";', 2000); 	
				}
				 
                },
                error : function(xhr,errmsg,err) {
                 // console.log(xhr.status + ": " + xhr.responseText);
				  setTimeout('window.location.href = "http://www.claseejecutiva.com";', 2000);
                }
  });
*/
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

