<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasajero_model extends CI_Model 
{
	 public function __construct()
	 {
		 parent::__construct();
	 }

	  public function todo_pasajero()
	  {
		  	$this->load->database(); //Te permite utilizar la Base de datos
		  	$query =  $this->db->get('pasajeroVuelo');
			 	return $query;

	  }


	   public function insert_pasajero( 
	  	$cedula,
		$nombre,
		$apellido,
		$email,
		$edad,
		$lealtad,
		$clase,
		$numEquipaje,
		$pesoEquipaje,
		$numVuelo)
	  {

	  	$this->load->database(); //Te permite utilizar la Base de datos

		$data = array(
		        'cedula' => $cedula,
		        'nombre' => $nombre,
			    'apellido' => $apellido,
			    'email' => $email,
			    'edad' => $edad,
			    'lealtad' => $lealtad,
			    'clase' => $clase,
   			    'numEquipaje' => $numEquipaje,
   			    'pesoEquipaje' => $pesoEquipaje,
   			    'numVuelo' => $numVuelo

		);

		$this->db->insert('pasajeroVuelo', $data);
		 // Procesos Ejemplo: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')

		return $this->db->affected_rows();


	  }

	   public function update_pasajero( 
	  	 	$cedula,
		$nombre,
		$apellido,
		$email,
		$edad,
		$lealtad,
		$clase,
		$numEquipaje,
		$pesoEquipaje,
		$numVuelo)
	  {

	  	$this->load->database(); //Te permite utilizar la Base de datos

		$data = array(
		        'nombre' => $nombre,
			    'apellido' => $apellido,
			    'email' => $email,
			    'edad' => $edad,
			    'lealtad' => $lealtad,
			    'clase' => $clase,
   			    'numEquipaje' => $numEquipaje,
   			    'pesoEquipaje' => $pesoEquipaje,
   			    'numVuelo' => $numVuelo

		);

		$this->db->where('cedula', $cedula);
		$this->db->update('pasajeroVuelo', $data);

		return $this->db->update_batch();



	  }

	  public function delete_pasajero($cedula){

	$this->load->database(); 

	  	$this->db->where('cedula', $cedula);
		$this->db->delete('pasajeroVuelo');

		return 1;

	  }

}





/* fin Pasajero_model.php*/