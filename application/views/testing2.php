<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv=”Expires” content=”0″>
    <meta http-equiv=”Last-Modified” content=”0″>
    <meta http-equiv=”Cache-Control” content=”no-cache, mustrevalidate”>
    <meta http-equiv=”Pragma” content=”no-cache”>
	<link rel="shortcut icon" src="/contents/imagenes/favicon.ico"> 
<title>Formulario de Pre-Inscripcion</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
<LINK REL=StyleSheet HREF="/contents/css/multi_archivos.css" TYPE="text/css" MEDIA=screen>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="/contents/js/jquery.min.js" tppabs="/contents/js/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script type="text/javascript" src="/contents/js/validate.min.js" ></script> 
 <script src="/contents/js/ficha.js" ></script> 
 <script src="/contents/js/dropzone.js" ></script> 

<style type="text/css">
.error {
  color: #d93636;
}
.errores{
 background-color:yellow;
 width:100%;
 border:1px solid red;
}
</style>


</head>
<body>
<div class="container border border-dark">
<div class=".hidden-xs-down">	
	<div class="header clearfix">
	
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
			
			
				<!-- Button trigger modal -->
				<br>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				  Reglamento del Alumno 
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Listado de Documentos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<a href="/contents/imagenes/Reglamento_del_Alumno_de_Educacion_Continua_2017.pdf" download="Reglamento_del_Alumno_de_Educacion_Continua_2017.pdf">Reglamento del Alumno de Educacion Continua</a><br>
						<a href="/contents/imagenes/Reglamento_Clase_Ejecutiva_mayo_2017.pdf" download="Reglamento_Clase_Ejecutiva_mayo_2017.pdf">Reglamento Clase Ejecutiva</a><br>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					
					  </div>
					</div>
				  </div>
				</div>
				
			
				


			 
            </li>
          </ul>
		  <img src="/contents/images/logo-uc.jpg" alt="Logo"  width="163">
        </nav>
     </div>
 </div> 
	<br>
   <div  class=".hidden-xs-down mx-auto">
   <center>
   <strong><h3>Ficha de Inscripción</h3> </strong>
   </center>
	 <hr> 
	</div>

		<?php echo $error;?>


		<?php echo form_open_multipart('controller/do_upload',array('id' => 'form_pre'));?>
		
		<?php //echo '<pre>';print_r($jsondecode);echo '</pre>';?>
		 <input type="hidden" name="idOp" value="<?php echo $idOp; ?>" readonly>
		 <input type="hidden" name="IdCuenta" value="<?php if($jsondecode){echo $jsondecode->dataOp->fields->AccountId;}else{echo '';} ?>" readonly>
		 <input type="hidden" name="ejecutivaName" value="<?php if($jsondecode){echo $jsondecode->ejec->name;}else{echo '';} ?>" readonly>
		 <input type="hidden" name="ejecutivaEmail" value="<?php if($jsondecode){echo $jsondecode->ejec->email;}else{echo '';} ?>" readonly>
		 <input type="hidden" id="mpagoFinalChile" name="mpagoChile" value="" readonly>
		
		
		<div class="form-group row">			
			<div  class="col-md-3 field-label-responsive"><strong> Fecha de Inscripción: </strong></div>
			  <div class="col-md-3">
			  <input type="text" name="f_inscripcion" class="form-control" placeholder="Fecha de Inscripción"  value="<?php $date=date("d/m/Y");echo $date; ?>" readonly>
			</div>
			
		<div  class="col-md-2 field-label-responsive"><strong> Matriculado por: </strong></div>
			 <div class="col-md-3">
			  <input type="text" name="ejecutivo"class="form-control" placeholder="Ejecutivo(a):"readonly value="<?php if($jsondecode){echo $jsondecode->ejec->name;}else{echo '';} ?>" >
			 </div>			
		</div>	
		   
		<hr> <!--Productos -->
		<div  class="form-group row">
			<div class="col-md-3 field-label-responsive"><strong></strong></div>
			<div  class="col-md-5 field-label-responsive"></div>
			<div  class="col-md-3 field-label-responsive"><strong> Arancel($): </strong></div>
        </div>

		<div class="form-group row">		
		<div  class="col-md-8 field-label-responsive">
		<table class="table" class="table table-nonfluid">
			  <thead>
				<tr>
				  <th>Programas(s)de estudio:</th>
				  <th>Malla</th>

				</tr>
			  </thead>
			  <tbody>
		<?php
			foreach ($jsondecode->productos as $k){
				$pos=strpos($k->ProductCode,'C-');
				echo "<tr>";	
				if($pos!==false){
				echo "<td>".$k->Name."</td>";
				}else{
				echo "<td>".$k->Name."</td>";
				echo "<td>".'<button type="button"   class="btn btn-warning d "  onclick="malla_diplo('.$k->ProductCode.')" >Ver</button>'."</td>";
				echo "</tr>";
				}
				//data-toggle="modal" data-target="#ModalMalla"
			}
		?>
			  </tbody>
			</table>
	   </div>

