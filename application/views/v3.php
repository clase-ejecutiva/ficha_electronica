<?php
//error_reporting(E_ALL);
//error_reporting(0);
//ini_set('display_errors', '1');
//echo '<pre>';
//print_r($jsondecode);
//echo '</pre>';
?>
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
<!-- importo la libreria moments -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"></script>
<!-- importo todos los idiomas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment-with-locales.min.js"></script>


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
 <script src="/contents/js/v3.js" ></script> 
<link rel="stylesheet" href="/contents/css/ficha.css" ></script> 
 <script src="/contents/js/dropzone.js" ></script> 
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135109269-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135109269-1');
 // ga('create', 'UA-135109269-1', 'auto', 'seguimiento'); 
</script> 
<script type="text/javascript">
step='<?php echo $step['STEP'];?>';
mpagodolar='<?php echo $jsondecode->dataOp->fields->Extranjero__c;?>';
</script>
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
<div  class="container-fluid  border border-dark">
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
						<a href="/contents/imagenes/Educacion_Continua_de_la_Pontificia_Universidad_Catolica.pdf" download="Educacion_Continua_de_la_Pontificia_Universidad_Catolica.pdf">Reglamento del Alumno de Educacion Continua</a><br>
						<a href="/contents/imagenes/Reglamento_Clase_Ejecutiva_julio_2018.pdf" download="Reglamento_Clase_Ejecutiva_julio_2018.pdf">Reglamento Clase Ejecutiva</a><br>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					
					  </div>
					</div>
				  </div>
				</div>
			<!-- Modal -->	
			<!-- Modal 2 -->
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
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				   
				  </div>
				</div>
			  </div>
			</div>
				<!-- Modal 2 -->

		    <!-- Modal 3 -->
				<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="modalErrorlLabel"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body" id="body-modalError">
						
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					
					  </div>
					</div>
				  </div>
				</div>
				
				<input type="hidden" id="open-error" data-toggle="modal" data-target="#modalError">
			<!-- Modal 3 -->	
			
			
			
		    <!-- Modal 4 -->
				<div class="modal fade" id="modalReanudar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Existe un formulario Pre-llenado</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body" id="body-modalReanudar">
						
					  </div>
					  <div class="modal-footer">
					    <button type="button" id="reanudar_si" class="btn btn-success" value="true"  data-dismiss="modal">SI</button>
						<button type="button" id="reanudar_no" class="btn btn-danger"  value="false" data-dismiss="modal">NO</button>
					
					  </div>
					</div>
				  </div>
				</div>
				
				<input type="hidden" id="open-reanudar" data-toggle="modal" data-target="#modalReanudar">
			<!-- Modal 4 -->
			 
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

	</div>

		<?php echo $error;?>
