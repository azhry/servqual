<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends MY_Controller
{
	private $data = [];

  	public function __construct()
	 {
	    parent::__construct();		
      
      $username   = $this->session->userdata('username');
      $password   = $this->session->userdata('password');
  	
      if(!isset($username) && !isset($password)){
        $this->flashmsg('<i class="fa fa-check"></i> Anda harus login dulu!', 'danger');
        redirect('Login');
        exit;
      }
    }

  	public function index()
  	{
      $username   = $this->session->userdata('username');
      $password   = $this->session->userdata('password');
      
  		$this->load->model('pelamar_m');
      $id = $this->pelamar_m->get_row(['username' => $username, 'password' => $password])->id_pelamar;

  		if ($this->POST('daftar')) 
  		{
  			$this->data['entri'] = [
  				'nama'			=> $this->POST('nama'),
  				'alamat'		=> $this->POST('alamat'),
  				'tempat_lahir'	=> $this->POST('tempat_lahir'),
  				'tgl_lahir'		=> $this->POST('tgl_lahir'),
  				'no_hp'			=> $this->POST('no_hp'),
  				'email'			=> $this->POST('email'),
  				'jk'			=> $this->POST('jk')
  			];

  			$this->pelamar_m->update($id, $this->data['entri']);
  			$this->upload($id, 'foto', 'foto');

  			$this->flashmsg('<i class="fa fa-check"></i> Anda berhasil mendaftar!');
  			redirect('pendaftaran');
  			exit;
  		}

      $this->data['pelamar' ] = $this->pelamar_m->get_row(['id_pelamar' => $id]);

	    $this->load->view('daftar', $this->data);
	}
}
