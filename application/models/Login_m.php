<?php 

class Login_m extends MY_Model {

	public function __construct() {

		parent::__construct();
		$this->data['table_name']	= 'pengguna';
		$this->data['primary_key']	= 'id_pengguna';

	}

	public function login_admin( $username, $password ) {

		$pengguna = $this->get_row( [ 'username' => $username, 'password' => $password ] );
		if ( $pengguna ) {

			return $pengguna;

		}

		return NULL;

	}

	public function login_pelanggan( $username, $password ) {

		$pengguna = $this->get_row( [ 'username' => $username, 'password' => $password ] );
		if ( $pengguna ) {

			return $pengguna;

		}

		return NULL;

	}

}