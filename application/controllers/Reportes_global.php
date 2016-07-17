<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type: text/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Reportes_global extends CI_Controller {
 
	public function index()
	 {
      $this->load->model("Reportes_global_model");
	  $repoEdad = $this->Reportes_global_model->reporte_por_edad();

	   $repoEdadAfrica = $this->Reportes_global_model->reporte_edad_africa();
	    $repoEdadAmerica = $this->Reportes_global_model->reporte_edad_america();
	     $repoEdadAsia = $this->Reportes_global_model->reporte_edad_asia();
	      $repoEdadEuropa = $this->Reportes_global_model->reporte_edad_europa();
	       $repoEdadCaribe = $this->Reportes_global_model->reporte_edad_caribe();

	       	       $repoMujeres = $this->Reportes_global_model->reporte_mujer();


	  echo json_encode(Array(
	    "repoEdad" => $repoEdad->first_row(),
	  	"repoAfrica" => $repoEdadAfrica->first_row(),
	  	"repoAmerica" => $repoEdadAmerica->first_row(),
	  	"repoAsia" => $repoEdadAsia->first_row(),
	  	"repoEuropa" => $repoEdadEuropa->first_row(),
	  	"repoCaribe" => $repoEdadCaribe->first_row(),
		"repoMujer" => $repoMujeres->first_row()

	  	)
	  	);
	  
	 }

}


/*fin de Reportes_global.php...............*/	