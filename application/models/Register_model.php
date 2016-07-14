<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model 
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
		        'cedula' => $dni,
		        'nombre' => $firstName,
			    'apellido' => $lastName,
			    'direccion' => $streetAddressss,
			    'estado' => $state,
			    'codigoPostal' => $zipcode,
			    'Telefono' => $phone,
			    'Celular' => $cellPhone,
		        'email' => $email,
			    'clave' => $password
		);

		$this->db->insert('clienteLealtad', $data);
		 // Procesos Ejemplo: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')

		return $this->db->affected_rows();
	 }
	 
	
}
 
/* End of file Register_model.php */
/* Location: ./application/models/Register_model.php */
