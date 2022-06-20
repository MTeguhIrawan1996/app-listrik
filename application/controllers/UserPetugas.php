<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserPetugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Surat_model', 'surat');
    }

    public function index()
    {
        $data['title'] = 'Halaman Petugas';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

       $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('userpetugas/index', $data);
        $this->load->view('templates/footer');
    }

    public function suratTugas()
    {
        $data['title'] = 'Surat Tugas';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat'] = $this->surat->getSuratByPetugas();

       $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('userpetugas/surat-tugas', $data);
        $this->load->view('templates/footer');
    }

    public function detailsurat($id, $ajukan_id)
    {
        $data['title'] = 'Surat Tugas';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat'] = $this->surat->getSuratById($id);
        $data['pengajuan'] = $this->surat->getSuratByAjukanId($ajukan_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/detail-surat', $data);
        $this->load->view('templates/footer');
    }

    public function aksi()
    {
        $this->surat->kirimDataAksi();
        $this->session->set_flashdata('message', 'Aksi Berhasil dikirim');
        redirect('userpetugas/surattugas');
    }


}