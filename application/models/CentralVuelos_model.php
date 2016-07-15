<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CentralVuelos_model extends CI_Model 
{
	 public function __construct()
	 {
		 parent::__construct();
	 }

	  public function todo_vuelo(){
	  	$this->load->database(); //Te permite utilizar la Base de datos

	  	$query =  $this->db->get('centralVuelos');
		
		 	return $query;

	  }


}


 
/* End of file CentralVuelos_model.php */
/* Location: ./application/models/CentralVuelos_model.php */