<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {
  function __construct(){
      parent::__construct();
      // Your own constructor code
			$this->load->model('Rooms_m', 'rm');
    }

  function index(){
    $data = array(
      'content' => 'rooms',
      'rooms'   => $this->rm->get_all()
      );
      $this->load->view('home/home', $data);
    }

    function add(){
      $numb = $this->input->post('numb');
      $exist = $this->rm->get_by_numb($numb);

      if(!$exist){
        $data = array(
          'numb' => $numb,
          'type' => $this->input->post('type'),
          'annotation' => $this->input->post('annotation')
        );
        $add = $this->rm->add($data);
        echo ($add) ? 'success' : 'failed' ;
      }else{
        echo 'duplicate';
      }
    }

    function remove($id){
      $remove = $this->rm->remove($id);
      echo ($remove) ? 'success' : 'failed' ;
    }

    function update(){
      $id = $this->input->post('id');
      $numb = $this->input->post('numb');
      // $crn = $this->input->post('crn');

      // $exist = $this->rm->get_by_numb($numb);

      $data = array(
        'numb' => $numb,
        'type' => $this->input->post('type'),
        'annotation' => $this->input->post('annotation')
      );
      // if(!$crn){
        // if($exist){
          // echo 'duplicate';
        // }else{
          $update = $this->rm->update($id, $data);
          echo ($update) ? 'success' : 'failed' ;
        // }
      // }else{
        // $update = $this->rm->update($id, $data);
        // echo ($update) ? 'success' : 'failed' ;
      // }

    }


}
