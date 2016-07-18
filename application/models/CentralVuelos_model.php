<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CentralVuelos_model extends CI_Model 
{
	 public function __construct()
	 {
		 parent::__construct();
	 }

	  public function todo_vuelo()
	  {
		  	$this->load->database(); //Te permite utilizar la Base de datos
		  	$query =  $this->db->get('centralVuelos');
			 	return $query;

	  }

	  public function insert_vuelo( 
	  	$salida,
		$destino,
		$sector,
		$tiempoVuelo,
		$modeloAvion,
		$codigoTripulacion,
		$disponible)
	  {

	  	$this->load->database(); //Te permite utilizar la Base de datos

		$data = array(
		        'salida' => $salida,
		        'destino' => $destino,
			    'sector' => $sector,
			    'tiempoVuelo' => $tiempoVuelo,
			    'modeloAvion' => $modeloAvion,
			    'codigoTripulacion' => $codigoTripulacion,
			    'disponible' => $disponible
		);

		$this->db->insert('centralVuelos', $data);
		 // Procesos Ejemplo: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')

		return $this->db->affected_rows();


	  }

	  public function update_vuelo(
	  	$numVuelo,
	  	$salida,
		$destino,
		$sector,
		$tiempoVuelo,
		$modeloAvion,
		$codigoTripulacion,
		$disponible)
	  {

	  	$this->load->database(); //Te permite utilizar la Base de datos

		$data = array(
		        'salida' => $salida,
		        'destino' => $destino,
			    'sector' => $sector,
			    'tiempoVuelo' => $tiempoVuelo,
			    'modeloAvion' => $modeloAvion,
			    'codigoTripulacion' => $codigoTripulacion,
			    'disponible' => $disponible
		);


		$this->db->where('numVuelo', $numVuelo);
		$this->db->update('centralVuelos', $data);

		return $this->db->update_batch();


	  }

	  public function delete_vuelo($numVuelo){

	$this->load->database(); 

	  	$this->db->where('numVuelo', $numVuelo);
		$this->db->delete('centralVuelos');

		return 1;

	  }


}


 
/* End of file CentralVuelos_model.php */
/* Location: ./application/models/CentralVuelos_model.php */