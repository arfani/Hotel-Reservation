<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

  function index(){
    $data = array(
      'content' => 'reservation'
    );
		$this->load->view('home/home', $data);
  }
}
