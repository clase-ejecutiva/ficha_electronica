<?php
 header("Access-Control-Allow-Origin: *"); 
 define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
//require(APPPATH.'/libraries/wsLandingBeca.php');

class Testing extends CI_Controller {

  	public function __construct()
   {
        parent::__construct(); 
       	$this->load->helper(array('form', 'url','download'));  //carga las funciones 
        $this->load->model('ficha_model');
   }


public function index()
{
	$idOp=$this->input->get('idOp');
	
	$url_ce='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php?idOp='.$idOp.'&action=buscarOp';			
	$ch = curl_init($url_ce);//URL A ENVIAR EL CONTENIDO
    curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL =>  $url_ce));
    $response = curl_exec($ch); 		
	curl_close($ch);
	$jsondecode = json_decode($response);	
	
	//die(print_r($jsondecode));
	if($idOp){
	 $this->load->view('testing',array('error' =>$error ,'jsondecode'=>$jsondecode,'idOp'=>$idOp));
	}else{
	 $this->load->view('testing', array('error' =>$error ,'jsondecode'=>false,'idOp'=>$idOp));
	}
}

public function ErrorUpload($error,$idOp)
{	
	$url_ce='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php?idOp='.$idOp.'&action=buscarOp';			
	$ch = curl_init($url_ce);//URL A ENVIAR EL CONTENIDO
    curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL =>  $url_ce));
    $response = curl_exec($ch); 		
	curl_close($ch);
	$jsondecode = json_decode($response);	
	if($idOp){
	 $this->load->view('testing',array('error' =>$error ,'jsondecode'=>$jsondecode,'idOp'=>$idOp));
	}else{
	 $this->load->view('testing', array('error' =>$error ,'jsondecode'=>false,'idOp'=>$idOp));
	}
}


public function do_upload()
	{
		
		$Post=$this->input->post();
		//die(print_r($Post));
		
		$config['upload_path'] = './ficha_formulario/';
		$config['allowed_types'] = 'doc|jpg|docx|pdf|png';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		$config['remove_spaces']=true;
	    $config['max_size']= '8192';//Kilobyte (8 megas)
	    $config['encrypt_name']= true;
		$this->load->library('upload', $config);
		//Generar un array para la carga de N archivos 
        $files = $_FILES;
		$data_form=Array();
	
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
				$this->ErrorUpload($error,$Post['idOp']);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$archivos= $this->upload->data();
				 $form= new stdClass();
				 $form->ruta=$archivos['file_path'];
				 $form->nombre=$archivos['file_name'];
				 $form->org_nombre=$archivos['orig_name'];
				 $data_form[]=$form;
			}	
		}
	    //Insertar data en BBDD
		if(!$error){
		$BBDD=$this->ficha_model->ingresar_ficha($Post['idOp'],$Post['email'],json_encode($data_form));	
		
		//die(print_r(json_encode($data_form)));
		//die(print_r($Post));
		 /*
		 Diccionario Medio de pago
		 Transferencia-Deposito      1
		 Cheque                      2
		 Orden de Compra             3
		 Orden de Compra OTIC        4
		 Cuponera                    5
		 Tarjerta Bancaria           6
		 webPay                      7
		 Tranferencia Bancaria Inter 8
		 */
		 if($_POST['pais']=='Chile(PS-38)'){
		 $tipo_documento='Cédula de Identidad(1)'; 
		 }else{
		 $tipo_documento=$_POST['tipo_documento'];	 
		 $ciudad_ext=$_POST['comuna'];
		 }
		 
	
		$dataForm = array (       'idOp'=>$Post['idOp'],
		                          'action'=>'updateCta', 
		                          'IdCuenta'=>$_POST['IdCuenta'],
								  'nombre'=>$_POST['nombre'],	
								  'apellidoPaterno' =>$_POST['apellidoPaterno'],
								  'apellidoMaterno'=>$_POST['apellidoMaterno'],
								  'tipo_documento'=>$tipo_documento,
								  'dni' =>$_POST['dni'],
								  'genero' =>$_POST['genero'],
								  'estado_civil' =>$_POST['estado_civil'],
								  'empresa'=>$_POST['empresa'],
								  'cargo'=>$_POST['cargo'],
								  'f_nacimiento'=>date('Y-m-d', strtotime($_POST['f_nacimiento'])),
								  'dir'=>$_POST['dir'],
								  'dir_num'=>$_POST['dir_num'],
								  'dir_depto'=>$_POST['dir_depto'],
								  'dir_complemento'=>$_POST['dir_complemento'],
								  'pais'=>$_POST['pais'],
								  'email' =>$_POST['email'],
								  'pass' =>md5($_POST['pass']),
								  'region'=>$_POST['region'],	
								  'comuna'=>$_POST['comuna'],
								  'ciudad'=>$ciudad_ext,
								  'tel'=>$_POST['tel'],
								  'idOp'=>$_POST['idOp'],
								  'mpago'=>$_POST['mpago'],
								  'tipo_p'=>$_POST['tipo_p'],
								  //Datos del Alumno
								  'nom_pn_a'=>$_POST['nom_pn_a'],
								  'nom_pn_t'=>$_POST['nom_pn_t'],
								  'ape_pn_a'=>$_POST['ape_pn_a'],
								  'ape_pn_t'=>$_POST['ape_pn_t'],
								  'dir_pagador'=>$_POST['dir_pagador'],
								  'ciudad_pagador'=>$_POST['ciudad_pagador'],
								  'pais_pagador'=>$_POST['pais_pagador'],
								  'com_pagador'=>$_POST['com_pagador'],
								  //Datos Empresa
								  'razon_social'=>$_POST['razon_social'],
								  'giro'=>$_POST['giro'],
								  'web_e'=>$_POST['web_e'],
								  'nombre_rl'=>$_POST['nombre_rl'],
								  'rut_rl'=>$_POST['rut_rl'],
								  'nom_con'=>$_POST['nom_con'],
								  'ape_pat_con'=>$_POST['ape_pat_con'],
								  'ape_mat_con'=>$_POST['ape_mat_con'],
								  'cargo_con'=>$_POST['cargo_con'],
								  'email_con'=>$_POST['email_con'],
								  'tel_con'=>$_POST['tel_con'],
								  'rut_ficha_a'=>$_POST['rut_ficha_a'],
								  'rut_ficha_e'=>$_POST['rut_ficha_e'],
								  'rut_ficha_t'=>$_POST['rut_ficha_t'],
								  'tipo_otic'=>$_POST['tipo_otic'],
								  'url_descarga'=>'http://ws.diplomadosuc.cl/landing/index.php/testing/descargar_archivo?f='.$Post['idOp'],
								  );
		//die(print_r($dataForm));						  
								  
		foreach ( $dataForm as $key => $value) {
		$post_items[] = $key . '=' . $value;
	   }			
	    $post_string = implode ('&', $post_items);						  
		$url_ce='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php?action=updateCta';		
		 $ch = curl_init($url_ce);
		 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		 curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		 curl_setopt($ch,CURLOPT_POST, count($dataForm));
		 curl_setopt($ch, CURLOPT_POSTFIELDS,$post_string);
		  //Debug Mode
		 curl_setopt($ch, CURLOPT_VERBOSE, true);
		 //obtenemos la respuesta
		 $response =curl_exec($ch);	
		//success
		$responceUpdate = json_decode($response);
		
		$cuenta=$responceUpdate->account[0]->id;
		$op=$responceUpdate->opportunity[0]->id;
		$ficha=$responceUpdate->ficha[0]->id;
		
		//echo $cuenta;
		//echo $op;
		//echo $ficha;
		//die(print_r($responceUpdate));
		if($cuenta!=null && $op!=null && $ficha!=null){
		$response=array('status'=>'ok');
		$var=json_encode($response);
		echo $var;
		$this->email_exito($_POST['ejecutivaEmail'],$_POST['ejecutivaName'],$_POST['email']);
		}else{
		$response=array('status'=>$responceUpdate);
		$var=json_encode($response);
		echo $var;	
		}
	}	

	}


