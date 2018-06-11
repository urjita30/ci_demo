<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function perform_action($action, $data) {
		if($action == 'insert') {
			$this->db->insert(TBL_USERS, $data);
			return $this->db->affected_rows();
		} else if($action == 'select') {
			$this->db->select('*');
			$this->db->from(TBL_USERS);
			$this->db->group_start();
			$this->db->where('username',$data['username']);
			$this->db->or_where('email',$data['username']);
			$this->db->group_end();
			$this->db->where('password',$data['password']);
			$query = $this->db->get();
			return $query;
		}
	}

}