<?php
 header("Access-Control-Allow-Origin: *"); 
 define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
//require(APPPATH.'/libraries/wsLandingBeca.php');
require(APPPATH.'/libraries/curl.php');
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
		/*
		array Post
		$Post['idOp'] => 0061a00000MUJyVAAX
			[f_inscripcion] => 10/01/2018
			[ejecutivo] => Ana Maria Menares
			[valor] => CLP 6.075.000
			[nombre] => Christian Graniffo
			[apellido] => Toro
			[dni] => 345345
			[empresa] => dfgfd
			[cargo] => dfgdfg
			[dir] => gdfg
			[pais] => Albania
			[comuna] => -
			[ciudad] => dfgfdg
			[tel] => 9977665
			[email] => graniffo@gmail.com
			[mpago] => 3
			[acepta] => 1
	
		if($Post){
		//echo json_encode(array('respuesta'=>'Okales'));
		echo print_r($Post);
		
		}
			*/
		
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
		/*
		$url_update='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcion.php?idOp='.$Post['idOp'].'&action=updateCta';		
		$dataForm = array (
								  'nombre'=>$_POST['nombre'],	
								  'apellidoPaterno' =>$_POST['apellidoPaterno'],
								  'Apellido_Materno'=>$_POST['apellidoMaterno'],
								  'dni' =>$_POST['dni'],
								  'empresa'=>$_POST['empresa'],
								  'cargo'=>$_POST['cargo'],
								  'dir'=>$_POST['dir'],
								  'pais'=>$_POST['pais'],
								  'email' =>$_POST['email'],
								  'region'=>$_POST['region'],	
								  'comuna'=>$_POST['comuna'],
								  'tel'=>$_POST['tel'],
								  'comuna'=>$_POST['comuna'],
								  'idOp'=>$_POST['idOp'],
								  'mpago'=>$_POST['mpago'],
								  'tipo_p'=>$_POST['tipo_p'],
								  //Datos del Alumno
								  'nom_pn'=>$_POST['nom_pn'],
								  'ape_pn'=>$_POST['ape_pn'],
								  'dir_pagador'=>$_POST['dir_pagador'],
								  'pais_pagador'=>$_POST['pais_pagador'],
								  'comuna'=>$_POST['comuna'],
								  //Datos Empresa
								  'razon_social'=>$_POST['razon_social'],
								  'giro'=>$_POST['giro'],
								  'web_e'=>$_POST['web_e'],
								  'nombre_rl'=>$_POST['nombre_rl'],
								  'nombre_rl'=>$_POST['nombre_rl'],
								  'nom_con'=>$_POST['nom_con'],
								  'ape_pat_con'=>$_POST['ape_pat_con'],
								  'ape_mat_con'=>$_POST['ape_mat_con'],
								  'cargo_con'=>$_POST['cargo_con'],
								  'email_con'=>$_POST['email_con'],
								  'tel_con'=>$_POST['tel_con'],
								  'url_descarga'=>json_encode($data_form)
								  );
		 $ch = curl_init($url_update);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
         curl_setopt($ch,CURLOPT_POST, count($dataForm));
         curl_setopt($ch, CURLOPT_POSTFIELDS,$dataForm);
         //obtenemos la respuesta
         $response =curl_exec($ch);
		//success
		$jsondecode = json_decode($response);
		
		die(print_r($jsondecode));
		*/
		
		
		echo'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
		echo'<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Datos Cargados con exito</h4>
				</div>
				<div class="modal-body">
				 <center>
				  
				  </center>
				</div>
				<div class="modal-footer">
				</div>
			  </div>
			</div>
		</div>';	
		echo '<script>$(document).ready(function() {$("#myModal").modal("show");});</script>';  
		
	}	

	}
	
	
public function descargar_archivo()
   {
	 $this->load->library('zip');
	 $idOp = $this->input->get('f');
     $data=$this->ficha_model->archivos($idOp);
     $archivos=json_decode($data['archivos']);	 

	foreach($archivos as $r){		
	$name =$r->nombre;
    $data =$r->org_nombre;
    $this->zip->add_data($name, $data);
	}
    $this->zip->download($idOp);	
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
	//die(print_r($jsondecode));
	//echo $response;
	

	if($jsondecode){
	 $this->load->view('modal',array('error' =>$error ,'malla'=>$response,'idOp'=>$idOp));
	}else{
	 $this->load->view('modal', array('error' =>$error ,'malla'=>false,'idOp'=>$idOp));
	} 
 	
}   
	
	
	
	
}



?>