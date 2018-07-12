<?php 

class Jawaban_pengguna_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name'] 	= 'jawaban_pengguna';
		$this->data['primary_key']	= 'id_jawaban_pengguna';
	}

	public function getTotalScore($id_pertanyaan)
	{
		$this->db->select('*, SUM(skor) AS total_score');
		$this->db->from($this->data['table_name']);
		$this->db->join('jawaban', $this->data['table_name'] . '.id_jawaban = jawaban.id_jawaban');
		$this->db->group_by($this->data['table_name'] . '.id_pertanyaan');
		$this->db->where([ $this->data['table_name'] . '.id_pertanyaan' => $id_pertanyaan ]);
		$query = $this->db->get();
		return $query->row();
	}
}