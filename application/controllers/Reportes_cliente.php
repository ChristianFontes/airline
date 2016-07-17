<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type: text/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Reportes_cliente extends CI_Controller {
 
	public function index()
	 {
      $this->load->model("Reportes_cliente_model");

	   $clienteLealtad = $this->Reportes_cliente_model->total_cliente_lealtad();
	   	   $clientePer = $this->Reportes_cliente_model->per_cliente();


	    //$repoEdadAmerica = $this->Reportes_global_model->reporte_edad_america();


	  echo json_encode(Array(
	    "repoCliente" => $clienteLealtad->first_row(),
	    "repoClientePer" => $clientePer->first_row()

	  //	"repoAfrica" => $repoEdadAfrica->result()
	  	)
	  	);
	  
	 }

}


/*fin de Reportes_cliente.php...............*/	