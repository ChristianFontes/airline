<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
 
 public function login()
 {
   $this->load->helper('jwt_helper');
/*
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $objss = json_decode(file_get_contents("php://input"), true);

   if (isset($objss['email']) && isset($objss['password']) ) {
    $email = $objss['email'];
    $password = $objss['password'];
    $this->load->model("Auth_model");
    $user = $this->Auth_model->login($email, $password);
    if($user !== false)
    {
     //ha hecho login
     $user->iat = time();
     $user->exp = time() + 900;
     $jwt = JWT::encode($user, '');
     echo json_encode(
     array(
     "code" => 0, 
     "response" => array(
     "token" => $jwt
     )));
    }
   }
}
*/

	 //if($this->input->is_ajax_request())
	 //{
		 if(!$this->input->post())
		 {
		 	echo json_encode(array("code" => 1, "response" => "Datos insuficientes"));
		 }else{

                 $objss = json_decode(file_get_contents("php://input"), true);
		 $email = $objss['email'];
                 $password = $objss['password'];

		 $this->load->model("Auth_model");
		 $user = $this->Auth_model->login($email, $password);
		 if($user !== false)
		 {
			 //ha hecho login
			 $user->iat = time();
			 $user->exp = time() + 900;
			 $jwt = JWT::encode($user, '');
			 echo json_encode(
			 array(
			 "code" => 0, 
			 "response" => array(
			 "token" => $jwt
			 )));
		 }
                 }
	// }
	/* else
	 {
	 	show_404();
	 }*/
 }
}


/*fin de Auth.php...............*/									