<button  type="button" class="d-none" data-toggle="modal" data-target="#ModalMalla" id="open">aqui </button>
<!-- Modal -->
<div class="modal fade" id="ModalMalla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <center> <h5 class="modal-title" id="exampleModalLabel">Malla</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mallaBody">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
		
			<div class="col-md-3">
			  <input type="" name="valor"class="form-control" placeholder="$" readonly value="<?php if($jsondecode){echo $jsondecode->dataOp->fields->Monto_Final__c;}else{echo '';} ?>">
		    </div>
		</div>
	   	 <!--Productos -->	
	 
			
		<hr>
	<!--Disclaimer data-toggle="collapse"-->
		<div class="collapse" id="collapseProgramas">
		<!--
		<div class="col-md-3 field-label-responsive"> <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseProgramas">Ver</button></div>
        -->
		</div>		
	<!--Disclaimer -->		
	
	<?php if($jsondecode->dataOp->fields->Ficha_electronica__c!='false'){ ?>
	  <font size=4>Estimado/a:
	  <br><br>
	  Favor de contactarse con su ejecutiva:<b><?php echo $jsondecode->ejec->name;?></b> al Email: <b><?php echo $jsondecode->ejec->email;?></b>, <br>
	  si necesitas actualizar sus datos personales.<br><br>
	  Saluda Atte.<br>
	  Equipo de Admision Clase Ejecutiva.<br>
	 <a href=https://www.claseejecutiva.com>https://www.claseejecutiva.com</a></font>
	  <br>
	<?php } else{ ?>
       <!--Datos Personales -->
		<div  class="form-group row">
			<div  class="col-md-6 field-label-responsive"><strong>Datos del Alumno:</strong><p style="color:red;">(campos obligatorios)</p></div>
        </div>
		<br>
		<div class="form-group row">
			<div  class="col-md-3 field-label-responsive"><strong> Nombres: </strong></div>
			 <div class="col-md-3">
			  <input type="text" id="id_name" name="nombre"class="form-control" placeholder="Nombre" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->FirstName;}else{echo '';} ?>">
			 </div>
			 <div  class="col-md-2 field-label-responsive"><strong> Apellido Paterno: </strong></div>
			 <div class="col-md-3">
			  <input type="text" id="id_apeP" name="apellidoPaterno"class="form-control" placeholder="Apellidos" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->LastName;}else{echo '';} ?>">
			 </div>
        </div>
		
		<div class="form-group row">

		  <div  class="col-md-3 field-label-responsive"  id="txt_tipo_documento" ><strong> Tipo de Identificacion: </strong></div>
			<div class="col-md-3"  id="div_tipo_documento">
				 <select type="text" name="tipo_documento" class="form-control" id="tipo_documento" placeholder="DNI O PASSAPORTE">
								  <option value="">Seleccionar</option>
								  <option value="DNI(2)">DNI</option>
								  <option value="Passaporte(3)">Pasaporte</option>
				</select>
			</div>
			
			<div class="col-md-6" id="chile_tipo_documento">
			</div>

			
			 <div  class="col-md-2 field-label-responsive"><strong> Apellido Materno: </strong></div>
			 <div class="col-md-3">
			  <input type="text" id="id_apeM" name="apellidoMaterno"class="form-control" placeholder="Apellido Materno" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Apellido_Materno__c;}else{echo '';} ?>">
			 </div>			
        </div>

		<div class="form-group row">
		<div  class="col-md-3 field-label-responsive"><strong> Documento de identidad: </strong></div>
		<div class="col-md-3">
			  <input type="text" id="dni" name="dni"class="form-control" placeholder="DNI o RUT" size="20" maxlength="20" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->RUT__c;}else{echo '';} ?>" >
		</div>		
			<div  class="col-md-2 field-label-responsive"><strong> Estado Civil: </strong></div>
			<div class="col-md-3">
			   <Select type="text" name="estado_civil" id="estado_civil" class="form-control" placeholder="estado_civil"  >
			     <option value="" selected>Seleccionar</option>
                 <option value='C'>Casado/a</option>
                 <option value='D'>Divorciado/a</option>
                 <option value='E'>Separado/a</option>
                 <option value='S'>Soltero/a</option>
                 <option value='V'>Viudo/a</option>
			   </Select>
		    </div>		
		
		</div>


		
		<div class="form-group row">
		  <div  class="col-md-3 field-label-responsive"><strong> Genero: </strong></div>
			<div class="col-md-3">
			   <Select type="text" name="genero" id="genero" class="form-control" placeholder="Genero"  >
			     <option value="" selected>Seleccionar</option>
                 <option value='M'>Masculino</option>
                 <option value='F'>Femenino</option>
			   </Select>
		    </div>
			
			<!--
			<div  class="col-md-2 field-label-responsive"><strong> Cargo: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="cargo"class="form-control" placeholder="Cargo" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Cargo__c;}else{echo '';} ?>" >
		    </div>
			-->
			
        </div>	

		<div class="form-group row">
		  <div  class="col-md-3 field-label-responsive"><strong>Fecha de Nacimiento: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="f_nacimiento"class="form-control" id="f_nacimiento" value="<?php if($jsondecode){echo date('d/m/Y',strtotime($jsondecode->dataCta->fields->PersonBirthdate));}else{echo '';} ?>" >
		    </div>
		

			<div  class="col-md-2 field-label-responsive"><strong> Pais: </strong></div>
			<div class="col-md-3">
			  <Select type="text" name="pais" id="pais" class="form-control" placeholder="Pais"  >
                        <option value="" selected>Seleccione país</option>
                        <option value='Chile(PS-38)'selected>Chile </option>
						<option value='Argentina(PS-9)'>Argentina </option>
						<option value='Bolivia(PS-23)'>Bolivia</option>
						<option value='Brasil(PS-26)'>Brasil</option>
						<option value='Colombia(PS-42)'>Colombia</option>
						<option value='Ecuador(PS-52)'>Ecuador</option>
						<option value='Paraguay(PS-138)'>Paraguay</option>
						<option value='Perú(PS-139)'>Perú</option>
						<option value='Uruguay(PS-186)'>Uruguay</option>
						<option value='Venezuela(PS-189)'>Venezuela</option>
						<option value='Afganistán(PS-1)'>Afganistán</option>
						<option value='Albania(PS-2)'>Albania</option>
						<option value='Alemania(PS-3)'>Alemania</option>
						<option value='Andorra(PS-4)'>Andorra</option>
						<option value='Angola(PS-5)'>Angola</option>
						<option value='Antigua y Barbuda(PS-6)'>Antigua y Barbuda</option>
						<option value='Arabia Saudita(PS-7)'>Arabia Saudita</option>
						<option value='Argelia(PS-8)'>Argelia</option>
						<option value='Armenia(PS-10)'>Armenia</option>
						<option value='Australia(PS-11)'>Australia</option>
						<option value='Austria(PS-12)'>Austria</option>
						<option value='Azerbaiyán(PS-13)'>Azerbaiyán</option>
						<option value='Bahamas(PS-14)'>Bahamas</option>
						<option value='Bangladés(PS-15)'>Bangladés</option>
						<option value='Barbados(PS-16)'>Barbados</option>
						<option value='Baréin(PS-17)'>Baréin</option>
						<option value='Bélgica(PS-18)'>Bélgica</option>
						<option value='Belice(PS-19)'>Belice</option>
						<option value='Benín(PS-20)'>Benín</option>
						<option value='Bielorrusia(PS-21)'>Bielorrusia</option>
						<option value='Birmania(PS-22)'>Birmania</option>
						<option value='Bosnia y Herzegovina(PS-24)'>Bosnia y Herzegovina</option>
						<option value='Botsuana(PS-25)'>Botsuana</option>
						<option value='Brunéi(PS-27)'>Brunéi</option>
						<option value='Bulgaria(PS-28)'>Bulgaria</option>
						<option value='Burkina Faso(PS-29)'>Burkina Faso</option>
						<option value='Burundi(PS-30)'>Burundi</option>
						<option value='Bután(PS-31)'>Bután</option>
						<option value='Cabo Verde(PS-32)'>Cabo Verde</option>
						<option value='Camboya(PS-33)'>Camboya</option>
						<option value='Camerún(PS-34)'>Camerún</option>
						<option value='Canadá(PS-35)'>Canadá</option>
						<option value='Catar(PS-36)'>Catar</option>
						<option value='Chad(PS-37)'>Chad</option>
						<option value='China(PS-39)'>China</option>
						<option value='Chipre(PS-40)'>Chipre</option>
						<option value='Ciudad del Vaticano(PS-41)'>Ciudad del Vaticano</option>
						<option value='Comoras(PS-43)'>Comoras</option>
						<option value='Corea del Norte(PS-44)'>Corea del Norte</option>
						<option value='Corea del Sur(PS-45)'>Corea del Sur</option>
						<option value='Costa de Marfil(PS-46)'>Costa de Marfil</option>
						<option value='Costa Rica(PS-47)'>Costa Rica</option>
						<option value='Croacia(PS-48)'>Croacia</option>
						<option value='Cuba(PS-49)'>Cuba</option>
						<option value='Dinamarca(PS-50)'>Dinamarca</option>
						<option value='Dominica(PS-51)'>Dominica</option>
						<option value='Egipto(PS-53)'>Egipto</option>
						<option value='El Salvador(PS-54)'>El Salvador</option>
						<option value='Emiratos Árabes Unidos(PS-55)'>Emiratos Árabes Unidos</option>
						<option value='Eritrea(PS-56)'>Eritrea</option>
						<option value='Eslovaquia(PS-57)'>Eslovaquia</option>
						<option value='Eslovenia(PS-58)'>Eslovenia</option>
						<option value='España(PS-59)'>España</option>
						<option value='Estados Unidos(PS-60)'>Estados Unidos</option>
						<option value='Estonia(PS-61)'>Estonia</option>
						<option value='Etiopía(PS-62)'>Etiopía</option>
						<option value='Filipinas(PS-63)'>Filipinas</option>
						<option value='Finlandia(PS-64)'>Finlandia</option>
						<option value='Fiyi(PS-65)'>Fiyi</option>
						<option value='Francia(PS-66)'>Francia</option>
						<option value='Gabón(PS-67)'>Gabón</option>
						<option value='Gambia(PS-68)'>Gambia</option>
						<option value='Georgia(PS-69)'>Georgia</option>
						<option value='Ghana(PS-70)'>Ghana</option>
						<option value='Granada(PS-71)'>Granada</option>
						<option value='Grecia(PS-72)'>Grecia</option>
						<option value='Guatemala(PS-73)'>Guatemala</option>
						<option value='Guinea(PS-75)'>Guinea</option>
						<option value='Guinea ecuatorial(PS-76)'>Guinea ecuatorial</option>
						<option value='Guinea-Bisáu(PS-77)'>Guinea-Bisáu</option>
						<option value='Guyana(PS-74)'>Guyana</option>
						<option value='Haití(PS-78)'>Haití</option>
						<option value='Honduras(PS-79)'>Honduras</option>
						<option value='Hungría(PS-80)'>Hungría</option>
						<option value='India(PS-81)'>India</option>
						<option value='Indonesia(PS-82)'>Indonesia</option>
						<option value='Irak(PS-83)'>Irak</option>
						<option value='Irán(PS-84)'>Irán</option>
						<option value='Irlanda(PS-85)'>Irlanda</option>
						<option value='Islandia(PS-86)'>Islandia</option>
						<option value='Islas Marshall(PS-87)'>Islas Marshall</option>
						<option value='Islas Salomón(PS-88)'>Islas Salomón</option>
						<option value='Israel(PS-89)'>Israel</option>
						<option value='Italia(PS-90)'>Italia</option>
						<option value='Jamaica(PS-91)'>Jamaica</option>
						<option value='Japón(PS-92)'>Japón</option>
						<option value='Jordania(PS-93)'>Jordania</option>
						<option value='Kazajistán(PS-94)'>Kazajistán</option>
						<option value='Kenia(PS-95)'>Kenia</option>
						<option value='Kirguistán(PS-96)'>Kirguistán</option>
						<option value='Kiribati(PS-97)'>Kiribati</option>
						<option value='Kuwait(PS-98)'>Kuwait</option>
						<option value='Laos(PS-99)'>Laos</option>
						<option value='Lesoto(PS-100)'>Lesoto</option>
						<option value='Letonia(PS-101)'>Letonia</option>
						<option value='Líbano(PS-102)'>Líbano</option>
						<option value='Liberia(PS-103)'>Liberia</option>
						<option value='Libia(PS-104)'>Libia</option>
						<option value='Liechtenstein(PS-105)'>Liechtenstein</option>
						<option value='Lituania(PS-106)'>Lituania</option>
						<option value='Luxemburgo(PS-107)'>Luxemburgo</option>
						<option value='Madagascar(PS-108)'>Madagascar</option>
						<option value='Malasia(PS-109)'>Malasia</option>
						<option value='Malaui(PS-110)'>Malaui</option>
						<option value='Maldivas(PS-111)'>Maldivas</option>
						<option value='Malí(PS-112)'>Malí</option>
						<option value='Malta(PS-113)'>Malta</option>
						<option value='Marruecos(PS-114)'>Marruecos</option>
						<option value='Mauricio(PS-115)'>Mauricio</option>
						<option value='Mauritania(PS-116)'>Mauritania</option>
						<option value='México(PS-117)'>México</option>
						<option value='Micronesia(PS-118)'>Micronesia</option>
						<option value='Moldavia(PS-119)'>Moldavia</option>
						<option value='Mónaco(PS-120)'>Mónaco</option>
						<option value='Mongolia(PS-121)'>Mongolia</option>
						<option value='Montenegro(PS-122)'>Montenegro</option>
						<option value='Mozambique(PS-123)'>Mozambique</option>
						<option value='Namibia(PS-124)'>Namibia</option>
						<option value='Nauru(PS-125)'>Nauru</option>
						<option value='Nepal(PS-126)'>Nepal</option>
						<option value='Nicaragua(PS-127)'>Nicaragua</option>
						<option value='Níger(PS-128)'>Níger</option>
						<option value='Nigeria(PS-129)'>Nigeria</option>
						<option value='Noruega(PS-130)'>Noruega</option>
						<option value='Nueva Zelanda(PS-131)'>Nueva Zelanda</option>
						<option value='Omán(PS-132)'>Omán</option>
						<option value='Países Bajos(PS-133)'>Países Bajos</option>
						<option value='Pakistán(PS-134)'>Pakistán</option>
						<option value='Palaos(PS-135)'>Palaos</option>
						<option value='Panamá(PS-136)'>Panamá</option>
						<option value='Papúa Nueva Guinea(PS-137)'>Papúa Nueva Guinea</option>
						<option value='Polonia(PS-140)'>Polonia</option>
						<option value='Portugal(PS-141)'>Portugal</option>
						<option value='Reino Unido(PS-142)'>Reino Unido</option>
						<option value='República Centroafricana(PS-143)'>República Centroafricana</option>
						<option value='República Checa(PS-144)'>República Checa</option>
						<option value='República de Macedonia(PS-145)'>República de Macedonia</option>
						<option value='República del Congo(PS-146)'>República del Congo</option>
						<option value='República Democrática del Congo(PS-147)'>República Democrática del Congo</option>
						<option value='República Dominicana(PS-148)'>República Dominicana</option>
						<option value='República Sudafricana(PS-149)'>República Sudafricana</option>
						<option value='Ruanda(PS-150)'>Ruanda</option>
						<option value='Rumanía(PS-151)'>Rumanía</option>
						<option value='Rusia(PS-152)'>Rusia</option>
						<option value='Samoa(PS-153)'>Samoa</option>
						<option value='San Cristóbal y Nieves(PS-154)'>San Cristóbal y Nieves</option>
						<option value='San Marino(PS-155)'>San Marino</option>
						<option value='San Vicente y las Granadinas(PS-156)'>San Vicente y las Granadinas</option>
						<option value='Santa Lucía(PS-157)'>Santa Lucía</option>
						<option value='Santo Tomé y Príncipe(PS-158)'>Santo Tomé y Príncipe</option>
						<option value='Senegal(PS-159)'>Senegal</option>
						<option value='Serbia(PS-160)'>Serbia</option>
						<option value='Seychelles(PS-161)'>Seychelles</option>
						<option value='Sierra Leona(PS-162)'>Sierra Leona</option>
						<option value='Singapur(PS-163)'>Singapur</option>
						<option value='Siria(PS-164)'>Siria</option>
						<option value='Somalia(PS-165)'>Somalia</option>
						<option value='Sri Lanka(PS-166)'>Sri Lanka</option>
						<option value='Suazilandia(PS-167)'>Suazilandia</option>
						<option value='Sudán(PS-168)'>Sudán</option>
						<option value='Sudán del Sur(PS-169)'>Sudán del Sur</option>
						<option value='Suecia(PS-170)'>Suecia</option>
						<option value='Suiza(PS-171)'>Suiza</option>
						<option value='Surinam(PS-172)'>Surinam</option>
						<option value='Tailandia(PS-173)'>Tailandia</option>
						<option value='Tanzania(PS-174)'>Tanzania</option>
						<option value='Tayikistán(PS-175)'>Tayikistán</option>
						<option value='Timor Oriental(PS-176)'>Timor Oriental</option>
						<option value='Togo(PS-177)'>Togo</option>
						<option value='Tonga(PS-178)'>Tonga</option>
						<option value='Trinidad y Tobago(PS-179)'>Trinidad y Tobago</option>
						<option value='Túnez(PS-180)'>Túnez</option>
						<option value='Turkmenistán(PS-181)'>Turkmenistán</option>
						<option value='Turquía(PS-182)'>Turquía</option>
						<option value='Tuvalu(PS-183)'>Tuvalu</option>
						<option value='Ucrania(PS-184)'>Ucrania</option>
						<option value='Uganda(PS-185)'>Uganda</option>
						<option value='Uzbekistán(PS-187)'>Uzbekistán</option>
						<option value='Vanuatu(PS-188)'>Vanuatu</option>
						<option value='Vietnam(PS-190)'>Vietnam</option>
						<option value='Yemen(PS-191)'>Yemen</option>
						<option value='Yibuti(PS-192)'>Yibuti</option>
						<option value='Zambia(PS-193)'>Zambia</option>
						<option value='Zimbabue(PS-194)'>Zimbabue</option>
                                                </select>
		    </div>			
			
        </div>

		<div class="form-group row">
		  <div  class="col-md-3 field-label-responsive"><strong> Direccion domicilio particular: </strong></div>
			<div class="col-md-3">
			  <input type="text" id="id_dir" name="dir" class="form-control" placeholder="Domicilio particular" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Complemento_Direcci_n__pc;}else{echo '';} ?>">
		    </div>
		<div  class="col-md-2 field-label-responsive d-none" id="label-region1"><strong> Region: </strong></div>
			<div class="col-md-3 d-none" id="region1" >
			  <input type="text" name="region"class="form-control " placeholder="Region"  value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Region__c;}else{echo '';} ?>" >
		    </div>
			
		
			<div class="col-md-3 d-none" id="region2" >

			    <Select type="text" id="region" name="region"class="form-control " placeholder="Region" >
                                                    <option value="" selected>Seleccione region</option>
                                                    <option value='Arica y Parinacota'>Arica y Parinacota</option>
													<option value='Tarapacá'>Tarapacá</option>
													<option value='Antofagasta'>Antofagasta</option>
													<option value='Atacama'>Atacama</option>
													<option value='Coquimbo'>Coquimbo</option>
													<option value='Valparaíso'>Valparaíso</option>
													<option value='Metropolitana'>Metropolitana</option>
													<option value='Libertador General Bernardo OHiggins'>Libertador General Bernardo OHiggins</option>
													<option value='Maule'>Maule</option>
													<option value='Bío Bío'>Bío Bío</option>
													<option value='La Araucanía'>La Araucanía</option>
													<option value='Los Ríos'>Los Ríos</option>
													<option value='Los Lagos'>Los Lagos</option>
													<option value='Aysén del General Carlos Ibáñez del Campo'>Aysén del General Carlos Ibáñez del Campo</option>
													<option value='Magallanes y la Antártica Chilena'>Magallanes y la Antártica Chilena</option>
                </select>				
			
		
		    

		    </div>					

        </div>

		<div class="form-group row">
		  <div  class="col-md-3 field-label-responsive"><strong>Direccion Numero </strong></div>
			<div class="col-md-3">
			  <input type="text" id="id_dir_num" name="dir_num" class="form-control" placeholder="Numero" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->dir_nro__pc;}else{echo '';} ?>">
		    </div>
	<div  class="col-md-2 field-label-responsive d-none"id="label-comuna"><strong> Comuna: </strong></div>
       	<div  class="col-md-2 field-label-responsive d-none"id="label-ciudad"><strong> Ciudad: </strong></div>
		<div class="col-md-3 d-none" id="comuna1">
		  <input type="text" id="id_comuna" name="comuna"class="form-control " placeholder="Comuna o Ciudad"  value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Comuna__c;}else{echo '';} ?>">
		  
		</div>
       
		<div class="col-md-3 d-none" id="comuna2">
		

			  <select type="text" id="id_comuna_alumno" name="comuna"class="form-control " placeholder="Comuna" >
			  <option value="" selected>Seleccione Comuna</option>
			  <option value='EL CARMEN'>EL CARMEN</option>
				<option value='EL MONTE'>EL MONTE</option>
				<option value='EL QUISCO'>EL QUISCO</option>
				<option value='EL TABO'>EL TABO</option>
				<option value='EMPEDRADO'>EMPEDRADO</option>
				<option value='ERCILLA'>ERCILLA</option>
				<option value='FLORIDA'>FLORIDA</option>
				<option value='FREIRE'>FREIRE</option>
				<option value='FREIRINA'>FREIRINA</option>
				<option value='FRESIA'>FRESIA</option>
				<option value='FRUTILLAR'>FRUTILLAR</option>
				<option value='FUTALEUFU'>FUTALEUFU</option>
				<option value='FUTRONO'>FUTRONO</option>
				<option value='GALVARINO'>GALVARINO</option>
				<option value='GENERAL LAGOS'>GENERAL LAGOS</option>
				<option value='GORBEA'>GORBEA</option>
				<option value='GRANEROS'>GRANEROS</option>
				<option value='GUAITECAS'>GUAITECAS</option>
				<option value='HIJUELAS'>HIJUELAS</option>
				<option value='HUALAIHUE'>HUALAIHUE</option>
				<option value='HUALAÑÉ'>HUALAÑÉ</option>
				<option value='HUALQUI'>HUALQUI</option>
				<option value='HUARA'>HUARA</option>
				<option value='HUASCO'>HUASCO</option>
				<option value='ILLAPEL'>ILLAPEL</option>
				<option value='IQUIQUE'>IQUIQUE</option>
				<option value='ISLA DE MAIPO'>ISLA DE MAIPO</option>
				<option value='ISLA DE PASCUA'>ISLA DE PASCUA</option>
				<option value='JUAN FERNANDEZ'>JUAN FERNANDEZ</option>
				<option value='LA CALERA'>LA CALERA</option>
				<option value='LA CRUZ'>LA CRUZ</option>
				<option value='LA ESTRELLA'>LA ESTRELLA</option>
				<option value='LA HIGUERA'>LA HIGUERA</option>
				<option value='LA LIGUA'>LA LIGUA</option>
				<option value='LA SERENA'>LA SERENA</option>
				<option value='LA UNION'>LA UNION</option>
				<option value='LAGO RANCO'>LAGO RANCO</option>
				<option value='LAGO VERDE'>LAGO VERDE</option>
				<option value='LAGUNA BLANCA'>LAGUNA BLANCA</option>
				<option value='LAJA'>LAJA</option>
				<option value='LAMPA'>LAMPA</option>
				<option value='LANCO'>LANCO</option>
				<option value='LAS CABRAS'>LAS CABRAS</option>
				<option value='LAUTARO'>LAUTARO</option>
				<option value='LEBU'>LEBU</option>
				<option value='LICANTEN'>LICANTEN</option>
				<option value='LIMACHE'>LIMACHE</option>
				<option value='LINARES'>LINARES</option>
				<option value='LITUECHE'>LITUECHE</option>
				<option value='LOLOL'>LOLOL</option>
				<option value='LONCOCHE'>LONCOCHE</option>
				<option value='LONGAVI'>LONGAVI</option>
				<option value='LONQUIMAY'>LONQUIMAY</option>
				<option value='LOS ALAMOS'>LOS ALAMOS</option>
				<option value='LOS ANDES'>LOS ANDES</option>
				<option value='LOS ANGELES'>LOS ANGELES</option>
				<option value='LOS LAGOS'>LOS LAGOS</option>
				<option value='LOS MUERMOS'>LOS MUERMOS</option>
				<option value='LOS SAUCES'>LOS SAUCES</option>
				<option value='LOS VILOS'>LOS VILOS</option>
				<option value='LOTA'>LOTA</option>
				<option value='LUMACO'>LUMACO</option>
				<option value='LLANQUIHUE'>LLANQUIHUE</option>
				<option value='LLAY LLAY'>LLAY LLAY</option>
				<option value='MACHALI'>MACHALI</option>
				<option value='MAFIL'>MAFIL</option>
				<option value='MALLOA'>MALLOA</option>
				<option value='MARCHIGUE'>MARCHIGUE</option>
				<option value='MARIA ELENA'>MARIA ELENA</option>
				<option value='MARIA PINTO'>MARIA PINTO</option>
				<option value='SAN JOSE DE MARIQUINA'>SAN JOSE DE MARIQUINA</option>
				<option value='MAULE'>MAULE</option>
				<option value='MAULLIN'>MAULLIN</option>
				<option value='MEJILLONES'>MEJILLONES</option>
				<option value='MELIPEUCO'>MELIPEUCO</option>
				<option value='MELIPILLA'>MELIPILLA</option>
				<option value='MOLINA'>MOLINA</option>
				<option value='MONTE PATRIA'>MONTE PATRIA</option>
				<option value='MOSTAZAL'>MOSTAZAL</option>
				<option value='MULCHEN'>MULCHEN</option>
				<option value='NACIMIENTO'>NACIMIENTO</option>
				<option value='NANCAGUA'>NANCAGUA</option>
				<option value='PUERTO NATALES'>PUERTO NATALES</option>
				<option value='CABO DE HORNOS (EX NAVARINO)'>CABO DE HORNOS (EX NAVARINO)</option>
				<option value='NAVIDAD'>NAVIDAD</option>
				<option value='NEGRETE'>NEGRETE</option>
				<option value='NINHUE'>NINHUE</option>
				<option value='NOGALES'>NOGALES</option>
				<option value='NUEVA IMPERIAL'>NUEVA IMPERIAL</option>
				<option value='ÑIQUEN'>ÑIQUEN</option>
				<option value='O'HIGGINS'>O'HIGGINS</option>
				<option value='OLIVAR'>OLIVAR</option>
				<option value='OLMUE'>OLMUE</option>
				<option value='OLLAGUE'>OLLAGUE</option>
				<option value='OSORNO'>OSORNO</option>
				<option value='OVALLE'>OVALLE</option>
				<option value='PAIHUANO'>PAIHUANO</option>
				<option value='PAILLACO'>PAILLACO</option>
				<option value='PAINE'>PAINE</option>
				<option value='PALENA'>PALENA</option>
				<option value='PALMILLA'>PALMILLA</option>
				<option value='PANGUIPULLI'>PANGUIPULLI</option>
				<option value='PANQUEHUE'>PANQUEHUE</option>
				<option value='PAPUDO'>PAPUDO</option>
				<option value='PAREDONES'>PAREDONES</option>
				<option value='PARRAL'>PARRAL</option>
				<option value='PELARCO'>PELARCO</option>
				<option value='PELLUHUE'>PELLUHUE</option>
				<option value='PEMUCO'>PEMUCO</option>
				<option value='PENCAHUE'>PENCAHUE</option>
				<option value='PENCO'>PENCO</option>
				<option value='PEÑAFLOR'>PEÑAFLOR</option>
				<option value='PERALILLO'>PERALILLO</option>
				<option value='PERQUENCO'>PERQUENCO</option>
				<option value='PETORCA'>PETORCA</option>
				<option value='PEUMO'>PEUMO</option>
				<option value='PICA'>PICA</option>
				<option value='PICHIDEGUA'>PICHIDEGUA</option>
				<option value='PICHILEMU'>PICHILEMU</option>
				<option value='PINTO'>PINTO</option>
				<option value='PIRQUE'>PIRQUE</option>
				<option value='PITRUFQUEN'>PITRUFQUEN</option>
				<option value='PLACILLA'>PLACILLA</option>
				<option value='PORTEZUELO'>PORTEZUELO</option>
				<option value='PORVENIR'>PORVENIR</option>
				<option value='POZO ALMONTE'>POZO ALMONTE</option>
				<option value='PRIMAVERA'>PRIMAVERA</option>
				<option value='PUCON'>PUCON</option>
				<option value='PUCHUNCAVI'>PUCHUNCAVI</option>
				<option value='PUERTO MONTT'>PUERTO MONTT</option>
				<option value='PUERTO OCTAY'>PUERTO OCTAY</option>
				<option value='PUERTO SAAVEDRA'>PUERTO SAAVEDRA</option>
				<option value='PUERTO VARAS'>PUERTO VARAS</option>
				<option value='PUMANQUE'>PUMANQUE</option>
				<option value='PUNITAQUI'>PUNITAQUI</option>
				<option value='PUNTA ARENAS'>PUNTA ARENAS</option>
				<option value='PUQUELDON'>PUQUELDON</option>
				<option value='PUREN'>PUREN</option>
				<option value='PURRANQUE'>PURRANQUE</option>
				<option value='PUTAENDO'>PUTAENDO</option>
				<option value='PUTRE'>PUTRE</option>
				<option value='PUYEHUE'>PUYEHUE</option>
				<option value='QUEILEN'>QUEILEN</option>
				<option value='QUELLON'>QUELLON</option>
				<option value='QUEMCHI'>QUEMCHI</option>
				<option value='QUILPUE'>QUILPUE</option>
				<option value='QUILACO'>QUILACO</option>
				<option value='QUILLON'>QUILLON</option>
				<option value='QUILLOTA'>QUILLOTA</option>
				<option value='QUINCHAO'>QUINCHAO</option>
				<option value='QUINTA DE TILCOCO'>QUINTA DE TILCOCO</option>
				<option value='QUINTERO'>QUINTERO</option>
				<option value='QUIRIHUE'>QUIRIHUE</option>
				<option value='RANCAGUA'>RANCAGUA</option>
				<option value='RANQUIL'>RANQUIL</option>
				<option value='RAUCO'>RAUCO</option>
				<option value='RENAICO'>RENAICO</option>
				<option value='CONCHALI'>CONCHALI</option>
				<option value='CERRO NAVIA'>CERRO NAVIA</option>
				<option value='CERRILLOS'>CERRILLOS</option>
				<option value='EL BOSQUE'>EL BOSQUE</option>
				<option value='ESTACION CENTRAL'>ESTACION CENTRAL</option>
				<option value='HUECHURABA'>HUECHURABA</option>
				<option value='INDEPENDENCIA'>INDEPENDENCIA</option>
				<option value='LAS CONDES'>LAS CONDES</option>
				<option value='LA CISTERNA'>LA CISTERNA</option>
				<option value='LO BARNECHEA'>LO BARNECHEA</option>
				<option value='LO ESPEJO'>LO ESPEJO</option>
				<option value='LA FLORIDA'>LA FLORIDA</option>
				<option value='LA GRANJA'>LA GRANJA</option>
				<option value='LO PRADO'>LO PRADO</option>
				<option value='LA PINTANA'>LA PINTANA</option>
				<option value='LA REINA'>LA REINA</option>
				<option value='MAIPU'>MAIPU</option>
				<option value='MACUL'>MACUL</option>
				<option value='ÑUÑOA'>ÑUÑOA</option>
				<option value='PROVIDENCIA'>PROVIDENCIA</option>
				<option value='PUENTE ALTO'>PUENTE ALTO</option>
				<option value='PEDRO AGUIRRE CERDA'>PEDRO AGUIRRE CERDA</option>
				<option value='PEÑALOLEN'>PEÑALOLEN</option>
				<option value='PUDAHUEL'>PUDAHUEL</option>
				<option value='QUILICURA'>QUILICURA</option>
				<option value='QUINTA NORMAL'>QUINTA NORMAL</option>
				<option value='RENCA'>RENCA</option>
				<option value='RECOLETA'>RECOLETA</option>
				<option value='SAN BERNARDO'>SAN BERNARDO</option>
				<option value='SAN JOAQUIN'>SAN JOAQUIN</option>
				<option value='SAN MIGUEL'>SAN MIGUEL</option>
				<option value='SAN RAMON'>SAN RAMON</option>
				<option value='SANTIAGO'>SANTIAGO</option>
				<option value='VITACURA'>VITACURA</option>
				<option value='SAN JOSE DE MAIPO'>SAN JOSE DE MAIPO</option>
				<option value='ALGARROBO'>ALGARROBO</option>
				<option value='ALHUE'>ALHUE</option>
				<option value='ALTO DEL CARMEN'>ALTO DEL CARMEN</option>
				<option value='ANCUD'>ANCUD</option>
				<option value='ANDACOLLO'>ANDACOLLO</option>
				<option value='ANGOL'>ANGOL</option>
				<option value='ANTOFAGASTA'>ANTOFAGASTA</option>
				<option value='ANTUCO'>ANTUCO</option>
				<option value='ARAUCO'>ARAUCO</option>
				<option value='ARICA'>ARICA</option>
				<option value='AYSEN'>AYSEN</option>
				<option value='BUIN'>BUIN</option>
				<option value='BULNES'>BULNES</option>
				<option value='CABILDO'>CABILDO</option>
				<option value='CABRERO'>CABRERO</option>
				<option value='CALAMA'>CALAMA</option>
				<option value='CALBUCO'>CALBUCO</option>
				<option value='CALDERA'>CALDERA</option>
				<option value='CATEMU'>CATEMU</option>
				<option value='CALERA DE TANGO'>CALERA DE TANGO</option>
				<option value='CALLE LARGA'>CALLE LARGA</option>
				<option value='CAMARONES'>CAMARONES</option>
				<option value='CAMIÑA'>CAMIÑA</option>
				<option value='CANELA O MINCHA'>CANELA O MINCHA</option>
				<option value='CAÑETE'>CAÑETE</option>
				<option value='CARAHUE'>CARAHUE</option>
				<option value='CARTAGENA'>CARTAGENA</option>
				<option value='CASABLANCA'>CASABLANCA</option>
				<option value='CASTRO'>CASTRO</option>
				<option value='CAUQUENES'>CAUQUENES</option>
				<option value='CISNES'>CISNES</option>
				<option value='COCHAMO'>COCHAMO</option>
				<option value='COCHRANE'>COCHRANE</option>
				<option value='CODEGUA'>CODEGUA</option>
				<option value='COELEMU'>COELEMU</option>
				<option value='COIHUECO'>COIHUECO</option>
				<option value='COINCO'>COINCO</option>
				<option value='COLBUN'>COLBUN</option>
				<option value='COLCHANE'>COLCHANE</option>
				<option value='COLINA'>COLINA</option>
				<option value='COLTAUCO'>COLTAUCO</option>
				<option value='COLLIPULLI'>COLLIPULLI</option>
				<option value='COMBARBALA'>COMBARBALA</option>
				<option value='CONCEPCION'>CONCEPCION</option>
				<option value='CONSTITUCION'>CONSTITUCION</option>
				<option value='CONTULMO'>CONTULMO</option>
				<option value='COPIAPO'>COPIAPO</option>
				<option value='COQUIMBO'>COQUIMBO</option>
				<option value='CORONEL'>CORONEL</option>
				<option value='CORRAL'>CORRAL</option>
				<option value='COYHAIQUE'>COYHAIQUE</option>
				<option value='CUNCO'>CUNCO</option>
				<option value='CURACAUTIN'>CURACAUTIN</option>
				<option value='CURACAVI'>CURACAVI</option>
				<option value='CURACO DE VELEZ'>CURACO DE VELEZ</option>
				<option value='CURANILAHUE'>CURANILAHUE</option>
				<option value='CURARREHUE'>CURARREHUE</option>
				<option value='CUREPTO'>CUREPTO</option>
				<option value='CURICO'>CURICO</option>
				<option value='CHAITEN'>CHAITEN</option>
				<option value='CHANCO'>CHANCO</option>
				<option value='CHAÑARAL'>CHAÑARAL</option>
				<option value='CHEPICA'>CHEPICA</option>
				<option value='CHILE CHICO'>CHILE CHICO</option>
				<option value='CHILLAN'>CHILLAN</option>
				<option value='CHIMBARONGO'>CHIMBARONGO</option>
				<option value='CHONCHI'>CHONCHI</option>
				<option value='DALCAHUE'>DALCAHUE</option>
				<option value='DIEGO DE ALMAGRO'>DIEGO DE ALMAGRO</option>
				<option value='DOÑIHUE'>DOÑIHUE</option>
				<option value='RENGO'>RENGO</option>
				<option value='REQUINOA'>REQUINOA</option>
				<option value='RETIRO'>RETIRO</option>
				<option value='RINCONADA'>RINCONADA</option>
				<option value='RIO BUENO'>RIO BUENO</option>
				<option value='RIO CLARO'>RIO CLARO</option>
				<option value='RIO HURTADO'>RIO HURTADO</option>
				<option value='RIO IBAQEZ'>RIO IBAQEZ</option>
				<option value='RIO NEGRO'>RIO NEGRO</option>
				<option value='RIO VERDE'>RIO VERDE</option>
				<option value='ROMERAL'>ROMERAL</option>
				<option value='SAGRADA FAMILIA'>SAGRADA FAMILIA</option>
				<option value='SALAMANCA'>SALAMANCA</option>
				<option value='SAN JAVIER'>SAN JAVIER</option>
				<option value='SAN ANTONIO'>SAN ANTONIO</option>
				<option value='SAN CARLOS'>SAN CARLOS</option>
				<option value='SAN CLEMENTE'>SAN CLEMENTE</option>
				<option value='SAN ESTEBAN'>SAN ESTEBAN</option>
				<option value='SAN FABIAN'>SAN FABIAN</option>
				<option value='SAN FELIPE'>SAN FELIPE</option>
				<option value='SAN FERNANDO'>SAN FERNANDO</option>
				<option value='SAN GREGORIO'>SAN GREGORIO</option>
				<option value='SAN IGNACIO'>SAN IGNACIO</option>
				<option value='SAN JUAN DE LA COSTA'>SAN JUAN DE LA COSTA</option>
				<option value='SAN NICOLAS'>SAN NICOLAS</option>
				<option value='SAN PABLO'>SAN PABLO</option>
				<option value='SAN PEDRO'>SAN PEDRO</option>
				<option value='SAN ROSENDO'>SAN ROSENDO</option>
				<option value='SAN VICENTE DE TAGUA TAGUA'>SAN VICENTE DE TAGUA TAGUA</option>
				<option value='SANTA CRUZ'>SANTA CRUZ</option>
				<option value='SANTA JUANA'>SANTA JUANA</option>
				<option value='SANTA MARIA'>SANTA MARIA</option>
				<option value='SANTO DOMINGO'>SANTO DOMINGO</option>
				<option value='SIERRA GORDA'>SIERRA GORDA</option>
				<option value='SN.PEDRO DE ATACAMA'>SN.PEDRO DE ATACAMA</option>
				<option value='TALAGANTE'>TALAGANTE</option>
				<option value='TALCA'>TALCA</option>
				<option value='TALCAHUANO'>TALCAHUANO</option>
				<option value='TENO'>TENO</option>
				<option value='TALTAL'>TALTAL</option>
				<option value='TEMUCO'>TEMUCO</option>
				<option value='TEODORO SCHMIDT'>TEODORO SCHMIDT</option>
				<option value='TIERRA AMARILLA'>TIERRA AMARILLA</option>
				<option value='TILTIL'>TILTIL</option>
				<option value='TIMAUKEL'>TIMAUKEL</option>
				<option value='TIRUA'>TIRUA</option>
				<option value='TOCOPILLA'>TOCOPILLA</option>
				<option value='TOLTEN'>TOLTEN</option>
				<option value='TOME'>TOME</option>
				<option value='TORRES DEL PAINE'>TORRES DEL PAINE</option>
				<option value='TORTEL'>TORTEL</option>
				<option value='TRAIGUEN'>TRAIGUEN</option>
				<option value='TREHUACO'>TREHUACO</option>
				<option value='TUCAPEL'>TUCAPEL</option>
				<option value='VALDIVIA'>VALDIVIA</option>
				<option value='VALPARAISO'>VALPARAISO</option>
				<option value='VALLENAR'>VALLENAR</option>
				<option value='VICTORIA'>VICTORIA</option>
				<option value='VICUÑA'>VICUÑA</option>
				<option value='VICHUQUEN'>VICHUQUEN</option>
				<option value='VILCUN'>VILCUN</option>
				<option value='VILLA ALEGRE'>VILLA ALEGRE</option>
				<option value='VILLA ALEMANA'>VILLA ALEMANA</option>
				<option value='VILLARRICA'>VILLARRICA</option>
				<option value='VIÑA DEL MAR'>VIÑA DEL MAR</option>
				<option value='YERBAS BUENAS'>YERBAS BUENAS</option>
				<option value='YUMBEL'>YUMBEL</option>
				<option value='YUNGAY'>YUNGAY</option>
				<option value='ZAPALLAR'>ZAPALLAR</option>
				<option value='COBQUECURA'>COBQUECURA</option>
				<option value='QUILLECO'>QUILLECO</option>
				<option value='SANTA BARBARA'>SANTA BARBARA</option>
				<option value='CHILOE'>CHILOE</option>
				<option value='CONCON'>CONCON</option>
				<option value='LLOLLEO'>LLOLLEO</option>
				<option value='PADRE HURTADO'>PADRE HURTADO</option>
				<option value='CHIGUAYANTE'>CHIGUAYANTE</option>
				<option value='MALLOCO'>MALLOCO</option>
				<option value='SAN RAFAEL'>SAN RAFAEL</option>
				<option value='SAN PEDRO DE LA PAZ'>SAN PEDRO DE LA PAZ</option>
				<option value='PADRE LAS CASAS'>PADRE LAS CASAS</option>
				<option value='ANTARTICA'>ANTARTICA</option>
				<option value='CHILLAN VIEJO'>CHILLAN VIEJO</option>
				<option value='ALTO BIOBIO'>ALTO BIOBIO</option>
				<option value='HUALPEN'>HUALPEN</option>
				<option value='ALTO HOSPICIO'>ALTO HOSPICIO</option>
				<option value='CHOLCHOL'>CHOLCHOL</option>
				<option value='EXTRANJERO'>EXTRANJERO</option>
			</select>

			</div>				
		
          
		
		</div>	

		
		
		<div class="form-group row">			
			<div  class="col-md-3 field-label-responsive"><strong> Direccion Depto: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="dir_depto"class="form-control" placeholder="Numero Depto" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->dir_depto__pc;}else{echo '';} ?>">
		    </div>	
