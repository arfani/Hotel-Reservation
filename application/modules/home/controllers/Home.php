<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  function __construct(){
      parent::__construct();
      $this->load->model('menu_m', 'mm');
  }

  function index(){
    $data = array(
      'content' => 'content'
    );
    $this->load->view('home', $data);
  }

  function about(){
    $data['content'] = 'about';
    $this->load->view('home', $data);
  }
}
