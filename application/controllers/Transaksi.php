<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pengajuan_model', 'pengajuan');
        $this->load->model('Surat_model', 'surat');
        $this->load->model('Petugas_model', 'petugas');
        
    }

    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengajuan'] = $this->pengajuan->getDataPengajuanAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');

    }

    public function verifikasi($id)
    {
        $this->pengajuan->updateStatusVerifikasi($id);
        $this->session->set_flashdata('message', 'Verifikasi berhasil');
        redirect('transaksi');
    }

    public function hapus($id)
    {
        $this->pengajuan->hapusDataPengajuan($id);
        $this->session->set_flashdata('message', 'Data pengajuan berhasil dihapus');
        redirect('transaksi');
    }


    // SURAT TUGAS
    public function suratTugas()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat'] = $this->surat->getSuratAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/surat-tugas', $data);
        $this->load->view('templates/footer');

    }

    public function detailsurat($id)
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat'] = $this->surat->getSuratById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/detail-surat', $data);
        $this->load->view('templates/footer');

    }

    public function hapusSurat($id)
    {
        $this->surat->hapusDataSurat($id);
        $this->session->set_flashdata('message', 'Data surat berhasil dihapus!');
        redirect('transaksi/surattugas');
    }

    public function formSuratTugas()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kode_surat'] = $this->surat->getKodesurat();
        $data['petugas'] = $this->petugas->getPetugasAll();
        $data['pengajuan'] = $this->pengajuan->getDataPengajuanVerify();

        $this->form_validation->set_rules('kode_surat', 'Kode Surat', 'required|trim|is_unique[surat_tugas.kode_surat]', ['is_unique' => 'Kode surat Sudah digunakan']);
        $this->form_validation->set_rules('user_id', 'Nama Petugas', 'required|trim');
        $this->form_validation->set_rules('ajukan_id', 'Kode Pengajuan', 'required|trim|is_unique[surat_tugas.ajukan_id]', ['is_unique' => 'Sudah ada surat untuk kode pengajuan tersebut']);
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');


        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/form-surat-tugas', $data);
        $this->load->view('templates/footer');
        } else {

            $this->surat->tambahDataSurat();
            $this->session->set_flashdata('message', 'Surat Tugas Berhasil dibuat');
            redirect('transaksi/surattugas');
        }
    }

    //AJAX
    public function getUserAjax()
    {
        $ajukan_id = $this->input->post('ajukan_id');
        // $data = $this->surat->getUserByidAjax($id);
        $data = $this->surat->getAjukanPemasanganByidAjax($ajukan_id);
        echo json_encode($data);
    }

}