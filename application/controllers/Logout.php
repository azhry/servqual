<?php

class Logout extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		$this->session->sess_destroy();
		redirect('Pelanggan/survei');
		exit;
	}

	public function admin()
	{
		
		$this->session->sess_destroy();
		redirect('login/admin');
		exit;
	}
}