<?php //echo '<pre>'; print_r(json_decode($_COOKIE['FichaCe']));echo '</pre>';?>

	<?php if($jsondecode->dataOp->fields->Ficha_electronica_Terminada__c!='false'){ ?>
	  <font size=4>Estimado/a:
	  <br><br>
	  Favor de contactarse con su ejecutiva:<b><?php echo $jsondecode->ejec->name;?></b> al Email: <b><?php echo $jsondecode->ejec->email;?></b>, <br>
	  si necesitas actualizar sus datos personales.<br><br>
	  Saluda Atte.<br>
	  Equipo de Admision Clase Ejecutiva.<br>
	 <a href=https://www.claseejecutiva.com>https://www.claseejecutiva.com</a></font>
	  <br>
	<?php } else{ ?>
	
		
 <!-- Container step_1 --> 		
<div class="container-fluid d" id="container_step_1">
     <hr>
	     <form id="step_1_form"accept-charset="utf-8" method="post">		
		 <input type="hidden" id="idOp_step_1" name="idOp" value="<?php echo $idOp; ?>" readonly>
		 <input type="hidden" name="f_inscripcion" value="<?php $date=date("d/m/Y");echo $date; ?>" readonly>
		 <input type="hidden" name="IdCuenta" value="<?php if($jsondecode){echo $jsondecode->dataOp->fields->AccountId;}else{echo '';} ?>" readonly>
		 <input type="hidden" name="ejecutivaName" value="<?php if($jsondecode){echo $jsondecode->ejec->name;}else{echo '';} ?>" readonly>
		 <input type="hidden" name="ejecutivaEmail" value="<?php if($jsondecode){echo $jsondecode->ejec->email;}else{echo '';} ?>" readonly>
		 <input type="hidden" name="ejecutivaIdOwner" value="<?php if($jsondecode){echo $jsondecode->ejec->id;}else{echo '';} ?>" readonly>
		 <input type="hidden" id="montoFinal" name="montoFinal" value="<?php if($jsondecode){echo $jsondecode->dataOp->fields->Monto_Final__c;}else{echo '';} ?>" readonly>	
		 <input type="hidden" id="id_productos" name="productos" value='<?php $productos=json_encode($jsondecode->productos); echo $productos;?>' readonly>	
			
  <div class="row">
  
    <div class="col-sm-3" >
	<!--Productos -->
	<div  class="card" >	


			<div class="form-group row">	
			<div  class="col-md-4 field-label-responsive">
			<p style="font-size:12px">Ejecutiva(o):</p>
			</div>
			
			<div  class="col-md-8 field-label-responsive">
			<b><p style="font-size:11px"><?php if($jsondecode){echo $jsondecode->ejec->name;}else{echo '';} ?></p></b>
			</div>
			
			<div  class="col-md-4 field-label-responsive">
			<p style="font-size:12px">Email:</p>
			</div>
			
			<div  class="col-md-8 field-label-responsive">
			<b><p style="font-size:11px"><?php if($jsondecode){echo $jsondecode->ejec->email;}else{echo '';} ?></p></b>
			</div>
			
			
           <div  class="col-md-12 field-label-responsive"><br>	</div>				
			<div  class="col-md-12 field-label-responsive" >
			<table class="table" class="table table-nonfluid">
				  <thead>
					<tr>
					  <th><font SIZE=2>Programas(s)de estudio:</font></th>
					  <th><font SIZE=2>Malla</font></th>

					</tr>
				  </thead>
				  <tbody >
			<?php
				foreach ($jsondecode->productos as $k){
					$pos=strpos($k->ProductCode,'C-');
					echo "<tr>";	
					if($pos!==false){
					echo "<td><font SIZE=2>".$k->Name."</font></td>";
					}else{
					echo "<td><font SIZE=2>".$k->Name."</font></td>";
					echo "<td>".'<button type="button"   class="btn btn-warning d "  onclick="malla_diplo('."'".$k->ProductCode."'".')" >Ver</button>'."</td>";
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
			
			<div  class="col-md-5 field-label-responsive">
			Fecha de Validez:
			</div>
			
			<div  class="col-md-7 field-label-responsive">
			<b><?php $date=date("d/m/Y");echo $date; ?></b>
			</div>						
	  
	        <div  class="col-md-12 field-label-responsive"><br>	</div>	
					
			<div  class="col-md-5 field-label-responsive">
			<strong> Arancel($): </strong>
            </div>			
					
			<div  class="col-md-7 field-label-responsive">
				<b><?php if($jsondecode->dataOp->fields->Extranjero__c==='true'){$monto = explode(' ',$jsondecode->dataOp->fields->Monto_Final__c); $value= str_replace('.','',$monto[1]); echo 'USD : '.round($value/$dolar_ce);}else{echo $jsondecode->dataOp->fields->Monto_Final__c;} ?></b>
			 </div> 
			 
			 
			 
		</div><!-- Form Class -->
	  
	</div><!--Card-->
<!--Productos -->	
    </div>
<!--Espacio para mobil -->		
<br>
<!--Espacio para mobil -->	

  <div  class="col-sm-9" >	
       <!--Datos Personales -->
   <div class="card" >
   
        <!-- navbar -->
			<ul class="nav nav-tabs nav-justified">
			  <li class="nav-item">
				<a class="nav-link active" href="#">Datos del Alumno</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Datos de Residencia</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Forma de Pago</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link " href="#">Adjuntar Documentos</a>
			  </li>
			</ul>
		<!-- /.navbar -->
          <br>
		<center>
			<div  class="col-md-6 field-label-responsive"><font size=3><strong>Datos del Alumno:</strong><p style="color:red;">(campos obligatorios)</p></font></div>
        </center>

		<div class="form-group row">
		
		 <div class="col-md-3 auto">
 
			<div class="progress">
			  <div class="progress-bar progress-bar-striped card" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
			  
			  </div>
			</div>
			   
		 </div>
		 <div class="col-md-9">	Paso 1 de 4</div>

		 <div class="col-md-12"><br></div>
		 
            <div  class="col-md-3 field-label-responsive"  id="txt_tipo_documento" ><strong> Tipo de Identificación: </strong></div>
			<div class="col-md-3"  id="div_tipo_documento">
				 <select type="text" name="tipo_documento" class="form-control" id="tipo_documento" placeholder="DNI O PASSAPORTE">
								  <option value="">Seleccionar</option>
								  <option value="Rut(1)">Cédula de Identidad</option>
								  <option value="DNI(2)">DNI</option>
								  <option value="Passaporte(3)">Pasaporte</option>
				</select>
			</div>		 
		 
		

			
            <div  class="col-md-2 field-label-responsive"><strong> Pais Documento de identidad </strong></div>
			<div class="col-md-3">
			  <Select type="text" name="pais_origen" id="id_pais_origen" class="form-control" placeholder="Pais"  >
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
		<div  class="col-md-3 field-label-responsive"><strong> Documento de identidad: </strong></div>
		<div class="col-md-3">
			  <input type="text" id="dni" name="dni"class="form-control" placeholder="Cédula de Identidad,DNI o RUT" size="20" maxlength="20" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->RUT__c;}else{echo '';} ?>" >
		</div>	
		
			<div  class="col-md-5"></div>
	
		
		</div>
	  
	  
	  
	  
	  
		<div class="form-group row"> 
			<div  class="col-md-3 field-label-responsive"><strong> Nombres: </strong></div>
			 <div class="col-md-3">
			  <input type="text" id="id_name" name="nombre"class="form-control" placeholder="Nombre" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->FirstName;}else{echo '';} ?>">
			 </div>
		  <div  class="col-md-2 field-label-responsive"><strong> Género: </strong></div>
			<div class="col-md-3">
			   <Select type="text" name="genero" id="genero" class="form-control" placeholder="Genero"  >
			     <option value="" selected>Seleccionar</option>
                 <option value='M(2)'>Masculino</option>
                 <option value='F(1)'>Femenino</option>
			   </Select>
		    </div>
        </div>
		
		
		<div class="form-group row">

		
		    <div  class="col-md-3 field-label-responsive"><strong> Apellido Paterno: </strong></div>
			 <div class="col-md-3">
			  <input type="text" id="id_apeP" name="apellidoPaterno"class="form-control" placeholder="Apellidos" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->LastName;}else{echo '';} ?>">
			 </div>
		

		  <div  class="col-md-2 field-label-responsive"><strong>Fecha de Nacimiento: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="f_nacimiento"class="form-control" id="f_nacimiento" value="<?php if($jsondecode){echo date('d/m/Y',strtotime($jsondecode->dataCta->fields->PersonBirthdate));}else{echo '';} ?>" >
		    </div>			 
        </div>		
	

		
		<div class="form-group row">
		 <div  class="col-md-3 field-label-responsive"><strong> Apellido Materno: </strong></div>
			 <div class="col-md-3">
			  <input type="text" id="id_apeM" name="apellidoMaterno"class="form-control" placeholder="Apellido Materno" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Apellido_Materno__c;}else{echo '';} ?>">
			 </div>	






		

			
			<div  class="col-md-2 field-label-responsive"><strong> Estado Civil: </strong></div>
			<div class="col-md-3">
			   <Select type="text" name="estado_civil" id="estado_civil" class="form-control" placeholder="estado_civil"  >
			     <option value="" selected>Seleccionar</option>
                 <option value='Acuerdo de Unión Civil(U)'>Acuerdo de Unión Civil</option>
                 <option value='Casado(C)'>Casado/a</option>
                 <option value='Divorciado(D)'>Divorciado/a</option>
                 <option value='Soltero(S)'>Soltero/a</option>
                 <option value='Viudo(V)'>Viudo/a</option>
			   </Select>
		    </div>	
			
        </div>	
		
        <div class="form-group row">			
			<div  class="col-md-3 field-label-responsive"><strong> Email: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="email"class="form-control" placeholder="noreply@diplomadosuc.cl" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Correo_Electronico__c;}else{echo '';} ?>">
		    </div>
		  <div  class="col-md-2 field-label-responsive"><strong> Teléfono/Celular: </strong></div>
			<div class="col-md-3">
			  <input type="number" name="tel"class="form-control" placeholder="+569" value="<?php if($jsondecode->dataCta->fields->PersonMobilePhone){echo $jsondecode->dataCta->fields->PersonMobilePhone;}else{echo $jsondecode->dataCta->fields->Phone;} ?>">
		    </div>			
        </div>			
		
		
		<div class="form-group row">
		<div class="col-md-8"></div>
		<div class="col-md-3">
		<button type="submit" id="step_1_sgte"class="btn btn-success btn-lg btn-block" onclick="gtag('event', 'guardar', {'event_category': 'STEP_1','event_label':'<?php echo $idOp; ?>','value':'1' });" >Siguiente</button>
		</div>
		</div>

</div>
</form>

</div>


    </div> <!-- row -->
 </div> 

 <!-- Container step_1 --> 

 
