<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserve extends CI_Controller {

	public function index()
	{
		$content = array (
			'content' => 'reserve'
		);
		$this->load->view('template', $content);
	}
}
