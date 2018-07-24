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
  $data_server = array('hostname', 'username', 'password', 'status');
  $disconnect = $this->session->unset_userdata($data_server);
}

// private
  function buatadmintanpalogin(){
    $res = '';
    $data = array(
      'name' => 'Admin', //$this->input->post('name'),
      'username' => 'admin', //$this->input->post('uname'),
      'password' => password_hash('', PASSWORD_BCRYPT), //$this->input->post('pwd'), PASSWORD_BCRYPT),
      'level' => 'administrator' //$this->input->post('lvl')
    );
    $success = $this->lm->create_emp($data);
    if($success){
      $res = 'success';
    }else {
      $res = 'error';
    }
    echo $res;
  }

  function ceklogin(){
    print_r($this->session->userdata());
  }


      function test(){
        }

} // END OF FILE
