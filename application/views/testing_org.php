<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>Formulario de Pre-Inscripcion</title>

 <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script> 
 <script src="/landing/contents/js/ficha.js" ></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
<LINK REL=StyleSheet HREF="/landing/contents/css/multi_archivos.css" TYPE="text/css" MEDIA=screen>
<link rel="icon" href="http://www.claseejecutiva.com/wp-content/themes/ejecutivaclase/assets/img/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: "dd-mm-yy"
    });
  } );
</script>



</head>
<body>
<div class="container border border-dark">
<div class=".hidden-xs-down">	
	<div class="header clearfix">
	
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
			<!--
              <a class="nav-link active" onclick="$('#modal_ayuda').modal('show'); " >Ayuda <span class="sr-only">(current)</span></a>
			  <img src="/landing/contents/images/logo-lce.png" alt="Logo"  width="163"> 
			  -->
			 
            </li>
          </ul>
		  <img src="/landing/contents/images/logo-uc.jpg" alt="Logo"  width="163">
        </nav>
     </div>
 </div> 
	
   <div  class=".hidden-xs-down">
   <strong><h3>Ficha de Pre-Inscripción Diplomados Ingenería Industrial UC</h3> </strong>
	 <hr> 
	</div>

		<?php echo $error;?>

		<?php echo form_open_multipart('testing/do_upload');?>
		
		<div class="form-group row">			
			<div  class="col-md-3 field-label-responsive"><strong> Fecha de Inscripción: </strong></div>
			  <div class="col-md-3">
			  <input type="text" name="f_inscripcion" class="form-control" placeholder="Fecha de Inscripción" id="datepicker">
			</div>
		</div>	
			
		<div class="form-group row">
			<div  class="col-md-3 field-label-responsive"><strong> Matriculado por: </strong></div>
			 <div class="col-md-3">
			  <input type="text" name="ejecutivo"class="form-control" placeholder="Ejecutivo(a):"readonly value="<?php if($jsondecode){echo $jsondecode->ejec->name;}else{echo '';} ?>" >
			 </div>
        </div>
		
		
		<div  class="form-group row">
			<div  class="col-md-10 field-label-responsive"><strong>Nota:La inscripción del alumno se hace efectiva una vez se documenta el valor total del Diplomado </strong></div>
        </div>
           <br>
		
		<div  class="form-group row">
			<div  class="col-md-6 field-label-responsive"><strong>Datos del Alumno:</strong><p style="color:red;">(campos obligatorios)</p></div>
        </div>
		<br>
		<div class="form-group row">
			<div  class="col-md-3 field-label-responsive"><strong> Nombres: </strong></div>
			 <div class="col-md-3">
			  <input type="text" name="nombre"class="form-control" placeholder="Nombre" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->FirstName;}else{echo '';} ?>">
			 </div>
			 <div  class="col-md-2 field-label-responsive"><strong> Apellidos: </strong></div>
			 <div class="col-md-3">
			  <input type="text" name="apellido"class="form-control" placeholder="Apellidos" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->LastName;}else{echo '';} ?>">
			 </div>
        </div>
		
		<div class="form-group row">
		  <div  class="col-md-3 field-label-responsive"><strong> Documento de identidad: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="dni"class="form-control" placeholder="DNI o RUT" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->RUT__c;}else{echo '';} ?>" >
			</div>
        </div>
		
		<div class="form-group row">
		  <div  class="col-md-3 field-label-responsive"><strong> Empresa donde trabaja: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="empresa"class="form-control" placeholder="Trabajo" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Empresa__c;}else{echo '';} ?>" >
		    </div>
			<div  class="col-md-2 field-label-responsive"><strong> Cargo: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="cargo"class="form-control" placeholder="Cargo" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Cargo__c;}else{echo '';} ?>" >
		    </div>
        </div>
		
		<div class="form-group row">
		  <div  class="col-md-3 field-label-responsive"><strong> Direccion domicilio particular: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="dir"class="form-control" placeholder="Domicilio particular" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->dir_calle__pc;}else{echo '';} ?>">
		    </div>
			<div  class="col-md-2 field-label-responsive"><strong> Pais: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="pais"class="form-control" placeholder="Pais" >
		    </div>
        </div>
		
		<div class="form-group row">
		  <div  class="col-md-3 field-label-responsive"><strong> Comuna: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="comuna"class="form-control" placeholder="Comuna" >
		    </div>
			<div  class="col-md-2 field-label-responsive"><strong> Ciudad: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="ciudad"class="form-control" placeholder="Ciudad" >
		    </div>
        </div>		

		<div class="form-group row">
		  <div  class="col-md-3 field-label-responsive"><strong> Celular: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="dir"class="form-control" placeholder="+569" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Phone;}else{echo '';} ?>">
		    </div>
			<div  class="col-md-2 field-label-responsive"><strong> Email: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="pais"class="form-control" placeholder="noreply@diplomadosuc.cl" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Correo_Electronico__c;}else{echo '';} ?>">
		    </div>
        </div>		
		
		<div class="form-group row">
		<div  class="col-md-3 field-label-responsive"><strong> Valor total a pagar($): </strong></div>
			<div class="col-md-3">
			  <input type="number" name="valor"class="form-control" placeholder="$" >
		    </div>
		</div>
		
		<div  class="form-group row">
			<div  class="col-md-6 field-label-responsive"><strong>Forma de Pago:</strong><small  class="form-text text-muted"><p style="color:red;">(marque con una X la opción que corresponda)</p></small></div>
        </div>
		
		
		
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
		  <label class="form-check-label" for="inlineCheckbox1">Pay Pal</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2">
		  <label class="form-check-label" for="inlineCheckbox2">Deposito Bancario</label>
		</div>

		
		
		<br><br>
		<div class="border border-info col-md-8 mx-auto">
		<!--Seccion upload  -->
		<div  class="form-group row mx-auto">
			<div  class="col-md-10 field-label-responsive"><strong>Carga de Archivos:</strong><small  class="form-text text-muted"><p style="color:red;">(Favor de subir sus antecedentes en formato pdf,word o jpg.)</p></small></div>
        </div>

			<div  class=".hidden-xs-down">
				<div id="main">
				<input type="button" class="btn btn-primary"id="btAdd" value="Añadir Elemento" class="bt" />
				<input type="button" class="btn btn-secondary"id="btRemove" value="Eliminar Elemento" class="bt" />
				<input type="button" class="btn btn-danger"id="btRemoveAll" value="Eliminar Todo" class="bt" /><br />
				</div><br>			
			</div>
		</div><br><br>
		<input type="submit" class="btn btn-success" value="Enviar" />
		
		<!--Fin upload  -->
		</form>
 
   
 
   
   </div>
 </div>
</body>
</html>