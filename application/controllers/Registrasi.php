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
        $username   = $this->POST('username'  );
        $password1  = $this->POST('password1') ;
        $password2  = $this->POST('password2') ;

        if(!isset($password1) && !isset($password2) && !isset($username)){
          $this->flashmsg('<i class="fa fa-check"></i> Username dan password harus diisi!', 'danger');
          redirect('registrasi');
          exit;
        }
        else {

          if($password1 == $password2) {
            $this->data['pelamar'] = [
              'username'    => $this->POST('username'),
              'password'    => md5($this->POST('password1'))
            ];

            $this->pelamar_m->insert($this->data['pelamar']);

            $this->flashmsg('<i class="fa fa-check"></i> Anda berhasil mendaftar, silahkan login dan lengkapi biodata diri!');
            redirect('registrasi');
            exit;
          }
          else {
            $this->flashmsg('<i class="fa fa-check"></i> Password dan konfirmasi password tidak sama!', 'warning');
            redirect('registrasi');
            exit;
          }
        }
  		}

	    $this->load->view('login_pelamar');
  	}

}