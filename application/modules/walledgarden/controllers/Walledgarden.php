<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Walledgarden extends CI_Controller {
  function __construct(){
      parent::__construct();
      // Your own constructor code
    }

  function index(){
    isAd();

    if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){
      $this->mtikapi->write('/ip/hotspot/walled-garden/getall');
      $walledgarden = $this->mtikapi->read();
      $this->mtikapi->disconnect();
    } else {
      ?>
        <script>
          alert('Please connect to MikroTik Server!')
        </script>
      <?php
    }
    $data = array(
      'content' => 'walledgarden',
      'walledgarden'   => $walledgarden
      );
      $this->load->view('home/home', $data);
    }

    function add(){
      $dest_host = $this->input->post('destHost');
      $action_status = $this->input->post('actionStatus');
      $active_status = $this->input->post('activeStatus');

      if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){
      $this->mtikapi->write('/ip/hotspot/walled-garden/add', false);
      $this->mtikapi->write('=dst-host='.$dest_host, false);
      $this->mtikapi->write('=action='.$action_status, false);
      $this->mtikapi->write('=disabled='.$active_status);
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
      $this->mtikapi->write('/ip/hotspot/walled-garden/remove', false);
      $this->mtikapi->write('=.id='.$id);
      $this->mtikapi->read();
      $this->mtikapi->disconnect();
      } else {
      echo 'disconnect';
      }
    }

    function update(){
      $id = $this->input->post('id');
      $dest_host = $this->input->post('destHost');
      $action_status = $this->input->post('actionStatus');
      $active_status = $this->input->post('activeStatus');

      if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){
        $this->mtikapi->write('/ip/hotspot/walled-garden/set', false);
        $this->mtikapi->write('=dst-host='.$dest_host, false);
        $this->mtikapi->write('=action='.$action_status, false);
        $this->mtikapi->write('=disabled='.$active_status,false);
        $this->mtikapi->write('=.id='.$id);
        $this->mtikapi->read();
        $this->mtikapi->disconnect();
        echo 'success';
      } else {
      echo 'disconnect';
      }
    }

}
