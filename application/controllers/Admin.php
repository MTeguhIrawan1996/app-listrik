<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pengajuan_model', 'pengajuan');
        $this->load->model('Surat_model', 'surat');
        
    }

    public function index()
    {
        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengajuan'] = $this->pengajuan->getJumlahPengajuanPemasangan();
        $data['pengajuanproses'] = $this->pengajuan->getJumlahPengajuanproses();
        $data['hasilsurvey'] = $this->surat->getJumlahHasilSurvey();
        $data['hasilpemasangan'] = $this->surat->getJumlahHasilPemasangan();

       $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}