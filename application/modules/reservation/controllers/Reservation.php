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

      $data = array(
            'guest_name' => $this->input->post('gName'),
            'guest_id' => $this->input->post('gId'),
            'date_from' => $this->input->post('dateFrom'),
            'cod' => $this->input->post('cod'),
            'username' => $this->input->post('uName'),
            'password' => $this->input->post('pwd'),
            'uptime' => $this->input->post('cod').'d',
            'disabled' => 'no'
          );

            //save voucher to mtik
            $this->mtikapi->write('/ip/hotspot/user/add',false);
            $this->mtikapi->write('=name='.$data['username'], false);
            $this->mtikapi->write('=password='.$data['password'], false);
            $this->mtikapi->write('=limit-uptime='.$data['uptime'], false);
            $this->mtikapi->write('=comment='.'given to '.$data['guest_name'], false);
            $this->mtikapi->write('=disabled='.$data['disabled']); // dont use false param
            $vou_sev = $this->mtikapi->read();
            $this->mtikapi->disconnect();
            if ($vou_sev) {
              $msg .= "Voucher is ready to use. <br />";
            }else{
              $msg .= "Voucher is failed to generated. <br />";
            }
            $save = $this->rem->insert($data); // save to db
            if($save){
              $msg .= "Saving data successfully. <br />";
            }else{
              $msg .= "Saving data to db failed. <br />";
            }
      }else { //if not connect
        $msg .= "disconnect" ;
      }
      echo $msg;
    }//end of function save

} //END OF FILE
