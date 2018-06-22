<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function perform_action($action, $data, $table) {
		if($action == 'insert') {
			$this->db->insert($table, $data);
			return $this->db->affected_rows();
		} else if($action == 'select') {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->group_start();
			$this->db->where('username',$data['username']);
			$this->db->or_where('email',$data['username']);
			$this->db->group_end();
			$this->db->where('password',$data['password']);
			$query = $this->db->get();
			return $query;
		} else if($action == 'selectall') {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('id',$data['id']);
			return $this->db->get();
		}
	}

	public function get_role() {
		$this->db->select('*');
		$this->db->from(TBL_ROLE);
		return $this->db->get();
	}

}