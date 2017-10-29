<?php defined('BASEPATH') || exit('No direct script allowed');

class Penilaian_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'penilaian';
		$this->data['primary_key'] = 'id_penilaian';
	}

	public function max($cond = '')
	{
		$this->db->select_max('nilai');
		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);

		$query = $this->db->get($this->data['table_name']);

		return $query->row();
	}

	public function min($cond = '')
	{
		$this->db->select_min('nilai');
		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);

		$query = $this->db->get($this->data['table_name']);

		return $query->row();
	}

	public function total($cond = '')
	{
		$this->db->select_sum('nilai');
		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);

		$query = $this->db->get($this->data['table_name']);

		return $query->row();
	}
}

