<?php
define('BASEPATH') OR exit('No direct script access allowed');

class Hotspot extends CI_Controller(){

  public function index(){
    $this->load->view('setting')
  }
}
