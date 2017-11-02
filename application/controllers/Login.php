<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Login extends MY_Controller
{

	private $data = [];

  	function __construct()
	{
	    parent::__construct();	
	    $username = $this->session->userdata('username');
		if (isset($username))
		{
			redirect('admin');
			exit;
		}
		$this->load->model('admin_m');	
  	}

  	public function test()
  	{
  		$this->load->model('penilaian_m');
  		$data = [
  			[
  				'id_bobot' 		=> 3,
  				'id_kriteria'	=> 1,
  				'id_pelamar'	=> 1
  			],
  			[
  				'id_bobot' 		=> 7,
  				'id_kriteria'	=> 2,
  				'id_pelamar'	=> 1
  			],
  			[
  				'id_bobot' 		=> 11,
  				'id_kriteria'	=> 3,
  				'id_pelamar'	=> 1
  			],
  			[
  				'id_bobot' 		=> 15,
  				'id_kriteria'	=> 4,
  				'id_pelamar'	=> 1
  			]
  		];
  		$temp = [];
  		foreach ($data as $row)
  		{
  			$temp []= (object)$row;
  		}
  		$data = $temp;
  		echo $this->penilaian_m->defuzzification($data);
  		echo $this->penilaian_m->decide($this->penilaian_m->defuzzification($data));
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
				$this->flashmsg('Username atau password salah','danger');
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
