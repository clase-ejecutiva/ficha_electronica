<?php

class Trial_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->db_a= $this->load->database('Trial',true);
    }
    
   function ingresar_url($token,$fecha,$email,$sku)
   {
        $data = array(
                      'token' =>$token,
    		          'fecha'=>$fecha, 
                      'email' => $email,
					  'sku'=>$sku);
      $var=$this->db_a->insert('url', $data);
	  if($var){
		 return 'ok'; 
	  }else{
		 die('error');
	  }
   }
   
   function valid_url($token,$cantidad)
   {
	$query = $this->db_a->query("SELECT * FROM `url` WHERE `token`like '".$token."' AND DATEDIFF(url.fecha,curdate())<".$cantidad.""); 
	if ($query->num_rows() > 0){
	return 	$query->result_array(); 
	}else{
		//print_r($query->result_array());
		//die("SELECT * FROM `url` WHERE `token`like '".$token."' AND DATEDIFF(curdate(),url.fecha)<".$cantidad."");
	  return 'error';
	  }
   }

   function fecha(){

	$query = $this->db_a->query("SELECT DATEDIFF(url.fecha,curdate()) as fecha FROM `url` WHERE `token`like '5a37f28c193f6' AND DATEDIFF(url.fecha,curdate())>6");
	print_r($query->result_array());
   }
   
   
   function log($email,$sku,$FechaHora,$wstrial)
   {
     $data = array(
	              'email' => $email,
				  'sku'=>$sku,
                  'FechaHora'=>$FechaHora, 
                  'wstrial' =>$wstrial);
      $var=$this->db_a->insert('log', $data);
	  if($var){
		 return 'ok'; 
	  }else{
		 die('error');
	  }	    
   }
   /*
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
*/
}
?>