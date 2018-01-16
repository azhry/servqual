<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends MY_Controller
{
	private $data = [];

  public function __construct()
	{
	    parent::__construct();	

      $this->data['username']     = $this->session->userdata('username');
      $this->data['id_pelamar'] = $this->session->userdata('id_pelamar');
      
      if (!isset($this->data['username'], $this->data['id_pelamar']))
      {
          $this->session->sess_destroy();
          redirect('login');
          exit;
      }

  	}

  	public function index()
  	{
  		$this->load->model('pelamar_m');
      $id = $this->session->userdata('id_pelamar');

  		if ($this->POST('daftar')) 
  		{
  			$this->data['entri'] = [
  				'nama'			    => $this->POST('nama'),
  				'alamat'		    => $this->POST('alamat'),
  				'tempat_lahir'	=> $this->POST('tempat_lahir'),
  				'tgl_lahir'		  => $this->POST('tgl_lahir'),
  				'no_hp'			    => $this->POST('no_hp'),
  				'email'			    => $this->POST('email'),
  				'jk'			      => $this->POST('jk'),
          'ipk'           => $this->POST('ipk'),
          'jurusan'                 => $this->POST('jurusan'),
          'asal_perguruan_tinggi'   => $this->POST('asal_perguruan_tinggi'),
          'pendidikan_terakhir'     => $this->POST('pendidikan_terakhir')
  			];

  			$this->pelamar_m->update($id, $this->data['entri']);
  			
  			$this->upload($id, 'foto', 'foto');
        $this->upload($id, 'ijazah', 'ijazah');

  			$this->flashmsg('<i class="fa fa-check"></i> Data berhasil disimpan!');
  			redirect('pendaftaran');
  			exit;
  		}

      $this->data['pelamar'] = $this->pelamar_m->get_row(['id_pelamar' => $id]);
	    $this->load->view('daftar', $this->data);
	}
}
