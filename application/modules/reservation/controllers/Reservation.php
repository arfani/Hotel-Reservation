<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

  function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
        $this->load->model('reservation_m', 'rem');
      }

  function index(){
    isOp();
    $data = array(
      'content' => 'reservation',
      'types'    => $this->rem->get_room_type()
    );
		$this->load->view('home/home', $data);
  }

  function numb_by_type(){
    $type = $this->input->post('type');
    $numbs = $this->rem->get_by_type($type);

    echo json_encode($numbs);
  }

  function save(){
    $msg = "";
    $is_guest_exist = false;
    $is_vou_exist = false;

    $data_reservation = array(
          'id' => $this->input->post('noBooking'),
          'guest_id' => $this->input->post('id'),
          'night' => $this->input->post('night'),
          'arrival_date' => $this->input->post('arrivalDate'),
          'departure_date' => $this->input->post('departureDate'),
          'room_type' => $this->input->post('roomType'),
          'room_numb' => $this->input->post('roomNumb'),
          'adult' => $this->input->post('adult'),
          'child' => $this->input->post('child'),
          'uname_voucher' => $this->input->post('uName')
        );

      $data_guest = array(
        'id' => $this->input->post('id'),
        'name' => $this->input->post('name'),
        'gender' => $this->input->post('gender'),
        'birth' => $this->input->post('birth'),
        'phone' => $this->input->post('phone'),
        'email' => $this->input->post('email'),
        'address' => $this->input->post('address')
      );

      $data_voucher = array(
        'username' => $this->input->post('uName'),
        'password' => $this->input->post('pwd'),
        'uptime' => $this->input->post('night'),
        'profile_user' => $this->input->post('profile'),
        'disabled' => 'no'
      );

      $row = $this->rem->get_guest($data_guest['id']);
      if($row){
        $is_guest_exist = true;
      }

      $row1 = $this->rem->get_vou($data_voucher['username']);
      if($row1){
        $is_vou_exist = true;
      }

      if($this->mtikapi->connect($this->session->hostname, $this->session->username, $this->session->password)){

        if(!$is_guest_exist){
          // save guest data to db
          $saveGuest = $this->rem->insert_guest($data_guest);
          if($saveGuest){
            $msg .= "<strong>Guest</strong> : Saving data successfully. <br />";
          }else{
            $msg .= "<strong>Guest</strong> : Saving data to db failed. <br />";
          }

        }
        if(!$is_vou_exist){
            // save voucher data to db
            $saveVou = $this->rem->insert_voucher($data_voucher);
            if($saveVou){
              $msg .= "<strong>Voucher</strong> : Saving data successfully. <br />";
              // save reservation data to db
              $saveRes = $this->rem->insert_reservation($data_reservation);
              if($saveRes){
                $msg .= "<strong>Reservation</strong> : Saving data successfully. <br />";
                //save voucher to mtik
                $this->mtikapi->write('/ip/hotspot/user/add',false);
                $this->mtikapi->write('=name='.$data_voucher['username'], false);
                $this->mtikapi->write('=password='.$data_voucher['password'], false);
                $this->mtikapi->write('=limit-uptime='.$data_voucher['uptime'].'d', false);
                $this->mtikapi->write('=profile='.$data_voucher['profile_user'], false);
                $this->mtikapi->write('=comment=Created by jazz web application', false);
                $this->mtikapi->write('=disabled='.$data_voucher['disabled']); // dont use false param
                $vou_sev = $this->mtikapi->read();
                $this->mtikapi->disconnect();
                if ($vou_sev) {
                  $msg .= "Voucher is ready to use. <br />";
                }else{
                  $msg .= "Voucher is failed to generated. <br />";
                }
              }else{
                $msg .= "<strong>Reservation</strong> : Saving data to db failed. <br />";
              }
            }else{
              $msg .= "<strong>Voucher</strong> : Saving data to db failed. <br />";
            }
          }else{
            $msg = 'duplicateusername';
          }

      //if not connect
      }else {
        $msg .= "disconnect" ;
      }
      echo $msg;
    }//end of function save

} //END OF FILE
