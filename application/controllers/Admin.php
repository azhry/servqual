<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
  private $data = [];

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
      $this->data['title']  = 'Dashboard Admin';
      $this->data['content']  = 'admin/dashboard';
      $this->template($this->data);
  }
}
