<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tbBerita extends CI_Model {

	public function tampil($table){
		$this->db->select('
			t_berita.*,
			t_user.username,
			t_kategori.*
		');
		$this->db->from($table);
		$this->db->join('t_user', 't_user.id_user = t_berita.id_user', 'left');
		$this->db->join('t_kategori', 't_kategori.id_kategori = t_berita.id_kategori', 'left');
		$this->db->group_by('t_berita.id_berita');
		return $this->db->get();		
	}	

	public function tambah($table, $data){
		$this->db->insert($table, $data);	
	}

	public function detail($table, $id){
		$this->db->select('
			t_berita.*,
			t_user.username,
			t_kategori.*
		');
		$this->db->from($table);
		$this->db->join('t_user', 't_user.id_user = t_berita.id_user', 'left');
		$this->db->join('t_kategori', 't_kategori.id_kategori = t_berita.id_kategori', 'left');
		$this->db->where($id);
		$this->db->group_by('t_berita.id_berita');
		return $this->db->get();	
	}

	public function hapus($table, $id){
		$this->db->from($table);
		$this->db->where($id);
		$this->db->delete();	
	}

}

/* End of file m_tbBerita.php */
/* Location: ./application/models/m_tbBerita.php */