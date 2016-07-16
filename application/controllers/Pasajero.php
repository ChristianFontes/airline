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
   			   $objss['numVuelo'],
   			   $objss['sexo']


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
			 	 $objss['id'],
			  $objss['cedula'],
			  $objss['nombre'],
			   $objss['apellido'],
			   $objss['email'],
			   $objss['edad'],
			   $objss['lealtad'],
			   $objss['clase'],
			   $objss['numEquipaje'],
			   $objss['pesoEquipaje'],
   			   $objss['numVuelo'],
   			   $objss['sexo']

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
			  $objss['id']
			 );

			 if($registro==1){
			 	//registro completo
			 }else{
			 	//si no hay nada
			 }
		}
	}


}


/*	 CREATE TABLE pasajeroVuelo(
	id INT PRIMARY KEY AUTO_INCREMENT,
	cedula INT(13),
	nombre CHAR(20),
	apellido CHAR(20),
	email VARCHAR(50),
	edad INT,
	lealtad boolean,
	clase VARCHAR(255),
	numEquipaje INT,
	pesoEquipaje DOUBLE(2,2),
	numVuelo INT,
	sexo VARCHAR(255)
);

INSERT INTO pasajeroVuelo (
	cedula ,
	nombre ,
	apellido, 
	email ,
	edad,
	lealtad,
	clase,
	numEquipaje, 
	pesoEquipaje,
	numVuelo,sexo )
VALUES (111,'meme','padal','meme@me',18,1,'Primera',1,17,1,'M'),
(222,'carlos','Herre','cahe@me',19,0,'Negocio',1,13,1,'M'),
(333,'fucken','marti','fuh@me',22,0,'Economica',1,15,1,'M'),
(444,'Malfoy','roge','mmo@me',22,0,'Economica',1,19,1,'M'),

(555,'gloria','moira','gol@me',28,0,'Primera',1,12,2,'F'),
(666,'Nolan','sormel','nola@me',30,0,'Primera',2,24,2,'M'),
(777,'Narnio','gustv','ger@me',33,1,'Economica',1,16,2,'M'),

(888,'John','sandoval','Jor@me',37,1,'Negocio',2,23,3,'M'),
(999,'John','snow','Strargaryen@me',38,0,'Negocio',1,10,3,'M'),

(123,'Maria','carrizal','marri@me',47,0,'Economica',1,10,4,'F'),
(456,'sofia','romero','sof@me',26,0,'Economica',1,13,4,'F'),

(789,'Majo','Gosft','mago@me',27,1,'Primera',1,19,5,'F'),
(101,'Manuel','Motav','manu@me',55,0,'Primera',2,25,5,'M');


*/

/*fin de Pasajero.php...............*/		