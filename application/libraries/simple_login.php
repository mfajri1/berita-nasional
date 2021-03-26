<?php 
	defined('BASEPATH') or exit('No direct script access allowed');

	class Simple_login{

		protected $CI;
		
		public function __construct()
		{
			$this->CI =& get_instance();
		}

		public function lib_login($username, $password){
			$check = $this->CI->m_user->login($username, $password)->row_array();

			if ($check) {
				$id_user = $check['id_user'];
				$username = $check['username'];

				$this->CI->session->set_userdata('id_user', $id_user);
				$this->CI->session->set_userdata('username', $username);

				redirect('admin','refresh');	
			}else {
				$this->CI->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">username atau password salah</div>');
				redirect('auth','refresh');
			}	
		}

		public function logout(){
		// untuk keluar atau menghilangkan session 
			$this->CI->session->unset_userdata('username');

		// Setelah sesion berhasil di hapus maka kembalikan ke halaman login
			$this->CI->session->set_flashdata('pesan', '<div class="alert alert-success">Anda Berhasil Logout! </div>');
			redirect('auth');
		}
	}
?>