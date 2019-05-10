<?php
//header('Content-type: application/json');
header('Access-Control-Allow-Origin:*');
// ob_end_flush();
error_reporting(0);
//require(APPPATH.'/libraries/wsLandingBeca.php');
require(APPPATH.'/libraries/curl.php');
class Trial extends CI_Controller {

  	public function __construct()
   {
        parent::__construct(); 
       	$this->load->helper(array('form', 'url','download'));  //carga las funciones 
        $this->load->model('trial_model');
   }


public function index()
{
	
	$this->trial_model->fecha();
	 //$this->load->view('trial', array('error' => ' ' ));
	// $this->load->library('form_validation');
	// redirect('http://www.claseejecutiva.cl'); 
}

public function url()
{

 if(!$this->input->post('token'))
 {
	die('Falta Token'); 
 }else if($this->input->post('token')==='DlAius5KJDPqESr6v4p1WDiBAEcguMdX2K7B3pqD'){
 date_default_timezone_set('America/New_York');
 $token=uniqid();
 $fecha=date("Y-m-d");
 $email=$this->input->post('email');
 $sku=$this->input->post('sku');
 $respuesta=$this->trial_model->ingresar_url($token,$fecha,$email,$sku);
 if($respuesta==='ok'){
  //echo'https://ws2.diplomadosuc.cl/landing/index.php/trial/user?token='.$token.'&email='.$email.'&sku='.$sku;
  $this->email_pre_matricula($email,$sku,'https://ws2.diplomadosuc.cl/landing/index.php/trial/user?token='.$token);
  echo'https://ws2.diplomadosuc.cl/landing/index.php/trial/user?token='.$token;
 }else{
  echo 'error';	 
 }
	 
 }else{
die('Token invalido');	 
 }
	 
}



public function user()
{
	if(!$this->input->get('token') ){
		$token=$this->input->get('token');
		die('Falta Parametros'); 	
	}else{ 
	$token=$this->input->get('token');
	$result =$this->trial_model->valid_url($token,5);
	//print_r($result);
	if($result!='error'){
	$data['user']=$result;
	$this->load->view('trial',$data);
	}else{
		echo"<script type=\"text/javascript\">alert('Link Caducado'); </script>"; 
		//sleep(5);
        header('Location: http://www.claseejecutiva.com/');
	}
 }
}


private function email_pre_matricula($email,$sku,$url)
	{
		//cargamos la libreria email de ci (CodeIgniter)
		$this->load->library("email");
		//configuracion para gmail
		/*
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'alumnosuc@diplomadosuc.cl',
			'smtp_pass' => 'Ingnk2f82',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    
		*/
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'noreply@diplomadosuc.cl',
			'smtp_pass' => 'admce8585',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		); 
         $pieFirma='Saluda Atte.<br><br>				
					Clase Ejecutiva <br>
                    Pontificia Universidad Católica de Chile<br>
                    www.claseejecutiva.com';
					   
		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);
          
		$this->email->from('noreply@diplomadosuc.cl');
		$this->email->to($email);
		//$this->email->to('cristian8x@gmail.com');
		//$this->email->bcc('pagos@diplomadosuc.cl');
		$this->email->subject('Creación de Cuenta en Trial UC ');
		
		$this->email->message('<h2>Estimado(a)&nbsp;Alumno(a):</h2><br>Junto con saludar, le informamos que debe completar el siguiente formulario, con el fin de acceder a nustra plataforma Trial UC<br> 
							  En el siguiente <a href="'.$url.'">link<a/> puede completar su registro<br><br>
							  <br>Agradecemos su atención<br><br>'.$pieFirma);
	     
		 //$this->email->message('test');
		$this->email->send();
		//con esto podemos ver el resultado
		//var_dump($this->email->print_debugger());
    }

	
	
