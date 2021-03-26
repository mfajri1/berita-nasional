<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function view($halaman, $data){
		$this->load->view('admin/temp/header', $data, FALSE);	
		$this->load->view('admin/temp/sidebar', $data, FALSE);
		$this->load->view( $halaman, $data, FALSE);	
		$this->load->view('admin/temp/footer', $data, FALSE);	
	}
	public function index(){
		$data['title'] = 'Halaman Tabel Berita';
		$data['tb_berita']	= $this->m_tbBerita->tampil('t_berita')->result_array();
		$this->view('admin/berita/t_berita', $data, FALSE);
	}

	public function tambah(){
		$data['title'] = 'Tambah Berita';
		$data['kategori'] = $this->m_kategori->tampil('t_kategori')->result_array();
		$this->view('admin/berita/tambah', $data, FALSE);	
	}
	public function tambahAksi(){
		$this->form_validation->set_rules('judul_berita', 'Judul Berita', 'trim|required');	
		$this->form_validation->set_rules('nama_sumber', 'Sumber Berita', 'trim|required');	
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');	
		$this->form_validation->set_rules('isi_berita', 'isi', 'trim|required');
		$this->form_validation->set_rules('search', 'Search', 'trim|required');	
		$this->form_validation->set_rules('headline', 'Headline', 'trim|required');	
		$this->form_validation->set_rules('status', 'Status', 'trim|required');		

		if ($this->form_validation->run()) {
			$config['upload_path'] = './assets/img/imgBerita/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] 	= TRUE; //enkripsi nama file
			$config['max_size']  = '2400';
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				$data['title'] = 'Tambah Berita';
				$data['kategori'] = $this->m_kategori->tampil('t_kategori')->result_array();
				$data['error'] 		= $this->upload->display_errors();//untuk menampilkan error upload gambar 
				$this->view('admin/berita/tambah', $data, FALSE);
			}
			else{
				$upload_gambar = array('upload_data' => $this->upload->data());
				// membuat thumbnail
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/imgBerita/' . $upload_gambar['upload_data']['file_name'];
				$config['new_image'] = './assets/img/imgBerita/thumb/'; //bermasalah baru, gak bisa buat thumbnail
				$config['encrypt_name'] 	= TRUE; //enkripsi nama file
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 75;
				$config['height']       = 50;
				$config['thumb_marker']		= '';

				$this->image_lib->resize();
				// akhir thumbnail
				$data = [
					'id_kategori' 	=> htmlspecialchars($this->input->post('id_kategori', true)), 
					'nama_sumber' 	=> htmlspecialchars($this->input->post('nama_sumber', true)), 
					'judul_berita' 	=> htmlspecialchars($this->input->post('judul_berita', true)), 
					'search' 		=> htmlspecialchars($this->input->post('search', true)), 
					'headline' 		=> htmlspecialchars($this->input->post('headline', true)), 
					'isi_berita' 	=> htmlspecialchars($this->input->post('isi_berita', true)),
					'gambar' 		=> $upload_gambar['upload_data']['file_name'],
					'tanggal_post' 	=> time(),
					'jam' 			=> time(),
					'dibaca'	 	=> 2,
					'status'		=> htmlspecialchars($this->input->post('status', true)),
					'id_user'		=> $this->session->userdata('id_user')
				];
				$this->m_tbBerita->tambah('t_berita', $data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Produk Berhasil Di Tambah! </div>');
				redirect('staff/berita');
			}
		}
		$data['title'] = 'Tambah Berita';
		$data['kategori'] = $this->m_kategori->tampil('t_kategori')->result_array();
		$this->view('admin/berita/tambah', $data, FALSE);
	}

	public function detail($id){
		$id_berita = ['id_berita' => $id];

		$data['title'] = 'Detail Berita';
		$data['berita']	= $this->m_tbBerita->detail('t_berita', $id_berita)->row_array();

		$this->view('admin/berita/detail', $data, FALSE);
	}

	public function hapus($id){
		$id_berita = ['id_berita' => $id];
		// proses hapus directory gambar
		$berita = $this->m_tbBerita->detail('t_berita', $id_berita)->row_array();
		unlink('./assets/img/imgBerita/' . $berita['gambar']);
		// end ha[us]
		$this->m_tbBerita->hapus('t_berita', $id_berita);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Produk Berhasil Di Hapus! </div>');
		redirect('staff/berita');
	}

	// public function edit($id){
	// 	$id_kategori = ['id_kategori' => $id];

	// 	$data['title'] = 'Edit Data Kategori';
	// 	$data['editKategori'] = $this->m_kategori->edit('t_kategori', $id_kategori)->row_array();

	// 	$this->view('admin/kategori/ubah', $data, FALSE);

	// }

	// public function editAksi($id){
	// 	$id_kategori = ['id_kategori' => $id];
	// 	$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');
	// 	$this->form_validation->set_rules('search', 'Search', 'trim|required');	
	// 	$this->form_validation->set_rules('status', 'Status', 'trim|required');

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->edit(htmlspecialchars($this->input->post('id_kategori', true)));	
	// 	}else{
	// 		$data = [
	// 			'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
	// 			'search' => htmlspecialchars($this->input->post('search', true)),
	// 			'status' => htmlspecialchars($this->input->post('status', true))
	// 		];

	// 		$this->m_kategori->editAksi('t_kategori', $id_kategori, $data);
	// 		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kategori Berhasil Di tambahkan! </div>');
	// 		redirect('staff/kategori','refresh');
	// 	}	
	// }

	// public function hapus($id){
	// 	$id_kategori = ['id_kategori' => $id];
	// 	$this->m_kategori->hapus('t_kategori', $id_kategori);
	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Kategori Berhasil Di Hapus! </div>');
	// 	redirect('staff/kategori','refresh');	
	// }

}

/* End of file berita.php */
/* Location: ./application/controllers/staff/berita.php */