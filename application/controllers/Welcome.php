<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function register()
	{
		$error		= true;
		
		$email = $this->input->post("email_reg");
      	$password = $this->input->post("password_reg");
      	$birthday = $this->input->post("birthday_reg");

		$this->form_validation->set_rules('email_reg', 'Email', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('password_reg', 'Password', 'required|callback_password_check');
		$this->form_validation->set_rules('birthday_reg', 'Birthday', 'required|callback_birthday_check');

		if ($this->form_validation->run() == FALSE)
        {
			$error		= true;
		}
		else
		{
			$error		= false;			
		}

		$response = array(
		
			'error'		=> $error
		
		);

		echo json_encode($response);
	}

	public function registerasi()
	{
		$error		= true;
		
		$email = $this->input->post("email_reg");
      	$password = $this->input->post("password_reg");
      	$birthday = $this->input->post("birthday_reg");

		  $data = array(
			'email'=>$email,
			'password'=>$password,
			'birthday'=>$birthday
		);
		$this->session->set_userdata('login', $data);

		if(isset($_SESSION['login'])) {
			$error		= false;
		}else {
			$error		= true;
		}

		$response = array(
		
			'error'		=> $error
		
		);

		echo json_encode($response);
	}

	public function login()
	{
		$email = $this->input->post("email_log");
      	$password = $this->input->post("password_log");
	}

	public function logout()
	{
		unset($_SESSION['login']);

		if(isset($_SESSION['login'])) {
			$error		= true;
		}else {
			$error		= false;
		}

		$response = array(
		
			'error'		=> $error
		
		);

		echo json_encode($response);
	}

	public function email_check($str)
	{
		$check = substr($str, strpos($str, "@") + 1);
		if($check != "rumahweb.co.id"){
					return FALSE;
		}else{
					return TRUE;
		}
	}

	public function password_check($str)
	{
		$bool = preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $str);
		return $bool == 0 ? false : true;
	}

	public function birthday_check($str)
	{
		$lahir    =new DateTime($str);
		$today        =new DateTime();
    	$umur = $today->diff($lahir)->y;

		if($umur <= 16){
			return FALSE;
		}else{
			return TRUE;
		}
	}
}
