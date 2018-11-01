<?php 

class Kritik_saran_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'kritik_saran';
		$this->data['primary_key']	= 'id_kritik_saran';
	}

	public function get_all()
	{
		$this->db->select('*')
			->from($this->data['table_name'])
			->join('pengguna', $this->data['table_name'] . '.id_pengguna = pengguna.id_pengguna')
			->order_by($this->data['table_name'] . '.created_at', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
}