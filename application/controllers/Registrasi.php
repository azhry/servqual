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
  		$this->load->model('user_m');
  		$this->load->model('pelamar_m');

  		if ($this->POST('daftar')) 
  		{
  			$this->data['user'] = [
  				'username'		=> $this->POST('username'),
  				'password'		=> md5($this->POST('password')),
  				'id_hak_akses'	=> 3
  			];

  			$this->user_m->insert($this->data['user']);

  			$this->data['pelamar'] = [
  				'nama'			=> $this->POST('nama'),
  				'email'			=> $this->POST('email')
  			];

  			$this->pelamar_m->insert($this->data['pelamar']);

  			$this->flashmsg('<i class="fa fa-check"></i> Anda berhasil mendaftar, silahkan login dan lengkapi biodata diri!');
  			redirect('registrasi');
  			exit;
  		}

	    $this->load->view('login_pelamar');
  	}

}