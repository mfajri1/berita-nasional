<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function view($halaman, $data){
		$this->load->view('admin/temp/header', $data, FALSE);
		$this->load->view('admin/temp/sidebar', $data, FALSE);
		$this->load->view( $halaman, $data, FALSE);
		$this->load->view('admin/temp/footer', $data, FALSE);
	}

	public function index()
	{
		$data['title'] = 'Halaman awal';
		$this->view('admin/dashboard', $data, false);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */