<?php 

class Detail_pemesanan_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name'] 	= 'detail_pemesanan';
		$this->data['primary_key']	= 'id_detail_pemesanan';
	}

	public function get_detail($cond = '')
	{
		if ((is_string($cond) && !empty($cond)) or (is_array($cond) && count($cond) > 0))
			$this->db->where($cond);

		$this->db->select('*')
			->from($this->data['table_name'])
			->join('barang', $this->data['table_name'] . '.kode_barang = barang.kode_barang');

		$query = $this->db->get();
		return $query->result();
	}
}