public function matricula()
{
	
	//$email=$this->input->post('input_email');
	//$pass=$this->input->post('input_pass1');
	//$sku=$this->input->post('sku');
	
	//echo $email.'<br>'.$pass.'<br>'.$sku;
	
	if(!$this->input->post('input_email') or
       !$this->input->post('input_pass1')or
       !$this->input->post('sku')){
		//$token=$this->input->post('token');
		die('Falta Parametros'); 	
	}else{ 
	$email=$this->input->post('input_email');
	$pass=$this->input->post('input_pass1');
	$sku=$this->input->post('sku');
	$nombre=$this->input->post('nombre');
	$apellido=$this->input->post('apellido');

     die(print_r($_POST));

	if($nombre=''){
		$nombre='-';
	}	
	if($apellido=''){
		$apellido='-';
	}



	$passMD5=md5($pass);
	$fechaHora=date("Y-m-d H:i:s");
		$data_usuario['id_unidad']=101;
		$data_usuario['id_tipo_identificador_nacional']=2;
		$data_usuario['id_pais_identificador']=1;
		$data_usuario['identificador_nacional']=$email;
		$data_usuario['nombre1']=$nombre;
		$data_usuario['apellido1']=$apellido;
		$data_usuario['apellido2']=null;
		$data_usuario['email']=$email;
		$data_usuario['contrasegna']=$passMD5;

		$data_v_cursos[0]['id_version_curso']=$sku;
		$data_v_cursos[0]['accion']=1; //1: matricular, 2: quitar

		
		//$data_planes[0]['id_plan']=17;
		//$data_planes[0]['accion']=1; //1: matricular

		$data['info_usuario']=$data_usuario;
		$data['info_pagos']=null;
		$data['info_versiones_curso']=$data_v_cursos;
		$data['info_planes']=null;

		$data_json=json_encode($data, JSON_FORCE_OBJECT);

		$url='http://erpuc.capsul.cl/publico/ws/guardarusuario/token/59ec48c22845cffe863ec8b8b14e73c5?data='.$data_json;
				//open connection
				$curl = curl_init($url);
				curl_setopt ($curl, CURLOPT_POST,1);//SETEAMOS LA VARIABLE DE ENVIAR DE CONTENIDO POST EN TRUE (1)
				curl_setopt ($curl, CURLOPT_POSTFIELDS,""); //SETEAMOS LOS VALORES A ENVIAR
				curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);//OPCIONAL: NO RETORNARA EL RESULTADO DE LA OPERACION
				//execute post
				$result = json_decode(curl_exec($curl));		
				//close connection
				$log=json_encode($result);
				curl_close($curl);
			    $this->trial_model->log($email,$sku,$fechaHora,$log);	
				//print_r ($result);
				echo $log;
	}
	
	
}	
	



public function matriculav2()
{
if(!$this->input->post('input_email') or
       !$this->input->post('input_pass1')or
       !$this->input->post('sku')){
		//$token=$this->input->post('token');
		die('Falta Parametros'); 	
	}else{ 
	$email=$this->input->post('input_email');
	$pass=$this->input->post('input_pass1');
	$sku=$this->input->post('sku');
	$nombre=$this->input->post('nombre');
	$apellido=$this->input->post('apellido');

//die(print_r($this->input->post()));


	if(!$this->input->post('nombre')){
		$nombre='-';
	}	
	if(!$this->input->post('apellido')){
		$apellido='-';
	}
/*	
	$url_ce='http://ws.diplomadosuc.cl/wsRest/index.php/Trial/cuentaERPV2'; 
	 		$email= $this->post("email");
		$sku= $this->post("sku");
		$nombre= $this->post("nombre");
		$apellido= $this->post("apellido");
	$data=array('email'=>$email,
				'sku'=>$sku,
				'nombre'=>$nombre,
				'token'=>'DlAius5KJDPqESr6v4p1WDiBAEcguMdX2K7B3pqD');
	 $ch = curl_init($url_ce);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	 curl_setopt($ch,CURLOPT_POST, count($data));
	 curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
	 //obtenemos la respuesta
	 $response =curl_exec($ch);
	echo $response;
	// Close request to clear up some resources
	curl_close($ch);
*/
  //die(print_r($nombre));

		$obj= new stdclass(); 
		$obj->estado= "matriculado (1)";
		$obj->id_contrato= null;
		$obj->marca_sence= 0;
		$obj->id_version_curso= "";
		$obj->id_cuenta= $email;
		$obj->id_plan=null;
		$activos[]=$obj;

		$obj= new stdclass();
		$obj->estado= "matriculado (1)";
		$obj->id_contrato= null;
		$obj->marca_sence= 0;
		$obj->id_version_curso=$sku;
		$obj->id_cuenta=  $email;
		$obj->id_plan="";
		$activos[]=$obj;
	
	    $fechaHora=date("Y-m-d H:i:s");	
		$passMD5=md5($pass);
        $alumno =  array(
		"id_unidad"=>'Trial(101)', //**campo_nuevo
		"email"=>$email, //**campo_nuevo
		"contrasegna"=>$passMD5, //**campo_nuevo
		"nombre_del_alumno" =>$nombre,
		"apellido_paterno" => $apellido,
		"apellido_materno" => "",
		"rut_dni_alumno"=>$email,
		"id_tipo_identificador" => "email(2)",
		"id_pais_dodumento" => "chile(PS-38)",//chile(1)
		"cargo" => "",
		"pais" => "",
		"region" => "-",
		"comuna" => "-",
		"calle" => "",
		"ciudad" => "",
		"calle_numero" => "",
		"numero_depto" => "",
		"complemento_direccion" => "",
		"ente_pagador" => null,
		"contacto" => null,
		"contrato" => null,
		"activos" => $activos
		);

	            $data_json=json_encode($alumno, JSON_FORCE_OBJECT);

                $data = array('data'=>$data_json);	
		        $url='http://trial.claseejecutiva.com/publico/ws/guardarusuariov2/token/59ec48c22845cffe863ec8b8b14e73c5';
				//open connection
				$curl = curl_init($url);
				 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
				 curl_setopt($curl,CURLOPT_POST, count($data));
				 curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
				//execute post
				$result = json_decode(curl_exec($curl));		
				$log=json_encode($result);
				curl_close($curl);
			    $this->trial_model->log($email,$sku,$fechaHora,$log);	
				//print_r ($result);
				echo $log;
			
	}						
}	
	
