<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

  private $name;
  function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
        $this->name = $this->input->post('name');
      }
  function index(){
    $data = array(
      'content' => 'reservation'
    );
		$this->load->view('home/home', $data);
  }

  function generated(){
    echo $this->name;
  }

  function test(){

    $this->name = $this->input->post('guest_name');
    echo $this->input->post('name').' tes';
  }


} //END OF FILE
