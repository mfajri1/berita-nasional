<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function view($halaman, $data){
		$this->load->view('home/temp/header', $data, FALSE);
		$this->load->view('home/temp/nav', $data, FALSE);
		$this->load->view($halaman, $data, FALSE);	
		$this->load->view('home/temp/footer', $data, FALSE);
	}

	public function index()
	{
		$data['title'] = 'Halaman Home';
		$this->view('home/home', $data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */