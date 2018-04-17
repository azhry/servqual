<?php 

class Jawaban_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name'] 	= 'jawaban';
		$this->data['primary_key']	= 'id_jawaban';
	}
}