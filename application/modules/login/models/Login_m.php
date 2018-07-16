<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login_m extends CI_Model {
    private $table = 'employee';

    function get_user($u){
      $this->db->where('username', $u);
      $result = $this->db->get($this->table);
      return $result->result();
    }

    function create_user($data){
      $this->db->insert($this->table, $data);
    }

  }