<!--
		  <div  class="col-md-2 field-label-responsive"><strong> Empresa donde trabaja: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="empresa"class="form-control" placeholder="Trabajo" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Empresa__c;}else{echo '';} ?>" >
		    </div>	
-->			
        </div>			

		<div class="form-group row">			
			<div  class="col-md-3 field-label-responsive"><strong> Complemento Direccion: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="dir_complemento"class="form-control"  placeholder="etc" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Complemento_Direcci_n__pc;}else{echo '';} ?>">
		    </div>		
        </div>		
		
		
		<div class="form-group row">			
			<div  class="col-md-3 field-label-responsive"><strong> Email: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="email"class="form-control" placeholder="noreply@diplomadosuc.cl" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Correo_Electronico__c;}else{echo '';} ?>">
		    </div>
			<!--
			<div  class="col-md-2 field-label-responsive"><strong> Password: </strong></div>
			<div class="col-md-3">
			  <input type="password" name="pass"class="form-control" id="pass_1" placeholder="Password" value="">
		    </div>	
-->			
        </div>		

		<div class="form-group row">
		  <div  class="col-md-3 field-label-responsive"><strong> Celular: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="tel"class="form-control" placeholder="+569" value="<?php if($jsondecode->dataCta->fields->PersonMobilePhone){echo $jsondecode->dataCta->fields->PersonMobilePhone;}else{echo $jsondecode->dataCta->fields->Phone;} ?>">
		    </div>	
		<!--	
			<div  class="col-md-2 field-label-responsive"><strong> Re-Escribe tu Password: </strong></div>
			<div class="col-md-3">
			  <input type="password" name="pass2"class="form-control" id="pass_2" placeholder="Password" value="">
		    </div>	
		-->
        </div>	
      <hr>		
		<!--Datos Personales -->
	
		<!--Forma de Pago -->
		<div id="fpagoA"class="visible">		
		<div  class="form-group row" >
			<div  class="col-md-6 field-label-responsive"><strong>Forma de Pago:</strong><small  class="form-text text-muted"><p style="color:red;">(marque la opción que corresponda)</p></small></div>
            <div  class="col-md-12 field-label-responsive"><strong>Nota:La inscripción del alumno se hace efectiva una vez se documenta el valor total del Diplomado </strong></div>    
	   </div>		
          
       
