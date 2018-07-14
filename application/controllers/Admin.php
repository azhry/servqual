<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Admin extends MY_Controller {

	public function __construct() {

		parent::__construct();
		$this->data['id_pengguna']	= $this->session->userdata( 'id_pengguna' );
		if ( !isset( $this->data['id_pengguna'] ) ) {

			$this->session->sess_destroy();
			$this->flashmsg( 'Anda harus login terlebih dahulu', 'warning' );
			redirect( 'login/admin' );
			exit;

		}

		$this->data['role']	= $this->session->userdata( 'id_role' );
		if ( $this->data['role'] != "2" ) {

			$this->session->sess_destroy();
			$this->flashmsg( 'Anda harus login sebagai admin', 'warning' );
			redirect( 'login/admin' );
			exit;

		}

		$this->load->model( 'pengguna_m' );
		$this->data['admin'] = $this->pengguna_m->get_row( [ 'id_pengguna' => $this->data['id_pengguna'] ] );
        $this->data['logged_in'] = true;

	}

	public function index() {

        $this->load->model('kategori_barang_m');
        $this->load->model('barang_m');
        $this->load->model('pengguna_m');
        $this->load->model('role_m');
        $this->load->model('pemesanan_m');

		$this->data['title'] 	        = 'Dashboard ' . $this->title;
		$this->data['content']	        = 'admin/dashboard';
        $this->data['barang']           = $this->barang_m->get();
        $this->data['kategori_barang']  = $this->kategori_barang_m->get();
        $this->data['pengguna']         = $this->pengguna_m->get();
        $this->data['role']             = $this->role_m->get();
        $this->data['pemesanan']        = $this->pemesanan_m->get();
		$this->template( $this->data );
	
	}

	//---Barang--------------

    public function tambah_barang()
    {
        $this->load->model('barang_m');
        $this->load->model('kategori_barang_m');

        if($this->POST('simpan')){

            $this->data['input'] = [
                'kode_barang'     		=> $this->__generateRandomString(8, ['uppercase', 'number']),
                'id_kategori_barang'    => $this->POST('id_kategori_barang'),
                'nama'          		=> $this->POST('nama'),
                'deskripsi'          	=> $this->POST('deskripsi'),
                'harga'               	=> $this->POST('harga'),
                'stok'              	=> $this->POST('stok'),
                'status'      			=> $this->POST('status')
            ];

            $this->barang_m->insert($this->data['input']);

            // ambil nama kategori
            $kategori = $this->kategori_barang_m->get_row(['id_kategori_barang' => $this->POST('id_kategori_barang')])->nama_kategori;

            $this->upload($this->data['input']['kode_barang'], 'produk/'.$kategori, 'gambar');

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data barang berhasil disimpan');

            redirect('admin/barang');
        }


        $this->data['title']        = 'Tambah Data Barang';
        $this->data['content']      = 'admin/barang_tambah';
        $this->data['kategori']   	= $this->kategori_barang_m->get();
        $this->data['barang']      	= $this->barang_m->get();
        $this->template($this->data, 'admin');
    }

    public function edit_barang()
    {
        $this->load->model('barang_m');
        $this->load->model('kategori_barang_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/barang');
            exit;
        }

        $this->load->model('barang_m');
        $this->data['data']        = $this->barang_m->get_row(['kode_barang' => $this->data['id']]);
        $this->data['nama_kategori'] = $this->kategori_barang_m->get_row(['id_kategori_barang' => $this->data['data']->id_kategori_barang])->nama_kategori;

        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data barang tidak ditemukan', 'danger');
            redirect('admin/barang');
            exit;
        }

        if($this->POST('simpan'))
        {
            $this->data['data_row'] = [
                'id_kategori_barang'    => $this->POST('id_kategori_barang'),
                'nama'          		=> $this->POST('nama'),
                'deskripsi'          	=> $this->POST('deskripsi'),
                'harga'               	=> $this->POST('harga'),
                'stok'              	=> $this->POST('stok'),
                'status'      			=> $this->POST('status')
            ];

            $this->barang_m->update($this->data['id'], $this->data['data_row']);

            $this->upload($this->data['id'], 'barang', 'gambar');

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data barang berhasil diedit');
            redirect('admin/edit-barang/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data Barang';
        $this->data['content']      = 'admin/barang_edit';
        $this->data['kategori']   	= $this->kategori_barang_m->get();
        $this->data['barang']      	= $this->barang_m->get();
        $this->template($this->data, 'admin');
    }

    public function detail_barang()
    {
        $this->load->model('barang_m');
        $this->load->model('kategori_barang_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/barang');
            exit;
        }

        $this->load->model('barang_m');
        $this->data['data']        = $this->barang_m->get_row(['kode_barang' => $this->data['id']]);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data barang tidak ditemukan', 'danger');
            redirect('admin/barang');
            exit;
        }

        $this->data['title']        = 'Detail Data Barang';
        $this->data['content']      = 'admin/barang_detail';
        $this->template($this->data, 'admin');
    }

    public function barang()
    {
        $this->load->model('barang_m');
        $this->load->model('kategori_barang_m');

        if ($this->POST('delete') && $this->POST('kode_barang'))
        {
            $this->barang_m->delete($this->POST('kode_barang'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data barang berhasil dihapus');
        }

        $this->data['data']        	= $this->barang_m->get();
        $this->data['title']        = 'Data barang';
        $this->data['content']      = 'admin/barang_data';
        $this->template($this->data, 'admin');
    }

    //---Kategori Barang--------------

    public function tambah_kategori()
    {
        $this->load->model('kategori_barang_m');

        if($this->POST('simpan')){

            $this->data['input'] = [
                'nama_kategori'  => $this->POST('nama_kategori')
            ];

            $this->kategori_barang_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil disimpan');

            redirect('admin/kategori');
            exit;
        }


        $this->data['title']        = 'Tambah Data Kategori';
        $this->data['content']      = 'admin/kategori_tambah';
        $this->data['kategori']       = $this->kategori_barang_m->get();
        $this->template($this->data, 'admin');
    }

    public function edit_kategori()
    {
        $this->load->model('kategori_barang_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/kategori');
            exit;
        }

        $this->load->model('kategori_barang_m');
        $this->data['data']        = $this->kategori_barang_m->get_row(['id_kategori_barang' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data kategori tidak ditemukan', 'danger');
            redirect('admin/kategori');
            exit;
        }


        if($this->POST('simpan'))
        {
            $this->data['data_row'] = [
                'nama_kategori'     => $this->POST('nama_kategori')
            ];

            $this->kategori_barang_m->update($this->data['id'], $this->data['data_row']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil diedit');
            redirect('admin/edit-kategori/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data Kategori';
        $this->data['content']      = 'admin/kategori_edit';
        $this->data['kategori']     = $this->kategori_barang_m->get();
        $this->template($this->data, 'admin');
    }

    public function kategori()
    {
        $this->load->model('kategori_barang_m');

        if ($this->POST('delete') && $this->POST('id_kategori_barang'))
        {
            $this->kategori_barang_m->delete($this->POST('id_kategori_barang'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil dihapus');
        }

        $this->data['data']         = $this->kategori_barang_m->get();
        $this->data['title']        = 'Data Kategori';
        $this->data['content']      = 'admin/kategori_data';
        $this->template($this->data, 'admin');
    }

    //---Pengguna--------------

    public function tambah_pengguna()
    {
        $this->load->model('pengguna_m');
        $this->load->model('role_m');

        if($this->POST('simpan')){

            $this->data['input'] = [
                'id_role'               => $this->POST('id_role'),
                'username'              => $this->POST('username'),
                'password'              => md5($this->POST('password')),
                'email'                 => $this->POST('email'),
                'nama'                  => $this->POST('nama'),
                'jenis_kelamin'         => $this->POST('jenis_kelamin'),
                'alamat'                => $this->POST('alamat'),
                'no_hp'                 => $this->POST('no_hp')
            ];

            $this->pengguna_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data pengguna berhasil disimpan');

            redirect('admin/pengguna');
            exit;
        }

        $this->data['title']        = 'Tambah Data Pengguna';
        $this->data['content']      = 'admin/pengguna_tambah';
        $this->data['role']         = $this->role_m->get();
        $this->template($this->data, 'admin');
    }

    public function edit_pengguna()
    {
        $this->load->model('pengguna_m');
        $this->load->model('role_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/pengguna');
            exit;
        }

        $this->load->model('pengguna_m');
        $this->data['data']        = $this->pengguna_m->get_row(['id_pengguna' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengguna tidak ditemukan', 'danger');
            redirect('admin/pengguna');
            exit;
        }

       

        if($this->POST('simpan'))
        {
            $pass = $this->POST('password');
            
            if(isset($pass)){
                $this->data['data_row'] = [
                    'id_role'               => $this->POST('id_role'),
                    'username'              => $this->POST('username'),
                    'password'              => md5($pass),
                    'email'                 => $this->POST('email'),
                    'nama'                  => $this->POST('nama'),
                    'jenis_kelamin'         => $this->POST('jenis_kelamin'),
                    'alamat'                => $this->POST('alamat'),
                    'no_hp'                 => $this->POST('no_hp')
                ];

                $this->pengguna_m->update($this->data['id'], $this->data['data_row']);
                $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data pengguna berhasil diedit');
                redirect('admin/edit-pengguna/' . $this->data['id']);
                exit;
            }
            else {
                $this->data['data_row'] = [
                    'id_role'               => $this->POST('id_role'),
                    'username'              => $this->POST('username'),
                    'email'                 => $this->POST('email'),
                    'nama'                  => $this->POST('nama'),
                    'jenis_kelamin'         => $this->POST('jenis_kelamin'),
                    'alamat'                => $this->POST('alamat'),
                    'no_hp'                 => $this->POST('no_hp')
                ];

                $this->pengguna_m->update($this->data['id'], $this->data['data_row']);
                $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data pengguna berhasil diedit');
                redirect('admin/edit-pengguna/' . $this->data['id']);
                exit;
            }
        }

        $this->data['title']        = 'Edit Data Pengguna';
        $this->data['content']      = 'admin/pengguna_edit';
        $this->data['pengguna']     = $this->pengguna_m->get();
        $this->data['role']         = $this->role_m->get();
        $this->template($this->data, 'admin');
    }

    public function detail_pengguna()
    {
        $this->load->model('pengguna_m');
        $this->load->model('role_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/pengguna');
            exit;
        }

        $this->load->model('pengguna_m');
        $this->data['data']        = $this->pengguna_m->get_row(['id_pengguna' => $this->data['id']]);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengguna tidak ditemukan', 'danger');
            redirect('admin/pengguna');
            exit;
        }

        $this->data['title']        = 'Detail Data Pengguna';
        $this->data['content']      = 'admin/pengguna_detail';
        $this->template($this->data, 'admin');
    }

    public function pengguna()
    {
        $this->load->model('pengguna_m');
        $this->load->model('role_m');

        if ($this->POST('delete') && $this->POST('id_pengguna'))
        {
            $this->pengguna_m->delete($this->POST('id_pengguna'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data pengguna berhasil dihapus');
        }

        $this->data['data']         = $this->pengguna_m->get();
        $this->data['title']        = 'Data pengguna';
        $this->data['content']      = 'admin/pengguna_data';
        $this->template($this->data, 'admin');
    }

    //---Role--------------

    public function tambah_role()
    {
        $this->load->model('role_m');

        if($this->POST('simpan')){

            $this->data['input'] = [
                'role'  => $this->POST('role')
            ];

            $this->role_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil disimpan');

            redirect('admin/role');
            exit;
        }


        $this->data['title']        = 'Tambah Data Role';
        $this->data['content']      = 'admin/role_tambah';
        $this->data['role']       = $this->role_m->get();
        $this->template($this->data, 'admin');
    }

    public function edit_role()
    {
        $this->load->model('role_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/role');
            exit;
        }

        $this->load->model('role_m');
        $this->data['data']        = $this->role_m->get_row(['id_role' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data kategori tidak ditemukan', 'danger');
            redirect('admin/role');
            exit;
        }


        if($this->POST('simpan'))
        {
            $this->data['data_row'] = [
                'role'     => $this->POST('role')
            ];

            $this->role_m->update($this->data['id'], $this->data['data_row']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil diedit');
            redirect('admin/edit-role/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data Role';
        $this->data['content']      = 'admin/role_edit';
        $this->data['role']     = $this->role_m->get();
        $this->template($this->data, 'admin');
    }

    public function role()
    {
        $this->load->model('role_m');

        if ($this->POST('delete') && $this->POST('id_role'))
        {
            $this->role_m->delete($this->POST('id_role'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil dihapus');
        }

        $this->data['data']         = $this->role_m->get();
        $this->data['title']        = 'Data Role';
        $this->data['content']      = 'admin/role_data';
        $this->template($this->data, 'admin');
    }

    //----Pemesanan-----

    public function pemesanan()
    {
        $this->load->model('pemesanan_m');

        if ($this->POST('delete') && $this->POST('id_pemesanan'))
        {
            $this->role_m->delete($this->POST('id_pemesanan'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil dihapus');
        }

        if($this->POST('status') && $this->POST('id_pemesanan')){
            $pemesanan = $this->pemesanan_m->get_row(['id_pemesanan' => $this->POST('id_pemesanan')]);

            if (isset($pemesanan))
            {
                $id = $this->POST('id_pemesanan');

                if ($pemesanan->status == 'Lunas')
                {
                    $this->pemesanan_m->update($id, ['status' => 'Belum Bayar']);
                    echo '<button class="btn btn-danger" onclick="changeStatus('.$id.')"><i class="fa fa-close"></i> Belum Bayar</button>';
                }
                else
                {
                    $this->pemesanan_m->update($id, ['status' => 'Lunas']);
                    echo '<button class="btn btn-success" onclick="changeStatus('.$id.')"><i class="fa fa-check"></i> Lunas</button>';   
                }
            }
            exit;
        }

        $this->data['data']         = $this->pemesanan_m->get();
        $this->data['title']        = 'Data Pemesanan';
        $this->data['content']      = 'admin/pemesanan_data';
        $this->template($this->data, 'admin');
    }

    public function detail_pemesanan()
    {
        $this->load->model('pemesanan_m');
        $this->load->model('detail_pemesanan_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/pemesanan');
            exit;
        }

        $this->load->model('pemesanan_m');
        $this->data['data']        = $this->pemesanan_m->get_with_detail($this->data['id']);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pemesanan tidak ditemukan', 'danger');
            redirect('admin/pemesanan');
            exit;
        }

        $this->data['detail']        = $this->detail_pemesanan_m->get(['id_pemesanan' => $this->data['id']]);

        $this->data['title']        = 'Detail Data pemesanan';
        $this->data['content']      = 'admin/pemesanan_detail';
        $this->template($this->data, 'admin');
    }

    public function kuesioner_pemesanan()
    {
        $this->data['id_pengguna'] = $this->uri->segment(3);
        if (!isset($this->data['id_pengguna']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/pemesanan');
        }

        $this->load->model('pengguna_m');
        $this->data['pengguna']     = $this->pengguna_m->get_row(['id_pengguna' => $this->data['id_pengguna']]);
        if (!isset($this->data['pengguna']))
        {
            $this->flashmsg('Data pengguna tidak ditemukan', 'danger');
            redirect('admin/pemesanan');
        }

        $this->load->model('pertanyaan_m');

        $this->data['hasil_kuesioner']  = $this->pertanyaan_m->hasil_kuesioner($this->data['id_pengguna']);
        $this->data['title']            = 'Kuesioner Pelanggan';
        $this->data['content']          = 'admin/kuesioner_pemesanan';
        $this->template($this->data, 'admin');   
    }

    //---Survei--------------

    public function tambah_survei()
    {
        $this->load->model('pertanyaan_m');
        $this->load->model('jawaban_m');
        $this->load->model('jawaban_pengguna_m');

        if($this->POST('simpan')) {
            for($i = 1; $i <= 10; $i++){
                $jawaban = [
                    'id_pengguna'       => 1,
                    'id_pertanyaan'     => $i,
                    'id_jawaban'        => $this->POST('pertanyaan_'.$i)
                ];

                $this->jawaban_pengguna_m->insert($jawaban);
            }

            $this->flashmsg( 'Survei berhasil disimpan!' );
            redirect( 'Pelanggan/survei' );
            exit;
        }

        $this->data['pertanyaan']   = $this->pertanyaan_m->get();
        $this->data['jawaban']      = $this->jawaban_m->get();
        $this->data['title']        = 'Survei';
        $this->data['content']      = 'pelanggan/survei';
        $this->template($this->data, 'pelanggan');
    }

    public function edit_survei()
    {
        $this->load->model('pertanyaan_m');
        $this->load->model('jawaban_m');
        $this->load->model('jawaban_pengguna_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/survei');
            exit;
        }

        $this->data['data']        = $this->jawaban_pengguna_m->get_row(['id_jawaban_pengguna' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data survei tidak ditemukan', 'danger');
            redirect('admin/survei');
            exit;
        }


        if($this->POST('simpan'))
        {
            $jawaban = [
                'id_pengguna'       => $this->POST('id_pengguna'),
                'id_pertanyaan'     => $this->POST('id_pertanyaan'),
                'id_jawaban'        => $this->POST('pertanyaan')
            ];

            $this->jawaban_pengguna_m->update($this->data['id'], $jawaban);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data survei berhasil diedit');
            redirect('admin/edit-survei/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data Survei';
        $this->data['content']      = 'admin/survei_edit';
        $this->data['survei']     = $this->jawaban_pengguna_m->get();
        $this->template($this->data, 'admin');
    }

    public function survei()
    {
        $this->load->model('pertanyaan_m');
        $this->load->model('jawaban_m');
        $this->load->model('jawaban_pengguna_m');

        if ($this->POST('delete') && $this->POST('id_jawaban_pengguna'))
        {
            $this->survei_m->delete($this->POST('id_jawaban_pengguna'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data survei berhasil dihapus');
        }

        $this->data['data']         = $this->jawaban_pengguna_m->get();
        $this->data['title']        = 'Data Survei';
        $this->data['content']      = 'admin/survei_data';
        $this->template($this->data, 'admin');
    }

    //---Pertanyaan--------------

    public function tambah_pertanyaan()
    {
        $this->load->model('pertanyaan_m');

        if($this->POST('simpan')){

            $this->data['input'] = [
                'pertanyaan'  => $this->POST('pertanyaan')
            ];

            $this->pertanyaan_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil disimpan');

            redirect('admin/pertanyaan');
            exit;
        }


        $this->data['title']        = 'Tambah Data pertanyaan';
        $this->data['content']      = 'admin/pertanyaan_tambah';
        $this->data['pertanyaan']       = $this->pertanyaan_m->get();
        $this->template($this->data, 'admin');
    }

    public function edit_pertanyaan()
    {
        $this->load->model('pertanyaan_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/pertanyaan');
            exit;
        }

        $this->load->model('pertanyaan_m');
        $this->data['data']        = $this->pertanyaan_m->get_row(['id_pertanyaan' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data kategori tidak ditemukan', 'danger');
            redirect('admin/pertanyaan');
            exit;
        }


        if($this->POST('simpan'))
        {
            $this->data['data_row'] = [
                'pertanyaan'     => $this->POST('pertanyaan')
            ];

            $this->pertanyaan_m->update($this->data['id'], $this->data['data_row']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil diedit');
            redirect('admin/edit-pertanyaan/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data Pertanyaan';
        $this->data['content']      = 'admin/pertanyaan_edit';
        $this->data['pertanyaan']     = $this->pertanyaan_m->get();
        $this->template($this->data, 'admin');
    }

    public function pertanyaan()
    {
        $this->load->model('pertanyaan_m');
        $this->load->model('jawaban_pengguna_m');

        if ($this->POST('delete') && $this->POST('id_pertanyaan'))
        {
            $this->pertanyaan_m->delete($this->POST('id_pertanyaan'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil dihapus');
        }

        $this->data['data']         = $this->pertanyaan_m->get();
        $this->data['title']        = 'Data Pertanyaan';
        $this->data['content']      = 'admin/pertanyaan_data';
        $this->template($this->data, 'admin');
    }


    //---Jawaban--------------

    public function tambah_jawaban()
    {
        $this->load->model('jawaban_m');
        $this->load->model('pertanyaan_m');

        if($this->POST('simpan')){

            $this->data['input'] = [
                'id_pertanyaan' => $this->POST('id_pertanyaan'),
                'jawaban'       => $this->POST('jawaban'),
                'skor'          => $this->POST('skor'),
            ];

            $this->jawaban_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil disimpan');

            redirect('admin/jawaban');
            exit;
        }


        $this->data['title']        = 'Tambah Data Jawaban';
        $this->data['content']      = 'admin/jawaban_tambah';
        $this->data['pertanyaan']   = $this->pertanyaan_m->get();
        $this->template($this->data, 'admin');
    }

    public function edit_jawaban()
    {
        $this->load->model('jawaban_m');
        $this->load->model('pertanyaan_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/jawaban');
            exit;
        }

        $this->load->model('jawaban_m');
        $this->data['data']        = $this->jawaban_m->get_row(['id_jawaban' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data kategori tidak ditemukan', 'danger');
            redirect('admin/jawaban');
            exit;
        }


        if($this->POST('simpan'))
        {
            $this->data['data_row'] = [
                'id_pertanyaan' => $this->POST('id_pertanyaan'),
                'jawaban'       => $this->POST('jawaban'),
                'skor'          => $this->POST('skor'),
            ];

            $this->jawaban_m->update($this->data['id'], $this->data['data_row']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil diedit');
            redirect('admin/edit-jawaban/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data jawaban';
        $this->data['content']      = 'admin/jawaban_edit';
        $this->data['jawaban']      = $this->jawaban_m->get();
        $this->data['pertanyaan']   = $this->pertanyaan_m->get();
        $this->template($this->data, 'admin');
    }

    public function jawaban()
    {
        $this->load->model('jawaban_m');
        $this->load->model('pertanyaan_m');

        if ($this->POST('delete') && $this->POST('id_jawaban'))
        {
            $this->jawaban_m->delete($this->POST('id_jawaban'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kategori berhasil dihapus');
        }

        $this->data['data']         = $this->jawaban_m->get();
        $this->data['title']        = 'Data jawaban';
        $this->data['content']      = 'admin/jawaban_data';
        $this->template($this->data, 'admin');
    }

    public function promo()
    {
        $this->load->model('barang_m');
        $this->load->model('kategori_barang_m');

        if ($this->POST('submit'))
        {
            $this->data['input'] = [
                'kode_barang'           => $this->__generateRandomString(8, ['uppercase', 'number']),
                'id_kategori_barang'    => $this->POST('id_kategori_barang'),
                'nama'                  => $this->POST('nama'),
                'deskripsi'             => $this->POST('deskripsi'),
                'harga'                 => $this->POST('harga'),
                'stok'                  => $this->POST('stok'),
                'status'                => $this->POST('status'),
                'jenis'                 => 'Promo'
            ];

            $this->barang_m->insert($this->data['input']);
            
            // ambil nama kategori
            $kategori = $this->kategori_barang_m->get_row(['id_kategori_barang' => $this->POST('id_kategori_barang')])->nama_kategori;

            $this->upload($this->data['input']['kode_barang'], 'produk/'.$kategori, 'gambar');

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data promo barang berhasil disimpan');

            redirect('admin/barang');
        }
        $this->data['title']        = 'Promo Barang';
        $this->data['content']      = 'admin/promo_barang';
        $this->data['kategori']     = $this->kategori_barang_m->get();
        $this->data['barang']       = $this->barang_m->get();
        $this->template($this->data, 'admin');
    }

    public function lihat_bukti_pembayaran()
    {
        if (file_exists(FCPATH . '/assets/bukti_pembayaran/' . $this->uri->segment(3) . '.JPG'))
        {
            redirect(base_url('assets/bukti_pembayaran/' . $this->uri->segment(3) . '.JPG'));
        }

        $this->flashmsg('Pemesanan ini belum ada bukti pembayaran', 'danger');
        redirect('admin/pemesanan');
    }
}