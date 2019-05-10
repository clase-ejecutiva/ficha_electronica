<?php

class Candidato_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->db_a= $this->load->database('ficha',true);
    }
    
   function ingresar_persona($nombre,$apellido,$telefono,$email,$cargo,$titulo,$edad,$empresa,$pais,$region,$diplomado,$cursos,$p1,$p2,$ruta1,$ruta2,$nom_archivo1,$nom_archivo2,$fecha,$anhos,$origen)
   {
        $data = array(
           'nombre' => $nombre,
    		   'apellidos'=>$apellido,
    		   'telefonos'=>$telefono,
           'email' => $email,
    		   'cargo'=>$cargo,
    		   'titulo'=>$titulo,
           'edad'=>$edad,
    		   'empresa'=>$empresa,
    		   'pais'=>$pais,
    		   'region'=>$region,
    		   'diplomado'=>$diplomado,
           'curso'=>$cursos,
    	   'pregunta1'=>$p1,
    	   'pregunta2'=>$p2,
    	   'ruta1'=>$ruta1,
           'ruta2'=>$ruta2,
           'nom_archivo1'=>$nom_archivo1,
           'nom_archivo2'=>$nom_archivo2,
           'fecha' => $fecha,
           'Exp_laboral' => $anhos,
		'origen' => $origen
        );
     $this->db_a->insert('candidatos', $data);
   }

   function archivos($id)
   {
      $this->db_a->get('candidatos');
      $query = $this->db_a->get_where('candidatos', array('id' => $id));
      return $query->row_array();
   }

    function get_all_info()
    {
        $query = $this->db_a->get('candidatos');
        return $query->result();
    }
	
		function get_id()
	{
	 $this->db_a->select_max('id');
     $query = $this->db_a->get('candidatos');
	 return $query->row_array();
	}
	
	
	
	
	//Ficha_formulario
	 function archivos_formulario($idOp)
   {
      $this->db_a->get('ficha_formulario');
      $query = $this->db_a->get_where('ficha_formulario', array('idOportunidad' => $id));
      return $query->row_array();
   }

   
   
   
    function ingresar_ficha($idOportunidad,$email,$archivos)
   {
        $data = array(
					  'idOportunidad'=>$idOportunidad,
					  'email'=>$email,
					  'archivos' => $archivos);
     $this->db_a->insert('ficha_formulario', $data);
   }
}
?>