<!-- Modal data-toggle="modal" -->
				<div class="modal fade" id="TranferenciaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Transferencia Bancaria Internacional (pago contado)</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
							<h6>Depositar en la cuenta de la Pontificia Universidad Católica  el monto a pagar en dólares indicado en “Monto a pagar en dólares”.</h6><br><br>
							<b>Datos de la cuenta</b><br><br>
								<table>
							<tr>
								<td><b>NOMBRE CUENTA:</b></td><td>PONTIFICIA UNIVERSIDAD CATOLICA DE CHILE	</td>
							</tr>
							<tr>
								<td><b>NOMBRE DEL BANCO:</b></td><td>CITIBANK </td>
							</tr>
							<tr>
								<td><b>DIRECCION:</b></td><td>111 WALL STREET NEW YORK, N.Y.		</td>
							</tr>
							<tr>
								<td><b>NUMERO DE CTA.CTE.:</b>	</td><td>36315872</td>
							</tr>
							<tr>
								<td><b>ABA:</b></td><td>021000089	</td>
							</tr>
							<tr>
								<td><b>SWITF:</b></td><td>CITIUS33</td>
							</tr>
							<tr>
								<td><b>CONTACTO:</b></td><td>Eduardo Calquin</td>
							</tr>
							<tr>
								<td><b>DIRECCION:</b></td><td>Avenida Libertador Bernardo O’Higgins 340 , Santiago - Chile</td>
							</tr>
							<tr>
								<td><b>FONO:</b></td><td>562-226862402 </td>
							</tr>
							<tr>
								<td><b>E-MAIL:</b></td><td>ecalquin@uc.cl </td>
							</tr>
							<tr>
								<td><b>MONEDA TRANSADA:</b></td><td>US$ DOLARES</td>
							</tr>
							</table><br></li>
								<li>Adicionalmente debe pagar la comisión por transferencias internacionales que aplica su banco según el convenio que Ud. posea (*).</li>
								<li>Escanear el comprobante de depósito.</li>
								</ol><br>
								<h6>(*): Es muy posible que al realizar el depósito bancario su banco le cobre una comisión por transferencia internacional, por tal motivo debe pagar este cobro al momento de hacer el depósito a nombre de la Pontificia Universidad Católica de Chile. Si Ud. descuenta este costo del monto a transferir quedará con un saldo a pagar en la siguiente cuota.</h6>

					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					
					  </div>
					</div>
				  </div>
				</div>
