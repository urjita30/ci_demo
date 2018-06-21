<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
	}

	public function add()	{
		$data['title'] = 'Create User';
		$data['role'] = $this->users_model->get_role()->result_array();
		if(!empty($this->input->post())) {
			$this->form_validation->set_rules('txt_username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
			$this->form_validation->set_rules('txt_fname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('txt_lname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('txt_password', 'Password', 'trim|required');
			$this->form_validation->set_rules('txt_conf_password', 'Password Confirmation', 'trim|required|matches[txt_password]');
			$this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
			
			if ($this->form_validation->run() == FALSE) {
				$this->template->load('default','/admin/users/add', $data);
			} else {
				$name = $this->input->post('txt_fname').' '.$this->input->post('txt_lname');
				$dataArr = array(
					'username' 	=> $this->input->post('txt_username'),
					'name' 		=> $name,
					'password' 	=> md5($this->input->post('txt_password')),
					'email' 	=> $this->input->post('txt_email'),
					'gender' 	=> ($this->input->post('radio_gender')) ? 'female' : 'male' ,
					'role'		=> $this->input->post('select_role')
				);
				// pr($dataArr,1);
				$resp = $this->users_model->perform_action('insert',$dataArr,TBL_USERS);
				if($resp < 1) {
					$data['error'] = 'There is some error. Please try again !';
					$this->session->set_flashdata('error', $data['error']);
					redirect('/admin/users/add');
					// $this->load->view('/admin/users/add',$data);
				} else {
					$data['success'] = 'You are successfully registered !';
					$this->session->set_flashdata('success', $data['success']); 

					$this->email->from('demo.narola@gmail.com', 'Demo narola');
					$this->email->to('ud@narola.email');
					// $this->email->cc('another@another-example.com');
					// $this->email->bcc('them@their-example.com');

					$this->email->subject('Email Test');
					$this->email->message('Testing the email class.');

					$this->email->send();
					
					redirect('/admin/users/add');
					// $this->load->view('admin/login',$data);
				}
			}

		} else {
			$this->template->load('default','/admin/users/add', $data);
		}
	}

}