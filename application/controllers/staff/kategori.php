<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function view($halaman, $data){
		$this->load->view('admin/temp/header', $data, FALSE);	
		$this->load->view('admin/temp/sidebar', $data, FALSE);
		$this->load->view( $halaman, $data, FALSE);	
		$this->load->view('admin/temp/footer', $data, FALSE);	
	}
	public function index(){
		$data['title'] = 'Halaman Kategori Berita';
		$data['kategori'] = $this->m_kategori->tampil('t_kategori')->result_array();
		
		$this->view('admin/kategori/kategori', $data, FALSE);
	}

	public function tambah(){
		$data['title'] = 'Tambah Kategori Berita';
		$this->view('admin/kategori/tambah', $data, FALSE);	
	}

	public function tambahAksi(){
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');	
		$this->form_validation->set_rules('search', 'Search', 'trim|required');	
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = [
				'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
				'search' => htmlspecialchars($this->input->post('search', true)),
				'status' => htmlspecialchars($this->input->post('status', true))
			];

			$this->m_kategori->tambahBerita('t_kategori', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kategori Berhasil Di tambahkan! </div>');
			redirect('staff/kategori','refresh');
		}	
	}

	public function edit($id){
		$id_kategori = ['id_kategori' => $id];

		$data['title'] = 'Edit Data Kategori';
		$data['editKategori'] = $this->m_kategori->edit('t_kategori', $id_kategori)->row_array();

		$this->view('admin/kategori/ubah', $data, FALSE);

	}

	public function editAksi($id){
		$id_kategori = ['id_kategori' => $id];
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');
		$this->form_validation->set_rules('search', 'Search', 'trim|required');	
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->edit(htmlspecialchars($this->input->post('id_kategori', true)));	
		}else{
			$data = [
				'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
				'search' => htmlspecialchars($this->input->post('search', true)),
				'status' => htmlspecialchars($this->input->post('status', true))
			];

			$this->m_kategori->editAksi('t_kategori', $id_kategori, $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kategori Berhasil Di tambahkan! </div>');
			redirect('staff/kategori','refresh');
		}	
	}

	public function hapus($id){
		$id_kategori = ['id_kategori' => $id];
		$this->m_kategori->hapus('t_kategori', $id_kategori);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Kategori Berhasil Di Hapus! </div>');
		redirect('staff/kategori','refresh');	
	}

}

/* End of file kategori.php */
/* Location: ./application/controllers/staff/kategori.php */