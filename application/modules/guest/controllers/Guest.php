<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {
  function __construct(){
      parent::__construct();
      // Your own constructor code
			$this->load->model('Guest_m', 'gm');
    }

  function index(){
    isAd();

    $data = array(
      'content' => 'guest',
      'guests'   => $this->gm->get_all()
      );
      $this->load->view('home/home', $data);
    }

    function remove($id){
      $remove = $this->gm->remove($id);
      echo ($remove) ? 'success' : 'failed' ;
    }

    function update(){
      $id = $this->input->post('id');
      $data = array(
        'name' => $this->input->post('name'),
        'gender' => $this->input->post('gender'),
        'birth' => $this->input->post('birth'),
        'phone' => $this->input->post('phone'),
        'email' => $this->input->post('email'),
        'address' => $this->input->post('address')
      );

      $update = $this->gm->update($id, $data);
      echo ($update) ? 'success' : 'failed' ;
    }

}
