<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$content = array (
			'content' => 'template/content'
		);
		$this->load->view('template', $content);
	}

	public function setting(){
		echo 'Setting';
	}
}
