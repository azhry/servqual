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
		$this->data['barang'] 		= $this->barang_m->get_row(['kode_barang' => $this->uri->segment(3)]);
		$this->data['title']		= $this->data['barang']->nama;
		$this->data['description']	= $this->data['barang']->deskripsi;
		$this->data['img']			= base_url('assets/barang/' . $this->data['barang']->kode_barang . '.jpg');
		$this->load->view( 'open_graph', $this->data );
	}
}