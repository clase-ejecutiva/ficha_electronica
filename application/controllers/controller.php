<?php
 header("Access-Control-Allow-Origin: *"); 
 define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
//require(APPPATH.'/libraries/wsLandingBeca.php');

class Controller extends CI_Controller {

  	public function __construct()
   {
        parent::__construct(); 
       	$this->load->helper(array('form', 'url','download'));  //carga las funciones 
        $this->load->model('ficha_model');
   }

   
  public function test(){
	  
	  //$this->email_exito('xquinteros@diplomadosuc.cl','Ximena','crmoyag@uc.cl','0062L00000TuZrfQAF');
	 // $this->emailEjecutiva('cmoya@diplomadosuc.cl','to','0062L00000RHyGEQA1'); 
	  //var_dump($this->email->print_debugger());
	
	  //http://devficha.claseejecutiva.com/index.php/controller/test
	  $sku_producto = $this->ficha_model->consulta_sku_op('0062L00000Usw7iQAB');
	  $data= $this->ficha_model->consulta_etapa('0062L00000TuZrfQAF');
	  echo '<pre>';
	  die(print_r($sku_producto));
  } 

public function index()
{
	
	
	$idOp=$this->input->get('idOp');
	$dolar=667;
	
	$url_crear='http://ws.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php?idOp='.$idOp.'&action=iniciarficha';
					
	$ch1 = curl_init($url_crear);//URL A ENVIAR EL CONTENIDO
	curl_setopt_array($ch1, array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_URL =>  $url_crear));
	$response = curl_exec($ch1); 
	curl_close($ch1);
	
	
	if(isset($_COOKIE['FichaCe'])){
		//if(false){
		$cookie=$_COOKIE['FichaCe'];
		$dataCookie=json_decode($cookie);
		//Consultamos a la BBDD
		$data= $this->ficha_model->consulta_etapa($idOp);
	    //Pais Residencia	
		$residencia= $this->ficha_model->pais_residencia($idOp);
		$form_step2=json_decode($residencia['form']);
		 foreach($data as $key){
			 if($key!=null ){
				$STEP[]=$key->ETAPA;
			 }
		 }
		$step=array('STEP'=>end($STEP));
		//print_r($pais);
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
		 $this->load->view('v3',array('error' =>$error ,'jsondecode'=>$jsondecode,'idOp'=>$idOp,'step'=>$step,'form2'=>$form_step2,'dolar_ce'=>$jsondecode->dataOp->fields->Valor_Dolar__c));
		}else{
		 $this->load->view('v3', array('error' =>$error ,'jsondecode'=>false,'idOp'=>$idOp));
		}		

	
	}else{
	
	$this->ficha_cookies('crear');
	
		$data= $this->ficha_model->consulta_etapa($idOp);
	    //Pais Residencia	
		$residencia= $this->ficha_model->pais_residencia($idOp);

		$form_step2=json_decode($residencia['form']);

		 foreach($data as $key){
			 if($key!=null ){
				$STEP[]=$key->ETAPA;
			 }
		 }
		$step=array('STEP'=>end($STEP));

		$url_ce='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php?idOp='.$idOp.'&action=buscarOp';			
		$ch = curl_init($url_ce);//URL A ENVIAR EL CONTENIDO
		curl_setopt_array($ch, array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_URL =>  $url_ce));
		$response = curl_exec($ch); 		
		curl_close($ch);
		$jsondecode = json_decode($response);	


       //Verificamos la etapa de la ficha

		if($step){
		// $this->load->view('v3',array('error' =>$error ,'jsondecode'=>$jsondecode,'idOp'=>$idOp));
		 $this->load->view('v3',array('error' =>$error ,'jsondecode'=>$jsondecode,'idOp'=>$idOp,'step'=>$step,'form2'=>$form_step2,'dolar_ce'=>$jsondecode->dataOp->fields->Valor_Dolar__c));			
		}else{
		 //$this->load->view('v3', array('error' =>$error ,'jsondecode'=>false,'idOp'=>$idOp));
		$this->load->view('v3',array('error' =>$error ,'jsondecode'=>$jsondecode,'idOp'=>$idOp));	
		}
		
		
	}
	
	
	
	
	
	
}

