<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends MY_Controller
{
  private $data = [];

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
      $this->data['title']  = 'Home';
      $this->data['content']  = 'pelanggan/home';
      $this->template($this->data, 'pelanggan');
  }
}
