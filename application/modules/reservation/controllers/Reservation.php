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

    if($this->mtikapi->connect($this->session->hostname, $this->session->username, $this->session->password)){

        $dataReservation = array(
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

          $dataGuest = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'birth' => $this->input->post('birth'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address')
          );

          $dataVoucher = array(
            'username' => $this->input->post('uName'),
            'password' => $this->input->post('pwd'),
            'uptime' => $this->input->post('night'),
            'disabled' => 'no'
          );

              // save guest data to db
              $saveGuest = $this->rem->insert_guest($dataGuest);
              if($saveGuest){
                $msg .= "<strong>Guest</strong> : Saving data successfully. <br />";
                // save voucher data to db
                $saveVou = $this->rem->insert_voucher($dataVoucher);
                if($saveVou){
                  $msg .= "<strong>Voucher</strong> : Saving data successfully. <br />";
                  // save reservation data to db
                  $saveRes = $this->rem->insert_reservation($dataReservation);
                  if($saveRes){
                    $msg .= "<strong>Reservation</strong> : Saving data successfully. <br />";
                    //save voucher to mtik
                    $this->mtikapi->write('/ip/hotspot/user/add',false);
                    $this->mtikapi->write('=name='.$dataVoucher['username'], false);
                    $this->mtikapi->write('=password='.$dataVoucher['password'], false);
                    $this->mtikapi->write('=limit-uptime='.$dataVoucher['uptime'].'d', false);
                    $this->mtikapi->write('=comment=created by jazz web application', false);
                    $this->mtikapi->write('=disabled='.$dataVoucher['disabled']); // dont use false param
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
                $msg .= "<strong>Guest</strong> : Saving data to db failed. <br />";
              }

      //if not connect
      }else {
        $msg .= "disconnect" ;
      }
      echo $msg;
    }//end of function save

} //END OF FILE
