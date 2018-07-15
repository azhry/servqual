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

	public function getTotalPersepsi($id_pertanyaan)
	{
		$query = $this->db->query('SELECT *, COUNT(jawaban.jawaban) AS total_jawaban, (COUNT(jawaban.jawaban) * jawaban.skor) AS total_persepsi FROM jawaban RIGHT JOIN jawaban_pengguna ON jawaban.id_jawaban = jawaban_pengguna.id_jawaban WHERE jawaban.id_pertanyaan = ' . $id_pertanyaan . ' GROUP BY jawaban.jawaban');
		return $query->result();
	}

	public function getTotalPenjawab() 
	{
		$query = $this->db->query('SELECT DISTINCT id_pengguna FROM jawaban_pengguna GROUP BY id_pengguna');
		$result = $query->result();
		return count($result);
	}

	public function getSkorJawabanTertinggi($id_pertanyaan)
	{
		$query = $this->db->query('SELECT skor FROM jawaban WHERE id_pertanyaan = ' . $id_pertanyaan . ' ORDER BY skor DESC LIMIT 1');
		return $query->row();
	}

	public function servqual()
	{
		$this->load->model('pertanyaan_m');
		$pertanyaan = $this->pertanyaan_m->get();
		$totalPenjawab = $this->getTotalPenjawab();
		$totalPenjawab = $totalPenjawab ?? 0;
		$result = [];
		foreach ($pertanyaan as $row)
		{
			$bobotTertinggi = $this->getSkorJawabanTertinggi($row->id_pertanyaan);
			$bobotTertinggi = $bobotTertinggi->skor ?? 0;
			$ekspekstasi = $bobotTertinggi * $totalPenjawab;
			if ($ekspekstasi == 0)
			{
				$result []= 0;
			}
			else
			{
				$totalPersepsiKeseluruhan = 0;
				$persepsi = $this->getTotalPersepsi($row->id_pertanyaan);
				foreach ($persepsi as $x)
				{
					$totalPersepsiKeseluruhan += $x->total_persepsi;
				}

				$result []= ($totalPersepsiKeseluruhan / $ekspekstasi) * 100;
			}
		}
		return $result;
	}

	public function hasilAkhir()
	{
		$this->load->model('pertanyaan_m');
		$pertanyaan = $this->pertanyaan_m->get();
		$jumlahPertanyaan = count($pertanyaan);

		if ($jumlahPertanyaan == 0) return 0;

		$servqual = $this->servqual();

		return array_sum($servqual) / $jumlahPertanyaan;
	}	
}