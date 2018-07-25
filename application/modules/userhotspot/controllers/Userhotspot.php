<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Userhotspot extends CI_Controller {
  function __construct(){
      parent::__construct();
      // Your own constructor code
    }

  function index(){
    isAd();

    if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){
      $this->mtikapi->write('/ip/hotspot/user/getall');
      $profiles = $this->mtikapi->read();
      $this->mtikapi->disconnect();
    } else {
      ?>
      <script>
        alert('Please connect to MikroTik Server!')
      </script>
      <?php
      // $msg = 'disconnect';
    }

    $data = array(
      'content' => 'userhotspot',
      'users'   => $profiles
      );
      $this->load->view('home/home', $data);
    }

    function add(){
      $name = $this->input->post('name');
      $shared_users = $this->input->post('sharedUsers');
      $rate_limit = $this->input->post('rateLimit');

      if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){
      $this->mtikapi->write('/ip/hotspot/user/profile/add', false);
      $this->mtikapi->write('=name='.$name, false);
      $this->mtikapi->write('=shared-users='.$shared_users, false);
      $this->mtikapi->write('=rate-limit='.$rate_limit);
      $adding=$this->mtikapi->read();
      $this->mtikapi->disconnect();
      echo ($adding) ? 'success' : 'failed adding';
      } else {
      echo 'disconnect';
      }
    }

    function remove(){
      $id = $this->input->post('id');
      if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){
      $this->mtikapi->write('/ip/hotspot/user/profile/remove', false);
      $this->mtikapi->write('=.id='.$id);
      $this->mtikapi->read();
      $this->mtikapi->disconnect();
      } else {
      echo 'disconnect';
      }
    }

    function update(){
      $id = $this->input->post('id');
      $name = $this->input->post('name');
      $shared_users = $this->input->post('sharedUsers');
      $rate_limit = $this->input->post('rateLimit');

      if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){
        $this->mtikapi->write('/ip/hotspot/user/profile/set', false);
        $this->mtikapi->write('=name='.$name, false);
        $this->mtikapi->write('=shared-users='.$shared_users, false);
        $this->mtikapi->write('=rate-limit='.$rate_limit,false);
        $this->mtikapi->write('=.id='.$id);
        $this->mtikapi->read();
        $this->mtikapi->disconnect();
        echo 'success';
      } else {
      echo 'disconnect';
      }
    }

}
