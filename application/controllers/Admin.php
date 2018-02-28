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

	}

	public function index() {

        $this->load->model('kategori_barang_m');
        $this->load->model('barang_m');
        $this->load->model('pengguna_m');
        $this->load->model('role_m');
        $this->load->model('pemesanan_m');

		$this->data['title'] 	        = 'Dashboard | ' . $this->title;
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
                'kode_barang'     		=> $this->POST('kode_barang'),
                'id_kategori_barang'    => $this->POST('id_kategori_barang'),
                'nama'          		=> $this->POST('nama'),
                'deskripsi'          	=> $this->POST('deskripsi'),
                'harga'               	=> $this->POST('harga'),
                'stok'              	=> $this->POST('stok'),
                'status'      			=> $this->POST('status')
            ];

            $this->barang_m->insert($this->data['input']);
            $kode_barang = $this->barang_m->get_row(['kode_barang' => $this->POST('kode_barang')])->kode_barang;

            $this->upload($kode_barang, 'barang', 'gambar');

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data barang berhasil disimpan');

            redirect('admin/barang');
            exit;
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

        $this->data['title']        = 'Detail Data pemesanan';
        $this->data['content']      = 'admin/pemesanan_detail';
        $this->template($this->data, 'admin');
    }
}