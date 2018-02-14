<?php 

class Detail_pemesanan_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name'] 	= 'detail_pemesanan';
		$this->data['primary_key']	= 'id_detail_pemesanan';
	}
}