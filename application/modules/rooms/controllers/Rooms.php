<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {
  function __construct(){
      parent::__construct();
      // Your own constructor code
			$this->load->model('Rooms_m', 'model');
    }

  function index(){
    $data = array(
    'content' => 'rooms',
    'rooms' => $this->model->get_all()
    );
    $this->load->view('home/home', $data);
  }

  


}