public function ficha_cookies($accion)
{
	//1 semana de duracion
	date_default_timezone_set("America/Santiago");	
	$fecha=date('Y-m-d G:i:s');
	$idOp=$this->input->get('idOp');
	
	if($this->input->get('s')){
	$testing_sf=true;	
	}else{
	$testing_sf=false;	
	}
	
   // $testing_sf=$this->input->get('s');
	//Cuando la Url es directa ejemplo click en http://www.claseejecutiva.com/beca-aniversario/?_anivhome&a0d1a000009P3C6
$data=json_encode(array('idOp'=>$idOp,'FechaCreacion'=>$fecha,'Server'=>base64_encode($_SERVER['HTTP_USER_AGENT']),'testing_sf'=>$testing_sf));
	
	switch($accion){ 
		 case 'crear':
		 $crear_cookie=true;
		 break;
		 
		 case 'borrar':
		// setcookie('FichaCe',$data, time()-604800,'/','ficha.claseejecutiva.com',false,false); 
		 setcookie('FichaCe',$data, time()-604800,'/',$_SERVER['HTTP_HOST'],false,false); 
		 //unset($_COOKIE["FichaCe"]);
		 //$crear_cookie=true;
		 break; 
	}
	
	if($crear_cookie){
		//3600    = 1 hora
		//604800  = 168 hora (1 semana)
		//2678400 = 744 hora (31 dias mes)
		//1 mes
		//setcookie('FichaCe',$data, time()+2678400,$_SERVER['HTTP_HOST'],false,false); 
		//1 semana
		//setcookie('FichaCe',$data, time()+604800,'/','ficha.claseejecutiva.com',false,false); 
		setcookie('FichaCe',$data, time()+604800,'/',$_SERVER['HTTP_HOST'],false,false); 
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
	 $this->load->view('v3',array('error' =>$error ,'jsondecode'=>$jsondecode,'idOp'=>$idOp));
	}else{
	 $this->load->view('v3', array('error' =>$error ,'jsondecode'=>false,'idOp'=>$idOp));
	}
}

   //Funciones que guardan los Estados de inscripsion
	public function step_1(){
	//$this->ficha_cookies('borrar');		
	date_default_timezone_set("America/Santiago");	
	$Post=$this->input->post();
	$fecha=date('Y-m-d G:i:s');
	$status=$this->ficha_model->ingresar_step_1($Post['idOp'],json_encode($Post),$fecha);	
		if($status){
	//	$this->ficha_cookies('crear');	
		echo json_encode(array('status'=>'ok','bbdd'=>$status),true);	
		}else{
		echo json_encode(array('status'=>'error','bbdd'=>$status),true);		
		}
	}

	public function step_2(){
	//$this->ficha_cookies('borrar');		
	date_default_timezone_set("America/Santiago");	
	$Post=$this->input->post();
	$fecha=date('Y-m-d G:i:s');
	$status=$this->ficha_model->ingresar_step_2($Post['idOp'],json_encode($Post),$fecha);	
		if($status){
		//$this->ficha_cookies('crear');		
		echo json_encode(array('status'=>'ok','bbdd'=>$status),true);	
		}else{
		echo json_encode(array('status'=>'error','bbdd'=>$status),true);		
		}
	}

	public function step_3(){
	//$this->ficha_cookies('borrar');		
	date_default_timezone_set("America/Santiago");	
	$Post=$this->input->post();
	$fecha=date('Y-m-d G:i:s');
	$status=$this->ficha_model->ingresar_step_3($Post['idOp'],json_encode($Post),$fecha);	
		if($status){
		//$this->ficha_cookies('crear');		
		echo json_encode(array('status'=>'ok','bbdd'=>$status),true);	
		}else{
		echo json_encode(array('status'=>'error','bbdd'=>$status),true);		
		}
	}	

	public function step_4(){
	//$this->ficha_cookies('borrar');		
	date_default_timezone_set("America/Santiago");	
	$Post=$this->input->post();
	$fecha=date('Y-m-d G:i:s');
	$status=$this->ficha_model->ingresar_step_4($Post['idOp'],json_encode($Post),$fecha);
		if($status){
		//$this->ficha_cookies('crear');		
		echo json_encode(array('status'=>'ok','bbdd'=>$status),true);	
		}else{
		echo json_encode(array('status'=>'error','bbdd'=>$status),true);		
		}
	}
	
	
	public function get_comuna()
	{
	$id_comuna=$this->input->post('id_comuna');
	$bbdd=$this->ficha_model->consulta_comuna($id_comuna);
   if($bbdd){	
     echo json_encode(array('status'=>'ok','comunas'=>$bbdd),true);
         }else{
	 echo json_encode(array('status'=>'error','comunas'=>$bbdd),true);
		}
	}

  //Consulta estados
   public function consulta_etapa( ){
	 
    if($this->input->get('idOp')){
		$idOp=$this->input->get('idOp');
	}else{
		$idOp=$this->input->post('idOp');
	}	
      $data= $this->ficha_model->consulta_etapa($idOp);	  
	   echo (json_encode($data));   
   } 
   
  //Forma de Pagos 
   public function chequePropios(){
	$idOp=$this->input->post('idOp'); 
    $data= $this->ficha_model->consulta_etapa($idOp);
	$form1=$data[0]->form;
	$form2=$data[1]->form;
	/*
	$pagador = new stdClass;
	$pagador->dni             = $data[0]->form->dni;
	$pagador->nombre          = $data[0]->form->nombre;
	$pagador->apellidoPaterno = $data[0]->form->apellidoPaterno;
	$pagador->apellidoMaterno = $data[0]->form->apellidoMaterno;
	$pagador->email           = $data[0]->form->email;
	$pagador->tel             = $data[0]->form->tel;
	$pagador->Valor           = $data[0]->form->montoFinal;
	*/
    echo json_encode(array($form1,$form2));	
   }
	
    public function do_upload()
	{			
		$Post=$this->input->post();
		$dataForm=$this->ficha_model->consulta_etapa($Post['idOp']);
		
        $form_step_1=json_decode($dataForm[0]->form);
        $form_step_2=json_decode($dataForm[1]->form);
        $form_step_3=json_decode($dataForm[2]->form);
        $form_step_4=json_decode($dataForm[3]->form);
		

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
			
		$form_step_1=json_decode($dataForm[0]->form);	
		$BBDD=$this->ficha_model->ingresar_ficha($dataForm[0]->idOp,$form_step_1->email,json_encode($data_form));	
		
		//mpago ($dataForm[2]->form
		/*
        $form_step_1;
        $form_step_2;
        $form_step_3;
        $form_step_4;		
		*/
		$productos=json_decode($form_step_1->productos);
		 /*
		 Diccionario Medio de pago , Para ficha electronica solo es el numero
			Depósito(1)	
			Cheque(2)	
			Orden de Compra(3)	
			Orden de Compra OTIC(4)	
			Pago en Cuotas	Pago en Cuotas(5)
			POS	POS(6)	
		    WebPay(7)	
			Transferencia Bancaria Internacional(8)	
		*/	
		
		switch($form_step_3->mpago)
		{
            case 'mpagoTranferencia':
			$dataForm = array (      // Account 
			                          'idOp'=>$form_step_1->idOp,
									  'action'=>'CrearFicha', 
									  'IdCuenta'=>$form_step_1->IdCuenta,								  
									  'IdOwner'=>$form_step_1->ejecutivaIdOwner,								  
									  'nombre'=>$form_step_1->nombre,	
									  'apellidoPaterno' =>$form_step_1->apellidoPaterno,
									  'apellidoMaterno'=>$form_step_1->apellidoMaterno,
									  'dni' =>$form_step_1->dni,
									  'email' =>$form_step_1->email,										  
									  'tipo_documento'=>$form_step_1->tipo_documento,
									  'f_nacimiento'=>date('Y-m-d', strtotime($form_step_1->f_nacimiento)),
									  'empresa'=>'',
									  'cargo'=>'',									  
									  'genero' =>$form_step_1->genero,
									  'estado_civil' =>$form_step_1->estado_civil,
									  'dir'=>$form_step_2->dir,
									  'dir_num'=>$form_step_2->dir_num,
									  'dir_depto'=>$form_step_2->dir_depto,									  
									  'dir_complemento'=>$form_step_2->dir_complemento,
									  'pais_aux'=>$form_step_1->pais,							  
									  'region'=>$form_step_2->region_residencia,
									  'comuna'=>$form_step_2->comuna_residencia,			
									  'pais'=>$form_step_2->pais_residencia,
									  'tel'=>$form_step_1->tel,
									  'ciudad'=>$form_step_2->ciudad_extranjera,
                                      //Fin Account
									  //Oportunidad
									  'url_descarga'=>base_url().'index.php/controller/descargar_archivo?f='.$form_step_1->idOp,									  
									  //Fin Oportunidad
                                      //Ficha Electronica
									  'mpago'=>'Transferencia Bancaria Internacional(8)',
									  'mpagoFicha'=>'8',
									  'tipo_p'=>'Natural(1)',
									  'RUT__c'=>$form_step_1->dni,
									  'Nombre_del_Pagador__c'=>$form_step_1->nombre,
									  'Apellido_del_Pagador__c'=>$form_step_1->apellidoPaterno,
									  'email_pagador'=>$form_step_1->email,
									  'T_lefono__c'=>$form_step_1->tel,
									  'Direcci_n__c'=>$form_step_2->dir,
									  'Ciudad__c'=>$form_step_2->ciudad_extranjera,
									  'Pais__c'=>$form_step_2->pais_residencia,
									  'Ciudad__c'=>$form_step_2->region_residencia,
									  'Comuna__c'=>$form_step_2->comuna_residencia,
									  //Activos del Contrato
									  'productos'=>$form_step_1->productos,
									  'monto_final'=>$form_step_3->montoFinal
									  );								  
			break;			

            case 'mpagoCuponera':
			$dataForm = array (      // Account 
			                          'idOp'=>$form_step_1->idOp,
									  'action'=>'CrearFicha', 
									  'IdCuenta'=>$form_step_1->IdCuenta,								  
									  'IdOwner'=>$form_step_1->ejecutivaIdOwner,								  
									  'nombre'=>$form_step_1->nombre,	
									  'apellidoPaterno' =>$form_step_1->apellidoPaterno,
									  'apellidoMaterno'=>$form_step_1->apellidoMaterno,
									  'dni' =>$form_step_1->dni,
									  'email' =>$form_step_1->email,										  
									  'tipo_documento'=>$form_step_1->tipo_documento,
									  'f_nacimiento'=>date('Y-m-d', strtotime($form_step_1->f_nacimiento)),
									  'empresa'=>'',
									  'cargo'=>'',									  
									  'genero' =>$form_step_1->genero,
									  'estado_civil' =>$form_step_1->estado_civil,
									  'dir'=>$form_step_2->dir,
									  'dir_num'=>$form_step_2->dir_num,
									  'dir_depto'=>$form_step_2->dir_depto,									  
									  'dir_complemento'=>$form_step_2->dir_complemento,
									  'pais_aux'=>$form_step_1->pais,							  
									  'region'=>$form_step_2->region_residencia,
									  'comuna'=>$form_step_2->comuna_residencia,			
									  'pais'=>$form_step_2->pais_residencia,
									  'tel'=>$form_step_1->tel,
									  'ciudad'=>$form_step_2->ciudad_extranjera,
                                      //Fin Account
									  //Oportunidad
									  'url_descarga'=>base_url().'index.php/controller/descargar_archivo?f='.$form_step_1->idOp,									  
									  //Fin Oportunidad
                                      //Ficha Electronica
									  'mpago'=>'Pago en Cuotas(5)',
									  'mpagoFicha'=>'5',
									  'tipo_p'=>'Natural(1)',
									  'RUT__c'=>$form_step_1->dni,
									  'Nombre_del_Pagador__c'=>$form_step_1->nombre,
									  'Apellido_del_Pagador__c'=>$form_step_1->apellidoPaterno,
									  'email_pagador'=>$form_step_1->email,
									  'T_lefono__c'=>$form_step_1->tel,
									  'Direcci_n__c'=>$form_step_2->dir,
									  'Ciudad__c'=>$form_step_2->ciudad_extranjera,
									  'Pais__c'=>$form_step_2->pais_residencia,
									  'Ciudad__c'=>$form_step_2->region_residencia,
									  'Comuna__c'=>$form_step_2->comuna_residencia,
									  //Activos del Contrato
									  'productos'=>$form_step_1->productos,
									  'monto_final'=>$form_step_3->montoFinal,
									  //Detalle de pago
									  'Cuotas_Cuponera'=>$form_step_3->Cuotas_Cuponera,
									  'Fecha_cuota_1'=>$form_step_3->Fecha_cuota_1,
									  'Fecha_cuota_2'=>$form_step_3->Fecha_cuota_2,
									  );								  
			break;						
			
			case 'mpagoCheque':
			$dataForm = array (      // Account 
			                          'idOp'=>$form_step_1->idOp,
									  'action'=>'CrearFicha', 
									  'IdCuenta'=>$form_step_1->IdCuenta,								  
									  'IdOwner'=>$form_step_1->ejecutivaIdOwner,								  
									  'nombre'=>$form_step_1->nombre,	
									  'apellidoPaterno' =>$form_step_1->apellidoPaterno,
									  'apellidoMaterno'=>$form_step_1->apellidoMaterno,
									  'dni' =>$form_step_1->dni,
									  'email' =>$form_step_1->email,										  
									  'tipo_documento'=>$form_step_1->tipo_documento,
									  'f_nacimiento'=>date('Y-m-d', strtotime($form_step_1->f_nacimiento)),
									  'empresa'=>'',
									  'cargo'=>'',									  
									  'genero' =>$form_step_1->genero,
									  'estado_civil' =>$form_step_1->estado_civil,
									  'dir'=>$form_step_2->dir,
									  'dir_num'=>$form_step_2->dir_num,
									  'dir_depto'=>$form_step_2->dir_depto,									  
									  'dir_complemento'=>$form_step_2->dir_complemento,
									  'pais_aux'=>$form_step_1->pais,							  
									  'region'=>$form_step_2->region_residencia,
									  'comuna'=>$form_step_2->comuna_residencia,			
									  'pais'=>$form_step_2->pais_residencia,
									  'tel'=>$form_step_1->tel,
									  'ciudad'=>$form_step_2->ciudad_extranjera,
                                      //Fin Account
									  //Oportunidad
									  'url_descarga'=>base_url().'index.php/controller/descargar_archivo?f='.$form_step_1->idOp,									  
									  //Fin Oportunidad
                                      //Ficha Electronica
									  'mpago'=>'Cheque(2)',
									  'mpagoFicha'=>'2',
									  'tipo_p'=>'Natural(1)',
									  'RUT__c'=>$form_step_1->dni,
									  'Nombre_del_Pagador__c'=>$form_step_1->nombre,
									  'Apellido_del_Pagador__c'=>$form_step_1->apellidoPaterno,
									  'email_pagador'=>$form_step_1->email,
									  'T_lefono__c'=>$form_step_1->tel,
									  'Direcci_n__c'=>$form_step_2->dir,
									  'Ciudad__c'=>$form_step_2->ciudad_extranjera,
									  'Pais__c'=>$form_step_2->pais_residencia,
									  'Ciudad__c'=>$form_step_2->region_residencia,
									  'Comuna__c'=>$form_step_2->comuna_residencia,
									  //Activos del Contrato
									  'productos'=>$form_step_1->productos,
									  'monto_final'=>$form_step_3->montoFinal
									  );									  
			//die(print_r($dataForm));
			break;
			
			
            case 'mpagoWebpay':
			$dataForm = array (      // Account 
			                          'idOp'=>$form_step_1->idOp,
									  'action'=>'CrearFicha', 
									  'IdCuenta'=>$form_step_1->IdCuenta,								  
									  'IdOwner'=>$form_step_1->ejecutivaIdOwner,								  
									  'nombre'=>$form_step_1->nombre,	
									  'apellidoPaterno' =>$form_step_1->apellidoPaterno,
									  'apellidoMaterno'=>$form_step_1->apellidoMaterno,
									  'dni' =>$form_step_1->dni,
									  'email' =>$form_step_1->email,										  
									  'tipo_documento'=>$form_step_1->tipo_documento,
									  'f_nacimiento'=>date('Y-m-d', strtotime($form_step_1->f_nacimiento)),
									  'empresa'=>'',
									  'cargo'=>'',									  
									  'genero' =>$form_step_1->genero,
									  'estado_civil' =>$form_step_1->estado_civil,
									  'dir'=>$form_step_2->dir,
									  'dir_num'=>$form_step_2->dir_num,
									  'dir_depto'=>$form_step_2->dir_depto,									  
									  'dir_complemento'=>$form_step_2->dir_complemento,
									  'pais_aux'=>$form_step_1->pais,							  
									  'region'=>$form_step_2->region_residencia,
									  'comuna'=>$form_step_2->comuna_residencia,			
									  'pais'=>$form_step_2->pais_residencia,
									  'tel'=>$form_step_1->tel,
									  'ciudad'=>$form_step_2->ciudad_extranjera,
                                      //Fin Account
									  //Oportunidad
									  'url_descarga'=>base_url().'index.php/controller/descargar_archivo?f='.$form_step_1->idOp,									  
									  //Fin Oportunidad
                                      //Ficha Electronica
									  'mpago'=>'WebPay(7)',
									  'mpagoFicha'=>'7',
									  'tipo_p'=>'Natural(1)',
									  'RUT__c'=>$form_step_1->dni,
									  'Nombre_del_Pagador__c'=>$form_step_1->nombre,
									  'Apellido_del_Pagador__c'=>$form_step_1->apellidoPaterno,
									  'email_pagador'=>$form_step_1->email,
									  'T_lefono__c'=>$form_step_1->tel,
									  'Direcci_n__c'=>$form_step_2->dir,
									  'Ciudad__c'=>$form_step_2->ciudad_extranjera,
									  'Pais__c'=>$form_step_2->pais_residencia,
									  'Ciudad__c'=>$form_step_2->region_residencia,
									  'Comuna__c'=>$form_step_2->comuna_residencia,
									  //Activos del Contrato
									  'productos'=>$form_step_1->productos,
									  'monto_final'=>$form_step_3->montoFinal
									  );									  
			//die(print_r($dataForm));
			break;
			
            case 'mpagoOC':
			$tablaOC=json_decode($form_step_3->tabla_oc);
			$dataForm = array (      // Account 
			                          'idOp'=>$form_step_1->idOp,
									  'action'=>'CrearFicha', 
									  'IdCuenta'=>$form_step_1->IdCuenta,								  
									  'IdOwner'=>$form_step_1->ejecutivaIdOwner,								  
									  'nombre'=>$form_step_1->nombre,	
									  'apellidoPaterno' =>$form_step_1->apellidoPaterno,
									  'apellidoMaterno'=>$form_step_1->apellidoMaterno,
									  'dni' =>$form_step_1->dni,
									  'email' =>$form_step_1->email,										  
									  'tipo_documento'=>$form_step_1->tipo_documento,
									  'f_nacimiento'=>date('Y-m-d', strtotime($form_step_1->f_nacimiento)),
									  'empresa'=>'',
									  'cargo'=>'',									  
									  'genero' =>$form_step_1->genero,
									  'estado_civil' =>$form_step_1->estado_civil,
									  'dir'=>$form_step_2->dir,
									  'dir_num'=>$form_step_2->dir_num,
									  'dir_depto'=>$form_step_2->dir_depto,									  
									  'dir_complemento'=>$form_step_2->dir_complemento,
									  'pais_aux'=>$form_step_1->pais,							  
									  'region'=>$form_step_2->region_residencia,
									  'comuna'=>$form_step_2->comuna_residencia,			
									  'pais'=>$form_step_2->pais_residencia,
									  'tel'=>$form_step_1->tel,
									  'ciudad'=>$form_step_2->ciudad_extranjera,
                                      //Fin Account
									  //Oportunidad
									  'url_descarga'=>base_url().'index.php/controller/descargar_archivo?f='.$form_step_1->idOp,									  
									  //Fin Oportunidad
                                      //Ficha Electronica
									  'mpago'=>'Orden de Compra(3)',
									  'mpagoFicha'=>'3',
									  'tipo_p'=>'Juridica(2)',
									  'RUT__c'=>$tablaOC[0]->rut,
									  'Nombre_del_Pagador__c'=>$tablaOC[0]->datoPagador,
									  'Apellido_del_Pagador__c'=>'',
									  'email_pagador'=>'',
									  'T_lefono__c'=>'',
									  'Direcci_n__c'=>$tablaOC[0]->direccion,
									  'Ciudad__c'=>'',
									  'Pais__c'=>$form_step_2->pais_residencia,
									  'Ciudad__c'=>'',
									  'Comuna__c'=>'',
									  //Activos del Contrato
									  'productos'=>$form_step_1->productos,
									  'monto_final'=>$tablaOC[0]->total
									  );									  
			//die(print_r($dataForm));
			break;
			
			case 'mpagoOtra':

		    $data=array();

			
			//tabla_resumen_mpago
			 if($form_step_3->tabla_resumen_mpago){	
			 $mpago=json_decode($form_step_3->tabla_resumen_mpago);
			 }else{
			 $mpago=json_decode($form_step_3->tabla_resumencheques);	
			}
		
			foreach($mpago as $k=>$v){
			if($v->medioPago==='Cheques Propios')
			{
				$mpago='Cheque(2)';
				$mpagoFicha=2;
				$tpersona='Natural(1)';
			}
			if($v->medioPago==='Deposito')
			{
				$mpago='Depósito(1)';
				$mpagoFicha=1;
				$tpersona='Natural(1)';
				$tipo_identificacion='Cédula de Identidad(1)';
			}
			if($v->medioPago==='Pago en Oficina')
			{
				$mpago='POS(6)';
				$mpagoFicha=6;
				$tpersona='Natural(1)';
			}
			if($v->medioPago==='Web Pay')
			{
				$mpago='WebPay(7)';
				$mpagoFicha=7;
				$tpersona='Natural(1)';
			}
			if($v->medioPago==='Cheques Tercero')
			{
				$mpago='Cheque(2)';
				$mpagoFicha=2;
				if($v->apellidoP!=''){
					$tpersona='Natural(1)';
					}else{
					$tpersona='Juridica(2)';	
					}
			}
			if($v->medioPago==='Orden de Compra')
			{
				$mpago='Orden de Compra(3)';
				$mpagoFicha=3;
				$tpersona='Juridica(2)';
				/*
				$datosOC=array(
								'rut_oc'=>$form_step_3->rut_oc,
								'razon_social'=>$form_step_3->razon_social,
								'dir_emp'=>$form_step_3->dir_emp,
								'comuna_emp'=>$form_step_3->comuna_emp,
								'telefono_emp'=>$form_step_3->telefono_emp,
								'atencion_emp'=>$form_step_3->atencion_emp,
								'mail_contacto_emp'=>$form_step_3->mail_contacto_emp,
								'nro_oc'=>$form_step_3->nro_oc,
								'telefono_encargado'=>$form_step_3->telefono_encargado,
								'total_oc'=>$form_step_3->total_oc
						      );
				*/
			}      	

			$obj = new stdClass();
			$obj->medioPago=$mpago;
			$obj->mpagoFicha=$mpagoFicha;
			$obj->tpersona=$tpersona;
			$obj->rut=$v->rut;
			$obj->datoPagador=$v->datoPagador;
			$obj->nombre=$v->nombre;
			$obj->apellidoP=$v->apellidoP;
			$obj->apellidoM=$v->apellidoM;
			$obj->direccion=$v->direccion;
			$obj->pais=$v->pais;
			$obj->total=$v->total;
			
			//CHEQUES
            $dir_chq=explode('#',$v->direccion); 
			$obj->comuna_chq=$dir_chq[1];
			
			//OC
			$obj->rut_oc=$form_step_3->rut_oc;
			$obj->razon_social=$form_step_3->razon_social;
			$obj->dir_emp=$form_step_3->dir_emp;
			$obj->comuna_emp=$form_step_3->comuna_emp;
			$obj->telefono_emp=$form_step_3->telefono_emp;
			$obj->atencion_emp=$form_step_3->atencion_emp;
			$obj->mail_contacto_emp=$form_step_3->mail_contacto_emp;
			$obj->nro_oc=$form_step_3->nro_oc;
			$obj->telefono_encargado=$form_step_3->telefono_encargado;
			$obj->total_oc=$form_step_3->total_oc;

		
			
			
			//$obj->datosOC=$datosOC;
			$data[]=$obj;			
			}
				
		   //die(print_r($data));
		   //Parametos de testing SF
		   	$cookie_aux=$_COOKIE['FichaCe'];
	        $dataCookie_aux=json_decode($cookie_aux);
			
			
			if($dataCookie_aux->testing_sf == 1){
			//	die(print_r($dataCookie_aux));
			$testing_sf=true;
			}else{
				//die(print_r($dataCookie_aux));
			$testing_sf='false';
			}
			
			$dataForm = array (      // Account 
			                          'idOp'=>$form_step_1->idOp,
									  'action'=>'CrearFicha', 
									  'testing_sf'=>str_replace(' ','false',$testing_sf),
									  'mpago'=>'mpagoOtra',
									  'IdCuenta'=>$form_step_1->IdCuenta,								  
									  'IdOwner'=>$form_step_1->ejecutivaIdOwner,								  
									  'nombre'=>$form_step_1->nombre,	
									  'apellidoPaterno' =>$form_step_1->apellidoPaterno,
									  'apellidoMaterno'=>$form_step_1->apellidoMaterno,
									  'dni' =>$form_step_1->dni,
									  'email' =>$form_step_1->email,										  
									  'tipo_documento'=>$form_step_1->tipo_documento,
									  'f_nacimiento'=>date('Y-m-d', strtotime($form_step_1->f_nacimiento)),
									  'empresa'=>'',
									  'cargo'=>'',									  
									  'genero' =>$form_step_1->genero,
									  'estado_civil' =>$form_step_1->estado_civil,
									  'dir'=>$form_step_2->dir,
									  'dir_num'=>$form_step_2->dir_num,
									  'dir_depto'=>$form_step_2->dir_depto,									  
									  'dir_complemento'=>$form_step_2->dir_complemento,
									  'pais_aux'=>$form_step_1->pais,							  
									  'region'=>$form_step_2->region_residencia,
									  'comuna'=>$form_step_2->comuna_residencia,			
									  'pais'=>$form_step_2->pais_residencia,
									  'tel'=>$form_step_1->tel,
									  'ciudad'=>$form_step_2->ciudad_extranjera,
                                      //Fin Account
									  //Oportunidad
									  'url_descarga'=>base_url().'index.php/controller/descargar_archivo?f='.$form_step_1->idOp,									  
									  //Fin Oportunidad
									  'data_mpagos'=>json_encode($data),
									  'productos'=>$form_step_1->productos
									  );	
							  
			break;
			
		}
		//die(print_r($dataForm));
		
				foreach ( $dataForm as $key => $value) {
				$post_items[] = $key . '=' . $value;
			   }			
				$post_string = implode ('&', $post_items);	

				
				$sku_producto = $this->ficha_model->consulta_sku_op($form_step_1->idOp);
				
				//die(print_r($form_step_1->idOp));
				
				$unidad= $this->ficha_model->consulta_unidad_sf($sku_producto);		
				
				//die(print_r($unidad));
				
				if($testing_sf){
					if($unidad == 'Teleduc (E-Commerce)' or $unidad == 'EnglishUC' ){

					$url_ce='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php';			
					}else{
				
					$url_ce='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcionV2.php';			
					}				
				}else{  
				   
					$url_ce='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php';	
				}	
				//die(print_r($url_ce));	
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
				
				//debug Level 0
				//die(print_r($response));
				//debug Level 1
			//echo '<pre>';
			//die(print_r($responceUpdate));
				

				
				$cuenta=$responceUpdate->account[0]->id;
				$op=$responceUpdate->opportunity[0]->id;
				$ficha=$responceUpdate->ficha[0]->id;
				
				if($cuenta!=null && $op!=null && $ficha!=null){
				$response=array('status'=>'ok');
				$var=json_encode($response);
				echo $var;
				$this->email_exito($form_step_1->ejecutivaEmail,$form_step_1->ejecutivaName,$form_step_1->email,$form_step_1->idOp);
				
				$this->ficha_model->ingresar_log(json_encode($dataForm),$form_step_1->idOp,'ACEPTADO',$var);	
				}else{
				//produccion	
				//$response=array('status'=>$responceUpdate);
				$response=array('status'=>'ok','log'=>$responceUpdate);
				$var=json_encode($response);
				echo $var;	
                $this->email_exito($form_step_1->ejecutivaEmail,$form_step_1->ejecutivaName,$form_step_1,$form_step_1->idOp);
				$this->ficha_model->ingresar_log(json_encode($dataForm),$form_step_1->idOp,'RECHAZADO',$var);	
				
				}		
		

	}	

	}


	private function email_exito($email,$ejec,$emailAlumno,$idOp)
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
			 $pieFirma='
						Saluda Atte.<br><br>
						'.$ejec.'<br>
                        Ejecutiva de Admisión y Matricula<br>						
						'.$email.'<br> 					
						Clase Ejecutiva <br>
						Pontificia Universidad Católica de Chile<br>
						https://www.claseejecutiva.uc.cl';
						   
			//cargamos la configuración para enviar con gmail
			$this->email->initialize($configGmail);
			  
			$this->email->from($email);
			$this->email->to($emailAlumno);
			//$this->email->to('cristian8x@gmail.com');
			//$this->email->bcc($email);
			$this->email->subject('Pontificia Universidad Católica de Chile, postulación recibida correctamente.');
			
			$this->email->message('Estimado(a)&nbsp;Alumno(a):<br><br>Gracias por su postulacion!,Le informamos que hemos recibido correctamente sus datos.
			Para más información o consultas,por favor contactarse con su ejecutiva de admisión. 
									<br><br>'.$pieFirma);
			//$this->email->attach('./contents/images/Datos_CE.pdf', 'Datos_Importantes');
			//$this->email->attach('./contents/images/Alternativa_de_pagos.pdf', 'Datos_Importantes');

			 //$this->email->message('test');
			if($this->email->send()){
				 $this->emailEjecutiva($email,$ejec,$idOp);
			}
			//con esto podemos ver el resultado
			//var_dump($this->email->print_debugger());
	}	
	
	
	private function emailEjecutiva($email,$ejec,$idOp)
	{
			//cargamos la libreria email de ci (CodeIgniter)
			$this->load->library("email");
			//configuracion para gmail
			
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
			/*
			$configGmail = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'soporte@diplomadosuc.cl',
				'smtp_pass' => 'admce8282',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
			); 
			*/
			
			 $pieFirma='
						Saluda Atte.<br><br>
                        Equipo de TI Clase Ejecutiva UC<br>						
						Clase Ejecutiva <br>
						Pontificia Universidad Católica de Chile<br>
						https://www.claseejecutiva.uc.cl';
						   
			//cargamos la configuración para enviar con gmail
			$this->email->initialize($configGmail);
			  
			$this->email->from('soporte@diplomadosuc.cl');
			$this->email->to($email);
			//$this->email->to('cristian8x@gmail.com');
			//$this->email->bcc($email);
			$this->email->subject('Pontificia Universidad Católica de Chile, postulación recibida correctamente.');
			
			$this->email->message('Estimado(a)&nbsp;:'.$ejec.'<br><br>La siguiente Postulacion ya se encuentra finalizada.
			Para más información o consultas,ingresa en el siguiente link.<a href="https://claseejecutiva.lightning.force.com/'.$idOp.'">AQUI</a> <br>
			<h1>Favor de No responder este Email </h1><br>
									<br><br>'.$pieFirma);
			//$this->email->attach('./contents/images/Datos_CE.pdf', 'Datos_Importantes');
			//$this->email->attach('./contents/images/Alternativa_de_pagos.pdf', 'Datos_Importantes');

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
		$cookie=$_COOKIE['FichaCe'];
	    $dataCookie=json_decode($cookie);	
        $unidad= $this->ficha_model->consulta_unidad_sf($idOp);		

        //die(print_r($dataCookie));
        
		if($dataCookie->testing_sf){
			if($unidad == 'Teleduc (E-Commerce)' or $unidad == 'EnglishUC' ){
			//die(print_r('V1'));	
			$url_ce='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php?idOp='.$idOp.'&action=malla';			
			}else{
			//die(print_r('V2'));	
			$url_ce='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcionV2.php?idOp='.$idOp.'&action=malla';			
			}
		}else{	
			
			$url_ce='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php?idOp='.$idOp.'&action=malla';
		}
		
		$ch = curl_init($url_ce);//URL A ENVIAR EL CONTENIDO
		curl_setopt_array($ch, array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_URL =>  $url_ce));
		$response = curl_exec($ch); 		
		curl_close($ch);
		//$jsondecode = json_decode($response);
		
		echo $response;
		
	}

public function back_step()
{
	$step=$this->input->post('step');
	$idOp=$this->input->post('idOp');	
	
	if(isset($step) and isset($idOp)){
	$status = $this->ficha_model->delete_step($step,$idOp);	
	   if($status){		
		    echo json_encode(array('status'=>'ok','bbdd'=>$status),true);	
		}else{
			echo json_encode(array('status'=>'error','bbdd'=>$status),true);		
		}
	}else{
		echo json_encode(array('status'=>'error','bbdd'=>'Faltan Parametros'),true);
	}		
}	
	
	
	
	
}



?>
