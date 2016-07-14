<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type: text/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");


class Register extends CI_Controller {
 
	 public function index()
	 {

	  header('Content-type: text/json');
	  $this->load->helper('jwt_helper'); 
      $this->load->model("Register_model");
	  $this->load->model("Auth_model");

	  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		   $objss = json_decode(file_get_contents("php://input"), true);

    //JSON : dni, firstName, lastName, streetAddress, state, zipcode, phone, cellPhone, email, password

			$dni=$objss['dni'];
			 $firstName=$objss['firstName'];
			  $lastName=$objss['lastName'];
			   $streetAddress=$objss['streetAddress'];
			    $state=$objss['state'];
			     $zipcode=$objss['zipcode'];
			      $phone=$objss['phone'];
			       $cellPhone=$objss['cellPhone'];
			        $email=$objss['email'];
			         $password=$objss['password'];



			$registro = $this->Register_model->register_client($dni,
			 $firstName,
			  $lastName,
			   $streetAddressss,
			    $state,
			     $zipcode,
			      $phone,
			       $cellPhone,
			        $email,
			         $password);

			if($registro==1){

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
			}else{
				//algo aca si es falso
			}
	 }
	}
}



/*fin de Register.php...............*/	
