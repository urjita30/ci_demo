<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function dashboard()	{
		if(!empty($this->session->userdata('logged_in_user_id'))) {
			$data['title'] = 'Dashboard';
			$this->template->load('default','/admin/dashboard', $data);
		} else {
			$this->load->view('/admin/login');
		}
		
	}

}