<?php

defined('BASEPATH') or EXIT('No Direct script access allowed');

class Guest_m extends CI_Model {
  private $table = 'guest';
  private $id = 'id';

  function get_all(){
    $this->db->order_by('name');
    return $this->db->get($this->table)->result();
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

}//THE END
