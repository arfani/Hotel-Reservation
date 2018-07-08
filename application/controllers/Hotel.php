<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {

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

	function form(){
		$content['content'] = 'res_form';

		$this->load->view('template', $content);
	}

}