<!-- Container step_2 -->  	
<div class="container-fluid d-none" id="container_step_2">
     <hr>
	     <form id="step_2_form"accept-charset="utf-8" enctype="multipart/formdata" method="post">		
		 <input type="hidden" id="idOp_step_2" name="idOp" value="<?php echo $idOp; ?>" readonly>
		 <input type="hidden" name="f_inscripcion" value="<?php $date=date("d/m/Y");echo $date; ?>" readonly>
		 <input type="hidden" name="IdCuenta" value="<?php if($jsondecode){echo $jsondecode->dataOp->fields->AccountId;}else{echo '';} ?>" readonly>
		 <input type="hidden" name="ejecutivaName" value="<?php if($jsondecode){echo $jsondecode->ejec->name;}else{echo '';} ?>" readonly>
		 <input type="hidden" name="ejecutivaEmail" value="<?php if($jsondecode){echo $jsondecode->ejec->email;}else{echo '';} ?>" readonly>
		 <input type="hidden" id="montoFinal" name="montoFinal" value="<?php if($jsondecode){echo $jsondecode->dataOp->fields->Monto_Final__c;}else{echo '';} ?>" readonly>	 
  <div class="row">
  
    <div class="col-sm-3" >
	<!--Productos -->
	<div  class="card" >	


			<div class="form-group row">	
			<div  class="col-md-4 field-label-responsive">
			<p style="font-size:12px">Ejecutiva(o):</p>
			</div>
			
			<div  class="col-md-8 field-label-responsive">
			<b><p style="font-size:11px"><?php if($jsondecode){echo $jsondecode->ejec->name;}else{echo '';} ?></p></b>
			</div>
			
			<div  class="col-md-4 field-label-responsive">
			<p style="font-size:12px">Email:</p>
			</div>
			
			<div  class="col-md-8 field-label-responsive">
			<b><p style="font-size:11px"><?php if($jsondecode){echo $jsondecode->ejec->email;}else{echo '';} ?></p></b>
			</div>
           <div  class="col-md-12 field-label-responsive"><br>	</div>				
			<div  class="col-md-12 field-label-responsive" >
			<table class="table" class="table table-nonfluid">
				  <thead>
					<tr>
					  <th><font SIZE=2>Programas(s)de estudio:</font></th>
					  <th><font SIZE=2>Malla</font></th>

					</tr>
				  </thead>
				  <tbody >
			<?php
				foreach ($jsondecode->productos as $k){
					$pos=strpos($k->ProductCode,'C-');
					echo "<tr>";	
					if($pos!==false){
					echo "<td><font SIZE=2>".$k->Name."</font></td>";
					}else{
					echo "<td><font SIZE=2>".$k->Name."</font></td>";
					echo "<td>".'<button type="button"   class="btn btn-warning d "  onclick="malla_diplo('."'".$k->ProductCode."'".')" >Ver</button>'."</td>";
					echo "</tr>";
					}
					//data-toggle="modal" data-target="#ModalMalla"
				}
			?>
				  </tbody>
				</table>
		  </div>

			<button  type="button" class="d-none" data-toggle="modal" data-target="#ModalMalla" id="open">aqui </button>

			<div  class="col-md-5 field-label-responsive">
			Fecha de Validez:
			</div>
			
			<div  class="col-md-7 field-label-responsive">
			<b><?php $date=date("d/m/Y");echo $date; ?></b>
			</div>						
	  
	        <div  class="col-md-12 field-label-responsive"><br>	</div>	
					
			<div  class="col-md-5 field-label-responsive">
			<strong> Arancel($): </strong>
            </div>			
					
			<div  class="col-md-7 field-label-responsive">
							<b><?php if($jsondecode->dataOp->fields->Extranjero__c==='true'){$monto = explode(' ',$jsondecode->dataOp->fields->Monto_Final__c); $value= str_replace('.','',$monto[1]); echo 'USD : '.round($value/$dolar_ce);}else{echo $jsondecode->dataOp->fields->Monto_Final__c;} ?></b>
			 </div> 
			 
			 
			 
		</div><!-- Form Class -->
	  
	</div><!--Card-->
<!--Productos -->	
    </div>
<!--Espacio para mobil -->		
<br>
<!--Espacio para mobil -->

  <div  class="col-sm-9" >	
       <!--Datos Personales -->
   <div class="card">
        <!-- navbar -->
			<ul class="nav nav-tabs nav-justified">
			  <li class="nav-item">
				<a class="nav-link" href="#">Datos del Alumno</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link active" href="#">Datos de Residencia</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Forma de Pago</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link " href="#">Adjuntar Documentos</a>
			  </li>
			</ul>
		<!-- /.navbar -->
          <br>
		<center>
			<div  class="col-md-6 field-label-responsive"><font size=3><strong>Datos de Residencia:</strong><p style="color:red;">(campos obligatorios)</p></font></div>
        </center>

		<div class="form-group row">
		
		 <div class="col-md-3">	
			<div class="progress">
			  <div class="progress-bar progress-bar-striped card" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
			  
			  </div>
			</div>
			   
		 </div>
		 <div class="col-md-9">	Paso 2 de 4</div>

		 <div class="col-md-12"><br></div>
		 
            <div  class="col-md-3 field-label-responsive"   ><strong> País de Residencia: </strong></div>
			<div class="col-md-3"  >
			  <Select type="text" name="pais_residencia" id="id_pais_residencia" class="form-control" placeholder="Pais"  >
                        <option value="" selected>Seleccione país</option>
                        <option value='Chile(PS-38)'>Chile </option>
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
		 
		

			
            <div  class="col-md-2 field-label-responsive"><strong> Región: </strong></div>
			<div class="col-md-3">
			
		  <input type="text" id="id_region_extrangera" name="region_extrangera" class="form-control d-none" placeholder="ETC" value="">	
					    <Select type="text" id="id_region_residencia" name="region_residencia" class="form-control " placeholder="Region" >
                                                    <option value="" selected>Seleccione region</option>
		                                            <option value='Arica y Parinacota(RG-15)'>Arica y Parinacota</option>
													<option value='Tarapacá(RG-1)'>Tarapacá</option>
													<option value='Antofagasta(RG-2)'>Antofagasta</option>
													<option value='Atacama(RG-3)'>Atacama</option>
													<option value='Coquimbo(RG-4)'>Coquimbo</option>
													<option value='Valparaíso(RG-5)'>Valparaíso</option>
													<option value='Metropolitana(RG-13)'>Metropolitana</option>
													<option value='Libertador General Bernardo OHiggins(RG-6)'>Libertador General Bernardo OHiggins</option>
													<option value='Maule(RG-7)'>Maule</option>
													<option value='Bío-Bío(RG-8)'>Bío Bío</option>
													<option value='La Araucanía(RG-9)'>La Araucanía</option>
													<option value='Los Lagos(RG-10)'>Los Lagos</option>													
													<option value='Aysén del General Carlos Ibáñez del Campo(RG-11)'>Aysén del General Carlos Ibáñez del Campo</option>
													<option value='Magallanes y la Antártica Chilena(RG-12)'>Magallanes y la Antártica Chilena</option>	
                        </select>		
       <!--
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
													
   
	   -->
						
          </div>
	  </div>
	  
	<div class="form-group row">
		<div  class="col-md-3 field-label-responsive"  ><strong id="id_titulo_comuna_alumno"> Comuna: </strong></div>
			<div class="col-md-3">
			<input type="text" id="id_input_ciudad_extranjera"  name="ciudad_extranjera"class="form-control d-none"  placeholder="" value="">
			
			 <select type="text" id="id_comuna_alumno" name="comuna_residencia"class="form-control d" placeholder="Comuna" >
			  <option value="" selected>Seleccione Comuna</option>

			</select> 
		    </div>
	
	</div>	  

		<div class="form-group row">
		  <div  class="col-md-3 field-label-responsive"><strong> Dirección : </strong></div>
			<div class="col-md-3">
			  <input type="text" id="id_dir" name="dir" class="form-control" placeholder="Domicilio particular" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Complemento_Direcci_n__pc;}else{echo '';} ?>">
		    </div>		
		  <div  class="col-md-2 field-label-responsive"><strong>Numero </strong></div>
			<div class="col-md-3">
			  <input type="text" id="id_dir_num" name="dir_num" class="form-control" placeholder="Numero" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->dir_nro__pc;}else{echo '';} ?>">
		    </div>				
		</div>		  

      <div class="form-group row">
			<div  class="col-md-3 field-label-responsive"><strong> Numero Depto: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="dir_depto"class="form-control" placeholder="Numero Depto" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->dir_depto__pc;}else{echo '';} ?>">
		    </div>	

			<div  class="col-md-2 field-label-responsive"><strong> Complemento Dirección: </strong></div>
			<div class="col-md-3">
			  <input type="text" name="dir_complemento"class="form-control"  placeholder="etc" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->Complemento_Direcci_n__pc;}else{echo '';} ?>">
		    </div>
		
        </div>		



	
		
		<div class="form-group row">
		
		<div class="col-md-6 "></div>
		<div class="col-md-3 ">
		<button type="button" id="back"class="btn btn-primary btn-lg btn-block" onClick="back_step(1);">Atrás</button>
		</div>
		
		<div class="col-md-3">
		<button type="submit" id="step_2_sgte"  onclick="gtag('event', 'guardar', {'event_category': 'STEP_2','event_label':'<?php echo $idOp; ?>','value':'1' });"  class="btn btn-success btn-lg btn-block" >Siguiente</button>
		</div>
		</div>

