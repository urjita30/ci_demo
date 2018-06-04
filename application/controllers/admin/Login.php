<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$now = date('Y-m-d H:i:s');

		$this->load->model('users_model');
	}
	
	public function index()	{
		if(!empty($this->input->post())) {
			$this->form_validation->set_rules('txt_username', 'Username', 'trim|required');
			$this->form_validation->set_rules('txt_password', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = 'Please Enter correct Username or Password';
				$this->session->set_flashdata('error', $data['error']);
				$this->load->view('admin/login',$data);
			} else {
				$dataArr = array(
					'username' 	=> $this->input->post('txt_username'),
					'password' 	=> md5($this->input->post('txt_password'))
				);

			}
		} else {
			$this->load->view('/admin/login');
		}
	}

	public function register() {
		if(!empty($this->input->post())) {
			$config = array(
		        array(
	                'field' => 'txt_username',
	                'label' => 'Username',
	                'rules' => 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]',
	                'errors'=> array(
	                	'required'	=> 'You have not provided %s.',
	                	'is_unique'	=> 'This %s already exists.'
	                ),
		        ),
		        array(
	                'field' => 'txt_fname',
	                'label' => 'First Name',
	                'rules' => 'trim|required',
	                'errors' => array(
                        'required' => 'You must provide a %s.',
	                ),
		        ),
		        array(
	                'field' => 'txt_lname',
	                'label' => 'Second Name',
	                'rules' => 'trim|required',
	                'errors' => array(
                        'required' => 'You must provide a %s.',
	                ),
		        ),
		        array(
	                'field' => 'txt_password',
	                'label' => 'Password',
	                'rules' => 'trim|required',
	                'errors' => array(
                        'required' => 'You must provide a %s.',
	                ),
		        ),
		        array(
	                'field' => 'txt_conf_password',
	                'label' => 'Password Confirmation',
	                'rules' => 'trim|required|matches[txt_password]',
	                'errors' => array(
                        'matches' => 'Password is not match with %s.',
	                ),
		        ),
		        array(
	                'field' => 'txt_email',
	                'label' => 'Email',
	                'rules' => 'trim|required|valid_email|is_unique[users.email]',
	                'errors'=> array(
	                	'required'	=> 'You have not provided %s.',
	                	'valid_email'=> 'This %s is not valid.',
	                	'is_unique'	=> 'This %s already exists.'
	                ),
		        ),
		        array(
	                'field' => 'txt_conf_email',
	                'label' => 'Email Confirmation',
	                'rules' => 'trim|required|matches[txt_email]',
	                'errors' => array(
                        'matches' => 'Email is not match with %s.',
	                ),
		        )
			);
			// $this->form_validation->set_rules($config);

			$this->form_validation->set_rules('txt_username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
			$this->form_validation->set_rules('txt_fname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('txt_lname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('txt_password', 'Password', 'trim|required');
			$this->form_validation->set_rules('txt_conf_password', 'Password Confirmation', 'trim|required|matches[txt_password]');
			$this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('txt_conf_email', 'Email Confirmation', 'trim|required|matches[txt_email]');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = 'There is some error. Please try again !';
				$this->session->set_flashdata('error', $data['error']);
				$this->load->view('admin/registration',$data);
			} else {
				$name = $this->input->post('txt_fname').' '.$this->input->post('txt_lname');
				$dataArr = array(
					'username' 	=> $this->input->post('txt_username'),
					'name' 		=> $name,
					'password' 	=> md5($this->input->post('txt_password')),
					'email' 	=> $this->input->post('txt_email'),
					'gender' 	=> ($this->input->post('radio_gender')) ? 'female' : 'male' ,
					'role'		=> 1
				);
				// pr($dataArr,1);
				$resp = $this->users_model->perform_action('insert',$dataArr);
				if($resp < 1) {
					$data['error'] = 'There is some error. Please try again !';
					$this->session->set_flashdata('error', $data['error']);
					$this->load->view('admin/registration',$data);
				} else {
					$data['success'] = 'You are successfully registered !';
					$this->session->set_flashdata('success', $data['success']); 
					$this->load->view('admin/login',$data);
				}
			}
		} else {
			$this->load->view('/admin/registration');
		}
	}
}