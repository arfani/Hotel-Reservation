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

    // insert to reservation table
    function insert_reservation($data){
      $this->db->insert($this->table, $data);
      $inserted = $this->db->affected_rows();
      return ($inserted) ? true : false ;
    }

    // insert into guest table
    function insert_guest($data){
      $this->db->insert('guest', $data);
      $inserted = $this->db->affected_rows();
      return ($inserted) ? true : false ;
    }

    // insert into voucher table
    function insert_voucher($data){
      $this->db->insert('voucher', $data);
      $inserted = $this->db->affected_rows();
      return ($inserted) ? true : false ;
    }

    // get guest for check duplicate
    function get_guest($id){
      $this->db->where('id', $id);
      $this->db->get('guest');
      $exist = $this->db->affected_rows();
      return ($exist) ? true : false ;
    }

  }
