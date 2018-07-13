<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Setting_m extends CI_Model {

    private $table = 'mtik_server', $id = 'id';

    function get_all(){
      return $this->db->get_all($this->table);
    }

    function insert($data){
      if($this->db->insert($this->table, $data)){
        return true;
      }
    }


  }
