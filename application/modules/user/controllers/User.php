<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  function __construct(){
      parent::__construct();
      // Your own constructor code
			$this->load->model('User_m', 'um');
    }

  function index(){
    $data = array(
      'content' => 'user',
      'users'   => $this->um->get_all()
      );
      $this->load->view('home/home', $data);
    }

    // function add(){
    //   $numb = $this->input->post('numb');
    //   $exist = $this->um->get_by_numb($numb);
    //
    //   if(!$exist){
    //     $data = array(
    //       'numb' => $numb,
    //       'type' => $this->input->post('type'),
    //       'annotation' => $this->input->post('annotation')
    //     );
    //     $add = $this->um->add($data);
    //     echo ($add) ? 'success' : 'failed' ;
    //   }else{
    //     echo 'duplicate';
    //   }
    // }

    function remove($id){
      $remove = $this->um->remove($id);
      echo ($remove) ? 'success' : 'failed' ;
    }

    function update(){
      $res = "";
      $id = $this->session->userdata('i');
      $pwd = $this->session->userdata('p');
      $cur_pwd = $this->input->post('curPwd');
      $new_pwd = $this->input->post('newPwd');
      $new = array(
        'p' => password_hash($new_pwd, PASSWORD_BCRYPT)
      );

      if(password_verify($cur_pwd, $pwd)){
      $data['password'] = password_hash($new_pwd, PASSWORD_BCRYPT);
      $update = $this->um->update($id, $data);
        if($update){
          $this->session->set_userdata($new);
          $res = 'success';
        }else{
          $res = 'failed';
        }
      }else{
        $res = 'unauthenticated';
      }
      echo $res;
    }//end function


} //end file
