<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

  function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
        $this->load->model('reservation_m', 'rm');
      }

  function index(){
    $data = array(
      'content' => 'reservation'
    );
		$this->load->view('home/home', $data);
  }

  function save(){
    $msg = "no message";
    $data = array(
      'guest_name' => $this->input->post('gName'),
      'guest_id' => $this->input->post('gId'),
      'date_from' => $this->input->post('dateFrom'),
      'cod' => $this->input->post('cod')
    );
      $save = $this->rm->insert($data);
      if($save){
        $msg = "Saving data successfully";
      }else{
        $msg = "Saving data failed";
      }

      echo $msg;
  }

} //END OF FILE
