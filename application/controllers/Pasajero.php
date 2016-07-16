<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type: text/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Pasajero extends CI_Controller {
 
	public function index()
	 {
      $this->load->model("Pasajero_model");
	  $registro = $this->Pasajero_model->todo_pasajero();


	  echo json_encode($registro->result()
	  	);
	  
	 }

$cedula,
		$nombre,
		$apellido,
		$email,
		$edad,
		$lealtad,
		$clase,
		$numEquipaje,
		$pesoEquipaje,
		$numVuelo


	 public function insert(){
		$this->load->model("Pasajero_model");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);


			 $registro = $this->Pasajero_model->insert_pasajero(
			  $objss['cedula'],
			  $objss['nombre'],
			   $objss['apellido'],
			   $objss['email'],
			   $objss['edad'],
			   $objss['lealtad'],
			   $objss['clase'],
			   $objss['numEquipaje'],
			   $objss['pesoEquipaje'],
   			   $objss['numVuelo']

			 );

			 if($registro==1){
			 	//registro completo
			 }else{
			 	//si no hay nada
			 }
		}
	}


	public function update(){
		$this->load->model("Pasajero_model");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);


			 $registro = $this->Pasajero_model->update_pasajero(
			  $objss['cedula'],
			  $objss['nombre'],
			   $objss['apellido'],
			   $objss['email'],
			   $objss['edad'],
			   $objss['lealtad'],
			   $objss['clase'],
			   $objss['numEquipaje'],
			   $objss['pesoEquipaje'],
   			   $objss['numVuelo']

			 );

			 if($registro==1){
			 	//registro completo
			 }else{
			 	//si no hay nada
			 }
		}
	}

	public function delete(){
		$this->load->model("Pasajero_model");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);


			 $registro = $this->Pasajero_model->delete_pasajero(
			  $objss['cedula']
			 );

			 if($registro==1){
			 	//registro completo
			 }else{
			 	//si no hay nada
			 }
		}
	}


}

CREATE TABLE pasajeroVuelo(
	cedula INT PRIMARY KEY,
	nombre CHAR(20),
	apellido CHAR(20),
	email VARCHAR(50),
	edad INT,
	lealtad boolean,
	clase VARCHAR(255),
	numEquipaje INT,
	pesoEquipaje DOUBLE(2,2),
	numVuelo INT
);

/*fin de Pasajero.php...............*/		