<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Login extends MY_Controller
{

	private $data = [];

  	function __construct()
	{
	    parent::__construct();		
  	}

  	public function index()
  	{
	    $this->load->view('login');
	}

	public function daftar()
  	{
	    $this->load->view('daftar');
	}	
}
