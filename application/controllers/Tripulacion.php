<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type: text/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Tripulacion extends CI_Controller {
 
	public function index()
	 {
      $this->load->model("Tripulacion_model");
	  $registroTripulacion = $this->Tripulacion_model->todo_tripulacion();

	   $this->load->model("Tripulacion_trabajador_model");
	  $registroTripulacionTrabajador = $this->Tripulacion_trabajador_model->todo_tripulacion_trabajador();

	  echo json_encode(
	  	 array("tableTripulacion"=>$registroTripulacion->result(),
	  	 	   "tableTripulacionTrabajador"=>$registroTripulacionTrabajador->result()
	  	 	   ));
	  
	 }

//funciones para tabla Tripulacion
	 public function insert_tripulacion(){
		$this->load->model("Tripulacion_model");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);


			 $registro = $this->Tripulacion_model->insert_tripu(
			  $objss['numTripulantes'],
			   $objss['idiomaTripulacion']
			 );

			 if($registro==1){
			 	//registro completo
			 }else{
			 	//si no hay nada
			 }
		}
	}

	public function update_tripulacion(){
		$this->load->model("Tripulacion_model");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);


			 $registro = $this->Tripulacion_model->update_tripu(
			 $objss['codigoTripulacion'],
			  $objss['numTripulantes'],
			   $objss['idiomaTripulacion']
			 );

			 if($registro==1){
			 	//registro completo
			 }else{
			 	//si no hay nada
			 }
		}
	}

	public function delete_tripulacion(){
		$this->load->model("Tripulacion_model");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);

			$codigoTripulacion=$objss['codigoTripulacion'];
			 $registro = $this->Tripulacion_model->delete_tripu(
			 $codigoTripulacion);

			  if($registro==1){
			 	//registro borrado
			 }else{
			 	//error
			 }

		}
	}



//funciones para tabla Trabajadores de tripulacion
	public function insert_trabajador(){
		$this->load->model("Tripulacion_trabajador_model");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);


			 $registro = $this->Tripulacion_trabajador_model->insert_trab(
			  $objss['codigoTripulacion'],
			   $objss['nombre'],
			   $objss['apellido'],
			   $objss['email'],
			   $objss['edad'],
			   $objss['cargo']
			 );

			 if($registro==1){
			 	//registro completo
			 }else{
			 	//si no hay nada
			 }
		}
	}

	public function update_trabajador(){
		$this->load->model("Tripulacion_trabajador_model");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);


			 $registro = $this->Tripulacion_trabajador_model->update_trab(
			 $objss['codigoPersonal'],
			  $objss['codigoTripulacion'],
			   $objss['nombre'],
			   $objss['apellido'],
			   $objss['email'],
			   $objss['edad'],
			   $objss['cargo']
			 );

			 if($registro==1){
			 	//registro completo
			 }else{
			 	//si no hay nada
			 }
		}
	}

	public function delete_trabajador(){
		$this->load->model("Tripulacion_trabajador_model");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);


			 $registro = $this->Tripulacion_trabajador_model->delete_trab(
			 $objss['codigoPersonal']
			 );

			 if($registro==1){
			 	//registro completo
			 }else{
			 	//si no hay nada
			 }
		}
	}


}

/*
CREATE TABLE tripulacion( 
	codigoTripulacion INT PRIMARY KEY,
	numTripulantes INT,
	idiomaTripulacion varchar(255)
);

CREATE TABLE trabajadoresTripulacion(
	codigoPersonal INT PRIMARY KEY,
	codigoTripulacion INT,
	nombre CHAR(20),
	apellido CHAR(20),
	email VARCHAR(50),
	edad INT,
	cargo CHAR(20)
);

INSERT INTO tripulacion (codigoTripulacion, numTripulantes,idiomaTripulacion) 
VALUES (1, 10,"EN-DE"),(2,12,"FR-ES"),(3,8,"EN-ES-FR");

INSERT INTO trabajadoresTripulacion (codigoPersonal,codigoTripulacion,nombre,apellido,email,edad,cargo) 
VALUES (1,1,"Swache","Norgsikate","sw@me",25,"Sobre Cargo"),
(2,1,"Nora","Swamg","nora@me",23,"Aeromosa"),
(3,2,"Saul","Nadal","sau@me",27,"Piloto"),
(4,2,"Paula","Fung","pau@me",24,"Aeromosa"),
(5,3,"Max","Jobs","max@me",26,"Piloto"),
(6,3,"Mychael","Norlan","mych@me",23,"Copiloto");

INSERT INTO centralVuelos (numVuelo,salida,destino,sector,tiempoVuelo,modeloAvion,codigoTripulacion,disponible)
VALUES (1,'Maiquetia','NewYork','America','12:30:00','Boing774',411,'Disponible'),
(2,'Maiquetia','Berling','Europa','12:15:00','Boing884',401,'Disponible');



/*fin de Tripulacion.php...............*/		