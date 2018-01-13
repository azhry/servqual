<?php defined('BASEPATH') || exit('No direct script allowed');

class Pelamar_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'pelamar';
		$this->data['primary_key'] = 'id_pelamar';
	}

	public function login($data)
	{
		$result = $this->get_row(['username' => $data['username'], 'password' => $data['password']]);
		if (!isset($result))
			return $result;
		$this->session->set_userdata([
			'username'	=> $result->username,
			'password'	=> $result->password,
			'id_pelamar'=> $result->id_pelamar
		]);
		return $result;
	}
}

