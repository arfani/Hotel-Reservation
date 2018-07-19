<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Reservation_m extends CI_Model {
    private $table = 'reservation', $id = 'id';

    function get_all(){
      $query = $this->db->get_all($this->table);
      return $query->result();
    }

    function get_room_type(){
      $this->db->group_by('type');
      $this->db->order_by('type', 'desc');
      $query = $this->db->get('rooms');
      return $query->result();
    }

    function get_by_type($type){
      $this->db->order_by('numb');
      $this->db->where('type', $type);
      $query = $this->db->get('rooms');
      return $query->result();
    }

    function insert($data){
      $this->db->insert($this->table, $data);
      $inserted = $this->db->affected_rows();
      return ($inserted) ? true : false ;
    }

  }
