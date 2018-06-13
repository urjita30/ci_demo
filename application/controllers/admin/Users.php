<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct() {
		$this->model->load('users_model');
	}

	public function add()	{
		
	}

}