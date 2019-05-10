<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_latam extends CI_Controller {

  	public function __construct()
   {
        parent::__construct(); 
       	$this->load->helper(array('form', 'url','download'));  //carga las funciones 
        $this->load->model('candidato_model');
        $this->load->library("pagination");
        include(dirname(__FILE__)."/../libraries/PHPExcel/Classes/PHPExcel.php");
        //$this->load->database();
        $this->db_a= $this->load->database('default',true);
        //$this->db_b= $this->load->database('test',true);
   }

   public function index()
	{
    $config = array();
    $config["base_url"] = base_url() . "index.php/reporte_latam/index";
    $config["total_rows"] = $this->db_a->count_all('candidatos');
    $config["per_page"] = 5;
    $config["uri_segment"] = 3;

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    $data["links"] = $this->pagination->create_links(); 

    $this->db_a->limit($config["per_page"], $page);

    $this->db_a->select('id,nombre, apellidos,edad,telefonos,email,pais,Exp_laboral,ruta1,ruta2,fecha');
    $query = $this->db_a->get('candidatos');

    $cantidad= count($query->result());

    if ($query->num_rows() > 0) {
       $data["candidatos"] = $query->result();
    }else{
       $data["candidatos"] = [];
    }

     $this->load->view('view_reportes_latam', $data);
  }


   public function descargar1($id)
   {

     $data['documentos'] = $this->candidato_model->archivos($id);
      // Recuperamos la ruta del archivo
    $path = $data['documentos']['ruta1'];

     // Recuperamos el nombre del archivo
    $name = $data['documentos']['nom_archivo1'];

    // Recuperamos el archivo de la ruta en un string
    $documents_file = file_get_contents($path);

    /** Realizamos la Descarga del archivo
    Codeigniter se encarga de los headers
    para identificar el archivo */
    force_download($name, $documents_file);     

   }

      public function descargar2($id)
   {

     $data['documentos'] = $this->candidato_model->archivos($id);
      // Recuperamos la ruta del archivo
    $path = $data['documentos']['ruta2'];

     // Recuperamos el nombre del archivo
    $name = $data['documentos']['nom_archivo2'];

    // Recuperamos el archivo de la ruta en un string
    $documents_file = file_get_contents($path);

    /** Realizamos la Descarga del archivo
    Codeigniter se encarga de los headers
    para identificar el archivo */
    force_download($name, $documents_file);     

   }  	

   public function export_candidatos()
  {
/** Error reporting */
    //error_reporting(E_ALL);
    //ini_set('display_errors', TRUE);
    //ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('America/Mexico_City');
    $objPHPExcel = new PHPExcel();

    // propiedades
    $objPHPExcel->getProperties()->setCreator("Unidad de TI Clase_Ejecutiva")
                   ->setLastModifiedBy("TI")
                   ->setTitle("Reporte Latam")
                   ->setSubject("Extraccion de data")
                   ->setDescription("Latam")
                   ->setKeywords("office 2007 openxml php")
                   ->setCategory("Info");



        // Cabecera
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'id')
                ->setCellValue('B1', 'Nombre')
                ->setCellValue('C1', 'Apellidos')
                ->setCellValue('D1', 'Telefonos')
                ->setCellValue('E1', 'email')
                ->setCellValue('F1', 'Pais')
                ->setCellValue('G1', 'Exp_laboral')
                ->setCellValue('H1', 'Curriculum')
                ->setCellValue('I1', 'Titulos')
                ->setCellValue('J1', 'Fecha');
      $i=2;            
      foreach ($this->candidato_model->get_all_info() as $row) 
      {
        /*$excel_date=PHPExcel_Shared_Date::PHPToExcel($row->ultimoingreso);
        $fecha= PHPExcel_Shared_Date::PHPToExcel($row->ultimoingreso);
        echo $fecha;*/

        // $this->db_a->select('id,nombre, apellidos, telefonos,email,pais,ruta1,ruta2,fecha');


        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,$row->id )
                    ->setCellValue('B'.$i,$row->nombre)
                    ->setCellValue('C'.$i,$row->apellidos)
                    ->setCellValue('D'.$i,$row->telefonos)
                    ->setCellValue('E'.$i,$row->email)
                    ->setCellValue('F'.$i,$row->pais)
					->setCellValue('G'.$i,$row->Exp_laboral)
					->setCellValue('H'.$i,site_url("reporte/descargar1/".$row->id))
                    ->setCellValue('I'.$i,site_url("reporte/descargar2/".$row->id))
                    ->setCellValue('J'.$i,$row->fecha);
                    $i++;
       
      }

    // activamos la hoja n1
    $objPHPExcel->setActiveSheetIndex(0);


    // Titulo Hoja
    $objPHPExcel->getActiveSheet()->setTitle('Candidatos');



    // cabeceras para excel 2007
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="export_simple.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;

  }

}