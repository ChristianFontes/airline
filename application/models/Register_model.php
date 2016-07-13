<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model 
{
	 public function __construct()
	 {
		 parent::__construct();
	 }
	 
	 public function register_client($dni,
			 $firstName,
			  $lastName,
			   $streetAddressss,
			    $state,
			     $zipcode,
			      $phone,
			       $cellPhone,
			        $email,
			         $password)
	 {
	 	$this->load->database(); //Te permite utilizar la Base de datos

		$data = array(
		        'title' => $firstName,
			    'title' => $lastName,
			    'title' => $streetAddressss,
			    'title' => $state,
			    'title' => $zipcode,
			    'title' => $phone,
			    'title' => $cellPhone,
		        'title' => $email,
			    'title' => $password
		);

		$this->db->insert('mytable', $data);
		 // Procesos Ejemplo: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')

		return $this->db->affected_rows();


	 }
	 
	
}
 
/* End of file Register_model.php */
/* Location: ./application/models/Register_model.php */