<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
    }

	public function index()
	{
		goToDefaultPage();
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('home/index');
		} else {
			$this->_login();
		}
		
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		//jika user ada
		if ($user) {
			//jika user aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'id' => $user['id'],
						'username' => $user['username'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					//menentukan login user atau admin
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else if ($user['role_id'] == 2) {
						redirect('userpetugas');
					} else if ($user['role_id'] == 3) {
						redirect('pelanggan');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This username has not been activated!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is Not registerd!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('auth');
	}
}