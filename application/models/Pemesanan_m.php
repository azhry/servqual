<?php 

class Pemesanan_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name'] 	= 'pemesanan';
		$this->data['primary_key']	= 'id_pemesanan';
	}

	public function get_with_detail($id){

		$query = $this->db->query('SELECT pemesanan.*, detail_pemesanan.* FROM pemesanan INNER JOIN 	detail_pemesanan ON pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan
				WHERE pemesanan.id_pemesanan = '.$id.' ');
		return $query->row();
	}
}