private function email_exito($email,$ejec,$emailAlumno)
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
          
		$this->email->from($email);
		$this->email->to($emailAlumno);
		//$this->email->to('cristian8x@gmail.com');
		//$this->email->bcc('pagos@diplomadosuc.cl');
		$this->email->subject('Datos Ingresados Correctamente Pontificia Universidad Católica de Chile');
		
		$this->email->message('Estimado(a)&nbsp;Alumno(a):<br><br>Junto con saludar,informamos a usted que su ficha esta ingresada en nuestra plataforma<br> 
							  Si tiene alguna duda , favor de contactarse con su ejecutiva:<b>'.$ejec.'</b> al correo electronico:&nbsp;&nbsp;'.$email.'&nbsp;.<br><br>
							  <br>Agradecemos su atención<br><br>'.$pieFirma);
	     
		 //$this->email->message('test');
		$this->email->send();
		//con esto podemos ver el resultado
		//var_dump($this->email->print_debugger());
}	

public function descargar_archivo()
 {
	 $this->load->library('zip');
	 $idOp = $this->input->get('f');
     $data=$this->ficha_model->archivos($idOp);
     $archivos=json_decode($data['archivos']); 
	foreach($archivos as $r){
    $path=$r->ruta;	
	$name=$r->nombre;
    $data=$r->org_nombre;
	ob_end_clean();
	$this->zip->read_file($path.$name);
	}
	ob_end_clean();
	sleep(1);
    $this->zip->download(uniqid().'.zip');
 }


 


public function malla()
{
	$idOp=$this->input->get('idOp');
	
	$url_ce='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php?idOp='.$idOp.'&action=malla';			
	$ch = curl_init($url_ce);//URL A ENVIAR EL CONTENIDO
    curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL =>  $url_ce));
    $response = curl_exec($ch); 		
	curl_close($ch);
	//$jsondecode = json_decode($response);
	
	echo $response;
	
/*
	if($jsondecode){
	 $this->load->view('testing',array('error' =>$error ,'malla'=>$response,'idOp'=>$idOp));
	}else{
	 $this->load->view('testing', array('error' =>$error ,'malla'=>false,'idOp'=>$idOp));
	} 
 */	
}   
	
	
	
	
}



?>