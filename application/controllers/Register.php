<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Register extends MY_Controller {

	public function __construct() {

		parent::__construct();
	}

	public function index() {
		$this->load->model('pengguna_m');

		if($this->POST('register')){

			if($this->POST('password1') != $this->POST('password2')){
				$this->session->set_flashdata('<div class="alert alert-danger" style="text-align:center;">Password dan konfirmasi password tidak sama!</div>', 'danger');
				redirect('register');
				exit;
			}

			$this->data['register'] = [
				'username'		=> $this->POST('username'),
				'password'		=> md5($this->POST('password1')),
				'email'			=> $this->POST('email'),
				'nama'			=> $this->POST('nama'),
				'jenis_kelamin'	=> $this->POST('jenis_kelamin'),
				'alamat'		=> $this->POST('alamat'),
				'no_hp'			=> $this->POST('no_hp'),
				'id_role'		=> "1"
			];

			$this->pengguna_m->insert($this->data['register']);
			$this->flashmsg( 'Anda berhasil registrasi!' );
			redirect( 'login' );
			exit;
		}


		$this->load->view('pelanggan/register');
	}

	

}