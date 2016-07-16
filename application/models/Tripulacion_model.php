<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tripulacion_model extends CI_Model 
{
	 public function __construct()
	 {
		 parent::__construct();
	 }

	  public function todo_tripulacion()
	  {
		  	$this->load->database(); //Te permite utilizar la Base de datos
		  	$query =  $this->db->get('tripulacion');
			 	return $query;

	  }

	   public function insert_tripu( 
		$numTripulantes,
		$idiomaTripulacion)
	  {

	  	$this->load->database(); //Te permite utilizar la Base de datos

		$data = array(
		        'numTripulantes' => $numTripulantes,
			    'idiomaTripulacion' => $idiomaTripulacion
		);

		$this->db->insert('tripulacion', $data);
		 // Procesos Ejemplo: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')

		return $this->db->affected_rows();


	  }

	   public function update_tripu( 
	  	$codigoTripulacion,
		$numTripulantes,
		$idiomaTripulacion)
	  {

	  	$this->load->database(); //Te permite utilizar la Base de datos

		$data = array(
		        'numTripulantes' => $numTripulantes,
			    'idiomaTripulacion' => $idiomaTripulacion
		);

		$this->db->where('codigoTripulacion', $codigoTripulacion);
		$this->db->update('tripulacion', $data);

		return $this->db->update_batch();



	  }

	  public function delete_tripu($codigoTripulacion){

	$this->load->database(); 

	  	$this->db->where('codigoTripulacion', $codigoTripulacion);
		$this->db->delete('tripulacion');

		return 1;

	  }

}

/* fin tripulacion_modelo.php*/