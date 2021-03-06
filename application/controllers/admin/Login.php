<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$now = date('Y-m-d H:i:s');

		$this->load->model('users_model');
	}
	
	public function index()	{
		if(!empty($this->session->userdata('logged_in_user_id'))) {
			redirect('admin/dashboard');
		} else {
			$this->load->view('/admin/login');
		}
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
				$resp = $this->users_model->perform_action('select',$dataArr, TBL_USERS);
				$num_row = $resp->num_rows();
				$login_arr = $resp->row_array();
				$this->session->set_userdata('logged_in_user_id',$login_arr['id']);
				$this->session->set_userdata('logged_in_user_name',$login_arr['name']);
				// pr($login_arr,1);
				if($num_row == 1) {
					$data['success'] = 'You are successfully logged in !';
					$this->session->set_flashdata('success', $data['success']);
					redirect('admin/dashboard');
					// $this->template->load('default','/admin/dashboard',$data);
				} else {
					$data['error'] = 'Please enter valid username or password.';
					$this->session->set_flashdata('error', $data['error']);
					redirect('admin');
				}
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
				$resp = $this->users_model->perform_action('insert',$dataArr,TBL_USERS);
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

	public function logout() {
		$this->session->sess_destroy();
		redirect('admin');
	}

	public function my_profile() {
		$data['title'] = "My Profile";
		$dataArr = array(
			'id'	=> $this->session->userdata('logged_in_user_id')
		);
		$data['resp']= $this->users_model->perform_action('selectall',$dataArr,TBL_USERS)->row_array();
		if(!empty($this->input->post())) {
			// pr($_FILES,1);
			$this->form_validation->set_rules('txt_username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('txt_fname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('txt_lname', 'Last Name', 'trim|required');
			if(!empty($this->input->post('txt_password'))) {
				$this->form_validation->set_rules('txt_password', 'Password', 'trim|required');
				$this->form_validation->set_rules('txt_conf_password', 'Password Confirmation', 'trim|required|matches[txt_password]');
			}
			$this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email');

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('default','admin/my_profile',$data);
			} else {
				$name = $this->input->post('txt_fname').' '.$this->input->post('txt_lname');

				if(isset($_FILES['file_avatar']['name'])) {
					$config['upload_path']          = FILE_UPLOAD_PATH;
	                $config['allowed_types']        = 'gif|jpg|png|jpeg';
	                $config['max_size']             = 100;
	                // $config['max_width']            = 1024;
	                // $config['max_height']           = 768;
	                // echo FILE_UPLOAD_PATH.' path'; die;
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                if ( ! $this->upload->do_upload('file_avatar')) {
	                	$error = array('error' => $this->upload->display_errors());
	                    $this->template->load('default','admin/my_profile',$error);
	                } else {
	                	$avatar_name = $this->upload->data('file_name');
	                }
	            }
				$dataArr = array(
					'id'		=> $this->session->userdata('logged_in_user_id'),
					'username' 	=> $this->input->post('txt_username'),
					'name' 		=> $name,
					// 'password' 	=> md5($this->input->post('txt_password')),
					'email' 	=> $this->input->post('txt_email'),
					'gender' 	=> ($this->input->post('radio_gender')) ? 'male' : 'female' ,
					'avatar'	=> $avatar_name,
					'modified_date' => date('Y-m-d H:i:s')
				);
			
				// pr($dataArr,1);
				$resp = $this->users_model->perform_action('update',$dataArr,TBL_USERS);
				if($resp) {
					$data['success'] = 'You are successfully registered !';
					$this->session->set_flashdata('success', $data['success']); 
					$this->template->load('default','admin/my_profile',$data);					
				} else {
					$data['error'] = 'There is some error. Please try again !';
					$this->session->set_flashdata('error', $data['error']);
					$this->template->load('default','admin/my_profile',$data);	
				}
			}
		} else {

			$this->template->load('default','admin/my_profile',$data);
		}
		
	}
}