<!--Fin del Modal -->
<!-- Modal data-toggle="modal" -->
				<div class="modal fade" id="ModalCheque" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Cheque</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
                       Definir Texto
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					
					  </div>
					</div>
				  </div>
				</div>
<!--Fin del Modal -->
<!-- Modal data-toggle="modal" -->
				<div class="modal fade" id="OC/OTIC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Orden de Compra</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
                       Definir Texto
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					
					  </div>
					</div>
				  </div>
				</div>
<!--Fin del Modal -->		
<!-- Modal data-toggle="modal" -->
				<div class="modal fade" id="ModalCuponera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Cuponera</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
                       Definir Texto
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					
					  </div>
					</div>
				  </div>
				</div>
<!--Fin del Modal -->	
<!-- Modal data-toggle="modal" -->
				<div class="modal fade" id="ModalTC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tarjeta de Credito Presencial</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
                       Definir Texto
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					
					  </div>
					</div>
				  </div>
				</div>
<!--Fin del Modal -->	

<!-- Modal data-toggle="modal" -->
				<div class="modal fade" id="ModalWP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Web Pay Plus</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
                       Definir Texto
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					
					  </div>
					</div>
				  </div>
				</div>
<!--Fin del Modal -->	
		
<!-- Modal data-toggle="modal" -->
				<div class="modal fade" id="TranferenciaChile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Transferencia Bancaria/Deposito</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
							<b>Datos de la cuenta</b><br><br>
								<table>
							<tr>
								<td><b>NOMBRE CUENTA:</b></td><td>PONTIFICIA UNIVERSIDAD CATOLICA DE CHILE	</td>
							</tr>
							<tr>
								<td><b>NOMBRE DEL BANCO:</b></td><td>BANCO SANTANDER</td>
							</tr>
							<tr>
								<td><b>NUMERO DE CTA.CTE.:</b>	</td><td>080104190-8</td>
							</tr>
							<tr>
								<td><b>CONTACTO:</b></td><td><?php echo $jsondecode->ejec->name;?></td>
							</tr>
						    <tr>
								<td><b>EMAIL:</b></td><td><?php echo $jsondecode->ejec->email;?></td>
							</tr>					
							<tr>
								<td><b>DIRECCION:</b></td><td>Avenida Libertador Bernardo O’Higgins 340 , Santiago - Chile</td>
							</tr>
							<tr>
								<td><b>FONO:</b></td><td>+56 22 8400800 </td>
							</tr>
							</table><br>
								<h5>Adicionalmente debe escanear el comprobante del depósito y enviarlo a su ejecutiva.</h5>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					
					  </div>
					</div>
				  </div>
				</div>
