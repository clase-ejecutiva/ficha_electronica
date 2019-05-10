<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
//require(APPPATH.'/libraries/wsLandingBeca.php');
require(APPPATH.'/libraries/curl.php');
class Latam extends CI_Controller {

  	public function __construct()
   {
        parent::__construct(); 
       	$this->load->helper(array('form', 'url','download'));  //carga las funciones 
        $this->load->model('candidato_model');
   }


public function index()
{
	 //$this->load->view('latam', array('error' => ' ' ));
	 //$this->load->library('form_validation');
	 //redirect('http://www.claseejecutiva.com'); 
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
		
		
		$nombreOportunidad='Oportunidad_Venta_Beca_latam';
		$idCampaña='a0M1a000007HVGF';
        $productos=$diplomados.','.$cursos;
		$fecha=date('Y-m-d H:i:s');
		$files = $_FILES;

        $nom_archivo1=$files['userfile']['name'][0];
		$nom_archivo2=$files['userfile']['name'][1];
		
		//$nom_archivo1=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20).'.'.$files['userfile']['type'][0]; 
		//$nom_archivo2=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20).'.'.$files['userfile']['type'][1];
		
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