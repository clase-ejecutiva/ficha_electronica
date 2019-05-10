<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
//require(APPPATH.'/libraries/wsLandingBeca.php');
require(APPPATH.'/libraries/curl.php');
class Chile extends CI_Controller {

  	public function __construct()
   {
        parent::__construct(); 
       	$this->load->helper(array('form', 'url','download'));  //carga las funciones 
        $this->load->model('candidato_model');
   }


public function index()
{
	 $this->load->view('chile', array('error' => ' ' ));
	//redirect('http://www.claseejecutiva.cl'); 
}


public function do_upload()
	{
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
		
		
		
		

		//Datos SalesForce
		//$origen='-';
		$origen=$this->input->post('marca');
		$comentario= '-';
		$acepta=1;
		$productos=$diplomados.','.$cursos;
		$nombreOportunidad='Oportunidad_nula';
		$idCampaña='a0M1a000004sOs5';

		$fecha=date('Y-m-d H:i:s');
		$files = $_FILES;

		$nom_archivo1=$files['userfile']['name'][0];
		$nom_archivo2=$files['userfile']['name'][1];


	    //$ruta1='D:/xampp/htdocs/landing/documentos/'.$nom_archivo1;
	    //$ruta2='D:/xampp/htdocs/landing/documentos/'.$nom_archivo2;

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
			            $this->load->view('chile', $error);

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
			//$url_ce='clasejec3.ing.puc.cl/apps/index.php?/seguimiento_controller/insertarPersonaOportunidadLandingSF/'.$email.'/'.$nombre.'/'.$apellido.'/'.$telefono.'/'.$cargo.'/'.$empresa.'/'.$pais.'/'.$region.'/'.$comentario.'/'.$origen.'/'.$acepta.'/'.$productos.'/'.$nombreOportunidad.'/'.$idCampaña;	
			$url_ce='clasejec3.ing.puc.cl/apps/index.php?/seguimiento_controller/insertarPersonaOportunidadLandingBecaSF/'.$email.'/'.$nombre.'/'.$apellido.'/'.$telefono.'/'.$cargo.'/'.$empresa.'/'.$pais.'/'.$region.'/'.$comentario.'/'.$origen.'/'.$acepta.'/'.$productos.'/'.$nombreOportunidad.'/'.$idCampaña.'/'.$p_ruta1.'/'.$p_ruta2.'/'.$p1.'/'.$p2.'/'.$anhos.'/'.$profesion.'/'.$edad;

			$ch = curl_init($url_ce);//URL A ENVIAR EL CONTENIDO
			curl_setopt ($ch, CURLOPT_POST, 1);//SETEAMOS LA VARIABLE DE ENVIAR DE CONTENIDO POST EN TRUE (1)
			curl_setopt ($ch, CURLOPT_POSTFIELDS,""); //SETEAMOS LOS VALORES A ENVIAR
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,0);//OPCIONAL: NO RETORNARA EL RESULTADO DE LA OPERACION
			curl_exec ($ch);//EJECUTAMOS 
			curl_close ($ch);//CERRAMOS

		    redirect('http://www.claseejecutiva.cl'); 
			

	}
}


?>