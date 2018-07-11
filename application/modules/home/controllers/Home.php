<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  function index(){
    $content['content'] = 'content';
		$this->load->view('home', $content);
  }
}
