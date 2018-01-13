<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends MY_Controller
{
	private $data = [];

  	public function __construct()
	{
	    parent::__construct();		
  	}

  	public function index()
  	{
  		$this->load->model('pelamar_m');

  		if ($this->POST('daftar')) 
  		{
  			$this->data['entri'] = [
  				'nama'			=> $this->POST('nama'),
  				'password'		=> md5($this->POST('password')),
  				'username'		=> $this->POST('username'),
  				'email'			=> $this->POST('email')
  			];

  			$this->pelamar_m->insert($this->data['entri']);

  			$this->flashmsg('<i class="fa fa-check"></i> Anda berhasil mendaftar, silahkan login dan lengkapi biodata diri!');
  			redirect('registrasi');
  			exit;
  		}

	    $this->load->view('login_pelamar');
  	}

}