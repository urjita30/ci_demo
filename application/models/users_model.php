<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function perform_action($action, $data) {
		if($action == 'insert') {
			$this->db->insert('users', $data);
			return $this->db->affected_rows();
		}
	}

}