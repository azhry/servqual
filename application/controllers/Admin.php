<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Admin extends MY_Controller {

	public function __construct() {

		parent::__construct();
		$this->data['id_pengguna']	= $this->session->userdata( 'id_pengguna' );
		if ( !isset( $this->data['id_pengguna'] ) ) {

			$this->session->sess_destroy();
			$this->flashmsg( 'Anda harus login terlebih dahulu', 'warning' );
			redirect( 'login/admin' );
			exit;

		}

		$this->data['role']	= $this->session->userdata( 'id_role' );
		if ( $this->data['role'] != "2" ) {

			$this->session->sess_destroy();
			$this->flashmsg( 'Anda harus login sebagai admin', 'warning' );
			redirect( 'login/admin' );
			exit;

		}

		$this->load->model( 'pengguna_m' );
		$this->data['admin'] = $this->pengguna_m->get_row( [ 'id_pengguna' => $this->data['id_pengguna'] ] );

	}

	public function index() {

		$this->data['title'] 	= 'Dashboard | ' . $this->title;
		$this->data['content']	= 'admin/dashboard';
		$this->template( $this->data );
	
	}

	

}