<?php defined('BASEPATH') || exit('No direct script allowed');

class Penilaian_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'penilaian';
		$this->data['primary_key'] = 'id_penilaian';
	}

	public function defuzzification($data)
	{
		$this->load->model('bobot_m');
		$this->load->model('keputusan_m');
		$this->load->model('kriteria_m');

		// TODO: get nilai pelamar -> crisped -> keputusan


	}

	public function crisping($id_kriteria, $bobot)
	{
			
	}

	public function get_nilai($cond = '')
	{
		if (is_array($cond) or (is_string($cond) && strlen($cond) > 3))
			$this->db->where($cond);
		$this->db->select(['id_penilaian', 'id_bobot', 'id_kriteria', 'id_pelamar', 'fuzzy', 'nilai']);
		$this->db->from($this->data['table_name']);
		$this->db->join('bobot', $this->data['table_name'] . '.id_bobot = bobot.id_bobot');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_threshold($id_kriteria, $type = 'MAX')
	{
		$this->db->select([$type . '(nilai) AS nilai_' . strtolower($type)]);
		$this->db->from($this->data['table_name']);
		$this->db->join('bobot', $this->data['table_name'] . '.id_bobot = bobot.id_bobot');
		$this->db->where([$this->data['table_name'] . '.id_kriteria' => $id_kriteria]);
		$query = $this->db->get();
		return $query->row();
	}

	public function max($cond = '')
	{
		$this->db->select_max('hasil');
		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);

		$query = $this->db->get($this->data['table_name']);

		return $query->row();
	}

	public function min($cond = '')
	{
		$this->db->select_min('hasil');
		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);

		$query = $this->db->get($this->data['table_name']);

		return $query->row();
	}

	public function total($cond = '')
	{
		$this->db->select_sum('hasil');
		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);

		$query = $this->db->get($this->data['table_name']);

		return $query->row();
	}
}

