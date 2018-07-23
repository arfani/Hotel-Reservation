<?php

class Resdata extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('resdata_m', 'rdm');
  }

  function index(){
    $data = array(
      'content' => 'resdata_list',
      'res' => $this->rdm->get_all()
    );
    $this->load->view('home/home', $data);
  }

  function check_out($id){
    $msg = "";
    if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){
        // change status to checkout
        $update_status = $this->rdm->check_out($id);
        $msg .= ($update_status) ? "status updated\n" : "update status failed\n" ;

        // disabled on in db
        $voucher = $this->rdm->get_by_id($id);
        $disable_voucher = $this->rdm->disable($voucher->uname_voucher);
        if ($disable_voucher) {
          $msg .= "voucher disabled in db\n";
        }else {
          $msg .= "disable voucher failed in db\n";
        }

        // disabled on in mtik server
        $this->mtikapi->write('/ip/hotspot/user/getall');
        $users = $this->mtikapi->read();
        if($users){
          foreach ($users as $user) {
             if($user['name'] == $voucher->uname_voucher){
               $this->mtikapi->write('/ip/hotspot/user/disable', false);
               $users =  $this->mtikapi->write('=.id='.$user['.id']);
               $this->mtikapi->read();
               $msg .= "disabled on mtik\n";
             }
          }
        }
        $this->mtikapi->disconnect();
      } else {
        $msg = 'disconnect';
      }
      echo $msg;
  }

  function test(){
    $msg = "";
    if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){
        // disabled on in mtik server
        $voucher = $this->rdm->get_by_id('7715997924');
        $this->mtikapi->write('/ip/hotspot/user/getall');
        $users = $this->mtikapi->read();
        if($users){
          foreach ($users as $user) {
             if($user['name'] == $voucher->uname_voucher){
               $this->mtikapi->write('/ip/hotspot/user/disable', false);
               $users =  $this->mtikapi->write('=.id='.$user['.id']);
               $this->mtikapi->read();
               echo 'disabled<br />';
             }
          }
        }else{
          $msg .= "disable failed in mtik";
        }
        $this->mtikapi->disconnect();


      }else {
        $msg = 'disconnect';
      }
      echo $msg;

  }

} // enf file
