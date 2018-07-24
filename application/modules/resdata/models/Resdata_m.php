<?php

class Resdata_m extends CI_Model {

  function get_all(){
      $data = $this->db->get('reservation');
      return $data->result();
  }

  function check_out($id){
    $this->db->set('status', 'checkout');
    $this->db->where('id', $id);
    $this->db->update('reservation');
    return ($this->db->affected_rows()) ? true : false ;
  }

  function disable($uname){
    $this->db->set('disabled', 'yes');
    $this->db->where('username', $uname);
    $this->db->update('voucher');
    return ($this->db->affected_rows()) ? true : false ;
  }

  function enable($uname){
    $this->db->set('disabled', 'no');
    $this->db->where('username', $uname);
    $this->db->update('voucher');
    return ($this->db->affected_rows()) ? true : false ;
  }

  function get_by_id($id){
    $this->db->where('id', $id);
    $data = $this->db->get('reservation');
    return $data->row();
  }

  function extend($id, $data){
    $this->db->where('id', $id);
    $this->db->update('reservation', $data);
    return ($this->db->affected_rows()) ? true : false ;
  }

}
