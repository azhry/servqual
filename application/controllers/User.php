<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{
  private $data = [];

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
      $this->data['title']  = 'Dashboard User';
      $this->data['content']  = 'user/home';
      $this->template($this->data, 'user');
  }
}