public function do_upload()
	{
		if(!$this->input->post('nombres') or
		   !$this->input->post('apellidos')or
		   !$this->input->post('telefono')or
		   !$this->input->post('email')or
		   !$this->input->post('cargo')or
		   !$this->input->post('profesion')or
		   !$this->input->post('empresa')or
		   !$this->input->post('edad')or
		   !$this->input->post('pais')or
		   !$this->input->post('region')or
		   !$this->input->post('pregunta1')or
		   !$this->input->post('pregunta2')or
		   !$this->input->post('experiencia'))
		   {
			// $error = array("error" => " ");
			  redirect('chile/index'); 
			
		}else{
		
		$nombre = str_replace(' ','_',$this->input->post('nombres'));
		$apellido = str_replace(' ','_',$this->input->post('apellidos'));
		$telefono = str_replace(' ','',$this->input->post('telefono'));
		$email = str_replace(' ','',$this->input->post('email'));
		$cargo = str_replace(' ','_',$this->input->post('cargo'));		
		$profesion = str_replace(' ','_',$this->input->post('profesion'));
		$empresa = str_replace(' ','_',$this->input->post('empresa'));
		$edad = $this->input->post('edad');
		$pais= str_replace(' ','_',$this->input->post('pais'));
		$region= str_replace(' ','_',$this->input->post('region').'-');
		$diplomados= $this->input->post('diploName');
		$cursos= $this->input->post('cursoName');
		$p1= str_replace(' ','_',$this->input->post('pregunta1'));
		$p2= str_replace(' ','_',$this->input->post('pregunta2'));
		$anhos = str_replace(' ','',$this->input->post('experiencia'));
		$adjuntar = $this->input->post('adjuntar');
		
		
		
		

		//Datos SalesForce
		//$origen='-';
		$origen=$this->input->post('marca');
		$comentario= '-';
		$acepta=1;
		
		
		$nombreOportunidad='Oportunidad_Venta_Beca_Chile';
		$idCampaña='a0M1a000001XX2S';
        $productos=$diplomados.','.$cursos;
		$fecha=date('Y-m-d H:i:s');
		$files = $_FILES;

		
		$nom_archivo1=$files['userfile']['name'][0];
		$nom_archivo2=$files['userfile']['name'][1];
		/*
		$nom_archivo1=$nom_archivo1substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20); 
		$nom_archivo2=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
		*/
        if(!$diplomados){
		 	$productos=substr($productos,1);
		}else{
		    $productos;
		}  

		
		if($adjuntar == 'si')
		{
		$ruta1='/var/www/html/landing/documentos/'.$nom_archivo1;
	    $ruta2='/var/www/html/landing/documentos/'.$nom_archivo2;

			$config['upload_path'] = './documentos/';
			$config['allowed_types'] = 'jpg|png|doc|docx|pdf';
			$config['remove_spaces']=false;
	        $config['max_size']    = '8120';//Kilobyte (5 megas)

	        $this->load->library('upload', $config);

		    
		    $cpt = count($_FILES['userfile']['name']);
		    for($i=0; $i<$cpt; $i++)
		    {           
		        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
		        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
		        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
		        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
		        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

					if (!$this->upload->do_upload())
					{
						$error = array('error' => $this->upload->display_errors());
			            $this->load->view('peru', $error);

			             //break; 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$data = $this->upload->data();

						//$final_files_data[] = $this->upload->data();
			           //$this->load->view('upload_success', $data);            
                        
						
					    //$this->candidato_model->ingresar_persona($nombre,$apellido,$telefono,$email,$cargo,$profesion,$edad,$empresa,$pais,$region,$diplomados,$cursos,$p1,$p2,$ruta1,$ruta2,$nom_archivo1,$nom_archivo2,$fecha,$anhos);
						
						

					} 		
		    }//Fin For
		    $this->candidato_model->ingresar_persona($nombre,$apellido,$telefono,$email,$cargo,$profesion,$edad,$empresa,$pais,$region,$diplomados,$cursos,$p1,$p2,$ruta1,$ruta2,$nom_archivo1,$nom_archivo2,$fecha,$anhos,$origen);
			
			/*
			$ws = new wsLandingBeca();
			$ws->CrearOportunidad($email,$nombre,$apellido,$telefono,$cargo,$empresa,$pais,$region,$comentario,$origen,$acepta,$productos,$nombreOportunidad,$idCampaña,$ruta1,$ruta2,$p1,$p2,$anhos);
            */
			//$p_ruta1=str_replace('/','+',$ruta1);
			//$p_ruta2=str_replace('/','+',$ruta2);
			
			//$p_ruta1='+_';
			//$p_ruta2='+_';
			
			$id_descarga=$this->candidato_model->get_id();
			
			$p_ruta1=str_replace('/','+',base_url() . 'index.php/reporte_latam/descargar1/'.$id_descarga['id']);
			$p_ruta2=str_replace('/','+',base_url() . 'index.php/reporte_latam/descargar2/'.$id_descarga['id']);
			
			$curl = new curl;	    
			
			$url_ce='clasejec3.ing.puc.cl/apps/index.php?/seguimiento_controller/insertarPersonaOportunidadLandingBecaSF/'.urlencode($email).'/'.urlencode($nombre).'/'.urlencode($apellido).'/'.$telefono.'/'.urlencode($cargo).'/'.urlencode($empresa).'/'.$pais.'/'.$region.'/'.$comentario.'/'.$origen.'/'.$acepta.'/'.$productos.'/'.$nombreOportunidad.'/'.$idCampaña.'/'.$p_ruta1.'/'.$p_ruta2.'/'.urlencode($p1).'/'.urlencode($p2).'/'.$anhos.'/'.urlencode($profesion).'/'.$edad;

			$ch = curl_init($url_ce);//URL A ENVIAR EL CONTENIDO
			curl_setopt ($ch, CURLOPT_POST, 1);//SETEAMOS LA VARIABLE DE ENVIAR DE CONTENIDO POST EN TRUE (1)
			curl_setopt ($ch, CURLOPT_POSTFIELDS,""); //SETEAMOS LOS VALORES A ENVIAR
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,0);//OPCIONAL: NO RETORNARA EL RESULTADO DE LA OPERACION
			curl_exec ($ch);//EJECUTAMOS 
			curl_close ($ch);//CERRAMOS

		    redirect('http://www.claseejecutiva.com'); 
			//echo $url_ce;
			
			}else{
				
			$this->candidato_model->ingresar_persona($nombre,$apellido,$telefono,$email,$cargo,$profesion,$edad,$empresa,$pais,$region,$diplomados,$cursos,$p1,$p2,'NA','NA','NA','NA',$fecha,$anhos,$origen);
			
			$curl = new curl;                                                   
			$url_ce='clasejec3.ing.puc.cl/apps/index.php?/seguimiento_controller/insertarPersonaOportunidadLandingBecaSF/'.urlencode($email).'/'.urlencode($nombre).'/'.urlencode($apellido).'/'.$telefono.'/'.urlencode($cargo).'/'.urlencode($empresa).'/'.$pais.'/'.$region.'/'.$comentario.'/'.$origen.'/'.$acepta.'/'.$productos.'/'.$nombreOportunidad.'/'.$idCampaña.'/'.'NA'.'/'.'NA'.'/'.urlencode($p1).'/'.urlencode($p2).'/'.$anhos.'/'.urlencode($profesion).'/'.$edad;

			$ch = curl_init($url_ce);//URL A ENVIAR EL CONTENIDO
			curl_setopt ($ch, CURLOPT_POST, 1);//SETEAMOS LA VARIABLE DE ENVIAR DE CONTENIDO POST EN TRUE (1)
			curl_setopt ($ch, CURLOPT_POSTFIELDS,""); //SETEAMOS LOS VALORES A ENVIAR
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,0);//OPCIONAL: NO RETORNARA EL RESULTADO DE LA OPERACION
			curl_exec ($ch);//EJECUTAMOS 
			curl_close ($ch);//CERRAMOS

		    redirect('http://www.claseejecutiva.com'); 
			//echo $url_ce;
			}
		}//if

	}
	
	
		
	}



?>