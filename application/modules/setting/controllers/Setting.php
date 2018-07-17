<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('setting_m', 'sm');
  }

  function connect(){
    $data = array(
      'hostname' => $this->input->post('hostname'),
  		'username' => $this->input->post('username'),
  		'password' => $this->input->post('password'),
      'status' => 'unknown'
    );
		$msg = "Status unknown";

    if($this->mtikapi->connect($data['hostname'], $data['username'], $data['password'])){
      $msg = "Success connect to ".$data['hostname'];
      $data['status'] = 'Success';
      $this->session->set_userdata($data);
    }else{
      $msg = "Failed connect to ".$data['hostname'];
      $data['status'] = 'Failed';
      $this->session->set_userdata($data);
    }
    echo $msg;
    $this->sm->insert($data);

  } // End connect

  function tes(){
    echo 'from tes fung<br />';
    print_r($this->session->userdata());
  }


} // END OF FILE
