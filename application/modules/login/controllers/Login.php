<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller {
    function __construct() {
      parent::__construct();
      $this->load->model('Login_m', 'lm');
    }

    function auth(){ //auth user

      $data = array(
        'n' => "",
        'u' => "",
        'p' => "",
        'l' => ""
      );
      $uname = $this->input->post('uname');
      $pwd = $this->input->post('pwd');

      $user_data = $this->lm->get_user($uname);
      foreach ($user_data as $value) {
        $data['n'] = $value->name;
        $data['u'] = $value->username;
        $data['p'] = $value->password;
        $data['l'] = $value->level;
      }

      if(password_verify($pwd, $data['p'])){
        $this->session->set_userdata($data);
      }else{
        $data['l'] = 'Failed<br />Username or password is incorrect!';
        $this->session->unset_userdata($data);
      }
      echo $data['l'];
    } //end function

    // =================
    // End auth user
    // =================

    function auth_admin(){
      $data = array(
        'p' => "",
        'msg' => ""
      );

      $pwd = $this->input->post('pwd');

      $user_data = $this->lm->get_pwd_admin();
      foreach ($user_data as $value) {
        $data['p'] = $value->password;
      }

      if(password_verify($pwd, $data['p'])){
        $data['msg'] = 'authenticated';
      }else{
        $data['msg'] = 'Your password is incorrect!';
      }
      echo $data['msg'];
    } // end auth admin


    //register user/ create employee
    function create_user(){
      $res = '';
      $data = array(
        'name' => $this->input->post('name'),
        'username' =>$this->input->post('uname'),
        'password' => password_hash($this->input->post('pwd'), PASSWORD_BCRYPT),
        'level' => $this->input->post('lvl')
      );
      $success = $this->lm->create_emp($data);
      if($success){
        $res = 'success';
      }else {
        $res = 'error';
      }
      echo $res;
    }

    function process(){
      $uname = $this->input->post('uname');
      $pwd = $this->input->post('pwd');

    }
  }