<!--Fin del Modal -->	

<!-- select Medio de Pago-->
	<div id='mpagoChile' class="d">
	<select id="mpchile" name="mpago" class="selectpicker" data-max-options="2" multiple  data-width="auto" multiple data-selected-text-format="values" title="Favor de Seleccionar su Pago ...">
	  <option value="8">Transferencia Bancaria Internacional</option>
	  <option value="2">Cheque</option>
	  <option value="3">Orden de Compra</option>
	  <option value="4">Orden de Compra/OTIC</option>
	  <option value="5">Cuponera</option>
	  <option value="6">Tarjeta Bancaria</option>
	  <option value="7">WebPay</option>
	  <option value="1">Transferencia/Deposito</option>
	</select>
	</div>
<br>
	<div id='mpagoExt' class="d">
	<select  name="mpago" class="selectpicker" data-max-options="1" multiple  data-width="auto" title="Favor de Seleccionar su Pago ...">
	  <option value="8">Transferencia Bancaria Internacional</option>
	  <option value="5">Cuponera</option>
	</select>
	</div>
	
</div>
<br>		
		
       		
<hr>
<br>


	
	     	<!--Forma de Pago -->
		
		<br><br>
		<div class="border border-info col-md-8 mx-auto">
		<!--Seccion upload  -->
		<div  class="form-group row mx-auto">
			<div  class="col-md-10 field-label-responsive"><strong>Archivos a Subir:</strong><p style="color:red;">(Favor de subir sus antecedentes y/o Cheques en formato pdf,word o jpg. Maximo 5MB)</p></div>
        </div>

			<div  class="mx-auto">
			
				<div id="main">
				<input type="button" class="btn btn-primary"id="btAdd" value="Añadir Elemento" class="bt" />
				<input type="button" class="btn btn-secondary"id="btRemove" value="Eliminar Elemento" class="bt" />
				<input type="button" class="btn btn-danger"id="btRemoveAll" value="Eliminar Todo" class="bt" /><br />
				</div><br>	
				
                <div class="progress">
				  <div class="progress-bar" id="bar" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="percent">0%</div ></div>
				</div>
				<div id="status"></div>

			
			
	
		
	
			</div>
			 <p style="color:red;" class="error"><?php echo $error['error'];?></p>
			 

			<br>
			
			
		</div><br><br>
		<!--Fin upload-->
		
	   <div class="form-check form-check-inline">
	    <div class="form-check form-check-inline">
		  <input class="form-check-input" name="acepta" type="checkbox" id="inlineCheckbox3" name="acepta" value="1">
		  <label class="form-check-label" for="inlineCheckbox1">Acepto recibir información de Clase Ejecutiva</label>
		</div> 
	 </div>
   	 
	 <div class="form-group row">
		 <div class="col-md-6">
		 </div>
		 <div class="col-md-12">
		 <br><br>
		 </div>
		<div class="col-md-4">
		  <input type="submit" id="ok" class="btn btn-success btn-lg  btn-block" value="Enviar" />
		</div>
		 <div class="col-md-3">
		 <img src="/contents/imagenes/ajax-loader.gif" class="img-circle invisible" id="loader" />
		 </div>
      </div>	
  </form>
 

	<?php }?>

 

   </div>
 </div>
</body>
</html>