<?php

class Resdata extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('resdata_m', 'rdm');
  }

  function index(){
    isOp();
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
        $res_data = $this->rdm->get_by_id($id);
        $disable_voucher = $this->rdm->disable($res_data->uname_voucher);
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
             if($user['name'] == $res_data->uname_voucher){
               $this->mtikapi->write('/ip/hotspot/user/disable', false);
               $this->mtikapi->write('=.id='.$user['.id']);
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

  // =======================End Checkout=========================
  // ============================================================

  // =======================Extend=========================
  // ============================================================

  function extend(){
    $msg = "";
    $id = $this->input->post('id');
    $extNight = $this->input->post('extNight');

    $res_data = $this->rdm->get_by_id($id);
    if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){

    //reservation update (night, departure_date, status)
    $ext_data = array(
      'night' => $extNight + $res_data->night,
      'departure_date' => date('Y-m-d', strtotime($res_data->departure_date. ' + '.$extNight.' day')),
      'status' => 'checkin',
      'extend' => $res_data->extend + 1
    );
    $res_update = $this->rdm->extend($res_data->id, $ext_data);
    $msg = ($res_update) ? "reservation data updated\n" : "reservation data update failed\n" ;

    // enable in db
    $enable_voucher = $this->rdm->enable($res_data->uname_voucher);
    if ($enable_voucher) {
      $msg .= "voucher enabled in db\n";
    }else {
      $msg .= "enabling voucher failed in db\n";
    }

    //count uptime extending
    //departure_date - now = sisa hari
    //sisa hari + ext night
    $dep_date = strtotime($res_data->departure_date);
    $now_date = strtotime(date('Y-m-d'));

    $secs = $dep_date - $now_date;
    $rest_day = $secs / 86400;
    $new_uptime = $rest_day + $extNight;

    // enable on in mtik server
    $this->mtikapi->write('/ip/hotspot/user/getall');
    $users = $this->mtikapi->read();
    if($users){
      foreach ($users as $user) {
         if($user['name'] == $res_data->uname_voucher){
           $this->mtikapi->write("/ip/hotspot/user/set", false);
           $this->mtikapi->write("=.id=".$user['.id'], false);
           $this->mtikapi->write("=limit-uptime=".$new_uptime.'d',false);
           $this->mtikapi->write("=disabled=no");
           $update = $this->mtikapi->read();
           echo ($update) ? "Updated on mtik server!(limit-uptime, enable)\n" : "failed update on mtik server!\n";
         }
      }
    }
    $this->mtikapi->disconnect();
    } else {
    $msg = 'disconnect';
    }

    echo $msg;
  }

} // end file
