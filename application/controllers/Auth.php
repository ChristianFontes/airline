<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type: text/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Auth extends CI_Controller {
 
 public function login()
 {
   $this->load->helper('jwt_helper');
   $this->load->model("Auth_model");



   if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	   $objss = json_decode(file_get_contents("php://input"), true);

	  // $objss['toggle']  //  0  1

	   if (isset($objss['email']) && isset($objss['password'])  ) {
	    $email = $objss['email'];
	    $password = $objss['password'];

	    $privilegio="";

	    if($objss['toggle']==0){
 			$user = $this->Auth_model->login($email, $password);
 			$privilegio=0;		
	    }
	    else if($objss['toggle']==1){
	    	$user = $this->Auth_model->login_admin($email, $password);		
	    	$privilegio=$user->privilegios;
	    }
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
	     "token" => $jwt,
	     "privilegio" => $privilegio
	     )));
	    }


	   }
	}

/*   Nota con metods de Cod igniter no trabaja

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
