<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_cliente_model extends CI_Model 
{
	 public function __construct()
	 {
		 parent::__construct();
	 }

	  public function total_cliente_lealtad()
	  {
		  	$this->load->database(); //Te permite utilizar la Base de datos


		  	$query = $this->db->query('SELECT COUNT(*) AS TotalClienteLealtad FROM clienteLealtad');
		  
			 	return $query;

	  }


	  public function per_cliente()
	  {
		  	$this->load->database(); //Te permite utilizar la Base de datos


		  	$query = $this->db->query('

		  		SELECT

		  		(SELECT ((COUNT(*)/(SELECT COUNT(*) FROM pasajeroVuelo WHERE lealtad =1))*100)
		  		FROM pasajeroVuelo
		  		WHERE lealtad=1 
		  		AND clase LIKE \'Economica\') AS perEconomica,

		  		(SELECT ((COUNT(*)/(SELECT COUNT(*) FROM pasajeroVuelo WHERE lealtad =1))*100)
		  		FROM pasajeroVuelo
		  		WHERE lealtad=1 
		  		AND clase LIKE \'Negocio\') AS perNegocio,

		  		(SELECT ((COUNT(*)/(SELECT COUNT(*) FROM pasajeroVuelo WHERE lealtad =1))*100)
		  		FROM pasajeroVuelo
		  		WHERE lealtad=1 
		  		AND clase LIKE \'Primera\') AS perPrimera


		  		');
		  
			 	return $query;

	  }

}


/* fin Reportes_cliente_model.php*/