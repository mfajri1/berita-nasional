<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function tampil($table){
		$this->db->select('*');
		$this->db->from('t_kategori');
		return $this->db->get();	
	}	

	public function tambahBerita($table, $data){
		$this->db->insert($table, $data);	
	}

	public function hapus($table, $id){
		$this->db->where($id);
		$this->db->delete($table);	
	}

	public function edit($table, $id){
		$this->db->where($id);
		return $this->db->get($table);	
	}

	public function editAksi($table, $id_kategori, $data){
		$this->db->where($id_kategori);
		$this->db->update($table, $data);
	}

}

/* End of file m_kategori.php */
/* Location: ./application/models/m_kategori.php */