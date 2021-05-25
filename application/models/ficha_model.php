<?php

class Ficha_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db_a= $this->load->database('ficha',true);
    }
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
        if($this->db_a->insert('ficha_formulario', $data)){
		return true;
		}else{
		return false;	
		}
		
    }
	
	 function ingresar_step_1($idOportunidad,$form,$fecha)
    {
	$sql ='select idOp from step_1 where idOp like'."'".$idOportunidad."'";
	$query = $this->db_a->query($sql);
	$result=$query->row_array();
	
       if($result['idOp']===$idOportunidad){
	    $data = array('form' => $form,'fechaHora'=>$fecha);
		$this->db_a->where('idOp', $idOportunidad);
		$this->db_a->update('step_1', $data); 		
		return 'update';	
		}else{
       $data = array('idOp'=>$idOportunidad,
					  'form'=>$form,
					  'fechaHora'=> $fecha);
	    $this->db_a->insert('step_1', $data);
		return 'insert';	
		}
    }
	 function ingresar_step_2($idOportunidad,$form,$fecha)
    {
	$sql ='select idOp from step_2 where idOp like'."'".$idOportunidad."'";
	$query = $this->db_a->query($sql);
	$result=$query->row_array();
	
       if($result['idOp']===$idOportunidad){
	    $data = array('form' => $form,'fechaHora'=>$fecha);
		$this->db_a->where('idOp', $idOportunidad);
		$this->db_a->update('step_2', $data); 		
		return 'update';	
		}else{
       $data = array('idOp'=>$idOportunidad,
					  'form'=>$form,
					  'fechaHora'=> $fecha);
	    $this->db_a->insert('step_2', $data);
		return 'insert';	
		}
    }	
	 function ingresar_step_3($idOportunidad,$form,$fecha)
    {
	$sql ='select idOp from step_3 where idOp like'."'".$idOportunidad."'";
	$query = $this->db_a->query($sql);
	$result=$query->row_array();
	
       if($result['idOp']===$idOportunidad){
	    $data = array('form' => $form,'fechaHora'=>$fecha);
		$this->db_a->where('idOp', $idOportunidad);
		$this->db_a->update('step_3', $data); 		
		return 'update';	
		}else{
       $data = array('idOp'=>$idOportunidad,
					  'form'=>$form,
					  'fechaHora'=> $fecha);
	    $this->db_a->insert('step_3', $data);
		return 'insert';	
		}
    }
	 function ingresar_step_4($idOportunidad,$form,$fecha)
    {
	$sql ='select idOp from step_4 where idOp like'."'".$idOportunidad."'";
	$query = $this->db_a->query($sql);
	$result=$query->row_array();
	
       if($result['idOp']===$idOportunidad){
	    $data = array('form' => $form,'fechaHora'=>$fecha);
		$this->db_a->where('idOp', $idOportunidad);
		$this->db_a->update('step_4', $data); 		
		return 'update';	
		}else{
       $data = array('idOp'=>$idOportunidad,
					  'form'=>$form,
					  'fechaHora'=> $fecha);
	    $this->db_a->insert('step_4', $data);
		return 'insert';	
		}
    }	
	
	
	function consulta_etapa($idOp)
	{
	 $query = $this->db_a->query('SELECT * 
									FROM (
										SELECT '."'step_1'".' as '."'ETAPA'".',`idOp` ,`form`,`fechaHora` from `step_1` 
										UNION SELECT '."'step_2'".' as '."'ETAPA'".',`idOp` ,`form`,`fechaHora` from `step_2` 
										UNION SELECT '."'step_3'".' as '."'ETAPA'".',`idOp` ,`form`,`fechaHora` from `step_3` 
										UNION SELECT '."'step_4'".' as '."'ETAPA'".',`idOp` ,`form`,`fechaHora` from `step_4` 
										)
										A 
									WHERE `idOp` LIKE'."'$idOp'", FALSE);
     return $query->result(); 
	}
	
	
	function pais_residencia($idOp)
	{
	 $query = $this->db_a->query('SELECT * FROM `step_2` WHERE `idOp` like'."'$idOp'", FALSE);
     return $query->row_array(); 		
	}
	
	
	
    function ingresar_log($data_form,$idOportunidad,$status,$log)
    {
	date_default_timezone_set("America/Santiago");
        $data = array(
					  'fecha_hora'=>date('Y-m-d H:i:s'),
					  'data_form'=>$data_form,
					  'idOp' => $idOportunidad,
					  'status' => $status,
					  'log' => $log
					  );
        $this->db_a->insert('log_ficha', $data);
		
    }	
	
	function archivos($idOp)
    {
      $this->db_a->get('ficha_formulario');
      $query = $this->db_a->get_where('ficha_formulario', array('idOportunidad' => $idOp));
      return $query->row_array();
    }
	
	function delete_step($step,$idOp)
	{
    if($this->db_a->delete($step, array('idOp' => $idOp))){
	return true;	
		}else{
    return false;	
	  }   
	}
	
	function consulta_comuna($id_comuna){
	$sql='SELECT `c`.nombre FROM `region` as r, `comuna` as c 
			WHERE r.`id_region` like c.`id_region` 
			and c.id_region='.$id_comuna.' ORDER BY nombre ASC';	
			
	$query = $this->db_a->query($sql);
	return $query->result();		
	//return $query->result_object();	
    //return $query->row_array();	
    //return $query->row();	
	}
	
	
	function consulta_unidad_sf($sku){
		
     if(empty($sku)){throw new Exception("Falta SKU del Producto");}
	 
		$url_api='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcionV2.php?idOp='.$sku.'&action=unidad';
	
			 $ch = curl_init($url_api);
			 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

			 //obtenemos la respuesta
			 $ejecutivo =curl_exec($ch);
			 curl_close($ch);
			 	 
	return $ejecutivo;			
	}


	
	
	function consulta_sku_op($idOp){
		
     if(empty($idOp)){throw new Exception("Falta Parametro");}
	 
		$url_api='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcionV2.php?idOp='.$idOp.'&action=OpProducto';	
		//$url_api='https://ws2.diplomadosuc.cl/soapSF/ws/pre_inscripcionV2.php?idOp=0062L00000Usw7iQAB&action=OpProducto';	
			 $ch = curl_init($url_api);
			 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

			 //obtenemos la respuesta
			 $producto =curl_exec($ch);
			 curl_close($ch);
	$producto = json_decode($producto);		 
	/*
	stdClass Object
	(
		[name] => Herramientas para optimización y desarrollo de estrategias para redes sociales
		[sku] => C-18
		[sence] => false
	)
	*/		

	return $producto->sku;			
	}	
	
}
?>