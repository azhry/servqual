<?php 

class Pertanyaan_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name'] 	= 'pertanyaan';
		$this->data['primary_key']	= 'id_pertanyaan';
	}

	public function hasil_kuesioner($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from($this->data['table_name']);
		$this->db->join('jawaban_pengguna', $this->data['table_name'] . '.id_pertanyaan = jawaban_pengguna.id_pertanyaan', 'left');
		$this->db->join('jawaban', 'jawaban_pengguna.id_jawaban = jawaban.id_jawaban', 'left');
		$this->db->where(['jawaban_pengguna.id_pengguna' => $id_pengguna]);
		$query = $this->db->get();
		return $query->result();
	}
}