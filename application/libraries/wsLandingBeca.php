<?php
//error_reporting(0);
require(APPPATH.'/libraries/curl.php');
class wsLandingBeca
{
	
 function CrearOportunidad($email,$nombre,$apellido,$telefono,$cargo,$empresa,$pais,$region,$comentario,$origen,$acepta,$productos,$nombreOportunidad,$idCampaña,$ruta1,$ruta2,$p1,$p2,$anhos)
 {
 $curl = new curl;	    
			$url_ce='clasejec3.ing.puc.cl/apps/index.php?/seguimiento_controller/insertarPersonaOportunidadLandingBecaSF/'.$email.'/'.$nombre.'/'.$apellido.'/'.$telefono.'/'.$cargo.'/'.$empresa.'/'.$pais.'/'.$region.'/'.$comentario.'/'.$origen.'/'.$acepta.'/'.$productos.'/'.$nombreOportunidad.'/'.$idCampaña.'/'.$ruta1.'/'.$ruta2.'/'.$p1.'/'.$p2.'/'.$anhos;	
				
			$ch = curl_init($url_ce);//URL A ENVIAR EL CONTENIDO
			curl_setopt ($ch, CURLOPT_POST, 1);//SETEAMOS LA VARIABLE DE ENVIAR DE CONTENIDO POST EN TRUE (1)
			curl_setopt ($ch, CURLOPT_POSTFIELDS,""); //SETEAMOS LOS VALORES A ENVIAR
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,0);//OPCIONAL: NO RETORNARA EL RESULTADO DE LA OPERACION
			curl_exec ($ch);//EJECUTAMOS 
			curl_close ($ch);//CERRAMOS
 
 }
 
 
}