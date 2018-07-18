<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login_m extends CI_Model {
    private $table = 'user';

    function get_user($u){
      $this->db->where('username', $u);
      $user = $this->db->get($this->table);
      return $user->result();
    }

    function create_emp($data){
      if($this->db->insert($this->table, $data)){
        return true;
      }
    }

    function get_pwd_admin(){
      $this->db->where('level', 'administrator');
      $this->db->order_by('id', 'ASC');
      $pwd = $this->db->get($this->table);
      return $pwd->result();
    }


  }
