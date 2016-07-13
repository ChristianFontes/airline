<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
 
	 public function index()
	 {
	  // $this->load->helper('jwt_helper');

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


			$this->load->model("Register_model");

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

			if($registro){
				//algo aca si esverdad
			}else{
				//algo aca si es falso
			}

		}
	 }
}



/*fin de Register.php...............*/	