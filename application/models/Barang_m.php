<?php 

class Barang_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name'] 	= 'barang';
		$this->data['primary_key']	= 'kode_barang';
	}

	public function get_row_barang( $cond = '' ) {

		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);

		$this->db->select( '*' );
		$this->db->from( $this->data['table_name'] );
		$this->db->join( 'kategori_barang', 'kategori_barang.id_kategori_barang=' . $this->data['table_name'] . '.id_kategori_barang' );
		$query = $this->db->get();
		return $query->row();

	}
}