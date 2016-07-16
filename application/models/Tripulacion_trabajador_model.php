<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tripulacion_trabajador_model extends CI_Model 
{
	 public function __construct()
	 {
		 parent::__construct();
	 }

	  public function todo_tripulacion_trabajador()
	  {
		  	$this->load->database(); //Te permite utilizar la Base de datos
		  	$query =  $this->db->get('trabajadoresTripulacion');
			 	return $query;

	  }

	   public function insert_trab( 
		$codigoTripulacion,
		$nombre,
		$apellido,
		$email,
		$edad,
		$cargo)
	  {

	  	$this->load->database(); //Te permite utilizar la Base de datos

		$data = array(
		        'codigoTripulacion' => $codigoTripulacion,
			    'nombre' => $nombre,
			    'apellido' => $apellido,
			    'email' => $email,
			    'edad' => $edad,
			    'cargo' => $cargo
		);

		$this->db->insert('trabajadoresTripulacion', $data);
		 // Procesos Ejemplo: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')

		return $this->db->affected_rows();


	  }

	   public function update_trab( 
	  	$codigoPersonal,
		$codigoTripulacion,
		$nombre,
		$apellido,
		$email,
		$edad,
		$cargo)
	  {

	  	$this->load->database(); //Te permite utilizar la Base de datos

		$data = array(
		        'codigoTripulacion' => $codigoTripulacion,
			    'nombre' => $nombre,
			    'apellido' => $apellido,
			    'email' => $email,
			    'edad' => $edad,
			    'cargo' => $cargo
		);

		$this->db->where('codigoPersonal', $codigoPersonal);
		$this->db->update('trabajadoresTripulacion', $data);

		return $this->db->update_batch();



	  }

	  public function delete_trab($codigoPersonal){

	$this->load->database(); 

	  	$this->db->where('codigoPersonal', $codigoPersonal);
		$this->db->delete('trabajadoresTripulacion');

		return 1;

	  }

}