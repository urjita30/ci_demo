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
					$from = 'demo.narola@gmail.com';
					$to = $this->input->post('txt_email');
					$subject = 'Your Login Details';
					$message = "Username: ".$this->input->post('txt_username')."<br/> Password: ".$this->input->post('txt_password');

					$this->email->from($from, 'Demo Narola');
					$this->email->to($to);
					// $this->email->cc('another@another-example.com');
					// $this->email->bcc('them@their-example.com');

					$this->email->subject($subject);
					$this->email->message($message);

					$mail = $this->email->send();

				// 	$from = 'demo.narola@gmail.com';
				// 	$to = $this->input->post('txt_email');
				// 	$subject = 'Your Login Details';
				// 	$message = 'Username: '.$this->input->post('txt_username').'\n Password: '.$this->input->post('txt_password');
				// 	sendMail($from,$to,$subject,$message);
				// 	$config = Array(
			    //     'protocol' => 'smtp',
			    //     'smtp_host' => 'ssl://smtp.googlemail.com',
			    //     'smtp_port' => 465,
			    //     'smtp_user' => 'demo.narola@gmail.com', // change it to yours
			    //     'smtp_pass' => 'Narola21!', // change it to yours
			    //     'mailtype' => 'html',
			    //     'charset' => 'iso-8859-1',
			    //     'wordwrap' => TRUE
			    // );

			    // $message = '';
			    // // $this->load->library('email', $config);
			    // $this->email->initialize($config);
			    // $this->email->set_newline("\r\n");
			    // $this->email->from('demo.narola@gmail.com'); // change it to yours
			    // $this->email->to('ud@narola.email');// change it to yours
			    // $this->email->subject('Resume from JobsBuddy for your Job posting');
			    // $this->email->message($message);
			    // if($this->email->send())
			    // {
			    //     echo 'Email sent.';
			    // }
			    // else
			    // {
			    //     show_error($this->email->print_debugger());
			    // } die;
					if($mail) {
						$data['success'] = 'You are successfully registered !';
						$this->session->set_flashdata('success', $data['success']); 
						redirect('/admin/users/add');
						// $this->load->view('admin/login',$data);
					}
				}
			}

		} else {
			$this->template->load('default','/admin/users/add', $data);
		}
	}

}