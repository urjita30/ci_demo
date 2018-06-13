<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
	}

	public function add()	{
		$data['title'] = 'Create User';
		if(!empty($this->input->post())) {

		} else {
			$data['role'] = $this->users_model->get_role()->result_array();
			$this->template->load('default','/admin/users/add', $data);
		}
	}

}