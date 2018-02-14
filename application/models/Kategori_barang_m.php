<?php 

class Kategori_barang_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name'] 	= 'kategori_barang';
		$this->data['primary_key']	= 'id_kategori_barang';
	}
}