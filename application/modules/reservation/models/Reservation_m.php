<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Reservation_m extends CI_Model {
    private $table = 'reservation', $id = 'id';

    function get_all(){
      return $this->db->get_all($this->table);
    }

    function insert($data){
      if($this->db->insert($this->table, $data)){
        return true;
      }
    }

  }
