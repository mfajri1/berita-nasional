<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function view($halaman, $data){
		$this->load->view('auth/temp/header', $data, FALSE);
		$this->load->view( $halaman, $data, FALSE);	
		$this->load->view('auth/temp/footer', $data, FALSE);	
	}

	public function index(){
		$data['title'] = 'Halaman Login';
		$this->view('auth/login', $data, FALSE);
	}

	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');	
		$this->form_validation->set_rules('password', 'Password', 'trim|required');	

		if ($this->form_validation->run()) {
			$username = htmlspecialchars($this->input->post('username', true));
			$password = htmlspecialchars($this->input->post('password', true));

			$this->simple_login->lib_login($username, $password);
		}

		$data['title'] = 'Halaman Login';
		$this->view('auth/login', $data, FALSE);
	}

	public function logout(){
		// menjalankan library simple_login di folder library
		$this->simple_login->logout();	
	}

	public function daftar(){
		$data['title'] = 'Halaman Daftar';
		$this->view('auth/register', $data, FALSE);	
	}

	public function daftarAksi(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required');	
		$this->form_validation->set_rules('username', 'username', 'trim|required');	
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]|matches[password2]',[
			'matches' => 'Password Dont match!','min_length'=>'Password Kurang panjang'
		]);
		$this->form_validation->set_rules('password2','Password','trim|required|matches[password]');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
				$this->daftar();
			} else {
				$data = [
					'email' 	=> htmlspecialchars($this->input->post('email', true)),
					'username' 	=> htmlspecialchars($this->input->post('username', true)),
					'password'	=> sha1($this->input->post('password', true)),
					'jabatan' 	=> htmlspecialchars($this->input->post('jabatan', true))
				];

				$this->m_user->daftar('t_user', $data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pelanggan Berhasil Di tambahkan! </div>');
				redirect('auth','refresh');

			}	
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */