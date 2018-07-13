<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

  function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
        $this->load->model('reservation_m', 'rm');
      }

  function index(){
    $data = array(
      'content' => 'reservation'
    );
		$this->load->view('home/home', $data);
  }

  function save(){
    $msg = "no message";

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

          $test['comment'] = 'comment testing';

            //save voucher to mtik
            $this->mtikapi->write('/ip/hotspot/user/add',false);
            $this->mtikapi->write('=name='.$data['username'], false);
            $this->mtikapi->write('=password='.$data['password'], false);
            $this->mtikapi->write('=limit-uptime='.$data['uptime'], false);
            $this->mtikapi->write('=disabled='.$data['disabled']);
            $this->mtikapi->write('=comment='.'given to '.$data['guest_name'], false);
            $this->mtikapi->read();
            $this->mtikapi->disconnect();

            $save = $this->rm->insert($data); // save to db
            if($save){
              $msg = "Saving data successfully";
            }else{
              $msg = "Saving data to db failed";
            }
      }//if not connect
      else {
        $msg = "There is no connection to MikroTik Server. " ;
      }

      echo $msg;
    }//end of function save

} //END OF FILE
