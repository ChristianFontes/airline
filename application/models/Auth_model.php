<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model 
{
	 public function __construct()
	 {
		 parent::__construct();
	 }
	 
	 public function login($email, $clave)
	 {
	 	$this->load->database();
		 $query = $this->db->select("cedula, email")
		 ->from("clienteLealtad")
		 ->where("email", $email)
		 ->where("clave", $clave)
		 ->get();
		 if($query->num_rows() === 1)
		 {
		 	return $query->row();
		 }
		 return false;
	 }

	  public function login_admin($email, $clave)
	 {
	 	$this->load->database();
		 $query = $this->db->select("email, privilegios")
		 ->from("administradores")
		 ->where("email", $email)
		 ->where("clave", $clave)
		 ->get();
		 if($query->num_rows() === 1)
		 {
		 	return $query->row();
		 }
		 return false;
	 }
	 
	 public function checkUser($id, $email)
	 {
	 	$this->load->database();
		 $query = $this->db->limit(1)->get_where("user", array("cedula" => $id, "email" => $email));
		 return $query->num_rows() === 1;
	 }
}
 
/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */
