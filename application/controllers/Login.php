<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	private $data = [];

  	public function __construct()
	{
	    parent::__construct();	
	    $username 	= $this->session->userdata('username');
	    $role		= $this->session->userdata('role');
		if (isset($username, $role))
		{
			switch ($role) 
			{
				case 'admin':
					redirect('admin');
					break;

				case 'supervisor':
					redirect('supervisor');
					break;
			}

			exit;
		}
		$this->load->model('admin_m');	
		$this->load->model('supervisor_m');
  	}


  	public function index()
  	{
  		if ($this->POST('login-submit'))
		{
			if (!$this->admin_m->required_input(['username','password'])) 
			{
				$this->flashmsg('Data harus lengkap','warning');
				redirect('login');
				exit;
			}
			
			$this->data = [
    			'username'	=> $this->POST('username'),
    			'password'	=> md5($this->POST('password'))
			];

			$result = $this->admin_m->login($this->data);
			if (!isset($result)) 
			{
				$result = $this->supervisor_m->login($this->data);
				if (!isset($result))
				{
					$this->flashmsg('Username atau password salah','danger');
				}
			}
			redirect('login');
			exit;
		}
		$this->data['title'] = 'LOGIN'.$this->title;
		$this->load->view('login',$this->data);
	}

	public function daftar()
  	{
	    $this->load->view('daftar');
	}	
}