</div>
</form>

</div>


    </div> <!-- row -->
 </div> 

<!-- Container step_2 -->  

 
<!-- Container step_3 --> 		
<div class="container-fluid d-none" id="container_step_3">
     <hr>
	     <form id="step_3_form"accept-charset="utf-8" method="post">		
		 <input type="hidden" name="idOp" id="idOp_step_3" value="<?php echo $idOp; ?>" readonly>
		 <input type="hidden" name="f_inscripcion" value="<?php $date=date("d/m/Y");echo $date; ?>" readonly>
		 <input type="hidden" name="IdCuenta" value="<?php if($jsondecode){echo $jsondecode->dataOp->fields->AccountId;}else{echo '';} ?>" readonly>
		 <input type="hidden" name="nombre_alumno" id="id_nombre_alumno" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->FirstName;}else{echo '';} ?>" readonly>
		 <input type="hidden" name="apellidoPaterno_alumno" id="id_apellidoPaterno_alumno" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->LastName;}else{echo '';} ?>" readonly>
		 <input type="hidden" name="dni_alumno" id="id_dni_alumno" value="<?php if($jsondecode){echo $jsondecode->dataCta->fields->RUT__c;}else{echo '';} ?>" readonly>
		 <input type="hidden" name="montoFinal" id="montoFinal_step_3" value="<?php if($jsondecode){$monto = explode(' ',$jsondecode->dataOp->fields->Monto_Final__c); $value= str_replace('.','',$monto[1]); echo $value; }else{echo '';} ?>" readonly>	
		 <input type="hidden" name="montoFinalusd" id="montoFinalUSD_step_3" value="<?php if($jsondecode){$monto = explode(' ',$jsondecode->dataOp->fields->Monto_Final__c); $value= str_replace('.','',$monto[1]); echo round($value/$dolar_ce); }else{echo '';} ?>" readonly>	
		 <input type="hidden" name="Cuotas_Cuponera" id="id_Cuotas_Cuponera" value="<?php if($jsondecode){echo $jsondecode->dataOp->fields->Cuotas_Cuponera__c;  }else{echo '';} ?>" readonly>	
		 <input type="hidden" name="Fecha_cuota_1" id="id_Fecha_cuota_1" value="<?php if($jsondecode){echo $jsondecode->dataOp->fields->Fecha_cuota_1__c;  }else{echo '';} ?>" readonly>	
		 <input type="hidden" name="Fecha_cuota_2" id="id_Fecha_cuota_2" value="<?php if($jsondecode){echo $jsondecode->dataOp->fields->Fecha_cuota_2__c;  }else{echo '';} ?>" readonly>	
        

		<input type="hidden" name="mpago" id="mpagoOtra" value="mpagoOtra">		
		<div class="row">
		  
		  <div class="col-sm-3" >
			<!--Productos -->
			<div  class="card" >	


				<div class="form-group row">	
			<div  class="col-md-4 field-label-responsive">
			<p style="font-size:12px">Ejecutiva(o):</p>
			</div>
			
			<div  class="col-md-8 field-label-responsive">
			<b><p style="font-size:11px"><?php if($jsondecode){echo $jsondecode->ejec->name;}else{echo '';} ?></p></b>
			</div>
			
			<div  class="col-md-4 field-label-responsive">
			<p style="font-size:12px">Email:</p>
			</div>
			
			<div  class="col-md-8 field-label-responsive">
			<b><p style="font-size:11px"><?php if($jsondecode){echo $jsondecode->ejec->email;}else{echo '';} ?></p></b>
			</div>
					
				   <div  class="col-md-12 field-label-responsive"><br>	</div>				
					<div  class="col-md-12 field-label-responsive" >
					<table class="table" class="table table-nonfluid">
						  <thead>
							<tr>
							  <th><font SIZE=2>Programas(s)de estudio:</font></th>
							  <th><font SIZE=2>Malla</font></th>

							</tr>
						  </thead>
						  <tbody >
					<?php
						foreach ($jsondecode->productos as $k){
							$pos=strpos($k->ProductCode,'C-');
							echo "<tr>";	
							if($pos!==false){
							echo "<td><font SIZE=2>".$k->Name."</font></td>";
							}else{
							echo "<td><font SIZE=2>".$k->Name."</font></td>";
							echo "<td>".'<button type="button"   class="btn btn-warning d "  onclick="malla_diplo('."'".$k->ProductCode."'".')" >Ver</button>'."</td>";
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

					<div  class="col-md-5 field-label-responsive">
					Fecha de Validez:
					</div>
					
					<div  class="col-md-7 field-label-responsive">
					<b><?php $date=date("d/m/Y");echo $date; ?></b>
					</div>						
			  
					<div  class="col-md-12 field-label-responsive"><br>	</div>	
							
					<div  class="col-md-5 field-label-responsive">
					<strong> Arancel($): </strong>
					</div>			
							
					<div  class="col-md-7 field-label-responsive">
						<b><?php if($jsondecode->dataOp->fields->Extranjero__c==='true'){$monto = explode(' ',$jsondecode->dataOp->fields->Monto_Final__c); $value= str_replace('.','',$monto[1]); echo 'USD : '.round($value/$dolar_ce);}else{echo $jsondecode->dataOp->fields->Monto_Final__c;} ?></b>
					 </div> 
					 
					 
					 
				</div><!-- Form Class -->
			  
			</div><!--Card-->
		<!--Productos -->	
			</div>
		<!--Espacio para mobil -->		
		<br>
		<!--Espacio para mobil -->

		  <div  class="col-sm-9" >	
			   <!--Datos Personales -->
		   <div class="card">
				<!-- navbar -->
					<ul class="nav nav-tabs nav-justified">
					  <li class="nav-item">
						<a class="nav-link " href="#">Datos del Alumno</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#">Datos de Residencia</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link active" href="#">Forma de Pago</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link " href="#">Adjuntar Documentos</a>
					  </li>
					</ul>
				<!-- /.navbar -->
				  <br>
				<center>
					<div id="titulo_mpago" class="col-md-6 field-label-responsive"><font size=3><strong>Cómo pagará el arancel de su matricula?</p></font></div>
				</center>

				<div class="form-group row">
				
				 <div class="col-md-3">	
					<div class="progress">
					  <div class="progress-bar progress-bar-striped card" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
					  
					  </div>
					</div>
					   
				 </div>
				 <div class="col-md-9">	Paso 3 de 4</div>

				 <div class="col-md-12"><br></div>
				 
				</div>
				
				<?php 
				/*
				$pais_step2 = "<script> document.write(pais_step2) </script>";
				echo $form2->pais_residencia;echo '<br>';
				echo $pais_step2;
				if($form2->pais_residencia==='Chile(PS-38)' or $pais_step2==='Chile(PS-38)') 
				{
					*/
					?>
				<!-- mpago_step_1 -->
				<div id="mpago_step_1" class="d-none">
				
				<div class="form-group row">
					<div class="col-md-2"><br></div>
						<div class="col-md-10">
						<input type="radio" name="mpago" id="mpagoCheque" value="mpagoCheque">
						<?php if($jsondecode){echo 'Pagaré el total '.$jsondecode->dataOp->fields->Monto_Final__c.',con cheques propios';}else{echo '';}?>
						</div>	
				</div>
				<div class="form-group row">
					<div class="col-md-2"><br></div>
						<div class="col-md-10">
						<input type="radio" name="mpago" id="mpagoWebpay" value="mpagoWebpay">
						<?php if($jsondecode){echo 'Pagaré el total '.$jsondecode->dataOp->fields->Monto_Final__c.',con botón de pago Webpay';}else{echo '';}?>
						</div>	
				</div>	
				<div class="form-group row">
					<div class="col-md-2"><br></div>
						<div class="col-md-10">
						<input type="radio" name="mpago" id="mpagoOC" value="mpagoOC">
						<?php if($jsondecode){echo 'Pagaré el total '.$jsondecode->dataOp->fields->Monto_Final__c.',con Orden de Compra';}else{echo '';}?>
						</div>	
				</div>			
				<div class="form-group row">
					<div class="col-md-2"><br></div>
						<div class="col-md-10">
						<input type="radio" name="mpago" id="mpagoOtra" value="mpagoOtra">
						<?php if($jsondecode){echo 'Pagaré el total '.$jsondecode->dataOp->fields->Monto_Final__c.',de otra forma';}else{echo '';}?>
						</div>	
				</div>			
						
				</div>
				<!-- mpago_step_1 -->
				<?php  ?>
				
				
				<!-- mpago_step_1_extranjero -->
				<div id="mpago_step_1_extranjero" class="d">
				
				<div class="form-group row">
					<div class="col-md-2"><br></div>
						<div class="col-md-10">
						<input type="radio" name="mpago" id="mpagoTranferencia" value="mpagoTranferencia">
						<?php if($jsondecode){$monto=explode(' ',$jsondecode->dataOp->fields->Monto_Final__c);$valor=str_replace('.','',$monto[1]);echo 'Pagaré el total USD:'.round($valor/$dolar_ce).' con Transferencia Internacional';}else{echo '';}?>
						</div>	
				</div>
				<div class="form-group row">
					<div class="col-md-2"><br></div>
						<div class="col-md-10">
						<input type="radio" name="mpago" id="mpagoCuponera" value="mpagoCuponera">
						<?php if($jsondecode){$monto=explode(' ',$jsondecode->dataOp->fields->Monto_Final__c);$valor=str_replace('.','',$monto[1]);echo 'Pagaré el total USD '.round($valor/$dolar_ce).'con Cuponera(Pago en Cuotas)';}else{echo '';}?>
						</div>	
				</div>					
				
				
				</div>
			    <!-- mpago_step_1_extranjero -->
				<?php //} ?>
				<!-- mpago_cheque -->
				<div id="mpago_cheque" class="d-none"></div>
				
				<!-- mpago_cheque -->
				
				<!-- mpagoWebpay -->
				<div id="mpago_webpay" class="d-none"></div>
				<!-- mpagoWebpay -->
				
				
				
				<!-- mpagoOrden_de_Compra -->
				<div id="mpago_oc" class="d-none">
				
				

				
				
				
				
				<div  class="col-md-4 field-label-responsive"><strong> <u>Informacion de Pagadores </u></strong></div>
				<div  class="col-md-8 field-label-responsive"></div>
				<div  class="col-md-12 field-label-responsive"><br></div>
				
				<div  class="col-md-8 field-label-responsive"><strong> <u id="id_layout_titulo_oc">Orden de Compra : <?php if($jsondecode){echo $jsondecode->dataOp->fields->Monto_Final__c;}else{echo '';}?></u></strong></div>
				<div  class="col-md-8 field-label-responsive"></div>
				<div  class="col-md-12 field-label-responsive"><br></div>
				<div class="form-group row">
				
				</div>
				
					<div class="form-group row">
						<div  class="col-md-2 field-label-responsive"><strong> Rut Empresa OC: </strong>
						</div>
						
						<div class="col-md-4">
						<input type="text" id="rut_oc" name="rut_oc"class="form-control" placeholder="Cédula de Identidad,DNI o RUT" size="20" maxlength="20" value="" >
						</div>	
						
						<div  class="col-md-2 field-label-responsive"><strong> Razón Social: </strong>
						</div>
						
						<div class="col-md-4">
						<input type="text" id="id_razon_social" name="razon_social"class="form-control"  size="200" maxlength="200" value="" >
						</div>			 
					</div>
					
					
					<div class="form-group row">
						<div  class="col-md-2 field-label-responsive"><strong> Dirección: </strong>
						</div>
						
						<div class="col-md-10">
						<input type="text" id="id_dir_emp" name="dir_emp"class="form-control"  size="200" maxlength="200" value=""  >
						</div>	
					</div>
					
					
					<div class="form-group row">
						<div  class="col-md-2 field-label-responsive"><strong> Comuna: </strong>
						</div>
						
						<div class="col-md-4">
						<input type="text" id="id_comuna_emp" name="comuna_emp"class="form-control"  value="" >
						</div>	
						
						<div  class="col-md-2 field-label-responsive"><strong> Telefono: </strong>
						</div>
						
						<div class="col-md-4">
						<input type="number" id="id_telefono_emp" name="telefono_emp"class="form-control"   value="" >
						</div>			 
					</div>
					
					<div class="form-group row">
						<div  class="col-md-2 field-label-responsive"><strong> Nombre Encargado: </strong>
						</div>
						
						<div class="col-md-4">
						<input type="text" id="id_atencion_emp" name="atencion_emp"class="form-control"  value="" >
						</div>	
						
						<div  class="col-md-2 field-label-responsive"><strong> Mail de Encargado: </strong>
						</div>
						
						<div class="col-md-4">
						<input type="email" id="id_mail_contacto_emp" name="mail_contacto_emp"class="form-control"  size="200" maxlength="200" value="" >
						</div>			 
					</div>
					
					<div class="form-group row">
						<div  class="col-md-2 field-label-responsive"><strong> NRO OC: </strong>
						</div>
						
						<div class="col-md-4">
						<input type="text" id="id_nro_oc" name="nro_oc"class="form-control"  value="" >
						</div>	
						
						<div  class="col-md-2 field-label-responsive"><strong> Telefono  Encargado: </strong>
						</div>
						
						<div class="col-md-4">
						<input type="number" id="id_telefono_encargado" name="telefono_encargado"class="form-control"   value="" >
						</div>			 
					</div>					


					<div class="form-group row">
						<div  class="col-md-2 field-label-responsive"><strong> Total OC: </strong>
						</div>
						
						<div class="col-md-4">
						<input type="text" id="id_total_oc" name="total_oc" class="form-control"  value="" >
						</div>	
						
						<div  class="col-md-4 field-label-responsive">
						<button type="submit" id="step_OC_4_agregar"class="btn btn-info btn-lg btn-block" >Ingresar Datos</button>
						</div>
						
						<div class="col-md-2">
						
						</div>			 
					</div>						
					 
					<div class="form-group row"><div class="col-md-12"><br></div></div> 
					
					
					<div class="form-group row"  id="id_table_oc"></div> 
					<div class="form-group row"  id="id_table_oc_unica"></div> 
					
					<div class="form-group row"><div class="col-md-12"><br></div></div> 
					<div class="form-group row " id="boton_fin_mpago_oc">
						<div class="col-md-5"></div>
						
						<div class="col-md-3 ">
						<button type="button" id="back"class="btn btn-primary btn-lg btn-block" onClick="back_step(5);">Atrás</button>
						</div>
						<div class="col-md-3">
						<button type="button" id="step_OC_4"  onclick="gtag('event', 'guardar', {'event_category': 'STEP_3_OC','event_label':'<?php echo $idOp; ?>','value':'1' });"class="btn btn-success btn-lg btn-block" >Siguiente</button>
						</div>
					</div>
																	
				</div>
				
				<!-- mpagoOrden_de_Compra -->
				
				
				
				<!-- mpagoOtra -->
				<div id="mpagoOtraLayout" class="d-none">

				<div class="form-group row">
				<div  class="col-md-4 field-label-responsive"><strong> <u>Seleccionar Medios de Pago a utilizar: </u></strong></div>
				<div  class="col-md-8 field-label-responsive"></div>
				<div  class="col-md-12 field-label-responsive"><br></div>
				</div>
				
				
				<div class="form-group row d-none" >
				<div  class="col-md-1 field-label-responsive"><br>	</div>
				<div  class="col-md-1 field-label-responsive">		
				<input class="form-check-input" name="check_mpago" type="checkbox" id="id_check_ch_propios" value="1">
				</div>
				
				
				<div  class="col-md-3 field-label-responsive">Cheques Propios	</div>
				
				<div  class="col-md-2 field-label-responsive">Total Cheques</div>
				<div  class="col-md-3 field-label-responsive">
				<input type="text" id="id_total_cheque" onkeyup="format(this)" name="total_cheque" class="form-control"  value="" readonly >
				<input type="hidden" id="id_total_cheque_f" name="total_cheque_f" class="form-control"  value="" readonly >
				</div>
				
				</div>
				
				
								
				<div class="form-group row d-none">
				<div  class="col-md-1 field-label-responsive"><br>	</div>
				<div  class="col-md-1 field-label-responsive">		
				<input class="form-check-input" name="check_mpago" type="checkbox" id="id_check_ch_terceros"  value="1">
				</div>
				
				
				<div  class="col-md-3 field-label-responsive">Cheques de Terceros	</div>
				
				<div  class="col-md-2 field-label-responsive">Total Cheques</div>
				<div  class="col-md-3 field-label-responsive">
				<input type="text" id="id_total_cheque_terceros" onkeyup="format(this)" name="total_cheque_terceros" class="form-control"  value="" readonly>
				</div>
				
				</div>
				
				
								
				<div class="form-group row">
				<div  class="col-md-1 field-label-responsive"><br>	</div>
				<div  class="col-md-1 field-label-responsive">		
				<input class="form-check-input" name="check_mpago" type="checkbox" id="id_check_deposito"  value="1">
				</div>
				
				
				<div  class="col-md-3 field-label-responsive">Depósito/Transferencia</div>
				
				<div  class="col-md-2 field-label-responsive">Total</div>
				<div  class="col-md-3 field-label-responsive">
				<input type="text" id="id_total_deposito" onkeyup="format(this)" name="total_deposito" class="form-control"  value="" readonly>
				</div>
				
				</div>
				
								
				<div class="form-group row">
				<div  class="col-md-1 field-label-responsive"><br>	</div>
				<div  class="col-md-1 field-label-responsive">		
				<input class="form-check-input" name="check_mpago" type="checkbox" id="id_check_pos"  value="1">
				</div>
				
				
				<div  class="col-md-3 field-label-responsive">Pago Presencial(Debito/Credito)	</div>
				
				<div  class="col-md-2 field-label-responsive">Total POS</div>
				<div  class="col-md-3 field-label-responsive">
				<input type="text" id="id_total_pos" onkeyup="format(this)" name="total_pos" class="form-control"  value="" readonly>
				</div>
				
				</div>
				
								
				<div class="form-group row">
				<div  class="col-md-1 field-label-responsive"><br>	</div>
				<div  class="col-md-1 field-label-responsive">		
				<input class="form-check-input" name="check_mpago" type="checkbox" id="id_check_webpay"  value="1">
				</div>
				
				
				<div  class="col-md-3 field-label-responsive">WebPay</div>
				
				<div  class="col-md-2 field-label-responsive">Total Webpay</div>
				<div  class="col-md-3 field-label-responsive">
				<input type="text" id="id_total_webpay" onkeyup="format(this)" name="total_webpay" class="form-control"  value="" readonly>
				</div>
				
				</div>
				
				
				
								
				<div class="form-group row">
				<div  class="col-md-1 field-label-responsive"><br>	</div>
				<div  class="col-md-1 field-label-responsive">		
				<input class="form-check-input" name="check_mpago" type="checkbox" id="id_check_oc_empresa"  value="1">
				</div>
				
				
				<div  class="col-md-3 field-label-responsive">Orden de Compra Empresa	</div>
				
				<div  class="col-md-2 field-label-responsive">Total OC</div>
				<div  class="col-md-3 field-label-responsive">
				<input type="text" id="id_total_oc_empresa" onkeyup="format(this)" name="total_oc_empresa" class="form-control"  value="" readonly>
				</div>
				
				</div>
				
				
				
								
				<div class="form-group row">
				<div  class="col-md-1 field-label-responsive"><br>	</div>
				<!--
				<div  class="col-md-1 field-label-responsive">		
				<input class="form-check-input" name="check_mpago" type="checkbox" id="id_check_sence"  value="1">
				</div>
				
				
				<div  class="col-md-3 field-label-responsive">SENCE	</div>
				-->
				<div  class="col-md-2 field-label-responsive"></div>
				<div  class="col-md-3 field-label-responsive">
				<input type="hidden" id="id_total_sence" name="total_sence" class="form-control"  value="" >
				</div>
				
				</div>
				
				

				
								
				<div class="form-group row">
				<div  class="col-md-1 field-label-responsive"><br>	</div>
				<div  class="col-md-1 field-label-responsive">		
				
				</div>
				
				
				<div  class="col-md-3 field-label-responsive"></div>
				
				<div  class="col-md-1 field-label-responsive"></div>
				<div  class="col-md-5 field-label-responsive">
				<p id="id_total_otro_mpago2"style="font-size:20px"></p>
				<input type="number" id="id_total_otro_mpago" name="total_otro_mpago" class="form-control d-none"  value="<?php if($jsondecode){$monto=$jsondecode->dataOp->fields->Monto_Final__c; $valor= str_replace('CLP ','',$monto); $valor_aux=(Int)str_replace('.','',$valor);  echo $valor_aux;}else{echo '';} ?>"disabled >
				</div>
				
				</div>
				
				
				
				
				<div  class="col-md-12 field-label-responsive"><br></div>
				<div  class="col-md-12 field-label-responsive"><br></div>
				</div>
				<!-- mpagoOtra -->
				
				
				<!-- ChequesTerceros -->
				<div id="ChequesTercerosLayout" class="d-none">
				
				<div class="form-group row">
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-4 field-label-responsive"><strong> <u>Informacion de Pagadores: </u></strong></div>
				<div  class="col-md-6 field-label-responsive"></div>
				<div  class="col-md-12 field-label-responsive"><br></div>
				</div>
				
				<div class="form-group row">
				
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-8 field-label-responsive"><strong><div id="Valor_ch_terceros_layout"></div>  </strong></div>
				<div  class="col-md-2 field-label-responsive"></div>
				<div  class="col-md-10 field-label-responsive"><br></div>
				
				</div>
				
				
				<div class="form-group row">
				<div  class="col-md-12 field-label-responsive"><br></div>
				
				
				<div  class="col-md-1 field-label-responsive"><br></div>
				
				<div  class="col-md-1 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Tipo de Pagador: </div>
				<div  class="col-md-2 field-label-responsive"> Persona Natural:</div>
				<div  class="col-md-1 field-label-responsive"> <input type="radio" id="id_otro_cheque_pn" name="radio_persona" class="form-control"  value="persona_natura" checked></div>
			    <div  class="col-md-2 field-label-responsive"> Empresa:</div>
				<div  class="col-md-1 field-label-responsive"> <input type="radio" id="id_otro_cheque_pj" name="radio_persona" class="form-control"  value="persona_juridica"> </div>
				<div  class="col-md-3 field-label-responsive"><br></div>
				
				<div  class="col-md-12 field-label-responsive"><br></div>
				
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Rut: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="text" id="id_otro_cheque_dni" name="otro_cheque_dni" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"><br></div>
				
				</div>
				
				
				<!-- Inicio Persona Natural-->
               <div id="id_datos_persona_natural" class="form-group row d" >
			   
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Nombres: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="text" id="id_otro_cheque_nombre" name="otro_cheque_nombre" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>				
				<div  class="col-md-2 field-label-responsive"><br></div>				
				
				<div  class="col-md-12 field-label-responsive"><br></div>
				
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Apellido Paterno: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="text" id="id_otro_cheque_apellidoPaterno" name="otro_cheque_apellidoPaterno" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"><br></div>
				
				<div  class="col-md-12 field-label-responsive"><br></div>
				
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Apellido Materno: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="text" id="id_otro_cheque_apellidoMaterno" name="otro_cheque_apellidoMaterno" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"><br></div>	
				
				<div  class="col-md-12 field-label-responsive"><br></div>
				
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Direccion: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="text" id="id_otro_cheque_direccion_pn" name="otro_cheque_direccion_pn" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>				
				<div  class="col-md-2 field-label-responsive"><br></div>						

				<div  class="col-md-12 field-label-responsive"><br></div>

				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Comuna: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="text" id="id_otro_cheque_comuna_pn" name="otro_cheque_comuna_pn" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>				
				<div  class="col-md-2 field-label-responsive"><br></div>				
				
				</div>
				<!-- Fin Persona Natural-->
				
				
				 <div id="id_datos_persona_juridica" class="form-group row d-none" >
				 
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Razon Social: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="text" id="id_otro_cheque_razonsocial" name="otro_cheque_razonsocial" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>				
				<div  class="col-md-2 field-label-responsive"><br></div>				
				
                 <div  class="col-md-12 field-label-responsive"><br></div>
				
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Direccion: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="text" id="id_otro_cheque_direccion" name="otro_cheque_direccion" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>				
				<div  class="col-md-2 field-label-responsive"><br></div>						

				<div  class="col-md-12 field-label-responsive"><br></div>

				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Comuna: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="text" id="id_otro_cheque_comuna" name="otro_cheque_comuna" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>				
				<div  class="col-md-2 field-label-responsive"><br></div>	

				<div  class="col-md-12 field-label-responsive"><br></div>
				
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Telefono: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="number" id="id_otro_cheque_telefono" name="otro_cheque_telefono" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>				
				<div  class="col-md-2 field-label-responsive"><br></div>					

				<div  class="col-md-12 field-label-responsive"><br></div>
				
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Email Contacto: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="email" id="id_otro_cheque_emailcontacto" name="otro_cheque_emailcontacto" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>				
				<div  class="col-md-2 field-label-responsive"><br></div>					
				 
				 </div>
				
				<div class="form-group row">
				
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> Suma a pagar: </div>
				<div  class="col-md-4 field-label-responsive"> <input type="text" id="id_otro_cheque_totalapagar" onkeyup="format(this)"  name="otro_cheque_totalapagar" class="form-control"  value=""> </div>
				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"><br></div>	


				<div  class="col-md-2 field-label-responsive"><br></div>
				<div  class="col-md-2 field-label-responsive"> </div>
				<div  class="col-md-4 field-label-responsive"> <br> </div>
				<div  class="col-md-2 field-label-responsive"><button type="submit" id="id_otro_cheque_agrega" name="otro_cheque_agrega" class="form-control btn btn-info btn-lg btn-block"  value="">Agregar</button></div>
				<div  class="col-md-2 field-label-responsive"><br></div>				
				
				</div>
				
				<div  class="col-md-1 field-label-responsive"><br></div>
				<div  class="col-md-1 field-label-responsive"><br></div>
				
				<div id="tabla_cheques"></div>
				
				</div>
				<!-- ChequesTerceros -->
				
				
				
				
				<div class="form-group row d-none" id="mpago_div_resumen" >
	             
				 <div id="mpago_otros_resumen_total" ></div>
				 
				</div>
								
				<div class="form-group row d-none" id="boton_fin_step_3_otros_resumen_sgte">
				<div class="col-md-5"></div>
				<div class="col-md-3 ">
				<button type="button" id="back"class="btn btn-primary btn-lg btn-block" onClick="back_step(5);">Atrás</button>
				</div>
				<div class="col-md-3">
				<button type="button" id="step_3_otros_resumen_sgte" onclick="gtag('event', 'guardar', {'event_category': 'STEP_3_RESUMEN','event_label':'<?php echo $idOp; ?>','value':'1' });"  class="btn btn-success btn-lg btn-block" >Siguiente</button>
				</div>
				</div>
				
				
				<div id="mpago_input" class="d-none"></div>
				
				
				<div class="form-group row d"id="boton_mpago">
				<div class="col-md-5"></div>
				<div class="col-md-3 ">
				<button type="button" id="back"class="btn btn-primary btn-lg btn-block" onClick="back_step(2);">Atrás</button>
				</div>
				<div class="col-md-3">
				<button type="button" id="step_3_sgte" onclick="gtag('event', 'guardar', {'event_category': 'STEP_3_SGTE','event_label':'<?php echo $idOp; ?>','value':'1' });"  class="btn btn-success btn-lg btn-block" >Siguiente</button>
				</div>
				</div>
				
				<div class="form-group row d-none" id="boton_fin_mpago">
				<div class="col-md-5"></div>
				
				<div class="col-md-3 ">
				<button type="button" id="back"class="btn btn-primary btn-lg btn-block" onClick="back_step(3);">Atrás</button>
				</div>
				<div class="col-md-3">
				<button type="button" id="step_4" onclick="gtag('event', 'guardar', {'event_category': 'STEP_3_FIN','event_label':'<?php echo $idOp; ?>','value':'1' });"  class="btn btn-success btn-lg btn-block" >Siguiente</button>
				</div>
				</div>
				
				
				
                <div class="form-group row d-none" id="boton_step_3_otro_cheque">
				<div class="col-md-5"></div>
				
				<div class="col-md-3 ">
				<button type="button" id="back"class="btn btn-primary btn-lg btn-block" onClick="back_step(3);">Atrás</button>
				</div>
				<div class="col-md-3">
				<button type="button" id="step_3_otro_cheque" onclick="gtag('event', 'guardar', {'event_category': 'STEP_3_CHEQUE','event_label':'<?php echo $idOp; ?>','value':'1' });" class="btn btn-success btn-lg btn-block" >Siguiente</button>
				</div>
				</div>
				
				
				
				
				
				
				
				
				<div class="form-group row d-none" id="boton_otro_mpago">
				<div class="col-md-5"></div>
				
				<div class="col-md-3 ">
				<button type="button" id="back"class="btn btn-primary btn-lg btn-block" onClick="back_step(2);">Atrás</button>
				</div>
				<div class="col-md-3">
				<button type="button" id="step_3_otro"  onclick="gtag('event', 'guardar', {'event_category': 'STEP_3_OTROMPAGO','event_label':'<?php echo $idOp; ?>','value':'1' });" class="btn btn-success btn-lg btn-block" >Siguiente</button>
				</div>
				</div>


		</form>

		</div>


	</div> <!-- row -->
 </div> 
</div>
 <!-- Container step_3 -->  


<!-- Container step_4 --> 		
<div class="container-fluid d-none" id="container_step_4">
     <hr>
	<!-- <form id="step_4_form" accept-charset="utf-8" method="post">-->
	  <?php echo form_open_multipart('controller/do_upload',array('id' => 'step_4_form'));?> 
		 <input type="hidden" name="idOp" id="idOp_step_4" value="<?php echo $idOp; ?>" readonly>
		 <input type="hidden" name="IdCuenta" value="<?php if($jsondecode){echo $jsondecode->dataOp->fields->AccountId;}else{echo '';} ?>" readonly>
  
  <div class="row">
  
    <div class="col-sm-3" >
	<!--Productos -->
	<div  class="card" >	


			<div class="form-group row">	
			<div  class="col-md-4 field-label-responsive">
			<p style="font-size:12px">Ejecutiva(o):</p>
			</div>
			
			<div  class="col-md-8 field-label-responsive">
			<b><p style="font-size:11px"><?php if($jsondecode){echo $jsondecode->ejec->name;}else{echo '';} ?></p></b>
			</div>
			
			<div  class="col-md-4 field-label-responsive">
			<p style="font-size:12px">Email:</p>
			</div>
			
			<div  class="col-md-8 field-label-responsive">
			<b><p style="font-size:11px"><?php if($jsondecode){echo $jsondecode->ejec->email;}else{echo '';} ?></p></b>
			</div>
           <div  class="col-md-12 field-label-responsive"><br>	</div>				
			<div  class="col-md-12 field-label-responsive" >
			<table class="table" class="table table-nonfluid">
				  <thead>
					<tr>
					  <th><font SIZE=2>Programas(s)de estudio:</font></th>
					  <th><font SIZE=2>Malla</font></th>

					</tr>
				  </thead>
				  <tbody >
			<?php
				foreach ($jsondecode->productos as $k){
					$pos=strpos($k->ProductCode,'C-');
					echo "<tr>";	
					if($pos!==false){
					echo "<td><font SIZE=2>".$k->Name."</font></td>";
					}else{
					echo "<td><font SIZE=2>".$k->Name."</font></td>";
					echo "<td>".'<button type="button"   class="btn btn-warning d "  onclick="malla_diplo('."'".$k->ProductCode."'".')" >Ver</button>'."</td>";
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

			<div  class="col-md-5 field-label-responsive">
			Fecha de Validez:
			</div>
			
			<div  class="col-md-7 field-label-responsive">
			<b><?php $date=date("d/m/Y");echo $date; ?></b>
			</div>						
	  
	        <div  class="col-md-12 field-label-responsive"><br>	</div>	
					
			<div  class="col-md-5 field-label-responsive">
			<strong> Arancel($): </strong>
            </div>			
					
			<div  class="col-md-7 field-label-responsive">
				<b><?php if($jsondecode->dataOp->fields->Extranjero__c==='true'){$monto = explode(' ',$jsondecode->dataOp->fields->Monto_Final__c); $value= str_replace('.','',$monto[1]); echo 'USD : '.round($value/$dolar_ce);}else{echo $jsondecode->dataOp->fields->Monto_Final__c;} ?></b>
			 </div> 
			 
			 
			 
		</div><!-- Form Class -->
	  
	</div><!--Card-->
<!--Productos -->	
    </div>
<!--Espacio para mobil -->		
<br>
<!--Espacio para mobil -->

  <div  class="col-sm-9" >	
       <!--Datos Personales -->
   <div class="card">
        <!-- navbar -->
			<ul class="nav nav-tabs nav-justified">
			  <li class="nav-item">
				<a class="nav-link " href="#">Datos del Alumno</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Datos de Residencia</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link " href="#">Forma de Pago</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link active" href="#">Adjuntar Documentos</a>
			  </li>
			</ul>
		<!-- /.navbar -->
          <br>
		<center>
			<div  class="col-md-6 field-label-responsive"><font size=3><strong>Adjuntar Documentos</p></font></div>
        </center>

		<div class="form-group row">
		
		 <div class="col-md-3">	
			<div class="progress">
			  <div class="progress-bar progress-bar-striped card" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
			  
			  </div>
			</div>
			   
		 </div>
		 <div class="col-md-9">	Paso 4 de 4</div>

		 <div class="col-md-12"><br></div>
		 
        </div>
		
	
		<!--Seccion upload  -->
		<div class="card card-body form-group row mx-auto">
		
		<div  class="form-group row ">
			<div  class="col-md-8 field-label-responsive"><font size=3><strong>Archivos a Subir:</strong></font>
			<br>
			<p >Para cursar tu matrícula es necesario que adjuntes tu documento de identidad, el formato permitido es pdf , jpg, doc o docx con un tamaño máximo de 5Mb. </p>
			</div>
	
			
		
        </div>

			<div  class="form-group row">
					<div class="col-md-2">	</div>
					<div class="col-md-3">	
						<input type="button" name="subir_doc" class="btn btn-primary"id="btAdd" value="Subir documento" class="bt" />
					</div>	
					<div class="col-md-3">
						<input type="button" class="btn btn-secondary"id="btRemove" value="Eliminar Documento" class="bt" />
					</div>
					<div class="col-md-3">			
						<input type="button" class="btn btn-danger"id="btRemoveAll" value="Eliminar Todo" class="bt" /><br />
					</div>	
			</div>
			<div  class="form-group row">
			   <div class="col-md-2">	</div>	
					<div class="col-md-9">	
						<div id="main" >
						</div>	
					</div>	
			</div>	
			 <div  class="form-group row">	
					<div class="col-md-2"> </div>
							<div class="progress col-md-9">
							  <div class="progress-bar" id="bar" role="progressbar"  style="width: 1%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="percent">0%</div ></div>
							</div>
							<div id="status"></div>
							
			   </div>
			 <p style="color:red;" class="error"><?php echo $error['error'];?></p>
			 

			<br>
			
			<div  class="form-group row" >
            <div  class="col-md-12 field-label-responsive"><strong>Nota:La inscripción del alumno se hace efectiva una vez se documenta el valor total del Diplomado </strong></div> 
            </div>			
	   </div>	
<!--Fin upload-->

	   <div class="form-check form-check-inline">
	    <div class="form-check form-check-inline">
		  <input class="form-check-input" name="acepta" type="checkbox" id="inlineCheckbox3"  value="1">
		  <label class="form-check-label" for="inlineCheckbox1">Declaro que los datos entregados son fidedignos y estos pasarán a constituir la información oficial con que contará la universidad para fines académicos  </label>
		</div> 
	 </div>
   	 
		
	 <div class="form-group row">
		 <div class="col-md-4">
		  <img src="/contents/imagenes/ajax-loader.gif" class="img-circle invisible" id="loader" />
		 </div>
		 
		<div class="col-md-4 ">
		<button type="button" id="back"class="btn btn-primary btn-lg btn-block" onClick="back_step(4);">Atrás</button>
		</div>		 
		 
		<div class="col-md-4">
		  <input type="submit" id="step_4_enviar" onclick="gtag('event', 'guardar', {'event_category': 'STEP_4','event_label':'<?php echo $idOp; ?>','value':'1' });" class="btn btn-success btn-lg  btn-block" value="Enviar" />
		</div>

      </div>


</form>

</div>


    </div> <!-- row -->
 </div> 
</div>
 <!-- Container step_4 -->  
 

    <?php }?>
	
 <!-- Container Ficha Completada -->
<div class="container-fluid d-none" id="container_step_finalizado">
	  <font size=4>Estimado/a:<?php if($jsondecode){echo $jsondecode->dataCta->fields->FirstName; echo'&nbsp;&nbsp;'; echo $jsondecode->dataCta->fields->LastName;}?>
	  <br><br>
	  Favor de contactarse con su ejecutiva:<b><?php echo $jsondecode->ejec->name;?></b> al Email: <b><?php echo $jsondecode->ejec->email;?></b>, <br>
	  si necesitas actualizar sus datos personales.<br><br>
	  Saluda Atte.<br>
	  Equipo de Admision Clase Ejecutiva.<br>
	 <a href=https://www.claseejecutiva.com>https://www.claseejecutiva.com</a></font>
	  <br>

<div>

  <!-- Container Ficha Completada -->	
	
</div><!-- Container card black -->
    
	
	<!-- Fin valida ficha completada -->
	
	
	
</body>
</html>	
	