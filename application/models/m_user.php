<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function daftar($table, $data){
		$this->db->insert($table, $data);	
	}

	public function login($username, $password){
		$this->db->select('*');
		$this->db->from('t_user');
		$this->db->where('username', $username);
		$this->db->where('password', sha1($password));
		return $this->db->get();	
	}

}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */