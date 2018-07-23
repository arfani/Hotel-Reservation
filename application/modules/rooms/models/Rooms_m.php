<?php

defined('BASEPATH') or EXIT('No Direct script access allowed');

class Rooms_m extends CI_Model {
  private $table = 'rooms';
  private $id = 'id';

  function get_all(){
    $this->db->order_by('numb', 'asc');
    $this->db->order_by('type', 'desc');
    return $this->db->get($this->table)->result();
  }

  function add($data){
    $this->db->insert($this->table, $data);
    return ($this->db->affected_rows()) ? true : false;
  }

  function remove($id){
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
    return ($this->db->affected_rows()) ? true : false;
  }

  function update($id, $data){
    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
    return ($this->db->affected_rows()) ? true : false;
  }

  function get_by_numb($numb){ //this for checking duplicate room number
    $this->db->where('numb', $numb);
    $number = $this->db->get($this->table);
    return ($number->num_rows() > 0) ? true : false;
  }

}//THE END
