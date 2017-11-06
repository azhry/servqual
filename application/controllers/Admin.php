<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
	private $data = [];

  	public function __construct()
	{
	    parent::__construct();		
		$this->load->model('pelamar_m');
  	}

  	public function test()
  	{
  		$this->load->model('penilaian_m');
  		$data = $this->penilaian_m->get(['id_pelamar' => 1]);
  		echo $this->penilaian_m->defuzzification($data);
  	}

  	public function index()
  	{
	    $this->data['title'] 	= 'Dashboard Admin';
	    $this->data['pelamar']	= $this->pelamar_m->get();
	    $this->data['content']	= 'admin/dashboard';
	    $this->template($this->data);
	}

	public function daftar_pelamar()
  	{
  		$this->load->model('kriteria_m');
  		$this->load->model('bobot_m');
  		$this->load->model('penilaian_m');
  		$this->load->model('keputusan_m');
  		$this->load->model('hasil_penilaian_m');
  		
  		if ($this->POST('simpan')) 
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

  			$this->pelamar_m->insert($this->data['entri']);
  			$this->flashmsg('<i class="fa fa-check"></i> Data pelamar berhasil ditambahkan');
  			redirect('admin/daftar-pelamar');
  			exit;
  		}

  		if ($this->POST('hitung_hasil'))
  		{
  			$pelamar = $this->pelamar_m->get();
  			foreach ($pelamar as $row)
  			{
  				$penilaian = $this->penilaian_m->get(['id_pelamar' => $row->id_pelamar]);
  				if (count($penilaian) > 0)
  				{
  					$hasil 		= $this->penilaian_m->defuzzification($penilaian);
  					$keputusan 	= $this->keputusan_m->get_row(['nama' => $this->penilaian_m->decide($hasil)]);

  					$this->data['entri'] = [
  						'id_pelamar'	=> $row->id_pelamar,
  						'hasil'			=> $hasil,
  						'id_keputusan'	=> $keputusan->id_keputusan
  					];

  					$hasil_penilaian = $this->hasil_penilaian_m->get_row(['id_pelamar' => $row->id_pelamar]);
  					if ($hasil_penilaian)
  					{
  						$this->hasil_penilaian_m->update_where(['id_pelamar' => $row->id_pelamar], $this->data['entri']);
  					}
  					else
  					{
  						$this->hasil_penilaian_m->insert($this->data['entri']);
  					}
  				}
  			}

  			$this->flashmsg('<i class="fa fa-check"></i> Hasil penilaian berhasil dikalkulasi');
  			redirect('admin/daftar-pelamar');
  			exit;
  		}

  		$this->data['kriteria'] = $this->kriteria_m->get();

  		if ($this->POST('input_nilai') && $this->POST('id_pelamar'))
  		{
  			foreach ($this->data['kriteria'] as $kriteria)
  			{
  				$this->data['entri'] = [
  					'id_bobot'		=> $this->POST($kriteria->nama),
  					'id_kriteria'	=> $kriteria->id_kriteria,
  					'id_pelamar'	=> $this->POST('id_pelamar')
  				];

  				$this->penilaian_m->insert($this->data['entri']);
  			}

  			// $penilaian = $this->penilaian_m->get(['id_pelamar' => $this->POST('id_pelamar')]);
  			// $hasil = $this->penilaian_m->defuzzification($penilaian);
  			// $keputusan = $this->keputusan_m->get_row(['nama' => $this->penilaian_m->decide($hasil)]);
  			
  			// $this->data['entri'] = [
  			// 	'id_pelamar'	=> $this->POST('id_pelamar'),
  			// 	'hasil'			=> $hasil,
  			// 	'id_keputusan'	=> $keputusan->id_keputusan
  			// ];
  			
  			// $this->hasil_penilaian_m->insert($this->data['entri']);

  			$this->flashmsg('<i class="fa fa-check"></i> Nilai pelamar berhasil dimasukan');
  			redirect('admin/hasil-penilaian/' . $this->POST('id_pelamar'));
  			exit;
  		}

	    $this->data['title'] 	= 'Daftar Pelamar';
	    $this->data['content']	= 'admin/daftar_pelamar';
	    $this->data['pelamar']	= $this->pelamar_m->get();
	    $this->template($this->data);
	}

	public function hasil_penilaian()
  	{
  		$this->data['id_pelamar']	= $this->uri->segment(3);
  		if (!isset($this->data['id_pelamar']))
  		{
  			redirect('admin/daftar-pelamar');
  			exit;
  		}

  		$this->load->model('kriteria_m');
  		$this->load->model('bobot_m');
  		$this->load->model('penilaian_m');
  		$this->load->model('keputusan_m');
  		$this->load->model('hasil_penilaian_m');

  		$this->data['pelamar']		= $this->pelamar_m->get_row(['id_pelamar' => $this->data['id_pelamar']]);
  		$this->data['penilaian']	= $this->penilaian_m->get(['id_pelamar' => $this->data['id_pelamar']]);
	    $this->data['title'] 		= 'Hasil Penilaian Pelamar';
	    $this->data['content']		= 'admin/hasil_penilaian';
	    $this->template($this->data);
	}
}
