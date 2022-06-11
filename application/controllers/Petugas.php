<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Petugas_model', 'petugas');
        
    }

    public function index()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->petugas->getPetugasAll();

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[user.nik]', ['is_unique' => 'NIK Terdaftar']);
        $this->form_validation->set_rules('username', 'Usrename', 'required|trim|is_unique[user.username]', ['is_unique' => 'Username Terdaftar']);
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|trim|is_unique[user.no_hp]', ['is_unique' => 'Nomor Hp Terdaftar']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'password dont match!', 'min_length' => 'password to short!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/index', $data);
        $this->load->view('templates/footer');
        } else {
            $this->petugas->tambahDataPetugas();
            $this->session->set_flashdata('message', 'Data Petugas Berhasil ditambahkan');
            redirect('petugas');
        }
    }

    public function resetPetugas($id)
    {
        $this->petugas->resetPasswordPetugas($id);
        $this->session->set_flashdata('message', 'Password baru di Reset (reset)');
        redirect('petugas');
    }

    public function hapusPetugas($id)
    {
        $this->petugas->hapusDataPetugas($id);
        $this->session->set_flashdata('message', 'Data petugas berhasil dihapus!');
        redirect('petugas');
    }



}