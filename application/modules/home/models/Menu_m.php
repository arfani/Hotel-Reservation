<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Menu_m extends CI_Model {
    private $table = 'menu';

    function get_adm_menu(){
      $this->db->where('owner', 'administrator');
      $this->db->get($this->table);
    }
  }
