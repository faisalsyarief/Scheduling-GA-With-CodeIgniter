<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTRL_Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('dasboard');
	}
}
