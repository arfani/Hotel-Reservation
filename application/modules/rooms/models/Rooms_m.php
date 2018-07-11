<?php

defined('BASEPATH') or EXIT('No Direct script access allowed');

class Rooms_m extends CI_Model {
  private $table = 'rooms';
  private $id = 'id';

  function get_all(){
    return $this->db->get($this->table)->result();
  }

  function get_type(){
    $this->db->group_by('type');
    $this->db->order_by('type', 'desc');
    return $this->db->get('rooms')->result();
  }

  function get_by_id($id){
    $this->db->where('id', $id);
    $query = $this->db->get('rooms');
    return $query->row();
  }

  function save($table, $data){
    $this->db->insert($table, $data);
  }

  function remove($id){
    $this->db->where('id', $id);
    $this->db->delete($this->table);
  }

  function update($where, $data)
    {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

}//THE END
