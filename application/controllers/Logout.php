<?php

class Logout extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->session->unset_userdata('username');
		redirect('login');
		exit;
	}
<<<<<<< HEAD

	public function pelamar()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_hak_akses');
		redirect('login/pelamar');
		exit;
	}
=======
>>>>>>> parent of 59db19b... login pelamar
}
