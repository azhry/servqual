<?php  

class Open_graph extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('barang_m');
		$this->load->model('kategori_barang_m');
		$this->data['barang'] 		= $this->barang_m->get_row(['kode_barang' => $this->uri->segment(3)]);
		$this->data['title']		= $this->data['barang']->nama;
		$this->data['description']	= $this->data['barang']->deskripsi;
		$this->data['kategori']		= $this->kategori_barang_m->get_row(['id_kategori_barang' => $this->data['barang']->id_kategori_barang])->nama_kategori;
		$this->data['img']			= base_url('assets/produk/' . str_replace(' ', '%20', $this->data['kategori']) . '/' . $this->data['barang']->kode_barang . '.JPG');
		$this->load->view( 'open_graph', $this->data );
	}
}