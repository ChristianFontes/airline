<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type: text/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class CentralVuelos extends CI_Controller {
 
	public function index()
	 {
      $this->load->model("CentralVuelos_model");
	  $registro = $this->CentralVuelos_model->todo_vuelo();

	  echo json_encode($registro->result());
	 }

	 public function insert(){
		$this->load->model("CentralVuelos_model");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);

			//$numVuelo=$objss['numVuelo'];
			 $salida=$objss['salida'];
			  $destino=$objss['destino'];
			   $sector=$objss['sector'];
			    $tiempoVuelo=$objss['tiempoVuelo'];
			     $modeloAvion=$objss['modeloAvion'];
			      $codigoTripulacion=$objss['codigoTripulacion'];
			       $disponible=$objss['disponible'];

			 $registro = $this->CentralVuelos_model->insert_vuelo(
			 $salida,
			  $destino,
			   $sector,
			    $tiempoVuelo,
			     $modeloAvion,
			      $codigoTripulacion,
			       $disponible);

			 if($registro==1){
			 	//registro completo
			 }else{
			 	//si no hay nada
			 }
		}


	 }

	 public function update(){
	 	$this->load->model("CentralVuelos_model");

	 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);

			$numVuelo=$objss['numVuelo'];
			 $salida=$objss['salida'];
			  $destino=$objss['destino'];
			   $sector=$objss['sector'];
			    $tiempoVuelo=$objss['tiempoVuelo'];
			     $modeloAvion=$objss['modeloAvion'];
			      $codigoTripulacion=$objss['codigoTripulacion'];
			       $disponible=$objss['disponible'];

			 $registro = $this->CentralVuelos_model->update_vuelo(
			 $numVuelo,
			 $salida,
			  $destino,
			   $sector,
			    $tiempoVuelo,
			     $modeloAvion,
			      $codigoTripulacion,
			       $disponible);

			 if($registro==1){
			 	//registro completo
			 }else{
			 	//si no hay nada
			 }
		}
	 }

	 public function delete(){
	 	$this->load->model("CentralVuelos_model");

	 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);

			$numVuelo=$objss['numVuelo'];
			 $registro = $this->CentralVuelos_model->delete_vuelo($numVuelo);
			$checkVuelo =$this->CentralVuelos_model->check_vuelo($numVuelo);
			$chequeo = $checkVuelo->first_row();

			  if($chequeo->conteoPasajero==0){
			 	echo json_encode(Array("borrar"=>1) );
			 }else{
			 	echo json_encode(Array("borrar"=>0) );
			 }

		}

			
		
	 
	 }

/*
numVuelo INT PRIMARY KEY,
  	salida varchar(255) NOT NULL default '',
 	destino varchar(255) NOT NULL default '',
  	sector varchar(255) NOT NULL default '',
	tiempoVuelo TIME,
	modeloAvion varchar(255),
	codigoTripulacion INT,
	disponible varchar(255)

INSERT INTO centralVuelos (numVuelo,salida,destino,sector,tiempoVuelo,modeloAvion,codigoTripulacion,disponible)
VALUES (1,'Maiquetia','NewYork','America','12:30:00','Boing774',411,'Disponible'),
(2,'Maiquetia','Berling','Europa','12:15:00','Boing884',401,'Disponible'),
(3,'Maiquetia','Tibuk','Africa','12:30:00','Boing774',421,'Disponible'),
(4,'Maiquetia','Tokyo','Asia','12:15:00','Boing894',404,'Disponible'),
(5,'Maiquetia','Cuba','Caribe','12:02:00','Boing662',433,'Disponible');*/


}
/*fin de CentralVuelos.php...............*/		