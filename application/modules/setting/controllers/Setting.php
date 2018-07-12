<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('setting_m', 'sm');
  }

  function connect_latest(){
    $API = new mtikapi();
    $data = $this->sm->get_latest();
		$msg = "Status unknown";

    foreach ($data as $server) {
      if($API->connect($server->hostname, $server->username, $server->password)){
        $msg = "Success connect to ".$server->hostname;
      }else{
        $msg = "Failed connect to ".$server->hostname ;
      }
    }
    echo $msg;
  } // End connect_latest

  function connect(){
    $API = new mtikapi();

    $data = array(
      'hostname' => $this->input->post('hostname'),
  		'username' => $this->input->post('username'),
  		'password' => $this->input->post('password'),
      'status' => 'unknown'
    );
		$msg = "Status unknown";

    if($API->connect($data['hostname'], $data['username'], $data['password'])){
      $msg = "Success connect to ".$data['hostname'];
      $data['status'] = 'Success';
    }else{
      $msg = "Failed connect to ".$data['hostname'];
      $data['status'] = 'Failed';
    }
    echo $msg;
    $this->sm->insert($data);
  } // End connect

} // END OF FILE
