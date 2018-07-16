<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller {
      function __construct() {
        parent::__construct();
        $this->load->model('Login_m', 'lm');
      }

    function auth(){
      $msg= $u= $p= $l = "";

      $uname = $this->input->post('uname');
      $pwd = $this->input->post('pwd');

      $user_data = $this->lm->get_user($uname);
      foreach ($user_data as $value) {
        $u = $value->username;
        $p = $value->password;
        $l = $value->level;
      }

      if(password_verify($pwd, $p)){
        $msg = 'Success <br />Welcome '.$uname.', you\'re login as '.$l;
      }else{
        $msg = 'Failed <br />Username or password is incorrect!';
      }

      echo $msg;
    }

    function create(){
      $data = array(
        'name' => $this->input->post('name'),
        'username' => $this->input->post('uname'),
        'password' => password_hash($this->input->post('pwd'), PASSWORD_BCRYPT),
        'level' => $this->input->post('level')
      );
      $this->lm->create_user($data);
      echo $pass;
    }

    function process(){
      $uname = $this->input->post('uname');
      $pwd = $this->input->post('pwd');



    }
  }
