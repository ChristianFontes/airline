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
(2,'Maiquetia','Berling','Europa','12:15:00','Boing884',401,'Disponible');*/


}
/*fin de CentralVuelos.php...............*/		