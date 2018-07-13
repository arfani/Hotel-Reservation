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

  function testing(){
    echo $this->session->hostname;
    echo '<br />';
      echo $this->session->username;
      echo '<br />';
        echo $this->session->password;
        echo '<br />';
        print_r($this->session->all_userdata());
  }

  function test(){
    $this->mtikapi->debug = true;
      if($this->mtikapi->connect($this->session->hostname, $this->session->username, $this->session->password)){
        $this->mtikapi->write('/ip/hotspot/user/getall');
        $users = $this->mtikapi->read(); // or $this->mtikapi->comm('/ip/hotspot/user/getall') then remove this line and 1 above

        foreach ($users as $user) {
          echo $user['name'];
        }

        $msg = "Success connect to ".$this->session->hostname;
        }else{
          $msg = "Failed connect to ".$this->session->hostname ;
      }
      echo $msg;
      echo '<br />';
      echo $this->session->hostname;
      echo '<br />';
      echo $this->session->status;
      $this->mtikapi->disconnect();
    }

    function test_add(){
      $this->mtikapi->debug = true;
        if($this->mtikapi->connect($this->session->hostname, $this->session->username, $this->session->password)){
          // $this->mtikapi->comm('/ip/hotspot/user/add', array(...))

          }else{
            $msg = "Failed connect to ".$this->session->hostname ;
        }
        echo $msg;
        $this->mtikapi->disconnect();
      }

} // END OF FILE
