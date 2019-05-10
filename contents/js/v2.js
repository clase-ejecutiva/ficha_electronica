//Declaracion de Variables
let data_chq = [];	
var table_cheques;
var CheckChqPropios;
var ChqPropiosMonto;	 
var ChkChqTercertos;
var ChqTercerosMonto; 
var CheckDeposito;
var CheckDepositoMonto;
var CheckPos;
var CheckPosMonto;	 
var CheckWebpay;
var CheckWebpayMonto;
var CheckOC;
var CheckMontoOC;
var CheckSence;
var step;
var pais_step2;
var total_tabla_resumen_a=0;
let info_alum

$(document).ready(function() {
	

if(getCookie('FichaCe')&& step!="" ){
var ficaCookie=getCookie('FichaCe');
//alert(ficaCookie);
var dataCookie = JSON.parse(ficaCookie);
  moment.locale('es');
var date= moment(dataCookie.FechaCreacion.replace('+',' '));
 //http://momentjs.com/docs/#/displaying/format/ date.format('LLLL')
 $('#body-modalReanudar').html('Usted tiene una Ficha <b>Pre-inscrita</b> ,la ultima modificacion fue el <b>'+date.format('LLLL')+'</b> Favor de indicar si desea <b>Re-anudar</b> su ficha Electronica ');
 $('#open-reanudar').click();

	$('#reanudar_si').click(function() {
	reanudar(step);	
	});

}
	
$( "#f_nacimiento" ).datepicker({
	dateFormat: "dd/mm/yy",
	changeMonth: true,
	changeYear: true,
	yearRange: "c-90:c+30",
});

var iCnt = 0;
// Crear un elemento div añadiendo estilos CSS
var container = $(document.createElement('div')).css({
border: '1px dashed',
borderTopColor: '#999', borderBottomColor: '#999',
borderLeftColor: '#999', borderRightColor: '#99'
}).addClass(".hidden-xs-down  mx-auto");

$('#btAdd').click(function() {
if (iCnt <= 12) {
 
iCnt = iCnt + 1;
 
// Añadir caja de texto.<input type="file" name="userfile" size="20" />
$(container).append('<input type=file class="input col-md-6" name="userfile[]" size="20" id=tb' + iCnt + ' ' +'value="Archivo Numero' +iCnt+ '" onchange="validaArchivo'+iCnt+'()"/>');


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


//Funciona para cambiar pais

if($('#step_2_form').length > 0){
	$('#id_pais_residencia').change(function() {
		if($('#id_pais_residencia').val()==='Chile(PS-38)'){
				$('#id_titulo_comuna_alumno').html('Comuna');
				$('#id_input_ciudad_extranjera').removeClass("d").addClass("d-none");
				$('#id_comuna_alumno').removeClass("d-none").addClass("d");
				$('#id_region_extrangera').removeClass("d").addClass("d-none");
				$('#id_region_residencia').removeClass("d-none").addClass("d");			
			//alert('es chile');
			 $('#id_region_residencia').change(function() {
				// alert('actualizar region');
				var region=$('#id_region_residencia').val();
				region_f=region.split('_');
				
		 $.ajax({
                url :'https://ficha.claseejecutiva.com/index.php/controller/get_comuna',
                type : "POST",
                data :{id_comuna:region_f[1]},
                success: function(data){		
				respuesta = JSON.parse(data);
				datos=respuesta.comunas;
					if(respuesta)
					{ 
					//console.log(respuesta);	
                    var html_comunas='<option value="" selected>Seleccione Comuna</option>';				
					Object.keys(datos).forEach(function (key) {				
						html_comunas+='<option value="'+datos[key].nombre+'">'+datos[key].nombre+'</option>';						
					});				
				    $('#id_comuna_alumno').html(html_comunas);

					
					}else{
					// setTimeout('window.location.href = "http://trial.claseejecutiva.com/publico/index/login";', 2000); 	
					}
				 
                },
                error : function(xhr,errmsg,err) {
                  console.log(xhr.status + ": " + xhr.responseText);
				  
                 }
              });				
				
				
				
				

				
			  });
			
			
			}else{
				$('#id_titulo_comuna_alumno').html('Ciudad Extranjera');
				$('#id_input_ciudad_extranjera').removeClass("d-none").addClass("d");
				$('#id_comuna_alumno').removeClass("d").addClass("d-none");
				$('#id_region_extrangera').removeClass("d-none").addClass("d");
				$('#id_region_residencia').removeClass("d").addClass("d-none");
			}
	});
}


$('#step_1_sgte').click(function() {
	
	$("#step_1_form").validate({
		rules:{
		"f_nacimiento"    :{required:true},
		"nombre"           :{required:true},
		"apellidoPaterno"  :{required:true},
		"apellidoMaterno"  :{required:true},
		"tipo_documento"   :{required:true},
		"tel"              :{required:true},
		"dni"              :{required:true,
					         minlength:5, 
					         maxlength:20,
					         pattern:true,
					         checkRut:function(){ if($('#step_1_form').find('select[name="tipo_documento"]').val() == "Rut(1)") return false; },
					        },
		"genero"          :{required:true},
		"email"          :{required:true},
		"pais_origen"    :{required:true},
		"estado_civil"   :{required:true}
		},
      messages:{
        "f_nacimiento"    :{required:"Ingresa tu fecha de nacimiento"},
        "nombre"          :{required:"Ingresa tu nombre"},
        "apellidoPaterno" :{required:"Ingresa tu Apellido Paterno"},
        "apellidoMaterno" :{required:"Ingresa tu Apellido Materno"},
        "tipo_documento"  :{required:"Selecciona tu Tipo de Documento"},
        "tel"             :{required:"Favor ingresa tu telefono"},
        "dni"             :{required:"Ingresa tu Rut o DNI"},
        "genero"          :{required:"Ingresa tu Genero"},
        "email"           :{required:"Favor de ingresar tu Email"},
        "pais_origen"     :{required:"Favor tu Pais de Origen"},
        "estado_civil"    :{required:"Ingresa tu Estado Civil"}
		 },
      errorElement: "span",
      submitHandler: function(form){
	  			$.ajax({
				data: $('#step_1_form').serialize(),
				url : 'https://ficha.claseejecutiva.com/index.php/controller/step_1',
				type : 'POST',
				success : function(html){
					respuesta = JSON.parse(html);

					if(respuesta.status=='ok'){
						//alert('datos insertados');
                      $('#container_step_1').removeClass("d").addClass("d-none");
		              $('#container_step_2').removeClass("d-none").addClass("d");
					}else{

                        $('#body-modalError').html('Error al inscribir,ya existe en la BBDD');
						$('#open-error').click();
					}
				}
			});
	  }
		
		
	});//validate

});//step_1



$('#step_2_sgte').click(function() {//function(){$('#id_otro_cheque_nombre').val().length}
	
	$("#step_2_form").validate({
		rules:{
		"pais_residencia"   :{required:true},
		"region_residencia" :{required:function(){$('#id_region_residencia').val().length}},
		"dir"               :{required:true},
		"dir_num"           :{required:true},
		"region_extrangera" :{required:function(){$('#id_region_extrangera').val().length}},
		"ciudad_extranjera" :{required:function(){$('#id_input_ciudad_extranjera').val().length}},
		"comuna_residencia" :{required:function(){$('#id_comuna_alumno').val().length}},
		},
      messages:{
        "pais_residencia"   :{required:"Ingresa tu Pais de Residencia"},
        "region_residencia" :{required:"Ingresa tu Region"},
        "dir"               :{required:"Ingresa tu Direccion"},
        "dir_num"           :{required:"Ingresa tu Numeracion"},
        "region_extrangera" :{required:"Favor de ingresar Region"},
        "ciudad_extranjera" :{required:"Favor de ingresar la ciudad"},
        "comuna_residencia" :{required:"Ingresa tu Comuna"}
		 },
      errorElement: "span",
      submitHandler: function(form){
	  			$.ajax({
				data: $('#step_2_form').serialize(),
				url : 'https://ficha.claseejecutiva.com/index.php/controller/step_2',
				type : 'POST',
				success : function(html){
					respuesta = JSON.parse(html);
					//$('#loader-landing-1').removeClass('show');
        			//$('#loader-landing-1').addClass('hide');
					//console.log(respuesta);
					if(respuesta.status=='ok'){
						//alert('datos insertados');
					  pais_step2=$('#id_pais_residencia').val();
					  if(pais_step2==='Chile(PS-38)'){
					     $('#container_step_2').removeClass("d").addClass("d-none");
		                 $('#container_step_3').removeClass("d-none").addClass("d");
						 $('#mpago_step_1').removeClass("d-none").addClass("d");  
						 $('#mpago_step_1_extranjero').removeClass("d").addClass("d-none");  
					  }else{
					    $('#container_step_2').removeClass("d").addClass("d-none");
		                $('#container_step_3').removeClass("d-none").addClass("d");  
					  	$('#mpago_step_1').removeClass("d").addClass("d-none");  
						$('#mpago_step_1_extranjero').removeClass("d-none").addClass("d");  
					  }

					}else{
						$('#modalErrorlLabel').html('Existe un Problema');	
						$('#body-modalError').html('Error al inscribir,ya existe en la BBDD');
						$('#open-error').click();
					}
				}
			});
	  }
		
		
	});//validate

});//step_2







$('#step_3_sgte').click(function() {
	//pais_step2  Chile(PS-38)
	
	//mpago_step_1_extranjero
	//mpago_step_1
var mpago=$('#step_3_form').find('input[name=mpago]:checked').val();
var idOp=$('#idOp_step_3').val();
	      $.ajax({
					url :'https://ficha.claseejecutiva.com/index.php/controller/chequePropios/',
					type : "POST",
					data :{'idOp':idOp},
					success: function(html){						
					respuesta = JSON.parse(html);
                    info_alum=JSON.parse(respuesta['0']);	
                    info_alum_dir=JSON.parse(respuesta['1']);						
				   // info_alum= respuesta;
					//console.log(info_alum);
					},
					error : function(xhr,errmsg,err) {
					 // console.log(xhr.status + ": " + xhr.responseText);
					  //setTimeout('window.location.href = "http://www.claseejecutiva.com";', 2000);
					}
	           });

switch (mpago) {
	//OK 25-02-2019 , VALIDA MONTO Y SUBTOTAL EN RESUMEN
	case 'mpagoTranferencia':
	$('#mpago_step_1_extranjero').removeClass("d").addClass("d-none");

	 $.ajax({
					url :'https://ficha.claseejecutiva.com/index.php/controller/chequePropios/',
					type : "POST",
					data :{'idOp':idOp},
					success: function(html){						
					respuesta = JSON.parse(html);	
					if(respuesta){
                    form1=JSON.parse(respuesta['0']);	
                    form2=JSON.parse(respuesta['1']);	
				    data_chq.push({"medioPago" : "Transferencia Bancaria","rut" :form1.dni,"datoPagador" :form1.nombre+' '+form1.apellidoPaterno ,"nombre":form1.nombre,"apellidoP":form1.apellidoPaterno,"apellidoM":form1.apellidoMaterno,"direccion":form2.dir+' '+form2.dir_num+' '+form2.pais_residencia+' '+form2.region_residencia,"total" :$('#montoFinalUSD_step_3').val()});	
 
					var table_resumen_ext_t='<div class="col-md-12 form-group row">';
						table_resumen_ext_t+='<div  class="col-md-12 field-label-responsive"><br></div>';	
						table_resumen_ext_t+='<div  class="col-md-4 field-label-responsive"> <br></div>';						
						table_resumen_ext_t+='<div  class="col-md-4 field-label-responsive"> Tabla Resumen de pago </div>';	
						table_resumen_ext_t+='<div  class="col-md-4 field-label-responsive"><br></div>';	
                        table_resumen_ext_t+='<div  class="col-md-12 field-label-responsive"><br></div>';							
				        table_resumen_ext_t+='<div class="col-md-12 table-responsive">';
					    table_resumen_ext_t+='<table class="table">';
						table_resumen_ext_t+= '<thead >';
						table_resumen_ext_t+= '<br >';
						table_resumen_ext_t+= '<tr>';						
						table_resumen_ext_t+= '<th colspan="1">Medio Pago:</th>';
						table_resumen_ext_t+= '<th colspan="1">DNI Pagador:</th>';
						table_resumen_ext_t+= '<th colspan="1">Datos Pagador:</th>';
						table_resumen_ext_t+= '<th colspan="1">Total</th>';
						table_resumen_ext_t+= '</tr>';
						table_resumen_ext_t+= '</thead>';
						table_resumen_ext_t+='<tbody>';
					Object.keys(data_chq).forEach(function (key) {
					    table_resumen_ext_t+='<tr>';				
						table_resumen_ext_t+='<td>'+data_chq[key].medioPago+'</td>';						
						table_resumen_ext_t+='<td colspan="1">'+data_chq[key].rut+'</td>';
						table_resumen_ext_t+='<td colspan="1">'+data_chq[key].datoPagador+'</td>';
						table_resumen_ext_t+='<td colspan="1">'+data_chq[key].total+'</td>';
						table_resumen_ext_t+='</tr>';
                        total_tabla_resumen_a=(total_tabla_resumen_a+parseInt(data_chq[key].total));
      
					});
				    table_resumen_ext_t+='</tbody>';
				    table_resumen_ext_t+='</table>';//
				    table_resumen_ext_t+='</div>';		
                    table_resumen_ext_t+='<div  class="col-md-8 field-label-responsive"> <br></div><div  class="col-md-4 field-label-responsive">Total a Pagar es $USD:'+formatNumber(total_tabla_resumen_a)+'</div>';						
				    table_resumen_ext_t+='<input type="hidden" name="tabla_transferencia" id="id_tabla_transferencia" readonly>';								 
								 
								$('#mpago_div_resumen').removeClass("d-none").addClass("d");
								$('#mpago_otros_resumen_total').html(table_resumen_ext_t);
								$('#mpago_oc').removeClass("d").addClass("d-none");
								$('#boton_mpago').removeClass("d").addClass("d-none");
								$('#mpago_otros_resumen').removeClass("d-none").addClass("d");
								$('#boton_fin_step_3_otros_resumen_sgte').removeClass("d-none").addClass("d");
								$('#id_tabla_transferencia').val(JSON.stringify(data_chq));
								//$('#boton_fin_step_3_otros_resumen_sgte').removeClass("d-none").addClass("d");
								
								 $('#step_3_otros_resumen_sgte').click(function() {

	                            if(total_tabla_resumen_a===parseInt($('#montoFinalUSD_step_3').val())){ 									 
								//$('#container_step_4').removeClass("d-none").addClass("d");
								  var status_form=enviar_form($('#step_3_form').serialize(),'https://ficha.claseejecutiva.com/index.php/controller/step_3');
									 $('#container_step_3').removeClass("d").addClass("d-none");
		                             $('#container_step_4').removeClass("d-none").addClass("d");
									}else{
										 $('#modalErrorlLabel').html('Los montos no son correctos');	
										 $('#body-modalError').html('Estimado ,Favor de revisar su forma de pago,ya que los montos no cuadran');
										 $('#open-error').click();										
										}								 
								 
								 });                    
					 
					 }else{
					// setTimeout('window.location.href = "http://trial.claseejecutiva.com/publico/index/login";', 2000); 	
					}
					 
					},
					error : function(xhr,errmsg,err) {
					 // console.log(xhr.status + ": " + xhr.responseText);
					  //setTimeout('window.location.href = "http://www.claseejecutiva.com";', 2000);
					}
	  });	




	break;
	
	//OK 25-02-2019 , VALIDA MONTO Y SUBTOTAL EN RESUMEN	
	case 'mpagoCuponera':
	$('#mpago_step_1_extranjero').removeClass("d").addClass("d-none");
	 $.ajax({
					url :'https://ficha.claseejecutiva.com/index.php/controller/chequePropios/',
					type : "POST",
					data :{'idOp':idOp},
					success: function(html){						
					respuesta = JSON.parse(html);	
					if(respuesta){
                    form1=JSON.parse(respuesta['0']);	
                    form2=JSON.parse(respuesta['1']);	
				    data_chq.push({"medioPago" : "Cuponera","rut" :form1.dni,"datoPagador" :form1.nombre+' '+form1.apellidoPaterno ,"nombre":form1.nombre,"apellidoP":form1.apellidoPaterno,"apellidoM":form1.apellidoMaterno,"direccion":form2.dir+' '+form2.dir_num+' '+form2.pais_residencia+' '+form2.region_residencia,"total" :parseInt($('#montoFinalUSD_step_3').val())});						
				   // data_chq.push({"medioPago" : "Cuponera ","rut" :respuesta.dni,"datoPagador" :respuesta.nombre+' '+respuesta.apellidoPaterno ,"total" :parseInt($('#montoFinalUSD_step_3').val())});	
 
					var table_resumen_ext_t='<div class="col-md-12 form-group row">';
						table_resumen_ext_t+='<div  class="col-md-12 field-label-responsive"><br></div>';	
						table_resumen_ext_t+='<div  class="col-md-4 field-label-responsive"> <br></div>';						
						table_resumen_ext_t+='<div  class="col-md-4 field-label-responsive"> Tabla Resumen de pago </div>';	
						table_resumen_ext_t+='<div  class="col-md-4 field-label-responsive"><br></div>';	
                        table_resumen_ext_t+='<div  class="col-md-12 field-label-responsive"><br></div>';							
				        table_resumen_ext_t+='<div class="col-md-12 table-responsive">';
					    table_resumen_ext_t+='<table class="table">';
						table_resumen_ext_t+= '<thead >';
						table_resumen_ext_t+= '<br >';
						table_resumen_ext_t+= '<tr>';						
						table_resumen_ext_t+= '<th colspan="1">Medio Pago:</th>';
						table_resumen_ext_t+= '<th colspan="1">DNI Pagador:</th>';
						table_resumen_ext_t+= '<th colspan="1">Datos Pagador:</th>';
						table_resumen_ext_t+= '<th colspan="1">Total</th>';
						table_resumen_ext_t+= '</tr>';
						table_resumen_ext_t+= '</thead>';
						table_resumen_ext_t+='<tbody>';
					Object.keys(data_chq).forEach(function (key) {
					    table_resumen_ext_t+='<tr>';				
						table_resumen_ext_t+='<td>'+data_chq[key].medioPago+'</td>';						
						table_resumen_ext_t+='<td colspan="1">'+data_chq[key].rut+'</td>';
						table_resumen_ext_t+='<td colspan="1">'+data_chq[key].datoPagador+'</td>';
						table_resumen_ext_t+='<td colspan="1">'+data_chq[key].total+'</td>';
						table_resumen_ext_t+='</tr>';
                        total_tabla_resumen_a=(total_tabla_resumen_a+parseInt(data_chq[key].total));
      
					});
				    table_resumen_ext_t+='</tbody>';
				    table_resumen_ext_t+='</table>';
				    table_resumen_ext_t+='</div>';		

                    table_resumen_ext_t+='<div  class="col-md-8 field-label-responsive"> <br></div><div  class="col-md-4 field-label-responsive">Total a Pagar es $USD:'+formatNumber(total_tabla_resumen_a)+'</div>';						
				    table_resumen_ext_t+='<input type="hidden" id="id_tabla_resumen_cuponera" name="tabla_resumen_cuponera"   readonly>';								 
								 
								$('#mpago_div_resumen').removeClass("d-none").addClass("d");
								$('#mpago_otros_resumen_total').html(table_resumen_ext_t);
								$('#mpago_oc').removeClass("d").addClass("d-none");
								$('#boton_mpago').removeClass("d").addClass("d-none");
								$('#mpago_otros_resumen').removeClass("d-none").addClass("d");
								$('#boton_fin_step_3_otros_resumen_sgte').removeClass("d-none").addClass("d");
								$('#id_tabla_resumen_cuponera').val(JSON.stringify(data_chq));
								
								 $('#step_3_otros_resumen_sgte').click(function() {
	                            if(total_tabla_resumen_a===parseInt($('#montoFinalUSD_step_3').val())){ 										 
								//$('#container_step_4').removeClass("d-none").addClass("d");
								  var status_form=enviar_form($('#step_3_form').serialize(),'https://ficha.claseejecutiva.com/index.php/controller/step_3');
									 $('#container_step_3').removeClass("d").addClass("d-none");
		                             $('#container_step_4').removeClass("d-none").addClass("d");
									}else{
										 $('#modalErrorlLabel').html('Los montos no son correctos');	
										 $('#body-modalError').html('Estimado ,Favor de revisar su forma de pago,ya que los montos no cuadran');
										 $('#open-error').click();										
										}									 
								 
								 });                    
					 
					 }else{
					// setTimeout('window.location.href = "http://trial.claseejecutiva.com/publico/index/login";', 2000); 	
					}
					 
					},
					error : function(xhr,errmsg,err) {
					 // console.log(xhr.status + ": " + xhr.responseText);
					  //setTimeout('window.location.href = "http://www.claseejecutiva.com";', 2000);
					}
	  });		
	break;
	
	
	
	case 'mpagoCheque':
	$('#mpago_step_1').removeClass("d").addClass("d-none");
	$('#mpago_cheque').removeClass("d-none").addClass("d");
	 $.ajax({
					url :'https://ficha.claseejecutiva.com/index.php/controller/chequePropios/',
					type : "POST",
					data :{'idOp':idOp},
					success: function(html){						
					respuesta = JSON.parse(html);	
					if(respuesta){
                    form1=JSON.parse(respuesta['0']);	
                    form2=JSON.parse(respuesta['1']);	
				    //data_chq.push({"medioPago" : "Transferencia Bancaria","rut" :form1.dni,"datoPagador" :form1.nombre+' '+form1.apellidoPaterno ,"nombre":form1.nombre,"apellidoP":form1.apellidoPaterno,"apellidoM":form1.apellidoMaterno,"direccion":form2.dir+' '+form2.dir_num+' '+form2.pais_residencia+' '+form2.region_residencia,"total" :parseInt($('#montoFinalUSD_step_3').val())});							
						var table='<div class="form-group row">';
						    table+='<div class="col-md-2"><br></div>';
							table+='<div class="col-md-10">';
							table+='<table class="table table-striped table-responsive">';
							table+= '<thead>';
							table+= '<tr>';
							table+= '<th scope="col">Medio de Pago</th>';
							table+= '<th scope="col">Rut Pagador</th>';
							table+= '<th scope="col">Nombre Pagador</th>';
							table+= '<th scope="col">Apellido Pagador</th>';
							table+= '<th scope="col">Total</th>';
							table+= '</tr>';
							table+= '</thead>';
							table+='<tbody>';
							table+='<tr>';				
							table+='<td>Cheque</td>';						
							table+='<td>'+form1.dni+'</td>';						
							table+='<td>'+form1.nombre+'</td>';
							table+='<td>'+form1.apellidoPaterno+'</td>';
							table+='<td><center>'+form1.montoFinal+'</center></td>';		
							table+='</tr>';
							table+='</tbody>';
						table+='</table>';
						table+='</div>';
					table+='</div>';
					total_tabla_resumen_a=(total_tabla_resumen_a+parseInt(form1.montoFinal));
					
				var input =' <input type="hidden" name="dni_chq"  value="'+form1.dni+'" readonly>';
				    input+=' <input type="hidden" name="nom_chq"  value="'+form1.nombre+'" readonly>';
				    input+=' <input type="hidden" name="apeP_chq" value="'+form1.apellidoPaterno+'" readonly>';
				    input+=' <input type="hidden" name="monto_chq"  value="'+parseInt($('#montoFinal_step_3').val())+'" readonly>';
					 
					  $('#mpago_cheque').html(table);
					  $('#mpago_input').html(input);
					  $('#mpago_cheque').removeClass("d-none").addClass("d");
					  $('#boton_mpago').removeClass("d").addClass("d-none");
					  $('#boton_fin_mpago').removeClass("d-none").addClass("d");
					enviar_form($('#step_3_form').serialize(),'https://ficha.claseejecutiva.com/index.php/controller/step_3');

					}else{
					// setTimeout('window.location.href = "http://trial.claseejecutiva.com/publico/index/login";', 2000); 	
					}
					 
					},
					error : function(xhr,errmsg,err) {
					 // console.log(xhr.status + ": " + xhr.responseText);
					  //setTimeout('window.location.href = "http://www.claseejecutiva.com";', 2000);
					}
	  });

// Finaliza el proceso	  
	  
	$('#step_4').click(function() {
		//alert('paso 4');
		$('#container_step_3').removeClass("d").addClass("d-none");
		$('#container_step_4').removeClass("d-none").addClass("d");
	});	
	  
	
    break;
 
  
  
  case 'mpagoWebpay':
  	$('#mpago_step_1').removeClass("d").addClass("d-none");
	$('#mpago_webpay').removeClass("d-none").addClass("d");
	 $.ajax({
					url :'https://ficha.claseejecutiva.com/index.php/controller/chequePropios/',
					type : "POST",
					data :{'idOp':idOp},
					success: function(html){						
					respuesta = JSON.parse(html);	
					if(respuesta){
                    form1=JSON.parse(respuesta['0']);	
                    form2=JSON.parse(respuesta['1']);							
						var table_wp='<div class="form-group row">';
						    table_wp+='<div class="col-md-2"><br></div>';
							table_wp+='<div class="col-md-10">';
							table_wp+='<table class="table table-striped table-responsive">';
							table_wp+= '<thead>';
							table_wp+= '<tr>';
							table_wp+= '<th scope="col">Medio de Pago</th>';
							table_wp+= '<th scope="col">Rut Pagador</th>';
							table_wp+= '<th scope="col">Nombre Pagador</th>';
							table_wp+= '<th scope="col">Apellido Pagador</th>';
							table_wp+= '<th scope="col">Total</th>';
							table_wp+= '</tr>';
							table_wp+= '</thead>';
							table_wp+='<tbody>';
							table_wp+='<tr>';				
							table_wp+='<td>WebPay</td>';						
							table_wp+='<td>'+form1.dni+'</td>';						
							table_wp+='<td>'+form1.nombre+'</td>';
							table_wp+='<td>'+form1.apellidoPaterno+'</td>';
							table_wp+='<td><center>'+form1.montoFinal+'</center></td>';		
							table_wp+='</tr>';
							table_wp+='</tbody>';
						table_wp+='</table>';
						table_wp+='</div>';
					table_wp+='</div>';
					
				var input_wp =' <input type="hidden" name="dni_wp"  value="'+form1.dni+'" readonly>';
				    input_wp+=' <input type="hidden" name="nom_wp"  value="'+form1.nombre+'" readonly>';
				    input_wp+=' <input type="hidden" name="apeP_wp" value="'+form1.apellidoPaterno+'" readonly>';
				    input_wp+=' <input type="hidden" name="monto_wp"  value="'+form1.montoFinal+'" readonly>';
					 
					  $('#mpago_webpay').html(table_wp);
					  $('#mpago_input').html(input_wp);
					  //$('#mpagoWebpay').removeClass("d-none").addClass("d");
					  $('#boton_mpago').removeClass("d").addClass("d-none");
					  $('#boton_fin_mpago').removeClass("d-none").addClass("d");
					enviar_form($('#step_3_form').serialize(),'https://ficha.claseejecutiva.com/index.php/controller/step_3');
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

	$('#step_4').click(function() {
		//alert('paso 4');
		$('#container_step_3').removeClass("d").addClass("d-none");
		$('#container_step_4').removeClass("d-none").addClass("d");
	});		  
    break;
	
	case'mpagoOC':
	$('#mpago_step_1').removeClass("d").addClass("d-none");
	$('#titulo_mpago').removeClass("d").addClass("d-none");
	$('#mpago_oc').removeClass("d-none").addClass("d");
	$('#boton_mpago').removeClass("d").addClass("d-none");
	$('#id_total_oc').val($('#montoFinal_step_3').val());
	
	//mpago_oc
	
	if($('#mpago_oc').length > 0){
		$('#id_total_oc').attr('readonly', true);
		
		$('#step_OC_4_agregar').click(function() {

						

						
		$("#id_table_oc").removeClass("d-none").addClass("d");
			$("#step_3_form").validate({
			rules:{
				"rut_oc"           :{required:true,
									 minlength:5, 
									 maxlength:20,
									 pattern:true,
									 checkRut:function(){  return true; },
									},
				"razon_social"     :{required:true},
				"dir_emp"          :{required:true},
				"comuna_emp"       :{required:true},
				"telefono_emp"     :{required:true},
				"atencion_emp"     :{required:false},
				"mail_contacto_emp":{required:false},
				"nro_oc"           :{required:false},
				"total_oc"         :{required:false}
			},
			  messages:{
				"rut_oc"           :{required:"Ingresa El rut de tu Empresa"},
				"razon_social"     :{required:"Ingresa la Razon Social"},
				"dir_emp"          :{required:"Ingresa tu Direccion"},
				"comuna_emp"       :{required:"Ingresa tu Numeracion"},
				"telefono_emp"     :{required:"Ingresa el Telefono"},
				"atencion_emp"     :{required:"Ingresa la Persona de Contacto"},
				"mail_contacto_emp":{required:"Ingresa Email Contacto"},
				"nro_oc"           :{required:"Ingresa el N° de OC"},
				"total_oc"         :{required:"Ingresa Email Contacto"},
				 },
				  errorElement: "span",
				  ignore: ".ignore"	,  
				  submitHandler: function(form) {
				  //  data_chq.push({"medioPago" : "Orden de Compra","rut" :form1.dni,"datoPagador" :form1.nombre+' '+form1.apellidoPaterno ,"nombre":form1.nombre,"apellidoP":form1.apellidoPaterno,"apellidoM":form1.apellidoMaterno,"direccion":form2.dir+' '+form2.dir_num+' '+form2.pais_residencia+' '+form2.region_residencia,"total" :parseInt($('#montoFinalUSD_step_3').val())});					  
                    data_chq.push({"medioPago" : "Orden de Compra","rut" :$('#rut_oc').val(),"datoPagador" :$('#id_razon_social').val(),"nombre":$('#id_atencion_emp').val(),"apellidoP":'',"apellidoM":'',"direccion":$('#id_dir_emp').val(),"total" :$('#id_total_oc').val()});		  
				  		var table_oc='<div class="form-group row">';
						    table_oc+='<div class="col-md-2"><br></div>';
							table_oc+='<div class="col-md-10">';
							table_oc+='<table class="table table-striped table-responsive">';
							table_oc+= '<thead>';
							table_oc+= '<tr>';
							table_oc+= '<th scope="col">Medio de Pago</th>';
							table_oc+= '<th scope="col">Rut Pagador</th>';
							table_oc+= '<th scope="col">Datos Pagador</th>';
							table_oc+= '<th scope="col">Total a Pagar</th>';
							table_oc+= '<th scope="col">Modificar</th>';
							table_oc+= '</tr>';
							table_oc+= '</thead>';
							table_oc+='<tbody>';
							table_oc+='<tr>';	
		Object.keys(data_chq).forEach(function (key) {							
							table_oc+='<td>'+data_chq[key].medioPago+'</td>';						
							table_oc+='<td>'+data_chq[key].rut+'</td>';						
							table_oc+='<td>'+data_chq[key].datoPagador+'</td>';
							table_oc+='<td>'+data_chq[key].total+'</td>';
							table_oc+='<td><button type="button" onClick="removerTablaOC();" class="btn btn-info btn-lg btn-block">Eliminar</button></td>';		
							table_oc+='</tr>';
							total_tabla_resumen_a=(total_tabla_resumen_a+parseInt(data_chq[key].total));
				});	
							table_oc+='</tbody>';
						table_oc+='</table>';
						table_oc+='</div>';
					table_oc+='</div>';
					
					
					
				   $('#id_table_oc').html(table_oc);
				   $('#id_table_oc_unica').html('<input type="hidden" name="tabla_oc" id="id_valores_tabla_oc_unica" value="" readonly>');
				   $('#id_valores_tabla_oc_unica').val(JSON.stringify(data_chq));
				   
				   
				   		
				   $('#rut_oc').val('');						
		           $('#id_razon_social').val('');						
		           $('#id_comuna_emp').val('');
		           $('#id_dir_emp').val('');
		           $('#id_telefono_emp').val('');
		           $('#id_mail_contacto_emp').val('');
		           $('#id_atencion_emp').val('');
		           $('#id_nro_oc').val('');
				   //#step_OC_4
				   $('#step_OC_4').click(function() {
                   if(total_tabla_resumen_a===parseInt($('#montoFinal_step_3').val())){ 						
					enviar_form($('#step_3_form').serialize(),'https://ficha.claseejecutiva.com/index.php/controller/step_3');
	             	$('#container_step_3').removeClass("d").addClass("d-none");
		            $('#container_step_4').removeClass("d-none").addClass("d");
						  }else{
								$('#modalErrorlLabel').html('Los montos no son correctos');	
								 $('#body-modalError').html('Estimado ,Favor de revisar su forma de pago,ya que los montos no cuadran');
								$('#open-error').click();										
						}							
					});
				  }
				
			  });
			});  
		
	}
	break;
	
	
	
	
	case 'mpagoOtra':
	$('#mpago_step_1').removeClass("d").addClass("d-none");
	$('#titulo_mpago').removeClass("d").addClass("d-none");
	$('#mpagoOtraLayout').removeClass("d-none").addClass("d");
	$('#boton_mpago').removeClass("d").addClass("d-none");
	$('#boton_fin_mpago').removeClass("d").addClass("d-none");
	$('#boton_otro_mpago').removeClass("d-none").addClass("d");
	$('#id_total_otro_mpago2').html('Total a Pagar:  $'+formatNumber($('#id_total_otro_mpago').val()));
	
	if($('#mpagoOtraLayout').length > 0){
		
		$('#id_check_ch_propios').change(function(){ if($("#id_check_ch_propios").is(":checked")){$('#id_total_cheque').attr('readonly', false);}else{$('#id_total_cheque').attr('readonly', true);   }});
		$('#id_check_ch_terceros').change(function(){ if($("#id_check_ch_terceros").is(":checked")){$('#id_total_cheque_terceros').attr('readonly', false);}else{$('#id_total_cheque_terceros').attr('readonly', true);}});
		$('#id_check_deposito').change(function(){ if($("#id_check_deposito").is(":checked")){$('#id_total_deposito').attr('readonly', false);}else{$('#id_total_deposito').attr('readonly', true);}});
		$('#id_check_pos').change(function(){ if($("#id_check_pos").is(":checked")){$('#id_total_pos').attr('readonly', false);}else{$('#id_total_pos').attr('readonly', true);}});
		$('#id_check_webpay').change(function(){ if($("#id_check_webpay").is(":checked")){$('#id_total_webpay').attr('readonly', false);}else{$('#id_total_webpay').attr('readonly', true);}});
		$('#id_check_oc_empresa').change(function(){ if($("#id_check_oc_empresa").is(":checked")){$('#id_total_oc_empresa').attr('readonly', false);}else{$('#id_total_oc_empresa').attr('readonly', true);}});
	
	
	$('#step_3_otro').click(function() {
			
     CheckChqPropios =$("#id_check_ch_propios").is(":checked");
	 //if($("#id_check_ch_propios").is(":checked")){$('#id_total_cheque').attr('readonly', false);}else{$('#id_total_cheque').attr('readonly', true);}
     ChqPropiosMonto =parseInt($('#id_total_cheque').val());
	 ChkChqTercertos =$('#id_check_ch_terceros').is(":checked");
     ChqTercerosMonto =parseInt($('#id_total_cheque_terceros').val());
	 CheckDeposito =$('#id_check_deposito').is(":checked");
	 CheckDepositoMonto =parseInt($('#id_total_deposito').val());
	 CheckPos=$('#id_check_pos').is(":checked");
	 CheckPosMonto=parseInt($('#id_total_pos').val());
	 CheckWebpay=$('#id_check_webpay').is(":checked");
	 CheckWebpayMonto=parseInt($('#id_total_webpay').val());
	 CheckOC=$('#id_check_oc_empresa').is(":checked");
	 CheckMontoOC=parseInt($('#id_total_oc_empresa').val());
	 CheckSence=$('#id_check_sence').is(":checked");
	 
  //alert(ChqPropiosMonto); id_total_oc
	 if(CheckChqPropios || ChkChqTercertos || CheckDeposito || CheckPos || CheckWebpay || CheckOC)
	 {
	  var TotalOtrompago=0;
	  var TotalOtrompago_final=0;
	  TotalOtrompago_final=parseInt($('#id_total_otro_mpago').val());
		//valida si existe el valor
	  if (isNaN(parseInt(ChqPropiosMonto))) {ChqPropiosMonto = 0;} 
	  if (isNaN(parseInt(ChqTercerosMonto))) {ChqTercerosMonto = 0;} 
	  if (isNaN(parseInt(CheckDepositoMonto))) { CheckDepositoMonto =0;} 
	  if (isNaN(parseInt(CheckPosMonto))) {CheckPosMonto = 0;} 
	  if (isNaN(parseInt(CheckWebpayMonto))) {CheckWebpayMonto = 0;} 
	  if (isNaN(parseInt(CheckMontoOC))) {CheckMontoOC = 0;} 
	
      TotalOtrompago=(ChqPropiosMonto+ChqTercerosMonto + CheckDepositoMonto+CheckPosMonto+CheckWebpayMonto+CheckMontoOC);
     //TotalOtrompago=(ChqPropiosMonto+ChqTercerosMonto);
		//alert('Valores Sumados:'+TotalOtrompago); 
		if(TotalOtrompago===TotalOtrompago_final){
			
		//Extraer info de los capagadores	
	

/*
							table_wp+='<td>'+respuesta.dni+'</td>';						
							table_wp+='<td>'+respuesta.nombre+'</td>';
							table_wp+='<td>'+respuesta.apellidoPaterno+'</td>';
*/		
			
			
		//Casos de Uso individuales	
			
		if(CheckChqPropios && ChqPropiosMonto!=0){
		data_chq.push({"medioPago" : "Cheques Propios","rut" :info_alum.dni,"datoPagador" :info_alum.nombre+' '+info_alum.apellidoPaterno ,"nombre":info_alum.nombre,"apellidoP":info_alum.apellidoPaterno,"apellidoM":info_alum.apellidoMaterno,"direccion":info_alum_dir.dir+' '+info_alum_dir.dir_num+' '+info_alum_dir.pais_residencia+' '+info_alum_dir.region_residencia,"total" :parseInt($('#id_total_cheque').val())});		
		//data_chq.push({"medioPago" : "Cheques Propios","rut" :info_alum.dni,"datoPagador" :info_alum.nombre+' '+info_alum.apellidoPaterno ,"total" :$('#id_total_cheque').val()});
		CheckChqPropios=false;
		}			
			
		if(CheckDeposito && CheckDepositoMonto!=0){
		data_chq.push({"medioPago" : "Deposito","rut" :info_alum.dni,"datoPagador" :info_alum.nombre+' '+info_alum.apellidoPaterno ,"nombre":info_alum.nombre,"apellidoP":info_alum.apellidoPaterno,"apellidoM":info_alum.apellidoMaterno,"direccion":info_alum_dir.dir+' '+info_alum_dir.dir_num+' '+info_alum_dir.pais_residencia+' '+info_alum_dir.region_residencia,"total" :parseInt($('#id_total_deposito').val())});				
//		data_chq.push({"medioPago" : "Deposito","rut" :info_alum.dni,"datoPagador" :info_alum.nombre+' '+info_alum.apellidoPaterno ,"total" :$('#id_total_deposito').val()});
		CheckDeposito=false;
		}
		if(CheckPos && CheckPosMonto!=0){
		data_chq.push({"medioPago" : "Pago en Oficina","rut" :info_alum.dni,"datoPagador" :info_alum.nombre+' '+info_alum.apellidoPaterno ,"nombre":info_alum.nombre,"apellidoP":info_alum.apellidoPaterno,"apellidoM":info_alum.apellidoMaterno,"direccion":info_alum_dir.dir+' '+info_alum_dir.dir_num+' '+info_alum_dir.pais_residencia+' '+info_alum_dir.region_residencia,"total" :parseInt($('#id_total_pos').val())});						
//		data_chq.push({"medioPago" : "Pago en Oficina","rut" :info_alum.dni,"datoPagador" :info_alum.nombre+' '+info_alum.apellidoPaterno ,"total" :$('#id_total_pos').val()});
		CheckPos=false;
		}	

		if(CheckWebpay && CheckWebpayMonto!=0){
		data_chq.push({"medioPago" : "Web Pay","rut" :info_alum.dni,"datoPagador" :info_alum.nombre+' '+info_alum.apellidoPaterno ,"nombre":info_alum.nombre,"apellidoP":info_alum.apellidoPaterno,"apellidoM":info_alum.apellidoMaterno,"direccion":info_alum_dir.dir+' '+info_alum_dir.dir_num+' '+info_alum_dir.pais_residencia+' '+info_alum_dir.region_residencia,"total" :parseInt($('#id_total_webpay').val())});								
//		data_chq.push({"medioPago" : "Web Pay","rut" :info_alum.dni,"datoPagador" :info_alum.nombre+' '+info_alum.apellidoPaterno ,"total" :$('#id_total_webpay').val()});
		CheckWebpay=false;
		}			
			
		//Caso de Uso  con los medios de pagos simples
		
		if(ChkChqTercertos===false && ChqTercerosMonto===0  &&  CheckOC===false && CheckMontoOC===0  && data_chq.length > 0 ){
			//alert('En desarrollo');
			
			
			
	$('#mpago_step_1_extranjero').removeClass("d").addClass("d-none");

	 $.ajax({
					url :'https://ficha.claseejecutiva.com/index.php/controller/chequePropios/',
					type : "POST",
					data :{'idOp':idOp},
					success: function(html){						
					respuesta = JSON.parse(html);	
					if(respuesta){
                    form1=JSON.parse(respuesta['0']);	
                    form2=JSON.parse(respuesta['1']);							
				   // data_chq.push({"medioPago" : "Transferencia Bancaria ","rut" :respuesta.dni,"datoPagador" :respuesta.nombre+' '+respuesta.apellidoPaterno ,"total" :respuesta.montoFinal});	

					var table_resumen_ext_t='<div class="col-md-12 form-group row">';
						table_resumen_ext_t+='<div  class="col-md-12 field-label-responsive"><br></div>';	
						table_resumen_ext_t+='<div  class="col-md-4 field-label-responsive"> <br></div>';						
						table_resumen_ext_t+='<div  class="col-md-4 field-label-responsive"> Tabla Resumen de pago </div>';	
						table_resumen_ext_t+='<div  class="col-md-4 field-label-responsive"><br></div>';	
                        table_resumen_ext_t+='<div  class="col-md-12 field-label-responsive"><br></div>';							
				        table_resumen_ext_t+='<div class="col-md-12 table-responsive">';
					    table_resumen_ext_t+='<table class="table">';
						table_resumen_ext_t+= '<thead >';
						table_resumen_ext_t+= '<br >';
						table_resumen_ext_t+= '<tr>';						
						table_resumen_ext_t+= '<th colspan="1">Medio Pago:</th>';
						table_resumen_ext_t+= '<th colspan="1">Rut Pagador:</th>';
						table_resumen_ext_t+= '<th colspan="1">Datos Pagador:</th>';
						table_resumen_ext_t+= '<th colspan="1">Total</th>';
						table_resumen_ext_t+= '</tr>';
						table_resumen_ext_t+= '</thead>';
						table_resumen_ext_t+='<tbody>';
					Object.keys(data_chq).forEach(function (key) {
					    table_resumen_ext_t+='<tr>';				
						table_resumen_ext_t+='<td>'+data_chq[key].medioPago+'</td>';						
						table_resumen_ext_t+='<td colspan="1">'+form1.dni+'</td>';
						table_resumen_ext_t+='<td colspan="1">'+form1.nombre+' '+form1.apellidoPaterno+'</td>';
						table_resumen_ext_t+='<td colspan="1">'+data_chq[key].total+'</td>';
						table_resumen_ext_t+='</tr>';
                        total_tabla_resumen_a=(total_tabla_resumen_a+parseInt(data_chq[key].total));
      
					});
				    table_resumen_ext_t+='</tbody>';
				    table_resumen_ext_t+='</table>';
				    table_resumen_ext_t+='</div>';			
				    table_resumen_ext_t+='<div  class="col-md-8 field-label-responsive"> <br></div><div  class="col-md-4 field-label-responsive">Total a Pagar es $:'+formatNumber(total_tabla_resumen_a)+'</div>';			
                    					
				    table_resumen_ext_t+='<input type="hidden" id="id_tabla_resumen_mpago" name="tabla_resumen_mpago"   readonly>';	
					
								 
								$('#mpago_div_resumen').removeClass("d-none").addClass("d");
								$('#mpago_otros_resumen_total').html(table_resumen_ext_t);
								$('#mpagoOtraLayout').removeClass("d").addClass("d-none");
								$('#boton_otro_mpago').removeClass("d").addClass("d-none");
								$('#mpago_otros_resumen').removeClass("d-none").addClass("d");
								$('#boton_fin_step_3_otros_resumen_sgte').removeClass("d-none").addClass("d");
								$('#id_tabla_resumen_mpago').val(JSON.stringify(data_chq));
								//$('#boton_fin_step_3_otros_resumen_sgte').removeClass("d-none").addClass("d");
								
							$('#step_3_otros_resumen_sgte').click(function() {
							if(total_tabla_resumen_a===parseInt($('#montoFinal_step_3').val())){ 										 
							 //$('#container_step_4').removeClass("d-none").addClass("d");
							 var status_form=enviar_form($('#step_3_form').serialize(),'https://ficha.claseejecutiva.com/index.php/controller/step_3');
								$('#container_step_3').removeClass("d").addClass("d-none");
								$('#container_step_4').removeClass("d-none").addClass("d");					 
							  }else{
						             $('#modalErrorlLabel').html('Los montos no son correctos');	
						             $('#body-modalError').html('Estimado ,Favor de revisar su forma de pago,ya que los montos no cuadran');
						             $('#open-error').click();										
									}
					          }); 
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
		
		
		 if(CheckOC && CheckMontoOC!=0  && ChkChqTercertos===false && ChqTercerosMonto===0 ){
		$('#mpagoOtraLayout').removeClass("d").addClass("d-none"); 
		$('#boton_otro_mpago').removeClass("d").addClass("d-none"); 
		 $('#mpago_oc').removeClass("d-none").addClass("d"); 
		 $('#step_3_otro_cheque').removeClass("d").addClass("d-none"); 
		// $('#id_layout_titulo_oc').html(formatNumber($('#id_total_oc').val()));
		$('#id_total_oc').attr('readonly', true);	
			$('#id_layout_titulo_oc').html('Orden de compra:  $'+formatNumber($('#id_total_oc').val()));	
			if($('#mpago_oc').length > 0){
					//boton_step_3_otro_cheque
					$("#boton_step_3_otro_cheque").removeClass("d").addClass("d-none");
					$('#id_layout_titulo_oc').html('Orden de compra:'+formatNumber(CheckMontoOC));
					$('#id_total_oc').val(+CheckMontoOC);
					//id_total_oc_empresa
					$('#step_OC_4_agregar').click(function() {
					$("#id_table_oc").removeClass("d-none").addClass("d");
						$("#step_3_form").validate({
						rules:{
							"rut_oc"           :{required:true,
												 minlength:5, 
												 maxlength:20,
												 pattern:true,
												 checkRut:function(){  return true; },
												},
							"razon_social"     :{required:true},
							"dir_emp"          :{required:true},
							"comuna_emp"       :{required:true},
							"telefono_emp"     :{required:true},
							"atencion_emp"     :{required:false},
							"mail_contacto_emp":{required:false},
							"nro_oc"           :{required:false},
							"total_oc"         :{required:false}
						},
						  messages:{
							"rut_oc"           :{required:"Ingresa El rut de tu Empresa"},
							"razon_social"     :{required:"Ingresa la Razon Social"},
							"dir_emp"          :{required:"Ingresa tu Direccion"},
							"comuna_emp"       :{required:"Ingresa tu Numeracion"},
							"telefono_emp"     :{required:"Ingresa el Telefono"},
							"atencion_emp"     :{required:"Ingresa la Persona de Contacto"},
							"mail_contacto_emp":{required:"Ingresa Email Contacto"},
							"nro_oc"           :{required:"Ingresa el N° de OC"},
							"total_oc"         :{required:"Ingresa Email Contacto"},
							 },
							  errorElement: "span",
							  ignore: ".ignore"	,  
							  submitHandler: function(form) {
                                 data_chq.push({"medioPago" : "Orden de Compra","rut" :$('#rut_oc').val(),"datoPagador" :$('#id_razon_social').val(),"nombre":$('#id_atencion_emp').val(),"apellidoP":'',"apellidoM":'',"direccion":$('#id_dir_emp').val(),"total" :$('#id_total_oc').val()});		  
								  
//								 data_chq.push({"medioPago" : "Orden de Compra","rut" :$('#rut_oc').val(),"datoPagador" :$('#id_razon_social').val() ,"total" :$('#id_total_oc').val()});								  
								var table_oc='<div class="form-group row">';
									table_oc+='<div class="col-md-2"><br></div>';
									table_oc+='<div class="col-md-10">';
									table_oc+='<table class="table table-striped table-responsive">';
									table_oc+= '<thead>';
									table_oc+= '<tr>';
									table_oc+= '<th scope="col">Medio de Pago</th>';
									table_oc+= '<th scope="col">Rut Pagador</th>';
									table_oc+= '<th scope="col">Datos Pagador</th>';
									table_oc+= '<th scope="col">Total a Pagar</th>';
									table_oc+= '<th scope="col">Modificar</th>';
									table_oc+= '</tr>';
									table_oc+= '</thead>';
									table_oc+='<tbody>';
									table_oc+='<tr>';	
								Object.keys(data_chq).forEach(function (key) {							
													table_oc+='<td>'+data_chq[key].medioPago+'</td>';						
													table_oc+='<td>'+data_chq[key].rut+'</td>';						
													table_oc+='<td>'+data_chq[key].datoPagador+'</td>';
													table_oc+='<td>'+data_chq[key].total+'</td>';
													table_oc+='<td><button type="button" onClick="removerTablaOC();" class="btn btn-info btn-lg btn-block">Eliminar</button></td>';		
													table_oc+='</tr>';
										});	
									table_oc+='</tbody>';
								table_oc+='</table>';
								table_oc+='</div>';
							table_oc+='</div>';
				   $('#rut_oc').val('');						
		           $('#id_razon_social').val('');						
		           $('#id_comuna_emp').val('');
		           $('#id_dir_emp').val('');
		           $('#id_telefono_emp').val('');
		           $('#id_mail_contacto_emp').val('');
		           $('#id_atencion_emp').val('');
		           $('#id_nro_oc').val('');								

							   $('#id_table_oc').html(table_oc);
							   
							   //#step_OC_4
					$('#step_OC_4').click(function() {
				                 //data_chq 
					var table_resumen='<div class="col-md-12 form-group row">';
						table_resumen+='<div  class="col-md-12 field-label-responsive"><br></div>';	
						table_resumen+='<div  class="col-md-4 field-label-responsive"> <br></div>';						
						table_resumen+='<div  class="col-md-4 field-label-responsive"> Tabla Resumen de pago </div>';	
						table_resumen+='<div  class="col-md-4 field-label-responsive"><br></div>';	
                        table_resumen+='<div  class="col-md-12 field-label-responsive"><br></div>';							
				        table_resumen+='<div class="col-md-12 table-responsive">';
					    table_resumen+='<table class="table">';
						table_resumen+= '<thead >';
						table_resumen+= '<br >';
						table_resumen+= '<tr>';						
						table_resumen+= '<th colspan="1">Medio Pago:</th>';
						table_resumen+= '<th colspan="1">Rut Pagador:</th>';
						table_resumen+= '<th colspan="1">Datos Pagador:</th>';
						table_resumen+= '<th colspan="1">Total</th>';
						table_resumen+= '</tr>';
						table_resumen+= '</thead>';
						table_resumen+='<tbody>';
					Object.keys(data_chq).forEach(function (key) {
					    table_resumen+='<tr>';				
						table_resumen+='<td>'+data_chq[key].medioPago+'</td>';						
						table_resumen+='<td colspan="1">'+data_chq[key].rut+'</td>';
						table_resumen+='<td colspan="1">'+data_chq[key].datoPagador+'</td>';
						table_resumen+='<td colspan="1">'+data_chq[key].total+'</td>';
						table_resumen+='</tr>';
                       total_tabla_resumen_a=(total_tabla_resumen_a+parseInt(data_chq[key].total));
      
					});
				    table_resumen+='</tbody>';
				    table_resumen+='</table>';
				    table_resumen+='</div>';	
                    table_resumen+='<div  class="col-md-8 field-label-responsive"> <br></div><div  class="col-md-4 field-label-responsive">Total a Pagar es $:'+formatNumber(total_tabla_resumen_a)+'</div>';						
				    table_resumen+='<input type="hidden" id="id_tabla_resumen_cheques" name="tabla_resumen_cheques"   readonly>';								 
								 
								$('#mpago_div_resumen').removeClass("d-none").addClass("d");
								$('#mpago_otros_resumen_total').html(table_resumen);
								$('#mpago_oc').removeClass("d").addClass("d-none");
								$('#mpago_otros_resumen').removeClass("d-none").addClass("d");
								$('#boton_fin_step_3_otros_resumen_sgte').removeClass("d-none").addClass("d");
								$('#id_tabla_resumen_cheques').val(JSON.stringify(data_chq));
								//$('#boton_fin_step_3_otros_resumen_sgte').removeClass("d-none").addClass("d");
								
								 $('#step_3_otros_resumen_sgte').click(function() {
	                             if(total_tabla_resumen_a===parseInt($('#montoFinal_step_3').val())){ 										 
								//$('#container_step_4').removeClass("d-none").addClass("d");
								  var status_form=enviar_form($('#step_3_form').serialize(),'https://ficha.claseejecutiva.com/index.php/controller/step_3');
									 $('#container_step_3').removeClass("d").addClass("d-none");
		                             $('#container_step_4').removeClass("d-none").addClass("d");
									}else{
										 $('#modalErrorlLabel').html('Los montos no son correctos');	
										 $('#body-modalError').html('Estimado ,Favor de revisar su forma de pago,ya que los montos no cuadran');
										 $('#open-error').click();										
										}								 
								 
								 });
								
								
								});
							  }
							
						  });
						});  
					
				}
		 }




		
		 //Caso de Uso Cheques terceros 
		 if(ChkChqTercertos && ChqTercerosMonto!=0){
			 
			 
			// alert('cheques terceros');
			 $('#mpagoOtraLayout').removeClass("d").addClass("d-none");
			 $('#boton_otro_mpago').removeClass("d").addClass("d-none");
			 $('#ChequesTercerosLayout').removeClass("d-none").addClass("d");
			 $('#boton_step_3_otro_cheque').removeClass("d-none").addClass("d");
			 $('#Valor_ch_terceros_layout').html('Cheques de Terceros  :$'+formatNumber(ChqTercerosMonto));
			 $('#id_otro_cheque_totalapagar').val(ChqTercerosMonto);
			 
			 //Persona Natrural
			 $('#id_otro_cheque_pn').click(function() {
				$('#id_datos_persona_natural').removeClass("d-none").addClass("d"); 				 
				$('#id_datos_persona_juridica').removeClass("d").addClass("d-none"); 

				// let personaNatural=true;
			 }); 
			 
			 //Empresa
			 $('#id_otro_cheque_pj').click(function() {
				$('#id_datos_persona_natural').removeClass("d").addClass("d-none"); 				 
				$('#id_datos_persona_juridica').removeClass("d-none").addClass("d"); 				 
				 
			 }); 
if($('#ChequesTercerosLayout').length > 0){		 
	    $("#step_3_form").validate({
						rules:{
							"otro_cheque_dni"              :{required:true,
															 minlength:5, 
															 maxlength:20,
															 pattern:true,
															 checkRut:function(){  return true; },
															},
							"otro_cheque_nombre"           :{required:function(){$('#id_otro_cheque_nombre').val().length}},
							"otro_cheque_apellidoPaterno"  :{required:function(){$('#id_otro_cheque_apellidoPaterno').val().length}},
							"otro_cheque_apellidoMaterno"  :{required:function(){$('#id_otro_cheque_apellidoMaterno').val().length}},
							"otro_cheque_razonsocial"      :{required:function(){$('#id_otro_cheque_razonsocial').val().length}},
							"otro_cheque_direccion"        :{required:function(){$('#id_otro_cheque_direccion').val().length}},
							"otro_cheque_direccion_pn"     :{required:function(){$('#id_otro_cheque_direccion_pn').val().length}},
							"otro_cheque_comuna"           :{required:function(){$('#id_otro_cheque_comuna').val().length}},
							"otro_cheque_comuna_pn"        :{required:function(){$('#id_otro_cheque_comuna_pn').val().length}},
							"otro_cheque_telefono"         :{required:function(){$('#id_otro_cheque_telefono').val().length}},
							"otro_cheque_emailcontacto"    :{required:function(){$('#id_otro_cheque_emailcontacto').val().length}},
							"otro_cheque_totalapagar"      :{required:true}
						},
						  messages:{
							"otro_cheque_dni"             :{required:"Ingresa tu dni o el rut de tu Empresa"},
							"otro_cheque_nombre"          :{required:"Ingresa el Nombre"},
							"otro_cheque_apellidoPaterno" :{required:"Ingresa el Apellido Paterno"},
							"otro_cheque_apellidoMaterno" :{required:"Ingresa el Apellido Materno"},
							"otro_cheque_razonsocial"     :{required:"Ingresa la Razon social"},
							"otro_cheque_direccion_pn"    :{required:"Ingresa la direccion"},
							"otro_cheque_direccion"       :{required:"Ingresa la direccion"},
							"otro_cheque_comuna_pn"       :{required:"Ingresa la Comuna"},
							"otro_cheque_comuna"          :{required:"Ingresa la Comuna"},
							"otro_cheque_telefono"        :{required:"Ingresa El Telefono"},
							"otro_cheque_emailcontacto"   :{required:"Ingresa El Email"},
							"otro_cheque_totalapagar"     :{required:"Ingresa el Monto"},
							 },
							  errorElement: "span",
							  //ignore: ".ignore"	,  
							  submitHandler: function(form) {
							  //alert('agregar cheques');
							if($('#id_otro_cheque_dni').val().length > 1 && $('#id_otro_cheque_nombre').val().length > 1 && $('#id_otro_cheque_totalapagar').val().length > 1)
								{
                                data_chq.push({"medioPago" : "Cheques Tercero","rut" :$('#id_otro_cheque_dni').val(),"datoPagador" :$('#id_otro_cheque_nombre').val()+' '+$('#id_otro_cheque_apellidoPaterno').val()+' '+$('#id_otro_cheque_apellidoMaterno').val(),"nombre":$('#id_otro_cheque_nombre').val(),"apellidoP":$('#id_otro_cheque_apellidoPaterno').val(),"apellidoM":$('#id_otro_cheque_apellidoMaterno').val(),"direccion":$('#id_otro_cheque_direccion_pn').val()+' '+$('#id_otro_cheque_comuna_pn').val(),"total" :parseInt($('#id_otro_cheque_totalapagar').val())});		  	
								//data_chq.push({"medioPago" : "Cheques Tercero","rut" :$('#id_otro_cheque_dni').val(),"datoPagador" :$('#id_otro_cheque_nombre').val()+' '+$('#id_otro_cheque_apellidoPaterno').val()+' '+$('#id_otro_cheque_apellidoMaterno').val() ,"total" :$('#id_otro_cheque_totalapagar').val()});
								}
								
							 if($('#id_otro_cheque_dni').val().length > 1 && $('#id_otro_cheque_razonsocial').val().length > 1 && $('#id_otro_cheque_emailcontacto').val().length > 1  && $('#id_otro_cheque_totalapagar').val().length > 1)
								{
                                data_chq.push({"medioPago" : "Cheques Tercero","rut" :$('#id_otro_cheque_dni').val(),"datoPagador" :$('#id_otro_cheque_razonsocial').val(),"nombre":'',"apellidoP":'',"apellidoM":'',"direccion":$('#id_otro_cheque_direccion').val()+' '+$('#id_otro_cheque_comuna').val(),"total" :parseInt($('#id_otro_cheque_totalapagar').val())});		  										
								// data_chq.push({"medioPago" : "Cheques Tercero","rut" :$('#id_otro_cheque_dni').val(),"datoPagador" :$('#id_otro_cheque_razonsocial').val() ,"total" :$('#id_otro_cheque_totalapagar').val()});
								}	

								table_cheques='<div class="table-responsive">';
								table_cheques+='<table class="table">';
								table_cheques+= '<thead>';
								table_cheques+= '<tr>';
								table_cheques+= '<th scope="col">medioPago:</th>';
								table_cheques+= '<th scope="col" colspan="1">Rut Pagador:</th>';
								table_cheques+= '<th scope="col" colspan="1">Datos Pagador:</th>';
								table_cheques+= '<th scope="col">Total</th>';
								table_cheques+= '<th scope="col"></th>';
								table_cheques+= '</tr>';
								table_cheques+= '</thead>';
							Object.keys(data_chq).forEach(function (key) {
								table_cheques+='<tbody>';
								table_cheques+='<tr>';				
								table_cheques+='<td>'+data_chq[key].medioPago+'</td>';						
								table_cheques+='<td colspan="1">'+data_chq[key].rut+'</td>';
								table_cheques+='<td colspan="1">'+data_chq[key].datoPagador+'</td>';
								table_cheques+='<td colspan="1">'+data_chq[key].total+'</td>';
								table_cheques+='<td><button type="button" onClick="ElimiarChequesTerceros();" name="otro_cheque_elimina" class="form-control btn btn-info btn-lg btn-block"  value="">Eliminar</button></td>';		
								table_cheques+='</tr>';
								table_cheques+='</tbody>';
								//total_tabla_resumen_a=(total_tabla_resumen_a+parseInt(data_chq[key].total));
							});
							table_cheques+='</table>';
							table_cheques+='</div>';	
                            //table_cheques+='<div  class="col-md-8 field-label-responsive"> <br></div><div  class="col-md-4 field-label-responsive">Total a Pagar es $:'+formatNumber(total_tabla_resumen_a)+'</div>';										
							table_cheques+='<input type="hidden" id="id_resumen_cheques_terceros" name="resumen_cheques_terceros"   readonly>';				
						//console.log(data_chq);
						$('#tabla_cheques').html(table_cheques);	
                       $('#id_resumen_cheques_terceros').val(JSON.stringify(data_chq));						
							  } 
			}); 
		 }//valida divv cheques			
 }//fin Caso de Uso Cheques Terceros
 
		$('#step_3_otro_cheque').click(function() {
		//alert('Paso siguiente cheques terceros');
		//console.log(validacionA);
		//validacionA.resetForm();

		if(CheckOC && CheckMontoOC!=0){
		 $('#ChequesTercerosLayout').removeClass("d").addClass("d-none"); 
		 $('#mpago_oc').removeClass("d-none").addClass("d"); 
		 $('#step_3_otro_cheque').removeClass("d").addClass("d-none"); 
			
			
			if($('#mpago_oc').length > 0){
					//boton_step_3_otro_cheque
					$("#boton_step_3_otro_cheque").removeClass("d").addClass("d-none");
					$('#id_layout_titulo_oc').html('Orden de compra:'+formatNumber(CheckMontoOC));
					$('#id_total_oc').val(+CheckMontoOC);
					//id_total_oc_empresa
					$('#step_OC_4_agregar').click(function() {
					$('#step_3_form').off(".validate").removeData("validator");	
					$("#boton_step_3_otro_cheque").removeClass("d").addClass("d-none");
					
					$("#step_3_form_ext").removeClass("d-none").addClass("d");
					//$('#id_otro_cheque_dni').val('');
						$("#step_3_form").validate({
						rules:{
							"rut_oc"           :{required:true},
							"razon_social"     :{required:true},
							"dir_emp"          :{required:true},
							"comuna_emp"       :{required:true},
							"telefono_emp"     :{required:true},
							"atencion_emp"     :{required:false},
							"mail_contacto_emp":{required:false},
							"nro_oc"           :{required:false},
							"total_oc"         :{required:false}
						},
						  messages:{
							"rut_oc"           :{required:"Ingresa El rut de tu Empresa"},
							"razon_social"     :{required:"Ingresa la Razon Social"},
							"dir_emp"          :{required:"Ingresa tu Direccion"},
							"comuna_emp"       :{required:"Ingresa tu Numeracion"},
							"telefono_emp"     :{required:"Ingresa el Telefono"},
							"atencion_emp"     :{required:"Ingresa la Persona de Contacto"},
							"mail_contacto_emp":{required:"Ingresa Email Contacto"},
							"nro_oc"           :{required:"Ingresa el N° de OC"},
							"total_oc"         :{required:"Ingresa Email Contacto"},
							 },
							  errorElement: "span",
							  debug:true,
							 // ignore: ".ignore"	,  
							  submitHandler: function(form) {
							 data_chq.pop();
                             data_chq.push({"medioPago" : "Orden de Compra","rut" :$('#rut_oc').val(),"datoPagador" :$('#id_razon_social').val(),"nombre":$('#id_atencion_emp').val(),"apellidoP":'',"apellidoM":'',"direccion":$('#id_dir_emp').val(),"total" :parseInt($('#id_total_oc').val())});		  							 
                             //data_chq.push({"medioPago" : "Orden de Compra","rut" :$('#rut_oc').val(),"datoPagador" :$('#id_razon_social').val() ,"total" :$('#id_total_oc').val()});								  
										var table_oc='<div class="form-group row">';
										table_oc+='<div class="col-md-2"><br></div>';
										table_oc+='<div class="col-md-10">';
										table_oc+='<table class="table table-striped table-responsive">';
										table_oc+= '<thead>';
										table_oc+= '<tr>';
										table_oc+= '<th scope="col">Medio de Pago</th>';
										table_oc+= '<th scope="col">Rut Pagador</th>';
										table_oc+= '<th scope="col">Datos Pagador</th>';
										table_oc+= '<th scope="col">Total a Pagar</th>';
										table_oc+= '<th scope="col">Modificar</th>';
										table_oc+= '</tr>';
										table_oc+= '</thead>';
										table_oc+='<tbody>';
										table_oc+='<tr>';	
					Object.keys(data_chq).forEach(function (key) {							
										table_oc+='<td>'+data_chq[key].medioPago+'</td>';						
										table_oc+='<td>'+data_chq[key].rut+'</td>';						
										table_oc+='<td>'+data_chq[key].datoPagador+'</td>';
										table_oc+='<td>'+data_chq[key].total+'</td>';
										table_oc+='<td><button type="button" onClick="removerTablaOC();" class="btn btn-info btn-lg btn-block">Eliminar</button></td>';		
										table_oc+='</tr>';
										//total_tabla_resumen_a=(total_tabla_resumen_a+parseInt(data_chq[key].total));
							});	
										table_oc+='</tbody>';
									table_oc+='</table>';
									table_oc+='</div>';
								table_oc+='</div>';
								//table_oc+='<div  class="col-md-8 field-label-responsive"> <br></div><div  class="col-md-4 field-label-responsive">Total a Pagar es $:'+formatNumber(total_tabla_resumen_a)+'</div>';
				   $('#rut_oc').val('');						
		           $('#id_razon_social').val('');						
		           $('#id_comuna_emp').val('');
		           $('#id_dir_emp').val('');
		           $('#id_telefono_emp').val('');
		           $('#id_mail_contacto_emp').val('');
		           $('#id_atencion_emp').val('');
		           $('#id_nro_oc').val('');						
								
							   $('#id_table_oc').html(table_oc);
							   
							   //#step_OC_4
					$('#step_OC_4').click(function() {
				                 //data_chq 
					var table_resumen='<div class="col-md-12 form-group row">';
						table_resumen+='<div  class="col-md-12 field-label-responsive"><br></div>';	
						table_resumen+='<div  class="col-md-4 field-label-responsive"> <br></div>';						
						table_resumen+='<div  class="col-md-4 field-label-responsive"> Tabla Resumen de pago </div>';	
						table_resumen+='<div  class="col-md-4 field-label-responsive"><br></div>';	
                        table_resumen+='<div  class="col-md-12 field-label-responsive"><br></div>';							
				        table_resumen+='<div class="col-md-12 table-responsive">';
					    table_resumen+='<table class="table">';
						table_resumen+= '<thead >';
						table_resumen+= '<br >';
						table_resumen+= '<tr>';						
						table_resumen+= '<th colspan="1">Medio Pago:</th>';
						table_resumen+= '<th colspan="1">Rut Pagador:</th>';
						table_resumen+= '<th colspan="1">Datos Pagador:</th>';
						table_resumen+= '<th colspan="1">Total</th>';
						table_resumen+= '</tr>';
						table_resumen+= '</thead>';
						table_resumen+='<tbody>';
					Object.keys(data_chq).forEach(function (key) {
					    table_resumen+='<tr>';				
						table_resumen+='<td>'+data_chq[key].medioPago+'</td>';						
						table_resumen+='<td colspan="1">'+data_chq[key].rut+'</td>';
						table_resumen+='<td colspan="1">'+data_chq[key].datoPagador+'</td>';
						table_resumen+='<td colspan="1">'+data_chq[key].total+'</td>';
						table_resumen+='</tr>';
                        total_tabla_resumen_a=(total_tabla_resumen_a+parseInt(data_chq[key].total));
      
					});
				    table_resumen+='</tbody>';
				    table_resumen+='</table>';
				    table_resumen+='</div>';	
                    table_resumen+='<div  class="col-md-8 field-label-responsive"> <br></div><div  class="col-md-4 field-label-responsive">Total a Pagar es $:'+formatNumber(total_tabla_resumen_a)+'</div>';					
				    table_resumen+='<input type="hidden" id="id_tabla_resumencheques" name="tabla_resumencheques"   readonly>';								 
								 
								$('#mpago_div_resumen').removeClass("d-none").addClass("d");
								$('#mpago_otros_resumen_total').html(table_resumen);
								$('#mpago_oc').removeClass("d").addClass("d-none");
								$('#mpago_otros_resumen').removeClass("d-none").addClass("d");
								$('#boton_fin_step_3_otros_resumen_sgte').removeClass("d-none").addClass("d");
								//$('#boton_fin_step_3_otros_resumen_sgte').removeClass("d-none").addClass("d");
								$('#id_tabla_resumencheques').val(JSON.stringify(data_chq));
								 $('#step_3_otros_resumen_sgte').click(function() {
								if(total_tabla_resumen_a===parseInt($('#montoFinal_step_3').val())){ 									 
								//$('#container_step_4').removeClass("d-none").addClass("d");
								  var status_form=enviar_form($('#step_3_form').serialize(),'https://ficha.claseejecutiva.com/index.php/controller/step_3');
									 $('#container_step_3').removeClass("d").addClass("d-none");
		                             $('#container_step_4').removeClass("d-none").addClass("d");
									}else{
										 $('#modalErrorlLabel').html('Los montos no son correctos');	
										 $('#body-modalError').html('Estimado ,Favor de revisar su forma de pago,ya que los montos no cuadran');
										 $('#open-error').click();										
									}						
								 
								 });
								
								
								});
							  }
							
						  });
						});  
					
				}



		 

		 }else if(CheckOC ===false && CheckMontoOC===0){//en caso que no existe oc terceros
              //alert('Caso de uso Cheques terceros , solo sin oc empresa');
			  // OPCION 1  $('#step_3_otro_cheque').trigger('click');
			  //X OPCION 2 Comentar click event  
			 // $('#step_3_otro_cheque').click(function() {
		      $('#ChequesTercerosLayout').removeClass("d").addClass("d-none"); 
		      $('#boton_step_3_otro_cheque').removeClass("d").addClass("d-none"); 
		      //$('#step_3_otro_cheque').removeClass("d").addClass("d-none"); 
					var table_resumen='<div class="col-md-12 form-group row">';
						table_resumen+='<div  class="col-md-12 field-label-responsive"><br></div>';	
						table_resumen+='<div  class="col-md-4 field-label-responsive"> <br></div>';						
						table_resumen+='<div  class="col-md-4 field-label-responsive"> Tabla Resumen de pago </div>';	
						table_resumen+='<div  class="col-md-4 field-label-responsive"><br></div>';	
                        table_resumen+='<div  class="col-md-12 field-label-responsive"><br></div>';							
				        table_resumen+='<div class="col-md-12 table-responsive">';
					    table_resumen+='<table class="table">';
						table_resumen+= '<thead >';
						table_resumen+= '<br >';
						table_resumen+= '<tr>';						
						table_resumen+= '<th colspan="1">Medio Pago:</th>';
						table_resumen+= '<th colspan="1">Rut Pagador:</th>';
						table_resumen+= '<th colspan="1">Datos Pagador:</th>';
						table_resumen+= '<th colspan="1">Total</th>';
						table_resumen+= '</tr>';
						table_resumen+= '</thead>';
						table_resumen+='<tbody>';
					Object.keys(data_chq).forEach(function (key) {
					    table_resumen+='<tr>';				
						table_resumen+='<td>'+data_chq[key].medioPago+'</td>';						
						table_resumen+='<td colspan="1">'+data_chq[key].rut+'</td>';
						table_resumen+='<td colspan="1">'+data_chq[key].datoPagador+'</td>';
						table_resumen+='<td colspan="1">'+data_chq[key].total+'</td>';
						table_resumen+='</tr>';
                        total_tabla_resumen_a=(total_tabla_resumen_a+parseInt(data_chq[key].total));
      
					});
				    table_resumen+='</tbody>';
				    table_resumen+='</table>';
				    table_resumen+='</div>';	
                    table_resumen+='<div  class="col-md-8 field-label-responsive"> <br></div><div  class="col-md-4 field-label-responsive">Total a Pagar es $:'+formatNumber(total_tabla_resumen_a)+'</div>';								
				    table_resumen+='<input type="hidden" id="id_tabla_resumen_OC" name="tabla_resumen_OC"  readonly>';								 
								 
								$('#mpago_div_resumen').removeClass("d-none").addClass("d");
								$('#mpago_otros_resumen_total').html(table_resumen);
								//$('#mpago_oc').removeClass("d").addClass("d-none");
								$('#mpago_otros_resumen').removeClass("d-none").addClass("d");
								$('#boton_fin_step_3_otros_resumen_sgte').removeClass("d-none").addClass("d");
								//$('#boton_fin_step_3_otros_resumen_sgte').removeClass("d-none").addClass("d");
								$('#tabla_resumen_OC').val(JSON.stringify(data_chq));
								 $('#step_3_otros_resumen_sgte').click(function() {
								if(total_tabla_resumen_a===parseInt($('#montoFinal_step_3').val())){ 		 
								//$('#container_step_4').removeClass("d-none").addClass("d");
								  var status_form=enviar_form($('#step_3_form').serialize(),'https://ficha.claseejecutiva.com/index.php/controller/step_3');
									 $('#container_step_3').removeClass("d").addClass("d-none");
		                             $('#container_step_4').removeClass("d-none").addClass("d");
								}else{
								 $('#modalErrorlLabel').html('Los montos no son correctos');	
								 $('#body-modalError').html('Estimado ,Favor de revisar su forma de pago,ya que los montos no cuadran');
								 $('#open-error').click();										
								}	 
								 
								 });
								
								
			//});			  			  	
		}//Fin caso de uso de Cheques terceros sin OC

		
		});
		
		
		
		}else{
		  //alert('Valores Sumados No Iguales:'+TotalOtrompago); 		
			$('#modalErrorlLabel').html('Favor de Revisar sus Medios de Pago');	
	        $('#body-modalError').html('Los montos informados no coinciden con el monto final');
	        $('#open-error').click();	
           return false;	
    	   
		} 
		 
		 
	 
	 }else{
	$('#modalErrorlLabel').html('Favor de Revisar sus Medios de Pago');	
	$('#body-modalError').html('Estimado Alumno, Favor de seleccionar algun medio de pago');
	$('#open-error').click();	
     return false;	
	 }
	
	
	
	
	
	});	
	
	}		
	
	break;
	
	
 }//Fin Case


 
});//step_3




 $('#step_4_enviar').click(function() {
if(iCnt == 0){
	
$('#modalErrorlLabel').html('Advertencia');	
$('#body-modalError').html('No olvide adjuntar sus Antecedentes');
$('#open-error').click();	
return false;

}	
//console.log($('#step_4_form').serialize());
 $('#step_4_form').validate({
      rules:{
        "userfile[]"      :{required:true},
		"acepta"          :{required:true},
		"subir_doc"       :{required:true},
      },
      messages:{
        "subir_doc"      :{required:"Debes ingresar almenos tu DNI o Celuda de Identidad"},
        "userfile[]"      :{required:"Favor de adjuntar documentos"},
		"acepta"          :{required:"Favor de Aceptar las Condiciones"} ,    
      },  
          //debug: true,
          ignore: "ignore",
		  errorElement: "span",
		  submitHandler: function(form){
		  var formUrl = "https://ficha.claseejecutiva.com/index.php/controller/do_upload";
	      var formData = new FormData($('#step_4_form')[0]);
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
				//(document.getElementsByClassName("progress-bar")[0].style.width =percentVal;
				$('#bar').css('width',percentVal);
				percent.html(percentVal);
				//element.setAttribute("style", "background-color: red;");
				if (percentComplete === 100) {
                $('#step_4_enviar').removeClass("btn btn-success").addClass("btn btn-warning").val("Enviando....");
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
				 $('#step_4_enviar').removeClass("btn btn-warning").addClass("btn btn-success").val("Datos Enviados");
				 $('#step_4_enviar').prop('disabled', true);
				if(respuesta.status=='ok'){
					//alert('Datos Ingresado Correctamente');
					enviar_form($('#step_4_form').serialize(),'https://ficha.claseejecutiva.com/index.php/controller/step_4');
					$('#modalErrorlLabel').html('Exito');	
                    $('#body-modalError').html('Datos Ingresado Correctamente');
                    $('#open-error').click();	
					//setTimeout('window.location.href = "http://www.claseejecutiva.com";', 3000);
				}else
				{
				$('#step_4_enviar').prop('disabled', false);
					alert(data);
				}
				
                },
                error: function(jqXHR, textStatus, errorThrown){
                        //handle here error returned
                }
        });		  
		  
		  
		  
		  
		  
		  
		  }
		  
	 });
 
 
 
 });//step_4 Final 	
	



});//Fin Funcion Document Ready
 
//Funcion para peticiones 2do plano 
 
function enviar_form(info,url) {
 $.ajax({
					url :url,
					type : "POST",
					data :info,
					success: function(html){						
					respuesta = JSON.parse(html);	
						if(respuesta){
						//acciones a realizar	
                        return respuesta;  
                        //console.log(respuesta);  						
						}else{
						return false;
						} 
					},
					error : function(xhr,errmsg,err) {
					 console.log(xhr.status + ": " + xhr.responseText);
					}
	  });
	
}
 
 
 
 //Funciones Para la Clase Validate
jQuery.validator.addMethod("pattern", function(value, element) {
return this.optional(element) || /^[a-z0-9\-\.\s]+$/.test(value);
}, "Favor de Caracteres alfanumericos en Minusculas");

jQuery.validator.addMethod("checkRut", function(value, element) {
 return this.optional(element) || checkRut(value);
}, "Digito Verificador Incorrecto");


jQuery.validator.addMethod("validaPass", function(value, element) {
 return this.optional(element) || validaPass(value);
}, "Las password deben coincidir");






//Funciones para reaundar
function reanudar(step) {

	switch (step) {	 
		case 'step_1':
	 	  $('#container_step_1').removeClass("d").addClass("d-none");
	 	  $('#container_step_2').removeClass("d-none").addClass("d");
	 	  $('#container_step_3').removeClass("d").addClass("d-none");
	 	  $('#container_step_4').removeClass("d").addClass("d-none");
		 break;
		 
		case 'step_2':
	 	  $('#container_step_1').removeClass("d").addClass("d-none");
	 	  $('#container_step_2').removeClass("d").addClass("d-none");
	 	  $('#container_step_3').removeClass("d-none").addClass("d");
	 	  $('#container_step_4').removeClass("d").addClass("d-none");
		  
		if(pais_step2==='Chile(PS-38)'){
		   $('#mpago_step_1').removeClass("d-none").addClass("d");  
		   $('#mpago_step_1_extranjero').removeClass("d").addClass("d-none");  
		 }else{
			$('#mpago_step_1').removeClass("d").addClass("d-none");  
			$('#mpago_step_1_extranjero').removeClass("d-none").addClass("d");  
		}		  
		  
		  
		 break;	

		case 'step_3':
	 	  $('#container_step_1').removeClass("d").addClass("d-none");
	 	  $('#container_step_2').removeClass("d").addClass("d-none");
	 	  $('#container_step_3').removeClass("d").addClass("d-none");
	 	  $('#container_step_4').removeClass("d-none").addClass("d");

		 break;	

		case 'step_4':
	 	  $('#container_step_1').removeClass("d").addClass("d-none");
	 	  $('#container_step_2').removeClass("d").addClass("d-none");
	 	  $('#container_step_3').removeClass("d").addClass("d-none");
	 	  $('#container_step_4').removeClass("d").addClass("d-none");
	 	  $('#container_step_finalizado').removeClass("d-none").addClass("d");

		 break;			 
		 
	}

}





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
                url :'https://ficha.claseejecutiva.com/index.php/controller/malla?idOp='+sku,
                type : "GET",
                data :sku,
                success: function(data){
               				
				respuesta = JSON.parse(data);
				// console.log(respuesta); 	

				if(respuesta){
					var table='<div class="table-responsive">';
					    table+='<table class="table">';
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
				    table+='</div>';
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

function removerTablaOC()
{
data_chq.pop();	
$('#id_table_oc').html('');	
	//$('#id_table_oc').removeClass("d").addClass("d-none");
				  		var table_oc='<div class="form-group row">';
						    table_oc+='<div class="col-md-2"><br></div>';
							table_oc+='<div class="col-md-10">';
							table_oc+='<table class="table table-striped table-responsive">';
							table_oc+= '<thead>';
							table_oc+= '<tr>';
							table_oc+= '<th scope="col">Medio de Pago</th>';
							table_oc+= '<th scope="col">Rut Pagador</th>';
							table_oc+= '<th scope="col">Datos Pagador</th>';
							table_oc+= '<th scope="col">Total a Pagar</th>';
							table_oc+= '<th scope="col">Modificar</th>';
							table_oc+= '</tr>';
							table_oc+= '</thead>';
							table_oc+='<tbody>';
							table_oc+='<tr>';	
		Object.keys(data_chq).forEach(function (key) {							
							table_oc+='<td>'+data_chq[key].medioPago+'</td>';						
							table_oc+='<td>'+data_chq[key].rut+'</td>';						
							table_oc+='<td>'+data_chq[key].datoPagador+'</td>';
							table_oc+='<td>'+data_chq[key].total+'</td>';
							table_oc+='<td><button type="button" onClick="removerTablaOC();" class="btn btn-info btn-lg btn-block">Eliminar</button></td>';		
							table_oc+='</tr>';
				});	
							table_oc+='</tbody>';
						table_oc+='</table>';
						table_oc+='</div>';
					table_oc+='</div>';
$('#id_table_oc').html(table_oc);	
}

function back_step(step){
	
	switch(step)
	{
	  case 1:
	  // enviar_back('step_1',$('#idOp_step_1').val());
	  // window.location.href = 'https://ficha.claseejecutiva.com/?idOp='+$('#idOp_step_1').val();
      $.post('https://ficha.claseejecutiva.com/index.php/controller/back_step', {"step": "step_1","idOp": $('#idOp_step_1').val()},function(data) {   window.location.href = 'https://ficha.claseejecutiva.com/?idOp='+$('#idOp_step_1').val();})	   	  
	   window.location.reload(true);	  
	  break;
			
	  case 2:
	   //enviar_back('step_2',$('#idOp_step_2').val());
	 $.post('https://ficha.claseejecutiva.com/index.php/controller/back_step', {"step": "step_2","idOp": $('#idOp_step_2').val()},function(data) {   window.location.href = 'https://ficha.claseejecutiva.com/?idOp='+$('#idOp_step_2').val();})	   
	  window.location.reload(true);
	  break;
		
	  case 3:
	  //window.location.reload(true);
	  step='step_2';
      //enviar_back('step_3',$('#idOp_step_3').val());
	 // window.location.href = 'https://ficha.claseejecutiva.com/?idOp='+$('#idOp_step_3').val();
      $.post('https://ficha.claseejecutiva.com/index.php/controller/back_step', {"step": "step_3","idOp": $('#idOp_step_3').val()},function(data) {   window.location.href = 'https://ficha.claseejecutiva.com/?idOp='+$('#idOp_step_3').val();})	   	  	 
	  window.location.reload(true);
	  break;

	  case 4:
	  //window.location.reload(true);
	  step='step_2';
      $.post('https://ficha.claseejecutiva.com/index.php/controller/back_step', {"step": "step_3","idOp": $('#idOp_step_4').val()},function(data) {   window.location.href = 'https://ficha.claseejecutiva.com/?idOp='+$('#idOp_step_4').val();})	   	  	 	  
      //enviar_back('step_3',$('#idOp_step_4').val());
	  //window.location.href = 'https://ficha.claseejecutiva.com/?idOp='+$('#idOp_step_4').val();
	  //window.location.reload(true);
	  break;
	  
	  case 5:
	  window.location.href = 'https://ficha.claseejecutiva.com/?idOp='+$('#idOp_step_3').val();
	  //window.location.reload(true);
	  break;
		
	}	

}

function enviar_back(step_v,idOp_v)
{
/*
$.post('https://ficha.claseejecutiva.com/index.php/controller/back_step', {
              "step": step_v,
              "idOp": idOp_v
},function(data) {
              console.log('procesamiento finalizado', data);
 });
     	
*/	
		 $.ajax({
                url :'https://ficha.claseejecutiva.com/index.php/controller/back_step',
                type : "POST",
                data :{step:step_v,idOp:idOp_v},
                success: function(data){		
				respuesta = JSON.parse(data);
					if(respuesta)
					{ 
						//console.log(respuesta);			
					}else{
					// setTimeout('window.location.href = "http://trial.claseejecutiva.com/publico/index/login";', 2000); 	
					}
				 
                },
                error : function(xhr,errmsg,err) {
                  console.log(xhr.status + ": " + xhr.responseText+"Data:"+step_v);
				  
                 }
              });
			  
}
//Funciones Valida Extenciones



function ElimiarChequesTerceros(){
data_chq.pop();	
$('#tabla_cheques').html('');
					    table_cheques='<div class="table-responsive">';
					    table_cheques+='<table class="table">';
						table_cheques+= '<thead>';
						table_cheques+= '<tr>';
						table_cheques+= '<th scope="col">medioPago:</th>';
						table_cheques+= '<th scope="col" colspan="1">Rut Pagador:</th>';
						table_cheques+= '<th scope="col" colspan="1">Datos Pagador:</th>';
						table_cheques+= '<th scope="col">Total</th>';
						table_cheques+= '<th scope="col"></th>';
						table_cheques+= '</tr>';
						table_cheques+= '</thead>';
					Object.keys(data_chq).forEach(function (key) {
						table_cheques+='<tbody>';
					    table_cheques+='<tr>';				
						table_cheques+='<td>'+data_chq[key].medioPago+'</td>';						
						table_cheques+='<td colspan="1">'+data_chq[key].rut+'</td>';
						table_cheques+='<td colspan="1">'+data_chq[key].datoPagador+'</td>';
						table_cheques+='<td colspan="1">'+data_chq[key].total+'</td>';
						table_cheques+='<td><button type="button" onClick="ElimiarChequesTerceros();" name="otro_cheque_elimina" class="form-control btn btn-info btn-lg btn-block"  value="">Eliminar</button></td>';		
						table_cheques+='</tr>';
						table_cheques+='</tbody>';
      
					});
				    table_cheques+='</table>';
				    table_cheques+='</div>';
$('#tabla_cheques').html(table_cheques);
}


function validaArchivo1(){   
	var ext = $('#tb1').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	//alert("Archivo con Extension Incorrecta");
	$('#modalErrorlLabel').html('Favor de Revisar Tu archivos');	
	$('#body-modalError').html('Estimado Alumno,El Archivo  tiene la Extension <b>'+ext2+'</b> que es Incorrecta, Solamente se admiten archivos tipo <b> pdf , jpg, doc o docx</b>');
	$('#open-error').click();		
	$("#tb1").empty();
	document.getElementById('tb1').value = "";
	 } 
  }

function validaArchivo2(){   
	var ext = $('#tb2').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	$('#modalErrorlLabel').html('Favor de Revisar Tu archivos');	
	$('#body-modalError').html('Estimado Alumno,El Archivo  tiene la Extension <b>'+ext2+'</b> que es Incorrecta, Solamente se admiten archivos tipo <b> pdf , jpg, doc o docx</b>');
	$('#open-error').click();	
	$("#tb2").empty();
	document.getElementById('tb2').value = "";
	 } 
  }

function validaArchivo3(){   
	var ext = $('#tb3').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	$('#modalErrorlLabel').html('Favor de Revisar Tu archivos');	
	$('#body-modalError').html('Estimado Alumno,El Archivo  tiene la Extension <b>'+ext2+'</b> que es Incorrecta, Solamente se admiten archivos tipo <b> pdf , jpg, doc o docx</b>');
	$('#open-error').click();	
	$("#tb3").empty();
	document.getElementById('tb3').value = "";
	 } 
  }

function validaArchivo4(){   
	var ext = $('#tb4').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	$('#modalErrorlLabel').html('Favor de Revisar Tu archivos');	
	$('#body-modalError').html('Estimado Alumno,El Archivo  tiene la Extension <b>'+ext2+'</b> que es Incorrecta, Solamente se admiten archivos tipo <b> pdf , jpg, doc o docx</b>');
	$('#open-error').click();	
	$("#tb4").empty();
	document.getElementById('tb4').value = "";
	 } 
  } 

function validaArchivo5(){   
	var ext = $('#tb5').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	$('#modalErrorlLabel').html('Favor de Revisar Tu archivos');	
	$('#body-modalError').html('Estimado Alumno,El Archivo  tiene la Extension <b>'+ext2+'</b> que es Incorrecta, Solamente se admiten archivos tipo <b> pdf , jpg, doc o docx</b>');
	$('#open-error').click();	
	$("#tb5").empty();
	document.getElementById('tb5').value = "";
	 } 
  } 

function validaArchivo6(){   
	var ext = $('#tb6').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	$('#modalErrorlLabel').html('Favor de Revisar Tu archivos');	
	$('#body-modalError').html('Estimado Alumno,El Archivo  tiene la Extension <b>'+ext2+'</b> que es Incorrecta, Solamente se admiten archivos tipo <b> pdf , jpg, doc o docx</b>');
	$('#open-error').click();	
	$("#tb6").empty();
	document.getElementById('tb6').value = "";
	 } 
  } 


function validaArchivo7(){   
	var ext = $('#tb7').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	$('#modalErrorlLabel').html('Favor de Revisar Tu archivos');	
	$('#body-modalError').html('Estimado Alumno,El Archivo  tiene la Extension <b>'+ext2+'</b> que es Incorrecta, Solamente se admiten archivos tipo <b> pdf , jpg, doc o docx</b>');
	$('#open-error').click();	
	$("#tb7").empty();
	document.getElementById('tb7').value = "";
	 } 
  }  

function validaArchivo8(){   
	var ext = $('#tb8').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	$('#modalErrorlLabel').html('Favor de Revisar Tu archivos');	
	$('#body-modalError').html('Estimado Alumno,El Archivo  tiene la Extension <b>'+ext2+'</b> que es Incorrecta, Solamente se admiten archivos tipo <b> pdf , jpg, doc o docx</b>');
	$('#open-error').click();	
	$("#tb8").empty();
	document.getElementById('tb8').value = "";
	 } 
  } 
  
function validaArchivo9(){   
	var ext = $('#tb9').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	$('#modalErrorlLabel').html('Favor de Revisar Tu archivos');	
	$('#body-modalError').html('Estimado Alumno,El Archivo  tiene la Extension <b>'+ext2+'</b> que es Incorrecta, Solamente se admiten archivos tipo <b> pdf , jpg, doc o docx</b>');
	$('#open-error').click();	
	$("#tb9").empty();
	document.getElementById('tb9').value = "";
	 } 
  } 
  
  function validaArchivo10(){   
	var ext = $('#tb10').val();
	var ext2 =ext.split(".").pop().toLowerCase();
	if($.inArray(ext2, ['pdf','doc','docx','jpg']) == -1) {
	$('#modalErrorlLabel').html('Favor de Revisar Tu archivos');	
	$('#body-modalError').html('Estimado Alumno,El Archivo  tiene la Extension <b>'+ext2+'</b> que es Incorrecta, Solamente se admiten archivos tipo <b> pdf , jpg, doc o docx</b>');
	$('#open-error').click();	
	$("#tb10").empty();
	document.getElementById('tb10').value = "";
	 } 
  } 
  
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
} 

function formatNumber (n) {
	n = String(n).replace(/\D/g, "");
  return n === '' ? n : Number(n).toLocaleString();
}
