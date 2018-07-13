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

  function disconnect(){
    echo 'from dis fung';
    //
    // if($this->session->sess_destroy()){
    //   echo 'success';
    // }else {
    //   echo 'failed';
    // }
  }

} // END OF FILE
